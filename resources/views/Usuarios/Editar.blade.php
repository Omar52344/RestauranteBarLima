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


        <form action="/ActualizarUsuario" id="invoice-form" method="POST" class="invoice-form" role="form">
            @csrf





            <div class="load-animate animated fadeInUp">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="title">Editar Usuario</h2>

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
                                <th width="15%">id Usuario</th>
                                <th width="38%">Usuario</th>
                                <th width="15%">Email</th>
                                 <th width="15%">Password</th>

                            </tr>
                            <tr>
                                <td><input class="" type="checkbox"></td>

                                <td><input type="text" name="id" id="" class="form-control" autocomplete="off"
                                        value="{{$detalle->id}}" required readonly></td>
                                <td><input type="text" name="Usuario" id="" class="form-control" autocomplete="off"
                                        value="{{$detalle->usuario}}" required></td>
                                <td><input type="text" name="Email" id="" class="form-control quantity"
                                        value="{{$detalle->email}}" autocomplete="off" required></td>
                                <td><input type="text" name="Password" id="" class="form-control quantity"
                                        value="{{$detalle->Password}}" autocomplete="off" required></td>













                            </tr>


                        </table>

                        <input type="submit" name="invoice_btn" value="Guardar Usuario"
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
