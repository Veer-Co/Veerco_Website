@extends('dashboard.auth.auth-master')
@section('title', 'Forget Password')
@section('left-arrow')
<div class="dash-left-icon text-white pt-1" onclick="history.back()">
    <i class="fa fa-chevron-left" aria-hidden="true"></i>
</div>
@endsection
@section('content')
<style>
    .img-login-logo{
        width: 190px;
        border-radius: 10px;
    }
</style>
 <main role="main" class="ion-checkout">
    <div class="row mt-3">
        <div class="col-sm-12 text-center">
            <img src="{{asset('assets_admin/images/logo-dark.png')}}" alt="Logo" class="img-login-logo shadow">
        </div>
    </div>
    <div class="card mb-3">
       <div class="card-header font-weight-bold text-center">
           Student Forget Password
       </div>
        <form action="#" method="post" class="p-2">
            <div class="ion-list ion-no-margin ion-no-padding">
            <div class="text-field">
                <input type="text" required/>
                <label>Enter Your Username <span class="danger">*</span></label>
            </div>
            </div>
        </form>
        <div class="p-3 border-top">
        <a href="#" class="btn btn-block btn-oringe ion-no-margin">Submit</a>
        <div class="text-center mt-3">
            <a href="{{url('dashboard/auth/login')}}" class="text-center mt-3 text-cyan">Already have an account? <span class="text-teal">Login Now</span></a>
        </div>
        </div>       
    </div>
 </main>
@endsection