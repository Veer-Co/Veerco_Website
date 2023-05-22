<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --font-text: Lato, sans-serif;
            --font-heading: Lato, sans-serif;
            --color-brand: #EEBD79;
            --color-brand-rgb: 238, 189, 121;
            --color-brand-dark: #DFA049;
            --color-brand-2: #F0DBBE;
            --color-primary: #1274c0;
            --color-secondary: #536ea0;
            --color-warning: #FF9900;
            --color-danger: #FD6E6E;
            --color-success: #388e3c;
            --color-info: #2CC1D8;
            --color-text: #7E7E7E;
            --color-heading: #253D4E;
            --color-grey-1: #253D4E;
            --color-grey-2: #242424;
            --color-grey-4: #ADADAD;
            --color-grey-9: #BC4C2A;
            --color-muted: #B6B6B6;
            --color-body: #7E7E7E;
            --color-white: #ffffff;
            --color-brand-danger: #dc3545;
        }
    </style>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/OwlCarousel/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <title>Home - Veer & Co</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" />

    <link rel="stylesheet" href="{{ asset('assets/notifications/css/lobibox.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!--notification js -->
    <script src="{{ asset('assets/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('assets/notifications/js/notifications.min.js') }}"></script>

</head>

<body>

    <b class="screen-overlay"></b>
    <!--wrapper-->
    <div class="wrapper">
        @include('header')

        @yield('content')

        @include('footer')
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="assets/js/show-hide-password.js"></script>
    @yield('notification')
    {{-- <script type="text/javascript">
		var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?13558';
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.async = true;
		s.src = url;
		var options = {
	  "enabled":true,
	  "chatButtonSetting":{
		  "backgroundColor":"#4dc247",
		  "ctaText":"WhatsApp Chat",
		  "borderRadius":"25",
		  "marginLeft":"0",
		  "marginBottom":"50",
		  "marginRight":"50",
		  "position":"right"
	  },
	  "brandSetting":{
		  "brandName":"Veer & Co",
		  "brandSubTitle":"Typically replies within a day",
		  "brandImg":"https://i0.wp.com/veerco.online/wp-content/uploads/2022/03/cropped-Veer-CO-1.png",
		  "welcomeText":"Hi there!\nHow can I help you?",
		  "messageText":"Hello, I have a question about {{page_link}}",
		  "backgroundColor":"#000000",
		  "ctaText":"Start Chat",
		  "borderRadius":"25",
		  "autoShow":false,
		  "phoneNumber":"919710076550"
	  }
	};
		s.onload = function() {
			CreateWhatsappChatWidget(options);
		};
		var x = document.getElementsByTagName('script')[0];
		x.parentNode.insertBefore(s, x);
	</script> --}}
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('getCategory') }}",
                method: 'GET',
                data: '&_token={{ csrf_token() }}',
                success: function(catres) {
                    $('.hcategory').html(catres);
                }
            });
            $.ajax({
                url: "{{ route('getBrand') }}",
                method: 'GET',
                data: '&_token={{ csrf_token() }}',
                success: function(brandres) {
                    $('.hbrand').html(brandres);
                }
            });


        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
        $('body').click(function() {
            $('#searchlist').hide();
        });
    </script>
    <script type="text/javascript">
        $('#searchlist').hide();
        $('#q').on('keyup', function() {
            console.log('keyup cat');
            $value = $(this).val();
            $cat = $('#cat').val();
            $.ajax({
                type: 'get',
                url: '{{ route("getsearch") }}',
                data: {
                    'search': $value,
                    'cat': $cat
                },
                success: function(data) {
                    console.log(data)
                    $('#searchlist').show();
                    $('#searchlist').html(data);
                }
            });
        })
    </script>
    <script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?41506';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"",
      "borderRadius":"25",
      "marginLeft":"0",
      "marginBottom":"50",
      "marginRight":"50",
      "position":"right"
  },
  "brandSetting":{
      "brandName":"veerco",
      "brandSubTitle":"Typically replies within a day",
      "brandImg":"https://veerco.online/assets/images/favicon.png",
      "welcomeText":"Hi there!\nHow can I help you?",
      "messageText":"",
      "backgroundColor":"#0a5f54",
      "ctaText":"Start Chat",
      "borderRadius":"25",
      "autoShow":false,
      "phoneNumber":"919810076550"
  }
};
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>
</body>

</html>
