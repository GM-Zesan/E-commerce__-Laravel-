@extends('layout/template')
@section('title')
    Shopping_Cart
@endsection
@section('content')
<style>
	.sss{
		float: left;
	}
	.s888{
		height: 40px;
		border: 1px solid #e6e6e6;
	}
</style>
    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-95 p-lr-0-lg">
			<a href="{{url('')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<a href="{{route('cart')}}" class="stext-109 cl8 hov-cl1 trans-04">
					Shoping Cart
				</a>
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart text-center">
								<tr class="table_head">
									{{-- <th class="column-1">Product</th> --}}
									<th class="column-1 text-center">Product</th>
									<th class="column-3 text-center">Price</th>
									<th class="column-4 text-center">Quantity</th>
									<th class="column-5 text-right">Total</th>
									<th class="column-5 text-center">Action</th>
								</tr>

								@php
									$contents = Cart::content();
									$total = 0;
								@endphp
								@foreach ($contents as $item)
								<tr class="table_row">
									<td class="column-1 ml-auto mr-auto">
										{{ $item->name }}
										<div class="how-itemcart1">
											<img src="{{url($item->options->image)}}" alt="IMG">
										</div>
									</td>
									<td class="column-3">{{ $item->price }} Tk</td>
									<td class="column-4">
										<form method="post" action="{{ route('update.cart') }}">
											@csrf
											<div>
												<input class="mtext-104 cl3 txt-center num-product form-control sss" id="qty" name="qty" value="{{ $item->qty }}" type="number">

												<input type="hidden" name="rowId" id="rowId" value="{{ $item->rowId }}">

												<input type="submit" class="flex-c-m stext-101 cl2 bg8 s888 hov-btn3 p-lr-15 trance-04 pointer m-tb-10" value="Update">
											</div>
										</form>
									</td>
									<td class="column-5 text-right">{{ $item->subtotal }} Tk</td>
									<td class="column-5 text-center">
										<a class="btn btn-danger" href="
										{{ route('delete.cart', $item->rowId) }}">
											<i class="fa fa-times"></i>
										</a>
									</td>
								</tr>
								
								@php
									$total += $item->subtotal;
								@endphp
									
								@endforeach
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									{{ $total }} Tk
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Free
								</p>
								
								<div class="p-t-15">
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="district" placeholder="Country">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="District">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Grand Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									{{ $total }} Tk
								</span>
							</div>
						</div>
						@if (@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)
							<a href="{{ route('check.out') }}">
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Proceed to Checkout
								</button>
							</a>
						@elseif (@Auth::user()->id != NULL && Session::get('shipping_id') != NULL)
							<a href="{{ route('customer.payment') }}">
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Proceed to Checkout
								</button>
							</a>
						@else
							<a href="{{ route('user.login') }}">
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Proceed to Checkout
								</button>
							</a>
						@endif
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection