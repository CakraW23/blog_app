<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blog', compact('blogs'));
    }

    public function destroy($id) {
        $user = User::findOrFail($id);

        // memastikan hanya menghapus user (non-admin)
        if ($user->roles->first()->name !== 'admin') {
            $user->delete();
            return redirect()->route('home')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('home')->with('error', 'Cannot delete admin user');
        }
    }




}
