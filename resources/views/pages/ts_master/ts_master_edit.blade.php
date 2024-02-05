@extends('layouts.app', ['title' => __('Edit Data TS')])
@section('content')
@include('layouts.headers.cards') 

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Edit Data Telaahan Staf</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('ts_master') }}">Data Telaahan Staf</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit TS</li>
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
            <div class="card shadow">
        <!-- Card header -->
            <div class="section-body">
                <h2 class="card-header">Buat TS Perjalanan Dinas</h2>
                <p class="card-header">Tekan tombol simpan untuk menyimpan data Modul dan tombol back untuk kembali</p>
                {{ Form::open(['url'=>'ts_master/edit/'.$ts->id, 'class' => 'form-horizontal', 'id'=>'fileUploadForm', 'enctype'=>'multipart/form-data','method'=>'post']) }}
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('tgl') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Tanggal TS dibuat</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" name="tgl" class="form-control" value="{{ Helper::tgl_indo($ts->tgl) }}" readonly>
                                <span class="help-block">{{ $errors->has('tgl') ? $errors->first('tgl') : '' }}</span>
                            </div>
                        </div>    
                        
                        <div class="form-group {{ $errors->has('kepada') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2">Kepada</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" name="kepada" class="form-control" value="Kepala Kantor Wilayah Kementerian Agama Prov. Sumatera Barat" readonly>
                                <span class="help-block">{{ $errors->has('kepada') ? $errors->first('kepada') : '' }}</span>
                            </div>                        
                        </div>
                                                
                        <div class="form-group {{ $errors->has('perihal') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Perihal</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" name="perihal" class="form-control" value="{{ $ts->perihal}}">
                                <span class= "help-block">{{$errors->has('perihal')? $errors->first('perihal'):''}}</span>
                            </div>
                        </div>    
                        <div class="form-group {{ $errors->has('tgl_pergi') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Tanggal Pergi</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="date" id="tgl_pergi" name="tgl_pergi" class="form-control" value="{{ $ts->tgl_pergi}}">
                                <span class= "help-block">{{$errors->has('tgl_pergi')? $errors->first('tgl_pergi'):''}}</span>
                            </div>
                        </div>    
                        <div class="form-group {{ $errors->has('tgl_pulang') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Tanggal Pulang</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="date" name="tgl_pulang" class="form-control" value="{{ $ts->tgl_pulang}}">
                                <span class= "help-block">{{$errors->has('tgl_pulang')? $errors->first('tgl_pulang'):''}}</span>
                            </div>
                        </div>    
                            
                        <!--<div class="form-group {{ $errors->has('persoalan') ? 'has-error' : '' }} row mb-2">-->
                        <!--    <label class="col-form-label text-md-right col-md-2 ">Persoalan</label>-->
                        <!--    <div class="col-sm-12 col-md-8">-->
                        <!--        <textarea class="form-control" name="persoalan" >{{$ts->persoalan}}</textarea>                                    -->
                        <!--        <span class= "help-block">{{$errors->has('persoalan')? $errors->first('persoalan'):''}}</span>-->
                        <!--    </div>-->
                        <!--</div>    -->
                        
                        <!--<div class="form-group {{ $errors->has('anggapan') ? 'has-error' : '' }} row mb-2">-->
                        <!--    <label class="col-form-label text-md-right col-md-2 ">Peranggapan</label>-->
                        <!--    <div class="col-sm-12 col-md-8">-->
                        <!--        <textarea class="form-control" name="anggapan" id="anggapan">{{$ts->anggapan}}</textarea>                                    -->
                        <!--         <span class= "help-block">{{$errors->has('anggapan')? $errors->first('anggapan'):''}}</span>-->
                        <!--    </div>-->
                        <!--</div>    -->
                        <!--<div class="form-group {{ $errors->has('fakta') ? 'has-error' : '' }} row mb-2">-->
                        <!--    <label class="col-form-label text-md-right col-md-2 ">Fakta yang Mempengaruhi</label>-->
                        <!--    <div class="col-sm-12 col-md-8">-->
                        <!--        <textarea class="form-control" name="fakta" id="fakta">{{$ts->fakta}}</textarea>                                    -->
                        <!--         <span class= "help-block">{{$errors->has('fakta')? $errors->first('fakta'):''}}</span>-->
                        <!--    </div>-->
                        <!--</div>    -->
                        <!--<div class="form-group {{ $errors->has('analisis') ? 'has-error' : '' }} row mb-2">-->
                        <!--    <label class="col-form-label text-md-right col-md-2 ">Analisis</label>-->
                        <!--    <div class="col-sm-12 col-md-8">-->
                        <!--        <textarea class="form-control" name="analisis" id="analisis">{{$ts->analisis}}</textarea>                                    -->
                        <!--         <span class= "help-block">{{$errors->has('analisis')? $errors->first('analisis'):''}}</span>-->
                        <!--    </div>-->
                        <!--</div>    -->
                        <!--<div class="form-group {{ $errors->has('kesimpulan') ? 'has-error' : '' }} row mb-2">-->
                        <!--    <label class="col-form-label text-md-right col-md-2 ">Kesimpulan</label>-->
                        <!--    <div class="col-sm-12 col-md-8">-->
                        <!--        <textarea class="form-control" name="kesimpulan" id="kesimpulan">{{$ts->kesimpulan}}</textarea>                                    -->
                        <!--         <span class= "help-block">{{$errors->has('kesimpulan')? $errors->first('kesimpulan'):''}}</span>-->
                        <!--    </div>-->
                        <!--</div>    -->
                        <!--<div class="form-group {{ $errors->has('saran_tindakan') ? 'has-error' : '' }} row mb-2">-->
                        <!--    <label class="col-form-label text-md-right col-md-2 ">Saran dan Tindakan</label>-->
                        <!--    <div class="col-sm-12 col-md-8">-->
                        <!--        <textarea class="form-control" name="saran_tindakan" id="saran_tindakan">{{$ts->saran_tindakan}}</textarea>                                    -->
                        <!--         <span class= "help-block">{{$errors->has('saran_tindakan')? $errors->first('saran_tindakan'):''}}</span>-->
                        <!--    </div>-->
                        <!--</div>    -->
                        
                        <div class="form-group {{ $errors->has('anggaran') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Anggaran</label>
                            <div class="col-sm-12 col-md-8">
                            <select id="anggaran" name="anggaran" class="form-control shadow-none mt-1 block w-full">
                            <option value="">Pilih Jenis Anggaran DIPA..!</option>
                            @foreach($anggar as $ang)
                                <option value={{$ang->id}} {{($ang->id==$ts->anggaran)? 'selected' :'' }}>{{$ang->unit_kerja}} - [ {{$ang->no_dipa}} ]</option>
                            @endforeach    
                            </select> 
                                <span class="help-block">{{ $errors->has('anggaran') ? $errors->first('anggaran') : '' }}</span>
                            </div>
                        </div>                               
                        <div class="form-group {{ $errors->has('verifikator') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Veifikator TS</label>
                            <div class="col-sm-12 col-md-8">
                                <input id="verifikator" name="verifikator" class="form-control" value="{{ $setting->nama}}" disabled>
                                <span class="help-block">{{ $errors->has('verifikator') ? $errors->first('verifikator') : '' }}</span>
                            </div>
                        </div>                               
                        <div class="form-group row bm-2">    
                            <label class="col-form-label text-md-right col-md-2 ">{{ __('Upload Dokumen Pendukung') }}</label>
                            <div class="col-md-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input {{ $errors->has('file') ? ' is-invalid' : '' }}" id="file" name="file" aria-describedby="file">
                                    <label class="custom-file-label" for="customFileLang">Pilih file yang diupload (pdf) Max 1 MB</label>
                                </div>                
                                <div class="form-group mt-2">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                        </div>
                                </div> 
                            </div>                                              
                        </div>                                            
  
                    <div class="row">                       
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="{{url('ts_master')}}" class="btn btn-med btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-med btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>    
                {{ Form::close() }}
            </div>   
            </div> 
        </div> 
    </div>   
</div>
@include('layouts.footers.auth')
@endsection
@section('js')
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote-bs4.css') }}">
<script src="{{ asset('assets/vendor/summernote/dist/summernote-bs4.js') }}"></script>
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
<script type="text/javascript">
    // $('#persoalan').summernote({
    //     height: 200
    // });    
    // $('#anggapan').summernote({
    //     height: 200
    // });    
    // $('#fakta').summernote({
    //     height: 200
    // });    
    // $('#analisis').summernote({
    //     height: 200
    // });    
    // $('#kesimpulan').summernote({
    //     height: 200
    // });    
    // $('#saran_tindakan').summernote({
    //     height: 200
    // });    
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
        var name = document.getElementById("file").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = name
    })  
</script>
@stop