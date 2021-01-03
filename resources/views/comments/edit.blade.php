@extends('layouts.app')

@section('title')
    Edit Comment
@endsection

@section('content')

<form id="commentForm" action="{{route('comments.update', [$comment->id])}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <textarea id="body" name="body" placeholder="body" rows="10" class="form-control">{{$comment->body}}</textarea>
    </div>
    <button class="btn btn-primary" type="submit">Save Edit</button>
</form>
@endsection