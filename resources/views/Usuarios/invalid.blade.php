<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- jQuery -->


    <style type="text/css">
        /*	.login-form {
		width: 340px;
    	margin: 50px auto;
	}*/
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @include('layout.layout')
    <h1>{{$rsta}}</h1>
    <div class="row">
        <div class="col-xs-6">

            <div class="heading">
                <h2>Sistema facturación </h2>
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