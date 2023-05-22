@extends('master')
@section('title')
    Product Search - Veer & Co
@endsection
@section('content')
    <div class="wrapper">
        <div class="page-wrapper" style="margin-top: 0px;">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">Products Search</h3>
                            <div class="ms-auto">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Products Search
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
                                        <div class="card-header pb-0">
                                            <h6>Filter Products</h6>
                                        </div>
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
                                                        <a href="{{url('products/category').'/'.$category->category_slug}}">{{$category->category}}</a>
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
                                                        <a class="text-black" href="{{url('products/brand').'/'.$brand->brand_slug}}">{{$brand->brand}}</a>
                                                    </li>
                                                    @empty
                                                        
                                                    @endforelse
                                                </ul>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-9">
                                <div class="product-wrapper">                                    
                                    <div class="product-grid">
                                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                                            @foreach ($products as $item)
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
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <hr />
                                    <nav class="d-flex justify-content-between" aria-label="Page navigation">
                                        <ul class="pagination">
                                            {{$products->links();}}
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