@php
    use Illuminate\Support\Str;
@endphp
@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                    <h5 class="card-title text-danger">Total Products: {{ count($products) }}</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/backend/products/create" class="btn btn-primary">Add Product</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Image</th>
                                        <th>Sub-Images</th>
                                        <th>SKU</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Dis(%)</th>
                                        <th>Selling Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="24" alt=""></td>
                                        <td>
                                            @foreach ($item->images as $subImage)
                                                <img src="{{ asset($subImage->filename) }}" width="24" alt="">
                                            @endforeach
                                        </td>
                                        <td>{{ $item->sku }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ optional($item->category)->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            @php
                                                $description = $item->description;
                                                $wordCount = str_word_count($description);
                                            @endphp
                                        
                                            @if ($wordCount >20)
                                                <span class="short-description">{{ Str::words($description, 20) }}</span>
                                                <span class="full-description" style="display: none;">{{ Str::words($description, $wordCount) }}</span>
                                                <a href="#" class="see-more-link">See More</a>
                                            @else
                                                <span class="full-description">{{ $description }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->discount_percent }}</td>
                                        <td>{{ $item->selling_price }}</td>
                                        <td>
                                            <form action="/product/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/product/{{ $item->id }}/edit" class="badge bg-info">Edit</a>
                                                <button type="button" class="badge btn badge-danger" data-toggle="modal" data-target="#deleteModal-{{ $item->id }}">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this product?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Find all "See More" links on the page
        var seeMoreLinks = document.querySelectorAll('.see-more-link');

        // Add a click event listener to each link
        seeMoreLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var descriptionContainer = link.parentElement.querySelector('.full-description');
                var shortDescription = link.parentElement.querySelector('.short-description');
                if (descriptionContainer.style.display === 'none' || descriptionContainer.style.display === '') {
                    descriptionContainer.style.display = 'inline';
                    shortDescription.style.display = 'none';
                    link.innerText = 'See Less';
                } else {
                    descriptionContainer.style.display = 'none';
                    shortDescription.style.display = 'inline';
                    link.innerText = 'See More';
                }
            });
        });
    });
</script>
