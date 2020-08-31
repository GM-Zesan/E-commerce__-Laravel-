@extends('backend/template')

@section('ttitle')
Pending Order
@endsection

@section('title')
    All Pending Order List
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
                    @foreach ($pendingorders as $key => $order)
                        <tr class="{{ $order->id }}">
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
                                    @if ($order->status=='0')
                                            <span class="bg-warning p-1">Pending</span>
                                        @elseif($order->status=='1')
                                            <span class="bg-success p-1">Approved</span>
                                        @endif
                                </strong>
                            </td>
                            <td>
                                <a title="Approve" id="approve" class="btn btn-sm btn-success" href="{{route('app.order')}}" data-token="{{csrf_token()}}" data-id="{{$order->id}}">
                                    <i class="fa fa-check"></i> 
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection