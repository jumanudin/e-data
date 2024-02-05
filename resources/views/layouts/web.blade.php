<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta content="" name="description">
        <meta content="" name="keywords">
        <title>{{$title}}</title>
        @isset($meta)
            {{ $meta }}
        @endisset
        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('web/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('web/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('web/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('web/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('web/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('web/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('web/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">   
        <link href="{{ asset('web/vendor/mobirise/css/mbr-additional.css') }}" type="stylesheet">
          <!-- Template Main CSS File -->
        <link href="{{ asset('web/css/style.css') }}" rel="stylesheet">    

    </head>
    <body>

                <!-- Main Content -->
                <div class="main-content">
                     @yield('content')
                  </div>

                    <!-- ======= Footer ======= -->
                    <footer id="footer" class="bg-primary text-white">

                        <div class="container d-md-flex py-4">

                        <div class="me-md-auto text-center text-md-start">
                            <div class="copyright">
                            &copy; Copyright <strong><span>IT Kanwil Kemenag Babel</span></strong>. All Rights Reserved
                            </div>
                            <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
                            
                            </div>
                        </div>
                        </div>
                    </footer><!-- End Footer -->    
                    <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!-- Template Main JS File -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('web/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('web/vendor/php-email-form/validate.js')}}"></script>
        <script src="{{ asset('web/vendor/purecounter/purecounter.js')}}"></script>
        <script src="{{ asset('web/vendor/swiper/swiper-bundle.min.js')}}"></script>
        <!-- Template Main JS File -->
        <script src="{{ asset('web/js/main.js') }}"></script>
   </body>
</html>