@if(auth()->check())
<div class="container">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-1">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                    <li class="nav-item">
                        <a href="/backend/home" class="nav-link @if ( Request::segment(1) == "dashboard") active @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/backend/products" class="nav-link @if ( Request::segment(1) == "products") active @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/backend/category" class="nav-link @if ( Request::segment(1) == "categories") active @endif" >
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/backend/upload" class="nav-link @if ( Request::segment(1) == "upload") active @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Image Uploads
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/order" class="nav-link @if ( Request::segment(1) == "orders") active @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Orders
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/student_report" class="nav-link @if ( Request::segment(1) == "report") active @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Students Report
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/attendance" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Attendance
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Assign Roles
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/auth/login" class="nav-link nav-link @if ( Request::segment(1) == "/auth/login") active @endif" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="nav-icon fas fa-th"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>
@else
<!-- Include the login view when the user is not logged in -->
@include('auth.login')
@endif

    <script>
        $(document).ready(function() {
            var url = window.location;
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');
        });

        // JavaScript code to redirect to the login page after logout
    // document.getElementById('logout-form').addEventListener('submit', function (e) {
    //     e.preventDefault();
    //     this.submit();
    //     window.location.href = '/auth/login'; // Redirect to the login page
    // });
    </script>
