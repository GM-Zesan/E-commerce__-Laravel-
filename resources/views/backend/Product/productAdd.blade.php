@extends('backend/template')

@section('ttitle')
    Product Add
@endsection

@section('title')
    Add New Product
@endsection

@section('content')
    <div class="card col-md-11 ml-auto mr-auto">
        <div class="p-1">


            @if($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{route('product.data')}}" method="post" id="productform" enctype="multipart/form-data">
            @csrf
                <table class="form">
                    <div class="row">
                        <div class="form-group col-md-4 ml-auto mr-auto">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->categories_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4 ml-auto mr-auto">
                            <label for="brand">Brand</label>
                            <select name="brand" id="brand" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brands_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        <div class="form-group col-md-4 ml-auto mr-auto">
                            <label for="name">Product Name</label>
                            <input type="text" id="name" name="product_name" placeholder="Product Name" class="form-control"/>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 ml-auto mr-auto">
                            <label for="size">Size</label>
                            <div class="select2-danger">
                                <select name="size[]" id="size" class="form-control select2" multiple="multiple" data-placeholder="Select Size"  data-dropdown-css-class="select2-danger">
                                    @foreach($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->sizes_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6 ml-auto mr-auto">
                            <label for="color">Color</label>
                            <div class="select2-danger">
                                <select name="color[]" id="color" class="form-control select2" multiple="multiple" data-placeholder="Select Color"  data-dropdown-css-class="select2-danger">
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->colors_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 ml-auto mr-auto">
                            <label for="image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="image" class="custom-file-input"  name="product_image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <img id="showimage" src="{{url('public/backend/image/akun.png')}}" style="height: 85px; width:90px;" alt="logo">
                        </div>

                        <div class="form-group col-md-4 ml-auto mr-auto">
                            <label for="subimage">Sub Images</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="subimage" class="custom-file-input form-control" name="sub_image[]" multiple>
                                    <label class="custom-file-label" for="subimage">Choose file</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-2 ml-auto mr-auto">
                            <label for="price">Product Price</label>
                            <input type="number" id="price" name="product_price" placeholder="Product Price" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="sdesc">Short Description</label>
                            <textarea name="sdesc" class="form-control" id="sdesc"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="ldesc">Long Description</label>
                            <textarea name="ldesc" class="form-control textarea" id="ldesc" rows="4"></textarea>
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-info float-right mt-2" >S u b m i t</button>
                </table>
            </form>
        </div>
    </div>
    <!-- jquery-validation -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('#productform').validate({
                rules: {
                    category: {
                        required : true,
                    },
                    brand: {
                        required : true,
                    },
                    product_name: {
                        required : true,
                    },
                    product_price: {
                        required : true,
                    },
                    sdesc: {
                        required : true,
                    },
                },
                messages: {
                    
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
          //Initialize Select2 Elements
          $('.select2').select2()
      
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          });
        });
    </script>

    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>
@endsection