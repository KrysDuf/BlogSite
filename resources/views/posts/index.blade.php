@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div class="commandBar">
        <a href="/posts/create">
            <button class="btn btn-primary">New Post</button>
        </a>
    </div>
    <hr>
    @foreach($posts as $post)       
        <div class="card" style="padding:8px;">
            <a href="/posts/{{$post->id}}">
                <h1>{{$post->title}}</h1>
            </a>
            <h3>{{$post->body}}</h3>
            <h6>Post By: {{$post->postBy->name}}</h6>
            <h6>Created at: {{$post->created_at}}</h6>
            
            @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id)
                <div class="commandBar">
                    <a href="/posts/{{$post->id}}/edit">
                        <button class="btn btn-primary notToolbar">Edit</button>
                    </a>
                    <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary notToolbar" type="submit">Delete</button>
                    </form>
                </div>
                @endif
                
            @endif
            
        </div>      

    @endforeach
@endsection