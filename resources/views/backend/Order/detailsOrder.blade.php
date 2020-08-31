@extends('backend/template')

@section('ttitle')
    Order Details
@endsection

@section('title')
    Order Details Info
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered stext-106" style="line-height: 1.8;">
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
                <tr class="justify-content-center">
                   <td class="" colspan="3"><strong> Order Details :</strong></td>
                </tr>
                <tr class="bg-info">
                    <td><strong>Product Name & Image :</strong></td>
                    <td><strong>Color & Size :</strong></td>
                    <td><strong>Quantity & Price :</strong></td>
                </tr>
                @foreach ($order['orderdetails'] as $details)
                    <tr>
                        <td>
                            <img src="{{ URL::to($details['product']['products_image']) }}" alt="image" style="height: 50px; width:40px;">
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
@endsection