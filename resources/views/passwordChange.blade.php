@extends('layout/template')
@section('title')
    Change_Password
@endsection
@section('content')
    <div class="container">
        <div class="justify-content-center row" style="padding: 0px 10px;">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                    <h2 class="text-center mb-5" style="
                    color: #000;"><b>Change Password</b></h2>
                    <form method="POST" id="pach" action="{{ route('password.update') }}" style="width: 70%" class="m-lr-auto">
                        @csrf
                        <div class="form-group">
                            <strong><label>Current Password</label></strong>

                            <input type="password" class="form-control" name="currentpassword">
                        </div>



                        <div class="form-group">
                            <strong><label>New Password</label></strong>

                            <input type="password" id="newpassword" class="form-control" name="newpassword">
                        </div>


                        <div class="form-group">
                            <strong><label>Confirm Password</label></strong>

                            <input type="password" class="form-control" name="confirmpassword">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 ml-0 offset-md-4">
                                <button type="submit" style="width: 158%" class="btn btn-block btn-dark">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#pach').validate({
                rules: {
                    currentpassword: {
                        required : true,
                    },
                    newpassword: {
                        required : true,
                    },
                    confirmpassword: {
                        equalTo : '#newpassword',
                    },
                },
                messages: {
                    confirmpassword: {
                        equalTo : 'Confirm password does not match',
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
@endsection