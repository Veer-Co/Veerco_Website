@php
    use App\Http\Controllers\OrderController;
@endphp
@extends('admin.admin_layout')
@section('title')
    Shipped Order List - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Shipped Orders List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Tracking Number</th>
                                        <th>Shipping Date</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($allOrders as $key => $order)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$order['fname']}} {{$order['lname']}}</td>
                                        <td>&#8377;{{$order['total_amount']}}/- for item {{OrderController::getItemCount($order['id'])}}</td>
                                        <td>{{$order['tracking_no']}}</td>
                                        <td>{{$order['shipping_date']}}</td>
                                        <td>{{$order['created_at']}}</td>
                                        <td>
                                            <a href="{{url('admin/order-details').'/'.$order['id']}}"><button class="btn btn-dark"><i class="bi bi-eye"></i>&nbsp;View Details</button></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center text-danger">
                                        <td colspan="5">Data not available</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
