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
                            <h3 class="breadcrumb-title pe-3">All Products</h3>
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
                                            Products
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
                            <div class="col-12 col-xl-3">
                                <div class="btn-mobile-filter d-xl-none">
                                    <i class="bx bx-slider-alt"></i>
                                </div>
                                <div class="filter-sidebar d-none d-xl-flex">
                                    <div class="card rounded-0 w-100">
                                        <div class="card-body">
                                            <div class="align-items-center d-flex d-xl-none">
                                                <h6 class="text-uppercase mb-0">Filter</h6>
                                                <div class="btn-mobile-filter-close btn-close ms-auto cursor-pointer"></div>
                                            </div>
                                            <hr class="d-flex d-xl-none" />
                                            <div class="product-categories">
                                                <h6 class="text-uppercase mb-3">Categories</h6>
                                                <ul class="list-unstyled mb-0 categories-list">
                                                    @forelse ($pro_categories as $category)
                                                    <li>
                                                        <a href="javascript:;">{{$category->category}}</a>
                                                    </li>
                                                    @empty
                                                    <li>
                                                        <a href="javascript:;">Category not available</a>
                                                    </li>
                                                    @endforelse
                                                </ul>                                                
                                            </div>
                                            <hr />
                                            <div class="product-brands">
                                                <h6 class="text-uppercase mb-3">Brands</h6>
                                                <ul class="list-unstyled mb-0 categories-list">
                                                    @forelse ($pro_brands as $brand)
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{$brand->brand_slug}}" id="Adidas" />
                                                            <label class="form-check-label" for="Adidas">{{$brand->brand}}</label>
                                                        </div>
                                                    </li>
                                                    @empty
                                                        
                                                    @endforelse
                                                    
                                                    
                                                </ul>                                                
                                            </div>
                                            <hr />
                                            <div class="price-range">
                                                <h6 class="text-uppercase mb-3">Price</h6>
                                                <div class="my-4" id="slider">
                                                    <input type="range" class="w-100" max="50000" step="100"
                                                        id="price_filter">
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <button type="button"
                                                        class="btn btn-dark btn-sm text-uppercase rounded-0 font-13 fw-500">
                                                        Filter
                                                    </button>
                                                    <div class="ms-auto">
                                                        <p class="mb-0">Price: 200.00 - <span
                                                                id="heighest_price"></span>.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-9">
                                <div class="product-wrapper">
                                    {{-- <div class="toolbox d-flex align-items-center mb-3 gap-2">
                                        <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                            <div class="d-flex align-items-center flex-nowrap">
                                                <p class="mb-0 font-13 text-nowrap">Sort By:</p>
                                                <select class="form-select ms-3 rounded-0">
                                                    <option value="menu_order" selected="selected">
                                                        Default sorting
                                                    </option>
                                                    <option value="popularity">
                                                        Sort by popularity
                                                    </option>
                                                    <option value="rating">
                                                        Sort by average rating
                                                    </option>
                                                    <option value="date">Sort by newness</option>
                                                    <option value="price">
                                                        Sort by price: low to high
                                                    </option>
                                                    <option value="price-desc">
                                                        Sort by price: high to low
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="d-flex align-items-center flex-nowrap">
                                                <p class="mb-0 font-13 text-nowrap">Show:</p>
                                                <select class="form-select ms-3 rounded-0">
                                                    <option>9</option>
                                                    <option>12</option>
                                                    <option>16</option>
                                                    <option>20</option>
                                                    <option>50</option>
                                                    <option>100</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="product-grid">
                                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                                            {{-- <div class="col">
                                                <div class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            <a href="javascript:;">
                                                                <div class="product-wishlist">
                                                                    <i class="bx bx-heart"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <img src="assets/images/products/01.png" class="card-img-top"
                                                        alt="..." />
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="javascript:;">
                                                                <p class="product-catergory font-13 mb-1">
                                                                    Catergory Name
                                                                </p>
                                                            </a>
                                                            <a href="javascript:;">
                                                                <h6 class="product-name mb-2">
                                                                    Product Short Name
                                                                </h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mb-1 product-price">
                                                                    <span
                                                                        class="me-1 text-decoration-line-through">$99.00</span>
                                                                    <span class="fs-5">$49.00</span>
                                                                </div>
                                                                <div class="cursor-pointer ms-auto">
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                </div>
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <a href="javascript:;" class="btn btn-dark btn-ecomm">
                                                                        <i class="bx bxs-cart-add"></i>Add to
                                                                        Cart</a>
                                                                    <a href="javascript:;" class="btn btn-light btn-ecomm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#QuickViewProduct"><i
                                                                            class="bx bx-zoom-in"></i>Quick
                                                                        View</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            @foreach ($get_products as $item)
                                            <div class="col-md-3 pb-2 pe-0">
                                                <div class="card rounded-0 product-card">
                                                    <div
                                                        class="card-header bg-transparent border-bottom-0 position-absolute end-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            <a href="javascript:;">
                                                                <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <a href="{{ url('products-details').'/'.$item->product_slug }}">
                                                        {{-- @foreach ($item->product_images as $proimg) --}}
                                                        <img src="{{ asset('uploads/products').'/'.$item->thumbnail }}" class="card-img-top" alt="{{$item->product_name}}">
                                                        {{-- @endforeach --}}
                                                    </a>
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="{{ url('products-details').'/'.$item->product_slug }}">
                                                                @foreach ($item->categories as $cat_item)                                                                    
                                                                <p class="product-catergory font-13 mb-1">{{$cat_item->category}}</p>
                                                                @endforeach
                                                            </a>
                                                            <a href="{{ url('products-details').'/'.$item->product_slug }}">
                                                                <h6 class="product-name mb-2" title="{{$item->product_name}}">{{Str::limit($item->product_name, 40)}}</h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mb-1 product-price"><span
                                                                        class="me-1 text-decoration-line-through ">₹{{$item->mrp}}</span>
                                                                    <span class="fs-5">₹{{$item->price}}</span>
                                                                </div>
                                                                {{-- <div class="cursor-pointer ms-auto">
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                </div> --}}
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <form action="{{route('addtocart')}}" method="post">
                                                                        @csrf  
                                                                        <input type="hidden" name="quantity" class="form-control qty-input text-center" value="1">
                                                                        <input type="hidden" name="pid" value="{{$item->product_id}}">                                     
                                                                        <button type="submit" class="btn btn-danger btn-ecomm w-100"><i class='bx bxs-cart-add'></i>&nbsp;Add to Cart</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                
                                            @endforeach
                                            
                                            {{-- <div class="col-md-3 pb-2 pe-0">
                                                <div class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            <a href="javascript:;">
                                                                <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#QuickViewProduct">
                                                        <img src="{{ asset('assets/images/products/stanley-x150-01.jpg') }}"
                                                            class="card-img-top" alt="...">
                                                    </a>
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="javascript:;">
                                                                <p class="product-catergory font-13 mb-1">Catergory Name
                                                                </p>
                                                            </a>
                                                            <a href="javascript:;">
                                                                <h6 class="product-name mb-2">Product Short Name</h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mb-1 product-price"><span
                                                                        class="me-1 text-decoration-line-through">₹996452.00</span>
                                                                    <span class="fs-5">₹4964654.00</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <a href="javascript:;"
                                                                        class="btn btn-danger btn-ecomm"> <i
                                                                            class='bx bxs-cart-add'></i>Add to Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <hr />
                                    <nav class="d-flex justify-content-between" aria-label="Page navigation">
                                        <ul class="pagination">
                                            {{$get_products->links();}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </section>
                <!--end shop area-->
            </div>
        </div>
        <!--end page wrapper -->
        <!--start quick view product-->
        <!-- Modal -->
        <div class="modal fade" id="QuickViewProduct">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                <div class="modal-content rounded-0 border-0">
                    <div class="modal-body">
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                        <div class="row g-0">
                            <div class="col-12 col-lg-6">
                                <div class="image-zoom-section">
                                    <div class="product-gallery owl-carousel owl-theme border mb-3 p-3"
                                        data-slider-id="1">
                                        <div class="item">
                                            <img src="assets/images/product-gallery/01.png" class="img-fluid"
                                                alt="" />
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/product-gallery/02.png" class="img-fluid"
                                                alt="" />
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/product-gallery/03.png" class="img-fluid"
                                                alt="" />
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/product-gallery/04.png" class="img-fluid"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                        <button class="owl-thumb-item">
                                            <img src="assets/images/product-gallery/01.png" class=""
                                                alt="" />
                                        </button>
                                        <button class="owl-thumb-item">
                                            <img src="assets/images/product-gallery/02.png" class=""
                                                alt="" />
                                        </button>
                                        <button class="owl-thumb-item">
                                            <img src="assets/images/product-gallery/03.png" class=""
                                                alt="" />
                                        </button>
                                        <button class="owl-thumb-item">
                                            <img src="assets/images/product-gallery/04.png" class=""
                                                alt="" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="product-info-section p-3">
                                    <h3 class="mt-3 mt-lg-0 mb-0">
                                        Allen Solly Men's Polo T-Shirt
                                    </h3>
                                    <div class="product-rating d-flex align-items-center mt-2">
                                        <div class="rates cursor-pointer font-13">
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-light-4"></i>
                                        </div>
                                        <div class="ms-1">
                                            <p class="mb-0">(24 Ratings)</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mt-3 gap-2">
                                        <h5 class="mb-0 text-decoration-line-through text-light-3">
                                            $98.00
                                        </h5>
                                        <h4 class="mb-0">$49.00</h4>
                                    </div>
                                    <div class="mt-3">
                                        <h6>Discription :</h6>
                                        <p class="mb-0">
                                            Virgil Abloh’s Off-White is a streetwear-inspired
                                            collection that continues to break away from the
                                            conventions of mainstream fashion. Made in Italy, these
                                            black and brown Odsy-1000 low-top sneakers.
                                        </p>
                                    </div>
                                    <dl class="row mt-3">
                                        <dt class="col-sm-3">Product id</dt>
                                        <dd class="col-sm-9">#BHU5879</dd>
                                        <dt class="col-sm-3">Delivery</dt>
                                        <dd class="col-sm-9">Russia, USA, and Europe</dd>
                                    </dl>
                                    <div class="row row-cols-auto align-items-center mt-3">
                                        <div class="col">
                                            <label class="form-label">Quantity</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Size</label>
                                            <select class="form-select form-select-sm">
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XS</option>
                                                <option>XL</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Colors</label>
                                            <div class="color-indigators d-flex align-items-center gap-2">
                                                <div class="color-indigator-item bg-primary"></div>
                                                <div class="color-indigator-item bg-danger"></div>
                                                <div class="color-indigator-item bg-success"></div>
                                                <div class="color-indigator-item bg-warning"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                    <div class="d-flex gap-2 mt-3">
                                        <a href="javascript:;" class="btn btn-dark btn-ecomm">
                                            <i class="bx bxs-cart-add"></i>Add to Cart</a>
                                        <a href="javascript:;" class="btn btn-light btn-ecomm"><i
                                                class="bx bx-heart"></i>Add to Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end quick view product-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
        <!--End Back To Top Button-->
    </div>
    <script>
        let price_filter = document.getElementById('price_filter');
        let price_filter_default_val = price_filter.value;
        let heighest_price = document.getElementById('heighest_price').innerHTML = price_filter_default_val;

        price_filter.addEventListener("change", function() {
            let price_filter_value = document.getElementById('price_filter').value;
            heighest_price = document.getElementById('heighest_price').innerHTML = price_filter_value;
        });
        let show_more_btn = document.getElementById('show_more_btn').addEventListener("click", function() {
            let show_more = document.getElementById('show_more').style.display = "block";
            this.style.display = "none";
        });
        let show_less_btn = document.getElementById('show_less_btn').addEventListener("click", function() {
            let show_more = document.getElementById('show_more').style.display = "none";
            let show_more_btn = document.getElementById('show_more_btn').style.display = "block";
        }) 
        let show_brand_btn = document.getElementById('show_brand_btn').addEventListener("click", function() {
            let show_brand = document.getElementById('show_brand').style.display = "block";
            this.style.display = "none";
        });
        let less_brand_btn = document.getElementById('less_brand_btn').addEventListener("click", function() {
            let show_brand = document.getElementById('show_brand').style.display = "none";
            let show_brand_btn = document.getElementById('show_brand_btn').style.display = "block";
        })
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
		msg: '{{ Session::get("success") }}'
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
		msg: '{{ Session::get("error") }}'
	});    
</script>
@endif
@endsection