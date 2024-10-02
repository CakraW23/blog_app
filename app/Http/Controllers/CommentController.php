<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId) {
        $request->validate([
            'content' => 'required',
        ]);

        $post = Post::findOrFail($postId);
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::id();
        $comment->post_id = $postId;
        $comment->save();

        return redirect()->route('post.show', $postId)->with('success', 'Comment added successfully');
    }

}
