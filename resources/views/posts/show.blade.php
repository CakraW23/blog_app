@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ $post->title }}</h2>
    <p class="lead">{{ $post->content }}</p>

    <h5 class="mt-4">Comments</h5>
    @if($post->comments->count())
        <div class="list-group mb-4">
            @foreach($post->comments as $comment)
                <div class="list-group-item mb-3 border rounded shadow-sm">
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold mb-1">{{ $comment->user->name }}</p>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small> <!-- Waktu komentar -->
                    </div>
                    <p class="mb-0">{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary" role="alert">
            No comments yet.
        </div>
    @endif

    <h5 class="mt-4">Add Comment</h5>
    <form action="{{ route('comment.store', $post->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" placeholder="Add your comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
</div>
@endsection
