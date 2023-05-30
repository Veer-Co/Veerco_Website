@extends('master')
@section('title')
    Home - Veer & Co
@endsection
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper mt-2">
        <div class="page-content">
            <div class="fluid-container px-2">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- <div class="col-lg-3 category_set_after_navbar"> -->
                            <!-- <div class="card"> -->
                            <!--     <div class="card-header bg-info pb-0"> -->
                            <!--         <h6>Explore Product Categories</h6> -->
                            <!--     </div> -->
                            <!--     <div class="card-body"> -->
                            <!--         <div class="col-lg-12"> -->
                            <!--             <div class="row"> -->
                            <!--                 @foreach ($categories->take(4) as $category) -->
                            <!--                 <div class="col-lg-6 mb-1 text-center"> -->
                            <!--                     <a href="{{url('products/category').'/'.$category->category_slug}}" class="text-black"> -->
                            <!--                         <img src="{{asset('uploads/category').'/'.$category->category_image}}" -->
                            <!--                             alt="{{$category->category}}" title="{{$category->category}}" class="category_after_nav"> -->
                            <!--                         <span class="fw-bold" title="{{$category->category}}">{{ \Illuminate\Support\Str::limit($category->category, 20, $end='...') }}</span> -->
                            <!--                     </a> -->
                            <!--                 </div> -->
                            <!--                 @endforeach -->
                            <!--                 <div class="col-lg-12"> -->
                            <!--                     <a href="{{url('category')}}" class="float-end">See All</a> -->
                            <!--                 </div> -->
                            <!--             </div> -->
                            <!--         </div> -->
                            <!--     </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                        <div class="col-lg-9 mx-auto w-100">
                            <!--start slider section-->
                            <section class="slider-section">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="3" aria-label="Slide 4"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('assets/images/slider/banner 1.jpg') }}"
                                                class="d-block w-100 banner_height" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/images/slider/Untitled-15.png') }}"
                                                class="d-block w-100 banner_height" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/images/slider/For-slider-1.png') }}"
                                                class="d-block w-100 banner_height" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('assets/images/slider/Slider-5.png') }}"
                                                class="d-block w-100 banner_height" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:transparent; border-radius:15px;"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"  style="background-color:transparent; border-radius:15px;"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </section>
                            <!--end slider section-->
                        </div>
                    </div>
                </div>
            </div>
            <!--start information-->
            {{-- <section class="py-3 border-top border-bottom">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center p-3 bg-white">
                                <div class="fs-1"><i class='bx bx-taxi'></i>
                                </div>
                                <div class="info-box-content ps-3">
                                    <h6 class="mb-0">FREE SHIPPING &amp; RETURN</h6>
                                    <p class="mb-0">Free shipping on all orders over $49</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center p-3 bg-white">
                                <div class="fs-1"><i class='bx bx-dollar-circle'></i>
                                </div>
                                <div class="info-box-content ps-3">
                                    <h6 class="mb-0">MONEY BACK GUARANTEE</h6>
                                    <p class="mb-0">100% money back guarantee</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center p-3 bg-white">
                                <div class="fs-1"><i class='bx bx-support'></i>
                                </div>
                                <div class="info-box-content ps-3">
                                    <h6 class="mb-0">ONLINE SUPPORT 24/7</h6>
                                    <p class="mb-0">Awesome Support for 24/7 Days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section> --}}
            <!--end information-->
            <!--start pramotion-->
            {{-- <section class="py-4">
                <div class="container best_selling_product">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <h5 class="text-uppercase mb-0">Best selling product</h5>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col">
                            <div class="card border shadow-none">
                                <div class="row g-0 align-items-center">
                                    <div class="col">
                                        <img src="{{asset('assets/images/categories/vertex-angle-fixed-milling-machine-vise-with-base-va-00_1.png')}}" class="img-fluid" alt="" />
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">Manufacturing & Fabrication</h5>
                                            <p class="card-text text-uppercase">Starting at ₹9,095.00</p> <a href="javascript:;"
                                                class="btn btn-veerco btn-ecomm ">SHOP NOW <i
                                                    class='bx bx-right-arrow-alt'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border shadow-none">
                                <div class="row g-0 align-items-center">
                                    <div class="col">
                                        <img src="{{asset('assets/images/products/stanley-x150-01.jpg')}}" class="img-fluid" alt="" />
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">Logistics & Warehousing</h5>
                                            <p class="card-text text-uppercase">Starting at ₹5,065.00</p> <a href="javascript:;"
                                                class="btn btn-veerco btn-ecomm">SHOP NOW <i
                                                    class='bx bx-right-arrow-alt'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border shadow-none">
                                <div class="row g-0 align-items-center">
                                    <div class="col">
                                        <img src="{{asset('assets/images/categories/btali-00_1.jpg')}}" class="img-fluid" alt="" />
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">Infrastructure & Construction</h5>
                                            <p class="card-text text-uppercase">Starting at ₹5,451.00</p> <a href="javascript:;"
                                                class="btn btn-veerco btn-ecomm">SHOP NOW <i
                                                    class='bx bx-right-arrow-alt'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section> --}}
            <!--end pramotion-->
            <!--start Featured product-->
            @if ($toproducts->count() > 12)
            <section class="py-4 px-2">
                <div class="fluid-container">
                    <div class="d-flex align-items-center bjalsak">
                        <h5 class="text-uppercase mb-0">Best selling product</h5>
                        <a href="{{ url('products') }}" class="btn btn-veerco-he btn-ecomm ms-auto rounded-0">More
                            Products<i class='bx bx-chevron-right'></i></a>
                    </div>
                    <div class="product-grid jkdjwks">
                        <div class="row">
                            @foreach ($toproducts->take(12) as $topproduct)
                                <div class="col-md-2 pb-2">
                                    <div class="card rounded-0 product-card">
                                        <div class="card-header bg-transparent border-bottom-0">
                                            <div class="d-flex align-items-center justify-content-end gap-3">
                                                <a href="javascript:;">
                                                    <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <a href="{{ url('products-details') . '/' . $topproduct->product_slug }}">
                                            {{-- @foreach ($topproduct->product_images as $proimg) --}}
                                            <img src="{{ asset('uploads/products') . '/' . $topproduct->thumbnail }}"
                                                class="card-img-top h-140" alt="{{ $topproduct->product_name }}">
                                            {{-- @endforeach --}}
                                        </a>
                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="{{ url('products-details') . '/' . $topproduct->product_slug }}">
                                                    @foreach ($topproduct->categories as $topproductcat)
                                                        <p class="product-catergory font-13 mb-1">
                                                            {{ $topproductcat->category }}</p>
                                                    @endforeach
                                                </a>
                                                <a href="{{ url('products-details') . '/' . $topproduct->product_slug }}">
                                                    <h6 class="product-name mb-2"
                                                        title="{{ $topproduct->product_name }}">
                                                        {{ Str::limit($topproduct->product_name, 35) }}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <div class="mb-1 product-price"><span
                                                            class="me-1 text-decoration-line-through">&#8377;{{ number_format((float) $topproduct->mrp, 2, '.', '') }}</span>
                                                        <span
                                                            class="fs-5">&#8377;{{ number_format((float) $topproduct->price, 2, '.', '') }}</span>
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
                                                        <form action="{{ route('addtocart') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="quantity"
                                                                class="form-control qty-input text-center" value="1">
                                                            <input type="hidden" name="pid"
                                                                value="{{ $topproduct->product_id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-ecomm w-100"><i
                                                                    class='bx bxs-cart-add'></i>&nbsp;Add to Cart</button>
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
                </div>
            </section>
            <!--end Featured product-->
            @endif
            <!--start New Arrivals-->
            <section class="py-4 px-2">
                <div class="fluid-container">
                    <div class="d-flex align-items-center bjalsak">
                        <h5 class="text-uppercase mb-0">New Arrivals</h5>
                        <a href="{{ url('products') }}" class="btn btn-veerco-he ms-auto rounded-0">View All<i
                                class='bx bx-chevron-right'></i></a>
                    </div>
                    <div class="product-grid pt-2">
                        <div class="new-arrivals owl-carousel owl-theme">
                            @foreach ($newarrivals as $newarr)
                                <div class="item">
                                    <div class="card rounded-0 product-card">
                                        <div class="product-label">
                                            <span class="new">{{ceil(($newarr->mrp - $newarr->price)/$newarr->mrp *100)}}% off</span>
                                        </div>
                                        <a href="{{ url('products-details') . '/' . $newarr->product_slug }}">
                                            {{-- @foreach ($newarr->product_images as $newarrproduct) --}}
                                            <img src="{{ asset('uploads/products') . '/' . $newarr->thumbnail }}" class="card-img-top" alt="{{$newarr->product_name}}">
                                            {{-- @endforeach --}}
                                        </a>
                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="{{ url('products-details') . '/' . $newarr->product_slug }}">
                                                    @foreach ($newarr->categories as $newarrcategory)
                                                        <p class="product-catergory font-13 mb-1">
                                                            {{ $newarrcategory->category }}</p>
                                                    @endforeach
                                                </a>
                                                <a href="{{ url('products-details') . '/' . $newarr->product_slug }}">
                                                    <h6 class="product-name mb-2 product-name-mob" title="{{ $newarr->product_name }}">{{ Str::limit($newarr->product_name, 25) }}</h6>
                                                    <h6 class="product-name mb-2 pnm" title="{{ $newarr->product_name }}">{{ Str::limit($newarr->product_name, 52) }}</h6>
                                                    <h6 class="product-name mb-2 minitabview" title="{{ $newarr->product_name }}">{{ Str::limit($newarr->product_name, 14) }}</h6>
                                                    <h6 class="product-name mb-2 airtabview" title="{{ $newarr->product_name }}">{{ Str::limit($newarr->product_name, 16) }}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <div class="mb-1 product-price">
                                                        <span class="me-1 text-decoration-line-through">&#8377;{{ number_format((float) $newarr->mrp, 2, '.', '') }}</span>
                                                        <span class="fs-5">&#8377;{{ number_format((float) $newarr->price, 2, '.', '') }}</span>
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2">
                                                    <div class="d-grid gap-2">
                                                        <form action="{{ route('addtocart') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="quantity"
                                                                class="form-control qty-input text-center" value="1">
                                                            <input type="hidden" name="pid"
                                                                value="{{ $newarr->product_id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-ecomm w-100"><i
                                                                    class='bx bxs-cart-add'></i>&nbsp;Add to Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            <!--end New Arrivals-->

            @if (false)
                <!--start categories-->
            <section class="py-4 px-2">
                <div class="fluid-container">
                    <div class="d-flex align-items-center bjalsak">
                        <h5 class="text-uppercase mb-0">Top Catergory</h5>
                        <a href="shop-categories.html" class="btn btn-veerco-he ms-auto rounded-0">View All<i
                                class='bx bx-chevron-right'></i></a>
                    </div>
                    <hr />
                    <div class="product-grid">
                        <div class="browse-category owl-carousel owl-theme">
                            @foreach ($categories as $category)
                                <div class="item">
                                    <div class="card rounded-0 product-card border">
                                        <div class="card-body">
                                            <img src="{{ asset('uploads/category') . '/' . $category->category_image }}"
                                                class="img-fluid img-category" alt="{{ $category->category }}">
                                        </div>
                                        <div class="card-footer text-center">
                                            <h6 class="mb-1 text-uppercase">{{ $category->category }}</h6>
                                            {{-- <p class="font-12 text-uppercase">10 Products</p> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!--end categories-->
            @endif


            <!--start brands-->
            <section class="py-2 px-2">
                <div class="fluid-container">
                    <div class="card">
                        <div class="card-header text-center bg-white">
                            <h4>Top Brands</h4>
                        </div>
                        <div class="card-body">
                            <div class="brand-grid">
                                <div class="brands-shops owl-carousel owl-theme border">
                                    @foreach ($brands as $brand)
                                        <div class="item border-end">
                                            <div class="p-4">
                                                <a href="{{url('products/brand').'/'.$brand->brand_slug}}">
                                                    <img src="{{ asset('uploads/brand') . '/' . $brand->brand_image }}" class="brand_logos" alt="{{ $brand->brand }}">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end brands-->
            <!--start Advertise banners-->
            <section class="py-4">
                <div class="container">
                    <div class="add-banner">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                            <div class="col d-flex">
                                <div class="card rounded-0 w-100 border shadow-none">
                                    <a href="/products/brand/pronix"><img src="{{asset('assets/images/pronix-lift-table-02_2.png')}}" class="card-img-top" alt="..."></a>
                                    <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                            class="">-10%</span>
                                    </div>
                                    <div class="card-body">
                                        <a href="/products/brand/pronix">
                                            <h5 class="card-title">Pronix Hydraulic Scissor</h5>
                                            <p class="card-text">See all Pronix Hydraulic Scissor Lift Table and get 10% off at all Pronix Hydraulic Scissor</p> <a
                                                href="/products/brand/pronix" class="btn btn-veerco btn-ecomm">SHOP BY PRONIX</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card rounded-0 w-100 border shadow-none">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                            class="">-80%</span>
                                    </div>
                                    <div class="card-body text-center mt-5">
                                        <a href="/products/brand/stanley">
                                            <h5 class="card-title">Stanley Hydraulic Scissor</h5>
                                            <p class="card-text">Buy Stanley Hydraulic Scissor Lift Table and get 30% off at all Stanley Hydraulic Scissor Lift Table</p> <a
                                                href="/products/brand/stanley" class="btn btn-veerco btn-ecomm">SHOP BY STANLEY</a>
                                        </a>
                                    </div>
                                    <a href="/products/brand/stanley"><img src="{{asset('assets/images/products/stanley-x150-01.jpg')}}" class="card-img-top" alt="..."></a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card rounded-0 w-100 border shadow-none">
                                    <a href="/brands"><img src="{{asset('assets/images/pronix-lift-table-02_2.png')}}" class="card-img h-100" alt="..."></a>
                                    <div class="card-img-overlay text-center top-20">
                                        <div class="border border-white border-3 py-3 bg-dark-3">
                                            <a href="/brands">
                                                <h5 class="card-title text-white">Super Sale</h5>
                                                <p class="card-text text-uppercase fs-1 lh-1 mt-3 mb-2 text-white">Up to 80%
                                                    off</p>
                                                <p class="card-text fs-5 text-white">On top Brands</p> <a
                                                    href="/brands" class="btn btn-white btn-ecomm">SHOP BY BRAND</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card rounded-0 w-100 border shadow-none">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                            class="">-50%</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <a href="/brands">
                                            <img src="{{asset('assets/images/products/stanley-x150-01.jpg')}}" class="card-img-top" alt="...">
                                            <h5 class="card-title fs-1 text-uppercase">Super Sale</h5>
                                            <p class="card-text text-uppercase fs-4 lh-1 mb-2">Up to 50% off</p>
                                            <p class="card-text">On All MANUFACTURING & FABRICATION</p> <a href="/brands"
                                                class="btn btn-veerco btn-ecomm">HURRY UP!</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </section>
            <!--end Advertise banners-->
            <!--start bottom products section-->
            {{-- <section class="py-4 border-top">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                        <div class="col">
                            <div class="bestseller-list mb-3">
                                <h6 class="mb-3 text-uppercase">Best Selling Products</h6>
                                @foreach ($toproducts->take(4) as $topproduct)
                                    <div class="d-flex align-items-center" style="cursor: pointer;"
                                        onclick="window.location.href='{{ url('products-details') . '/' . $topproduct->product_slug }}'">
                                        <div class="bottom-product-img">
                                            <a href="{{ url('products-details') . '/' . $topproduct->product_slug }}">
                                                <img src="{{ asset('uploads/products') . '/' . $topproduct->thumbnail }}"
                                                    width="80" alt="">
                                            </a>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="fw-light mb-1">{{ Str::limit($topproduct->product_name, 20) }}</h6>
                                            <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                            </div>
                                            <p class="mb-0">
                                                <strong>&#8377;{{ number_format((float) $topproduct->price, 2, '.', '') }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <hr />
                                @endforeach
                            </div>
                        </div>
                        <div class="col">
                            <div class="featured-list mb-3">
                                <h6 class="mb-3 text-uppercase">Featured Products</h6>
                                @foreach ($featured as $futpro)
                                    <div class="d-flex align-items-center" style="cursor: pointer;"
                                        onclick="window.location.href='{{ url('products-details') . '/' . $futpro->product_slug }}'">
                                        <div class="bottom-product-img">
                                            <a href="{{ url('products-details') . '/' . $futpro->product_slug }}">
                                                <img src="{{ asset('uploads/products') . '/' . $futpro->thumbnail }}"
                                                    width="80" alt="">
                                            </a>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="fw-light mb-1">{{ Str::limit($futpro->product_name, 20) }}</h6>
                                            <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                            </div>
                                            <p class="mb-0">
                                                <strong>&#8377;{{ number_format((float) $futpro->price, 2, '.', '') }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <hr />
                                @endforeach
                            </div>
                        </div>
                        <div class="col">
                            <div class="new-arrivals-list mb-3">
                                <h6 class="mb-3 text-uppercase">New arrivals</h6>
                                @foreach ($newarrivals->take(4) as $newarrival)
                                    <div class="d-flex align-items-center" style="cursor: pointer;"
                                        onclick="window.location.href='{{ url('products-details') . '/' . $newarrival->product_slug }}'">
                                        <div class="bottom-product-img">
                                            <a href="{{ url('products-details') . '/' . $newarrival->product_slug }}">
                                                <img src="{{ asset('uploads/products') . '/' . $newarrival->thumbnail }}"
                                                    width="80" alt="">
                                            </a>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="fw-light mb-1">{{ Str::limit($newarrival->product_name, 20) }}</h6>
                                            <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                            </div>
                                            <p class="mb-0">
                                                <strong>&#8377;{{ number_format((float) $newarrival->price, 2, '.', '') }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <hr />
                                @endforeach
                            </div>
                        </div>
                        <div class="col">
                            <div class="top-rated-products-list mb-3">
                                <h6 class="mb-3 text-uppercase">Top rated Products</h6>
                                @foreach ($bsps as $bsp)
                                    <div class="d-flex align-items-center" style="cursor: pointer;"
                                        onclick="window.location.href='{{ url('products-details') . '/' . $bsp->product_slug }}'">
                                        <div class="bottom-product-img">
                                            <a href="{{ url('products-details') . '/' . $bsp->product_slug }}">
                                                <img src="{{ asset('uploads/products') . '/' . $bsp->thumbnail }}"
                                                    width="80" alt="">
                                            </a>
                                        </div>
                                        <div class="ms-0">
                                            <h6 class="fw-light mb-1">{{ Str::limit($bsp->product_name, 20) }}</h6>
                                            <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                            </div>
                                            <p class="mb-0">
                                                <strong>&#8377;{{ number_format((float) $bsp->price, 2, '.', '') }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <hr />
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section> --}}
            <!--end bottom products section-->
            <!--start support info-->
            <section class="py-4 bg-rlight">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
                        <div class="col">
                            <div class="text-center">
                                <div class="font-50"> <i class='bx bx-cart'></i>
                                </div>
                                <h2 class="fs-5 text-uppercase mb-0">Free delivery</h2>
                                <p class="text-capitalize">Free delivery over ₹500/-</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <div class="font-50"> <i class='bx bx-credit-card'></i>
                                </div>
                                <h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>
                                <p class="text-capitalize">We possess SSL / Secure сertificate</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <div class="font-50"> <i class='bx bx-dollar-circle'></i>
                                </div>
                                <h2 class="fs-5 text-uppercase mb-0">Free returns</h2>
                                <p class="text-capitalize">We return money within 30 days</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <div class="font-50"> <i class='bx bx-support'></i>
                                </div>
                                <h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>
                                <p class="text-capitalize">Friendly 24/7 customer support</p>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end support info-->
        </div>
    </div>
    <!--end page wrapper -->
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
