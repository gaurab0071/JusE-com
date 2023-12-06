@if(auth()->check())
@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <div class="inner">
                                    <h3>30</h3>
                                    <p>Teachers</p>
                                </div>
                                <a href="/teacher" class="small-box-footer text-light">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div><!-- /.card -->
                    <div class="col-lg-3 col-6">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="inner">
                                    <h3>30</h3>
                                    <p>Students</p>
                                </div>
                                <a href="/student" class="small-box-footer text-light">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card bg-info">
                            <div class="card-body">
                                <div class="inner">
                                    <h3>PG-X</h3>
                                    <p>Classes</p>
                                </div>
                                <a href="/grade" class="small-box-footer text-light">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card bg-secondary">
                            <div class="card-body">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>New Orders</p>
                                </div>
                                <a href="#" class="small-box-footer text-light">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div><!-- /.content wrapper -->
@endsection
@else
<!-- Include the login view when the user is not logged in -->
@include('auth.login')
@endif
