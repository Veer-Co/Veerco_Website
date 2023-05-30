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
                            <h3 class="breadcrumb-title pe-3">Address</h3>
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
                                            Address
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
                                                {{-- <h6 class="mb-4">The following addresses will be used on the checkout page
                                                    by default.</h6> --}}
                                                <div class="row gap-1 mb-2">
                                                    @forelse ($getaddress as $key => $address)
                                                    <div class="col-sm-5 custom_border">
                                                        <h5 class="mb-3">Address {{$key+1}}</h5>
                                                        <address>
                                                            Name: {{$address->fname .' '. $address->lname}}</br>
                                                            E-mail ID: {{$address->email}}</br>
                                                            Mobile: {{$address->mobile}}</br>
                                                            {{$address->locationName}},
                                                            {{$address->townName}},
                                                            {{$address->city}},
                                                            {{$address->state}},
                                                            {{$address->country}},
                                                            ({{$address->pincode}})
                                                    </address>
                                                    {{$address}}

                                                    <form action="{{ route('user.removeAddress', ['id'=>$address->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger" style="padding:4px; padding-left:9px">
                                                            <i class='bx bx-trash text-white'></i>
                                                        </button>
                                                    </form>

                                                    </div>
                                                    @empty
                                                        <p class="text-danger">Address Not Available.</p>
                                                    @endforelse
                                                </div>
                                                <a href="{{ url('user/add-address') }}" class="btn btn-dark btn-ecomm">Add
                                                    New Address</a>
                                                <!--end row-->
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
