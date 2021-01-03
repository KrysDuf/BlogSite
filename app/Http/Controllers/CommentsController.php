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

    public function edit($post_id, $comment_id)
    {
        $comment = Comment::find($comment_id);
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, $comment_id)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);

        $comment = Comment::find($comment_id); 
        $comment ->body = $request->input('body');
        $comment ->save();

        $post_id = $comment->commentOn->id;

        return redirect("/posts/$post_id");
    }
    public function destroy($post_id, $comment_id)
    {
        $comment = Comment::find($comment_id); 
        $comment ->delete();
        return redirect("/posts/$post_id");       
    }
}
