<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.header')
</head>

<body>
  @include('layout.layout')


  @if(Session::has('perfil'))


  <div class="container">
    <h2 class="title">Lista Facturas </h2>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Factura
          <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="/Facturas">Lista de Facturas</a></li>
          <li><a href="/NuevaFactura">Crear Factura</a></li>
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
          <th width="7%">Fac. No.</th>
          <th width="15%">Fecha Creación</th>
          <th width="35%">Forma de Pago</th>
          <th width="15%">Mesero</th>
          <th width="3%">Mesa</th>
          <th width="3%">Clientes</th>
          <th width="3%">Descuento</th>
          <th width="3%">Observacion</th>
        </tr>
      </thead>





      @foreach ($facturas as $factura)

      <tr>
        <td>{{$factura->idFactura}}</td>
        <td>{{$factura->Fecha}}</td>
        <td>{{$factura->FormaPago}}</td>
        <td>{{$factura->Mesero}}</td>
        <td>{{$factura->Mesa}}</td>
        <td>{{$factura->Clientes}}</td>
        <td>{{$factura->Descuento}}</td>
        <td>{{$factura->Observacion}}</td>
        <td><a href="/Imprimir/{{$factura->idFactura}}" title="Imprimir Factura">
            <div class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></div>
          </a></td>


        <td><a href="/Detalles/{{$factura->idFactura}}" title="Editar Factura">
            <div class="btn btn-primary"><span class="glyphicon glyphicon glyphicon-zoom-in"></span></div>
          </a></td>



        @if(Session::get('perfil')==1)
        <td><a href="/Editar/{{$factura->idFactura}}" title="Editar Factura">
            <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
          </a></td>

        <td><a href="/Eliminar/{{$factura->idFactura}}" title="Editar Factura" onclick="return confirm('Esta Seguro?')">
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