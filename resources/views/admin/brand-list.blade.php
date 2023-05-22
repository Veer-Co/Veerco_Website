@extends('admin.admin_layout')
@section('title')
    Brands List - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Brands List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Brand ID</th>
                                        <th>Brand Name</th>
                                        <th>Brand Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($brands as $key => $brand)
                                    <tr>
                                        <td>{{($brands->currentpage()-1) * $brands->perpage() + $key + 1}}</td>
                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->brand}}</td>
                                        <td><img src="{{asset('uploads/brand').'/'.$brand->brand_image}}" alt="{{$brand->brand}}" class="img-thumbnail" width="100px" height="100px"></td>
                                        <td>
                                            <form action="{{route('admin.brand-delete')}}" method="post" style="display: inline">
                                                @csrf
                                                <input type="hidden" name="brand_id" required value="{{$brand->id}}">
                                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash">&nbsp;Delete</i></button>
                                            </form>
                                            <form action="{{route('admin.brand-delete')}}" method="post" style="display: inline">
                                                @csrf
                                                <input type="hidden" name="brand_id" required value="{{$brand->id}}">
                                                <button type="submit" class="btn btn-warning"><i class="bx bx-edit">&nbsp;Edit</i></button>
                                            </form>
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
                                                    {{$brands->links();}}
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