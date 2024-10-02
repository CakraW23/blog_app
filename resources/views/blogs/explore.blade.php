@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Explore Blogs</h1>
    @if(isset($blogs) && $blogs->count())
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 col-lg-4 mb-4">
                    <div class="card">
                        <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($blog->title, 25, '...') }}</h5>
                                <p><small>Ditulis oleh: {{ $blog->user->name }}</small></p>
                                <p class="card-text">{{ Str::limit($blog->content, 50, '...') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada blog untuk dieksplorasi.</p>
    @endif
</div>
@endsection
