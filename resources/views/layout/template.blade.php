<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ecommerce | @yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('public/frontend')}}/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	

	<link rel="stylesheet" href="{{asset('public/frontend')}}/vendor/toastr.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/util.css">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/vendor/bootstrap/css/bootstrap.min.css">

	
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend')}}/css/main.css">

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
			height: 481px;
			background-color: transparent;
			overflow-x: hidden;
			padding-top: 20px;
			margin-top: 50px;
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
				position: absolute;
				/* z-index: 1; */
				top: 0;
				left: 0;
			}
			.login-form{
					margin-top: 25%;
					margin-bottom: 15%;
			}
			.register-form{
				margin-top: 5%;
			
		}


		.login-main-text{
			margin-top: 26%;
			padding: 70px;
			color: #000;
		}

		.login-main-text h2{
			font-weight: 300;
		}

		.btn-dark{
			background-color: #000 !important;
			color: #fff;
		}
	</style>
</head>
<body class="animsition">

    @include('layout/header')
    @yield('slider')
	@yield('banner')
    @yield('content')
    @include('layout/footer')
    
	

<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/slick/slick.min.js"></script>
	<script src="{{asset('public/frontend')}}/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/sweetalert/sweetalert.min.js"></script>

	<!-- jquery-validation -->
	<script src="{{asset('public/frontend')}}/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="{{asset('public/frontend')}}/vendor/jquery-validation/additional-methods.min.js"></script>
	<!-- jquery-validation -->


	<!-- On Page Image Show -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showimage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });

        </script>

    <!-- On Page Image Show -->


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


	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('public/frontend')}}/js/main.js"></script>

</body>
</html>