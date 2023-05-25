@extends('master')
@section('title')
    Order List - Veer & Co
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
                                            Orders
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
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($orders as $order)
                                                            <tr>
                                                                <td>#{{$order->id}}</td>
                                                                <td>{{$order->created_at}}</td>
                                                                <td>
                                                                    @if ($order->status == 0)
                                                                    <div class="badge rounded-pill bg-warning w-100">Pending</div>
                                                                    @endif 
                                                                    @if ($order->status == 1)
                                                                    <div class="badge rounded-pill bg-primary w-100">Order Confirmed</div>
                                                                    @endif   
                                                                    @if ($order->status == 2)
                                                                    <div class="badge rounded-pill bg-success w-100">Completed</div>
                                                                    @endif                                                                        
                                                                </td>
                                                                <td>Rs: {{$order->total_amount}}/-</td>
                                                                <td>
                                                                    <div class="d-flex gap-2"> 
                                                                        <a href="{{url('user/order-list').'/'.$order->id}}" class="btn btn-dark btn-sm rounded-0">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr class="text-center bg-danger text-white">
                                                                <td colspan="5"><b>Oohoo!</b> Your order box is empty.</td>                                                                
                                                            </tr>                                                                
                                                            @endforelse                                                            
                                                        </tbody>
                                                    </table>
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
