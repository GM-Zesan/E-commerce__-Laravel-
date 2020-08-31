@extends('backend/template')

@section('ttitle')
    Color Add
@endsection

@section('title')
    Add New Color
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


        <form action="{{route('color.data')}}" method="post" style="width: 70%" class="ml-auto mr-auto" id="colorform" >
        @csrf
            <table class="form">
                <div class="form-group">
                    <label for="name">Color Name</label>
                    <input type="text" id="name" name="color" placeholder="Enter Color Name" class="form-control"/>
                </div>
                 
                <button type="submit" class="btn btn-info float-right mt-2" >S u b m i t</button>
            </table>
        </form>
    </div>
    </div>
    <!-- jquery-validation -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('#colorform').validate({
                rules: {
                    color: {
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