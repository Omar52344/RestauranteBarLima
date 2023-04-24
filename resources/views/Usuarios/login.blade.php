<!DOCTYPE html>
<html lang="en">

<head>
@include('layout.header')
</head>

<body>
    @include('layout.layout')
    <div class="row">
        <div class="col-xs-6">

            <div class="heading">
                <h2>Bienvenido</h2>
            </div>
            <div class="login-form">
                <form action="/loginuser" method="POST">

                    @csrf
                    <h2 class="text-center">Iniciar Sesión</h2>
                    <div class="form-group">

                        <div class="alert alert-warning">

                        </div>

                    </div>
                    <div class="form-group">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Email address"
                            autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary" style="width: 100%;"> Acceder
                        </button>
                    </div>
                    <div class="clearfix">
                        <label class="pull-left checkbox-inline"><input type="checkbox"> Recordarme</label>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-xs-6">-</div>
    </div>
</body>

</html>