@extends('layouts.app', ['title' => __('Upload Dokumen Pendukung')])

@section('content')
@include('layouts.headers.cards')
 
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Dokumen Pendukung</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('ts_master') }}">Master TS</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View Dokumen Pendukung</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--6">
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">{{ __('Dokumen Pendukung Pengajuan Ts') }}</h3>
            </div>
            <div class="card-body">

            <iframe src="{{ asset('storage/'. $data->file_dukung) }}" width="100%" height="800px"></iframe>             
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection
@section('js')
<script>
  document.querySelector('.custom-file-input').addEventListener('change', function (e) {
    var name = document.getElementById("file").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = name
  })
</script>
@stop