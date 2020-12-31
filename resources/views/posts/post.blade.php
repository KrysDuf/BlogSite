@extends('layouts.app')

@section('title')
    Post
@endsection

@section('content')
    <div class="post">
        <h1>{{$post->title}}</h1>
        <h3>{{$post->body}}</h3>
        <h4>Post By: {{$post->postBy->username}}</h4>
        <h4>Created at: {{$post->created_at}}</h4>
    </div>
    
    <form action="comment", method="post">
        <div>
            <input id="body" type="text" >
            <button type="submit">Comment</button>
        <div>
    </form>
    
    @foreach($post->comments as $comment)       
    <div class="post" style="margin-left: 50px">
        <h3>{{$post->body}}</h3>
        <h4>Post By: {{$post->postBy->username}}</h4>
        <h4>Replied at: {{$post->created_at}}</h4>
    </div>      

    @endforeach
@endsection