@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')

<form id="commentForm" action="{{route('comments.update', [$post->id, $comment->id])}}" method="POST">
    @csrf
    @method('PATCH')
    <input type="text" value="{{$post->body}}" id="body" name="body" placeholder="body" class="form-control"/>
    <button class="btn btn-primary" type="submit">Save Edit</button>
</form>
@endsection