$(document).ready(function () {


    $(document).on('blur', '[id^=productCode_]', function () {

        $("[id^=productCode_]").each(function () {


            var valor = $(this).attr('id');

            console.log(valor)

            id = valor.replace("productCode_", '');

            console.log(id)
            final = $('#productCode_' + id).val()

            console.log(final)




            console.log(valor)
            $.get('http://127.0.0.1:8000/Producto/' + final, function (data, status) {
                //alert("Data: " + data + "\nStatus: " + status);
                console.log(data)
                if (data == '') {
                    $('#price_' + id).val('');
                    $('#productName_' + id).val('');
                    $('#total_' + id).val('');
                    $('#quantity_' + id).val('');
                }
                else {
                    $('#price_' + id).val(data.Precio);
                    $('#productName_' + id).val(data.Descripcion);
                }
            });

        });
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
    $(document).on('click', '#addRows', function () {
        count++;
        var htmlRows = '';
        htmlRows += '<tr>';
        htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
        htmlRows += '<td><input type="text" name="productCode_' + count + '" id="productCode_' + count + '" class="form-control" autocomplete="off" required></td>';
        htmlRows += '<td><input type="text" name="productName_' + count + '" id="productName_' + count + '" class="form-control" autocomplete="off" required readonly></td>';
        htmlRows += '<td><input type="number" name="quantity_' + count + '" id="quantity_' + count + '" class="form-control quantity" autocomplete="off" required></td>';
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

