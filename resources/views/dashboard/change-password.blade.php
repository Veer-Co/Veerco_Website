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
                            <h3 class="breadcrumb-title pe-3">Change Password</h3>
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
                                            Change Password
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
                                                @if (session('success'))
                                                    <div class="col-sm-12">
                                                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                                            {{ session('success') }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if (session('error'))
                                                    <div class="col-sm-12">
                                                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                                            {{ session('error') }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                @endif
                                                <form class="row g-3" action="{{route('user.updatePassword')}}" method="POST" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="col-12">
                                                        <label class="form-label">Old Password</label>
                                                        <input type="password" class="form-control" placeholder="Old Password" value="{{old('oldPass')}}" required name="oldPass">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" class="form-control" value="{{old('password')}}" placeholder="New Password" required  name="password">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Confirm New Password</label>
                                                        <input type="password" class="form-control" value="{{old('password_confirmation')}}" required placeholder="Confirm Password" name="password_confirmation">
                                                    </div>                                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-dark btn-ecomm">Update</button>
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
