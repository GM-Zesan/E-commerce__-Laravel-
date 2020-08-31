@extends('layout/template')
@section('title')
    Order_Details
@endsection
@section('content')
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Order Details
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-3 m-lr-auto mb-5">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{ (!empty($user->image))?'../'.$user->image:
                                url('public/frontend/images/about-01.jpg') }}" alt="IMG">
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<table class="table table-striped table-bordered table-responsive stext-106 txt-center" style="line-height: 2; border: 2px solid #ddd;">
                        <tr>
                            <td><strong>Billing Info : </strong></td>
                            <td colspan="2">
                                <strong>Name :</strong>{{ $order['shipping']['name'] }}
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Mobile No. :</strong>{{ $order['shipping']['mobile'] }}<br>
                                <strong>E-Mail :</strong>{{ $order['shipping']['email'] }}&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Address :</strong>{{ $order['shipping']['address'] }}
                                <br>
                                <strong>Payment :</strong>
                                    {{ $order['payment']['payment_method'] }}
                                    @if($order['payment']['payment_method']=='Bkash')
                                        (Transaction no : {{ $order['payment']['transaction_no'] }})
                                    @endif
                            </td>
                        </tr>
                        <tr>
                           <td class="bg-dark text-light" colspan="3"><strong> Order Details</strong></td>
                        </tr>
                        <tr class="bg-info">
                            <td><strong>Product Name & Image :</strong></td>
                            <td><strong>Color & Size :</strong></td>
                            <td><strong>Quantity & Price :</strong></td>
                        </tr>
                        @foreach ($order['orderdetails'] as $details)
                            <tr>
                                <td>
                                    <img src="{{ URL::to($details['product']['products_image']) }}" alt="image" style="height: 100px; width:100px;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $details['product']['products_name'] }}
                                </td>
                                <td><strong>Color :</strong>
                                    {{ $details['color']['colors_name'] }}
                                    <br>
                                    <strong>Size :</strong>
                                    {{ $details['size']['sizes_name'] }}
                                </td>
                                <td>
                                    {{ $details->quantity }} *
                                    {{ $details['product']['products_price'] }} = 
                                    @php
                                        $subtotal = $details->quantity*$details['product']['products_price'];
                                    @endphp
                                    {{ $subtotal }}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="text-success">
                            <td colspan="2" class="text-right">
                                <strong>Grand Total :</strong>
                            </td>
                            <td><strong>{{ $order->total_price }}</strong></td>
                        </tr>
                    </table>
				</div>
			</div>
		</div>
	</section>
@endsection