@extends('layout/template')
@section('title')
    Payment
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
				<a href="" class="stext-109 cl8 hov-cl1 trans-04">
					payment
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
									// use Cart;
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
										<form method="post" action="{{ route('cart.update.payment') }}">
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
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total Price
								</span>
							</div>

							<div class="size-209 p-t-1 pl-2">
                                :
								<span class="mtext-110 cl2 pl-2">
									{{ $total }} Tk
								</span>
							</div>
						</div>
					</div>
                    <form id="way" action="{{ route('payment.store') }}" method="post">
						@csrf
						
					{{-- @if(Session::get('message'))
						<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>{{ Session::get('message') }}</strong>
						</div>
					@endif --}}
						
					@foreach ($contents as $content)
						<input type="hidden" name="product_id" value="{{ $content->id }}">
					@endforeach

                        <input type="hidden" name="total_price" value="{{ $total }}">
                        <div class="text-center pt-4 pb-4 col-md-10 m-lr-auto">
							<h3 style="font-weight: bold; color:#717fe0;">Payment Method</h3>
							<div class="form-group">
								<select id="payment_method" class="form-control" name="payment_method" style="border-radius: 22px; height:50px">
									<option value="">Select Method</option>
									<option value="cash_on_delivery">Cash On Delivery</option>
									<option value="Bkash">Bkash</option>
								</select>
								<font style="color: red">
									{{ ($errors->has('payment_method'))?($errors->first('payment_method')):'' }}
								</font>
							</div>
                            <br>
                            <div class="show_field" style="display: none">
								<span>Bkash_No : 01770597767</span>
								
                                <input type="text" name="transaction_no" class="form-control" placeholder="Transaction No">
                            </div>
                        </div>
                        
						<button type="submit" class="flex-c-m stext-101 size-116 bg8 bor13 hov-btn3 trans-04 pointer m-lr-auto" style="width: 60%;">
							Continue
						</button>
                    </form>
				</div>
            </div>
		</div>
    </div>
    
    <script type="text/javascript">
        $(document).on('change','#payment_method',function(){
            var payment_method = $(this).val();
            if(payment_method == 'Bkash'){
                $('.show_field').show();
            }else{
                $('.show_field').hide();
            }
        });

	</script>
	
	<!-- jquery-validation -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#way').validate({
                rules: {
                    payment_method: {
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