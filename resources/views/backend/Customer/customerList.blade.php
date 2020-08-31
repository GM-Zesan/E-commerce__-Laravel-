@extends('backend/template')

@section('ttitle')
Customer List
@endsection

@section('title')
    All Verified Customer List
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $row)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->mobile }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection