@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    @if (Auth::user()->roles->contains("role", "poster"))                     
        <div class="commandBar">
            <a href="/posts/create">
                <button class="btn btn-primary">New Post</button>
            </a>
        </div>
    @endif  
    <hr>
    @foreach($posts as $post)       
        <div class="card" style="padding:8px;">
            <div class="row" style="padding-bottom:8px;">
                @if($post->image != null)
                    <div class="col-md-2">
                        <img src="/storage/{{$post->image->image}}" style="width: 100%">
                    </div>
                @endif
                <div class="col-md-9" style="margin-left: 20px">
                    <a href="/posts/{{$post->id}}">
                        <h1>{{$post->title}}</h1>
                    </a>
                    <h3>{{$post->body}}</h3>
                    <h6>Post By: {{$post->postBy->name}}</h6>
                    <h6>Created at: {{$post->created_at}}</h6>                  
                </div>
            </div>
            @if(!Auth::guest())      
                <div class="commandBar" >
                    @if(Auth::user()->id == $post->user_id)
                    <a href="/posts/{{$post->id}}/edit">
                        <button class="btn btn-primary notToolbar">Edit</button>
                    </a>
                @endif  
                @if(Auth::user()->id == $post->user_id or Auth::user()->roles->contains("role", "moderator"))
                    <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary notToolbar" type="submit">Delete</button>
                    </form>
                @endif 
                </div>                           
            @endif           
        </div>      
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{$posts->links()}}
        </div>
      </div>
    <div>
        
    </div>
@endsection
