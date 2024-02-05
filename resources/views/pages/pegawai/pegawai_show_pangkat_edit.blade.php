@extends('layouts.app', ['title' => __('Detail')])

@section('content')
@include('layouts.headers.cards') 
<div class="container-fluid mt--7"">
 <h1> {{ __('Detail Data Pegawai') }} </h1>
 <div class="section-header-breadcrumb">
 <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
     <div class="breadcrumb-item active"><a href="{{ url('pegawai') }}" >Pegawai</a></div>
     <div class="breadcrumb-item active">Detail Data Pegawai</a></div>
 </div>
</div>
     

 <div class="card-body col-md-12 center">
     <div class="">
      <h2 class="section-title" style="color:red;font-type:bold;">Detail Data Pegawai : NIP : {{$peg->nip}} | Nama : {{$peg->nama}}</h2>
        <p class="section-lead">Silahkan isi form data kepangkatan di bawah ini dengan benar..!</p>
        @if(Session::has("pesan_berhasil"))
        <div class="alert alert-success alert-dismissable text-center icon-font">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>  {{ session('pesan_berhasil') }}
        </div>
        @elseif(Session::has("pesan_gagal"))
        <div class="alert alert-danger alert-dismissable text-center icon-font">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-exclamation-triangle"></i>  {{ session('pesan_gagal') }}
        </div>
        @elseif(count($errors) > 0)
        <div class="alert alert-danger alert-dismissable text-center icon-font">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-exclamation-triangle"></i>  Mohon periksa kembali inputan anda
        </div>
        @endif
     </div>

     <div class="card author-box card-warning">
      <div class="card-header">
          <h4>Riwayat Data Kepangkatan [Edit Data]</h4>
      </div>
      {{ Form::open(['url'=>'pegawai/panggol/edit/'.$file->id.'/'.$peg->id, 'class' => 'form-horizontal', 'method'=>'post']) }}
          @csrf

          <input type="text" name="token" class="form-control" value="{{ Crypt::encryptString($peg->id)}}" style='display:none'>
          <input type="text" name="nip" class="form-control" value="{{ $peg->nip}}" style='display:none'>
          <div class="card-body">
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Golongan</label>
                  <div class="col-sm-12 col-md-7">
                  <select id="golongan" name="golongan" class="form-control shadow-none mt-1 block w-full">
                     <option value="">Pilih Pangkat / Golongan Pegawai..!</option>
                     @foreach($panggol as $key=>$value)
                          <option value="{{ $key }}" {{ ($key == $file->golongan) ? 'selected' : '' }}>{{ $key.' - '.$value }}</option>
                     @endforeach
                  </select> 
                  <span class="help-block">{{ $errors->has('golongan') ? $errors->first('golongan') : '' }}</span>    
                  </div>
              </div>
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">TMT Golongan</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="date" name="tmt" class="form-control" value="{{ $file->tmt }}">
                      <span class="help-block">{{ $errors->has('tmt') ? $errors->first('tmt') : '' }}</span>
                  </div>
              </div>
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal SK</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="date" name="tgl_sk" class="form-control" value="{{ $file->tgl_sk }}">
                      <span class="help-block">{{ $errors->has('tgl_sk') ? $errors->first('tgl_sk') : '' }}</span>
                  </div>
              </div>
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SK</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="text" name="no_sk" class="form-control" value="{{ $file->no_sk }}">
                      <span class="help-block">{{ $errors->has('no_sk') ? $errors->first('no_sk') : '' }}</span>
                  </div>
              </div>

              <div class="card-footer">
                  <div class="text-right">
                      <a href="{{url('pegawai/panggol', Crypt::encryptString($peg->id)) }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                      <button type="submit" class="btn btn-sm btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                  </div>
              </div>
          </div>    
      {{ Form::close() }}
  </div>
     
    </div> 
                
    @include('layouts.footers.auth')          
</div> 
@endsection




