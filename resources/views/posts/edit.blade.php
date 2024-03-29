@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')

<form id="postForm" action="{{route('posts.update', [$post->id])}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <input type="text" value="{{$post->title}}" id="title" name="title" placeholder="title" class="form-control" />
    </div>
    <div class="form-group">
        <textarea id="body" name="body" placeholder="body" rows="10" class="form-control">{{$post->body}}</textarea>
    </div>
    <button class="btn btn-primary" type="submit">Save Edit</button>
</form>
@endsection