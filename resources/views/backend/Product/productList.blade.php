@extends('backend/template')

@section('ttitle')
    Product List
@endsection

@section('title')
    All Product List
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th width="6%">Serial No.</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $product['category']['categories_name'] }} </td>
                        <td>{{ $product['brand']['brands_name'] }}</td>
                        <td>{{ $product->products_name }}</td>
                        <td>{{ $product->products_price }}</td>
                        <td>
                            @if($product->products_image)
                                <img src="{{ URL::to($product->products_image) }}" alt="image" style="height: 90px; width:120px;" >
                            @else
                                <img src="{{ URL::to('public/backend/image/akun.png') }}" alt="image" style="height: 90px; width:120px;" >
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('product.edit',$product->id)}}"><i class="fa fa-edit"></i></a> 
                            <a class="btn btn-sm btn-info" href="{{route('product.view',$product->id)}}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-sm btn-danger" href="{{route('product.delete',$product->id)}}"> <i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection