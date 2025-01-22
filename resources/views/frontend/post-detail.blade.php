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
        <form id="add-comment">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id}}">
            <div class="mb-4">
                <textarea class="form-control mb-2" rows="3" placeholder="Write your comment..." name="comment" required></textarea>
                <button type="submit"  class="btn btn-primary">Post Comment</button>
            </div>
        </form>
        

        <!-- Comment List -->
        @foreach ($post->comments as $comment)
        <div class="mb-3">
            <!-- Parent Comment -->
            <div class="mb-2">
                <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment??''}}                
                @if (auth()->check() && auth()->id() == $comment->user_id)
                <button class="btn btn-link btn-sm comment-edit-btn" data-edited-comment="{{$comment->comment}}" data-comment-edit-id="comment-edit-form-{{ $comment->id }}">Edit</button>
                <button class="btn btn-link btn-sm  text-danger">delete</button>
                @endif
                <button class="btn btn-link btn-sm reply-btn" data-comment-id="reply-form-{{ $comment->id }}">Reply</button>
                
            </div>
            <!-- Update Comment Field -->
            <div class="comment-edit-form mt-2 d-none" id="comment-edit-form-{{ $comment->id }}">
                <form action="#">
                    @csrf

                    <textarea class="form-control mb-2" rows="2" id="comment-edit-text"></textarea>
                    <button class="btn btn-secondary btn-sm">Update</button>
                </form>
                
            </div>

            <!-- Replies -->
            @if ($comment->replies->isNotEmpty())
                <div class="ms-4">
                    @foreach ($comment->replies as $reply)
                        <div class="mb-2">
                            <strong>{{ $reply->user->name }}:</strong> {{ $reply->reply }}
                            @if (auth()->check() && auth()->id() == $reply->user_id)
                            <button class="btn btn-link btn-sm">Edit</button>
                            <button class="btn btn-link btn-sm  text-danger">delete</button>
                            @endif
                            <button class="btn btn-link btn-sm reply-btn" data-comment-id="reply-form-{{ $reply->id }}">Reply</button>
                        </div>
                    @endforeach

                    <!-- Reply Input Field -->
                    <div class="reply-form mt-2 d-none" id="reply-form-{{ $reply->id }}">
                        <textarea class="form-control mb-2" rows="2" placeholder="Write your reply..."></textarea>
                        <button class="btn btn-secondary btn-sm">Post Reply</button>
                    </div>
                </div>
            @else
            <div class="ms-4 reply-form mt-2 d-none" id="reply-form-{{ $comment->id }}">
                <textarea class="form-control mb-2" rows="2" placeholder="Write your reply..."></textarea>
                <button class="btn btn-secondary btn-sm">Post Reply</button>
            </div>
            @endif            
        </div>
        @endforeach

    </div>
</div>
<script>
    $(document).ready(function () {
        // Comment Edit form
        $('.comment-edit-btn').on('click', function () {
            // Get the ID of the associated comment form
            const commentEditId = $(this).data('comment-edit-id');
            const editedComment = $(this).data('edited-comment');
            const commentEditForm = $('#' + commentEditId);
            $('#comment-edit-text').val(comment)
            // Toggle visibility of the comment edit form
            commentEditForm.toggleClass('d-none');
        });
        // Reply Form
        $('.reply-btn').on('click', function () {
            // Get the ID of the associated reply form
            const commentId = $(this).data('comment-id');
            const replyForm = $('#' + commentId);

            // Toggle visibility of the reply form
            replyForm.toggleClass('d-none');
        });
    });

    $("#add-comment").submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('store.comment') }}",
            data: $(this).serialize(),
            success: function(data){
                $("#add-comment")[0].reset(); // Reset the form
                // Start Message 
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success', 
                    showConfirmButton: false,
                    timer: 5000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    title: data.success, 
                    })
            }else{
                
            Toast.fire({
                    type: 'error',
                    title: data.error, 
                    })
                }
                location.reload()
                // End Message   
            }
        });
    });
</script>
@endsection


