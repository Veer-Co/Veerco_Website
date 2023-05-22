@extends('admin.admin_layout')
@section('title')
    Add SubCategory - Veer & Co
@endsection
@section('content')
    <!--start content-->
    <main class="page-content">              
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header header-bg-card">
                        <h5 class="text-white">Add SubCategory</h5>
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
                        <form action="{{route('admin.post-subcategory')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2">
                                    <label for="category" class="form-label">Category Name <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-select" required>
                                        <option value="" disabled selected>--Select Category--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->category_slug}}">{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="subcategory" class="form-label">SubCategory Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter SubCategory Name" name="subcategory" id="subcategory" required class="form-control" />
                                </div>
                                <div class="form-group mb-2">
                                    <label for="subcategory_img" class="form-label">subcategory Image <span class="text-danger">*</span></label>
                                    <input type="file" placeholder="Select SubCategory Image" id="subcategory_img" name="subcategory_img" onchange="PreviewImage();" required class="form-control" />
                                    <img id="SubCategoryPreview" style="width: 300px; height: 200px; margin-top: 10px;" />
                                </div>
                                <div class="form-group mb-2 text-center">
                                    <button type="submit" class="btn btn-danger"><i class="bx bx-paper-plane"></i> Submit</button>
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
    document.getElementById("SubCategoryPreview").style.display = "none";
     function PreviewImage() {
         document.getElementById("SubCategoryPreview").style.display = "block";
         var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("subcategory_img").files[0]);
 
         oFReader.onload = function (oFREvent) {
             document.getElementById("SubCategoryPreview").src = oFREvent.target.result;
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