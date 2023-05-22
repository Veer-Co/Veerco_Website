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
                                    @forelse ($shippedorders as $key => $shipped)
                                    <tr>
                                        <td>{{($shippedorders->currentpage()-1) * $shippedorders->perpage() + $key + 1}}</td>
                                        <td>{{$shipped->fname.' '.$shipped->lname}}</td>
                                        <td>&#8377;{{$shipped->total_amount}}/- for item {{OrderController::getItemCount($shipped->id)}}</td>
                                        <td>{{$shipped->tracking_no}}</td>
                                        @if ($shipped->shipping_date !== null)
                                        <td>{{$shipped->shipping_date->format('d-M-Y')}}</td>
                                        @else
                                        <td>Not Available</td>
                                        @endif
                                        <td>{{$shipped->created_at->format('d-M-Y')}}</td>
                                        <td>
                                            <form action="{{route('admin.delivered')}}" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="orderid" value="{{$shipped->id}}">
                                                <button class="btn btn-success"><i class="bi bi-truck"></i>&nbsp;Delivered</button>
                                            </form>
                                            <a href="{{url('admin/order-details').'/'.$shipped->id}}"><button class="btn btn-dark"><i class="bi bi-eye"></i>&nbsp;View Details</button></a>
                                        </td>
                                    </tr>                                        
                                    @empty
                                    <tr class="text-center text-danger">
                                        <td colspan="5">Data not available</td>                                        
                                    </tr>                                        
                                    @endforelse
                                    <tr>
                                        <td colspan="7">
                                            <nav aria-label="...">
                                                <ul class="pagination justify-content-end mb-0">
                                                    {{$shippedorders->links();}}
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