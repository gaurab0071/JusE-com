@if(auth()->check())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-ZUztl6uJ7+UvdtQEpFVhHQrZTfT6nt0+6ezLmV7sUyfA+V7KUf/9ju0J/nnq3bLOH7pJhEtNfLw0cn0yFQV1cw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> --}}
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css')}}">
    <!-- Jquery for active links -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('sweetalert::alert')

        @include('backend.layouts.header')

        @include('backend.layouts.sidebar')

        @yield('content')

        @include('backend.layouts.footer')
    </div>
</body>
</html>
@else
<!-- Include the login view when the user is not logged in -->
@include('auth.login')
@endif

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


