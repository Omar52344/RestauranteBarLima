<!DOCTYPE html>
<html lang="en">

<head>
      @include('layout.header')
</head>

<body>
    @include('layout.layout')



    <title>baulphp : Sistema facturación </title>


    <div class="container content-invoice">



        @if(Session::has('perfil'))


        <form action="/ActualizarProducto" id="invoice-form" method="POST" class="invoice-form" role="form">
            @csrf





            <div class="load-animate animated fadeInUp">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="title">Editar Producto</h2>

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
                                <th width="15%">Codigo Producto</th>
                                <th width="38%">Descripcion</th>
                                <th width="15%">Precio</th>

                            </tr>
                            <tr>
                                <td><input class="" type="checkbox"></td>

                                <td><input type="text" name="codigo" id="" class="form-control" autocomplete="off"
                                        value="{{$producto->idProducto}}" required readonly></td>
                                <td><input type="text" name="Descripcion" id="" class="form-control" autocomplete="off"
                                        value="{{$producto->Descripcion}}" required></td>
                                <td><input type="number" name="Precio" id="" class="form-control quantity"
                                        value="{{$producto->Precio}}" autocomplete="off" required></td>













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

<script src="{{ asset('js/invoice.js') }}"></script>

</html>
