<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | UOG - Online Discussion Forum</title>
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
        <div class="card">
            <div class="body">
                {!! Form::open(['route'=>['loginCheck'],'name'=>'login']) !!}
                
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group {{ $errors->has('email') ? 'has-error' : ''}} ">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line ">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" id="input-email" class="form-control" required autofocus>
                            @if ($errors->has('email'))
                              <span class="help-block">
                                <block>{{ $errors->first('email') }}
                                </block>
                              </span> 
                            @endif
                        </div>
                    </div>
                    <div class="input-group {{ $errors->has('email') ? 'has-error' : ''}} ">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" /> 

                            
                        </div>
                        @if ($errors->has('password'))
                          <span class="help-block">
                          <block>{{ $errors->first('password') }}</block></span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <div class="col-xs-6 col-md-12">
                                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    
                </form>
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