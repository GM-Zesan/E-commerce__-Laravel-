@extends('backend/template')

@section('ttitle')
    Category List
@endsection

@section('title')
    All Category List
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cat as $key => $row)
                    @php
                        $count_cat = App\backendModel\Product::where('categories_id',$row->id)->count();
                    @endphp
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->categories_name }}</td>
                        <td>{{ $row->categories_slug }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('category.edit',$row->id)}}">
                                <i class="fa fa-edit"></i>
                            </a> 
                            <a class="btn btn-sm btn-info" href="{{route('category.view',$row->id)}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if ($count_cat<1)
                                <a class="btn btn-sm btn-danger" href="{{route('category.delete',$row->id)}}"> <i class="fa fa-trash"></i> </a>
                            @endif
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection