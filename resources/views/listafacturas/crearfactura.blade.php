<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header2')
</head>

<body>
    @include('layout.layout')



    <title>baulphp : Sistema facturación </title>


    <div class="container content-invoice">



        @if(Session::has('perfil'))


        <form action="/Registrar" id="invoice-form" method="POST" class="invoice-form" role="form">
            @csrf





            <div class="load-animate animated fadeInUp">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="title">Sistema de Facturación</h2>

                        <h2 class="title">Bienvenido {{ isset($value) ? $value : '' }}</h2>
                        <br>

                    </div>
                </div>
                <input id="currency" type="hidden" value="$">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">



                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover" id="">
                            <tr>
                                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                <th width="15%">Forma De Pago</th>
                                <th width="38%">Mesero</th>
                                <th width="15%">Mesa</th>
                                <th width="15%">Clientes</th>

                                <th width="15%">% Descuento</th>

                                <th width="15%">Observacion</th>
                            </tr>
                            <tr>
                                <td><input class="" type="checkbox"></td>

                                <td>


                                <!--<input type="text" name="formapago" id="" class="form-control" autocomplete="off"
                                        required>--><select name="formapago"  class="form-control" required>


                                

                               
                                              <option value="Efectivo">Efectivo</option>
                                              <option value="Tarjeta">Tarjeta</option>

                                             
                                
                               

                                 </select>





                                        </td>



                                <!--<td><input type="text" name="Mesero" id="" class="form-control" autocomplete="off"
                                        required></td>-->

                                        <td>

                                <select name="Mesero"  class="form-control" required>


                                @foreach ($meseros as $mesero)

                               
                                              <option value="{{$mesero->id}}">{{$mesero->usuario}}</option>


                                             
                                
                                @endforeach

                                 </select>


                                </td>



                                <td><input type="number" name="Mesa" id="" class="form-control quantity"
                                        autocomplete="off" required></td>
                                <td><input type="text" name="Clientes" id="" class="form-control price"
                                        autocomplete="off" required></td>

                                <td><input type="number" name="Descuento" id="Descuento" class="form-control total"
                                        autocomplete="off" required></td>
                                <td><input type="number" name="Observacion" id="" class="form-control total"
                                        autocomplete="off"></td>



                            </tr>
                        </table>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover" id="invoiceItem">
                            <tr>
                                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                
                                <th width="38%">Nombre Producto</th>
                                <th width="15%">Cantidad</th>
                                <th width="15%">Precio</th>
                                <th width="15%">Total</th>
                            </tr>
                            <tr>

                                <td><input class="itemRow" type="checkbox"></td>




                                <td><!--<input type="text" name="productCode_1" id="productCode_1" class="form-control"
                                        autocomplete="off" required>-->
                                         <select name="productCode_1" id="productCode_1" class="form-control" required>
                                        <option value="">Seleccione una opción</option>

                                        @foreach($productos as $producto)
                                        <option value="{{$producto->idProducto}}">{{$producto->Descripcion}}</option>
                                        @endforeach

                                        </select>

                                        </td>



                                <!--<td><input type="text" name="productName_1" id="productName_1" class="form-control"
                                        autocomplete="off" required readonly></td>-->
                                <td><input type="number" name="quantity_1" id="quantity_1" class="form-control quantity"
                                        autocomplete="off" required></td>
                                <td><input type="number" name="price_1" id="price_1" class="form-control price"
                                        autocomplete="off" required readonly></td>
                                <td><input type="number" name="total_1" id="total_1" class="form-control total"
                                        autocomplete="off" required readonly></td>


                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button>
                        <button class="btn btn-success" id="addRows" type="button">+ Agregar Más</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <h3>Notas: </h3>
                        <div class="form-group">
                            <textarea class="form-control txt" rows="5" name="notes" id="notes"
                                placeholder="Notas"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="hidden" value="" class="form-control" name="userId">

                            @if (isset($value))
                            <input type="submit" name="invoice_btn" value="Guardar Factura"
                                class="btn btn-success submit_btn invoice-save-btm">

                            @else

                            @endif

                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <span class="form-inline">
                            <div class="form-group">
                                <label>Subtotal: &nbsp;</label>
                                <div class="input-group">
                                    <div class="input-group-addon currency">$</div>
                                    <input value="" type="number" class="form-control" name="subTotal" id="subTotal"
                                        placeholder="Subtotal" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Descuento &nbsp;</label>
                                <div class="input-group">
                                    <div class="input-group-addon currency">$</div>
                                    <input value="" type="number" class="form-control" name="Retencion" id="Retencion"
                                        placeholder="Descuento" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Valor S/S &nbsp;</label>
                                <div class="input-group">
                                    <div class="input-group-addon currency">$</div>
                                    <input value="" type="number" class="form-control" name="ValorSS" id="ValorSS"
                                        placeholder="ValorSS" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tasa Impuesto: &nbsp;</label>
                                <div class="input-group">
                                    <input value="" type="number" class="form-control" name="taxRate" id="taxRate"
                                        placeholder="Tasa de Impuestos" required>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Monto Inpuesto: &nbsp;</label>
                                <div class="input-group">
                                    <div class="input-group-addon currency">$</div>
                                    <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount"
                                        placeholder="Monto de Impuesto" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Servicio: &nbsp;</label>
                                <div class="input-group">
                                    <div class="input-group-addon currency">$</div>
                                    <input value="" type="number" class="form-control" name="Servicio" id="Servicio"
                                        placeholder="Servicio" required>
                                </div>
                            </div>




                            <div class="form-group">
                                <label>Total: &nbsp;</label><br>
                                <div class="input-group">
                                    <div class="input-group-addon currency">$</div>
                                    <input value="" type="number" class="form-control" name="totalAftertax"
                                        id="totalAftertax" placeholder="Total" readonly>
                                </div>
                            </div>




                            <!--
        <div class="form-group">
            <label>Cantidad pagada: &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon currency">$</div>
                <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Cantidad pagada">
            </div>
        </div>

        <div class="form-group">
            <label>Cantidad debida: &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon currency">$</div>
                <input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Cantidad debida">
            </div>
        </div>
-->

                        </span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </form>

        @endif
        <!--from-->

    </div>
    </div>
</body>



</html>
