<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.header')
</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


    <div class="container">
        <h2 class="title">Lista De Productos </h2>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Productos
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/Productos">Lista de Productos</a></li>
                    <li><a href="/NuevoProducto">Crear Producto</a></li>
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
                    <th width="7%">Codigo Producto</th>
                    <th width="15%">Descripcion</th>
                    <th width="35%">Precio</th>

                </tr>
            </thead>





            @foreach ($productos as $producto)

            <tr>

                <td>{{$producto->idProducto}}</td>
                <td>{{$producto->Descripcion}}</td>
                <td>{{$producto->Precio}}</td>








                @if(Session::get('perfil')==1)

                <td><a href="/EditarProducto/{{$producto->idProducto}}" title="Imprimir Factura">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                    </a></td>


                <!-- <td><a href="/EliminarProducto/{{$producto->idProducto}}" title="Editar Factura"
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
