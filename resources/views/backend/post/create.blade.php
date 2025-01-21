@extends('backend.layout')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Create</strong> Post</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('posts') }}" class="btn btn-primary">All Post</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.post') }}" >
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Reviewer Name</label>
                                <input type="text" class="form-control" placeholder="Reviewer Name" name="reviewer_name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Review Text</label>
                                <textarea class="form-control" placeholder="Review Text" name="review_text" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection