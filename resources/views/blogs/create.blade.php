@extends('layouts.app')

@section('content')
{{-- @dd($blog) --}}
<div class="container">
    <h1>Create New Blog</h1>
    <!-- Menampilkan pesan status jika ada -->
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Formulir untuk membuat blog baru -->
    <form action="{{ route('addBlog') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Blog</button>
    </form>
</div>
@endsection
