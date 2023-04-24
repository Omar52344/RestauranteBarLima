<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


    <div class="container">
        <h2 class="title">Lista De Usuarios</h2>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Usuarios
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/Usuarios">Lista de Usuarios</a></li>
                    <li><a href="/NuevoUsuario">Crear Usuario</a></li>
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
                    <th width="35%">Email</th>
                    <th width="35%">Password</th>
                    

                </tr>
            </thead>





            @foreach ($usuarios as $usuario)

            <tr>

                <td>{{$usuario->id}}</td>
                <td>{{$usuario->usuario}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->Password}}</td>









                @if(Session::get('perfil')==1)

                <td><a href="/EditarUsuario/{{$usuario->id}}" title="Editar Usuario">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                    </a></td>


                <td><a href="/EliminarUsuario/{{$usuario->id}}" title="Eliminar Usuario"
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
