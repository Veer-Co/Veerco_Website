@extends('admin.admin_layout')
@section('title')
    Order Details - Veer & Co
@endsection
@section('content')
<style>
    .img-thumbnail{
        width: 200px;
        height: 200px;
    }
</style>
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Order Details</h5>
                    </div>
                    <div class="card-body">
                        <h6>Shipping Details</h6>
                        <p class="m-0">Name: {{$customerdetails->fname .' '. $customerdetails->lname}}</p>
                        <p class="m-0">E-mail: {{$customerdetails->email}}</p>
                        <p class="m-0">Mobile: {{$customerdetails->mobile}}</p>                        
                        <address> 
                            Address: {{$customerdetails->address1}}, {{$customerdetails->address2}}, {{$customerdetails->city}}, {{$customerdetails->state}}, {{$customerdetails->country}}, {{$customerdetails->pincode}}
                        </address>
                        @if ($customerdetails->status != '0')
                        <p class="m-0">Tracking Number: {{$customerdetails->tracking_no}}</p>
                        <p class="m-0">Shipping Date: {{$customerdetails->shipping_date}}</p>
                        @endif
                        @if ($customerdetails->status == '2')
                        <p class="m-0">Delivered Date: {{$customerdetails->delivered_date}}</p>
                        @endif
                        <h6 class="mt-2">Product Details - Total Ordered Product: {{$orders->count()}}</h6>
                        @foreach ($orders as $key => $order)
                        <div class="row border border-primary rounded mb-2 p-2">
                            <div class="col-sm-8">
                                <b>#{{$key+1}}</b>
                                <p class="m-0">Product Name: {{$order->products->product_name}}</p>
                                <p class="m-0">Quantity: {{$order->quantity}}</p>
                                <p class="m-0">Price: &#8377;{{$order->price}}/-</p>
                                <p class="m-0">Order Date: {{$order->created_at->format('d/m/Y')}}</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{asset('uploads/products').'/'.$order->products->thumbnail}}" alt="{{$order->products->product_name}}" class="img-thumbnail border-success">
                            </div>
                        </div>
                        @endforeach
                        @if ($customerdetails->status == '0')
                        <div class="row justify-content-center">
                            <div class="card col-sm-6 border rounded">
                                <div class="card-header bg-danger">
                                    <h6 class="text-white">Place Order</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('admin.placeOrder')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group col-sm-12 mb-2">
                                            <label for="tracking_no">Enter Tracking Number <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Tracking Number" required id="tracking_no" name="tracking_no" class="form-control" />
                                        </div>
                                        {{-- <div class="form-group col-sm-12 mb-2">
                                            <label for="courier_partner">Enter Courier Partner Name <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Courier Partner Name" required id="courier_partner" name="courier_partner" class="form-control" />
                                        </div> --}}
                                        <input type="hidden" value="{{$customerdetails->id}}" name="orderid" required />
                                        <div class="form-group col-sm-12 text-center">
                                            <button type="submit" class="btn btn-success"><i class="bi bi-gift-fill"></i>&nbsp;Place Order</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif    
                        @if ($customerdetails->status == '1')
                        <p class="text-danger mb-0">Click on below button for order delivered. <i class="bi bi-arrow-return-left"></i></p>
                        <form action="{{route('admin.delivered')}}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="orderid" value="{{$customerdetails->id}}">
                            <button class="btn btn-success"><i class="bi bi-truck"></i>&nbsp;Order Delivered</button>
                        </form>
                        @endif                    
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
@endsection