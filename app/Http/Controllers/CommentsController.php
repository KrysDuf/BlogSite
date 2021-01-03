<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function create($id)
    {
        $post = Post::find($id);
        return view('comments.create', ['post' => $post]);
    }

    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'body' => 'required',
        // ]);

        $comment = new Comment;
        $comment ->user_id = auth()->user()->id;
        $comment ->post_id = $request->post_id;
        $comment ->body = $request->body;
     
        $comment ->save();

        return response()->json($comment);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);

        Comment::create([
            'body' => request('body'),
            'post_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        $post = Post::find($id);
        return view('posts.post', ['post' => $post]); 
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id); 
        $post ->title = $request->input('title');
        $post ->body = $request->input('body');
        $post ->save();

        return redirect("/posts/$id");
    }
    public function destroy($post_id, $comment_id)
    {
        $comment = Comment::find($comment_id); 
        $comment ->delete();
        return redirect("/posts/$post_id");       
    }
}
