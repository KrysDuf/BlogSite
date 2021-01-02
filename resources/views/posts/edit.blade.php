@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')

<form id="postForm" action="{{route('posts.update', [$post->id])}}" method="POST">
    @csrf
    @method('PATCH')
    <input type="text" value="{{$post->title}}" id="title" name="title" placeholder="title" class="form-control"/>
    <input type="text" value="{{$post->body}}" id="body" name="body" placeholder="body" class="form-control"/>
    <button class="btn btn-primary" type="submit">Save Edit</button>
</form>
@endsection