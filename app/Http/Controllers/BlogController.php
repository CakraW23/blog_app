<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
//     public function index(){
//         $blogs = Blog::all();
//         if (Auth::user()->roles[0]->name === 'admin') {
//             return view('blogs.blog',compact('blogs'));

//         }else {
//             return redirect('/401-Page');
//     }
// }

public function index($userId = null) {
    // Jika admin, filter blog berdasarkan user_id (jika ada)
    if (Auth::user()->roles[0]->name !== 'user') {
        // Jika $userId diberikan, ambil blog sesuai user tersebut
        if ($userId) {
            $blogs = Blog::where('user_id', $userId)->get();
        } else {
            // Jika tidak ada userId, ambil semua blog
            $blogs = Blog::all();
        }

        return view('blogs.blog', compact('blogs'));
    } else {
        return redirect('/401-Page');
    }
}


    public function create(){
        $blogs = Blog::all();
        return view('blogs.create', compact('blogs'));
    }

    public function store(Request $request){
        // Validate the request
        $request->validate([
            'title' =>'required|max:255',
            'content' =>'required',
        ]);

        $data = $request->all(); // Get all data
        $data['user_id'] = Auth::id(); // Get user id

        Blog::create($data);


        // Redirect to the blog index
        // return redirect()->back()->with('success', 'Blog created successfully');
        return redirect()->route('home')->with('success', 'Blog created successfully');
    }

    public function updatePage($id) {
        $blogs = Blog::all();
        $blog = Blog::where('id', $id)->first();
        if ($blog->user_id === Auth::id()) {
            return view('blogs.edit', compact('blog', 'blogs'));
        } else {
            return redirect('/403-Page');
        }
    }

    public function updateBlog(Request $request, $id) {
        $blog = Blog::find($id);
        if ($blog->user_id === Auth::id()) {
            $request->validate([
                'title' =>'required|max:255',
                'content' =>'required',
            ]);
            $blog->update($request->only(['title', 'content']));
            return redirect()->route('home')->with('success', 'Blog updated');
        } else {
            return redirect('/403-Page');
        }


    }

    public function destroy($id) {
        $blogs = Blog::find($id)->delete();

        return redirect()->route('home')->with('success', 'Blog Removed');
    }


    public function show($id){
        $blog = Blog::find($id);
        $oneblog = Blog::findOrFail($id);
        $blogs = Blog::all();
        $posts = $blog->posts;

        return view('blogs.show', compact('oneblog', 'blogs', 'posts'));
    }

    public function explore(){
    if (!Auth::check()) {
        return redirect('/login');
    }
    $blogs = Blog::all();
    // dd($blogs);
    return view('blogs.explore', compact('blogs'));
}


}
