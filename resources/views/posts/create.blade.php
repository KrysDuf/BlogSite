@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
<form action="{{route('posts.store')}}" method="post">
    @csrf
    <input id="title" type="text" class="form-control"/>
    <input id="body" type="text" class="form-control"/>
    <button type="submit">Comment</button>
</form>
@endsection