<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


    <div class="container">
        <h2 class="title">Lista De Usuarios X Rol</h2>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Usuarios X Rol
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/ListaUsuariosXRoles">Lista de Usuarios X Roles</a></li>
                    <li><a href="/NuevoUsuarioXRol">Crear Usuario X Rol</a></li>
                </ul>
            </li>


            <!-- <li class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Conectado:
          <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">Mi Cuenta</a></li>
          <li><a href="action.php?action=logout">Salir</a></li>
        </ul>
      </li>
  -->
        </ul>
        <br /><br /><br /><br />

        <table id="data-table" class="table table-condensed table-striped">
            <thead>
                <tr>

                    <th width="7%">Id Usuario</th>
                    <th width="15%">Usuario</th>
                    <th width="35%">Id Rol</th>
                    <th width="35%">Nombre Rol</th>
                    

                </tr>
            </thead>

            @foreach ($UsuariosXRol as $UsuarioXRol)

            <tr>

                <td>{{$UsuarioXRol->IdUsuario}}</td>
                <td>{{$UsuarioXRol->usuario}}</td>
                <td>{{$UsuarioXRol->IdRol}}</td>
                <td>{{$UsuarioXRol->Descripcion_Rol}}</td>









                @if(Session::get('perfil')==1)

                <td><a href="/EditarUsuarioXRol/{{$UsuarioXRol->Id_Usuario_X_Rol}}" title="Editar Usuario x Rol">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                    </a></td>


                <td><a href="/EliminarUsuarioXRol/{{$UsuarioXRol->Id_Usuario_X_Rol}}" title="Eliminar Usuario x rol"
                        onclick="return confirm('Esta Seguro?')">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></div>
                    </a></td>

                @endif


                <!--
           <td><a href="#" id="" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
      -->
            </tr>

            @endforeach



            

        </table>
    </div>

    @endif
</body>

</html>
