@extends('master')
@section('title')
    Order Detalis - Veer & Co
@endsection
@section('content')
    <div class="wrapper">
        <div class="page-wrapper" style="margin-top: 0px;">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">Orders</h3>
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
                                            Order Details
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-4">
                    <div class="container">
                        <h3 class="d-none">Account</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card shadow-none mb-3 mb-lg-0 border">
                                            @include('dashboard/dash_left')
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 g-2">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Order Shipping Details</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="m-0">Name: {{$orders->fname.' '.$orders->lname}}</p>
                                                                @if ($orders->email)
                                                                <p class="m-0">E-mail Id: {{$orders->email}}</p>
                                                                @endif                                                                
                                                                <p class="m-0">Mobile: {{$orders->mobile}}</p>
                                                                <p class="m-0">Address: {{$orders->address1}}, {{$orders->address2}}, {{$orders->city}}, {{$orders->state}}, {{$orders->country}}, {{$orders->pincode}}</p>
                                                                <p class="m-0">Total Amount: &#8377;{{$orders->total_amount}}/-</p>
                                                                <p class="m-0">Payment Mode: {{ucfirst($orders->payment_mode)}}</p>
                                                                <p class="m-0">Order Status: </p>
                                                                @if ($orders->status == 0)
                                                                <div class="badge rounded-pill bg-warning">Pending</div>
                                                                @endif 
                                                                @if ($orders->status == 1)
                                                                <div class="badge rounded-pill bg-primary">Order Confirmed</div>
                                                                @endif   
                                                                @if ($orders->status == 2)
                                                                <div class="badge rounded-pill bg-success">Completed</div>
                                                                @endif 
                                                                <div class="card-header mt-2 bg-primary">
                                                                    <h6 class="card-title text-white">Products List</h6>
                                                                </div>
                                                                @foreach ($order_lists as $key => $item)
                                                                    {{-- <div class="row">
                                                                        <div class="col-sm-12 g-2">
                                                                            <div class="card"> --}}
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">#{{$key+1}} - {{$item->products->product_name}}</h6>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <p>Quantity: {{$item->quantity}}</p>
                                                                                    <p>Price: &#8377;{{$item->price}}/-</p>
                                                                                    <p>Order Date: {{$item->created_at->format('d-m-Y')}}</p>
                                                                                </div>
                                                                            {{-- </div>
                                                                        </div>
                                                                    </div> --}}
                                                                @endforeach
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
