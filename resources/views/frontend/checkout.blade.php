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
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing
                        Address</span></h5>
                <form action="/order" method="POST">
                    @csrf
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Full Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="John" name="name" id="name"
                                    required value="{{ old('name', auth()->user()->name ?? '') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">E-mail<span class="text-danger">*</span></label>
                                <input class="form-control" type="email" placeholder="example@email.com" name="email"
                                    id="email" required value="{{ old('email', auth()->user()->email ?? '') }}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="mobile_number">Mobile No<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="+977-980123498" name="mobile_number"
                                    id="mobile_number" required
                                    value="{{ old('mobile_number', auth()->user()->mobile_number ?? '') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="delivery_address">Delivery Address<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Naya Marga" name="delivery_address"
                                    id="delivery_address" required
                                    value="{{ old('delivery_address', auth()->user()->delivery_address ?? '') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="city">City<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Kathmandu" name="city"
                                    id="city" required value="{{ old('city', auth()->user()->city ?? '') }}">
                            </div>


                            {{-- <div class="col-md-12">
                            <div class="form">
                                <form action="/order" method="post">
                                    @csrf
                                <button id="saveBtn" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div> --}}
                        </div>
                    </div>

                    {{-- <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping
                            Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Full Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="John" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">E-mail<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="example@email.com" id="email" name="email"
                                    required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="mobile_number">Mobile No<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="+977-9812345678" id="mobile_number" name="mobile_number"
                                    required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="delivery_address">Delivery Address<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="123 Street" id="delivery_address" name="delivery_address" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="city">City</label>
                                <input class="form-control" type="text" placeholder="New York" id="city" name="city">
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order
                        Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        @foreach ($cartItems as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item->product->name }}</p>
                                <p>Rs.{{ number_format($item->amount, 0, '.', ',') }}</p>
                            </div>
                        @endforeach
                        {{-- <div class="d-flex justify-content-between">
                            <p>Product Name 3</p>
                            <p>$150</p>
                        </div> --}}
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rs.{{ number_format($subtotal, 0, '.', ',') }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs.{{ number_format($shippingCharge, 0, '.', ',') }}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rs.{{ number_format($total, 0, '.', ',') }}</h5>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD

                <!---------------------------------Payments------------------------------------>
                {{-- <div class="mb-5">
=======
                <div class="mb-5">
>>>>>>> 9be8573633f51f8efc5c95b0e7a40654dc4b0c04
                    <h5 class="section-title position-relative text-uppercase mb-3"><span
                            class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
<<<<<<< HEAD
                                <input type="radio" class="custom-control-input" name="payment" id="esewa">
                                <label class="custom-control-label" for="esewa">Esewa</label>
=======
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">E-sewa</label>
>>>>>>> 9be8573633f51f8efc5c95b0e7a40654dc4b0c04
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
<<<<<<< HEAD
                                <input type="radio" class="custom-control-input" name="payment" id="khalti">
                                <label class="custom-control-label" for="khalti">Khalti</label>
=======
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Khalti</label>
>>>>>>> 9be8573633f51f8efc5c95b0e7a40654dc4b0c04
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
<<<<<<< HEAD
                                <label class="custom-control-label" for="cod">Cash On Delivery</label>
                            </div>
                        </div>
                        <div class="form-group mb-4" id="uploadSection">
                            <input type="file" class="form-control-file" id="paymentScreenshot">
                            <button type="button" class="btn btn-primary" id="uploadScreenshotButton">Upload Screenshot</button>
                            
                        </div>
=======
                                <label class="custom-control-label" for="banktransfer">Cash On Delivery</label>
                            </div>
                        </div>
                </div> 
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
>>>>>>> 9be8573633f51f8efc5c95b0e7a40654dc4b0c04
                    </div>
                </div> --}}
                    <!---------------------------------Payments end------------------------------------>

                    <!-- Modal -->
                    {{-- <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog"
                        aria-labelledby="paymentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="paymentModalLabel">Payment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p id="paymentDescription">Please scan the QR code below to make your payment.</p>
                                    <img id="qrCodeImage" src="" class="img-fluid" alt="Payment QR Code">
                                    <hr>
                                    <p>After making the payment, please upload a screenshot of your payment for
                                        verification.</p>
                                    <input type="file" class="form-control-file" id="paymentScreenshot">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="saveQrCodeButton">Save QR
                                        Code</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                        <!--------------Modal End---------------------------------------------->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div id="cartEmptyError" class="alert alert-danger" style="display: none;">
                        Your cart is empty. Please add items to your cart before placing an order.
                    </div>
                    <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection

