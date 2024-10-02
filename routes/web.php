<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

Route::get('/403-Page', function () {
    return view('errors.403');
});
// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Auth::routes();

// Blog routes
Route::middleware('auth')->group(function () {
    // Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/{userId?}', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
    Route::post('/addBlog', [BlogController::class, 'store'])->name('addBlog');
    Route::get('/createBlog', [BlogController::class, 'create'])->name('createBlog');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'updatePage'])->name('UpdatePage');
    Route::put('/blogs/{id}', [BlogController::class, 'updateBlog'])->name('blogUpdate');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogDelete');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/blogs/{blogId}/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/blogs/{blogId}/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->name('posts.editPage');
    Route::put('/posts/{postId}', [PostController::class, 'updatePost'])->name('posts.edit');
    Route::post('/comments/{postId}', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::delete('/user/{id}', [AdminController::class, 'destroy'])->name('userDelete');
    Route::get('/explore-blogs', [BlogController::class, 'explore'])->name('blogsExplore');


});

// Admin routes
Route::middleware('auth')->group(function () {
    Route::get('/viewblog', [AdminController::class, 'index'])->name('admin_blogs');
    Route::get('/showblog/{id}', [BlogController::class, 'show'])->name('show_blog');

});



// Post routes
Route::get('/posts', [PostController::class, 'index'])->name('posts');

