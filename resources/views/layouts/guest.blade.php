<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'e-BMREG') }}</title>
        <!-- Favicons -->
        <link href="{{ asset('turtle/img/books.png')}}" rel="icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('turtle/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('turtle/css/components.css') }}">
        <!-- Scripts -->
        <script defer src="{{ asset('vendor/alpine.js') }}"></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
        @yield('main')
        </div>
        <script src="{{ asset('turtle/js/modules/jquery.min.js') }}"></script>
        <script src="{{ asset('turtle/js/modules/bootstrap.min.js') }}"></script>
        <script src="{{ asset('turtle/js/stisla.js') }}"></script>
        <script src="{{ asset('turtle/js/scripts.js') }}"></script>
        <script src="{{ asset('turtle/js/custom.js') }}"></script>        
    </body>
</html>
