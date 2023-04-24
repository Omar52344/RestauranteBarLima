<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header3')
</head>

<body>
    @include('layout.layout')


    <div class="container content-invoice">



        <div class="container">


            @if(Session::has('perfil'))
            <h4>Pedido</h4>

            <form action="/ActualizarPedido" id="invoice-form" method="POST" class="invoice-form" role="form">
                @csrf
                <input type="text" id="bodega" value="{{Session::get('bodega')}}">

                <table id="data-table" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th width="7%">Pedido</th>
                            <th width="5%">Mesero</th>
                            
                            <th width="5%">Estado</th>
                            <th width="5%">Mesa</th>
                            <th width="10%">Fecha Pedido</th>
                            

                        </tr>
                    </thead>

                    <tr>



                        <td><input type="text" name="idpedido" id="" class="form-control" autocomplete="off"
                                value="{{$pedido->idpedido}}" required readonly></td>


                        <!--<td><input type="text" name="Mesero" id="" class="form-control" autocomplete="off"
                                value="{{$pedido->Mesero}}" required></td>
                                -->

                                 <td>
                                <select name="Mesero" id="Usuario" class="form-control" required>


                                @foreach ($meseros as $mesero)

                                @if($pedido->Mesero==$mesero->IdUsuario)


                                              <option value="{{$mesero->IdUsuario}}" selected>{{$mesero->usuario}}</option>


                                
                                @else 
                                          <option value="{{$mesero->IdUsuario}}">{{$mesero->usuario}}</option>

                                @endif
                                @endforeach
                                 </select>
                                 </td>






                                
                                 <td>
                                <select name="Estado" id="Usuario" class="form-control" required>


                                

                                


                                              <option value="1" selected>Pendiente</option>
                                              <option value="2">Finalizado</option>

                                
                               
                                          

                               
                                 </select>
                                 </td>

                        <td><input type="text" name="Mesa" id="Descuento" class="form-control total"
                                value="{{$pedido->Mesa}}" autocomplete="off" required></td>
                        <td><input type="text" name="horapedido" id="" class="form-control total"
                                value="{{$pedido->horapedido}}" autocomplete="off" required readonly></td>

                        






                </table>

                <!--
                    <td><a href="#" id="" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
                  -->
                </tr>








                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover" id="invoiceItem">
                            <tr>
                                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                               
                                <th width="15%">Nombre Producto</th>
                                <th width="1%">Cantidad</th>
                                <th width="1%">Disponible</th>
                                <th width="5%">Precio</th>
                                <th width="5%">Total</th>
                                <th width="15%">Observaciones</th>
                            </tr>
                            @php

                            $conteo=1;
                            @endphp

                            @foreach($detallepedido as $detail)
                            <tr>

                                <td><input class="itemRow" type="checkbox"></td>



                               

                                <td>


                               
                                        <input type="text" name="productCode_{{$conteo}}" id="productCode_{{$conteo}}" class="form-control" value="{{$detail->Idproducto}}" readonly style="display:none;">

                                        <input type="text" name="productDes_{{$conteo}}" id="productDes_{{$conteo}}" class="form-control" value="{{$detail->Descripcion}}" readonly>
                                        


                                 </td>

                                <td><input type="number" name="quantity_{{$conteo}}" id="quantity_1"
                                        class="form-control quantity" value="{{$detail->Cantidad}}" autocomplete="off"
                                        required readonly></td>

                                <td><input type="number" name="avaliable_{{$conteo}}" id="avaliable_{{$conteo}}" class="form-control avaliable"
                                     value="{{$detail->Cantidad}}"   autocomplete="off" required readonly style="display:none;"> </td>


                                <td><input type="number" name="price_{{$conteo}}" id="price_1"
                                        class="form-control price" value="{{$detail->Precio}}" autocomplete="off"
                                        required readonly></td>

                                <td><input type="number" name="total_{{$conteo}}" id="total_1"
                                        class="form-control total" value="{{$detail->Total}}" autocomplete="off"
                                        required readonly></td>

                                <td><input type="text" name="Observaciones_{{$conteo}}" id="" class="form-control total"
                                        value="{{$detail->observaciones}}" autocomplete="off" readonly></td>


                            </tr>

                            @php

                            $conteo++
                            @endphp

                            @endforeach
                        </table>
                    </div>
                </div>





                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    
                        <!--<button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button>-->
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









            <!--
            <td><a href="#" id="" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
          -->





            @endif


        </div>

    </div>
</body>


</html>
