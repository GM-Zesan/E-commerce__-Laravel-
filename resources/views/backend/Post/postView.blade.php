@extends('backend/template')

@section('ttitle')
    Post List
@endsection

@section('title')
    View A Single Post
@endsection

@section('content')
    <div class="col-md-6 ml-auto mr-auto">
        <div class="card p-3">        
            
            <h3>{{ $post->posts_title }}</h3></<h3>

            <p><b>Category</b> : {{ $post['category']['categories_name'] }}</p>
            
            @if($post->image)
                <img src="{{ URL::to($post->image) }}" alt="image" style="height: 90px; width:120px;" >
            @else
                <img src="{{ URL::to('public/backend/image/akun.png') }}" alt="image" style="height: 40px; width:60px;" >
            @endif
            
            <p><b>Post Details</b> : {{ $post->posts_details }}</p>
            <p><b>Created At</b> : {{ $post->created_at }}</p>
        </div>
        
    </div>
@endsection