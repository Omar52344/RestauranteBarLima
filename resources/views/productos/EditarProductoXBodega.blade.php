<!DOCTYPE html>
<html lang="en">

<head>
   @include('layout.header')
</head>

<body>
    @include('layout.layout')



    <title>Bar </title>


    <div class="container content-invoice">



        @if(Session::has('perfil'))


        <form action="/ActualizarProductosXBodega" id="invoice-form" method="POST" class="invoice-form" role="form">
            @csrf





            <div class="load-animate animated fadeInUp">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="title">Editar Productos X Bodega</h2>

                        <h2 class="title"></h2>
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
                                <th width="15%">id Producto X Bodega</th>
                                <th width="15%">Bodega</th>
                                <th width="25%">Producto</th>
                                <th width="10%">Cantidad</th>



                            </tr>
                            <tr>
                                <td><input class="" type="checkbox"></td>

                                <td><input type="text" name="id" id="" class="form-control" autocomplete="off"
                                        value="{{$ProductosXBodega->id_Producto_X_Bodega}}" required readonly ></td>

                               <td>
                                <select name="Bodega" id="Bodega" class="form-control" required>


                                @foreach ($bodegas as $bodega)

                                @if($bodega->Id_Bodega==$ProductosXBodega->IdBodega)

                                              <option value="{{$bodega->Id_Bodega}}" selected>{{$bodega->DescripcionBodega}}</option>


                                
                                @else 
                                              <option value="{{$bodega->Id_Bodega}}" >{{$bodega->DescripcionBodega}}</option>

                                @endif
                                @endforeach
                                 </select>
                                 </td>

                               
                                 <td>
                                <select name="Producto" id="Sede" class="form-control" required>


                                @foreach ($productos as $producto)



                                @if($producto->idProducto==$ProductosXBodega->IdProducto)
                                              <option value="{{$producto->idProducto}}" selected>{{$producto->Descripcion}}</option>


                                
                                @else 
                                           <option value="{{$producto->idProducto}}">{{$producto->Descripcion}}</option>

                                @endif
                                @endforeach
                                 </select>
                                 </td>

                                          

                                 <td><input type="number" name="Cantidad" id="" class="form-control" autocomplete="off"
                                        value="{{$ProductosXBodega->Cantidad}}" required  ></td>

                               








                            </tr>


                        </table>

                        <input type="submit" name="invoice_btn" value="Guardar Producto"
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
