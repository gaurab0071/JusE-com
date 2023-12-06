@if(auth()->check())
@extends('frontend.dashboard')
@section('content')
<div class="container mt-2">
    <h2>Edit Profile</h2>
    <form>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name"
            value="{{ auth()->check() ? auth()->user()->name : '' }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email"
            value="{{ auth()->check() ? auth()->user()->email : '' }}">
        </div>
        <div class="form-group">
            <label for="billingAddress">Billing Address:</label>
            <textarea class="form-control" id="billingAddress" rows="4" placeholder="Enter your billing address"
            value="{{ auth()->check() ? auth()->user()->delivery_address : '' }}"></textarea>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" class="form-control" id="phoneNumber" placeholder="Enter your phone number">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" placeholder="Enter your city">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
@else
<!-- Include the login view when the user is not logged in -->
@include('auth.login')
@endif