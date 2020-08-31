@extends('backend/template')

@section('ttitle')
    Brand Update
@endsection

@section('title')
    Add New Brand
@endsection

@section('content')
    <div class="block copyblock"> 


        @if($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('brand.update' , $brand->id) }}" method="post" style="width: 70%" class="ml-auto mr-auto" id="brandupdateform">
        @csrf
            <table class="form">

                <div class="form-group">
                    <label for="name">Brand Name</label>
                    <input type="text" id="name" name="brand" value="{{ $brand->brands_name }}" class="form-control"/>
                </div>

                <a href="{{ route('brand.list') }}">
                    <button type="button" class="btn btn-info float-left mt-2">
                        B a c k
                    </button>
                </a>
                <button type="submit" class="btn btn-info float-right mt-2">
                    U p d a t e
                </button>
            </table>
        </form>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#brandupdateform').validate({
                rules: {
                    brand: {
                        required : true,
                        minlength: 3,
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
@endsection