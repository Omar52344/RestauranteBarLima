<!DOCTYPE html>
<html lang="en">

<head>

    @include('layout.header')

</head>

<body>
    @include('layout.layout')






    <div class="container">
        <h4>Factura</h4>
        <table id="data-table" class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th width="7%">Fecha</th>
                    <th width="7%">Hora</th>
                    <th width="7%">Forma De Pago</th>
                    <th width="7%">Mesero</th>
                    <th width="7%">Mesa </th>
                    <th width="7%">Clientes </th>
                    <th width="7%">Valor SS</th>
                    <th width="15%">% Descuento </th>
                    <th width="15%"> Descuento </th>
                    <th width="15%"> Subtotal </th>
                    <th width="15%"> Tasa Impuesto </th>
                    <th width="15%"> Monto Impuesto </th>
                    <th width="15%"> Servicio </th>
                    <th width="15%"> Total </th>
                    <th width="15%"> Observacion </th>


                </tr>
            </thead>

            <tr>
                <td>{{$factura->Fecha}}</td>
                <td>{{$factura->Hora}}</td>
                <td>{{$factura->FormaPago}}</td>
                <td>{{$factura->Mesero}}</td>
                <td>{{$factura->Mesa}}</td>
                <td>{{$factura->Clientes}}</td>
                <td>{{$factura->ValorSS}}</td>
                <td>{{$factura->Descuento}}</td>
                <td>{{$factura->ValorDescuento}}</td>
                <td>{{$factura->Subtotal}}</td>
                <td>{{$factura->TasaImpuesto}}</td>
                <td>{{$factura->MontoImpuesto}}</td>
                <td>{{$factura->Servicio}}</td>
                <td>{{$factura->Total}}</td>
                <td>{{$factura->Observacion}}</td>




        </table>

        <!--
                    <td><a href="#" id="" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
                  -->
        </tr>



        <h4>Productos De Factura</h4>
        <table id="data-table" class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th width="7%">Codigo</th>
                    <th width="7%">Cantidad</th>
                    <th width="15%">Descripcion</th>
                    <th width="15%">Precio</th>
                    <th width="15%">Total</th>

                </tr>
            </thead>





            @foreach($detalle as $detail)

            <tr>
                <td>{{$detail->idProducto}}</td>
                <td>{{$detail->Cantidad}}</td>
                <td>{{$detail->Descripcion}}</td>
                <td>{{$detail->Precio}}</td>
                <td>{{$detail->Total}}</td>





                <!--
            <td><a href="#" id="" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
          -->
            </tr>

            @endforeach

        </table>
    </div>
</body>

</html>