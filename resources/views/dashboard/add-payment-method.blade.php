@extends('master')
@section('title')
    Home - Veer & Co
@endsection
@section('content')
    <div class="wrapper">
        <div class="page-wrapper" style="margin-top: 0px;">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">Profile</h3>
                            <div class="ms-auto">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                                        </li>
                                        {{-- <li class="breadcrumb-item">
                                        <a href="javascript:;">Shop</a>
                                    </li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Add Address
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-4">
                    <div class="container">
                        <h3 class="d-none">Account</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card shadow-none mb-3 mb-lg-0 border">
                                            @include('dashboard/dash_left')
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card shadow-none mb-0 border">
                                            <div class="card-body">
                                                <form class="row g-3" action="" method="POST"
                                                    enctype="multipart/form-data">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Enter Account Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Account Number" name="accountNumber">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">IFSC Code</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="IFSC Code" name="ifsc" id="ifsc" pattern="[A-Za-z]{4}[0]{1}[0-9A-Za-z]{6}">
                                                    </div>
                                                    <div class="col-2">
                                                        <label class="form-label" for="">Find </label>
                                                        <button type="button" style="font-size: 10px;" onclick="getIFSC()" class="btn  btn-dark btn-ecomm">
                                                            Bank
                                                            Name</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Pin Code</label>
                                                        <input type="text" class="form-control" placeholder="Pin Code"
                                                            name="pinCode">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Block</label>
                                                        <input type="text" class="form-control" placeholder="Block"
                                                            name="block">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">District</label>
                                                        <input type="text" class="form-control" placeholder="District"
                                                            name="district">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">State</label>
                                                        <input type="text" class="form-control" placeholder="State"
                                                            name="state">
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit"
                                                            class="btn btn-dark btn-ecomm">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
    <script>
        function getIFSC(){
            let ifsc=$('#ifsc').val();
            $.ajex({
                url:'bankName.php',
                data:'ifsc='+ifsc,
                type:'POST',
                success:function(result){
                }
            })
        }
    </script>
@endsection
