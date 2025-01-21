<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Post Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.html">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Blog Content -->
    <div class="container mt-5">
        <h1>Post Title</h1>
        <p class="text-muted">Category: Tech</p>
        <img src="https://via.placeholder.com/750x300" class="img-fluid mb-4" alt="Post Image">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada...</p>

        <hr>

        <!-- Comments Section -->
        <div class="mt-5">
            <h3>Comments</h3>
            <!-- Add a Comment -->
            <div class="mb-4">
                <textarea class="form-control mb-2" rows="3" placeholder="Write your comment..."></textarea>
                <button class="btn btn-primary">Post Comment</button>
            </div>

            <!-- Comment List -->
            <div class="mb-3">
                <div class="mb-2">
                    <strong>User1:</strong> This is a great post!
                    <button class="btn btn-link btn-sm text-danger">Edit</button>
                    <button class="btn btn-link btn-sm">Reply</button>
                </div>
                <div class="ms-4">
                    <strong>User2:</strong> I completely agree!
                    <button class="btn btn-link btn-sm text-danger">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0">© 2025 My Blog. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
