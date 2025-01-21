@extends('frontend.layout')
@section('content')
<div class="container mt-5">
        
    <div class="row">
        <!-- Posts Section -->
        <div class="col-md-8">
            <h1 class="mb-4">Blog Posts</h1>

            <!-- Blog Post Cards -->
            <div class="card mb-4">
                <img src="https://via.placeholder.com/750x300" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Post Title 1</h5>
                    <p class="card-text">A short description of the post content goes here...</p>
                    <a href="read-more.html" class="btn btn-primary">Read More</a>
                    <p class="text-muted mt-2">Category: Tech</p>
                </div>
            </div>
            <div class="card mb-4">
                <img src="https://via.placeholder.com/750x300" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Post Title 2</h5>
                    <p class="card-text">A short description of the post content goes here...</p>
                    <a href="read-more.html" class="btn btn-primary">Read More</a>
                    <p class="text-muted mt-2">Category: Lifestyle</p>
                </div>
            </div>
            <div class="card mb-4">
                <img src="https://via.placeholder.com/750x300" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Post Title 3</h5>
                    <p class="card-text">A short description of the post content goes here...</p>
                    <a href="read-more.html" class="btn btn-primary">Read More</a>
                    <p class="text-muted mt-2">Category: Education</p>
                </div>
            </div>
        </div>

        <!-- Filter and Stats Section -->
        <div class="col-md-4">
            <!-- Filter by Category -->
            <div class="mb-4">
                <h4>Filter by Category</h4>
                <select id="categoryFilter" class="form-select">
                    <option value="all">All Categories</option>
                    <option value="Tech">Tech</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Education">Education</option>
                </select>
            </div>

            <!-- Category Post Count -->
            <div class="mb-4">
                <h4>Category Stats</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tech
                        <span class="badge bg-primary rounded-pill">5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lifestyle
                        <span class="badge bg-primary rounded-pill">3</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Education
                        <span class="badge bg-primary rounded-pill">4</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection