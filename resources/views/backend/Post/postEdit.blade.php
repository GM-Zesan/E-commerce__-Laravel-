@extends('backend/template')

@section('ttitle')
    Post Add
@endsection

@section('title')
    Add New Post
@endsection

@section('content')
    <div class="block copyblock ml-auto mr-auto" style="line-height: 45px;"> 


        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data" style="width: 90%" class="ml-auto mr-auto" id="updatepostform">
            @csrf
            <table class="form"><p></p>
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" name="title" value="{{ $post->posts_title}}" class="form-control" />
                        </div>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <div class="form-group">
                            <select name="category" class="form-control">
                                @foreach($cat as $row)
                                    <option value="{{ $row->id }}" <?php if($row->id == $post->categoriesId){echo "selected";}?>>{{ $row->categories_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        @if($post->image)
                            <img id="showimage" src="{{ URL::to($post->image) }}" alt="image" style="height: 40px; width:60px;" >
                        @else
                            <img id="showimage" src="{{ URL::to('public/backend/image/akun.png') }}" alt="image" style="height: 40px; width:60px;" >
                        @endif

                        <input type="hidden" name="old_image" value="{{$post->image}}">
                        
                        <input type="file" id="image" name="image" class="form-control"/>
                    </td>
                </tr>


                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce form-control" name="details" rows="7">{{ $post->posts_details }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <button type="submit" class="btn btn-info float-right mt-2" >U p d a t e</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script>
        $(function () {
            $('#updatepostform').validate({
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