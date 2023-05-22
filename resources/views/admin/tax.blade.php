@extends('admin.admin_layout')
@section('title')
    Product Tax Setup - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Product Tax Setup</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 border rounded p-2">
                                <form action="{{route('admin.taxSetup')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="taxname">Enter Tax Name <span class="text-danger">*</span></label>
                                        <input type="text" name="taxname" id="taxname" placeholder="Enter Tax Name" required class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="percentage">Enter Tax Percentage <span class="text-danger">*</span></label>
                                        <input type="text" name="percentage" id="percentage" placeholder="Enter Tax Percentage (%)" required class="form-control" />
                                        <span class="form-text text-danger">Don't write % in input box. We get % by default.</span>
                                    </div>
                                    <div class="form-group text-center mt-2">
                                        <button class="btn btn-danger">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-info">
                                            <tr>
                                                <th>Sl. No.</th>
                                                <th>Tax Name</th>
                                                <th>Percentage (%)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($taxes as $key => $tax)
                                            <tr>
                                                <td>{{($taxes->currentpage()-1) * $taxes->perpage() + $key + 1}}</td>
                                                <td>{{$tax->tax_name}}</td>
                                                <td>{{$tax->tax_percentage}}%</td>
                                                <td>
                                                    <form action="{{route('admin.taxCrush')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="tax" value="{{$tax->id}}">
                                                        <button class="btn btn-danger"><i class="bi bi-trash"></i>&nbsp;Delete</button>
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
                                                            {{$taxes->links();}}
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