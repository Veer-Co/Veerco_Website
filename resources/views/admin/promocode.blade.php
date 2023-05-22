@extends('admin.admin_layout')
@section('title')
    Promo Code Setup - Veer & Co
@endsection
@section('content')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"/> --}}
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Promo Code Setup</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 border rounded p-2">
                                <form action="{{route('admin.promocode.store')}}" method="post" class="row">
                                    @csrf
                                    <div class="form-group col-sm-6">
                                        <label for="cuponcode">Create coupon code <span class="text-danger">*</span></label>
                                        <input type="text" name="cuponcode" id="cuponcode" placeholder="Create coupon code" required class="form-control" />
                                        <span class="form-text text-muted">Customers will enter this coupon code when they checkout.</span>
                                        <p class="form-text m-0" id="coupon_msg"></p>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="percentage">Coupon Type <span class="text-danger">*</span></label>
                                        <select name="coupon_type" id="coupon_type" class="form-select">
                                            <option value="rupees">Rupya Discount (&#8377;)</option>
                                            <option value="percentage">Percentage Discount (%)</option>
                                            <option value="free_shipping">Free Shipping</option>
                                            <option value="same_price">Same Price</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="discount" id="discount_label">Discount in (&#8377;)</label>
                                        <input type="tel" class="form-control" placeholder="Discount in &#8377;" name="discount" id="discount">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="apply_for">Apply For</label>
                                        <select name="apply_for" id="apply_for" class="form-select">
                                            <option value="all_products">All Products</option>
                                            <option value="order_amount_from">Order Amount From</option>
                                            <option value="product">Product</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 mt-2 d-none" id="order_amount_c">
                                        <label for="order_amount">Order Amount</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Order Amount Greater Than" id="order_amount" name="order_amount" aria-label="Order Amount Greater Than">
                                            <span class="input-group-text">&#8377;</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 d-none" id="products_choose">
                                        <label for="products">Select Products</label>
                                        <select name="relatedproducts[]" id="products" multiple data-placeholder="Choose Products" data-live-search="true" data-selected-text-format="count" class="form-control border selectpicker ">
                                            @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                                <option value="{{$product->product_id}}">{{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group d-none" id="product_table">
                                    </div>
                                    <div class="form-group col-sm-12 d-none" id="customer_choose">
                                        <label for="customers">Select Customer</label>
                                        <select name="relatedcustomers[]" id="customers" multiple data-placeholder="Choose Customers" data-live-search="true" data-selected-text-format="count" class="form-control border selectpicker ">
                                            @foreach(\App\Models\User::orderBy('created_at', 'desc')->get() as $customer)
                                                <option value="{{$customer->id}}">{{ $customer->first_name.$customer->last_name }} (E-mail: {{ $customer->email }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group text-center mt-2">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                        <div class="row mt-2">
                            <div class="col-sm-12 border rounded p-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-info">
                                            <tr>
                                                <th>Sl. No.</th>
                                                <th>Promocode</th>
                                                <th>Coupon Type</th>
                                                <th>Discount</th>
                                                <th>Apply For</th>
                                                <th>Order Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($promocode_items as $key => $promocode_item)
                                            <tr>
                                                <td>{{($promocode_items->currentpage()-1) * $promocode_items->perpage() + $key + 1}}</td>
                                                <td>{{$promocode_item->promocode}}</td>
                                                <td>
                                                    @if ($promocode_item->coupon_type == 'same_price')
                                                        Same Price
                                                    @elseif($promocode_item->coupon_type == 'free_shipping')
                                                        Free Shipping
                                                    @elseif($promocode_item->coupon_type == 'percentage')
                                                        Percentage
                                                    @elseif ($promocode_item->coupon_type == 'rupees')
                                                        Rupees
                                                    @endif
                                                </td>
                                                <td>{{$promocode_item->discount}}</td>
                                                <td>
                                                    @if ($promocode_item->apply_for == 'all_products')
                                                        All Product
                                                    @elseif($promocode_item->apply_for == 'order_amount_from')
                                                        FOrder Amount From
                                                    @elseif($promocode_item->apply_for == 'product')
                                                        Product
                                                    @elseif ($promocode_item->apply_for == 'customer')
                                                        Customer
                                                    @endif
                                                </td>
                                                <td>{{$promocode_item->order_amount}}</td>
                                                <td>{{$promocode_item->created_at}}</td>
                                                <td>
                                                    <form action="{{route('admin.promocode.destroy')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="promocodeid" value="{{$promocode_item->id}}">
                                                        <button class="btn btn-danger"><i class="bi bi-trash"></i>&nbsp;Delete</button>
                                                    </form>
                                                </td>
                                            </tr>                                        
                                            @empty
                                            <tr class="text-center text-danger">
                                                <td colspan="5">Data not available</td>                                        
                                            </tr>                                        
                                            @endforelse
                                            <tr>
                                                <td colspan="8">
                                                    <nav aria-label="...">
                                                        <ul class="pagination justify-content-end mb-0">
                                                            {{$promocode_items->links();}}
                                                        </ul>
                                                    </nav>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </div><!--end row-->
      </main>
   <!--end page main-->
<script type="text/javascript">
$(document).ready(function(){
    $("#coupon_type").change(function(){
        var coupon_type = $(this).val();
        if (coupon_type == 'percentage') {
            $('#discount_label').text("Discount in (%)");
            $("#discount").prop('readonly', false);
            $("#discount").attr("placeholder", "Discount in (%)").placeholder();
        } else if (coupon_type == 'rupees') {
            $('#discount_label').text("Discount in (₹)");
            $("#discount").prop('readonly', false);
            $("#discount").attr("placeholder", "Discount in (₹)").placeholder();
        } else if (coupon_type == 'free_shipping') {
            $('#discount_label').text("Discount in (₹)");
            $("#discount").prop('readonly', true);
            $("#discount").attr("placeholder", "Discount in (₹)").placeholder();
        } else if (coupon_type == 'same_price') {
            $('#discount_label').text("Discount in (₹)");
            $("#discount").prop('readonly', true);
            $("#discount").attr("placeholder", "Discount in (₹)").placeholder();
        }
        
    });

    $("#cuponcode").change(function(){
        var couponcode = $(this).val();
        if (couponcode != '') {
            $.post('{{ route('admin.check_coupon') }}',
            {_token:'{{ csrf_token() }}',
            couponcode:couponcode},
            function(res_coupon){
                if (res_coupon == 'valid') {
                    $("#cuponcode").addClass("border-success");
                    $("#cuponcode").removeClass("border-danger");
                    $("#coupon_msg").addClass("text-success");
                    $("#coupon_msg").removeClass("text-danger");
                    $("#coupon_msg").text("This coupon code is available.")
                } else {
                    $("#cuponcode").removeClass("border-success");
                    $("#cuponcode").addClass("border-danger");
                    $("#coupon_msg").removeClass("text-success");
                    $("#coupon_msg").addClass("text-danger");
                    $("#coupon_msg").text("This coupon code is not available.")
                }                
            });
        } else {
            $("#cuponcode").addClass("border-danger");
            $("#cuponcode").removeClass("border-success");
            $("#coupon_msg").addClass("text-danger");
            $("#coupon_msg").removeClass("text-success");
            $("#coupon_msg").text("Please! enter coupon code.")
        }
        
    })

    $("#apply_for").change(function(){
        var apply_for = $(this).val();
        if (apply_for == 'order_amount_from') {
            $("#order_amount_c").removeClass("d-none");
        } else{
            $("#order_amount_c").addClass("d-none");
        }
        if (apply_for == 'product') {
            $("#products_choose").removeClass("d-none");
            $("#product_table").removeClass("d-none")
        } else{
            $("#products_choose").addClass("d-none");
            $("#product_table").addClass("d-none");
        }
        if (apply_for == 'customer') {
            $("#customer_choose").removeClass("d-none");
            // $("#customer_table").removeClass("d-none")
        } else{
            $("#customer_choose").addClass("d-none");
            // $("#customer_table").addClass("d-none");
        }
    });

    $('#products').on('change', function(){
        var product_ids = $('#products').val();
        // console.log(product_ids);
        if(product_ids.length > 0){
            $.post('{{ route('admin.related_products') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                $('#product_table').html(data);
                // AIZ.plugins.fooTable();
            });
        }
        else{
            $('#product_table').html(null);
        }
    });
});
</script>
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
@endsection