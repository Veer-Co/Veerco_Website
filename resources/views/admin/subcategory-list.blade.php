@php
use \App\Http\Controllers\SubCategoryController;
@endphp
@extends('admin.admin_layout')
@section('title')
    SubCategory List - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">SubCategory List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>SubCategory ID</th>
                                        <th>SubCategory Name</th>
                                        <th>Category Name</th>
                                        <th>SubCategory Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subcat_list as $key => $subcat)
                                    <tr>
                                        <td>{{($subcat_list->currentpage()-1) * $subcat_list->perpage() + $key + 1}}</td>
                                        <td>{{$subcat['id']}}</td>
                                        <td>{{$subcat['subcategory']}}</td>
                                        <td>{{SubCategoryController::getCategoryName($subcat->category_slug)}}</td>
                                        <td><img src="{{asset('uploads/subcategory').'/'.$subcat->subcategory_image}}" alt="{{$subcat->name}}" class="img-thumbnail" width="100px" height="100px"></td>
                                        <td>
                                            <form action="{{route('admin.subcategory-delete')}}" method="post" style="display: inline">
                                                @csrf
                                                <input type="hidden" name="subcategory_id" required value="{{$subcat->id}}">
                                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash">&nbsp;Delete</i></button>
                                            </form>
                                            <form action="{{route('admin.subcategory-delete')}}" method="post" style="display: inline">
                                                @csrf
                                                <input type="hidden" name="subcategory_id" required value="{{$subcat->id}}">
                                                <button type="submit" class="btn btn-warning"><i class="bx bx-edit">&nbsp;Edit</i></button>
                                            </form>
                                        </td>
                                    </tr>  
                                    @empty
                                        <tr class="text-center text-danger">
                                            <td colspan="6">Records not found!</td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="7">
                                            <nav aria-label="...">
                                                <ul class="pagination justify-content-end mb-0">
                                                    {{$subcat_list->links();}}
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