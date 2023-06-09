@php
    use App\Http\Controllers\OrderController;
@endphp
@extends('admin.admin_layout')
@section('title')
    New Order List - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">New Orders List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($allOrders['data'] as $key => $order)
                                    @if ($order['status'] == 'NEW')
                                    <tr>
                                        <td>{{($allOrders['meta']['pagination']['current_page'] - 1) * $allOrders['meta']['pagination']['per_page'] + $key + 1}}</td>
                                        <td>{{$order['customer_name']}}</td>
                                        <td>&#8377;{{$order['total']}}/- for item {{OrderController::getItemCount($order['id'])}}</td>
                                        <td>{{$order['created_at']}}</td>
                                        <td>
                                            <a href="{{url('admin/order-details').'/'.$order['id']}}"><button class="btn btn-dark"><i class="bi bi-eye"></i>&nbsp;View Details</button></a>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr class="text-center text-danger">
                                        <td colspan="5">Data not available</td>
                                    </tr>
                                    @endforelse
                                    <!-- <tr> -->
                                    <!--     <td colspan="7"> -->
                                    <!--         <nav aria-label="..."> -->
                                    <!--             <ul class="pagination justify-content-end mb-0"> -->
                                    <!--             links -->
                                    <!--             </ul> -->
                                    <!--         </nav> -->
                                    <!--     </td> -->
                                    <!-- </tr> -->

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
