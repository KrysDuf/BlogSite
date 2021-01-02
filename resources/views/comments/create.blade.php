@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
<form id="commentForm" action="{{route('comments.store', [$post->id])}}" method="post">
    @csrf
    <div class="form-group">
        <textarea id="body" name="body" placeholder="body" rows="10" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Comment</button>
</form>
@endsection