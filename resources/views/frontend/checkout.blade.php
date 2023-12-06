@extends('frontend.layouts.app')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="John" name="full_name" id="full_name" required
                                value="{{ auth()->check() ? auth()->user()->name : '' }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail<span class="text-danger">*</span></label>
                            <input class="form-control" type="email" placeholder="example@email.com" name="email" id="email" required
                                value="{{ auth()->check() ? auth()->user()->email : '' }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="+977-980123498" name="mobile" id="mobile" required
                                value="{{ auth()->check() ? auth()->user()->mobile : '' }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Delivery Address<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Naya Marga" name="delivery_address" id="delivery_address"
                                required value="{{ auth()->check() ? auth()->user()->delivery_address : '' }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Kathmandu" name="city" id="city" required
                                value="{{ auth()->check() ? auth()->user()->city : '' }}">
                        </div>
                        
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto" name="ship_to_different_address">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">
                                    Ship to a different address
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Full Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="John" id="" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="example@email.com" id="" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="+977-9812345678" id="" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Delivery Address<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="123 Street" id="" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <div class="d-flex justify-content-between">
                            <p>Product Name 1</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Product Name 2</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Product Name 3</p>
                            <p>$150</p>
                        </div>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$160</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

    
@endsection