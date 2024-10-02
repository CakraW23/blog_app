@extends('layouts.app')

@section('content')
{{-- Left card - Menu utama --}}
@if (Auth::check() && Auth::user()->roles[0]->name == 'user')


    <div class="container-xxl">
        <div class="row justify-content-center">
            {{-- Right Card --}}
            <div class="">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Menampilkan Blog --}}
                    <h3>Daftar Blog</h3>
                    @if(isset($blogs) && $blogs->count())
    <div class="row">
        @foreach($blogs as $blog)
            <div class="col-md-4 col-lg-4 mb-4">
                <div class="card">
                    <!-- Card link wrapper -->
                    <a href="{{ route('show_blog', $blog->id) }}" class="card-link text-decoration-none">
                        <div class="card-body text-black">
                            <h5 class="card-title">{{ Str::limit($blog->title, 25, '...') }}</h5>
                            <p><small>Ditulis oleh: {{ $blog->user->name }}</small></p>
                            <p class="card-text">{{ Str::limit($blog->content, 37, '...') }}</p>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="d-flex gap-2">
                            <a href="{{ route('UpdatePage', $blog->id) }}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
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

                </div>
            </div>
        </div>
    </div>
@endif

@if (Auth::user()->roles[0]->name == 'admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h1>Users Accounts</h1>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($users) && $users->count())
                            @foreach($users as $user)
                                @if($user->roles->first()->name !== 'admin')
                                    <tr>
                                        <td><a class="text-black" href="{{ route('blogs', $user->id) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->isNotEmpty() ? $user->roles->first()->name : 'No Role Assigned' }}</td>
                                        <td>
                                            <form action="{{ route('userDelete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No users found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>


        <!-- Modal for User Details John Doe -->
        {{-- <div class="modal fade" id="userDetailModalJohn" tabindex="-1" aria-labelledby="userDetailModalLabelJohn" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userDetailModalLabelJohn">User Details: John Doe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Username:</strong> john_doe</p>
                        <p><strong>Email:</strong> john@example.com</p>
                        <p><strong>Role:</strong> Admin</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> --}}
@endif
@endsection
