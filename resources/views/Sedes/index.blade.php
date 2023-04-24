<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.header')
</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


    <div class="container">
        <h2 class="title">Lista De Sedes </h2>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Sedes
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/ListaSedes">Lista de Sedes</a></li>
                    <li><a href="/NuevoSede">Crear Sede</a></li>
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
                    <th width="7%">Id Sede</th>
                    <th width="15%">Descripcion Sede</th>
                    <th width="35%">Direccion</th>

                </tr>
            </thead>





            @foreach ($sedes as $sede)

            <tr>
                <td>{{$sede->Id_Sede}}</td>
                <td>{{$sede->Descripcion_Sede}}</td>
                <td>{{$sede->Direccion}}</td>
               








                @if(Session::get('perfil')==1)

                <td><a href="/EditarSede/{{$sede->Id_Sede}}" title="Imprimir Factura">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                    </a></td>


                <!-- <td><a href="/EliminarProducto/{{$sede->Id_Sede}}" title="Editar Factura"
                        onclick="return confirm('Esta Seguro?')">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></div>
                    </a></td>

                @endif-->


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
