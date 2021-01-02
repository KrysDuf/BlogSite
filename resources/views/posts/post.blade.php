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
        <h1>{{$post->title}}</h1>
        <h3>{{$post->body}}</h3>
        <h4>Post By: {{$post->postBy->name}}</h4>
        <h4>Created at: {{$post->created_at}}</h4>
    </div>
    
    <form action="route('posts.comment')", method="post">
        <div>
            @csrf
            <input id="body" name="body" placeholder="body" class="form-control" type="text" >
            <button class="btn btn-primary" type="submit">Comment</button>
        <div>
    </form>
    
    @foreach($post->comments->sortByDesc('created_at') as $comment)       
    <div class="card" style="padding:8px; margin-left: 50px">
        <h3>{{$comment->body}}</h3>
        <h4>Comment By: {{$comment->commentBy->name}}</h4>
        <h4>Replied at: {{$comment->created_at}}</h4>

    </div>      

    @endforeach
@endsection