@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>{{ $oneblog->title }}</h1>
    <p>{{ $oneblog->content }}</p>
</div>
@if (Auth::user()->roles[0]->name == 'user')
    <div class="d-flex justify-content-between">
        <a href="{{ route('posts.create', ['blogId' => $oneblog->id]) }}" class="btn btn-warning mt-4 mb-4 ms-auto rounded-pill px-4">+ Add Post</a>
    </div>
@endif

@if($posts->count())
@foreach($posts as $post)
<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>{{ $post->title }}</span>
        <div class="d-flex gap-2">
            @if (Auth::user()->roles[0]->name == 'user')
            <!-- Tambahkan logika untuk tombol edit dan hapus di sini -->
                <a href="{{ route('posts.editPage', $post->id) }}" class="ms-auto btn btn-outline-primary">
                    <i class="bi bi-pencil"></i>
                </a>
            @endif
            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </div>
    </div>
    <a href="{{route('post.show', $post->id)}}" class="card-link text-decoration-none text-black">
        <div class="card-body">
                <ul class="list-unstyled">
                        <li class="">
                            <p></p>
                            <p class="">{{ $post->content }}</p>

                            <div class="">
                                <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
    </a>
            @endforeach
    @else
        <p>Tidak ada post yang tersedia.</p>
    @endif
@endsection
