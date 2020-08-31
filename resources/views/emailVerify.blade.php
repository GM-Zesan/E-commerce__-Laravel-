<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Varification</title>
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/bootstrap/css/bootstrap.min.css">

    
    <link rel="stylesheet" href="{{asset('public/frontend')}}/vendor/toastr.min.css">
        
    <script src="{{asset('public/frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{asset('public/frontend')}}/vendor/jquery/jquery-3.2.1.min.js"></script>


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
            background-color: #000;
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
        }

        .login-main-text h2{
            font-weight: 300;
        }

        .btn-black{
            background-color: #000 !important;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidenav">
            <div class="login-main-text">
                <h2>Email <br>Verification</h2>
                <p>Login or register from here to access.</p>
            </div>
        </div>
        <div class="main justify-content-center row">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                    <h2 class="text-center mb-5"><b>Verify Your Email</b></h2>
                    <form method="POST" action="{{ route('verify.store') }}" id="verify">
                        @csrf

                        <div class="form-group">
                            <label>E-Mail Address</label>
                            <input type="email" class="form-control" name="email">
                            <font style="color: red">
                                {{ ($errors->has('email'))?($errors->first('email')):'' }}
                            </font>
                        </div>


                        <div class="form-group">
                            <label>Verification Code</label>
                            <input type="text" class="form-control" name="code">
                            <font style="color: red">
                                {{ ($errors->has('code'))?($errors->first('code')):'' }}
                            </font>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 ml-0 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <!-- jquery-validation -->
        <script src="{{asset('public/frontend')}}/vendor/jquery-validation/jquery.validate.min.js"></script>

        <script src="{{asset('public/frontend')}}/vendor/jquery-validation/additional-methods.min.js"></script>
        <!-- jquery-validation -->

        <script type="text/javascript">
            $(document).ready(function(){
                $('#verify').validate({
                    rules: {
                        email: {
                            required : true,
                            email : true,
                        },
                        code: {
                            required : true,
                        },
                    },
                    messages: {
                        email: {
                            required : 'Please enter email address',
                            email : 'Please enter valid email address',
                        },
                        code: {
                            required : 'Please enter your verification code',
                        },
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>
        <!-- jquery-validation -->



        <!-- toastr Messages are shown -->
        <script src="{{asset('public/frontend/vendor/toastr.min.js')}}" type="text/javascript"></script>

        <script>
            @if(Session::has('message'))
                var type="{{ Session::get('alert-type','info') }}"
                switch(type){
                    case 'info':
                        toastr.info("{{Session::get('message')}}");
                        break;
                    case 'success':
                        toastr.success("{{Session::get('message')}}");
                        break;
                    case 'warning':
                        toastr.warning("{{Session::get('message')}}");
                        break;
                    case 'error':
                        toastr.error("{{Session::get('message')}}");
                        break;
                }
            @endif
        </script>
        <!-- toastr Messages are shown -->
</body>
</html>