<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


    <div class="container">
        <h2 class="title"> Lista De Productos X Bodega </h2>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Productos X Bodega
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/ListaProductosXBodega">Lista Productos X Bodega</a></li>
                    <li><a href="/NuevoProductoXBodega">Crear Productos X Bodega</a></li>
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

                    
                    <th width="15%">Descripcion Bodega</th>
                    <th width="7%">Bodega</th>
                   
                    <th width="35%">Descripcion Producto</th>
                     <th width="35%">Producto</th>
                     <th width="35%">Cantidad</th>

                </tr>
            </thead>

            @foreach ($ProductosXBodega as $ProductoXBodega)

            <tr>

                
                <td>{{$ProductoXBodega->DescripcionBodega}}</td>
                <td>{{$ProductoXBodega->IdBodega}}</td>
                
                <td>{{$ProductoXBodega->Descripcion}}</td>
                <td>{{$ProductoXBodega->idProducto}}</td>
                
                <td>{{$ProductoXBodega->Cantidad}}</td>








                @if(Session::get('perfil')==1)

                <td><a href="/EditarProductoXBodega/{{$ProductoXBodega->id_Producto_X_Bodega}}" title="Editar Producto X Bodega">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                    </a></td>


                <td><a href="/EliminarProductoXBodega/{{$ProductoXBodega->id_Producto_X_Bodega}}" title="Eliminar Producto X Bodega"
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
