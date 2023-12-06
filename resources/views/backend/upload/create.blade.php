@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/backend/upload" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/backend/upload" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="main_image" class="form-label">Main Image</label>
                                <input class="form-control" type="file" name="main_image" id="formFileMultiple" multiple>
                              </div>

                              <div class="form-group">
                                <label for="offer_image1" class="form-label">Offer Image 1</label>
                                <input class="form-control" type="file" name="offer_image1" id="formFileMultiple" multiple>
                              </div>

                              <div class="form-group">
                                <label for="offer_image2" class="form-label">Offer Image 2</label>
                                <input class="form-control" type="file" name="offer_image2" id="formFileMultiple" multiple>
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
