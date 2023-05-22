@extends('admin.admin_layout')
@section('title')
    Add Product - Veer & Co
@endsection
@section('content')
<style>
    .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 200px;
            }
    #seo_wrap .seo-preview .page-title-seo {
        color: #1a0dab;
        display: block;
        font-size: 18px;
        line-height: 21px;
        margin-bottom: 2px;
        min-height: 21px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    #seo_wrap .seo-preview * {
        word-break: break-all;
    }
    .ws-nm {
        white-space: normal;
    }
    .hidden {
        display: none!important;
    }
    #preview_thumbnail_image img{
        width: 300px;
        height: 300px;
    }
    label{
        font-family: "Nunito", sans-serif;
        font-weight: 600;
    }
</style>
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Add Product</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('admin.add-products')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2 col-sm-6">
                                    <label for="category" class="form-label">Select Category <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-select">
                                        <option value="" disabled selected>--Select Category--</option>
                                        @forelse ($categories as $category)
                                            <option value="{{$category->category_slug}}">{{$category->category}}</option>
                                        @empty
                                            <option value="">category not available</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group mb-2 col-sm-6">
                                    <label for="subcategory" class="form-label">Select SubCategory</label>
                                    <select name="subcategory" id="subcategory" class="form-select">
                                    </select>
                                </div>                                
                                <div class="form-group mb-2 col-sm-6">
                                    <label for="brand" class="form-label">Select Brand</label>
                                    <select name="brand" id="brand" class="form-select">
                                        <option disabled selected>--Select Brand--</option>
                                        @forelse ($brands as $brand)
                                            <option value="{{$brand->brand_slug}}">{{$brand->brand}}</option>
                                        @empty
                                            <option value="">brand not available</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group mb-2 col-sm-6">
                                    <label for="product_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Product Name" name="product_name" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" required class="form-control" />
                                    <div id="product_slug_show" class="hidden">
                                        <label class="control-label  required " for="current-slug">Permalink:</label>
                                        <span id="sample-permalink" class="d-inline-block m-0 p-0" dir="ltr">
                                            <a class="permalink" target="_blank" id="ahref" href="">
                                                <span class="default-slug"><span id="product_slug"></span></span>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                {{-- <div class="form-group mb-2 col-sm-12">
                                    <label for="product_title" class="form-label">Product Title <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Product Title" name="product_title" required class="form-control" />
                                </div> --}}
                                <div class="form-group mb-2 col-sm-6">
                                    <label for="sku" class="form-label">Product SKU <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Product SKU" name="sku" required class="form-control" />
                                </div>
                                <div class="form-group mb-2 col-sm-6">
                                    <label for="mrp" class="form-label">Product MRP <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Product MRP" name="mrp" required class="form-control" />
                                </div>
                                <div class="form-group mb-2 col-sm-6">
                                    <label for="price" class="form-label">Product Price <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Product Price" name="price" required class="form-control" />
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="tax">Tax</label>
                                    <select name="tax" id="tax" class="form-select">
                                        <option value="">None</option>
                                        @foreach ($taxes as $tax)
                                        <option value="{{$tax->id}}">{{$tax->tax_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group col-sm-6 mb-2">
                                    <label for="modelno">Model Number</label>
                                    <input type="text" name="modelno" id="modelno" class="form-control" placeholder="Enter Model Number" />
                                </div>
                                <div class="form-group col-sm-6 mb-2">
                                    <label for="hsn">HSN</label>
                                    <input type="text" name="hsn" id="hsn" class="form-control" placeholder="Enter HSN" />
                                </div> --}}
                                <span class="text-danger">Shipping</span>
                                <div class="form-group mb-2 col-sm-3">
                                    <label for="weight" class="form-label">Weight (kg)</label>
                                    <input type="text" placeholder="Enter Weight (kg)" name="weight" class="form-control" />
                                </div>
                                <div class="form-group mb-2 col-sm-3">
                                    <label for="length" class="form-label">Length (cm)</label>
                                    <input type="text" placeholder="Enter Length (cm)" name="length" class="form-control" />
                                </div>
                                <div class="form-group mb-2 col-sm-3">
                                    <label for="wide" class="form-label">Wide (cm)</label>
                                    <input type="text" placeholder="Enter Wide (cm)" name="wide" class="form-control" />
                                </div>
                                <div class="form-group mb-2 col-sm-3">
                                    <label for="height" class="form-label">Height (cm)</label>
                                    <input type="text" placeholder="Enter Height (cm)" name="height" class="form-control" />
                                </div>
                                <span class="text-danger">Stock</span>
                                <div class="form-group col-sm-12">
                                    <label class="text-primary mt-2 mb-2">
                                        <input type="checkbox" name="storehouse" id="storehouse" onclick="with_storehouse()" class="form-check-input" value="0"> With storehouse management
                                    </label>
                                    <div class="storehouse_info hidden" id="storehouse_info">
                                        <div class="form-group mb-3">
                                            <label class="text-title-field">Quantity</label>
                                            <input type="text" class="form-control" value="0" name="quantity">
                                        </div>
                                        <div class="form-group mb-3" >
                                            <label class="text-title-field">
                                                <input type="checkbox" name="allow_checkout" id="allow_checkout" onclick="allow_checkout_when()" value="0" class="form-check-input">
                                                &nbsp;Allow customer checkout when this product out of stock
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2" id="stockstatus_manage">                                    
                                        <label for="stockstatus" class="form-label">Stock Status <span class="text-danger">*</span></label>
                                        <select name="stockstatus" id="stockstatus" class="form-select">
                                            <option value="in_stock">In Stock</option>
                                            <option value="out_of_stock">Out Of Stock</option>
                                            <option value="on_backorder">On Backorder</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-2 col-sm-12">
                                    <label for="overview" class="form-label">Overview </label>
                                    <textarea name="overview" id="overview" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-2 col-sm-12">
                                    <label for="description" class="form-label">Description </label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group mb-2">
                                        <label for="short_description" class="form-label">Short Description </label>
                                        <textarea name="short_description" id="short_description" class="form-control"></textarea>
                                    </div>
                                    <div class="field_wrapper card p-3 border">
                                        <label for="gallery-image" class="form-label">Gallery Images (600X600)</label>
                                        <p class="form-text text-muted">These images are visible in product details page gallery. Use 600x600 sizes images.</p>
                                        <div class="input-group mb-3 col-sm-12">
                                            <input type="file" class="form-control" id="gallery-image" required name="gallery_image[]" />
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary add_button" title="Add More Image">Add More&nbsp;<i class="bx bx-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="card border p-3">
                                        <div class="form-group col-sm-12">
                                            <label for="thumbnail_image" class="form-label">Thumbnail Image (300X300)</label>
                                            <input type="file" class="form-control" id="thumbnail_image" name="thumbnail" required />
                                            {{-- <span id="preview_thumbnail_image"></span>
                                            <p class="form-text text-danger" id="thumbnail_size"></p> --}}
                                            <p class="form-text text-muted">This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.</p>
                                        </div>
                                    </div>                                    
                                </div>   
                                <div class="col-sm-4">
                                    <div class="card border">
                                        <div class="card-header">
                                            <h6 class="card-title">
                                                Is Top Product
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-2 col-sm-12 mt-2">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="is_top_product">Is Top Product</label>
                                                    <input class="form-check-input" type="checkbox" name="is_top_product" id="is_top_product">
                                                </div>
                                            </div>
                                        </div>                                                                                
                                    </div>
                                    <div class="card border">
                                        <div class="card-header">
                                            <h6 class="card-title">
                                                Todays Deal
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-2 col-sm-12 mt-2">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="todays_deal">Status</label>
                                                    <input class="form-check-input" type="checkbox" name="todays_deal" id="todays_deal">
                                                </div>
                                            </div>
                                        </div>                                                                                
                                    </div> 
                                    <div class="card border">
                                        <div class="card-header">
                                            <h6 class="card-title">
                                                Is Featured?
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-2 col-sm-12 mt-2">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="is_featured">Status</label>
                                                    <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured">
                                                </div>
                                            </div>
                                        </div>                                                                                
                                    </div> 
                                    <div class="card border">
                                        <div class="card-header">
                                            <h5 class="mb-0 h6">Estimate Shipping Time</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="name">
                                                    Shipping Days
                                                </label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="est_shipping_days" min="1" step="1" placeholder="Shipping Days">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">Days</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>   
                                <div class="col-sm-12">
                                    <div class="card border">
                                        <div class="card-header">
                                            <h5 class="mb-0 h6">Add Bought Together Option</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-2 col-sm-12 mt-2">
                                                <label for="bought_prod" class="text-danger">Products (Maximum 2)</label>
                                                <select name="bought_product[]" id="bought_prod" data-max-options="2" multiple data-placeholder="Choose Bought Together Products (Maximum 2)" data-live-search="true" data-selected-text-format="count" class="form-control border selectpicker ">
                                                    @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                                        <option value="{{$product->product_id}}">{{ $product->product_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="alert alert-danger mt-2">
                                                    Selected Bought together products name will show here.
                                                </div>
                                            </div>
                                            <div class="form-group d-none" id="bought_product_list">
                                            </div>
                                        </div>
                                    </div>
                                </div>                          
                                <div class="col-sm-12">
                                    <div class="card border">
                                        <div class="card-header">
                                            <h5 class="mb-0 h6">Related Products</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-2 col-sm-12 mt-2">
                                                {{-- <label for="related_product" class="text-danger">Related Products</label> --}}
                                                <select name="related_product[]" id="related_product" multiple data-placeholder="Choose Related Products" data-live-search="true" data-selected-text-format="count" class="form-control border selectpicker ">
                                                    @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                                        <option value="{{$product->product_id}}">{{ $product->product_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group d-none" id="related_product_list">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group mb-2 col-sm-12 mt-2">
                                    <label for="cross_selling" class="text-danger">Cross-selling Products</label>
                                    <select name="cross_selling[]" id="cross_selling" multiple data-placeholder="Choose Cross Selling Products" data-live-search="true" data-selected-text-format="count" class="form-control border selectpicker ">
                                        @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                            <option value="{{$product->product_id}}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group d-none" id="cross_product_list">
                                </div>
                                <div class="form-group mb-2 col-sm-12 mt-2">
                                    <label for="up_selling" class="text-danger">Up-selling Products</label>
                                    <select name="up_selling[]" id="up_selling" multiple data-placeholder="Choose Up-Selling Products" data-live-search="true" data-selected-text-format="count" class="form-control border selectpicker ">
                                        @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                            <option value="{{$product->product_id}}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group d-none" id="upselling_product_list">
                                </div> --}}
                                <div class="card box-border border border-danger" id="seo_wrap">
                                    <div class="card-header bg-danger text-white">
                                        <div class="d-inline float-start">Search Engine Optimize</div>
                                        <button class="d-inline float-end rounded border-0 btn-trigger-show-seo-detail">Edit SEO Meta</button>
                                    </div>
                                    <div class="crad-body p-2">
                                        <div class="seo-preview">
                                            <p class="default-seo-description">Setup meta title &amp; description to make your site easy to discovered on search engines such as Google</p>
                                            <div class="existed-seo-meta hidden">
                                                <span class="page-title-seo"></span>                                        
                                                <div class="page-url-seo ws-nm">
                                                    <p class="p-0 m-0">-</p>
                                                </div>                                        
                                                <div class="ws-nm">
                                                    <span style="color: #70757a;">Aug 30, 2022 - </span>
                                                    <span class="page-description-seo"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="seo-edit-section hidden">
                                            <hr>
                                            <div class="form-group mb-3">
                                                <label for="seo_title">SEO Title</label>
                                                <input class="form-control" id="seo_title" placeholder="Meta Title" data-counter="120" name="seo_title" type="text">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="seo_description">SEO description</label>
                                                <textarea class="form-control" rows="3" id="seo_description" placeholder="Meta description" data-counter="160" name="seo_description" cols="50"></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="seo_keywords">SEO Keywords</label>
                                                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Meta Keywords">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="seo_schema">SEO Schema</label>
                                                <textarea class="form-control" rows="3" id="seo_schema" placeholder="SEO Schema" name="seo_schema" cols="50"></textarea>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="form-group mb-2 text-center">
                                    <button class="btn btn-danger"><i class="bx bx-paper-plane"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end row-->
      </main>
   <!--end page main-->
   @if (Session::has('success'))
<script> 
    Lobibox.notify('success', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: '{{ Session::get("success") }}'
	});    
</script>
@endif
@if (Session::has('error'))
<script>   
    Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-x-circle',
		msg: '{{ Session::get("error") }}'
	});      
