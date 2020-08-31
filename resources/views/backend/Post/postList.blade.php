@extends('backend/template')

@section('ttitle')
    Post List
@endsection

@section('title')
    All Post List
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Post Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($post as $key => $row)
                    <tr class="odd gradeX">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->posts_title }}</td>
                        <td>{{ $row['category']['categories_name'] }}</td>
                        <td>
                            @if($row->image)
                                <img src="{{ URL::to($row->image) }}" alt="image" style="height: 40px; width:60px;" >
                            @else
                                <img src="{{ URL::to('public/backend/image/akun.png') }}" alt="image" style="height: 40px; width:60px;" >
                            @endif
                        </td>
                        <td>
                            <a href="{{route('post.edit',$row->id)}}">Edit</a> || 
                            <a href="{{route('post.view',$row->id)}}">View</a> || 
                            <a href="{{route('post.delete',$row->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>   
            <br>
        </div>
    </div>
@endsection