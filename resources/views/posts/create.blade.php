@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
<form id="postForm" action="{{route('posts.store')}}" method="post" enctype="multipart/data">
    @csrf
    <div class="form-group">
        <input type="text" id="title" name="title" placeholder="title" class="form-control" />
    </div>
    <div class="form-group">
        <textarea id="body" name="body" placeholder="body" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="file" id="image" name="image" placeholder="image" class="form-control"/>
    </div>
    <button class="btn btn-primary" type="submit">Comment</button>
</form>
@endsection