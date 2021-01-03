@extends('layouts.app')

@section('title')
    Post
@endsection

@section('content')
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <div class="commandBar">
                <a href="/posts/{{$post->id}}/edit">
                    <button class="btn btn-primary">Edit</button>
                </a>
                <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary" type="submit">Delete</button>
                </form>
            </div>
        @endif                  
    @endif
    <hr>
    <div class="card" style="padding:8px;">
        <div class="row" style="padding-bottom:8px;">
            @if($post->image != null)
                <div class="col-md-2">
                    <img src="/storage/{{$post->image}}" style="width: 100%">
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
    </div>

    @if(!Auth::guest())
    <div id="commentBar">
        <form id="commentForm">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <textarea id="body" name="body" placeholder="Add Comment" rows="3" class="form-control" style="margin-top: 8px; margin-left: 50px; max-width: 1000px;" ></textarea>
            <button id="testbtn" type="submit" class="btn btn-primary notToolbar" style="margin-top: 8px; margin-bottom: 8px; margin-left: 50px;">Comment</button>
        </form>
        <script type="application/javascript">
        $(document).ready(function(){
            $("#commentForm").submit(function(e){
                e.preventDefault();
                e.stopImmediatePropagation();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let post_id={{$post->id}};
                let body = $("#body").val();
                if(body == "" || body == null){
                    return false;
                }

                $.ajax({
                    method:"POST",
                    url:"{{route('comments.store')}}",      
                    data: {
                        post_id:post_id,
                        body:body
                    },
                    success:function(response){
                        location.reload();
                    }
                })
                return false;
            });
        });      
        </script> 
    </div>       
    @endif
    
    @foreach($post->comments->sortByDesc('created_at') as $comment)       
    <div class="card" style="padding:8px; margin-left: 50px">
        <h3>{{$comment->body}}</h3>
        <h6>Comment By: {{$comment->commentBy->name}}</h6>
        <h6>Replied at: {{$comment->created_at}}</h6>
        @if(!Auth::guest())
            @if(Auth::user()->id == $comment->user_id)
                <div class="commandBar">
                    <a href="/posts/{{$post->id}}/edit">
                        <button class="btn btn-primary notToolbar">Edit</button>
                    </a>
                    <form action="{{ route('comments.destroy', [$post->id, $comment->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary notToolbar" type="submit">Delete</button>
                    </form>
                </div>
            @endif
        @endif
    </div>      
    @endforeach
@endsection