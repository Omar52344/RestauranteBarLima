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


        <form action="/ActualizarUsuarioXRol" id="invoice-form" method="POST" class="invoice-form" role="form">
            @csrf





            <div class="load-animate animated fadeInUp">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="title">Editar Usuario X Rol</h2>

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
                                <th width="15%">id Usuario X Rol</th>
                                <th width="38%">Usuario</th>
                                <th width="15%">Rol</th>
                                 

                            </tr>
                            <tr>
                                <td><input class="" type="checkbox"></td>

                                <td><input type="text" name="id" id="" class="form-control" autocomplete="off"
                                        value="{{$UsuarioXRol->Id_Usuario_X_Rol}}" required readonly ></td>

                               <td>
                                <select name="Usuario" id="Usuario" class="form-control" required>


                                @foreach ($usuarios as $usuario)

                                @if($usuario->id==$UsuarioXRol->IdUsuario)
                                              <option value="{{$usuario->id}}" selected>{{$usuario->usuario}}</option>


                                
                                @else 
                                          <option value="{{$usuario->id}}" >{{$usuario->usuario}}</option>

                                @endif
                                @endforeach
                                 </select>
                                 </td>

                               
                                 <td>
                                <select name="Rol" id="Sede" class="form-control" required>


                                @foreach ($roles as $rol)

                                @if($rol->IdRol==$UsuarioXRol->IdRol)
                                              <option value="{{$rol->idRol}}" selected>{{$rol->Descripcion_Rol}}</option>


                                
                                @else 
                                          <option value="{{$rol->idRol}}" >{{$rol->Descripcion_Rol}}</option>

                                @endif
                                @endforeach
                                 </select>
                                 </td>

                                          










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
