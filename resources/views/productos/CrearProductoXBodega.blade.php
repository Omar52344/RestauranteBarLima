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


        <form action="/AgregarProductosXBodega" id="invoice-form" method="POST" class="invoice-form" role="form">
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
                                
                                <th width="15%">Bodega</th>
                                <th width="25%">Producto</th>
                                <th width="10%">Cantidad</th>



                            </tr>
                            <tr>
                                <td><input class="" type="checkbox"></td>

                               

                               <td>
                                <select name="Bodega" id="Bodega" class="form-control" required>


                                @foreach ($bodegas as $bodega)

                               
                                              <option value="{{$bodega->Id_Bodega}}" >{{$bodega->DescripcionBodega}}</option>

                                
                                @endforeach
                                 </select>
                                 </td>

                               
                                 <td>
                                <select name="Producto" id="Sede" class="form-control" required>


                                @foreach ($productos as $producto)



                               
                                           <option value="{{$producto->idProducto}}">{{$producto->Descripcion}}</option>

                               
                                @endforeach
                                 </select>
                                 </td>

                                          

                                 <td><input type="number" name="Cantidad" id="" class="form-control" autocomplete="off"
                                        value="" required  ></td>

                               








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
