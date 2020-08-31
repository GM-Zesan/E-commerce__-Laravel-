@extends('backend/template')

@section('ttitle')
    Brand Add
@endsection

@section('title')
    Add New Brand
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


        <form action="{{route('brand.data')}}" method="post" style="width: 70%" class="ml-auto mr-auto" id="brandform" >
        @csrf
            <table class="form">
                <div class="form-group">
                    <label for="name">Brand Name</label>
                    <input type="text" id="name" name="brand" placeholder="Enter Brand Name" class="form-control"/>
                </div>
                 
                <button type="submit" class="btn btn-info float-right mt-2" >S u b m i t</button>
            </table>
        </form>
    </div>
    </div>
    <!-- jquery-validation -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('#brandform').validate({
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