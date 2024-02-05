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
                  <li class="breadcrumb-item"><a href="{{ route('buat_spd') }}">Buat SPD</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rincian Perjadin</li>
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
            <div class="card-header bg-default text-white">
                <i class="ni ni-bullet-list-67 float-left"></i>    
                &nbsp DATA SPD PEGAWAI 
            </div>
            <div id="collapse-2" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body ">
                    <div class="form-group {{ $errors->has('nomor_spd') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Nomor SPD</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="nomor_spd" name="nomor_spd" class="form-control" value="{{ isset($spd_master->nomor_spd) ? $spd_master->nomor_spd : ''}}" disabled>
                            <span class="help-block">{{ $errors->has('nomor_spd') ? $errors->first('nomor_spd') : '' }}</span>
                        </div>
                    </div>     
                    <div class="form-group{{$errors->has('tgl_spd') ? 'has-error' : ''}} row mb-2">
                        <label class="col-form-label text-md-left col-md-2">Tanggal SPD</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="date" id="tgl_spd" name="tgl_spd" class="form-control" value="{{isset($spd_master->tgl_spd) ? $spd_master->tgl_spd : ''}}" disabled>
                            <span class="help-block">{{$errors->has('tgl_spd') ? $errors->first('tgl_spd') : ''}}</span>
                        </div>
                    </div>  
                    <div class="form-group {{ $errors->has('ppk') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">PPK</label>
                        <div class="col-sm-12 col-md-8">
                            <select id="ppk" name="ppk" class="form-control shadow-none mt-1 block w-full select2" disabled>
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
                            <input type="text" id="maksud_spd" name="maksud_spd" class="form-control" value="{{ isset($spd_master->maksud_spd) ? $spd_master->maksud_spd : '' }}" disabled>
                            <span class="help-block">{{ $errors->has('maksud_spd') ? $errors->first('maksud_spd') : '' }}</span>
                        </div>
                    </div>       
                    <div class="form-group {{ $errors->has('kendaraan') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Kendaraan</label>
                        <div class="col-sm-12 col-md-8">
                            <select id="kendaraan" name="kendaraan" class="form-control shadow-none mt-1 block w-full select2" disabled>
                                <option value="">Pilih Kendaraan..!</option>
                                @foreach($kendaraan as $key=>$value)
                                <option value="{{ $key }}" {{ ($key == $spd_master->kendaraan) ? 'selected' : '' }}>{{ '('.$key.') '.$value }}</option>
                                @endforeach    
                            </select> 
                            <span class="help-block">{{ $errors->has('kendaraan') ? $errors->first('kendaraan') : '' }}</span>
                        </div>
                    </div> 
                    <div class="form-group {{ $errors->has('tgl_pergi') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Tanggal Pergi</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="date" id="tgl_pergi" name="tgl_pergi" class="form-control" value="{{ isset($spd_master->tgl_pergi) ? $spd_master->tgl_pergi : '' }}" disabled>
                            <span class="help-block">{{ $errors->has('tgl_pergi') ? $errors->first('tgl_pergi') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('tgl_pulang') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Tanggal Pulang</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="date" id="tgl_pulang" name="tgl_pulang" class="form-control" value="{{ isset($spd_master->tgl_pulang) ? $spd_master->tgl_pulang : '' }}" disabled>
                            <span class="help-block">{{ $errors->has('tgl_pulang') ? $errors->first('tgl_pulang') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('tempat_berangkat') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Tempat Berangkat</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="tempat_berangkat" name="tempat_berangkat" class="form-control" value="{{ $spd_master->tempat_berangkat }}" disabled>
                            <span class="help-block">{{ $errors->has('tempat_berangkat') ? $errors->first('tempat_berangkat') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('tempat_tujuan') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Tempat Tujuan</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="tempat_tujuan" name="tempat_tujuan" class="form-control" value="{{ $spd_master->tempat_tujuan }}" disabled>
                            <span class="help-block">{{ $errors->has('tempat_tujuan') ? $errors->first('tempat_tujuan') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('pengikut1') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Pengikut - 1</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="pengikut1" name="pengikut1" class="form-control" value="{{ $spd_master->pengikut1 }}" disabled>
                            <span class="help-block">{{ $errors->has('pengikut1') ? $errors->first('pengikut1') : '' }}</span>
                        </div>
                    </div>                      
                    <div class="form-group {{ $errors->has('pengikut2') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Pengikut - 2</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="pengikut2" name="pengikut2" class="form-control" value="{{ $spd_master->pengikut2 }}" disabled>
                            <span class="help-block">{{ $errors->has('pengikut2') ? $errors->first('pengikut2') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('akun') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Akun</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="akun" name="akun" class="form-control" value="{{ $spd_master->akun }}" disabled>
                            <span class="help-block">{{ $errors->has('akun') ? $errors->first('akun') : '' }}</span>
                        </div>
                    </div>                                          
                    <div class="card-footer">
                        <div class="text-left">
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
            <div class="card-header bg-default text-white">
                <i class="ni ni-bullet-list-67 float-left"></i> 
                &nbsp DATA SURAT TUGAS 
            </div>
            <div id="collapse-5" class="collapse show" aria-labelledby="heading-collapsed">
                {{ Form::open(['url'=>'buat_spd/st/submit/'.$spd_master->id, 'class' => 'form-horizontal','method'=>'post']) }}
                @csrf
                <div class="card-body">
                    <div class="form-group {{ $errors->has('nomor_st') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Nomor Surat Tugas</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" id="nomor_st" name="nomor_st" class="form-control" value="{{ $spd_master->nomor_st }}">
                            <span class="help-block">{{ $errors->has('nomor_st') ? $errors->first('nomor_st') : '' }}</span>
                        </div>
                    </div>     
                    <div class="form-group{{$errors->has('tgl_st') ? 'has-error' : ''}} row mb-2">
                        <label class="col-form-label text-md-left col-md-2">Tanggal Surat Tugas</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="date" id="tgl_st" name="tgl_st" class="form-control" value="{{ $spd_master->tgl_st}}">
                            <span class="help-block">{{$errors->has('tgl_st') ? $errors->first('tgl_st') : ''}}</span>
                        </div>
                    </div>  
                    <div class="form-group {{ $errors->has('timbang_1') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Menimbang - 1</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea rows="4" id="timbang_1" name="timbang_1" class="form-control">{{ $spd_master->timbang_1 }}</textarea>
                            <span class="help-block">{{ $errors->has('timbang_1') ? $errors->first('timbang_1') : '' }}</span>
                        </div>
                    </div>       
                    <div class="form-group {{ $errors->has('timbang_2') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Menimbang - 2</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea rows="4" id="timbang_2" name="timbang_2" class="form-control">{{ $spd_master->timbang_2 }}</textarea>
                            <span class="help-block">{{ $errors->has('timbang_2') ? $errors->first('timbang_2') : '' }}</span>
                        </div>
                    </div>       
                    <div class="form-group {{ $errors->has('timbang_3') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Menimbang - 3</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea rows="4" id="timbang_3" name="timbang_3" class="form-control">{{ $spd_master->timbang_3 }}</textarea>
                            <span class="help-block">{{ $errors->has('timbang_3') ? $errors->first('timbang_3') : '' }}</span>
                        </div>
                    </div>       
                    <div class="form-group {{ $errors->has('dasar_1') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Dasar - 1</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea rows="4" id="dasar_1" name="dasar_1" class="form-control">{{ $spd_master->dasar_1 }}</textarea>
                            <span class="help-block">{{ $errors->has('dasar_1') ? $errors->first('dasar_1') : '' }}</span>
                        </div>
                    </div>       
                    <div class="form-group {{ $errors->has('dasar_2') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Dasar - 2</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea rows="4" id="dasar_2" name="dasar_2" class="form-control">{{ $spd_master->dasar_2}}</textarea>
                            <span class="help-block">{{ $errors->has('dasar_2') ? $errors->first('dasar_2') : '' }}</span>
                        </div>
                    </div>       
                    <div class="form-group {{ $errors->has('dasar_3') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Dasar - 3</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea rows="4" id="dasar_3" name="dasar_3" class="form-control">{{ $spd_master->dasar_3 }}</textarea>
                            <span class="help-block">{{ $errors->has('dasar_3') ? $errors->first('dasar_3') : '' }}</span>
                        </div>
                    </div>       
                    <div class="form-group {{ $errors->has('lokasi_acara') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-left col-md-2 ">Lokasi Kegiatan</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea rows="4" id="lokasi_acara" name="lokasi_acara" class="form-control">{{ $spd_master->lokasi_acara }}</textarea>
                            <span class="help-block">{{ $errors->has('lokasi_acara') ? $errors->first('lokasi_acara') : '' }}</span>
                        </div>
                    </div>       
                                          
                    <div class="card-footer">
                        <div class="text-left">
                            <button type="submit" class="btn btn-med btn-icon icon-left btn-default"><i class="fas fa-save"></i> Update</button>
                            <a class="btn btn-med btn-success" target="_blank" href="/buat_spd/cetakst/{{ Crypt::encryptString($spd_master->id) }}"><i class="fa fa-print"></i>Cetak</a>
                            <a class="btn btn-med btn-warning" target="_blank" href="/buat_spd/cetakst_lampiran/{{ Crypt::encryptString($spd_master->id) }}"><i class="fa fa-print"></i>Cetak Lampiran</a>
                        </div>
                    </div>
                </div>    
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <div class="card shadow p-1 rounded">
            <div class="card-header bg-default text-white">
                <i class="ni ni-bullet-list-67 float-left"></i>    
                &nbsp Daftar Pegawai yang melakukan Perjalan Dinas
            </div>
            <div id="collapse-4" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">
                    <div class="col-12 text-left">
                        <button class="btn btn-default btn-med" id="createNew">Tambah ASN</button>
                   </div>   
                <div class="table-responsive">
                    <table class="table table-hover table-striped data-table" style="width:100%;">
                        <thead class="table-dark" >
                            <tr>
                                <th >No</th>
                                <th ></th>    
                                <th >Nama</th>
                                <th >Jabatan</th>
                                <th style="width:20%;" >Unit</th>
                                <th ></th>
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

@section('modal')
    <!-- Modal Penilaian TIM -->
<div class="modal fade" id="ajaxModel" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success" >
                <h4 class="modal-title text-white" id="modelHeading">Input Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="KegiatanForm" name="KegiatanForm" class="form-horizontal">
                   <input name="id_tsmaster" id="id_tsmaster" style="display:none" value="{{ $ts_master->id }}">
                   <input name="id" id="id" style="display:none" >
                   <input name="id_master" id="id_master" style="display:none" value="{{ $spd_master->id }}">
                   <input name="tgl_pergi" id="tgl_pergi" style="display:none" value="{{ $spd_master->tgl_pergi }}">
                   <input name="tgl_pulang" id="tgl_pulang" style="display:none" value="{{ $spd_master->tgl_pulang }}">
                   <h2>Data pegawai yg tidak muncul adalah pegawai yang tugas dinas luar pada range tanggal tersebut..!</h2>
                   <div class="form-group row mb-2">
                        <label class="col-form-label text-md-left col-md-12">Data Pegawai</label>
                        <div class="col-md-12">
                        <select id="nip" name="nip[]" class="select2 form-control" data-placeholder="Pilih Pegawai" data-live-search="true" multiple="" style="width:100%">
                            <option value=""></option>
                            @foreach($pegawai as $temp)
                                <option value="{{ $temp->nip }}" >{{ $temp->nama}} - {{ $temp->nama_jabatan}}</option>
                            @endforeach
                        </select>     
                        <span class="help-block">{{ $errors->has('nip') ? $errors->first('nip') : '' }}</span>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-success" id="btn-save" value="create">simpan perubahan
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Modal Hapus -->
    <div class="modal fade modal-uraian" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">  
          <div class="modal-content">
  
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #dd4b39">
              <h4 class="modal-title" style="color: #fff" id="myModalLabel">Konfirmasi Hapus Data</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
  
            <!-- Modal body -->
            <div class="modal-body">
              <input type="hidden" id="id_master" name="id_master" value="{{ $id}}">  
              <p>Data yang dihapus tidak dapat dikembalikan lagi. Apakah Anda yakin ingin menghapus data?</p>
            </div>
  
            <!-- Modal footer -->
            <div class="modal-footer">
              <a id="hapus_uraian" href="#" class="btn btn-danger">Hapus</a>
            </div>
  
          </div>
        </div>
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
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        // {data: 'pilih', name: 'pilih', orderable: false, searchable: false},    
        {data: 'image',
            "render": function (data){
                return "<img src=\"/storage/" + data + "\" height=\"\" class='avatar avatar-lg rounded-circle'/>";
            }
        },
        {data: 'nama', name:'nama'},
        {data: 'jabatan', name: 'jabatan'},
        {data: 'nama_unit', name: 'nama_unit'},
        {data: 'action', name: 'action', orderable: false, searchable: true},
    ]
    });
    
    $('body').on('click', '#btn-save', function (event) {
    var id = $("#id").val();
    var id_tsmaster = $("#id_tsmaster").val();
    var id_master = $("#id_master").val();
    var tgl_pergi = $("#tgl_pergi").val();
    var tgl_pulang = $("#tgl_pulang").val();
    var nip = $('#nip').val();
    var nama;
    var jabatan;
    var unit;
    var kode_golongan;
    $("#btn-save").html('Tunggu ..');
    $("#btn-save"). attr("disabled", true);
        
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('buat_spd/addupdated') }}",
            data: {
                id:id,
                id_master:id_master,
                tgl_pergi:tgl_pergi,
                tgl_pulang:tgl_pulang,
                nip:nip,
                nama:nama,
                jabatan,
                unit,
                kode_golongan,
                id_tsmaster,
            },
            dataType: 'json',
            success: function(res){
                // window.location.reload();
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                //swal('Data berhasil diubah',{icon:"success",});       
                $('#ajaxModel').modal('hide');     
                table.draw(); 
            }
        });
    }); 
    $('#createNew').click(function () {
        $('#KegiatanForm').trigger("reset");
        $('#modelHeading').html("Input Data Pegawai");
        $('#ajaxModel').modal({backdrop: true, show: true});
        $(".modal-dialog").draggable({
            cursor: "move",
            handle: ".modal-header",
        });             
    });        
   
});      
function open_modal(id) {
    var id_master = $("#id_master").val();
    $('.modal-uraian').modal({backdrop: true, show: true});
    $('#hapus_uraian').attr("href","{{url('buat_spd')}}/hapus/"+id+"/"+id_master);
    //   $('#hapus_uraian').attr("href","{{url('ts_master/rinci/hapus')}}/"+id);
} 
$("#table").dataTable({
    "columnDefs": [
    { "sortable": false, "targets": [0] }
    ]
});  
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
</script>
@stop