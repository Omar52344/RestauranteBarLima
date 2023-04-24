<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header3')
</head>

<body>
    @include('layout.layout')



    <title>baulphp : Sistema facturación </title>


    <div class="container content-invoice">



        @if(Session::has('perfil'))


        <form action="/NuevoPedido" id="invoice-form" method="POST" class="invoice-form" role="form">
            @csrf





            <div class="load-animate animated fadeInUp">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="title">Crear Pedido </h2>

                        <input type="text" id="bodega" value="{{Session::get('bodega')}}">
                        
                        <h2 class="title">Bienvenido </h2>
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

                                <th width="15%">Mesero</th>
                                <th width="15%">Mesa</th>
                                <!--
                                <th width="15%">Cocinero</th>-->




                            </tr>
                            <tr>
                                <td><input class="" type="checkbox"></td>



                                <td>

                                <select name="Mesero"  class="form-control" required>


                                @foreach ($meseros as $mesero)

                               
                                              <option value="{{$mesero->id}}">{{$mesero->usuario}}</option>


                                             
                                
                                @endforeach

                                 </select>


                                </td>




                                <td><input type="text" name="Mesa" id="" class="form-control" autocomplete="off"
                                        required></td>
                               <!-- <td><input type="number" name="Cocinero" id="" class="form-control quantity"
                                        autocomplete="off" required></td>-->





                            </tr>
                        </table>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover" id="invoiceItem">
                            <tr>
                                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                <th width="15%">Nombre Producto</th>
                                <!--<th width="15%" >Nombre Producto</th>-->
                                <th width="5%">Cantidad</th>
                                <th width="5%">Disponible</th>
                                <th width="5%">Precio</th>
                                <th width="5%">Total</th>
                                <th width="15%">Observaciones</th>
                            </tr>
                            <tr>

                                <td><input class="itemRow" type="checkbox"></td>

                                <td>

                                        <!--<input type="text" name="productCode_1" id="productCode_1" class="form-control"
                                        autocomplete="off" required>-->

                                        <select name="productCode_1" id="productCode_1" class="form-control" required>
                                        <option value="">Seleccione una opción</option>

                                        @foreach($productos as $producto)
                                        <option value="{{$producto->idProducto}}">{{$producto->Descripcion}}</option>
                                        @endforeach

                                        </select>
                                       


                                </td>


                                <!--<td><input type="text" name="productName_1" id="productName_1" class="form-control"
                                        autocomplete="off" required readonly style="display: none;"></td>-->

                                <td><input type="number" name="quantity_1" id="quantity_1" class="form-control quantity"
                                        autocomplete="off" required></td>

                                <td><input type="number" name="avaliable_1" id="avaliable_1" class="form-control avaliable"
                                        autocomplete="off" required readonly></td>

                                <td><input type="number" name="price_1" id="price_1" class="form-control price"
                                        autocomplete="off" required readonly></td>

                                        <td><input type="number" name="total_1" id="total_1" class="form-control total"
                                        autocomplete="off" required readonly></td>

                                <td><input type="text" name="Observaciones_1" id="" class="form-control total"
                                        autocomplete="off"></td>


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


                            <input type="submit" name="invoice_btn" value="Guardar Pedido"
                                class="btn btn-success submit_btn invoice-save-btm">





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
