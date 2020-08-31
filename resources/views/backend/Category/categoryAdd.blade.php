@extends('backend/template')

@section('ttitle')
    Category Add
@endsection

@section('title')
    Add New Category
@endsection

@section('content')
<div class="col-md-8 ml-auto mr-auto">
    <div class="card p-4">


        @if($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{route('category.data')}}" method="post" style="width: 70%" class="ml-auto mr-auto" id="catform" >
        @csrf
            <table class="form">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" id="name" name="category" placeholder="Enter Category Name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="slug">Category Slug</label>
                    <input type="text" id="slug" name="slug" placeholder="Enter Category Name" class="form-control"/>
                </div>
                 
                <button type="submit" class="btn btn-info float-right mt-2" >S u b m i t</button>
            </table>
        </form>
    </div>
    </div>
    <!-- jquery-validation -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('#catform').validate({
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