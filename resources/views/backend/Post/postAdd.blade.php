@extends('backend/template')

@section('ttitle')
    Post Add
@endsection

@section('title')
    Add New Post
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


            <form action="{{route('post.data')}}" id="postform" method="post" enctype="multipart/form-data">
                @csrf
                <table style="width:100%"><p></p>
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td  class="form-group">
                            <input type="text" name="title" placeholder="Enter Post Title..." class="form-control" />
                        </td>
                    </tr>
                
                    <tr>
                        <td>
                            <label for="category">Category</label>
                        </td>
                        <td class="form-group">
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Role</option>
                                @foreach($cat as $row)
                                    <option value="{{ $row->id }}">{{ $row->categories_name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td class="form-group">
                            <input type="file" id="image" name="image" class="form-control"/>
                        </td>
                        <td>
                            <img id="showimage" src="{{url('public/backend/image/akun.png')}}" style="height: 85px; width:90px;" alt="logo">
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td class="form-group">
                            <textarea class="form-control textarea" name="details" rows="5"></textarea>
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
            $('#postform').validate({
                rules: {
                    title: {
                        required : true,
                    },
                    category: {
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
