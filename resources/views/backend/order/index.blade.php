@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order Details</h1>
                        {{-- <h5 class="card-title text-danger">Total Orders: {{ count($categories) }}</h5> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
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
                            <a href="/backend/category/create" class="btn btn-primary">Back</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Mobile Number</th>
                                        <th>Email Address</th>
                                        <th>Address</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->mobile_number }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->delivery_address }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>
                                                <a href="/order/{{ $item->id }}" class="badge bg-info">View</a>
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
