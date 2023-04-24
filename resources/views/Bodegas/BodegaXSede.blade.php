<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


    <div class="container">
        <h2 class="title">Lista De Bodegas X Sede</h2>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Bodegas X Sede
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/ListaBodegasXSede">Lista Bodegas X Sede</a></li>
                    <li><a href="/NuevoBodegaXSede">Crear Bodega X Sede</a></li>
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
                   
                    <th width="35%">Descripcion Sede</th>
                     <th width="35%">Sede</th>
                    

                </tr>
            </thead>

            @foreach ($BodegasXSede as $BodegaXSede)

            <tr>

                
                <td>{{$BodegaXSede->DescripcionBodega}}</td>
                <td>{{$BodegaXSede->IdBodega}}</td>
                
                <td>{{$BodegaXSede->Descripcion_Sede}}</td>
                <td>{{$BodegaXSede->Id_Sede}}</td>
                









                @if(Session::get('perfil')==1)

                <td><a href="/EditarBodegaXSede/{{$BodegaXSede->Id_Bodega_X_Sede}}" title="Editar Bodega X Sede">
                        <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                    </a></td>


                <td><a href="/EliminarBodegaXSede/{{$BodegaXSede->Id_Bodega_X_Sede}}" title="Eliminar Bodega X Sede"
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
