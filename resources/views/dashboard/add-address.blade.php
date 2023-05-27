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
                            <h3 class="breadcrumb-title pe-3">Add Address</h3>
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
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form class="row g-3" action="{{route('user.addAddress')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label">Enter First Name*</label>
                                                        <input type="text" class="form-control" placeholder="Enter First Name" name="fname" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Enter Last Name*</label>
                                                        <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Enter E-mail Id*</label>
                                                        <input type="email" class="form-control" placeholder="Enter E-mail ID" name="email" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Enter Mobile Number*</label>
                                                        <input type="tel" class="form-control" placeholder="Enter Mobile Number" name="mobile" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Street/Location Name*</label>
                                                        <input type="text" class="form-control" placeholder="Street/Location Name" name="locationName" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Town/Village Name*</label>
                                                        <input type="text" class="form-control" placeholder="Town/Village Name" name="townName" required />
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">City*</label>
                                                        <input type="text" class="form-control" placeholder="City" name="city" required />
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">State*</label>
                                                        <input type="text" class="form-control" placeholder="State" name="state" required />
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Country*</label>
                                                        <input type="text" class="form-control" placeholder="Country" name="country" required />
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Pin Code*</label>
                                                        <input type="text" class="form-control" placeholder="Pin Code" name="pinCode" required />
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-dark btn-ecomm">Submit</button>
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
@endsection
