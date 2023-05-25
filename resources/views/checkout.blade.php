@extends('master')
@section('title')
    Home - Veer & Co
@endsection
@section('content')
    @if ($prod_lists->isEmpty())
        <script type="text/javascript">
            window.location.href = "{{ url('/') }}";
        </script>
    @else
        <div class="wrapper">
            <div class="page-wrapper" style="margin-top: 0px;">
                <div class="page-content">
                    <!--start breadcrumb-->
                    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                        <div class="container">
                            <div class="page-breadcrumb d-flex align-items-center">
                                <h3 class="breadcrumb-title pe-3">Checkout</h3>
                                <div class="ms-auto">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0 p-0">
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('cart') }}">Cart</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                Checkout
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="py-4">
                        <div class="container">
                            <div class="shop-cart">
                                <div class="row">
                                    <div class="col-12 col-xl-8">
                                        <div class="checkout-review">
                                            <div class="card bg-transparent rounded-0 shadow-none">
                                                <div class="card-body">
                                                    <div class="steps steps-light">
                                                        <a class="step-item active" href="{{ url('cart') }}">
                                                            <div class="step-progress"><span class="step-count">1</span>
                                                            </div>
                                                            <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
                                                        </a>
                                                        <a class="step-item active current" href="{{ url('checkout') }}">
                                                            <div class="step-progress"><span class="step-count">2</span>
                                                            </div>
                                                            <div class="step-label"><i class='bx bx-cube'></i>Shipping</div>
                                                        </a>
                                                        <a class="step-item " href="javascript:void(0);">
                                                            <div class="step-progress"><span class="step-count">3</span>
                                                            </div>
                                                            <div class="step-label"><i class='bx bx-credit-card'></i>Payment
                                                            </div>
                                                        </a>
                                                        <a class="step-item" href="javascript:void(0);">
                                                            <div class="step-progress"><span class="step-count">4</span>
                                                            </div>
                                                            <div class="step-label"><i
                                                                    class='bx bx-check-circle'></i>Confirm</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card  rounded-0 shadow-none mb-3 border">
                                                <div class="card-body">
                                                    <h5 class="mb-0">Review Your Order</h5>
                                                    <div class="my-3 border-bottom"></div>
                                                    @php
                                                        $totalmrp = 0;
                                                        $total = 0;
                                                    @endphp
                                                    @foreach ($prod_lists as $item)
                                                        <div class="row align-items-center g-3">
                                                            <div class="col-12 col-lg-9">
                                                                <div class="d-lg-flex align-items-center gap-2">
                                                                    <div class="cart-img text-center text-lg-start">
                                                                        <img class="img-thumbnail"
                                                                            src="{{ asset('uploads/products') . '/' . $item->products->thumbnail }}"
                                                                            width="130"
                                                                            alt="{{ $item->products->product_name }}">
                                                                    </div>
                                                                    <div class="cart-detail text-center text-lg-start">
                                                                        <h6 class="mb-2 cart-product-name">
                                                                            {{ $item->products->product_name }}</h6>
                                                                        <p class="mb-0 cart-list-price">
                                                                            <strike>&#8377;{{ number_format((float) $item->products->mrp, 2, '.', '') * $item->quantity }}</strike>
                                                                        </p>
                                                                        <p class="mb-0 cart-list-price">Total:
                                                                            {{ $item->quantity }} X
                                                                            {{ $item->products->price }} =
                                                                            &#8377;{{ $item->products->price * $item->quantity }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-3">
                                                                <div class="cart-action text-center">
                                                                    <label for="quantity">Quantity</label>
                                                                    <input type="number"
                                                                        class="form-control rounded-0 text-center" disabled
                                                                        readonly value="{{ $item->quantity }}">
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-12 col-lg-2">
                                                        <div class="text-center">
                                                            <div class="d-flex gap-2 justify-content-center justify-content-lg-end">
                                                                <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-x-circle me-0'></i></a>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                        </div>
                                                        <div class="my-4 border-top"></div>
                                                        @php
                                                            $totalmrp += $item->products->mrp * $item->quantity;
                                                            $total += $item->products->price * $item->quantity;
                                                            // if ($item->products->tax_id) {
                                                            //     $tax = $total*$item->products->taxes->tax_percentage/100;
                                                            // }
                                                        @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-12"> <div class="shipping-aadress">
                                                                <h5 class="mb-3">Shipping Address:</h5>
                                                                @if ($shipping_addr)
                                                                    <p class="mb-1"><b class="text-dark">Name:</b>
                                                                        {{ $shipping_addr->fname . ' ' . $shipping_addr->lname }}
                                                                    </p>
                                                                    <p class="mb-1"><b class="text-dark">Address:</b>
                                                                        {{ $shipping_addr->locationName }},
                                                                        {{ $shipping_addr->townName }},
                                                                        {{ $shipping_addr->city }},
                                                                        {{ $shipping_addr->state }},
                                                                        {{ $shipping_addr->country }},
                                                                        {{ $shipping_addr->pincode }}</p>
                                                                    <p class="mb-1"><b class="text-dark">Phone:</b>
                                                                        {{ $shipping_addr->mobile }}</p>
                                                                    <button class="btn proceed-checkout" type="button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#shippingaddress">Change
                                                                        Address</button>
                                                                @else
                                                                    <button class="btn proceed-checkout" type="button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#shippingaddress">Add
                                                                        Address</button>
                                                                @endif

                                                            </div></div> -->
                                            {{-- <div class="card rounded-0 shadow-none mb-3 border">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="d-grid"><a href="javascript:;"
                                                                class="btn btn-light btn-ecomm"><i
                                                                    class="bx bx-chevron-left"></i>Back to Payment</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-grid"><a href="checkout-complete.html"
                                                                class="btn btn-white btn-ecomm">Complete Order<i
                                                                    class="bx bx-chevron-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <div class="checkout-form p-3 bg-light">

                                            <div class="card rounded-0 shadow-none mb-3 border">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="shipping-aadress">
                                                                <h5 class="mb-3">Shipping Address:</h5>
                                                                @if ($shipping_addr)
                                                                    <p class="mb-1"><b class="text-dark">Name:</b>
                                                                        {{ $shipping_addr->fname . ' ' . $shipping_addr->lname }}
                                                                    </p>
                                                                    <p class="mb-1"><b class="text-dark">Address:</b>
                                                                        {{ $shipping_addr->locationName }},
                                                                        {{ $shipping_addr->townName }},
                                                                        {{ $shipping_addr->city }},
                                                                        {{ $shipping_addr->state }},
                                                                        {{ $shipping_addr->country }},
                                                                        {{ $shipping_addr->pincode }}</p>
                                                                    <p class="mb-1"><b class="text-dark">Phone:</b>
                                                                        {{ $shipping_addr->mobile }}</p>
                                                                    <button class="btn proceed-checkout" type="button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#shippingaddress">Change
                                                                        Address</button>
                                                                @else
                                                                    <button class="btn proceed-checkout" type="button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#shippingaddress">Add
                                                                        Address</button>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card rounded-0 mb-3 border bg-transparent shadow-none">
                                                <div class="card-body">
                                                    <p class="fs-5">Apply Discount Code</p>
                                                    <form id="discount_coupon" name="discount_coupon">
                                                        <div class="input-group">
                                                            <input type="text" name="promocode" id="promocode"
                                                                required class="form-control rounded-0"
                                                                placeholder="Enter discount code">
                                                            <button class="btn btn-dark btn-ecomm" type="submit">Apply
                                                                Discount</button>
                                                        </div>
                                                    </form>
                                                    <span id="promomsg"></span>
                                                </div>
                                            </div>
                                            <form action="{{ route('completeOrder') }}" method="POST">
                                                @csrf
                                                <div class="card rounded-0 shadow-none mb-3 border">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="payment-mode">
                                                                    <h5 class="mb-3">Payment Mode:</h5>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="online" disabled name="payment_mode"
                                                                            id="online">
                                                                        <label class="form-check-label" for="online">
                                                                            Online
                                                                        </label>
                                                                        <span class="text-danger">(Online payment is not
                                                                            available in this time.)</span>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="cash" name="payment_mode"
                                                                            id="cashondelivery" checked>
                                                                        <label class="form-check-label"
                                                                            for="cashondelivery">
                                                                            Cash on delivery
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                                    <div class="card-body">
                                                        <p class="mb-2">Price ({{ $prod_lists->count() }} Items): <span
                                                                class="float-end">&#8377;{{ number_format((float) $total, 2, '.', '') }}</span>
                                                        </p>
                                                        {{-- <p class="mb-2">Taxes: <span class="float-end">&#8377;{{$tax}}</span></p> --}}
                                                        <p class="mb-2">Discount: <span
                                                                class="float-end text-success">-&#8377;<span
                                                                    id="discount_amount">{{ number_format((float) 0, 2, '.', '') }}</span></span>
                                                        </p>
                                                        <p class="mb-2">Delivery Charges: <span
                                                                class="float-end text-success">Free</span></p>
                                                        <div class="my-3 border-top"></div>
                                                        <h6 class="mb-0">Amount Payable: <span
                                                                class="float-end">&#8377;<span
                                                                    id="grand_total">{{ number_format((float) $total, 2, '.', '') }}</span></span>
                                                        </h6>
                                                        <div class="my-4"></div>
                                                        <div class="d-grid">
                                                            <input type="hidden" name="amount"
                                                                value="{{ $total }}" />
                                                            @auth
                                                                <button type="submit"
                                                                    class="btn proceed-checkout w-100 btn-ecomm">Place
                                                                    Order</button>
                                                            @endauth
                                                            @guest
                                                                <button type="submit" disabled
                                                                    class="btn proceed-checkout w-100 btn-ecomm">Place
                                                                    Order</button>
                                                            @endguest
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <!-- Address Modal -->
        <div class="modal fade" id="shippingaddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Shipping Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('addressMakeDefault') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p class="text-danger">Tick on address which address you want to make default</p>
                            @foreach ($shipping_address as $shipping_addr)
                                <div class="border mb-2 p-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="make_address_default"
                                            value="{{ $shipping_addr->id }}" id="address{{ $shipping_addr->id }}"
                                            {{ $shipping_addr->address_status == '2' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="address{{ $shipping_addr->id }}">
                                            {{ $shipping_addr->locationName }}, {{ $shipping_addr->townName }},
                                            {{ $shipping_addr->city }}, {{ $shipping_addr->state }},
                                            {{ $shipping_addr->country }}, {{ $shipping_addr->pincode }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addanotheraddress"
                                type="button"><i class="bi bi-pencil-square"></i>&nbsp;Add Another Address</button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Make Default</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <style>
            /* .modal{
        display: block !important;
    } */
            @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
                .modal-dialog {
                    overflow-y: initial !important
                }

                .shopping-address-up {
                    height: 500px !important;
                    overflow-y: auto !important;
                }
            }

            @media only screen and (min-device-width: 360px) and (max-device-width: 640px) {
                .modal-dialog {
                    overflow-y: initial !important
                }

                .shopping-address-up {
                    height: 500px !important;
                    overflow-y: auto !important;
                }
            }
        </style>
        <!-- Add another address modal -->
        <div class="modal fade" id="addanotheraddress" data-bs-backdrop="static" style="overflow:scroll"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-pencil-square"></i>&nbsp;Add
                            another address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @auth
                        <form action="{{ route('user.addAddress') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body shopping-address-up">
                                <div class="row g-3">
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Enter First Name</label>
                                        <input type="text" class="form-control" name="fname"
                                            placeholder="Enter first name*" required />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Enter Last Name</label>
                                        <input type="text" class="form-control" name="lname"
                                            placeholder="Enter last name*" required />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Enter E-mail ID</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter email id" />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Enter Mobile Number</label>
                                        <input type="tel" class="form-control" name="mobile"
                                            placeholder="Enter mobile number*" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Street/Location Name</label>
                                        <input type="text" class="form-control" placeholder="Street/Location Name*"
                                            name="locationName" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Town/Village Name</label>
                                        <input type="text" class="form-control" placeholder="Town/Village Name*"
                                            name="townName" required />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" placeholder="City*" name="city"
                                            required />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">State</label>
                                        <input type="text" class="form-control" placeholder="State*" name="state"
                                            required />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" placeholder="Country*" name="country"
                                            required />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Pin Code</label>
                                        <input type="text" class="form-control" placeholder="Pin Code*" name="pinCode"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="chec_ldsa" name="chelbrt" required>
                            <input type="hidden" value="chec_default" name="chedefault" required>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                        class="bi bi-x"></i>&nbsp;Close</button>
                                <button type="submit" class="btn btn-primary"><i
                                        class="bi bi-check2-all"></i>&nbsp;Save</button>
                            </div>
                        </form>
                    @endauth
                    @guest
                        <form action="{{ route('user.addAddressGuest') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body shopping-address-up">
                                <div class="row g-3">
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Enter First Name</label>
                                        <input type="text" class="form-control" name="fname"
                                            placeholder="Enter first name*" required />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Enter Last Name</label>
                                        <input type="text" class="form-control" name="lname"
                                            placeholder="Enter last name*" required />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Enter E-mail ID</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter email id" />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Enter Mobile Number</label>
                                        <input type="tel" class="form-control" name="mobile"
                                            placeholder="Enter mobile number*" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Street/Location Name</label>
                                        <input type="text" class="form-control" placeholder="Street/Location Name*"
                                            name="locationName" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Town/Village Name</label>
                                        <input type="text" class="form-control" placeholder="Town/Village Name*"
                                            name="townName" required />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" placeholder="City*" name="city"
                                            required />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">State</label>
                                        <input type="text" class="form-control" placeholder="State*" name="state"
                                            required />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" placeholder="Country*" name="country"
                                            required />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Pin Code</label>
                                        <input type="text" class="form-control" placeholder="Pin Code*" name="pinCode"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="chec_ldsa" name="chelbrt" required>
                            <input type="hidden" value="chec_default" name="chedefault" required>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                        class="bi bi-x"></i>&nbsp;Close</button>
                                <button type="submit" class="btn btn-primary"><i
                                        class="bi bi-check2-all"></i>&nbsp;Save</button>
                            </div>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    @endif
@endsection
@section('notification')
    @if (Session::has('success'))
        <script>
            Lobibox.notify('success', {
                size: 'mini',
                showClass: 'fadeInDown',
                hideClass: 'fadeUpDown',
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: '{{ Session::get('success') }}'
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Lobibox.notify('error', {
                size: 'mini',
                showClass: 'fadeInDown',
                hideClass: 'fadeUpDown',
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: '{{ Session::get('error') }}'
            });
        </script>
    @endif
@endsection
