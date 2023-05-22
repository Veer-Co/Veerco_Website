@extends('admin.admin_layout')
@section('title')
    Add Category - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Add Category</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('admin.category')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2">
                                    <label for="category" class="form-label">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Category Name" required name="category" class="form-control" />
                                </div>
                                <div class="form-group mb-2">
                                    <label for="category_img" class="form-label">Category Image <span class="text-danger">*</span></label>
                                    <input type="file" accept=".jpg, .jpeg, .png" required placeholder="Select Category Image" id="categoryIMG" onchange="PreviewImage();" name="category_img" class="form-control" />
                                    <img id="CategoryPreview" style="width: 200px; height: 200px; margin-top: 10px;" />
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
   <script type="text/javascript">
   document.getElementById("CategoryPreview").style.display = "none";
    function PreviewImage() {
        document.getElementById("CategoryPreview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("categoryIMG").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("CategoryPreview").src = oFREvent.target.result;
        };
    };
</script>
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