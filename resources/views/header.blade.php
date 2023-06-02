<style>
    #searchlist {
        position: absolute;
        background-color: rgb(232, 255, 253);
        z-index: 99999999;
        top: 103px;
        left: 429px;
        width: 559px;
        max-height: 300px;
        overflow-y: auto;
    }

    #searchlist li {
        border: 1px solid #ccc;
        padding: 5px;
        margin: 0px !important;
        font-size: 14px;
        list-style: none;
    }

    #searchlist a:hover {
        color: #fff;
    }

    #searchlist li:hover {
        background-color: #ff6701;
        color: #fff;
        cursor: pointer;
    }
</style>
{{-- <div class="discount-alert d-none d-lg-block" style="background: #e63a30;">
    <div class="alert alert-dismissible fade show shadow-none rounded-0 mb-0 border-bottom">
        <div class="d-lg-flex align-items-center gap-2 justify-content-center">
            <p class="mb-0">Get Up to <strong>40% OFF</strong> New-Season Styles</p>
            <a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Men</a>
            <a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Women</a>
            <p class="mb-0 font-13">*Limited time only</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div> --}}
{{-- style="background:#f9c02a;" --}}
<!--start top header wrapper-->
<div class="header-wrapper">
    <div class="top-menu p-1">
        <div class="container">
            <nav class="navbar navbar-expand p-0">
                <div class="shiping-title font-13 d-none d-sm-flex">
                    <a href="#" class="fast_query fs-6">
                        👋 Hi, <b> {{ Auth::user()?Auth::user()->first_name:"User" }}!</b>
                    </a>
                </div>
                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Customer Support: <b><i class='bx bx-phone-call'></i>&nbsp;9710076550 | <i class="bx bxl-whatsapp"></i>&nbsp;9710076550</b></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header-content pb-3 pb-md-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4 col-md-auto">
                    <div class="d-flex align-items-center">
                        <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main">
                            <i class='bx bx-menu'></i>
                        </div>
                        <div class="logo d-lg-flex">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/logo.png') }}" class="logo-icon" alt="Veer & co logo" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-md order-4 order-md-2">
                    <form action="{{ url('search') }}" method="get">
                        <div class="input-group flex-nowrap px-xl-4">
                            <select class="form-select flex-shrink-0" id="cat" name="cat"
                                aria-label="Default select example" style="width: 10.5rem;box-shadow:none">
                                <option selected value="0">All Categories</option>
                            </select>
                            <input type="text" name="q" id="q" class="form-control w-100" autocomplete="off" placeholder="Search for Products" style="box-shadow:none">
                            <button type="submit" class="input-group-text cursor-pointer search-button">
                                <i class='bx bx-search text-white'></i>
                            </button>
                        </div>
                    </form>
                    <div class="bg-white text-left rounded p-3" id="searchlist">

                    </div>
                </div>
                @auth
                    <a href="{{ url('user/dashboard') }}"
                        class="col-4 col-md-auto order-3 d-none d-xl-flex align-items-center">
                        <div class="fs-1 text-red"><i class='bx bx-user-circle text-dark'></i>
                        </div>
                        <div class="ms-2">
                            <!-- <p class="mb-0 font-13 text-dark"><strong>Hello! {{ Auth::user()->first_name }}</strong></p> -->
                            <h5 class="mb-0">My Account</h5>
                        </div>
                    </a>
                @else
                    <a href="{{ url('login') }}" class="col-4 col-md-auto order-3 d-none d-xl-flex align-items-center">
                        <div class="fs-1 text-red"><i class='bx bx-user-circle text-dark'></i>
                        </div>
                        <div class="ms-2">
                            <p class="mb-0 font-13 text-dark">Sign In</p>
                            <h5 class="mb-0">My Account</h5>
                        </div>
                    </a>
                @endauth
                <a href="{{ url('login') }}" class="col-4 col-md-auto order-3 d-none d-xl-flex align-items-center">
                    <div class="fs-5 text-red" style="font-weight: 500;">
                        <i class='bx bx-location-plus text-dark'></i>
                    </div>
                    <div class="ms-2">
                        <p class="mb-0 fs-6 text-dark" style="font-weight: 500;">Track Order</p>
                    </div>
                </a>
                <div class="col col-md-auto order-2 order-md-4">
                    <div class="top-cart-icons float-end">
                        <nav class="navbar navbar-expand">
                            <ul class="navbar-nav ms-auto">
                                {{-- <li class="nav-item"><a href="#" class="nav-link cart-link">
                                    <i class='bx bx-heart'></i></a>
                                </li> --}}
                                <li class="nav-item ">
                                    <a href="{{ url('cart') }}" class="nav-link   position-relative cart-link">
                                        <span class="alert-count">
                                            @auth
                                                <?php
                                                if (Auth::check()) {
                                                    $cartitems = \App\Models\Cart::where('userid', Auth::user()->id)->count();
                                                } else {
                                                    $cartitems = \App\Models\Cart::where('session_id', Illuminate\Support\Facades\Session::getId())->count();
                                                }

                                                ?>
                                                @if ($cartitems)
                                                    {{ $cartitems }}
                                                @else
                                                    0
                                                @endif
                                            @else
                                                @php
                                                    $cartitemswi = \App\Models\Cart::where('session_id', Session::getId())->count();
                                                @endphp
                                                @if ($cartitemswi)
                                                    {{ $cartitemswi }}
                                                @else
                                                    0
                                                @endif
                                            @endauth

                                        </span>
                                        <i class='bx bx-cart '></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <div class="primary-menu border-top">
        <div class="container">
            <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg justify-content-center">
                <div class="offcanvas-header">
                    <button class="btn-close float-end"></button>
                    {{-- <h5 class="py-2">Veer & Co</h5> --}}
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" style="width: 160px !important;"
                            class="logo-icon" alt="Veer & co logo" />
                    </a>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item nav-padding"> <a class="nav-link" href="/">Home </a></li>
                    <li class="nav-item nav-padding"> <a class="nav-link" href="{{ url('category') }}">Shop By Category
                        </a></li>
                    <li class="nav-item nav-padding"> <a class="nav-link" href="{{ url('brands') }}">Shop By Brands
                        </a></li>
                    <li class="nav-item nav-padding"> <a class="nav-link" href="{{ url('products') }}">Products </a>
                    </li>
                    <li class="nav-item nav-padding"> <a class="nav-link" href="{{url('products/category/hvac')}}">HVAC </a></li>
                    @auth
                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                                href="{{ url('user/dashboard') }}" data-bs-toggle="dropdown">My Account <i
                                    class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('user/dashboard') }}">Dashboard</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('user/order') }}">Orders</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('user/payment-method') }}">Payment Methods</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('user/user-details') }}">Account Details</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ url('login') }}">My Account</a>
                        </li>
                    @endauth

                </ul>
            </nav>
        </div>
    </div>
</div>
<!--end top header wrapper-->
