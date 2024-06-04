<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    @foreach($categories as $category)
                    @if($category !== null && is_object($category))
                    <a class="dropdown-item" href="{{ route('show', $category->id) }}">{{ $category->name }}</a>
                    @endif
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="/" class="text-decoration-none d-block d-lg-none">
                    <img src="{{ asset('images/sisterlogo.png') }}" alt="Alisha Store Logo" width="50" height="50">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link{{ Request::is('/') ? ' active' : '' }}">Home</a>
                        <a href="{{ url('/shop') }}" class="nav-item nav-link{{ Request::is('shop') ? ' active' : '' }}">Shop</a>
                        <a href="{{ url('/cart') }}" class="nav-item nav-link{{ Request::is('cart') ? ' active' : '' }}">My Cart</a>
                        <a href="{{ url('/checkout') }}" class="nav-item nav-link{{ Request::is('checkout') ? ' active' : '' }}">Checkout</a>
                        <a href="/frontend/contact" class="nav-item nav-link">Contact</a>
                    </div>
                    
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="/cart" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

<script>

</script>
