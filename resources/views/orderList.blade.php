@extends('layout/template')
@section('title')
    My_Order_List
@endsection
@section('content')
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			My Order
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-11 col-md-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{ (!empty($user->image))?$user->image:
                                url('public/frontend/images/about-01.jpg') }}" alt="IMG">
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<table class="table table-striped table-warning table-bordered text-center table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Order No.</th>
                                <strong>
                                    <th class="text-center">Total Amount</th>
                                    <th class="text-center">Payment Type</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </strong>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td><strong>#</strong>{{ $order->order_no }}</td>
                                    <td>BDT {{ $order->total_price }}</td>
                                    <td>
                                        {{ $order['payment']['payment_method'] }}
                                        @if($order['payment']['payment_method']=='Bkash')
                                            (Transaction no : {{ $order['payment']['transaction_no'] }})
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->status=='0')
                                            <span>Pending</span>
                                        @elseif($order->status=='1')
                                            <span>Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a title="View Details" class="btn btn-sm btn-info" href="{{ route('order.details',$order->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a title="Print" target="_blank" class="btn btn-sm btn-primary" href="{{ route('order.print',$order->id) }}">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</section>
@endsection