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
                                                        {{-- <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="{{$brand->brand_slug}}" id="Adidas" />
                                                            <label class="form-check-label" for="Adidas">{{$brand->brand}}</label>
                                                        </div> --}}
                                                    </li>
                                                    @empty
                                                        
                                                    @endforelse
														
                                                    
                                                    
                                                </ul>                                                
                                            </div>
                                            {{-- <hr /> --}}
                                            {{-- <div class="price-range">
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
                                            </div> --}}
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
                                        <div id="load_product_data" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                                             @if(true)
											  
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
											 
                                             
											 @endif
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <hr />
                                    @if(true)
									<nav class="d-flex justify-content-between" aria-label="Page navigation">
                                        <ul class="pagination">
                                            {{$get_products->links();}}
                                        </ul>
                                    </nav>
									@endif
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
	
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
{{-- <script type="text/javascript">
	// product Filter start here
    $(document).ready(function () {
		console.log('function runs 1');
        //price range fonction start
        price_range();
        function price_range(){
            var $propertiesForm = $('.mall-category-filter');
            var $body = $('body');
            $('.mall-slider-handles').each(function () {
                var el = this;
                noUiSlider.create(el, {
                    start: [el.dataset.start, el.dataset.end],
                    connect: true,
                    tooltips: true,
                    range: {
                        min: [parseFloat(el.dataset.min)],
                        max: [parseFloat(el.dataset.max)]
                    },
                    pips: {
                        mode: 'range',
                        density: 20
                    }
                }).on('change', function (values) {
                    $('[data-min="' + el.dataset.target + '"]').val(values[0])
                    $('[data-max="' + el.dataset.target + '"]').val(values[1])
                    $propertiesForm.trigger('submit');

                    get_common_filter_function();
                });
            })

        }
        //price range fonction End

        // using for onload page
        var page = 1;
        var brand_array = get_brand_array();
        onChageLoadData(page, brand_array);

        // Used for get page number from pagination
        function urlParam(name, url_link){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(url_link);
            if (results==null) {
            return null;
            }
            return decodeURI(results[1]) || 0;
        }

        // Used for get data from pagiantion link
        $('body').on('click', '.pagination a', function(e){
            e.preventDefault();
            var url = $(this).attr('href');

            // using urlParam function
            var page = urlParam('page', url);
            get_common_filter_function(page);

        });

       var i = 0; // globally defined for array used in filter :  Don't remove this line

        // Return checked brands in array
        function get_brand_array(){
            var brand_arr = [];
            $('.brand:checked').each(function () {
                brand_arr[i++] = $(this).val();
            });
            brand_arr = brand_arr.filter(function( element ) {
                return element !== undefined;
            });
            return brand_arr;
        }

        // Return checked colors in array
        function get_color_array(){
            var color_arr = [];
            $('.color:checked').each(function () {
                color_arr[i++] = $(this).val();
            });
            color_arr = color_arr.filter(function( element ) {
                return element !== undefined;
            });
            return color_arr;
        }

        // Return checked attributes in array
        function get_attribute_array(){
            var attribute_arr = [];
            $('.attribute:checked').each(function () {
                attribute_arr[i++] = $(this).val();
            });
            attribute_arr = attribute_arr.filter(function( element ) {
                return element !== undefined;
            });
            return attribute_arr;
        }

        // common function for every filter
        function get_common_filter_function(page){
            var brand_arr = get_brand_array();
            var color_arr = get_color_array();
            var attribute_arr = get_attribute_array();
            var sort_by = $('.sort_by').val();
            var min_price = $('.min_price').val();
            var max_price = $('.max_price').val();
            onChageLoadData(page, brand_arr, color_arr, attribute_arr, sort_by, min_price, max_price);
        }

        // Brand wise filter
        $('.brand').change(function() {
            get_common_filter_function();
        });

        // Color wise filter
        $(".color").change(function () {
            get_common_filter_function();
        });

        //Attribute wise filter
        $(".attribute").change(function () {
            get_common_filter_function();
        });

        // Brand wise filter
        $('.sort_by').change(function() {
            get_common_filter_function();
        });

        // Common ajax for all filter
        function onChageLoadData(page, brand, color, attribute, sort_by, min_price, max_price){
			console.log('function runs 22');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('get_filtered_products') }}",
                method: "get",
                data: {
                    slug: "{{$latestslug}}",
                    page: page,
                    brand: brand,
                    color: color,
                    attribute: attribute,
                    sort_by: sort_by,
                    min_price: min_price,
                    max_price: max_price,
                },
                success: function(result){
                    console.log (result);
                    if(result.status == true){
                        $('#load_product_data').html(result.data.output);
                        // $('#pagination').html(result.data.product_page_link);

                        var quantity_value = $('.quantity').val();
                        // console.log(quantity_value);
                        if(quantity_value > 1){
                            $('.add_cart_button_minus').prop('disabled', false);
                        }else{
                            $('.add_cart_button_minus').prop('disabled', true);
                        }
                    }
                }
            });
        }

    });
    // product Filter end here
	
	 
	 
</script>
--}}
	
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