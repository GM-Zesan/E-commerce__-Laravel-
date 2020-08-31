@extends('layout/template')
@section('title')
    Home
@endsection
@section('slider')
	<!-- slider  -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">

				@foreach ($slider as $slide)
					
					<div class="item-slick1" style="background-image: url({{ asset($slide->sliders_image) }});">
						<div class="container h-full">
							<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
								<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
									<span class="ltext-101 cl2 respon2">
										{{ $slide->sliders_first_title }}
									</span>
								</div>
									
								<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
									<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
										{{ $slide->sliders_second_title }}
									</h2>
								</div>
									
								<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
									<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										Shop Now
									</a>
								</div>
							</div>
						</div>
					</div>

				@endforeach
			</div>
		</div>
	</section>
	<!-- End slider  -->
@endsection
@section('banner')
	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{asset('public/frontend')}}/images/banner-01.jpg" alt="IMG-BANNER">

						<a href="{{ route('shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Women
								</span>

								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{asset('public/frontend')}}/images/banner-02.jpg" alt="IMG-BANNER">

						<a href="{{ route('shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Men
								</span>

								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{asset('public/frontend')}}/images/banner-03.jpg" alt="IMG-BANNER">

						<a href="{{ route('shop') }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Accessories
								</span>

								<span class="block1-info stext-102 trans-04">
									New Trend
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Banner -->
@endsection
@section('content')
    <!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All New Products
					</button>
					@foreach ($categories as $cat)
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $cat['category']['categories_name'] }}" href="">
							{{ $cat['category']['categories_name'] }}
						</button>	
					@endforeach
				</div>

				@include('layout.search')

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="flex-w flex-l-m filter-tope-group m-tb-10">
							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
								All Brands
							</button>
							
							@foreach ($brands as $brand)
								<button data-filter=".{{ $brand['brand']['brands_name'] }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="">
									{{ $brand['brand']['brands_name'] }}
								</button>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				@foreach ($products as $product)
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product['category']['categories_name'] }} {{ $product['brand']['brands_name'] }}">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{URL::to($product->products_image)}}" alt="IMG-PRODUCT">

								<a href="{{ route('quick.View',$product->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{ $product->products_name }}
									</a>

									<span class="stext-105 cl3">
										{{ $product->products_price }}
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{asset('public/frontend')}}/images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('public/frontend')}}/images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				

			</div>

			<!-- Load more -->
			{{-- <div class="flex-c-m flex-w w-full p-t-45">
					{{ $products->links() }}
			</div> --}}
		</div>
	</section>
	<!-- End Product -->
@endsection