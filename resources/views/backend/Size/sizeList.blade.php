@extends('backend/template')

@section('ttitle')
    Size List
@endsection

@section('title')
    All Size List
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Size Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($size as $key => $row)
                        @php
                            $count_size = App\backendModel\ProductSize::where('sizes_id',$row->id)->count();
                        @endphp
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row->sizes_name }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('size.edit',$row->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if ($count_size<1)
                                    <a class="btn btn-sm btn-danger" href="{{route('size.delete',$row->id)}}"> 
                                        <i class="fa fa-trash"></i> 
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection