<!DOCTYPE html>
<html lang="en">

<head>

    @include('layout.header')

</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


    <div class="container">
        <h2 class="title">Lima 1850</h2>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Pedidos
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/Pedidos">Lista de Pedidos</a></li>
                    <li><a href="/CrearPedido">Crear Pedido</a></li>
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
                    <th width="7%">Pedido</th>
                    <th width="15%">Mesero</th>
                    
                    <th width="3%">Estado</th>
                    <th width="3%">Mesa</th>
                    <th width="35%">Fecha Pedido</th>
                  




                </tr>
            </thead>





            @foreach ($pedidos as $pedido)

            <tr>
                <td>{{$pedido->idpedido}}</td>

                <td>{{$pedido->usuario}}</td>


               
                 @if($pedido->Estado==1)
                <td>Pendiente</td>

                
               
                
                @endif

                @if($pedido->Estado==2)
                

                
               
                <td>Finalizado</td>
                @endif


                @if($pedido->Estado!=2 && $pedido->Estado!=1)
                

                
               
                <td>Sin Estado</td>
                @endif



                <td>{{$pedido->Mesa}}</td>
                <td>{{$pedido->horapedido}}</td>
               




                <td><a href="/DetallePedido/{{$pedido->idpedido}}" title="Editar Factura">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon glyphicon-zoom-in"></span></div>
                    </a></td>



                @if(Session::get('perfil')==1)

                <link href="" rel="stylesheet">
                <td><a href="/EditarPedido/{{$pedido->idpedido}}" title="Editar Factura">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                    </a></td>

                <!--<td><a href="/EliminarPedido/{{$pedido->idpedido}}" title="Editar Factura"
                        onclick="return confirm('Esta Seguro?')">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></div>
                    </a></td>
                    -->
                @endif

            </tr>

            @endforeach

        </table>
    </div>

    @endif
</body>

</html>
