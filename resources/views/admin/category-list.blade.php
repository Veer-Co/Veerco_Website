@extends('admin.admin_layout')
@section('title')
    Category List - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Category List</h5>
                        <p class="p-0 m-0 text-white">Total Category: <b>{{$cat_list->total();}}</b>, Page No: <b>{{$cat_list->currentPage();}}</b></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Category ID</th>
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cat_list as $key => $item)
                                    <tr>
                                        <td>{{($cat_list->currentpage()-1) * $cat_list->perpage() + $key + 1}}</td>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->category}}</td>
                                        <td><img src="{{asset('uploads/category').'/'.$item->category_image}}" alt="{{$item->name}}" class="img-thumbnail" width="100px" height="100px"></td>
                                        <td>
                                            <form action="{{route('admin.category-delete')}}" method="post" style="display: inline">
                                                @csrf
                                                <input type="hidden" name="category_id" required value="{{$item->id}}">
                                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash">&nbsp;Delete</i></button>
                                            </form>
                                            <form action="{{route('admin.category-delete')}}" method="post" style="display: inline">
                                                @csrf
                                                <input type="hidden" name="category_id" required value="{{$item->id}}">
                                                <button type="submit" class="btn btn-warning"><i class="bx bx-edit">&nbsp;Edit</i></button>
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
                                                    {{$cat_list->links();}}
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