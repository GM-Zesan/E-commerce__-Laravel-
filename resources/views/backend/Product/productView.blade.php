@extends('backend/template')

@section('ttitle')
    Product View
@endsection

@section('title')
    Product Details
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th class="pl-5">Category</th>
                        <td class="pl-5">{{ $product['category']['categories_name'] }}</td>
                    </tr>
                    <tr>
                        <th class="pl-5">Brand</th>
                        <td class="pl-5">{{ $product['brand']['brands_name'] }}</td>
                    </tr>
                    <tr>
                        <th class="pl-5">Product Name</th>
                        <td class="pl-5">{{ $product->products_name }}</td>
                    </tr>
                    <tr>
                        <th class="pl-5">Product Price</th>
                        <td class="pl-5">{{ $product->products_price }}</td>
                    </tr>
                    
                    <tr>
                        <th class="pl-5">Image</th>
                        <td class="pl-5">
                            @if($product->products_image)
                            <img src="{{ URL::to($product->products_image) }}" alt="image" style="height: 90px; width:120px;" >
                            @else
                                <img src="{{ URL::to('public/backend/image/akun.png') }}" alt="image" style="height: 90px; width:120px;" >
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="pl-5">Color</th>
                        <td class="pl-5">
                            @php
                                $c = App\backendModel\ProductColor::where('products_id', $product->id)->get();
                            @endphp
                            @foreach($c as $colors)
                                {{ $colors['color']['colors_name'] }},
                            @endforeach
                            
                        </td>
                    </tr>
                    <tr>
                        <th class="pl-5">Size</th>
                        <td class="pl-5">
                            @php
                                $s = App\backendModel\ProductSize::where('products_id', $product->id)->get();
                            @endphp
                            @foreach($s as $sizes)
                                {{ $sizes['size']['sizes_name'] }},
                            @endforeach
                            
                        </td>
                    </tr>
                    <tr>
                        <th class="pl-5">Sub Image</th>
                        <td class="pl-5">
                            @php
                                $sub = App\backendModel\ProductSubImage::where('products_id', $product->id)->get();
                            @endphp
                            @foreach($sub as $subimage)
                                <img src="{{ URL::to($subimage->sub_image) }}" alt="image" style="height: 50px; width:80px;" >
                            @endforeach
                            
                        </td>
                    </tr>
                    <tr>
                        <th class="pl-5">Short Description</th>
                        <td class="pl-5">{{ $product->products_short_desc }}</td>
                    </tr>
                    <tr>
                        <th class="pl-5">Long Description</th>
                        <td class="pl-5">{{ $product->products_long_desc }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection