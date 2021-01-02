@extends('layouts.app')

@section('title')
    Post
@endsection

@section('content')
    <div class="commandBar">
        <a href="/posts/{{$post->id}}/edit">
            <button class="btn btn-primary">Edit</button>
        </a>
        <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary" type="submit">Delete</button>
        </form>
    </div>
    <hr>
    <div class="card" style="padding:8px;">
        <div class="row" style="padding-bottom:8px;">
            @if($post->image != null){
                <div class="col-md-2">
                    <img src="/storage/{{$post->image}}d" style="width: 100%">
                </div>
            }
            @endif
            <div class="col-md-9" style="margin-left: 20px">
                <a href="/posts/{{$post->id}}">
                    <h1>{{$post->title}}</h1>
                </a>
                <h3>{{$post->body}}</h3>
                <h6>Post By: {{$post->postBy->name}}</h6>
                <h6>Created at: {{$post->created_at}}</h6>
                
                
            </div>
        </div>
    </div>
    <a href="/posts/{{$post->id}}/comment">
        <button class="btn btn-primary notToolbar" style="margin-top: 8px; margin-bottom: 8px; margin-left: 50px;">Comment</button>
    </a>
    
    @foreach($post->comments->sortByDesc('created_at') as $comment)       
    <div class="card" style="padding:8px; margin-left: 50px">
        <h3>{{$comment->body}}</h3>
        <h6>Comment By: {{$comment->commentBy->name}}</h6>
        <h6>Replied at: {{$comment->created_at}}</h6>
        <div class="commandBar">
            <a href="/posts/{{$post->id}}/edit">
                <button class="btn btn-primary notToolbar">Edit</button>
            </a>
            <form action="{{ route('comments.destroy', [$post->id, $comment->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary notToolbar" type="submit">Delete</button>
            </form>
        </div>
    </div>      

    @endforeach
@endsection