<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        $blogs = Blog::all();

        return view('blogs.show', compact('posts', 'blogs'));
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        $blogs = Blog::all();
        return view('posts.show', compact('post', 'blogs'));
    }

    public function create($blogId){
        $blogs = Blog::all();

        return view('posts.create', compact('blogId', 'blogs'));
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            return redirect('/401-Page');
        }
        $blogs = Blog::all();
        return view('posts.edit', compact('post', 'blogs'));
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $blogs = Blog::all();
        $blogId = $post->blog_id;
        $post->delete();

        return redirect()->route('blogs.show', $blogId)->with('success', 'Post removed successfully!');
    }


    public function store(Request $request, $blogId) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->blog_id = $blogId;
        $post->save();


        return redirect()->route('blogs.show', $blogId)->with('success', 'Post created successfully!');
    }

    public function updatePost(Request $request, $id)
{
    $post = Post::find($id);

    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    $post->update($request->only(['title', 'content']));

    return redirect()->route('blogs.show', $id)->with('success', 'Post updated successfully');
}






}
