@extends('master')
@section('title')
    Home - Veer & Co
@endsection
@section('content')
    <style>
        .delivery_address input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <!-- xzoom plugin here -->
    <script type="text/javascript" src="{{ asset('assets/js/xzoom.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/xzoom.css') }}" media="all" />
    <link type="text/css" rel="stylesheet" media="all"
        href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.css" />

    {{-- @foreach ($productdetails as $productdetails) --}}
    <div class="wrapper">
        <div class="page-wrapper" style="margin-top: 0px;">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            {{-- <h3 class="breadcrumb-title pe-3">Products Details</h3> --}}
                            <div class="ms-auto">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('products') }}"> Products</a>
                                        </li>
                                        {{-- <li class="breadcrumb-item">
                                            <a href="javascript:;">Shop</a>
                                        </li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ $productdetails->product_name }}
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
                        <div class="row">
                            <div class="col-12 col-xl-5">
                                <div class="container">
                                    <!-- default start -->
                                    <section id="default" class="padding-top0">
                                        <div class="row">
                                            <div class="large-5 column">
                                                <div class="xzoom-container">
                                                    <img class="xzoom4" id="xzoom-fancy"
                                                        src="{{ asset('uploads/products/') . '/' . $productdetails->thumbnail }}"
                                                        xoriginal="{{ asset('uploads/products/') . '/' . $productdetails->thumbnail }}" />
                                                    <div class="xzoom-thumbs">
                                                        <a
                                                            href="{{ asset('uploads/products/') . '/' . $productdetails->thumbnail }}"><img
                                                                class="xzoom-gallery4" width="80"
                                                                src="{{ asset('uploads/products/') . '/' . $productdetails->thumbnail }}"
                                                                xpreview="{{ asset('uploads/products/') . '/' . $productdetails->thumbnail }}"
                                                                title="{{ $productdetails->product_name }}"></a>
                                                        @foreach ($productdetails->product_images as $pro_img_item)
                                                            <a
                                                                href="{{ asset('uploads/products') . '/' . $pro_img_item->product_image }}"><img
                                                                    class="xzoom-gallery4" width="80"
                                                                    src="{{ asset('uploads/products') . '/' . $pro_img_item->product_image }}"
                                                                    title="{{ $productdetails->product_name }}"></a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="large-7 column"></div>
                                        </div>
                                    </section>
                                    <!-- default end -->
                                </div>
                                @if (!$boughtproduct->isEmpty())
                                    <p class="pb-1 mb-1">Highlights</p>
                                    <div class="product_highLights d-flex">
                                        <ul class="">
                                            @foreach ($productdetails->categories as $productdetails_cate)
                                                <li class="">Category : <span
                                                        class="">{{ $productdetails_cate->category }}</span></li>
                                            @endforeach
                                            @if ($productdetails->brand_id)
                                                <li class="">Brand : <span
                                                        class="">{{ $productdetails->brand_id }}</span></li>
                                            @endif
                                            @if ($productdetails->model_number)
                                                <li class="">Model : <span
                                                        class="">{{ $productdetails->model_number }}</span></li>
                                            @endif
                                            @if ($productdetails->sku)
                                                <li class="">SKU : <span
                                                        class="">{{ $productdetails->sku }}</span></li>
                                            @endif
                                        </ul>
                                        <ul class="">
                                            @if ($productdetails->subcategory_id && $productdetails->subcategory_id != 'None')
                                                <li class="">Sub Category : <span
                                                        class="">{{ $productdetails->subcategory_id }}</span></li>
                                            @endif
                                            @if ($productdetails->hsn)
                                                <li class="">HSN : <span
                                                        class="">{{ $productdetails->hsn }}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-xl-7 product_details">
                                <div class="product_name">
                                    <h4 id="product_title">{{ $productdetails->product_name }}</h4>
                                    @if ($productdetails->model_number)
                                        <p style="margin-bottom: 0px;">Model No: {{ $productdetails->model_number }}</p>
                                    @endif
                                    <div class="product_rating">
                                        <p>5&#9733;</p>
                                    </div>
                                </div>
                                <div class="title w-60 pt-2">
                                    <h4 class="tag-line325"> Made In India
                                        <img class="flag-detls" src="{{ asset('assets/flags/4x3/in.svg') }}"
                                            alt="">
                                    </h4>
                                </div>
                                <div class="product_price d-flex">
                                    <p class="product_price_show">
                                        &#8377;{{ number_format($productdetails->price, 2, '.', ',') }}
                                        @if ($productdetails->mrp != 0)
                                            <strike>&#8377;{{ number_format($productdetails->mrp, 2, '.', ',') }}</strike>
                                            <span class="text-success discount">You Save :
                                                &#8377;{{ number_format($productdetails->mrp - $productdetails->price, 2, '.', ',') }}</span>
                                        @endif
                                    </p>
                                    <p></p>
                                    {{-- <p class="product_price_discount">Save : &#8377;1000.00</p> --}}
                                </div>
                                @if ($productdetails->tax_id)
                                    <div class="title">
                                        {{ $productdetails->taxes->tax_name }} extra
                                    </div>
                                @else
                                    <div class="title">Inclusive of all taxes</div>
                                @endif
                                <div class="product_status">
                                    @if ($productdetails->store_house)
                                        <div class="text-success pt-2 pb-2">Hurry Up!! Only {{ $productdetails->quantity }}
                                            Qty left in stock</div>
                                    @else
                                        @if ($productdetails->stock_status == 'in_stock')
                                            <p class="stock">In Stock</p>
                                        @elseif ($productdetails->stock_status == 'out_of_stock')
                                            <p class="out_of_stock">In Stock</p>
                                        @elseif ($productdetails->stock_status == 'on_backorder')
                                            <p class="out_of_stock">In Stock</p>
                                        @endif
                                    @endif
                                </div>
                                @if ($boughtproduct->isEmpty())
                                    @if ($productdetails->overview)
                                        <p class="mb-1"><strong>Short Description</strong></p>
                                        <div class="product-short-description">
                                            {!! $productdetails->overview !!}
                                        </div>
                                    @endif
                                    <p class="pb-1 mb-1">Highlights</p>
                                    <div class="product_highLights d-flex">
                                        <ul class="">
                                            @foreach ($productdetails->categories as $productdetails_cate)
                                                <li class="">Category : <span
                                                        class="">{{ $productdetails_cate->category }}</span></li>
                                            @endforeach
                                            @if ($productdetails->brand_id)
                                                <li class="">Brand : <span
                                                        class="">{{ $productdetails->brand_id }}</span></li>
                                            @endif
                                            @if ($productdetails->model_number)
                                                <li class="">Model : <span
                                                        class="">{{ $productdetails->model_number }}</span></li>
                                            @endif
                                            @if ($productdetails->sku)
                                                <li class="">SKU : <span
                                                        class="">{{ $productdetails->sku }}</span></li>
                                            @endif
                                        </ul>
                                        <ul class="">
                                            @if ($productdetails->subcategory_id && $productdetails->subcategory_id != 'None')
                                                <li class="">Sub Category : <span
                                                        class="">{{ $productdetails->subcategory_id }}</span></li>
                                            @endif
                                            @if ($productdetails->hsn)
                                                <li class="">HSN : <span
                                                        class="">{{ $productdetails->hsn }}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif

                                {{-- <div class="delivery_address">
                                        <div>Address <p><i class='bx bxs-map'></i><input type="number"
                                                    placeholder="Enter Delivery Pincode">Check</p>
                                        </div>
                                        <p class="delivery_date">Delivery by 29 Jul, Friday </p>
                                    </div>
                                    <div class="delivery_charge">
                                        <p>Delivery Charge <br> <span>Free</span> <strike>&#8377;49.00</strike></p>
                                    </div> --}}
                                <div class="product_buy">
                                    <form action="{{ route('addtocart') }}" method="post" class="d-inline">
                                        @csrf
                                        <label for="quantity">Quantity</label>
                                        <div class="input-group text-center" style="max-width: 140px">
                                            <button type="button" class="input-group-text decrement-btn"
                                                data-field="quantity">-</button>
                                            <input type="text" name="quantity"
                                                class="form-control qty-input text-center" value="1">
                                            <button type="button" class="input-group-text increment-btn"
                                                data-field="quantity">+</button>
                                        </div>
                                        <p class="order_quantity">Minimum Order Quantity: 1, Quantity per Unit: 1</p>
                                        <input type="hidden" name="pid" value="{{ $productdetails->product_id }}">
                                        <button type="submit" class="add_to_cart"><i class="bi bi-cart4"></i>&nbsp;Add
                                            to Cart</button>
                                    </form>
                                    <form action="{{ route('buynow') }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="quantity" class="form-control qty-input text-center" value="1">
                                        <input type="hidden" name="pid" value="{{ $productdetails->product_id }}">
                                        <button type="submit" class="buy_now"><i class="bi bi-cart4"></i>&nbsp;Buy Now</button>
                                    </form>
                                    {{-- <button class="buy_now">Buy Now</button> --}}
                                </div>
                                @if (!$boughtproduct->isEmpty())
                                    <article class="content-entry products_offers">
                                        <h4 class="article-title">Bought together <i
                                                class="bi bi-caret-down-fill boughticon"></i></h4>
                                        <div class="bought-together mt-2">
                                            <div class="bought-products">
                                                <div class="bought-products-image">
                                                    <div class="boughtproduct">
                                                        <a
                                                            href="{{ url('products-details') . '/' . $productdetails->product_slug }}">
                                                            <img class="img-fluid" id="ga-33"
                                                                src="{{ asset('uploads/products/') . '/' . $productdetails->thumbnail }}"
                                                                alt="{{ $productdetails->product_name }}">
                                                            <br><span
                                                                class="boughttogethertxt">{{ $productdetails->product_name }}</span>
                                                        </a>
                                                        <span
                                                            class="boughtpice"><strong>&#8377;{{ number_format((float) $productdetails->price, 2, '.', '') }}</strong>
                                                            <strike>&#8377;{{ number_format((float) $productdetails->mrp, 2, '.', '') }}</strike>
                                                            <span
                                                                class="fnt12">{{ ceil((($productdetails->mrp - $productdetails->price) / $productdetails->mrp) * 100) }}
                                                                Flat Off</span>
                                                        </span>
                                                    </div>
                                                    @php
                                                        $classlast = ['', 'last'];
                                                        $totaladonp = 0;
                                                    @endphp
                                                    @foreach ($boughtproduct as $key => $btproduct)
                                                        <div class="boughtproduct {{ $classlast[$key % 2] }}">
                                                            <a
                                                                href="{{ url('products-details') . '/' . $btproduct->products->product_slug }}">
                                                                <img class="img-fluid text-center" id="ga-33"
                                                                    src="{{ asset('uploads/products/') . '/' . $btproduct->products->thumbnail }}"
                                                                    alt="{{ $btproduct->products->product_name }}">
                                                                <br><span
                                                                    class="boughttogethertxt">{{ $btproduct->products->product_name }}</span>
                                                            </a>
                                                            <span
                                                                class="boughtpice"><strong>&#8377;{{ number_format((float) $btproduct->products->price, 2, '.', '') }}</strong>
                                                                <strike>&#8377;{{ number_format((float) $btproduct->products->mrp, 2, '.', '') }}</strike>
                                                                <span
                                                                    class="fnt12">{{ ceil((($btproduct->products->mrp - $btproduct->products->price) / $btproduct->products->mrp) * 100) }}
                                                                    Flat Off</span>
                                                            </span>
                                                        </div>
                                                        @php
                                                            $totaladonp += $btproduct->products->price;
                                                            $totalp = $totaladonp + $productdetails->price;
                                                        @endphp
                                                    @endforeach
                                                </div>
                                                <div class="bought-products-image">
                                                    <div class="bt-product">
                                                        1 Item
                                                        <br><strong>&#8377;{{ number_format((float) $productdetails->price, 2, '.', '') }}</strong>
                                                    </div>
                                                    <div class="bt-productadon">
                                                        2 Add-ons
                                                        <br><strong>&#8377;{{ number_format((float) $totaladonp, 2, '.', '') }}</strong>
                                                    </div>
                                                    <div class="bt-product last">
                                                        Total
                                                        <br><strong>&#8377;{{ number_format((float) $totalp, 2, '.', '') }}</strong>
                                                    </div>
                                                    <div class="bt-product last w-100 text-center">
                                                        <form action="{{ route('adonaddtocart') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="pid"
                                                                value="{{ $productdetails->product_id }}@foreach ($boughtproduct as $btpid),{{ $btpid->bought_selling }} @endforeach">
                                                            <button type="submit" class="addedetoservicecart"><i
                                                                    class="bi bi-cart-plus"></i> Add 3 Items to
                                                                Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{-- <div class="bought-products-image">
                                                <div class="bt-product last w-75 text-center">
                                                    <button class="addedetoservicecart"><i class="bi bi-cart-plus"></i> Add 3 Items to Cart</button>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </article>
                                @endif
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </section>
                <section class="py-4">
                    <div class="container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="product-more-info">
                            <ul class="nav nav-tabs mb-0" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title text-uppercase fw-500">Overview</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link " data-bs-toggle="tab" href="#discription" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title text-uppercase fw-500">Description</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title text-uppercase fw-500">Reviews</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content pt-3">
                                <div class="tab-pane fade  " id="discription" role="tabpanel">
                                    @if ($productdetails->description)
                                        {!! $productdetails->description !!}
                                    @endif
                                </div>
                                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                                    @if ($productdetails->overview)
                                        {!! $productdetails->overview !!}
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="row">
                                        <div class="col col-lg-8">
                                            <div class="product-review">
                                                <h5 class="mb-4">{{ count($proreviews) }} Reviews For The Product</h5>
                                                <div class="review-list">
                                                    @foreach ($proreviews as $proreview)
                                                        <div class="d-flex align-items-start">
                                                            <div class="review-user">
                                                            @if ($proreview->review_image)
                                                                <img src="{{ asset('uploads/reviews/') . '/' . $proreview->review_image }}"
                                                                    width="65" height="65" class="rounded-circle"
                                                                    alt="Product Review Image" />
                                                            @else
                                                            @endif
                                                            </div>
                                                            <div class="review-content ms-3">
                                                                <div class="rates cursor-pointer fs-6">
                                                                    @php
                                                                        $starp = '<i class="bx bxs-star text-danger"></i>';
                                                                    @endphp
                                                                    @for ($i = 0; $i < $proreview->rating; $i++)
                                                                        {!! $starp !!}
                                                                    @endfor
                                                                </div>
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <h6 class="mb-0">{{ $proreview->name }}&nbsp;</h6>
                                                                    <p class="mb-0">
                                                                        {{ $proreview->created_at->format('M d, Y') }}</p>
                                                                </div>
                                                                <p>{{ $proreview->message }}</p>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-lg-4">
                                            <div class="add-review">
                                                <form action="{{ route('product_rating') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-body p-3">
                                                        <h4 class="mb-4">Write a Review</h4>
                                                    @auth
                                                        <div class="mb-2" style="display:none;">
                                                            <label class="form-label">Your Your Name*</label>
                                                            <input type="text" name="name" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}"
                                                                placeholder="Enter your name" required type="hidden"
                                                                class="form-control rounded-0">
                                                        </div>
                                                        <div class="mb-2" style="display:none;">
                                                            <label class="form-label">Your Your E-mail Id*</label>
                                                            <input type="email" name="email" value="{{Auth::user()->email}}"
                                                                placeholder="Enter your email id" required type="hidden"
                                                                class="form-control rounded-0">
                                                    </div>
                                                    @else
                                                    <div class="mb-2">
                                                            <label class="form-label">Your Your Name*</label>
                                                            <input type="text" name="name"
                                                                placeholder="Enter your name" required
                                                                class="form-control rounded-0">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="form-label">Your Your E-mail Id*</label>
                                                            <input type="email" name="email"
                                                                placeholder="Enter your email id" required
                                                                class="form-control rounded-0">
                                                    </div>
                                                    @endif
                                                        <input type="hidden" name="productid"
                                                            value="{{ $productdetails->product_id }}" required />
                                                        <div class="mb-2">
                                                            <label class="form-label">Rating*</label>
                                                            <select class="form-select rounded-0" name="rating" required>
                                                                <option selected disabled>Choose Rating</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="form-label">Enter Your Message*</label>
                                                            <textarea class="form-control rounded-0" name="message" required placeholder="Enter your message" rows="3"></textarea>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="form-label">Choose a photo*</label>
                                                            <input type="file" name="reviewimage" id="reviewimage"
                                                                class="form-control" />
                                                        </div>
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-ecomm">Submit a
                                                                Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--end shop area-->
                @if (!$related_product->isEmpty())
                    <!--start related products-->
                    <section class="py-4">
                        <div class="container">
                            <div class="service-pros m-0 p-0">
                                <div class="head-cnt work-center text-center mb-0">
                                    <div class="bounceIn animated">
                                        <h4>Related products</h4>
                                        <hr class="underlinskd">
                                    </div>
                                </div>
                            </div>
                            <div class="product-grid pt-2">
                                <div class="related-products owl-carousel owl-theme trending0 trending001">
                                    @foreach ($related_product as $relatedproduct)
                                        <div class="item">
                                            <div class="product-box">
                                                @if ($relatedproduct->products->mrp)
                                                    <div class="beachs">
                                                        {{ ceil((($relatedproduct->products->mrp - $relatedproduct->products->price) / $relatedproduct->products->mrp) * 100) }}%
                                                        Off</div> <img
                                                        src="{{ asset('uploads/products/') . '/' . $relatedproduct->products->thumbnail }}"
                                                        alt="{{ $relatedproduct->products->product_name ?? 'None' }}">
                                                @endif
                                                <div class="discrptions">
                                                    <h5>{{ Str::limit($relatedproduct->products->product_name, 40) }}</h5>
                                                    <h6>&#8377;{{ number_format((float) $relatedproduct->products->price, 2, '.', '') }}
                                                    </h6>
                                                </div>
                                                <div class="discrptions_button">
                                                    <h5><a
                                                            href="{{ url('products-details') . '/' . $relatedproduct->products->product_slug }}">View
                                                            Detail</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--end related products-->
                @endif
                @if (!$alsolikes->isEmpty())
                    <!--start You May Also Like-->
                    <section class="py-4">
                        <div class="container">
                            <div class="service-pros m-0 p-0">
                                <div class="head-cnt work-center text-center mb-0">
                                    <div class="bounceIn animated">
                                        <h4>You May Also Like</h4>
                                        <hr class="underlinskd">
                                    </div>
                                </div>
                            </div>
                            <div class="product-grid pt-2">
                                <div class="alsolike-products owl-carousel owl-theme trending0 trending001">
                                    @foreach ($alsolikes as $alsolike)
                                        <div class="item">
                                            <div class="product-box">
                                                @if ($alsolike->mrp)
                                                <a href="{{ url('products-details') . '/' . $alsolike->product_slug }}">
                                                    <div class="beachs">
                                                        {{ ceil((($alsolike->mrp - $alsolike->price) / $alsolike->mrp) * 100) }}%
                                                        Off
                                                    </div>
                                                    <img
                                                    src="{{ asset('uploads/products/') . '/' . $alsolike->thumbnail }}"
                                                    alt="{{ $alsolike->product_name ?? 'Veerco' }}">
                                                </a>
                                                @endif
                                                <a href="{{ url('products-details') . '/' . $alsolike->product_slug }}">
                                                    <div class="discrptions">
                                                        <h5>{{ Str::limit($alsolike->product_name, 40) }}</h5>
                                                        <h6>&#8377;{{ number_format((float) $alsolike->price, 2, '.', '') }}
                                                        </h6>
                                                    </div>
                                                </a>
                                                <div class="discrptions_button">
                                                    <h5><a
                                                            href="{{ url('products-details') . '/' . $alsolike->product_slug }}">View
                                                            Detail</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--end You May Also Like-->
                @endif
            </div>
        </div>
        <!--end page wrapper -->

        {{-- @endforeach --}}

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
        <!--End Back To Top Button-->

        <script>
            var input = document.querySelector("#qty");
            var btnminus = document.querySelector(".qtyminus");
            var btnplus = document.querySelector(".qtyplus");

            if (
                input !== undefined &&
                btnminus !== undefined &&
                btnplus !== undefined &&
                input !== null &&
                btnminus !== null &&
                btnplus !== null
            ) {
                var min = Number(input.getAttribute("min"));
                var max = Number(input.getAttribute("max"));
                var step = Number(input.getAttribute("step"));

                function qtyminus(e) {
                    var current = Number(input.value);
                    var newval = current - step;
                    if (newval < min) {
                        newval = min;
                    } else if (newval > max) {
                        newval = max;
                    }
                    input.value = Number(newval);
                    e.preventDefault();
                }

                function qtyplus(e) {
                    var current = Number(input.value);
                    var newval = current + step;
                    if (newval > max) newval = max;
                    input.value = Number(newval);
                    e.preventDefault();
                }

                btnminus.addEventListener("click", qtyminus);
                btnplus.addEventListener("click", qtyplus);
            } // End if test
        </script>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>
    {{-- <script src="https://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/js/setup.js"></script> --}}
    <script>
        (function($) {
            $(document).ready(function() {
                $('.xzoom, .xzoom-gallery').xzoom({
                    zoomWidth: 400,
                    title: true,
                    tint: '#333',
                    Xoffset: 15
                });
                $('.xzoom2, .xzoom-gallery2').xzoom({
                    position: '#xzoom2-id',
                    tint: '#ffa200'
                });
                $('.xzoom3, .xzoom-gallery3').xzoom({
                    position: 'lens',
                    lensShape: 'circle',
                    bg: true,
                    sourceClass: 'xzoom-hidden'
                });
                $('.xzoom4, .xzoom-gallery4').xzoom({
                    tint: '#006699',
                    position: 'lens',
                    lensShape: 'circle',
                    Xoffset: 15
                });
                $('.xzoom5, .xzoom-gallery5').xzoom({
                    tint: '#006699',
                    Xoffset: 15
                });

                //Integration with hammer.js
                var isTouchSupported = 'ontouchstart' in window;

                if (isTouchSupported) {
                    //If touch device
                    $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function() {
                        var xzoom = $(this).data('xzoom');
                        xzoom.eventunbind();
                    });

                    $('.xzoom, .xzoom2, .xzoom3').each(function() {
                        var xzoom = $(this).data('xzoom');
                        $(this).hammer().on("tap", function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            var s = 1,
                                ls;

                            xzoom.eventmove = function(element) {
                                element.hammer().on('drag', function(event) {
                                    event.pageX = event.gesture.center.pageX;
                                    event.pageY = event.gesture.center.pageY;
                                    xzoom.movezoom(event);
                                    event.gesture.preventDefault();
                                });
                            }

                            xzoom.eventleave = function(element) {
                                element.hammer().on('tap', function(event) {
                                    xzoom.closezoom();
                                });
                            }
                            xzoom.openzoom(event);
                        });
                    });

                    $('.xzoom4').each(function() {
                        var xzoom = $(this).data('xzoom');
                        $(this).hammer().on("tap", function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            var s = 1,
                                ls;

                            xzoom.eventmove = function(element) {
                                element.hammer().on('drag', function(event) {
                                    event.pageX = event.gesture.center.pageX;
                                    event.pageY = event.gesture.center.pageY;
                                    xzoom.movezoom(event);
                                    event.gesture.preventDefault();
                                });
                            }

                            var counter = 0;
                            xzoom.eventclick = function(element) {
                                element.hammer().on('tap', function() {
                                    counter++;
                                    if (counter == 1) setTimeout(openfancy, 300);
                                    event.gesture.preventDefault();
                                });
                            }

                            function openfancy() {
                                if (counter == 2) {
                                    xzoom.closezoom();
                                    $.fancybox.open(xzoom.gallery().cgallery);
                                } else {
                                    xzoom.closezoom();
                                }
                                counter = 0;
                            }
                            xzoom.openzoom(event);
                        });
                    });

                    $('.xzoom5').each(function() {
                        var xzoom = $(this).data('xzoom');
                        $(this).hammer().on("tap", function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            var s = 1,
                                ls;

                            xzoom.eventmove = function(element) {
                                element.hammer().on('drag', function(event) {
                                    event.pageX = event.gesture.center.pageX;
                                    event.pageY = event.gesture.center.pageY;
                                    xzoom.movezoom(event);
                                    event.gesture.preventDefault();
                                });
                            }

                            var counter = 0;
                            xzoom.eventclick = function(element) {
                                element.hammer().on('tap', function() {
                                    counter++;
                                    if (counter == 1) setTimeout(openmagnific, 300);
                                    event.gesture.preventDefault();
                                });
                            }

                            function openmagnific() {
                                if (counter == 2) {
                                    xzoom.closezoom();
                                    var gallery = xzoom.gallery().cgallery;
                                    var i, images = new Array();
                                    for (i in gallery) {
                                        images[i] = {
                                            src: gallery[i]
                                        };
                                    }
                                    $.magnificPopup.open({
                                        items: images,
                                        type: 'image',
                                        gallery: {
                                            enabled: true
                                        }
                                    });
                                } else {
                                    xzoom.closezoom();
                                }
                                counter = 0;
                            }
                            xzoom.openzoom(event);
                        });
                    });

                } else {
                    //If not touch device

                    //Integration with fancybox plugin
                    $('#xzoom-fancy').bind('click', function(event) {
                        var xzoom = $(this).data('xzoom');
                        xzoom.closezoom();
                        $.fancybox.open(xzoom.gallery().cgallery, {
                            padding: 0,
                            helpers: {
                                overlay: {
                                    locked: false
                                }
                            }
                        });
                        event.preventDefault();
                    });

                    //Integration with magnific popup plugin
                    $('#xzoom-magnific').bind('click', function(event) {
                        var xzoom = $(this).data('xzoom');
                        xzoom.closezoom();
                        var gallery = xzoom.gallery().cgallery;
                        var i, images = new Array();
                        for (i in gallery) {
                            images[i] = {
                                src: gallery[i]
                            };
                        }
                        $.magnificPopup.open({
                            items: images,
                            type: 'image',
                            gallery: {
                                enabled: true
                            }
                        });
                        event.preventDefault();
                    });
                }
            });
        })(jQuery);
    </script>
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
