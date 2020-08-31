@extends('backend/template')

@section('ttitle')
    Category Update
@endsection

@section('title')
    Add New Category
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


        <form action="{{ route('category.update' , $cat->id) }}" method="post" style="width: 70%" class="ml-auto mr-auto" id="catupdateform">
        @csrf
            <table class="form">

                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" id="name" name="category" value="{{ $cat->categories_name }}" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="slug">Category Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ $cat->categories_slug }}" class="form-control"/>
                </div>

                <a href="{{ route('category.list') }}">
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
            $('#catupdateform').validate({
                rules: {
                    category: {
                        required : true,
                        minlength: 3,
                    },
                    slug: {
                        required: true,
                        minlength: 3
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