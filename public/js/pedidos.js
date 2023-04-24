$(document).ready(function () {


    $("#invoice-form").submit(function (event) {
        
        if (haszeroProductCodes()) {
            alert("Se encontró un código de producto no disponible.");
            event.preventDefault(); // Cancelar el envío del formulario
        } else {
            // El formulario se enviará normalmente
        }

        if (hasDuplicateProductCodes()) {
            alert("Se encontró un código de producto duplicado.");
            event.preventDefault(); // Cancelar el envío del formulario
        } else {
            // El formulario se enviará normalmente
        }

        if (hasNegativeProductCodes()) {
            alert("Se encontró un código de producto insuficiente en bodega para lo solicitado.");
            event.preventDefault(); // Cancelar el envío del formulario
        } else {
            // El formulario se enviará normalmente
        }
        


    });





    $(document).on('blur', '[id^=productCode_]', function () {

        //$("[id^=productCode_]").each(function () {

        
        //////////////
        
        

        
         //////////////






            var valor = $(this).attr('id');

            //console.log(valor)

            id = valor.replace("productCode_", '');

            
            //$('#price_' + id).val('');
            //$('#productName_' + id).val('');
            //$('#total_' + id).val('');
           // $('#quantity_' + id).val('');
            //$('#avaliable_' + id).val('0');
            //console.log(id)
            final = $('#productCode_' + id).val()

            bodega = $('#bodega').val()

            //console.log("bodega", bodega)

            //console.log(final)




            
            $.get('http://127.0.0.1:8000/Producto/' + bodega + '/' + final, function (data, status) {
                //alert("Data: " + data + "\nStatus: " + status);
                console.log(data[0])
                if (data == '') {
                    $('#price_' + id).val('');
                    $('#productName_' + id).val('');
                    $('#total_' + id).val('');
                    console.log("imprimi 0")
                    $('#avaliable_' + id).val('0');
                }
                else {
                    console.log("imprimi numero")
                    
                    
                    $('#price_' + id).val(data[0].Precio);
                    //$('#productName_' + id).val(data.Descripcion);
                     $('#avaliable_' + id).val(data[0].Cantidad);
                    //console.log(disponible)

                }
            });

       // });
    });


    $(document).on('click', '#checkAll', function () {
        $(".itemRow").prop("checked", this.checked);
    });

    $(document).on('click', '.itemRow', function () {
        if ($('.itemRow:checked').length == $('.itemRow').length) {
            $('#checkAll').prop('checked', true);
        } else {
            $('#checkAll').prop('checked', false);
        }
    });


    var count = $(".itemRow").length;


    $(document).on('click', '#addRows', async function () {




        count++;
        var htmlRows = '';
        htmlRows += '<tr>';
        htmlRows += '<td><input class="itemRow" type="checkbox"></td>';


        //htmlRows += '<td><input type="text" name="productCode_' + count + '" id="productCode_' + count + '" class="form-control" autocomplete="off" required></td>';

        htmlRows += '<td><select name="productCode_' + count + '" id="productCode_' + count +'" class="form-control" required>< option value = "" > Seleccione una opción</option > '

        await $.get('http://127.0.0.1:8000/ListaProductos', function (data, status) {

            $.each(data, function (index, data) {
                
                //console.log('  idProducto: ' + data.idProducto);

                htmlRows += '<option value="' + data.idProducto + '"> ' + data.Descripcion +'</option>'
            });
           
        });

        htmlRows +='</select ></td>'

        
        htmlRows += '<td><input type="number" name="quantity_' + count + '" id="quantity_' + count + '" class="form-control quantity" autocomplete="off" required></td>';
        htmlRows += '<td><input type="number" name="avaliable_' + count + '" id="avaliable_' + count + '" class="form-control avaliable" autocomplete="off" required readonly></td>';
        htmlRows += '<td><input type="number" name="price_' + count + '" id="price_' + count + '" class="form-control price" autocomplete="off" required readonly></td>';
        htmlRows += '<td><input type="number" name="total_' + count + '" id="total_' + count + '" class="form-control total" autocomplete="off" required readonly></td>';
        htmlRows += '<td><input type="text" name="Observaciones_' + count + '" id="" class="form-control total" autocomplete = "off"  ></td > '
        htmlRows += '</tr>';
        $('#invoiceItem').append(htmlRows);

    });


    $(document).on('click', '#removeRows', function () {
        $(".itemRow:checked").each(function () {
            $(this).closest('tr').remove();
        });
        $('#checkAll').prop('checked', false);
        calculateTotal();
    });
    $(document).on('blur', "[id^=quantity_]", function () {
        calculateTotal();
    });
    $(document).on('blur', "[id^=price_]", function () {
        calculateTotal();
    });
    $(document).on('blur', "#taxRate", function () {
        calculateTotal();
    });
    $(document).on('blur', "#Servicio", function () {
        calculateTotal();
    });

    $(document).on('blur', "#Descuento", function () {
        calculateTotal();
    });

    $(document).on('blur', "#amountPaid", function () {
        var amountPaid = $(this).val();
        var totalAftertax = $('#totalAftertax').val();
        if (amountPaid && totalAftertax) {
            totalAftertax = totalAftertax - amountPaid;
            $('#amountDue').val(totalAftertax);
        } else {
            $('#amountDue').val(totalAftertax);
        }
    });
    $(document).on('click', '.deleteInvoice', function () {
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to remove this?")) {
            $.ajax({
                url: "action.php",
                method: "POST",
                dataType: "json",
                data: { id: id, action: 'delete_invoice' },
                success: function (response) {
                    if (response.status == 1) {
                        $('#' + id).closest("tr").remove();
                    }
                }
            });
        } else {
            return false;
        }
    });
});


