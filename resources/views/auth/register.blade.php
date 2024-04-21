@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-warning" id="tab-login" href="{{ route('login') }}" role="tab"
                                aria-controls="pills-login" aria-selected="false">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active bg-warning" id="tab-register" href="" role="tab"
                                aria-controls="pills-register" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content">
                        <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                            <!-- Login form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Your login form content goes here -->
                            </form>
                        </div>

                        <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                            <!-- Register form -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="mobile_number" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="mobile_number" type="text" class="form-control" name="mobile_number" required autocomplete="mobile">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="delivery_address" class="col-md-4 col-form-label text-md-end">{{ __('Delivery Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="delivery_address" type="text" class="form-control" name="delivery_address" required autocomplete="address">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control" name="city" required autocomplete="city">
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-warning">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Pills content -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
