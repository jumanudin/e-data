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
        <link href="{{ asset('web/vendor/apexcharts/dist/apexcharts.css') }}" rel="stylesheet">   
        @stack('style')
        
    </head>
    <body>

    <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:kanwilbabel@kemenag.go.id">kanwilbabel@kemenag.go.id</a>
        <i class="bi bi-phone"></i> (0717) 439464 – 439465
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>
        <!-- ======= Header ======= -->
<header id="header" class="fixed-top shadow">
<div class="container d-flex align-items-center">
<img src="{{ asset('web/img/kemenag-logo.png')}}" style="width:70px;">    
<h1 class="logo me-auto"><a href="#">&nbsp KANWIL BABEL</a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="#">Home</a></li>
        <li><a class="nav-link scrollto" href="#">Profile</a></li>
        <li class="dropdown"> <a href="#" ><span>Layanan Informasi</span></a>
          <ul>
            <li><a href="">Tata Kelola & Dukungan Manajemen </a></li>
            <li><a href="">Layanan Keagamaan</a></li>
            <li><a href="">Pelayanan haji dan Umrah </a></li>
            <li><a href="">Pendidikan Agama & Pendidikan Keagamaan </a></li>
            <li><a href="">Jaminan Produk Halal </a></li>
            <li><a href="">Info Satker </a></li>
          </ul>
        </li>  
      </ul>
          
    </nav><!-- .navbar --> 
    <a href="{{ route('login') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Log</span>in</a>
</div>
</header><!-- End Header -->
    



                 @yield('hero')
          


                <!-- Main Content -->
                <main id="main" class="container">
                  @yield('main')

               </main>
                

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
            <!-- General JS Scripts x-->
          <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
          <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
          <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
          <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
          <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
          <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
          <script src="{{ asset('library/sweetalert/sweetalert.all.js') }}"></script>
        <!-- Template Main JS File -->
        <script src="{{ asset('web/js/main.js') }}"></script>
        <script src="{{ asset('web/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>
        @stack('scripts')
   </body>
</html>