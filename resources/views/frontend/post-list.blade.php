@if ($posts->isNotEmpty())
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title ?? '' }}</h5>
                <p class="card-text">{{ $post->description ? substr($post->description, 0, 40) . '...' : '' }}</p>
                <a href="{{ route('post.detail', $post->id) }}" class="btn btn-primary">Read More</a>
                <p class="text-muted mt-2 d-flex justify-content-between">
                    <span>Category: {{ $post->category->category_name ?? '' }}</span>
                    <span>Posted by: {{ $post->user->name ?? '' }}</span>
                </p>
            </div>
        </div>
    @endforeach
@else
    <p>No posts found for the selected category.</p>
@endif
