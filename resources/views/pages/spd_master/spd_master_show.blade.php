@extends('layouts.app', ['title' => __('Lihat Rincian TS')])
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
              <h6 class="h2 text-white d-inline-block mb-0">Detail Kontrol SPD</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('spd_master') }}">Kontrol SPD Data</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rincian TS SPD</li>
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
                        <a href="{{ route('spd_master') }}" class="btn btn-med btn-default">Kembali</a>
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
                                @if($veri->file_dukung<>'')
                                <span class="editable" ><a id="prndukung" href="/ts_master/viewupload/{{ Crypt::encryptString($veri->id) }}" class="btn btn-success" data-toggle='tooltip' title='Lihat Dokumen TS'>Download TS</a></span>
                                @endif
                                @if($veri->status==1)
                                <span class="editable" ><a id="prndukung" href="{{ route('spd_master.viewrekom',Crypt::encryptString($veri->id)) }}" target="_blank" class="btn btn-danger" data-toggle='tooltip' title='Download Surat Persetujuan Pimpinan'>Download Persetujuan</a></span>
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
                    <h3 class="text-primary">Buat status dan catatan telaahan staf sebagai rekomendasi SPD ,</h3>
                    <h3 class="text-primary">Jika status Ts Disetujui Kirim ke Konseptor tidak bisa dilakukan dan catatan tidak wajib diisi:</h3>
                </div>
                {{ Form::open(['url'=>'spd_master/submit/'.Crypt::encryptString($veri->id), 'class' => 'form-horizontal', 'method'=>'post']) }}
                @csrf
                <div class="form-group row mb-2">
                    <div class="col-md-1"><label class="text-dark">Status TS</label></div>
                    <div class="col-md-6">
                        <select id="status" name="status" class="form-control select2" data-placeholder="Pilih Status TS">
                            <option value=""></option>
                            <option value="1" <?php if($veri->status == 1) { echo "SELECTED"; } ?>>Disetujui</option>
                            <option value="2" <?php if($veri->status == 2) { echo "SELECTED"; } ?>>Direvisi</option>
                            <option value="3" <?php if($veri->status == 3) { echo "SELECTED"; } ?>>Ditolak</option>
                        </select> 
                    </div> 
                </div>
                <div class="form-group row mb-2">
                    <div class="col-md-1"><label class="text-dark">Catatan</label></div>
                    <div class="col-md-6">
                        <textarea type="text" name="note" id="note" class="form-control" rows="4" cols="50" placeholder="harus diisi kecuali Status Ts disetujui">{{$veri->note}}</textarea>
                    </div> 
                </div>
                <div class="form-group row mb-2">
                    <div class="col-md-3"><label class="text-dark">Kirim Ts Ke Konseptor untuk di edit kembali</label></div>
                    <div class="col-md-6">
                        <label class="custom-toggle">
                            <input type="checkbox" id="kirim" name="kirim" value="0" disabled>
                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                        </label>
                    </div> 
                </div>
                <div class="text-left mb-2">   
                    @if($veri->status<>1)                         
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
                    <div class="col-md-2 text-right">       
                        @if($veri->kirim==1 )                     
                        <button class="btn btn-primary btn-med" id="createNew">Tambah Pegawai</button>
                        @endif
                   </div>  
                </div> 
                <div class="table-responsive">
                    <table class="table table-hover table-striped data-table" id="">
                        <thead class="table-dark" >
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Photo</th>    
                                <th scope="col">NIP</th>    
                                <th scope="col">Nama Peserta</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Unit</th>
                                <th scope="col"></th>
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
                   <input type="hidden" name="id" id="id" style="display:none" >
                   <input type="hidden" name="id_rinci" id="id_rinci" style="display:" value="{{ $veri->id }}">
                   <input type="" name="tgl_pergi" id="tgl_pergi" style="display:none" value="{{ $veri->tgl_pergi }}">
                   <input type="" name="tgl_pulang" id="tgl_pulang" style="display:none" value="{{ $veri->tgl_pulang }}">
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
        {"data": 'action', name: 'action', orderable: false, searchable: true},
    ]
    }); 
    $('body').on('click', '#btn-save', function (event) {
    var id = $("#id").val();
    var id_rinci = $("#id_rinci").val();
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
            url: "{{ url('ts_master/rinci/addupdated') }}",
            data: {
                id:id,
                id_rinci:id_rinci,
                tgl_pergi:tgl_pergi,
                tgl_pulang:tgl_pulang,
                nip:nip,
                nama:nama,
                jabatan,
                unit,
                kode_golongan,
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
        $('#modelHeading').html("Input Data Pegawai");
        $('#ajaxModel').modal({backdrop: true, show: true});
        $(".modal-dialog").draggable({
            cursor: "move",
            handle: ".modal-header",
        });             
    });     
    // $('#kirimi').prop("disabled",true);
    // $('#kirimi').removeattr("disabled");
    $('#status').on('change', function() {
        if($('#status').val()==1){
            $('#kirim').attr("disabled",true);
        }else{
            $('#kirim').attr("disabled",false);
        }
    });
});    
function open_modal(id) {
var id_master = $("#id_master").val();
$('.modal-uraian').modal({backdrop: true, show: true});
$('#hapus_uraian').attr("href","{{url('spd_master')}}/rinci/hapus/"+id+"/"+id_master);
//   $('#hapus_uraian').attr("href","{{url('ts_master/rinci/hapus')}}/"+id);
} 
$("#prndukung").popover({
    title: 'Cetak Laporan Pendukung Dupak', 
    content: "Silahkan Click untuk melihat Pendukung TS",
    trigger: 'hover',
    delay: {show: 0, hide: 1000}
});             
$('#kirim').click(function(){
    if ($('#kirim').is(':checked')){
        $('#kirim').val(1);
    }                
});   
</script>
@stop