@extends('layouts.app')
@section('main')

<!-- Header -->
<div class="main-content">
  <div class="row">
    <div class="col">
      <div class="card shadow">
          <div class="card-header border">
            <h2 class="mb-0">{{ __('Tambah Modul') }}</h2>
          </div>
          {{ Form::open(['url'=>'modul_name/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
          @csrf          
          <div class="card-body">
          <p class="text-blue">Tekan tombol simpan untuk menyimpan data Modul dan tombol kembali untuk kembali</p>

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
            </div>
            <div class="card-footer border">
              <div class="text-right">
                <a href="{{url('modul_name')}}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </div>     
            {{ Form::close()}}
         
      </div>
    </div>    
  </div>
</div>
@endsection


