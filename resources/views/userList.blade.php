@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyBlog Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
</head>

<body>

    <!-- Dropdown for Admin Options -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <!-- Admin Options Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="adminOptionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Search by
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="adminOptionsDropdown">
                            <li><a class="dropdown-item" href="/">Blogs</a></li>
                            <li><a class="dropdown-item" href="/">Posts</a></li>
                        </ul>
                    </div>

                    <!-- Optionally Add Additional Buttons -->
                    {{-- <div>
                        <button class="btn btn-primary">Blogs</button>
                        <button class="btn btn-info">Posts</button>
                    </div> --}}
                </div>
            </div>
        </div>

        <h1 class="mt-4">Blogs</h1>

        <!-- Horizontal Card Layout for Blogs -->
        @if(isset($blogs) && $blogs->count())
                        <div class="row">
                            @foreach($blogs as $blog)
                                <div class="col-md-4 col-lg-4">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ Str::limit($blog->title, 25, '...') }}</h5>
                                            <p><small>Ditulis oleh: {{ $blog->user->name }}</small></p>
                                            <p class="card-text">{{ Str::limit($blog->content, 37, '...') }}</p>
                                            <div class="d-flex gap-2">
                                                <form action="{{ route('blogDelete', $blog->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Anda Belum Membuat Blog</p>
                    @endif

        <h1 class="mt-4">Posts</h1>

            <!-- Horizontal Card Layout for Blogs -->
            <div class="container mt-3">
                <div class="row">
                    <!-- Example Blog Card 1 -->
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Jujutsu Kaisen</h5>
                                    <p class="card-text">Blog: Anime</p>
                                    <p class="card-text">JJKKkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Example Blog Card 2 -->


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

@endsection
