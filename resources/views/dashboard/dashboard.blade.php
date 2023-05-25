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
                            <h3 class="breadcrumb-title pe-3">Dashboard</h3>
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
                                        <div class="card shadow-none mb-3 mb-lg-0 border rounded-0">
                                            @include('dashboard/dash_left')
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <p>Hello! <strong>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</strong></p>
                                                <p>From your account dashboard you can view your Recent Orders, manage your
                                                    shipping and billing addesses and edit your password and account details
                                                </p>
                                                @if (Session::has('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>Wow!</strong> {{ Session::get("success") }}.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                @endif
                                                @if (Session::has('error'))
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Oohoo!</strong> {{ Session::get("error") }}.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                @endif
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

@section('notification')
@if (Session::has('success'))
<script> 
    Lobibox.notify('success', {
        size: 'mini',
        showClass: 'fadeInDown',
        hideClass: 'fadeUpDown',
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		msg: '{{ Session::get("success") }}'
	});    
</script>
@endif
@if (Session::has('error'))
<script> 
    Lobibox.notify('error', {
        size: 'mini',
        showClass: 'fadeInDown',
        hideClass: 'fadeUpDown',
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		msg: '{{ Session::get("error") }}'
	});    
</script>
@endif
@endsection