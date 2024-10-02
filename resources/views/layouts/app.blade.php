<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyBlog</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom CSS cuyyy-->
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>


</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="https://cdn.pixabay.com/photo/2017/01/31/23/42/animal-2028258_640.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    MyBlog
                </a>

                <!-- Search Bar -->
                <form class="d-flex " style="margin-left: 270px; width: 400px;">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            </div>
        </nav>

        <!-- Layout dengan Sidebar dan Konten -->
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 bg-light" style="height: 100vh; position: sticky; top: 0; overflow-y: auto;">
                    <div class="pt-3 px-3">
                        <!-- Profile Section -->

                        <div class="profile mb-4">
                            <a href="#" class="d-flex justify-content-between align-items-center btn btn-light w-100" data-bs-toggle="collapse" data-bs-target="#profileCollapse" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2"></i> <!-- Profile Icon -->
                                    <span>{{ Auth::user()->name }}</span>
                                </div>
                                <i class="bi bi-chevron-down"></i> <!-- Icon Collapse -->
                            </a>
                            <div class="collapse mt-2" id="profileCollapse">
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="btn btn-outline-danger w-100 text-start" href="{{ route('logout') }}" onclick="if(confirm('Apakah Anda yakin ingin logout?')){ event.preventDefault(); document.getElementById('logout-form').submit(); }
                                        ">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>




                        <!-- Create New Blog -->
                        <ul class="nav flex-column">
                            @if (Auth::user()->roles[0]->name == 'user')
                                <li class="nav-item mb-3">
                                    <a class="nav-link btn btn-warning text-black w-100" href="{{route('createBlog')}}">
                                        + Create New Blog
                                    </a>
                                </li>


                                <!-- Your Blog Section with Collapse -->
                                <li class="nav-item mb-3">
                                    <a class="nav-link btn btn-warning text-black d-flex justify-content-between align-items-center w-100" href="#" data-bs-toggle="collapse" data-bs-target="#bloglist" aria-expanded="false">
                                        Your Blog
                                        <i class="bi bi-chevron-down"></i> <!-- Collapse icon -->
                                    </a>
                                    <div class="collapse mt-2" id="bloglist">
                                        <ul class="list-unstyled">
                                            {{-- @if(isset($blogs) && $blogs->count()) --}}
                                            @foreach($blogs as $blog)

                                            <li class=" nav-link btn btn-warning text-black d-flex justify-content-between">
                                                        <a href="{{ route('show_blog', $blog->id) }}" class="nav-link text-dark">{{ Str::limit($blog->title, 12, '...') }}</a>
                                                    </li>
                                                @endforeach
                                            {{-- @else --}}
                                                {{-- <li class="text-muted">No blogs available</li> --}}
                                            {{-- @endif --}}
                                        </ul>
                                    </div>
                                </li>

                                <!-- Explore Blogs -->
                                <li class="nav-item mb-3">
                                    <a class="nav-link btn btn-warning text-black w-100" href="{{ route('blogsExplore') }}">
                                        Explore Blogs
                                    </a>
                                </li>
                            @endif



                        </ul>
                    </div>
                </nav>






                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                    <!-- Tempat konten dinamis -->
                    @yield('content')
                </main>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
