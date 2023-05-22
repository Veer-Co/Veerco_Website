@extends('master')
@section('title')
    Sign In - Veer & Co
@endsection
@section('content')
    <!--start page wrapper -->
		<div class="page-wrapper signin-bg">
			<div class="page-content">
				
				<!--start shop cart-->
				<section class="">
					<div class="container">
						<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
							<div class="row row-cols-1 row-cols-xl-2">
								<div class="col mx-auto">
									<div class="card">
										<div class="card-body">
											<div class="border p-4 rounded">
												<div class="text-center">
													<h3 class="">Sign in</h3>
													<p>Don't have an account yet? <a href="{{url('signup')}}" class="text-danger">Sign up here</a>
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
													<form class="row g-3" method="POST" action="{{ route('login') }}">
														<div class="col-12">
															<label for="inputEmailAddress" class="form-label">__('Email')</label>
															<input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="__('Email')" value="old('email')" required autofocus >
														</div>
														<div class="col-12">
															<label for="inputChoosePassword" class="form-label">__('Password')</label>
															<div class="input-group" id="show_hide_password">
																<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" value="old('password')" placeholder="__('Password')"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-check form-switch">
																<input class="form-check-input" type="checkbox" id="remember_me" name="remember" >
																<label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
															</div>
														</div>
														<div class="col-md-6 text-end">	
															@if (Route::has('password.request'))
																<a href="{{ route('password.request') }}" class="text-danger">{{ __('Forgot your password?') }}</a>
															@endif
														</div>
														<div class="col-12">
															<div class="d-grid">
																<button type="submit" class="btn btn-danger"><i class="bx bxs-lock-open"></i>{{ __('Log in') }}</button>
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