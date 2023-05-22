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
                                            Dashboard
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
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Bank Name</th>
                                                                <th>Account Number</th>
                                                                <th>IFSC Code</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Paytm Payment Bank</td>
                                                                <td>9801680000</td>
                                                                <td>PAY0123456</td>
                                                                <td>
                                                                    <div class="d-flex gap-2"> <a href="javascript:;"
                                                                            class="btn btn-dark btn-sm ">Delete</a>
                                                                        <a href="javascript:;"
                                                                            class="btn btn-dark btn-sm ">Make
                                                                            Default</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airtel Payment Bank</td>
                                                                <td>9501680000</td>
                                                                <td>AIR0123456</td>
                                                                <td>
                                                                    <div class="d-flex gap-2"> <a href="javascript:;"
                                                                            class="btn btn-dark btn-sm ">Delete</a>
                                                                        <a href="javascript:;"
                                                                            class="btn btn-dark btn-sm ">Make
                                                                            Default</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div> <a href="{{url('user/add-payment-method')}}" class="btn btn-dark ">Add Payment
                                                    Method</a>
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
