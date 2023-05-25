@extends('master')
@section('title')
    Register - Veer & Co
@endsection
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper signin-bg" style="margin-top: 0px;">
        <div class="page-content">

            <!--start shop cart-->
            <section class="">
                <div class="container" style="padding: 20px 0px;">
                    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0"
                        style="height: 100%;">
                        <div class="row row-cols-1">
                            <div class="col-12 ">
                                <div class="card register_page">
                                    <div class="card-body d-flex">
                                        <div class=" p-4 rounded">
                                            <div class="text-center">
                                                <h3 class="">Register Now</h3>
                                            </div>
                                            {{-- <div class="d-grid">
													<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
														<img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
														<span>Sign in with Google</span>
														</span>
													</a> <a href="javascript:;" class="btn btn-white"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
												</div>
												<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
													<hr/>
												</div> --}}
                                            <div class="form-body">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form class="row g-3" method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <div class="col-6">
                                                        <label for="inputFirstName" class="form-label">First Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="inputFirstName" name="fname" placeholder="Enter First Name" value="{{ old('fname') }}" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputLastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="inputLastName" name="lname" placeholder="Enter Last Name" value="{{ old('lname') }}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputEmailAddress" class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" id="inputEmailAddress" name="email" placeholder="Enter Email ID" required value="{{ old('email') }}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputMobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                                                        <input type="tel" class="form-control" id="inputMobile" name="mobile" placeholder="Enter Mobile Number" value="{{ old('mobile') }}" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputChoosePassword" class="form-label">Enter Password <span class="text-danger">*</span></label>
                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" required value="{{ old('password') }}" placeholder="Enter New Password">
                                                            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="password_confirmation" class="form-label">Enter Confirm Password <span class="text-danger">*</span></label>
                                                        <div class="input-group" id="show_hide_cpassword">
                                                            <input type="password" class="form-control border-end-0" id="password_confirmation" name="password_confirmation" required value="{{ old('password_confirmation') }}" placeholder="Enter Confirm Password">
                                                            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-danger">Register</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="m-0 pt-3 text-center">
                                                <p class="m-0">Already have an account <a href="{{ url('login') }}" class="text-danger">Login</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="w-100 register_design" height="100%">
                                        <div class="text-center mt-5">
                                            <h3 class="text-white">Looks like you're new here!</h3>
                                            <p>Sign up with your mobile number to get started</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </section>
            <!--end shop cart-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection
