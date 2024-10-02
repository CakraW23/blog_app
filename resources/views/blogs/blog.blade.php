@extends('layouts.app')

@section('content')
@if(isset($blogs) && $blogs->count())
    <div class="row">
        @foreach($blogs as $blog)
            <div class="col-md-4 col-lg-4">
                <div class="card mt-4">
                    <a href="{{ route('show_blog', $blog->id) }}" class="text-decoration-none">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($blog->title, 25, '...') }}</h5>
                            <p><small>Ditulis oleh: {{ $blog->user->name }}</small></p>
                            <p class="card-text">{{ Str::limit($blog->content, 37, '...') }}</p>
                        </div>
                    </a>
                    <div class="card-footer">
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
        @endforeach
    </div>
@else
    <p>Belum ada blog untuk user ini</p>
@endif
@endsection
