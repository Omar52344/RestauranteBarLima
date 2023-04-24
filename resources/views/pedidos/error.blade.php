
<!DOCTYPE html>
<html lang="en">

<head>

    @include('layout.header')

</head>

<body>
    @include('layout.layout')


    @if(Session::has('perfil'))


   <h3>error del pedido , articulo no disponible <p> {{$producto->idProducto}}</p> <p> {{$producto->Descripcion}} </p></h3>

    @endif
</body>

</html>
