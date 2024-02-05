@extends('layouts.app', ['title' => __('Lihat Rincian SPD')])
<style>
    .atur { background-color:#ededed; color:#000000; margin-left:14px;padding:10px; text-align:justify; font-size:15px; 
        border-radius: 10px;text-decoration:none; border: 1px solid rgb(51, 190, 255 );}
    .table.dataTable th {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 14px;
  }
  table.data-table.dataTable tbody:hover {
  /*background-color: rgb(229, 249, 167);*/
  color : #000;
}  
</style>
@section('content')
    @include('layouts.headers.cards')
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Detail Perjalan Dinas</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('ts_master') }}">TS Master</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rincian TS</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--6">
<div class="row mb-4">
    <div class="col">
        <div class="card shadow p-1 rounded">
            <div class="card-header bg-primary">
                <a class="collapsed d-block text-white" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed">
                    <i class="fas fa-user-cog float-left"></i>
                    <i class="fa fa-chevron-down float-right"></i>
                     &nbsp INFORMASI DATA RINCI PERJALANAN DINAS ASN
                </a>
            </div>
            {{  Form::hidden('url',URL::previous())  }}
            <div id="collapse-1" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">                    
                <div class="profile-user-info profile-user-info-striped mb-0">
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">Tanggal Buat TS</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ empty($ts_master) ? '' : Helper::date_to_view($ts_master->tgl) }}</span>
                        </div>
                    </div>
                </div>
                <div class="profile-user-info profile-user-info-striped mb-0">
                    <div class="profile-info-row">    
                        <div class="profile-info-name col-md-2">Ts Dari</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ empty($ts_master) ? '' : $ts_master->dari }}</span>
                        </div>
                    </div>
                </div>    
                <div class="profile-user-info profile-user-info-striped mb-0">
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">Perihal</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ empty($ts_master) ? '' : $ts_master->perihal }}</span>
                        </div>
                    </div>    
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