</script>
@endif
   <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#overview' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#short_description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        function with_storehouse() {
            var storehouse = document.getElementById("storehouse").value;
            if (storehouse == "0") {
                document.getElementById("storehouse").value = "1";
                var storehousecn = document.getElementById("storehouse_info");
                storehousecn.classList.remove("hidden");

                var stockstatus_manage = document.getElementById("stockstatus_manage");
                stockstatus_manage.classList.add("hidden");
            } else {
                document.getElementById("storehouse").value = "0";
                var storehousecn = document.getElementById("storehouse_info");
                storehousecn.classList.add("hidden");

                var stockstatus_manage = document.getElementById("stockstatus_manage");
                stockstatus_manage.classList.remove("hidden");
            }           

        }        
    </script>
    <script>
        function allow_checkout_when(){
            var allow_checkout = document.getElementById("allow_checkout").value;
            if (allow_checkout == "0") {
                document.getElementById("allow_checkout").value = "1";
            } else {
                document.getElementById("allow_checkout").value = "0";
            }
        }
    </script>
    <script>
        /* Encode string to slug */
        function convertToSlug( str ) {

            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                    .toLowerCase();
            
            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm,'');
            
            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');  
            var full_slug = document.getElementById("product_slug").innerHTML = "https://veerco.com/products/"+str; 
            var element = document.getElementById("product_slug_show");
                element.classList.remove("hidden");
            document.getElementById("ahref").href="https://veerco.com/products/"+str; 
            //return str;
        }
    </script>
    <script type="text/javascript">
        (() => {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var a = t[n];
                    a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
                }
            }
            var t = function() {
                function t() {
                    ! function(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    }(this, t), this.$document = $(document)
                }
                var n, a, i;
                return n = t, i = [{
                    key: "updateSEOTitle",
                    value: function(e) {
                        e ? ($("#seo_title").val() || $(".page-title-seo").text(e), $(".default-seo-description").addClass("hidden"), $(".existed-seo-meta").removeClass("hidden")) : ($(".default-seo-description").removeClass("hidden"), $(".existed-seo-meta").addClass("hidden"))
                    }
                }, {
                    key: "updateSEODescription",
                    value: function(e) {
                        e && ($("#seo_description").val() || $(".page-description-seo").text(e))
                    }
                }], (a = [{
                    key: "handleMetaBox",
                    value: function() {
                        var e = this.$document.find("#sample-permalink a");
                        e.length && $(".page-url-seo p").text(e.prop("href").replace("?preview=true", "")), this.$document.on("click", ".btn-trigger-show-seo-detail", (function(e) {
                            e.preventDefault(), $(".seo-edit-section").toggleClass("hidden")
                        })), this.$document.on("keyup", "input[name=name]", (function(e) {
                            t.updateSEOTitle($(e.currentTarget).val())
                        })), this.$document.on("keyup", "input[name=title]", (function(e) {
                            t.updateSEOTitle($(e.currentTarget).val())
                        })), this.$document.on("keyup", "textarea[name=description]", (function(e) {
                            t.updateSEODescription($(e.currentTarget).val())
                        })), this.$document.on("keyup", "#seo_title", (function(e) {
                            if ($(e.currentTarget).val()) $(".page-title-seo").text($(e.currentTarget).val()), $(".default-seo-description").addClass("hidden"), $(".existed-seo-meta").removeClass("hidden");
                            else {
                                var t = $("input[name=name]");
                                t.val() ? $(".page-title-seo").text(t.val()) : $(".page-title-seo").text($("input[name=title]").val())
                            }
                        })), this.$document.on("keyup", "#seo_description", (function(e) {
                            $(e.currentTarget).val() ? $(".page-description-seo").text($(e.currentTarget).val()) : $(".page-description-seo").text($("textarea[name=description]").val())
                        }))
                    }
                }]) && e(n.prototype, a), i && e(n, i), Object.defineProperty(n, "prototype", {
                    writable: !1
                }), t
            }();
            $(document).ready((function() {
                (new t).handleMetaBox()
            }))
        })();
    </script>

