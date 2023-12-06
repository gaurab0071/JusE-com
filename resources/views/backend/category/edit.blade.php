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
                        <form action="/backend/category/{{ $category->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ $category->name }}">
                            </div>

                            <button type="submit" class="btn btn-success">Update Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
