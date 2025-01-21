@extends('backend.layout')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Edit</strong> Post</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('posts') }}" class="btn btn-primary">All Post</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.post') }}" >
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id}}">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Post Title" value="{{ $post->title}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="title">Category</label>
                                    <select class="form-control" name="category_id">
										<option selected="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option  value="{{ $category->id}}" {{ $post->category_id == $category->id? 'selected' : ''}}>{{$category->category_name??''}}</option>
                                        @endforeach
										
									</select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" placeholder="Description" name="description" rows="3">{{ $post->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection