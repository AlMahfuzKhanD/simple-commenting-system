@extends('frontend.layout')
@section('content')
<!-- Blog Content -->
<div class="container mt-5">
    <h1>{{ $post->title??''}}</h1>
    <p class="text-muted">Category: {{ $post->category->category_name??''}} | Posted by: {{ $post->user->name??''}}</p>
    {{-- <img src="https://via.placeholder.com/750x300" class="img-fluid mb-4" alt="Post Image"> --}}
    <p>{{$post->description ??''}}</p>

    <hr>

    <!-- Comments Section -->
    <div class="mt-5">
        <h3>Comments</h3>

        <!-- Add a Comment -->
        <form action="{{'store.comment'}}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id}}">
            <div class="mb-4">
                <textarea class="form-control mb-2" rows="3" placeholder="Write your comment..."></textarea>
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </div>
        </form>
        

        <!-- Comment List -->
        @foreach ($post->comments as $comment)
        <div class="mb-3">
            <!-- Parent Comment -->
            <div class="mb-2">
                <strong>{{ $reply->user->name }}:</strong> This is a great post!
                <button class="btn btn-link btn-sm text-danger">Edit</button>
                <button class="btn btn-link btn-sm">Reply</button>
            </div>

            <!-- Replies -->
            @if ($comment->replies->isNotEmpty())
                <div class="ms-4">
                    @foreach ($comment->replies as $reply)
                        <div class="mb-2">
                            <strong>{{ $reply->user->name }}:</strong> {{ $reply->content }}
                            <button class="btn btn-link btn-sm text-danger">Edit</button>
                            <button class="btn btn-link btn-sm">Reply</button>
                        </div>
                    @endforeach

                    <!-- Reply Input Field (After Last Reply) -->
                    <div class="mt-2">
                        <textarea class="form-control mb-2" rows="2" placeholder="Write your reply..."></textarea>
                        <button class="btn btn-secondary btn-sm">Post Reply</button>
                    </div>
                </div>
            @else
            <div class="ms-4 mt-2">
                <textarea class="form-control mb-2" rows="2" placeholder="Write your reply..."></textarea>
                <button class="btn btn-secondary btn-sm">Post Reply</button>
            </div>
            @endif            
        </div>
        @endforeach

        <div class="mb-3">
            <!-- Parent Comment -->
            <div class="mb-2">
                <strong>User1:</strong> This is a great post!
                <button class="btn btn-link btn-sm text-danger">Edit</button>
                <button class="btn btn-link btn-sm">Reply</button>
            </div>

            <!-- Replies -->
            <div class="ms-4">
                <div class="mb-2">
                    <strong>User2:</strong> I completely agree!
                    <button class="btn btn-link btn-sm text-danger">Edit</button>
                    <button class="btn btn-link btn-sm">Reply</button>
                </div>
                <div class="mb-2">
                    <strong>User3:</strong> Thanks for sharing your thoughts!
                    <button class="btn btn-link btn-sm text-danger">Edit</button>
                    <button class="btn btn-link btn-sm">Reply</button>
                </div>

                <!-- Reply Input Field -->
                <div class="mt-2">
                    <textarea class="form-control mb-2" rows="2" placeholder="Write your reply..."></textarea>
                    <button class="btn btn-secondary btn-sm">Post Reply</button>
                </div>
            </div>
        </div>

        <!-- Another Parent Comment -->
        <div class="mb-3">
            <div class="mb-2">
                <strong>User4:</strong> Very insightful article!
                <button class="btn btn-link btn-sm text-danger">Edit</button>
                <button class="btn btn-link btn-sm">Reply</button>
            </div>

            <!-- Replies -->
            <div class="ms-4">
                <div class="mb-2">
                    <strong>User5:</strong> I learned a lot, thank you!
                    <button class="btn btn-link btn-sm text-danger">Edit</button>
                    <button class="btn btn-link btn-sm">Reply</button>
                </div>
                
                <!-- Reply Input Field -->
                <div class="mt-2">
                    <textarea class="form-control mb-2" rows="2" placeholder="Write your reply..."></textarea>
                    <button class="btn btn-secondary btn-sm">Post Reply</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