<div class="row mb-4">
    <div class="col">
        <div class="card shadow p-1 rounded">
            <div class="card-header bg-primary">
                <a class="collapsed d-block text-white" data-toggle="collapse" href="#collapse-2" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed">
                <i class="ni ni-bullet-list-67 float-left"></i>    
                <i class="fa fa-chevron-down float-right"></i>
                &nbsp DATA SPD PEGAWAI 
                </a>        
            </div>
            <div id="collapse-2" class="collapse show" aria-labelledby="heading-collapsed">
                {{ Form::open(['url'=>'buat_spd/submit/'.$ts_master->id, 'class' => 'form-horizontal','method'=>'post']) }}
                @csrf
                <div class="card-body">
                    <div class="form-group {{ $errors->has('nomor_spd') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Nomor SPD</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="nomor_spd" name="nomor_spd" class="form-control" value="{{ isset($spd_master->nomor_spd) ? $spd_master->nomor_spd : ''}}">
                            <span class="help-block">{{ $errors->has('nomor_spd') ? $errors->first('nomor_spd') : '' }}</span>
                        </div>
                    </div>     
                    <div class="form-group{{$errors->has('tgl_spd') ? 'has-error' : ''}} row mb-2">
                        <label class="col-form-label text-md-left col-md-2">Tanggal SPD</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="date" id="tgl_spd" name="tgl_spd" class="form-control" value="{{isset($spd_master->tgl_spd) ? $spd_master->tgl_spd : ''}}">
                            <span class="help-block">{{$errors->has('tgl_spd') ? $errors->first('tgl_spd') : ''}}</span>
                        </div>
                    </div>  
                    <div class="form-group {{ $errors->has('ppk') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">PPK</label>
                        <div class="col-sm-12 col-md-8">
                            <select id="ppk" name="ppk" class="form-control shadow-none mt-1 block w-full select2">
                                <option value="">Pilih Pejabat Pembuat Komitmen..!</option>
                                @foreach($ppk as $pegs)
                                <option value={{$pegs->nip}} {{($pegs->nip == isset($spd_master->ppk) ? $spd_master->ppk :'') ? 'selected' : ''}}>{{$pegs->nip}} - {{$pegs->nama}} - {{$pegs->nama_jabatan}}</option>
                                @endforeach    
                            </select> 
                            <span class="help-block">{{ $errors->has('ppk') ? $errors->first('ppk') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('maksud_spd') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Maksud Perjalanan</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="maksud_spd" name="maksud_spd" class="form-control" value="{{ isset($spd_master->maksud_spd) ? $spd_master->maksud_spd : $ts_master->perihal}}">
                            <span class="help-block">{{ $errors->has('maksud_spd') ? $errors->first('maksud_spd') : '' }}</span>
                        </div>
                    </div>       
                    <div class="form-group {{ $errors->has('kendaraan') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Kendaraan</label>
                        <div class="col-sm-12 col-md-8">
                            <select id="kendaraan" name="kendaraan" class="form-control shadow-none mt-1 block w-full select2">
                                <option value="">Pilih Kendaraan..!</option>
                                @foreach($kendaraan as $key=>$value)
                                <option value="{{ $key }}" {{ ($key == isset($spd_master->kendaraan) ? $spd_master->kendaraan : '') ? 'selected' : '' }}>{{ '('.$key.') '.$value }}</option>
                                @endforeach    
                            </select> 
                            <span class="help-block">{{ $errors->has('kendaraan') ? $errors->first('kendaraan') : '' }}</span>
                        </div>
                    </div> 
                    <div class="form-group {{ $errors->has('tgl_pergi') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Tanggal Pergi</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="date" id="tgl_pergi" name="tgl_pergi" class="form-control" value="{{ isset($spd_master->tgl_pergi) ? $spd_master->tgl_pergi : '' }}">
                            <span class="help-block">{{ $errors->has('tgl_pergi') ? $errors->first('tgl_pergi') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('tgl_pulang') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Tanggal Pulang</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="date" id="tgl_pulang" name="tgl_pulang" class="form-control" value="{{ isset($spd_master->tgl_pulang) ? $spd_master->tgl_pulang : '' }}">
                            <span class="help-block">{{ $errors->has('tgl_pulang') ? $errors->first('tgl_pulang') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('tempat_berangkat') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Tempat Berangkat</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="tempat_berangkat" name="tempat_berangkat" class="form-control" value="{{ $ts_master->tempat_berangkat }}">
                            <span class="help-block">{{ $errors->has('tempat_berangkat') ? $errors->first('tempat_berangkat') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('tempat_tujuan') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Tempat Tujuan</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="tempat_tujuan" name="tempat_tujuan" class="form-control" value="{{ $ts_master->tempat_tujuan }}">
                            <span class="help-block">{{ $errors->has('tempat_tujuan') ? $errors->first('tempat_tujuan') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('pengikut1') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Pengikut - 1</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="pengikut1" name="pengikut1" class="form-control" value="{{ $ts_master->pengikut1 }}">
                            <span class="help-block">{{ $errors->has('pengikut1') ? $errors->first('pengikut1') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('pengikut2') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Pengikut - 2</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="pengikut2" name="pengikut2" class="form-control" value="{{ $ts_master->pengikut2 }}">
                            <span class="help-block">{{ $errors->has('pengikut2') ? $errors->first('pengikut2') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('akun') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Akun</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="akun" name="akun" class="form-control" value="{{ $ts_master->akun }}">
                            <span class="help-block">{{ $errors->has('akun') ? $errors->first('akun') : '' }}</span>
                        </div>
                    </div>                                          
                    <div class="card-footer">
                        <div class="text-left">
                            @if(empty($spd_master))
                            <button type="submit" class="btn btn-med btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Update</button>
                            <h4>Silahkan Update data ini untuk menambahkan data pegawai yang melakukan perjalanan dinas</h4>
                            @endif
                        </div>
                    </div>
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
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
</script>
@stop