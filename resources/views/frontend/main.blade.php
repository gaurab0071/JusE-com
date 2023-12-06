
@section('content')
<div class="content-wrapper">
    <div class="container mt-3">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="sidebar-header">
                        <h4>My Account</h4>
                    </div>
                    <ul class="list-group">
                        <li class="list-group"><a href="">Edit My Details</a></li>
                        <li class="list-group"><a href="">My Payments</a></li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 mt-3">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="inner text-dark">
                                            <p>Edit Profile</p>
                                        </div>
                                        <a href="/frontend/edit" class="small-box-footer text-info">More Info
                                            <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div><!-- /.card -->
                            <div class="col-lg-3 col-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="inner text-dark">
                                            <p>My Payments</p>
                                        </div>
                                        <a href="/student" class="small-box-footer text-info">More info
                                            <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="inner text-dark">
                                            <p>My Orders</p>
                                        </div>
                                        <a href="/grade" class="small-box-footer text-info">More info
                                            <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.content -->
            </div>
        </div>
    </div>
</div>
@endsection
