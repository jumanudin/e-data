@extends('layouts.app', ['title' => __('Lihat Rincian TS')])
<style>
    .atur { background-color:#ededed; color:#000000; margin-left:14px;padding:10px; text-align:justify; font-size:15px; 
        border-radius: 10px;text-decoration:none; border: 1px solid rgb(51, 190, 255 );}
    .table.dataTable th {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 14px;
  }
  table.data-table.dataTable tbody:hover {
  background-color: rgb(229, 249, 167);
  color : #000;
}  
</style>
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
              <h6 class="h2 text-white d-inline-block mb-0">Detail verifikator TS</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('verifikator') }}">Verifikator Data</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rincian Verifikator</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--6">
<div class="row mb-2">
    <div class="col">
        <div class="card shadow p-1 rounded">
            <div class="card-header bg-primary">
                <a class="collapsed d-block text-white" data-toggle="collapse" href="#collapse-3" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed">
                <i class="ni ni-bullet-list-67 float-left"></i>    
                <i class="fa fa-chevron-down float-right"></i>
                &nbsp DATA RINCI TELAAHAN STAF 
                </a>        
            </div>
            <div id="collapse-3" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">
                    <div class="col-12 text-left mb-2">                            
                        <a href="{{ route('verifikator') }}" class="btn btn-med btn-default">Kembali</a>
                        @if($veri->kirim==0)
                        <a onclick="window.location.href='{{ route('verifikator.kirim',$veri->id)}}'"  class="btn btn-med btn-primary text-white" data-toggle="tooltip" title="Kirim ke Verifikator Ts">Kirim</a>
                        @endif    
                    </div> 
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">
                            <div class="profile-info-name col-md-2">Tanggal Buat TS</div>
                            <div class="profile-info-value">
                                <span class="editable" >{{ date('d-m-Y',strtotime($veri->tgl)) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">    
                            <div class="profile-info-name col-md-2">Ts Dari</div>
                            <div class="profile-info-value">
                                <span class="editable" >{{ $veri->dari }}</span>
                            </div>
                        </div>
                    </div>    
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">
                            <div class="profile-info-name col-md-2">Perihal</div>
                            <div class="profile-info-value">
                                <span class="editable" >{{ $veri->perihal }}</span>
                            </div>
                        </div>    
                    </div>
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">
                            <div class="profile-info-name col-md-2">Tanggal Berangkat</div>
                            <div class="profile-info-value">
                                <span class="editable" >{{ date('d-m-Y',strtotime($veri->tgl_pergi)) }}</span>
                            </div>
                        </div>    
                    </div>
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">
                            <div class="profile-info-name col-md-2">Tanggal Pulang</div>
                            <div class="profile-info-value">
                                <span class="editable" >{{ date('d-m-Y',strtotime($veri->tgl_pulang)) }}</span>
                            </div>
                        </div>    
                    </div>
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">
                            <div class="profile-info-name col-md-2">File Pendukung</div>
                            <div class="profile-info-value">
                                <span class="editable" ><a id="prndukung" href="/verifikator/viewupload/{{ Crypt::encryptString($veri->id) }}" class="btn btn-success" data-toggle='tooltip' title='Lihat Dokumen TS'>Download TS</a></span>
                                @if($veri->rekom==1)
                                <span class="editable" ><a id="prndukung" href="{{ route('verifikator.viewrekom',Crypt::encryptString($veri->id)) }}" target="_blank" class="btn btn-danger" data-toggle='tooltip' title='Download Surat Persetujuan Pimpinan'>Download Persetujuan</a></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">
                            <div class="profile-info-name col-md-2">Verifikator</div>
                            <div class="profile-info-value">
                                <span class="editable" >{{ $verifikator->nama }} - {{$verifikator->nama_jabatan}}</span>
                            </div>
                        </div>    
                    </div>
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">
                            <div class="profile-info-name col-md-2 text-white bg-default">Catatan Verifikator</div>
                            <div class="profile-info-value">
                                @php
                                   $cek_veri="";
                                   if ($veri->status_verifikator==1)
                                   { $cek_veri="Disetujui";}
                                   if ($veri->status_verifikator==2)
                                   { $cek_veri="Direvisi";}
                                   if ($veri->status_verifikator==3)
                                   { $cek_veri="Ditolak";}
                                @endphp
                                <span class="editable" ><span class="badge badge-pill btn-primary">{{$cek_veri}}</span> {{ $veri->note_verifikator }}</span>
                            </div>
                        </div>    
                    </div>
                    <div class="profile-user-info profile-user-info-striped mb-0">
                        <div class="profile-info-row">
                            <div class="profile-info-name col-md-2 text-white bg-default">Catatan Pimpinan</div>
                            <div class="profile-info-value">
                                @php
                                   $cek_veri="";
                                   if ($veri->status==1)
                                   { $cek_veri="Disetujui";}
                                   if ($veri->status==2)
                                   { $cek_veri="Direvisi";}
                                   if ($veri->status==3)
                                   { $cek_veri="Ditolak";}
                                @endphp                            
                                <span class="editable" ><span class="badge badge-pill btn-primary">{{$cek_veri}}</span> {{ $veri->note }}</span>
                            </div>
                        </div>    
                    </div>

                    
                    <!--<div class="col-md-2 mt-2">-->
                    <!--    <span class="badge badge-primary text-white bg-primary">Persoalan</span>-->
                    <!--</div>-->
                    <!--<div class="col-md-12 atur">-->
                    <!--    {!!$veri->persoalan!!}-->
                    <!--</div>-->
                    <!--<div class="col-md-2 mt-2">-->
                    <!--    <span class="badge badge-default text-white bg-primary">Peranggapan</span>-->
                    <!--</div>-->
                    <!--<div class="col-md-12 atur">-->
                    <!--    {!!$veri->anggapan!!} -->
                    <!--</div>-->
                    <!--<div class="col-md-2 mt-2">-->
                    <!--    <span class="badge badge-default text-white bg-primary">Fakta</span>-->
                    <!--</div>-->
                    <!--<div class="col-md-12 atur">-->
                    <!--    {!!$veri->fakta!!} -->
                    <!--</div>-->
                    <!--<div class="col-md-2 mt-2">-->
                    <!--    <span class="badge badge-default text-white bg-primary">Analisis</span>-->
                    <!--</div>-->
                    <!--<div class="col-md-12 atur">-->
                    <!--    {!!$veri->analisis!!} -->
                    <!--</div>-->
                    <!--<div class="col-md-2 mt-2">-->
                    <!--    <span class="badge badge-default text-white bg-primary">Kesimpulan</span>-->
                    <!--</div>-->
                    <!--<div class="col-md-12 atur">-->
                    <!--    {!!$veri->kesimpulan!!} -->
                    <!--</div>-->
                    <!--<div class="col-md-2 mt-2">-->
                    <!--    <span class="badge badge-default text-white bg-primary">Saran Tindakan</span>-->
                    <!--</div>-->
                    <!--<div class="col-md-12 atur">-->
                    <!--    {!!$veri->saran_tindakan!!} -->
                    <!--</div>-->
                </div>        
            </div>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <div class="card shadow p-1 rounded">
            <div class="card-header bg-primary">
                <a class="collapsed d-block text-white" data-toggle="collapse" href="#collapse-4" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed">
                <i class="ni ni-bullet-list-67 float-left"></i>    
                <i class="fa fa-chevron-down float-right"></i>
                &nbsp BUAT STATUS TS
                </a>
            </div>
            <div id="collapse-4" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">
                <div class="row col-md-12 mb-2">
                        <h3 class="text-warning">Buat status dan catatan telaahan staf untuk rekomendasi ke pimpinan :<strong class="text-dark"></h3>
                </div>
                {{ Form::open(['url'=>'verifikator/submit/'.Crypt::encryptString($veri->id), 'class' => 'form-horizontal', 'method'=>'post']) }}
                @csrf
                <div class="form-group row mb-2">
                    <div class="col-md-1"><label class="text-dark">Status TS</label></div>
                    <div class="col-md-6">
                        <select id="status_verifikator" name="status_verifikator" class="form-control select2" data-placeholder="Pilih Status Verifikator">
                            <option value=""></option>
                            <option value="1" <?php if($veri->status_verifikator == 1) { echo "SELECTED"; } ?>>Disetujui</option>
                            <option value="2" <?php if($veri->status_verifikator == 2) { echo "SELECTED"; } ?>>Direvisi</option>
                            <option value="3" <?php if($veri->status_verifikator == 3) { echo "SELECTED"; } ?>>Ditolak</option>
                        </select> 
                    </div> 
                </div>
                <div class="form-group row mb-2">
                    <div class="col-md-1"><label class="text-dark">Catatan</label></div>
                    <div class="col-md-6">
                        <textarea type="text" id="note_verifikator" name="note_verifikator" class="form-control" rows="4" cols="50" placeholder="harus diisi kecuali Status Ts disetujui">{{$veri->note_verifikator}}</textarea>
                    </div> 
                </div>
                <div class="form-group row mb-2">
                    <div class="col-md-3"><label class="text-dark">Kirim Ts Ke Konseptor</label></div>
                    <div class="col-md-6">
                        <label class="custom-toggle">
                            <input type="checkbox" id="kirim" name="kirim" value="0" disabled>
                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                        </label>
                    </div> 
                </div>
                <div class="text-left mb-2">   
                    @if($veri->status_verifikator<>1)                         
                    <button type="submit" class="btn btn-med btn-icon icon-left btn-primary"><i class="fas fa-save"></i>Perbaharui Data</button>   
                    @endif
                </div> 
                {{form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col">
        <div class="card shadow p-1 rounded">
            <div class="card-header bg-primary">
                <a class="collapsed d-block text-white" data-toggle="collapse" href="#collapse-4" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed">
                <i class="ni ni-bullet-list-67 float-left"></i>    
                <i class="fa fa-chevron-down float-right"></i>
                &nbsp DAFTAR PEGAWAI YANG DINAS
                </a>
            </div>
            <div id="collapse-4" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">
                <div class="row col-md-12 mb-2">
                    <div class="col-md-10">
                        <h3 class="text-red">Daftar Pegawai yang ditunjuk :<strong class="text-dark"></h3>
                    </div> 
                </div> 
                <div class="table-responsive">
                    <table class="table table-hover table-flush table-striped data-table" id="">
                        <thead class="table-dark" >
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Photo</th>    
                                <th scope="col">NIP</th>    
                                <th scope="col">Nama Peserta</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Unit</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        </tbody>
                    </table>
                  </div>              
                </div> 
            </div>
        </div>
   
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote-bs4.css') }}">
<script src="{{ asset('assets/vendor/summernote/dist/summernote-bs4.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
    });
    var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    paging:false,
    searching:false,
    info:false,
    ajax: "",
    columns: [
        {"data": 'DT_RowIndex', name: 'DT_RowIndex'},
        {"data" : 'image',
            "render": function (data){
                return "<img src=\"/storage/" + data + "\" height=\"\" class='avatar avatar-lg rounded-circle'/>";
            }
        },
        {"data": 'nip', name: 'nip'},
        {"data": 'nama', name: 'nama'},
        {"data": 'jabatan', name: 'jabatan'},
        {"data": 'nama_unit', name: 'nama_unit'},
    ]
    });
    $('#status_verifikator').on('change', function() {
        if($('#status_verifikator').val()==1){
            $('#kirim').attr("disabled",true);
        }else{
            $('#kirim').attr("disabled",false);
        }
    });     
    $('#kirim').click(function(){
        if ($('#kirim').is(':checked')){
            $('#kirim').val(1);
        }                
    });
});      
</script>
@stop