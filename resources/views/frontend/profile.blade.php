@if(auth()->check())
@extends('frontend.dashboard')
@section('content')
<div class="container mt-2">
<<<<<<< HEAD
    <a href="/frontend/dashboard" type="submit" class="btn btn-primary">Back</a>
=======
    <a href="/frontend/main"  class="btn btn-primary">Back</a>
>>>>>>> 9be8573633f51f8efc5c95b0e7a40654dc4b0c04
    <h2>Edit Profile</h2>
    <form method="POST" action="{{ route('frontend.profile', ['id' => auth()->user()->id]) }}">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
            value="{{ auth()->check() ? auth()->user()->name : '' }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
            value="{{ auth()->check() ? auth()->user()->email : '' }}">
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile No:</label> 
            <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter your phone number"
            value="{{ auth()->check() ? auth()->user()->mobile_number : '' }}">
        </div>
        <div class="form-group">
            <label for="delivery_address">Delivery Address:</label>
            <input class="form-control" name="delivery_address" id="delivery_address" name="delivery_address" rows="4" placeholder="Enter your billing address"
            value="{{ old('delivery_address', auth()->user()->delivery_address ?? '') }}"></input>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city"  name="city" placeholder="Enter your city"
            value="{{ auth()->check() ? auth()->user()->city : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
@else
<!-- Include the login view when the user is not logged in -->
@include('auth.login')
@endif