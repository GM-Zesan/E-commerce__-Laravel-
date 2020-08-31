@extends('backend/template')

@section('ttitle')
    Slider Add
@endsection

@section('title')
    Add New Slider
@endsection

@section('content')
    <div class="col-md-10 ml-auto mr-auto">
        <div class="card p-4" style="line-height: 45px;"> 


            @if($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{route('slider.data')}}" id="sliderform" method="post" enctype="multipart/form-data">
                @csrf
                <table style="width:100%"><p></p>
                    
                    <tr>
                        <td>
                            <label>Upload Slider Image</label>
                        </td>
                        <td class="form-group">
                            <input type="file" id="image" name="image" class="form-control"/>
                        </td>
                        <td>
                            <img id="showimage" src="{{url('public/backend/image/akun.png')}}" style="height: 85px; width:90px;" alt="slider">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>First Title</label>
                        </td>
                        <td  class="form-group">
                            <input type="text" name="ftitle" placeholder="Enter First Title..." class="form-control" />
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Second Title</label>
                        </td>
                        <td class="form-group">
                            <input type="text" name="stitle" placeholder="Enter Second Title..." class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <button type="submit" class="btn btn-info float-right mt-2" >S u b m i t</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- jquery-validation -->

    <script>
        $(function () {
            $('#sliderform').validate({
                rules: {
                    image: {
                        required : true,
                    },
                    ftitle: {
                        required : true,
                    },
                    stitle: {
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
@endsection
