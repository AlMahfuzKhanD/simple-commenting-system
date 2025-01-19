<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post - Read More</title>
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
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-4">Blog Post Title</h1>
                <img src="https://via.placeholder.com/750x300" class="img-fluid mb-4" alt="Post Thumbnail">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada.</p>
                <hr>
                
                <!-- Comments Section -->
                <div id="comments" class="mt-5">
                    <h3>Comments</h3>
                    <!-- Add Comment -->
                    <div class="mb-4">
                        <h5>Add a Comment</h5>
                        <textarea class="form-control mb-2" rows="3" placeholder="Write your comment..."></textarea>
                        <button class="btn btn-primary">Post Comment</button>
                    </div>
                    <hr>

                    <!-- Display Comments -->
                    <div class="comment">
                        <p><strong>User1:</strong> This is a great post! Thank you for sharing.</p>
                        <!-- Reply -->
                        <textarea class="form-control mb-2" rows="2" placeholder="Reply to this comment..."></textarea>
                        <button class="btn btn-secondary btn-sm">Reply</button>
                        <hr>
                        <!-- Nested Comment -->
                        <div class="ms-4">
                            <p><strong>User2:</strong> I completely agree with you!</p>
                        </div>
                    </div>
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
