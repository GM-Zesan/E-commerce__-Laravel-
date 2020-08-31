@extends('layout/template')
@section('title')
    User Login
@endsection
@section('content')

    <div class="container">
        <div class="justify-content-center row" style="padding: 0px 10px;">
            <div class="col-md-6">
                <div class="login-form">
                    <h2 class="text-center mb-5" style="
                    color: #000;"><b>LOG-IN HERE</b></h2>
                    <form method="POST" action="{{ route('login') }}" style="width: 70%" class="m-lr-auto">
                        @csrf
                        @if(Session::get('message'))
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ Session::get('message') }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>E-Mail Address</label>

                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label>Password</label>

                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

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
                                </button>
                                <br>
                                No account yet? <a href="{{ route('user.signup') }}"> Signup</a>
                                <br>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link row" href="{{ route('password.request') }}">
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
@endsection