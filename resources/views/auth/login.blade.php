<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('assets/paper_img/favicon.ico') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Educação</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="{{asset('bootstrap3/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/ct-paper.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/examples.css') }}" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="wrapper">
    <div class="register-background">
        <div class="filter-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                    <div class="register-card">
                        <h3 class="title">Bem Vindo</h3>
                        <form class="register-form form-horizontal" role="form" method="POST"  action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <button class="btn btn-danger btn-block">Logar-se</button>
                                <a href="{{route('password.request')}}" style="color:#FFF; float:left; margin-top:1em;">Recuperar Senha</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer register-footer text-center">
            <h6>&copy; Ano, <i class="fa fa-heart heart"></i> pela Empresa - Suporte (65) 00000-0000</h6>
        </div>
    </div>
</div>

</body>

<script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-ui-1.10.4.custom.min.js') }}"></script>
<script type="text/javascript" src="{{asset('bootstrap3/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/ct-paper-checkbox.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/ct-paper-radio.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/ct-paper.js') }}"></script>

</html>