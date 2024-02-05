@extends('layouts.app', ['title' => __('Modul Edit')])
@section('content')
@include('layouts.headers.cards') 
<!-- Header -->
<div class="header bg-primary pb-3">
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
<div class="container-fluid mt--3">
<div class="row">
    <div class="col">
        <div class="card shadow bg-light">
            <div class="card-header border-2">
                <h2 class="mb-0">{{ __('Edit Modul') }}</h2>
            </div>
            <!-- Card header -->
            <div class="card-body">
            <h3 >Edit Data Modul</h3>
            <p >Tekan tombol simpan untuk menyimpan data Modul dan tombol back untuk kembali</p>
            {{ Form::open(['url'=>'modul_name/edit/'.$data->id, 'class' => 'form-horizontal', 'method'=>'post']) }}
            @csrf
                <div class="form-group {{ $errors->has('nama_modul') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Modul</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" name="nama_modul" class="form-control" value="{{ $data->nama_modul }}" disabled>
                        <span class="help-block">{{ $errors->has('nama_modul') ? $errors->first('nama_modul') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('nama_menu') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan Modul</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" name="nama_menu" class="form-control" value="{{ $data->nama_menu }}">
                        <span class="help-block">{{ $errors->has('nama_menu') ? $errors->first('nama_menu') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('modul_type_id') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Modul</label>
                    <div class="col-sm-12 col-md-7">
                    <select id="modul_type_id" name="modul_type_id" class="form-control selectric">
                        <option value=''>..Pilih Kode..</option>
                
                        @foreach($modtype as $key=> $value)
                            <option value="{{ $key }}" {{ ($key == $data->modul_type_id) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>                             
                    <span class="help-block">{{ $errors->has('modul_type_id') ? $errors->first('modul_type_id') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('menu_id') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Menu</label>
                    <div class="col-sm-12 col-md-7">
                    <select id="menu_id" name="menu_id" class="form-control selectric">
                        <option value=''>..Kode Menu..</option>
                
                        @foreach($menutype as $key=> $value)
                            <option value="{{ $key }}" {{ ($key == $data->menu_id) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>                             
                    <span class="help-block">{{ $errors->has('menu_id') ? $errors->first('menu_id') : '' }}</span>
                    </div>
                </div>
    
                {{ Form::close() }}
            </div>    
            <div class="card-footer">
                <div class="text-right">
                    <a href="{{url('modul_name')}}" class="btn btn-med btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-med btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>    
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

