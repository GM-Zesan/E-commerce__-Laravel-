@extends('backend/template')

@section('ttitle')
Customer Draft
@endsection

@section('title')
    All Draft Customer List
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Customer Name</th>
                        <th>E-mail Address</th>
                        <th>Mobile No.</th>
                        <th>Signup status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                    @php
                        $created = new Carbon\Carbon($row->created_at);
                        $now = Carbon\Carbon::now();
                        $difference = ($created->diff($now)->days < 1)?"today":$created->diffForHumans($now);
                    @endphp
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->mobile }}</td>
                        <td>{{ $difference }}</td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{route('customer.delete',$row->id)}}"> <i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection