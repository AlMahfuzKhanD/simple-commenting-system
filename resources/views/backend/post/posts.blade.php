@extends('backend.layout')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Post</h3>
            </div>
            
            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('create.post') }}" class="btn btn-primary">Create New Post</a>
            </div> 
           
            
        </div>
        <div class="row">
            <div class="col-12">
                
                <div class="card">                    
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $item->title??''}}</td>
                                    <td>{{ $item->category->category_name}}</td>
                                    <td>{{ $item->description?substr($item->description,0,40).'...':''}}</td>
                                    <td>
                                        <a href="{{ route('edit.post',$item->id) }}" class="btn btn-pill btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit"> <i data-feather="edit"></i></a>
                                        <a href="{{ route('delete.post',$item->id) }}" class="btn btn-pill btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete"> <i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true,
            "drawCallback": function( settings ) {
                feather.replace();
            }
        });
    });

</script>
@endsection