@extends('frontend.layout')
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Posts Section -->
        <div class="col-md-8">
            <h1 class="mb-4">Blog Posts</h1>
            <div id="postContainer">
                @include('frontend.post-list', ['posts' => $posts]) {{-- Default post list --}}
            </div>

        </div>
        
        <div class="col-md-4">
            <!-- Filter Section -->
            <div class="mb-4 mt-4">
                <h4>Filter by Category</h4>
                <select id="categoryFilter" class="form-select">
                    <option value="all">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name ?? '' }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Category Post Count -->
            <div class="mb-4">
                <h4>Post Count by Category</h4>
                <ul class="list-group">
                    @foreach ($categories as $category)
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

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function () {
        $('#categoryFilter').on('change', function () {
            const categoryId = $(this).val();

            $.ajax({
                url: "{{ route('home') }}",
                type: "GET",
                data: { category_id: categoryId },
                success: function (response) {
                    if (response.success) {
                        $('#postContainer').html(response.html); // Update post list.
                    } else {
                        alert('Failed to load posts.');
                    }
                },
                error: function () {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
@endsection
