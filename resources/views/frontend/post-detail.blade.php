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
        @if (auth()->check())
        <form id="add-comment">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id}}">
            <div class="mb-4">
                <textarea class="form-control mb-2" rows="3" placeholder="Write your comment..." name="comment" required></textarea>
                <button type="submit"  class="btn btn-primary">Post Comment</button>
            </div>
        </form>
        @else
        <div class="mb-4">
            <strong><p class="text-danger">To add comment, please login first</p></strong>
        </div>
        @endif
        
        

        <!-- Comment List -->
        @foreach ($post->comments as $comment)
        <div class="mb-3">
            <!-- Parent Comment -->
            <div class="mb-2">
                <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment??''}}                
                @if (auth()->check() && auth()->id() == $comment->user_id)
                <button class="btn btn-link btn-sm comment-edit-btn" data-comment-edit-id="comment-edit-form-{{ $comment->id }}" >Edit</button>
                <button class="btn btn-link btn-sm comment-delete-btn text-danger" data-comment-delete-id="{{ $comment->id }}" >Delete</button>
                @endif
                @if ($comment->replies->count() == 0)
                    @if (auth()->check())    
                    <button class="btn btn-link btn-sm reply-btn" data-reply-target="reply-form-comment-{{ $comment->id }}">Reply</button>
                    @endif                    
                @endif
                
            </div>

            
            <!-- Update Comment Field -->
            <div class="comment-edit-form mt-2 d-none" id="comment-edit-form-{{ $comment->id }}">
                <form class="update-comment-form mb-2">
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <textarea class="form-control mb-2" rows="2" name="comment">{{ $comment->comment }}</textarea>
                    <button type="submit" class="btn btn-secondary btn-sm">Update</button>
                    <button type="button" class="btn btn-light btn-sm cancel-edit">Cancel</button>
                </form>
            </div>

            <!-- Comment Reply Form -->
            <div class="reply-form mt-2 d-none" id="reply-form-comment-{{ $comment->id }}">
                <form class="add-reply-form">
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <textarea class="form-control mb-2" rows="2" placeholder="Write your reply..." name="reply"></textarea>
                    <button type="submit" class="btn btn-secondary btn-sm">Reply</button>
                    <button type="button" class="btn btn-light btn-sm cancel-reply">Cancel</button>
                </form>
            </div>
           <!-- Replies -->
            @if ($comment->replies->isNotEmpty())
                <div class="ms-4">
                    @foreach ($comment->replies as $reply)
                        <div class="mb-2">
                            <strong>{{ $reply->user->name }}:</strong> {{ $reply->reply }}
                            @if (auth()->check() && auth()->id() == $reply->user_id)
                            {{-- <button class="btn btn-link btn-sm">Edit</button>
                            <button class="btn btn-link btn-sm text-danger">Delete</button> --}}
                            @endif
                            @if ($loop->last && auth()->check())
                            <button class="btn btn-link btn-sm reply-btn" data-reply-target="reply-form-reply-{{ $reply->id }}">Reply</button>
                            @endif
                        </div>

                        <!-- Reply Reply Form -->
                        <div class="reply-form mt-2 d-none" id="reply-form-reply-{{ $reply->id }}">
                            <form class="add-reply-form">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <textarea class="form-control mb-2" rows="2" placeholder="Write your reply..." name="reply"></textarea>
                                <button type="submit" class="btn btn-secondary btn-sm">Reply</button>
                                <button type="button" class="btn btn-light btn-sm cancel-reply">Cancel</button>
                            </form>
                        </div>
                    @endforeach                    
                </div>
            @endif            
        </div>
        @endforeach

    </div>
</div>
<script>
    $(document).ready(function () {
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


        $('.comment-edit-btn').on('click', function () {
        const commentEditId = $(this).data('comment-edit-id');
            $('#' + commentEditId).removeClass('d-none');
        });

        // Cancel edit form
        $('.cancel-edit').on('click', function () {
            $(this).closest('.comment-edit-form').addClass('d-none');
        });


        // update comment
        $('.update-comment-form').on('submit', function (e) {
            e.preventDefault();

            const form = $(this);

            $.ajax({
                type: "POST",
                url: "{{ route('update.comment') }}",
                data: form.serialize(),
                success: function (data) {
                    form.closest('.comment-edit-form').addClass('d-none');

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

                },
            });
        });

        // delete comment
        $('.comment-delete-btn').on('click', function () {
            const commentDeleteId = $(this).data('comment-delete-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This will permanently delete the comment and its replies.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request to delete the comment
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/delete/comment/'+commentDeleteId,

                        success: function(data){
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
                }
            });
        });


        // Reply Form
        $('.reply-btn').on('click', function () {

            const replyFormId = $(this).data('reply-target');
            const replyForm = $('#' + replyFormId);

            $('.reply-form').not(replyForm).addClass('d-none');

            replyForm.toggleClass('d-none');
        });

         // Cancel reply 
        $('.cancel-reply').on('click', function () {
            $(this).closest('.reply-form').addClass('d-none');
        });

        // add reply
        $('.add-reply-form').on('submit', function (e) {
            e.preventDefault();

            const form = $(this);

            $.ajax({
                type: "POST",
                url: "{{ route('store.reply') }}",
                data: form.serialize(),
                success: function (data) {
                    form.closest('.reply-form').addClass('d-none');

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

                },
            });
        });
    });

    
</script>
@endsection


