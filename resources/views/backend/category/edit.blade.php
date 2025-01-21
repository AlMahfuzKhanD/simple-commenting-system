@extends('backend.layout')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Edit</strong> Category</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('categories') }}" class="btn btn-primary">All Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.category') }}">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id}}">
                            <div class="mb-3">
                                <label class="form-label">Edit Name</label>
                                <input type="text" class="form-control" placeholder="Category Name" name="category_name" value="{{ $category->category_name??''}}">
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