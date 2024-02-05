@extends('layouts.app')
@section('title','General Dashboard')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('vendor/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendor/summernote/dist/summernote-bs4.min.css') }}">
@endpush
@section('main')
<div class="main-content">
    <section class="section">
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('Ini adalah halaman dashboard aplikasi. Silahkan pilih menu aplikasi yang diinginkan sesuai dengan user previlage anda '),
        'class' => 'col-lg-7'
    ])
    </section>   
    <div class="container-fluid mt-2 ">
    <h6 class="h2 text-default d-inline-block mb-0">SELAMAT DATANG..DI e-DATA KANWIL KEMENAG PROV BABEL! </h6>
    </div>
</div>    
@endsection
@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('vendor/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendor/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('vendor/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('turtle/js/page/index-0.js') }}"></script>
@endpush