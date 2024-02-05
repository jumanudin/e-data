@extends('layouts.app', ['title' => __('e-Dokumen Personal ASN')])

@section('content')
@include('layouts.headers.cards')


    <!-- Header -->
    <div class="header bg-primary pb-3">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('arsip_trc') }}">Data Arsip ASN</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View Dokumen</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--3">
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">{{ __('View Dokumen Personal ASN') }}</h3>
            </div>
            <div class="card-body">


            <div class="form-group{{ $errors->has('kode_kegiatan') ? ' has-danger' : '' }} row mb-2">                    
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Jenis Arsip') }}</label>
                <div class="col-md-10">
                    <input class="form-control" name="nama" id="kode_kegiatan" value="{{ $data->nama }}" disabled>
                </div>         
            </div>        
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Keterangan Dokumen') }}</label>
                <div class="col-md-10">
                    <input class="form-control" placeholder="{{ __('Keterangan Dokumen') }}" type="text" name="keterangan" disabled value="{{ $data->keterangan }}">
                </div>
            </div>            
            <iframe src="{{ asset('storage/'. $data->file) }}" width="100%" height="800px"></iframe>             
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