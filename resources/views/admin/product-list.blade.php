@extends('admin.admin_layout')
@section('title')
    Product List - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Product List</h5>
                        <p class="p-0 m-0 text-white">Total Product: <b>{{$products->total();}}</b>, Page No: <b>{{$products->currentPage();}}</b></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>ID</th>
                                        <th>Thumbnail</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock Status</th>
                                        <th>Quantity</th>
                                        <th>SKU</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $key => $item)
                                    <tr>
                                        <td>{{($products->currentpage()-1) * $products->perpage() + $key + 1}}</td>
                                        <td>{{$item->product_id}}</td>
                                        <td><img src="{{asset('uploads/products').'/'.$item->thumbnail}}" alt="{{$item->product_name}}" class="img-thumbnail" width="100px" height="100px"></td>
                                        <td>{{$item->product_name}}</td>
                                        <td>
                                            @if ($item->mrp)
                                            <strike class="text-danger">&#8377;{{$item->mrp}}</strike>
                                            @endif
                                            &#8377;{{$item->price}}/-
                                        </td>
                                        <td>
                                            @if ($item->store_house)
                                                @if ($item->quantity == 0)
                                                    <span class="text-danger">Out of stock</span>
                                                @else
                                                <span class="text-success">In stock</span>
                                                @endif
                                            @else
                                            @if ($item->stock_status == 'in_stock')
                                                <span class="text-success">In stock</span>
                                            @elseif ($item->stock_status == 'out_of_stock')
                                                <span class="text-danger">Out of stock</span>
                                            @elseif($item->stock_status == 'on_backorder')
                                            <span class="text-warning">On backorder</span>
                                            @endif
                                            @endif
                                            
                                        </td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->sku}}</td>
                                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                                        <td>Published</td>
                                        <td>
                                            <a href="{{url('admin/product/edit').'/'.$item->id}}"><button class="btn btn-warning"><i class="bx bx-edit"></i></button></a>
                                            
                                            <form action="{{route('admin.category-delete')}}" method="post" style="display: inline">
                                                @csrf
                                                <input type="hidden" name="category_id" required value="{{$item->id}}">
                                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Records not found!</td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="7">
                                            <nav aria-label="...">
                                                <ul class="pagination justify-content-end mb-0">
                                                    {{$products->links();}}
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