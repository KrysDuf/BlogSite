@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    @foreach($posts as $post)       
        <div class="post">
            <a href="/posts/{{$post->id}}">
                <h2>{{$post->title}}</h2>
            </a>
            <h3>{{$post->body}}</h5>
            <h4>Post By: {{$post->postBy->username}}</h6>
            <h4>Created at: {{$post->created_at}}</h6>
        </div>      

    @endforeach
@endsection