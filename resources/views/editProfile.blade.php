@extends('layout/template')
@section('title')
    My_Profile
@endsection
@section('content')
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Welcome
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-50">
		<div class="container">
			
            <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data" id="editprofile">
                @csrf
                <div class="row">
                    <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                        <div class="how-bor1 ">
                            <div class="hov-img0">
                                <img id="showimage" src="{{ (!empty($editData->image))?$editData->image:
                                url('public/frontend/images/about-01.jpg') }}" alt="IMG">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title text-center"><strong>Change Your Information</strong></h1>
                            </div>
                            <div class="card-body pl-5 pr-5">
                                <div class="form-group">
                                    <strong><label>Name</label></strong>
                                    <input type="text" name="name" value="{{ $editData->name }}" class="form-control">

                                    <font style="color: red">
                                        {{ ($errors->has('name'))?($errors->first('name')):'' }}
                                    </font>
                                </div>
                                <div class="form-group">
                                    <strong><label>Email</label></strong>
                                    <input type="email" name="email" value="{{ $editData->email }}" class="form-control">

                                    <font style="color: red">
                                        {{ ($errors->has('email'))?($errors->first('email')):'' }}
                                    </font>
                                </div>
                                <div class="form-group">
                                    <strong><label>Mobile No.</label></strong>
                                    <input type="number" name="mobile" value="{{ $editData->mobile }}" class="form-control">

                                    <font style="color: red">
                                        {{ ($errors->has('mobile'))?($errors->first('mobile')):'' }}
                                    </font>
                                </div>
                                <div class="form-group">
                                    <strong><label>Image</label></strong>
                                    <input type="file" id="image" name="image" class="form-control">
                                    

                                    <input type="hidden" name="old_image" value="{{$editData->image}}">
                                </div>
                                <div class="form-group">
                                    <strong><label>Gender</label></strong>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" style="margin-left: 0;" name="gender" id="m" value="Male"{{ ($editData->gender=="Male")?"checked":"" }}>
                                        <label class="form-check-label" for="m">Male</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" style="margin-left: 0;" name="gender" id="f" value="Female"{{ ($editData->gender=="Female")?"checked":"" }}>
                                        <label class="form-check-label" for="f">Female</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" style="margin-left: 0;" name="gender" id="o" value="Other"{{ ($editData->gender=="Other")?"checked":"" }}>
                                        <label class="form-check-label" for="o">Other</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <strong><label>Address</label></strong>
                                    <input type="text" name="address" value="{{ $editData->address }}" class="form-control">

                                    <font style="color: red">
                                        {{ ($errors->has('address'))?($errors->first('address')):'' }}
                                    </font>
                                </div>
                                
                            <button type="submit" class="btn btn-block btn-dark">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
		</div>
    </section>

    <!-- jquery-validation -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#editprofile').validate({
                rules: {
                    name: {
                        required : true,
                    },
                    email: {
                        required : true,
                        email : true,
                    },
                    mobile: {
                        required : true,
                    },
                    address: {
                        required : true,
                    },
                },
                messages: {

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