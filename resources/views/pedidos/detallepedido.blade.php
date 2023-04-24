<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body>
    @include('layout.layout')






    <div class="container">
        <h4>Pedido</h4>
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

            <tr>
                <td>{{$pedido->idpedido}}</td>
                <td>{{$pedido->usuario}}</td>

                @if($pedido->Estado==1)
                <td>Pendiente</td>
                @endif

                @if($pedido->Estado==2)
                <td>Finalizado</td>
                @endif

                <td>{{$pedido->Mesa}}</td>
                <td>{{$pedido->horapedido}}</td>
                





        </table>

        <!--
                    <td><a href="#" id="" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
                  -->
        </tr>



        <h4>Productos De Pedido</h4>
        <table id="data-table" class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th width="15%">Pedido</th>
                    <th width="7%">Codigo Producto</th>
                    <th width="7%">Nombre Producto</th>
                    <th width="7%">Cantidad</th>
                    <th width="15%">Observaciones</th>



                </tr>
            </thead>





            @foreach($detallepedido as $detail)

            <tr>
                <td>{{$detail->IdPedido}}</td>
                <td>{{$detail->Idproducto}}</td>
                <td>{{$detail->Descripcion}}</td>
                <td>{{$detail->Cantidad}}</td>
                <td>{{$detail->observaciones}}</td>







                <!--
            <td><a href="#" id="" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
          -->
            </tr>

            @endforeach

        </table>
    </div>
</body>

</html>
