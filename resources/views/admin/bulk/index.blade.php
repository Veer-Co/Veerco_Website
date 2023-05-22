@extends('admin.admin_layout')
@section('title')
    Import Product - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Import Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.bulk.import.product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2">
                                    <label for="importProduct" class="form-label">Choose File (Datasheet) <span class="text-danger">*</span></label>
                                    <input type="file" placeholder="Choose File" accept=".csv,.xlsx,text/csv" name="importProduct" id="importProduct" required class="form-control" />
                                </div>
                                <div class="form-group mb-2 text-center">
                                    <button class="btn btn-danger"><i class="bx bx-paper-plane"></i> Submit</button>
                                    <a class="btn btn-success" href="{{ asset('admin_assets/products-collection.xlsx') }}">Download Demo CSV</a>
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