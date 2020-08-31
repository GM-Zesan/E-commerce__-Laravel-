@extends('backend/template')

@section('ttitle')
Approved Order
@endsection

@section('title')
    All Approved Order List
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <strong>
                            <th>Sl No.</th>
                            <th>Order No.</th>
                            <th>Total Amount</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </strong>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($approvedorders as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><strong>#</strong>{{ $order->order_no }}</td>
                            <td>BDT {{ $order->total_price }}</td>
                            <td>
                                {{ $order['payment']['payment_method'] }}
                                @if($order['payment']['payment_method']=='Bkash')
                                    (Transaction no : {{ $order['payment']['transaction_no'] }})
                                @endif
                            </td>
                            <td>
                                <strong>
                                    <span class="bg-success p-1">Approved</span>
                                </strong>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('details.order',$order->id) }}">
                                    <i class="fa fa-eye"></i>
                                    <span>View Details</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection