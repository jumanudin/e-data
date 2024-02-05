@extends('layouts.app', ['title' => __('Tambah Kegiatan')])

@section('content')
@if(auth()->user()->id_role==1 || auth()->user()->id_role==3)
    @include('layouts.headers.cards')
@else
    @include('layouts.headers.guest')    
@endif  
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Edit Dupak</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('buat_dupak') }}">Dupak Usul</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data Dupak</li>
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
            <div class="card-header bg-default border-1">
              <h2 class="mb-0 text-white">{{ __('Tambah Pengajuan Dupak') }}</h2>
            </div>

            <div class="card-body bg-light text-default">

            <h3 >Buat Form Dupak</h3>
                <p class="text-red"><strong>Silahkan dilengkapi data dengan benar,sesuai dengan data saat ini ..!</strong></p>


            {{ Form::open(['url'=>'buat_dupak/edit/'.$data->id, 'class' => 'form-horizontal', 'method'=>'post']) }}
            @csrf
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Periode Usul DUPAK') }}</label>
                <div class="col-md-10">
                    <input class="form-control" type="date" id="periode" name="periode" value="{{ $data->periode }}" readonly>
                </div>
            </div>  
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2 ">{{ __('NIP') }}</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="nip" name="nip" value="{{ $data->nip }}" readonly>
                </div>
            </div>  
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Nama') }}</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="nama" name="nama" value="{{ $data->nama }}" readonly>
                </div>
            </div>  

            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Tempat / Tgl Lahir') }}</label>
                <div class="col-md-5">
                    <input class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" type="text" id="tempat_lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}" >
                    @if ($errors->has('tgl_kegiatan'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-md-5">
                    <input class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $data->tgl_lahir }}" >
                    @if ($errors->has('tgl_lahir'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                    </span>
                    @endif                    
                </div>
            </div>  
            <div class="form-group row mb-2">                    
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Jenis Kelamin') }}</label>
                <div class="col-md-10" >
                    <select class="form-control" data-placeholder="--Pilih Jenis Kelamin--" data-live-search="true" id="jenis_kelamin" name="jenis_kelamin" >
                    <option value=""></option>
                    <option value="L" <?php if($data->jenis_kelamin == "L") { echo "SELECTED"; } ?>>Laki-laki</option>
                    <option value="P" <?php if($data->jenis_kelamin == "P") { echo "SELECTED"; } ?>>Perempuan</option>
                    </select>
                </div>         
            </div>     
            <div class="form-group row mb-2">                    
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Agama') }}</label>
                <div class="col-md-10" >
                    <select class="form-control" data-placeholder="--Pilih Agama--" data-live-search="true" id="agama" name="agama" >
                    <option value=""></option>
                    @foreach ($agama as $key=> $value)
                        <option value="{{ $key }}" {{ $key == $data->agama ? 'selected': '' }}>{{ $value }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('agama'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('agama') }}</strong>
                    </span>
                    @endif
                </div>         
            </div>     
            <div class="form-group row mb-2">                    
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Unit Kerja / KUA') }}</label>
                <div class="col-md-10" >
                    <select class="form-control" data-placeholder="--Pilih Satker / KUA --" data-live-search="true" id="unit_kerja" name="unit_kerja" >
                        <option value=""></option>
                    @foreach ($kua as $key=> $value)
                        <option value="{{ $key }}" {{ $key == $data->unit_kerja ? 'selected': '' }}>{{ $value }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('unit_kerja'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('unit_kerja') }}</strong>
                    </span>
                    @endif
                </div>         
            </div>       
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Masa Penilaian s/d ') }}</label>
                <div class="col-md-5">
                    <input class="form-control{{ $errors->has('mp_awal') ? ' is-invalid' : '' }}" type="date" name="mp_awal" id="mp_awal" value="{{$data->mp_awal}}">
                    @if ($errors->has('mp_awal'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('mp_awal') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-md-5">
                    <input class="form-control{{ $errors->has('mp_akhir') ? ' is-invalid' : '' }}" type="date" name="mp_akhir" id="mp_akhir" value="{{$data->mp_akhir}}" >
                    @if ($errors->has('mp_akhir'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('mp_akhir') }}</strong>
                    </span>
                    @endif                    
                </div>
            </div>  
            <div class="form-group row mb-2">                
            <label class="col-form-label text-md-left col-md-5 ">{{ __('Pendidikan Yang Sudah Diperhitungkan AK nya') }}</label>
                <div class="col-md-7" >
                    <select class="select2 form-control" data-placeholder="--Pilih Tingkat Pendidikan --" data-live-search="true" id="pendidikan" name="pendidikan" >
                        <option value=""></option>
                            @foreach ($pend as $key=> $value)
                        <option value="{{ $key }}" {{ $key == $data->pendidikan ? 'selected': '' }}>{{ $value }}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('pendidikan'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('nama_pendidikan') }}</strong>
                        </span>
                    @endif    
                </div>         
            </div>       
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Nama Pendidikan') }}</label>
                <div class="col-md-10">
                    <input class="form-control{{ $errors->has('nama_pendidikan') ? ' is-invalid' : '' }}" type="text" id="nama_pendidikan" name="nama_pendidikan" value="{{$data->nama_pendidikan}}">
                    @if ($errors->has('nama_pendidikan'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('nama_pendidikan') }}</strong>
                    </span>
                    @endif   
                </div>
            </div>  
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Pangkat / Gol / TMT') }}</label>
                <div class="col-md-5">
                    <select class="form-control" data-placeholder="--Pilih Pangkat dan Golongan --" data-live-search="true" id="panggol" name="panggol" value="{{$data->panggol}}">
                        <option value=""></option>
                        @foreach ($gol as $key=> $value)
                        <option value="{{ $key }}" {{ $key == $data->panggol ? 'selected' : ''}}>{{ $value.' ('.$key.')' }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('panggol'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('panggol') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-md-5">    
                    <input class="form-control{{ $errors->has('tmt_panggol') ? ' is-invalid' : '' }}" type="date" id="tmt_panggol" name="tmt_panggol" value="{{$data->tmt_panggol}}">
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        @if ($errors->has('tmt_panggol'))
                        <strong>{{ $errors->first('tmt_panggol') }}</strong>
                    </span>
                    @endif                       
                </div>
            </div>  
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2 ">{{ __('Jabatan / TMT') }}</label>
                <div class="col-md-5">
                    <select class="select2 form-control" data-placeholder="--Pilih Jabatan --" data-live-search="true" id="jabatan" name="jabatan" >
                        <option value=""></option>
                        @foreach ($jab as $key=> $value)
                        <option value="{{ $key }}" {{ $key == $data->jabatan ? 'selected' : ''}}>{{ $value}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('jabatan'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('jabatan') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-md-5">    
                    <input class="form-control{{ $errors->has('tmt_jabatan') ? ' is-invalid' : '' }}" type="date" name="tmt_jabatan" value="{{ $data->tmt_jabatan }}" >
                    @if ($errors->has('tmt_jabatan'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('tmt_jabatan') }}</strong>
                    </span>
                    @endif                       
                </div>
            </div> 
            <div class="form-group row mb-2">
                <label class="col-form-label text-med-right col-md-3">Angka Kredit Lama</label>
                <div class="col-md-9">
                    <input type="text" name="pak_lama" id="pak_lama" class="form-control" value="{{ $data->pak_lama }}">
                    @if($errors->has('pak_lama'))
                    <span class="invalid-feedback" style="display:block;" role="alert">
                        <strong>{{ $errors->first('pak_lama')}}</strong>    
                    </span>
                    @endif 
                </div>
            </div>
            <div class="form-group {{ $errors->has('mktahun_lama') ? 'has-error' : '' }} row mb-2">
                <label class="col-form-label text-md-left col-md-3">Masa Kerja Golongan Lama</label>
                <div class="col-md-3">
                    
                    <input type="number" name="mktahun_lama" class="form-control" value="{{ $data->mktahun_lama }}">
                    @if ($errors->has('mktahun_lama'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('mktahun_lama') }}</strong>
                    </span>
                    @endif     
                </div>
                <label class="col-form-label text-md-left">Tahun</label>
                
                <div class="col-md-3">
                    <input type="number" name="mkbulan_lama" class="form-control" value="{{ $data->mkbulan_lama }}">
                    @if ($errors->has('mkbulan_lama'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('mkbulan_lama') }}</strong>
                    </span>
                    @endif    
                </div>
                <label class="col-form-label text-md-left">Bulan</label>
            </div>

            <div class="form-group {{ $errors->has('mktahun_baru') ? 'has-error' : '' }} row mb-2">
                <label class="col-form-label text-md-left col-md-3">Masa Kerja Golongan Baru</label>
                <div class="col-md-3">
                    <input type="number" name="mktahun_baru" class="form-control" value="{{ $data->mktahun_baru }}">
                    @if ($errors->has('mktahun_baru'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('mktahun_baru') }}</strong>
                    </span>
                    @endif    
                </div>
                <label class="col-form-label text-md-left">Tahun</label>
                <div class="col-md-3 mb-4">
                    <input type="number" name="mkbulan_baru" class="form-control" value="{{ $data->mkbulan_baru }}">
                    @if ($errors->has('mktbulan_baru'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('mkbulan_baru') }}</strong>
                    </span>
                    @endif    
                </div>
                <label class="col-form-label text-md-left">Bulan</label>
            </div>
            <label class="col-form-label text-md-center col-md-12 font-weight-bold text-uppercase">Kolom Tanda Tangan JFT yang Bersangkutan<font color="red">*</font></label>
            <div class="form-group {{ $errors->has('ttd_tempat') ? 'has-error' : '' }} row mb-1">    
                <label class="col-form-label text-md-left col-md-2">Tempat TTD</label>   
                <div class="col-md-4">                    
                    <input type="text" name="ttd_tempat" class="form-control" value="{{ $data->ttd_tempat }}">
                    @if ($errors->has('ttd_tempat'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('ttd_tempat') }}</strong>
                        </span>
                    @endif  
                </div>
                <label class="col-form-label text-md-left col-md-2">Tanggal TTD</label>
                <div class="col-md-4 mb-4">
                    <input type="date" name="tgl_ttd" class="form-control" value="{{ $data->tgl_ttd }}">
                    @if ($errors->has('tgl_ttd'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('tgl_ttd') }}</strong>
                        </span>
                    @endif                      
                </div>
            </div>
            <label class="col-form-label text-md-center col-md-12 font-weight-bold text-uppercase">Kolom TTD Pejabat Pengusul<font color="red">*</font></label>
            <div class="form-group {{ $errors->has('ttd_pejabat') ? 'has-error' : '' }} row mb-2">    
                <label class="col-form-label text-md-left col-md-2">Tempat TTD</label>                        
                <div class="col-md-4">
                    <input type="text" name="ttd_pejabat" class="form-control" value="{{ $data->ttd_pejabat }}">
                    @if ($errors->has('ttd_pejabat'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('ttd_pejabat') }}</strong>
                        </span>
                    @endif                       
                </div>   
                <label class="col-form-label text-md-left col-md-2">Tanggal TTD</label>
                <div class="col-md-4">
                    <input type="date" name="tgl_ttdpejabat" class="form-control" value="{{ $data->tgl_ttdpejabat }}">
                    @if ($errors->has('tgl_ttdpejabat'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('tgl_ttdpejabat') }}</strong>
                        </span>
                    @endif  
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2">NIP</label>
                <div class="col-md-10">
                    <input type="text" name="nip_pejabat" class="form-control" value="{{ $data->nip_pejabat }}">
                    @if ($errors->has('nip_pejabat'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('nip_pejabat') }}</strong>
                        </span>
                    @endif                                       
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-form-label text-md-left col-md-2">Nama Pejabat</label>
                <div class="col-md-10">
                    <input type="text" name="nama_pejabat" class="form-control" value="{{ $data->nama_pejabat }}">
                    @if ($errors->has('nama_pejabat'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('nama_pejabat') }}</strong>
                        </span>
                    @endif   
                </div>
            </div>
            <div class="form-group {{ $errors->has('jab_pejabat') ? 'has-error' : '' }} row mb-2">
                <label class="col-form-label text-md-left col-md-2">Jabatan</label>    
                <div class="col-md-10">                           
                    <input type="text" name="nama_jabatan" class="form-control" value="{{ $data->nama_jabatan }}">
                    @if ($errors->has('nama_pejabat'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('nama_pejabat') }}</strong>
                    </span>
                @endif   
                </div>                  
            </div>                            

            <div class="text-center">
                <button id="btnSave" type="submit" class="btn btn-primary mt-4">{{ __('Simpan') }}</button>
            </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection
@section('js')  
<script type="text/javascript">
$(document).ready(function() {    
    $('#mp_awal').on('blur', function() {
        if ($('#mp_awal').val() > $('#mp_akhir').val()) {
            document.getElementById("mp_awal").focus();   
   
        }
    });
    $('#mp_akhir').on('blur', function() {
        if ($('#mp_awal').val() > $('#mp_akhir').val()) {
            document.getElementById("mp_awal").focus();   
   
        }
    });
});    
</script>
@stop 