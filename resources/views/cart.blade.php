@extends('master')
@section('title')
    Home - Veer & Co
@endsection
@section('content')
    <div class="wrapper">
        <div class="page-wrapper" style="margin-top: 0px;">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">Shopping Cart</h3>
                            <div class="ms-auto">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                                        </li>
                                        {{-- <li class="breadcrumb-item">
                                            <a href="javascript:;">Shop</a>
                                        </li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Shopping Cart
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
                <!--end breadcrumb-->
                
                <!--start shop area-->
                <section class="py-4">
                    <div class="container">
                        <div class="shop-cart">                            
                            <div class="row">                                
                                <div class="col-12 {{ $cart_lists->isEmpty() ? "col-xl-12" : "col-xl-8" }}">   
                                    <div class="card bg-transparent rounded-0 shadow-none {{ $cart_lists->isEmpty() ? "d-none" : "" }}">
                                        <div class="card-body">
                                            <div class="steps steps-light">
                                                <a class="step-item active current" href="{{url('cart')}}">
                                                    <div class="step-progress"><span class="step-count">1</span>
                                                    </div>
                                                    <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
                                                </a>
                                                <a class="step-item" href="javascript:void(0);">
                                                    <div class="step-progress"><span class="step-count">2</span>
                                                    </div>
                                                    <div class="step-label"><i class='bx bx-cube'></i>Shipping</div>
                                                </a>
                                                <a class="step-item " href="javascript:void(0);">
                                                    <div class="step-progress"><span class="step-count">3</span>
                                                    </div>
                                                    <div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
                                                </a>
                                                <a class="step-item" href="javascript:void(0);">
                                                    <div class="step-progress"><span class="step-count">4</span>
                                                    </div>
                                                    <div class="step-label"><i class='bx bx-check-circle'></i>Confirm</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>                                 
                                    <div class="shop-cart-list mb-3 p-3">
                                        @php
                                            $totalmrp = 0;
                                            $total = 0;
                                        @endphp
                                        @forelse ($cart_lists as $cart)
                                        <div class="row align-items-center g-3 product-data">       
                                            <div class="col-12 col-lg-8">                                                
                                                <div class="d-lg-flex align-items-center gap-2">
                                                    <div class="cart-img text-center text-lg-start">
                                                        <img src="{{asset('uploads/products').'/'.$cart->products->thumbnail}}" width="130" alt="{{$cart->products->product_name}}" class="border rounded">
                                                    </div>
                                                    <div class="cart-detail text-center text-lg-start">
                                                        <h6 class="mb-2 cart-product-name">{{$cart->products->product_name}}</h6>
                                                        <p class="mb-0 cart-list-price"><strike>&#8377;{{number_format((float)$cart->products->mrp, 2, '.', '')*$cart->quantity;}}</strike></p>
                                                        <p class="mb-0 cart-list-price">Total: {{$cart->quantity}} X {{$cart->products->price}} = &#8377;{{$cart->products->price * $cart->quantity}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="prod_id" name="prod_id" value="{{$cart->productid}}">
                                            <div class="col-12 col-lg-2">
                                                <div class="cart-action text-center">                                                    
                                                    {{-- <label for="quantity">Quantity</label> --}}
                                                    <div class="input-group text-center">
                                                        <button type="button" class="input-group-text changeQuantity decrement-btn" data-field="quantity">-</button>
                                                        <input type="text" name="quantity" class="form-control qty-input text-center bg-white" readonly value="{{$cart->quantity}}">
                                                        <button type="button" class="input-group-text changeQuantity increment-btn" data-field="quantity">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-2">
                                                <div class="text-center">
                                                    <div class="d-flex gap-2 justify-content-center justify-content-lg-end">                                                        
                                                        <button class="btn rounded-0 btn-ecomm remove-product" data-field="prod_id"><i class='bx bx-x-circle'></i> Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @php
                                            $totalmrp += $cart->products->mrp * $cart->quantity;
                                            $total += $cart->products->price * $cart->quantity;
                                            // if ($cart->products->tax_id) {
                                            //     $tax = $total*$cart->products->taxes->tax_percentage/100;
                                            // }                                            
                                        @endphp
                                        <div class="my-2 border-top"></div>
                                        </div>
                                        @empty
                                        <div class="col-sm-12 text-center">
                                            <img src="{{asset('assets/images/cart.png')}}" class="img-fluid" alt="empty cart">
                                        </div>
                                        @endforelse
                                        
                                        <div class="d-lg-flex align-items-center gap-2"> <a href="{{url('products')}}" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shopping</a>
                                                
                                            <a href="javascript:;" class="btn btn-light btn-ecomm ms-auto {{ $cart_lists->isEmpty() ? "d-none" : "" }}"><i
                                                    class='bx bx-x-circle'></i> Clear Cart</a>
                                            {{-- <a href="javascript:;" class="btn btn-white btn-ecomm"><i
                                                    class='bx bx-refresh'></i> Update Cart</a> --}}
                                        </div>
                                    </div>
                                </div>
                                @if (!$cart_lists->isEmpty())
                                <div class="col-12 col-xl-4">
                                    <div class="checkout-form p-3 bg-light ">
                                        {{-- <div class="card rounded-0 border bg-transparent shadow-none">
                                            <div class="card-body">
                                                <p class="fs-5">Apply Discount Code</p>
                                                <div class="input-group">
                                                    <input type="text" class="form-control rounded-0"
                                                        placeholder="Enter discount code">
                                                    <button class="btn btn-dark btn-ecomm" type="button">Apply Discount</button>
                                                </div>
                                            </div>
                                        </div>                                         --}}
                                        <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                            <div class="card-body">
                                                <p class="mb-2">Price ({{$cart_lists->count()}} Items): <span class="float-end">&#8377;{{number_format((float)$totalmrp, 2, '.', '');}}</span></p>
                                                <p class="mb-2">Discount: <span class="float-end text-success">-&#8377;{{number_format((float)$totalmrp-$total, 2, '.', '');}}</span></p>
                                                <p class="mb-2">Delivery Charges: <span class="float-end text-success">Free</span></p>
                                                {{-- <p class="mb-2">Taxes: <span class="float-end">&#8377;{{$tax}}/-</span></p> --}}
                                                <div class="my-3 border-top"></div>
                                                <h5 class="mb-0">Total Amount: <span class="float-end">&#8377;{{number_format((float)$total, 2, '.', '');}}</span></h5>
                                                <p class="cart-save-msg">You will save &#8377;{{number_format((float)$totalmrp-$total, 2, '.', '');}} on this order</p>
                                                <div class="my-4"></div>
                                                <div class="d-grid"> <a href="{{url('checkout')}}" class="btn proceed-checkout btn-ecomm">Proceed to Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </section>
                <!--end shop area-->
            </div>
        </div>
        <!--end page wrapper -->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
        <!--End Back To Top Button-->
    </div>
@endsection
