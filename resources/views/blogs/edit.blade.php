@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Blog</h1>

    <!-- Menampilkan pesan status jika ada -->
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Formulir untuk membuat blog baru -->
    <form action="{{ route('blogUpdate', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $blog->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit Blog</button>
    </form>
</div>
@endsection
