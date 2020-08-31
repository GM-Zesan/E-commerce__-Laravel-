@extends('layout/template')
@section('title')
    Products
@endsection
@section('content')	
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140 mt-5">
		<div class="container mt-5">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
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
								<div class="flex-w p-t-4 m-r--5">
									<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $brand['brand']['brands_name'] }}" href="">
										{{ $brand['brand']['brands_name'] }}
									</button>
								</div>	
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
			<div class="flex-c-m flex-w w-full p-t-45">
				{{ $products->links() }}
			</div>
		</div>
	</section>
	
@endsection