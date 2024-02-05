@extends('layouts.app', ['title' => __('Add New')])

@section('content')
@include('layouts.headers.cards') 
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Inbox Modul</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('modul') }}">Modul</a></li>
              <li class="breadcrumb-item active" aria-current="page">Modul Baru</li>
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
      <div class="card bg-light text-black">
          <div class="card-header border-2">
            <h2 class="mb-0">{{ __('Tambah Modul') }}</h2>
          </div>
          <div class="card-body">
          <h3 >Form Tambah Data Modul</h3>
          <p class="text-blue">Tekan tombol simpan untuk menyimpan data Modul dan tombol kembali untuk kembali</p>

          {{ Form::open(['url'=>'modul_name/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
          @csrf          
              <div class="form-group{{ $errors->has('nama_modul') ? ' has-danger' : '' }} row mb-2">
                  <label class="col-form-label text-md-right col-md-2">Nama Modul</label>
                  <div class="col-sm-10">
                      <input type="text" name="nama_modul" class="form-control {{ $errors->has('nama_modul') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Modul') }}">
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('nama_modul') }}</strong>
                      </span>
                  </div>
              </div>
              <div class="form-group {{ $errors->has('nama_menu') ? 'has-danger' : '' }} row mb-2">
                  <label class="col-form-label text-md-right col-md-2">Keterangan Modul</label>
                  <div class="col-md-10">
                      <input type="text" name="nama_menu" class="form-control {{ $errors->has('nama_menu') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Menu') }}">
                      <span class="invalid-feedback"><strong>{{ $errors->first('nama_menu') }}</strong></span>
                    </div>
              </div>
              <div class="form-group {{ $errors->has('modul_type_id') ? 'has-danger' : '' }} row mb-2">
                  <label class="col-form-label text-md-right col-md-2">Jenis Modul</label>
                  <div class="col-md-10">
                  <select id="modul_type_id" name="modul_type_id" class="form-control {{ $errors->has('modul_type_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Jenis Modul') }}">
                      <option value=''>..Pilih Kode..</option>
                      @foreach($modtype as $row)
                          <option value="{{ $row->id }}">{{ $row->modul_type }}</option>
                      @endforeach
                  </select>                     
                  <span class="invalid-feedback"><strong>{{$errors->first('modul_type_id')}}</strong></span>
                  </div>
              </div>
              <div class="text-right">
                  <a href="{{url('modul_name')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>
          </div>     
         
      </div>
    </div>    
  </div>
  @include('layouts.footers.auth')
</div>
@endsection


