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

<body class="login-page" style="max-width: 450px;">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Reset Password</a>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-line row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-line row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required data-validation="strength" data-validation-strength="2">

                                
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-line row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">Reset Password</button>
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

    <script>
        $.validate({
          modules : 'security',
          onModulesLoaded : function() {
            var optionalConfig = {
              fontSize: '12pt',
              padding: '4px',
              bad : 'Very bad',
              weak : 'Weak',
              good : 'Good',
              strong : 'Strong'
            };

          }
        });
        </script>

</body>

</html>
