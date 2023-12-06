@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/backend/category" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/backend/category" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input id="name" class="form-control" type="text" name="name">
                            </div>

                            <div class="form-group">
                                <label for="image">Upload image</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                                <small class="text-muted">Please upload an image.</small>
                            </div>

                            <button type="submit" class="btn btn-success">Save Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
