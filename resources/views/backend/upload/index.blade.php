@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Upload Images</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Upload Images</li>
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
                        <a href="/backend/upload/create" class="btn btn-primary">New Upload</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Main Image</th>
                                    <th>Offer Image 1</th>
                                    <th>Offer Image 2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ asset($item->main_image) }}" width="50" alt=""></td>
                                    <td><img src="{{ asset($item->offer_image1) }}" width="50" alt=""></td>
                                    <td><img src="{{ asset($item->offer_image2) }}" width="50" alt=""></td>
                                    <td>
                                        <a href="/backend/upload/{{ $item->id }}/edit" class="badge bg-info">Edit</a>
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
