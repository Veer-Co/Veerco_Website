<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Webfinic">
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <meta name="apple-mobile-web-app-status-bar-style" content="default">
	  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
      <title>@yield('title') - Prabuddham Academy</title>
      <!-- Owl Stylesheets -->
      <link rel="stylesheet" href="{{asset('assets_dash/owlcarousel/assets/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets_dash/owlcarousel/assets/owl.theme.default.min.css')}}">
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
      <script src="{{asset('assets_dash/owlcarousel/owl.carousel.js')}}"></script>
   </head>
   <body class="index-app">
		@include('dashboard.navbar')		
		@yield('content')
		@include('dashboard.tab-tools')
      <script>
         (function($) {
           var $main_nav = $('#main-nav');
           var $toggle = $('.toggle');
         
           var defaultOptions = {
             disableAt: false,
             customToggle: $toggle,
             levelSpacing: 40,
             levelTitles: true,
             levelTitleAsBack: true,
             pushContent: '#container',
             insertClose: 0,
             insertClose: false,
           };
         
           // call our plugin
           var Nav = $main_nav.hcOffcanvasNav(defaultOptions);
         
           // add new items to original nav
           $main_nav.find('li.add').children('a').on('click', function() {
             var $this = $(this);
             var $li = $this.parent();
             var items = eval('(' + $this.attr('data-add') + ')');
         
             $li.before('<li class="new"><a href="#">'+items[0]+'</a></li>');
         
             items.shift();
         
             if (!items.length) {
               $li.remove();
             }
             else {
               $this.attr('data-add', JSON.stringify(items));
             }
         
             Nav.update(true);
           });
         
           // demo settings update
         
           const update = (settings) => {
             if (Nav.isOpen()) {
               Nav.on('close.once', function() {
                 Nav.update(settings);
                 Nav.open();
               });
         
               Nav.close();
             }
             else {
               Nav.update(settings);
             }
           };
         
           $('.actions').find('a').on('click', function(e) {
             e.preventDefault();
         
             var $this = $(this).addClass('active');
             var $siblings = $this.parent().siblings().children('a').removeClass('active');
             var settings = eval('(' + $this.data('demo') + ')');
         
             update(settings);
           });
         
           $('.actions').find('input').on('change', function() {
             var $this = $(this);
             var settings = eval('(' + $this.data('demo') + ')');
         
             if ($this.is(':checked')) {
               update(settings);
             }
             else {
               var removeData = {};
               $.each(settings, function(index, value) {
                 removeData[index] = false;
               });
         
               update(removeData);
             }
           });
         })(jQuery);
      </script>
      <script>
         var owl = $('.owl-carousel');
         owl.owlCarousel({
           margin: 10,
           loop: true,
           items: 1
         })
      </script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="{{asset("assets_dash/js/vendor/jquery.slim.min.js")}}"><\/script>')</script>
      <script src="{{asset('assets_dash/dist/js/bootstrap.bundle.js')}}"></script>
   </body>
</html>