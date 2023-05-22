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
                        <div class="row row-cols-1 row-cols-xl-2">
                            <div class="col mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="border p-4 rounded">
                                            <div class="text-center">
                                                <h3 class="">Sign Up</h3>
                                                <p>I have an account <a href="{{ url('signin') }}" class="text-danger">Sign
                                                        in here</a>
                                                </p>
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
                                                <form class="row g-3" method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <div class="col-6">
                                                        <label for="inputFirstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="inputFirstName"
                                                            placeholder="First Name">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputLastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="inputLastName"
                                                            placeholder="Last Name">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputEmailAddress" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="inputEmailAddress"
                                                            placeholder="Enter Email">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputMobile" class="form-label">Mobile</label>
                                                        <input type="tel" class="form-control" id="inputMobile"
                                                            placeholder="Mobile Number">
                                                    </div>
                                                    <div class="col-6">
														<label for="inputSelectCountry" class="form-label">Country</label>
														<select class="form-select" id="inputSelectCountry" aria-label="Default select example">
															<option selected>India</option>
															<option value="1">United Kingdom</option>
															<option value="2">America</option>
															<option value="3">Dubai</option>
														</select>
													</div>
                                                    <div class="col-6">
                                                        <label for="inputChoosePassword" class="form-label">Enter
                                                            Password</label>
                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" class="form-control border-end-0"
                                                                id="inputChoosePassword" value="12345678"
                                                                placeholder="Enter Password"> <a href="javascript:;"
                                                                class="input-group-text bg-transparent"><i
                                                                    class='bx bx-hide'></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-danger">Register</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