<script>
    jQuery(document).ready(function(){
        jQuery('#category').change(function(){
            let cid=jQuery(this).val();
            
    $('#subcategory').empty();
    $('#subcategory').append(`<option value="0" disabled selected>Processing...</option>`);
            jQuery.ajax({
                url:'{{url('admin/getSubcategory')}}',
                type:'post',
                data:'cid='+cid+'&_token={{csrf_token()}}',
                success:function(result){
                    jQuery('#subcategory').html(result);
                },
                error:function(result) {
                    jQuery().html("<option value=''>None</option>");
                }
            });
        });
    });    
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#related_product').on('change', function(){
        var product_ids = $('#related_product').val();
        // console.log(product_ids);
        if(product_ids.length > 0){
                $("#related_product_list").removeClass("d-none");
            $.post('{{ route('admin.related_products') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                // console.log(data);
                $('#related_product_list').html(data);
            });
        }
        else{
            $('#related_product_list').html(null);
                $("#related_product_list").addClass("d-none");
        }
    });

    $('#cross_selling').on('change', function(){
        var cross_product_ids = $('#cross_selling').val();
        // console.log(cross_product_ids);
        if(cross_product_ids.length > 0){
            $("#cross_product_list").removeClass("d-none");
            $.post('{{ route('admin.related_products') }}', {_token:'{{ csrf_token() }}', product_ids:cross_product_ids}, function(data){
                // console.log(data);
                $('#cross_product_list').html(data);
            });
        }
        else{
            $('#cross_product_list').html(null);
                $("#cross_product_list").addClass("d-none");
        }
    });

    $('#up_selling').on('change', function(){
        var upselling_product_ids = $('#up_selling').val();
        // console.log(cross_product_ids);
        if(upselling_product_ids.length > 0){
            $("#upselling_product_list").removeClass("d-none");
            $.post('{{ route('admin.related_products') }}', {_token:'{{ csrf_token() }}', product_ids:upselling_product_ids}, function(data){
                // console.log(data);
                $('#upselling_product_list').html(data);
            });
        }
        else{
            $('#upselling_product_list').html(null);
                $("#upselling_product_list").addClass("d-none");
        }
    });

    $('#bought_prod').on('change', function(){
        var bought_product_ids = $('#bought_prod').val();
        // console.log(cross_product_ids);
        if(bought_product_ids.length > 0){
            $("#bought_product_list").removeClass("d-none");
            $.post('{{ route('admin.related_products') }}', {_token:'{{ csrf_token() }}', product_ids:bought_product_ids}, function(data){
                // console.log(data);
                $('#bought_product_list').html(data);
            });
        }
        else{
            $('#bought_product_list').html(null);
                $("#bought_product_list").addClass("d-none");
        }
    });
})
</script>

<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 4; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="input-group mb-3 col-sm-12"><input type="file" class="form-control" id="gallery-image" name="gallery_image[]" /><div class="input-group-append"><button type="button" class="btn btn-danger remove_button" title="Remove Field">Remove&nbsp;<i class="bx bx-minus"></i></button></div></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent().parent('.input-group').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>

    {{-- <script>
        function displayPreview(files) {
        var reader = new FileReader();
        var img = new Image();
        reader.onload = function (e) {
            img.src = e.target.result;
            fileSize = Math.round(files.size / 1024);
            $('#thumbnail_size').text('Image Size: '+fileSize+' KB');
            alert("File size is " + fileSize + " kb");
            img.onload = function () {
                alert("width=" + this.width + " height=" + this.height);
                $('#preview_thumbnail_image').append('<img src="' + e.target.result + '"/>');
            };
        };
        reader.readAsDataURL(files);
        }
        $("#thumbnail_image").change(function () {
        var file = this.files[0];
        displayPreview(file);
        });
    </script> --}}

@endsection