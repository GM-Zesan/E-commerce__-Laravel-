<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin_Login</title>
    
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/bootstrap/css/bootstrap.min.css">
        

    <script src="{{asset('public/frontend')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
    
    <script src="{{asset('public/frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>


    <style rel="stylesheet" type="text/css">
        body {
            font-family: "Lato", sans-serif;
        }
        .main-head{
            height: 150px;
            background: #FFF;
        
        }

        .sidenav {
            height: 100%;
            background-color: #540101;
            overflow-x: hidden;
            padding-top: 20px;
        }


        .main {
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
        }

        @media screen and (max-width: 450px) {
            .login-form{
                margin-top: 10%;
            }

            .register-form{
                margin-top: 10%;
            }
        }

        @media screen and (min-width: 768px){
            .main{
                margin-left: 40%; 
            }

            .sidenav{
                width: 40%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
            }
            .login-form{
                    margin-top: 20%;
            }
            .register-form{
                margin-top: 5%;
            
            }


        .login-main-text{
            margin-top: 20%;
            padding: 60px;
            color: #fff;
            font-weight: bold;
        }

        .login-main-text h2{
            font-weight: 300;
        }
        .btn-dark{
			background-color: #540101 !important;
			color: #fff;
		}
    </style>
</head>
<body>
    <div class="container">
        <div class="sidenav">
            <div class="login-main-text">
                <h2>Admin<br> Login Page</h2>
                <p>Login or register from here to access.</p>
            </div>
        </div>
        <div class="main justify-content-center row">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                    <h2 class="text-center mb-5" style="color: #540101;"><b>ADMIN LOG-IN</b></h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if(Session::get('message'))
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ Session::get('message') }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-left">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 ml-0 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Login') }}
                                </button> <br>

                                @if (Route::has('password.request'))
                                    <a style="color: #540101;" class="btn btn-link row" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>