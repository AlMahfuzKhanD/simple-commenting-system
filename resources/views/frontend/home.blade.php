@extends('frontend.layout')
@section('content')
<div class="container mt-5">
        
    <div class="row">
        <!-- Posts Section -->
        <div class="col-md-8">
            <h1 class="mb-4">Blog Posts</h1>

            @foreach ($data['posts'] as $post)
            <!-- Blog Post Cards -->
            <div class="card mb-4">
                {{-- <img src="https://via.placeholder.com/750x300" class="card-img-top" alt="Post Image"> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title??''}}</h5>
                    <p class="card-text">{{ $post->description?substr($post->description,0,40).'...':''}}</p>
                    <a href="{{route('post.detail',$post->id)}}" class="btn btn-primary">Read More</a>
                    <p class="text-muted mt-2 d-flex justify-content-between">
                        <span>Category: Tech</span>
                        <span>Posted by: Admin</span>
                    </p>
                </div>
            </div>
            @endforeach

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $data['posts']->links() }}
            </div>

            
        </div>

        <!-- Filter and Stats Section -->
        <div class="col-md-4">
            <!-- Filter by Category -->
            <div class="mb-4">
                <h4>Filter by Category</h4>
                <select id="categoryFilter" class="form-select">
                    <option value="all">All Categories</option>
                    @foreach ($data['categories'] as $category)
                    <option value="{{ $category->id}}">{{$category->category_name??''}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Category Post Count -->
            <div class="mb-4">
                <h4>Post Count by Category</h4>
                <ul class="list-group">
                    @foreach ($data['categories'] as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->category_name??''}}
                        <span class="badge bg-primary rounded-pill">{{$category->posts_count}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection