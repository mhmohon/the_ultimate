<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Pasword Reset | UOG - Online Discussion Forum</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/plugins/bootstrap/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Waves Effect Css -->
    <link href="{{ asset('css/backend/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/backend/plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <!-- main Css -->
    <link href="{{ asset('css/backend/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/backend/custom.css') }}" rel="stylesheet">

</head>
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">UOG <b>Forum</b></a>
            <small>A Online Discussion Forum</small>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="body">
                {!! Form::open(['route'=>['password.email'],'name'=>'reset']) !!}
                
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>

                    <div class="input-group {{ $errors->has('email') ? 'has-error' : ''}} ">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Please insert your email">

                                
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" style="color:red">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                    
                        <div class="offset-md-2 col-md-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Send Password Reset Link</button>
                        </div>
                        <div class="row m-t-20 m-b--5 align-center">
                            <a href="{{ route('login') }}">Sign In!</a>
                        </div>
                    </div>

                    
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('js/backend/plugins/jquery/jquery.min.js') }}"></script>
    
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('js/backend/plugins/node-waves/waves.js') }}"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/plugins/bootstrap/bootstrap.js') }} "></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/backend/admin.js') }}"></script>

</body>

</html>
