@extends('admin.admin_layout')
@section('title')
    Add Brands - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Add Brand</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.brand-add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2">
                                    <label for="brand" class="form-label">Brand Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Brand Name" name="brand" required class="form-control" />
                                </div>
                                <div class="form-group mb-2">
                                    <label for="brand_img" class="form-label">Brand Image <span class="text-danger">*</span></label>
                                    <input type="file" placeholder="Select Brand Image" name="brand_img" required class="form-control" />
                                </div>
                                <div class="form-group mb-2 text-center">
                                    <button class="btn btn-danger"><i class="bx bx-paper-plane"></i> Submit</button>
                                </div>
                            </div>
                        </form>
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