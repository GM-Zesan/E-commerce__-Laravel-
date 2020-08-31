@extends('layout/template')
@section('title')
    Shipping_Information
@endsection
@section('content')
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Shipping
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
            <form action="{{ route('checkout.store') }}" method="post" id="shippinginfo">
                @csrf
                <div class="row">
                    <div class="col-md-6 m-lr-auto">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title text-center"><strong>Your Shipping Information</strong></h1>
                            </div>
                            <div class="card-body pl-5 pr-5">
                                <div class="form-group">
                                    <strong><label>Name</label></strong>
                                    <input type="text" name="name" class="form-control">

                                    <font style="color: red">
                                        {{ ($errors->has('name'))?($errors->first('name')):'' }}
                                    </font>
                                </div>
                                <div class="form-group">
                                    <strong><label>Email</label></strong>
                                    <input type="email" name="email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <strong><label>Mobile No.</label></strong>
                                    <input type="number" name="mobile" class="form-control">

                                    <font style="color: red">
                                        {{ ($errors->has('mobile'))?($errors->first('mobile')):'' }}
                                    </font>
                                </div>

                                <div class="form-group">
                                    <strong><label>Address</label></strong>
                                    <input type="text" name="address" class="form-control">

                                    <font style="color: red">
                                        {{ ($errors->has('address'))?($errors->first('address')):'' }}
                                    </font>
                                </div>
                                
                            <button type="submit" class="btn btn-block btn-dark">Submit</button>
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
            $('#shippinginfo').validate({
                rules: {
                    name: {
                        required : true,
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