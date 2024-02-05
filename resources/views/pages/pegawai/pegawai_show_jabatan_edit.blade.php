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
          <h4>Riwayat Data Jabatan [Edit Data]</h4>
      </div>
      {{ Form::open(['url'=>'pegawai/jabatan/edit/'.$file->id.'/'.$peg->id, 'class' => 'form-horizontal', 'method'=>'post']) }}
          @csrf

          <input type="text" name="token" class="form-control" value="{{ Crypt::encryptString($peg->id)}}" style='display:none'>
          <input type="text" name="nip" class="form-control" value="{{ $peg->nip}}" style='display:none'>
          <div class="card-body">
              <div class="form-group {{ $errors->has('kode_satker') ? 'has-error' : '' }} row mb-2">
                  <label class="col-form-label text-md-right col-md-3">Satker</label>
                  <div class="col-md-7">
                  <select id="satker" name="satker" class="form-control select2" style="width:100%">
                     <option value="" disabled>Pilih Satker Pegawai..!</option>
                      @foreach($kua as $key=>$value)
                          <option value="{{ $key }}" {{ ($key == $peg->kode_satker) ? 'selected' : '' }}>{{ '('.$key.') '.$value }}</option>
                      @endforeach                            
                  </select>                            
                  <span class="help-block">{{ $errors->has('satker') ? $errors->first('satker') : '' }}</span>
                </div>                        
              </div>
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                  <div class="col-sm-12 col-md-7">
                  <select id="kode_jabatan" name="kode_jabatan" class="form-control shadow-none mt-1 block w-full">
                     <option value="">Pilih Jabatan Pegawai..!</option>
                     @foreach($jabatan as $key=>$value)
                          <option value="{{ $key }}" {{ ($key == $file->kode_jabatan) ? 'selected' : '' }}>{{ $key.' - '.$value }}</option>
                     @endforeach
                  </select> 
                  <span class="help-block">{{ $errors->has('kode_jabatan') ? $errors->first('kode_jabatan') : '' }}</span>    
                  </div>
              </div>
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tugas / Sebagai</label>
                  <div class="col-sm-12 col-md-7">
                      <textarea type="text" name="keterangan" class="form-control">{{ $file->keterangan}}</textarea>
                      <span class="help-block">{{ $errors->has('keterangan') ? $errors->first('keterangan') : '' }}</span>
                  </div>
              </div>
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">TMT Jabatan</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="date" name="tmt_jab" class="form-control" value="{{ $file->tmt_jab }}">
                      <span class="help-block">{{ $errors->has('tmt_jab') ? $errors->first('tmt_jab') : '' }}</span>
                  </div>
              </div>
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal SK Jabatan</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="date" name="tgl_skjab" class="form-control" value="{{ $file->tgl_skjab }}">
                      <span class="help-block">{{ $errors->has('tgl_skjab') ? $errors->first('tgl_skjab') : '' }}</span>
                  </div>
              </div>
              <div class="form-group row mb-2">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No SK Jabatan</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="text" name="no_skjab" class="form-control" value="{{ $file->no_skjab }}">
                      <span class="help-block">{{ $errors->has('no_skjab') ? $errors->first('no_skjab') : '' }}</span>
                  </div>
              </div>

              <div class="card-footer">
                  <div class="text-right">
                      <a href="{{url('pegawai/jabatan', Crypt::encryptString($peg->id)) }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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