function calculateTotal() {
    var totalAmount = 0;
    $("[id^='price_']").each(function () {
        var id = $(this).attr('id');
        id = id.replace("price_", '');
        var price = $('#price_' + id).val();
        var quantity = $('#quantity_' + id).val();
        if (!quantity) {
            quantity = 1;
        }
        var total = price * quantity;
        $('#total_' + id).val(parseFloat(total));
        totalAmount += total;
    });
    $('#subTotal').val(parseFloat(totalAmount));
    var taxRate = $("#taxRate").val();
    var subTotal = $('#subTotal').val();
    if (subTotal) {

        var taxAmount = subTotal * taxRate / 100;
        $('#taxAmount').val(taxAmount);
        subTotal = parseFloat(subTotal) + parseFloat(taxAmount);
        $('#totalAftertax').val(subTotal);
        var amountPaid = $('#amountPaid').val();

        var totalAftertax = $('#totalAftertax').val();
        var servicio = $('#Servicio').val();
        var descuento = $('#Descuento').val();



        if (servicio) {


            var totalconservicio = parseFloat(servicio) + parseFloat(totalAftertax);

            $('#totalAftertax').val(totalconservicio);
        }

        if (descuento) {

            var subTotal = $('#subTotal').val();
            var retencion = parseFloat(subTotal) * (parseFloat(descuento) / 100);
            //console.log(retencion)
            $('#Retencion').val(retencion);
            var valorss = parseFloat(subTotal) - retencion;
            $('#ValorSS').val(valorss);

            var total = $('#totalAftertax').val();
            var ultimo = parseFloat(total) - retencion;
            $('#totalAftertax').val(ultimo);
        }



        if (amountPaid && totalAftertax) {
            totalAftertax = totalAftertax - amountPaid;
            $('#amountDue').val(totalAftertax);
        } else {
            //console.log(totalAftertax);
            $('#amountDue').val(totalAftertax);
        }
    }


    


}

function hasDuplicateProductCodes() {
    var productCounts = {};

    $("[id^=productCode_]").each(function () {
        var valor = $(this).attr('id');
        var id = valor.replace("productCode_", '');
        var final = $('#productCode_' + id).val();

        if (productCounts[final]) {
            productCounts[final]++;
        } else {
            productCounts[final] = 1;
        }
    });

    for (var productCode in productCounts) {
        if (productCounts[productCode] > 1) {
            return true;
        }
    }

    return false;
}


function haszeroProductCodes() {
    var productZero = 0;

    $("[id^=productCode_]").each(function () {

        var valor = $(this).attr('id');
        var id = valor.replace("productCode_", '');
        var final = $('#avaliable_' + id).val();
      
        if (final==0) {
            productZero++;
        } else {
            
        }
    });



    if (productZero > 0) { return true; }

    return false;
}


function hasNegativeProductCodes() {
    var productNegative = 0;

    $("[id^=productCode_]").each(function () {

        var valor = $(this).attr('id');
        var id = valor.replace("productCode_", '');
        var disponible = $('#avaliable_' + id).val();
        var solicitado = $('#quantity_' + id).val();
        var total = disponible - solicitado
        console.log("total")
        console.log(total)
        if (total<0) {
            productNegative++;
        } else {

        }
    });



    if (productNegative > 0) { return true; }

    return false;
}
