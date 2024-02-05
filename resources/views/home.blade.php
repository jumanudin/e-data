@extends('layouts.web', ['title' => __('Kanwil Kemenag Prov. Kepulauan Bangka Belitung')])
@section('content')

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
    

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center mbr-section" >
  <div class="container" >         
  <h1 class="mbr-section-title" >Selamat Datang di e-DATA</h1>
  <h1 class="">"Sistem Aplikasi Data & Statistik"</h1>
  <h2>Kanwil Kementerian Agama Provinsi Kepulauan Bangka Belitung </h2>
  </div>
</section><!-- End Hero -->

<main id="main">    
</main>


