<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">

        <meta name="_token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Argon Dashboard') }} &mdash; IT</title>
        <!-- Favicon -->
        <link href="{{ asset('web') }}/img/favicon.png" rel="icon">
        <!-- General CSS Files -->
        <link rel="stylesheet"
            href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer" />

        @stack('style')
        <!-- Template CSS -->
        <link rel="stylesheet"
            href="{{ asset('turtle/css/style.css') }}">
        <link rel="stylesheet"
            href="{{ asset('turtle/css/components.css') }}">    
    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->                
    </head>
    <body class="{{ $class ?? '' }}">
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            @auth()
            @include('components.header')
            
            <!-- Sidebar -->
            @include('components.sidebar')
            @endauth
            <!-- Content -->
            @yield('main')

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>
    @yield('modal')
    <!-- General JS Scripts x-->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/sweetalert.all.js') }}"></script>
    @stack('scripts')
    
    <!-- Template JS File -->
    <script src="{{ asset('turtle/js/stisla.js') }}"></script>
    <script src="{{ asset('turtle/js/scripts.js') }}"></script>
    <script src="{{ asset('turtle/js/custom.js') }}"></script>
    @include('sweetalert::alert')    
    </body>
</html>