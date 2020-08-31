@extends('backend/template')

@section('ttitle')
    Color List
@endsection

@section('title')
    All Color List
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Color Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($color as $key => $row)
                    @php
                        $count_color = App\backendModel\ProductColor::where('colors_id',$row->id)->count();
                    @endphp
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->colors_name }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('color.edit',$row->id)}}"><i class="fa fa-edit"></i></a>
                            @if ($count_color<1)
                                <a class="btn btn-sm btn-danger" href="{{route('color.delete',$row->id)}}"> <i class="fa fa-trash"></i> </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection