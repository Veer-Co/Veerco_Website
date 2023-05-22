<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--plugins-->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/notifications/css/lobibox.min.css') }}" />
    <link href="{{ asset('admin_assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <!-- loader-->
    <link href="{{ asset('admin_assets/css/pace.min.css') }}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('admin_assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/css/header-colors.css') }}" rel="stylesheet" />
    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/bootstrap-select.min.js') }}"></script>

    <!--notification js -->
    <script src="{{ asset('admin_assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    {{-- <script src="{{asset('admin_assets/plugins/notifications/js/notification-custom-script.js')}}"></script> --}}
    <style>
        .header-bg-card {
            background-color: #e5322c;
        }
    </style>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">
        @include('admin/header')

        @yield('content')

        @include('admin/footer')
    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="{{ asset('admin_assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin_assets/js/pace.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>

    <!--app-->
    <script src="{{ asset('admin_assets/js/app.js') }}"></script>
    <script src="{{ asset('admin_assets/js/index2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function openExportExcel() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to download product excel sheet!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, I want!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href="{{route('admin.bulk.export.product')}}";
                    // $.ajax({
                    //     method: "GET",
                    //     url: "export/product",
                    //     success: function(data) {
                    //         // console.log(data)
                            Swal.fire(
                                'Downloaded!',
                                'Your file has been downloaded.',
                                'success'
                            )
                    //     },
                    //     error: function(data) {
                    //         console.log('Error:', data);
                    //     }
                    // });

                }
            })
        }
    </script>
    @yield('footer-section')
</body>

</html>
