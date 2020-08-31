@extends('backend/template')

@section('ttitle')
    Brand List
@endsection

@section('title')
    All Brand List
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brand as $key => $row)
                    @php
                        $count_brand = App\backendModel\Product::where('brands_id',$row->id)->count();
                    @endphp
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->brands_name }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('brand.edit',$row->id)}}"><i class="fa fa-edit"></i></a>
                            @if ($count_brand<1)
                                <a class="btn btn-sm btn-danger" href="{{route('brand.delete',$row->id)}}"> <i class="fa fa-trash"></i> </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection