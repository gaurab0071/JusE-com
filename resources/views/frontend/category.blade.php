@extends('frontend.layouts.app')
@section('content')
<div class="container">
    <h1>Category: {{ $categories->name }}</h1>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="/product_detail/{{ $product->id }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
