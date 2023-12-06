@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                    <h5 class="card-title text-danger">Total Categories: {{ count($categories) }}</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- -----------------------------------MAIN CONTENTS------------------------------ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/backend/category/create" class="btn btn-primary">Add Category</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Image </th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ asset($item->image) }}" width="24" alt=""></td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="/backend/category/{{ $item->id }}/edit" class="badge bg-info">Edit</a>
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
</div>
@endsection
