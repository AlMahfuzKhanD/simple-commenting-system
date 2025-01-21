@extends('frontend.layout')
@section('content')

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

    @endsection
