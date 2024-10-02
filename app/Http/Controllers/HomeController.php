<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::where('user_id',Auth::user()->id)->get();
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('home', compact('blogs', 'users', 'roles'));
        // dd($blogs);
    }



    // public function settings(Request $request, $id) {
    //     $blogs = Blog::find($id);  // Ambil blog berdasarkan ID
    // if (!$blogs) {
    //     abort(404);  // Jika blog tidak ditemukan, tampilkan halaman 404
    // }
    // return view('settings', compact('blog'));
    // }

    // public function userList($id){
    //     $users = User::all();
    //     dd($users);
    //     return view('home', compact('users'));
    // }

}
