@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/backend/products" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/backend/products/{{$product->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="sku">SKU *</label>
                                <input id="sku" class="form-control" type="text" name="sku" value="{{$product->sku}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Product Name *</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{$product->name}}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price *</label>
                                <input id="price" class="form-control" type="text" name="price" value="{{$product->price}}">
                            </div>

                            <div class="form-group">
                                <label for="discount_percent">Discount Percent *</label>
                                <input id="discount_percent" class="form-control" type="text" name="discount_percent" value="{{$product->discount_percent}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <textarea id="description" class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload image</label>
                                <input id="image" class="form-control-file" type="file" name="image" value="{{$product->image}}">
                            </div>
                            <div class="my-2">
                                <img src="{{asset ($product->image )}}" width="100" alt="">
                            </div>

                            <!-- Add a section for uploading and displaying sub-images -->
                            <div class="form-group">
                                <label for="sub_images">Upload Sub-Images</label>
                                <input id="sub_images" class="form-control-file" type="file" name="sub_images[]" multiple>
                                <small class="text-muted">You can upload multiple sub-images by selecting multiple files.</small>
                            </div>
                            <div class="my-2">
                                @foreach ($product->images as $image)
                                    <img src="{{ asset($image->filename) }}" width="100" alt="">
                                    <a href="/backend/products/{{$product->id}}/deleteImage/{{$image->id}}" class="btn btn-danger btn-sm">Delete</a>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="category_id">Please Select Product Category</label>
                                <select id="category_id" class="form-control" name="category_id" data-search="true" data-silent-initial-value-set="true">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $product->category_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
