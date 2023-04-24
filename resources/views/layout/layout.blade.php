<div role="navigation" class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="" class="navbar-brand">Bar Lima 1850</a>
            <img src="{{ asset('img/logo.jfif') }}" style="width: 100px; height: 100px; border-radius: 50%;">

            <h4 class="active" style="border-radius:20px;border-color:white;
         border-style:solid;color:white;border-width:0.1px;text-align:center;font-family: serif;font-style:oblique">{{Session::get('usuario')}}</h4>

        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--<li class="active"><a href="/">Sucursales</a></li>
            <li class="active"><a href="/">Inventario</a></li>
            <li class="active"><a href="/">Recetas</a></li>
            -->

                <!--<li class="active"><a href="/Facturas">Facturas</a></li>-->

                

                @if(Session::get('perfil')==1)
                <li class="active"><a href="/Pedidos">Pedidos</a></li>
                <li class="active"><a href="/Facturas">Facturas</a></li>
                <li class="active " ><a href="/importar">Cargas</a style="border-radius:5px;"></li>
                <li class="active "><a href="/Productos">Productos</a></li>
                <li class="active"><a href="/Usuarios">Usuarios</a></li>
                 <li class="active"><a href="/ListaUsuariosXSede">Usuarios X Sede</a></li>
                 <li class="active"><a href="/ListaUsuariosXRoles">Usuarios X Roles</a></li>
                 <li class="active"><a href="/ListaBodegas">Bodegas</a></li>

                 <li class="active"><a href="/ListaBodegasXSede">Bodegas X Sede</a></li>
                 <li class="active"><a href="/ListaProductosXBodega">Productos X Bodega</a></li>
                 <li class="active"><a href="/ListaSedes">Sedes</a></li>
                @endif

                @if(Session::get('perfil')==2)
                <li class="active"><a href="/Pedidos">Pedidos</a></li>
                @endif

                @if(Session::get('perfil')==3)
                <li class="active"><a href="/Pedidos">Pedidos</a></li>
                <li class="active"><a href="/Facturas">Facturas</a></li>
                <li class="active"><a href="/ListaProductosXBodega">Productos X Bodega</a></li>
                
                @endif

                @if(Session::has('perfil'))
                

                <form action="/logout" method="post">
                    @csrf
                    <li class="active"><a href=""><button class="active" type="submit">Cerrar Sesion</button></a></li>

                </form>
                @else
                <li class="active"><a href="/login">Ingresa</a></li>
                @endif

            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</div>
