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

    <h1></h1>

    <!-- Dropdown for Admin Options -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h1>Users Accounts</h1>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
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
                            <tr>
                                <td>john_doe</td>
                                <td>john@example.com</td>
                                <td>Admin</td>
                                <td>
                                <div class="" role="" aria-label="User Actions">
                                        <!-- Trigger for Modal -->
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#userDetailModalJohn">View Details</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        
                </div>
            </div>
        </div>
    
        <!-- Modal for User Details John Doe -->
        <div class="modal fade" id="userDetailModalJohn" tabindex="-1" aria-labelledby="userDetailModalLabelJohn" aria-hidden="true">
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
        </div>
    
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

@endsection