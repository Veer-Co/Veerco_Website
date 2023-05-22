<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Webfinic">
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <meta name="apple-mobile-web-app-status-bar-style" content="default">
      {{-- <meta name="theme-color" content="#319197"> --}}
	  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
      <title>@yield('title') - Prabuddham Academy</title>
      <!-- nav Slide -->
      <link rel="stylesheet" href="{{asset('assets_dash/dist/css/navslide.css?ver=4.2.3')}}">
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="{{asset('assets_dash/dist/css/bootstrap.css')}}">
      <link rel="stylesheet" href="{{asset('assets_dash/dist/font/css/font-awesome.min.css')}}">
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="{{asset('assets_dash/dist/css/app.css')}}">
      <!-- javascript -->
      <script src="{{asset('assets_dash/vendors/jquery.min.js')}}"></script>
      <script src="{{asset('assets_dash/dist/js/hc-offcanvas-nav.js?ver=4.2.2')}}"></script>
      <style>
      html{
         overflow: hidden;
      }         
      body{
         overflow: hidden !important;
      }
      </style>
   </head>
   <body class="index-app bg-gradient-auth">	
       @include('dashboard.auth.header')
		@yield('content')
      <script src="{{asset('assets_dash/dist/js/bootstrap.bundle.js')}}"></script>
   </body>
</html>