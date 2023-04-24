<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


    <div class="container">
        <h2 class="title">Lista De Usuarios X Sede</h2>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Usuarios
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/ListaUsuariosXSede">Lista de Usuarios X Sede</a></li>
                    <li><a href="/NuevoUsuarioXSede">Crear Usuario X Sede</a></li>
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
                    <th width="35%">Id Sede</th>
                    <th width="35%">Nombre Sede</th>
                    

                </tr>
            </thead>

            @foreach ($UsuariosXSede as $UsuarioXSede)

            <tr>

                <td>{{$UsuarioXSede->Id_Usuario}}</td>
                <td>{{$UsuarioXSede->usuario}}</td>
                <td>{{$UsuarioXSede->Id_Sede}}</td>
                <td>{{$UsuarioXSede->Descripcion_Sede}}</td>









                @if(Session::get('perfil')==1)

                <td><a href="/EditarUsuarioXSede/{{$UsuarioXSede->Id_Usuario_X_Sede}}" title="Editar Usuario">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                    </a></td>


                <td><a href="/EliminarUsuarioXSede/{{$UsuarioXSede->Id_Usuario_X_Sede}}" title="Eliminar Usuario"
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
