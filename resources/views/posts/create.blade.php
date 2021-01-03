@extends('layouts.app')

@section('title')
    Create Post
@endsection

@section('content')
<form id="postForm" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" id="title" name="title" placeholder="title" class="form-control" />
    </div>
    <div class="form-group">
        <textarea id="body" name="body" placeholder="body" rows="10" class="form-control"></textarea>
    </div>
    <input type="file" id="image" name="image" />
    <br>
    <button class="btn btn-primary" style="margin-top:8px;" type="submit">Create Post</button>
</form>
@endsection