@extends('layouts.app', ['title' => __('Lihat Rincian Dupak')])

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
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Dupak</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('buat_dupak') }}">Buat Dupak</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rincian Dupak</li>
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
                     &nbsp INFORMASI DATA DUPAK - {{ $data->id_dupak}}
                </a>

            </div>
            <div id="collapse-1" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">

                    <a href="javascript:;">
                        <img class="img img-raised rounded-circle" style="width:100px;" src="{{ asset('storage/profile-photos/'.Auth::user()->profile_photo_url) }}">
                    </a>
                <div class="profile-user-info profile-user-info-striped mb-4">
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">NIP</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $data->nip }}</span>
                        </div>
                        <div class="profile-info-name col-md-2">PANGKAT-GOL</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $pangkat->pangkat.'/'.$pangkat->gol }}</span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">NAMA</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $data->nama }}</span>
                        </div>
                        <div class="profile-info-name col-md-2">TMT GOL</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ date('d-m-Y',strtotime($data->tmt_panggol)) }}</span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">ِAGAMA</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $agama->agama }}</span>
                        </div>
                        <div class="profile-info-name col-md-2">JABATAN</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $jabatan->nama_jabatan }}</span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-3">JENIS KELAMIN</div>
                        <div class="profile-info-value">
                            @php
                                $jenis_kel = '';
                               if($data->jenis_kelamin=='L'){
                                  $jenis_kel = 'Laki-Laki';      
                               } else {
                                  $jenis_kel = 'Perempuan'; 
                               }
                            @endphp
                            <span class="editable" >{{ $jenis_kel }}</span>
                        </div>
                        <div class="profile-info-name col-md-2">TMT JABATAN</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ date('d-m-Y',strtotime($data->tmt_jabatan)) }}</span>
                        </div>                        
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-3">TEMPAT / TGL LAHIR</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $data->tempat_lahir.' / '.date('d-m-Y',strtotime($data->tgl_lahir)) }}</span>
                        </div>
                        <div class="profile-info-name col-md-3">Masa Kerja Gol. Lama</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $data->mktahun_lama }} tahun</span>
                            <span class="editable" >{{ $data->mkbulan_lama }} bulan</span>
                        </div>                        
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">UNIT KERJA</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $unit->nama }}</span>
                        </div>
                        <div class="profile-info-name col-md-3">Masa Kerja Gol. Baru</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $data->mktahun_baru }} tahun</span>
                            <span class="editable" >{{ $data->mkbulan_baru }} bulan</span>
                        </div>                         
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">MASA PENILAIAN DARI</div>
                        <div class="profile-info-value  bg-danger">
                            <span class="text-white font-weight-bold" >{{ date('d-m-Y',strtotime($data->mp_awal)) }} s/d {{ date('d-m-Y',strtotime($data->mp_akhir)) }}</span>
                        </div>
                        <div class="profile-info-name col-md-2">Angka Kredit TERAKHIR</div>
                        <div class="profile-info-value">
                            <span class="editable" >{{ $data->pak_lama }}</span>
                        </div>
                    </div>                    
                </div>
                <div class="profile-user-info profile-user-info-striped mb-4">
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-3">STATUS DUPAK</div>
                        <div class="profile-info-value">
                            <span class="editable text-red" >{{ $data->status }}</span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">KETERANGAN</div>
                        <div class="profile-info-value bg-primary">
                            <span class="editable text-white" >{{ $data->keterangan }}</span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name col-md-2">PAK BARU</div>
                        <div class="profile-info-value bg-info">
                            <span class="editable text-dark" ></span>
                        </div>
                    </div>
                </div>    
                <div class="col-12 text-left">
                            <a id="prndupak" target="_blank" href="/buat_dupak/cetak/{{ Crypt::encryptString($data->id)}}) }}" class="btn btn-med btn-primary">Cetak Dupak</a>
                            <a href="/buat_dupak/ajukan/{{ Crypt::encryptString($data->id) }}" class="btn btn-med btn-warning">Ajukan Dupak</a>
                            <a href="{{ route('buat_dupak') }}" class="btn btn-med btn-success">Kembali</a>
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
                    &nbsp DAFTAR LAMPIRAN PENDUKUNG DUPAK LAINNYA
                </a>
            </div>
            <div id="collapse-2" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">
                    <div class="row align-items-center mb-2">
                        <div class="col-md-8">
                        <h3 class="text-blue">INPUT PAK LAMA</h3>
                        </div>
                            <div class="col-4 text-right">
                                <button id="createNew" class="btn btn-sm btn-primary">Tambah</button>
                            </div>
                    </div>    
                    <div class="table-responsive">
                        @csrf
                        <table class="table table-striped table-hover data-table" style="width:100%" >
                            <thead>
                                <tr class="bg-success" >
                                    <th class="text-white">Id</th>
                                    <th class="text-white">Uraian</th>
                                    <th class="text-white">PAK Lama</th>
                                    <th class="text-white">Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="text-blue"></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <div class="card shadow p-1 rounded" >
            <div class="card-header bg-primary">
                <a class="collapsed d-block text-white" data-toggle="collapse" href="#collapse-3" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed">
                <i class="ni ni-bullet-list-67 float-left"></i>    
                <i class="fa fa-chevron-down float-right"></i>
                    &nbsp UPLOAD LAMPIRAN DUPAK DAN PENDUKUNG (DUPAK,PAK LAMA,SPMT)
                </a>
            </div>
            <div id="collapse-3" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">
                    {{ Form::open(['url'=>'buat_dupak/upload/'.Crypt::encryptString($data->id), 'class' => 'form-horizontal', 'id'=>'fileUploadForm', 'method'=>'post' ,'enctype'=>'multipart/form-data']) }}
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group {{ $errors->has('file') ? ' has-danger' : '' }} row bm-2">
                    <label class="col-form-label text-md-right col-md-3 ">{{ __('UPLOAD LAMPIRAN YANG DIUSUL') }}</label>
                        <div class="col-md-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input {{ $errors->has('file') ? ' is-invalid' : '' }}" id="file" name="file" aria-describedby="file">
                                <label class="custom-file-label" for="customFileLang">Pilih file yang diupload (pdf) Max 1 MB</label>
                            </div>
                            @if ($errors->has('file'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif                        
                            <div class="form-group mt-2">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                    </div>
                            </div> 
                        </div>
                        @if($data->file_dukung)
                        <div id="view" class="col-md-1">                            
                            <a href="/buat_dupak/viewupload/{{ Crypt::encryptString($data->id) }}" class="btn btn-success" data-toggle='tooltip' title='View Dokumen'>Lihat</a>
                        </div>
                        @endif                            
                    </div>  
                    <div class="col-12 text-left">
                        <button type="submit" class="btn btn-primary mt-4">{{ __('Upload') }}</button>
                    </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card shadow p-1 rounded">
            <div class="card-header bg-primary">
                <a class="collapsed d-block text-white" data-toggle="collapse" href="#collapse-4" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed">
                <i class="ni ni-bullet-list-67 float-left"></i>    
                <i class="fa fa-chevron-down float-right"></i>
                &nbsp DAFTAR BUTIR KEGIATAN DUPAK
                </a>
            </div>
            <div id="collapse-4" class="collapse show" aria-labelledby="heading-collapsed">
                <div class="card-body">
                <div class="row align-items-center mb-2">
                    <div class="col-md-8">
                        <h3 class="text-red">Tambahkan Kegiatan PAIF Ke Usul DUPAK Sesuai Masa Penilaian :<strong class="text-dark"><b>&nbsp{{ date('d-m-Y',strtotime($data->mp_awal)) }} s/d {{ date('d-m-Y',strtotime($data->mp_akhir)) }}</strong></b></h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="/buat_dupak/importbutir/{{ Crypt::encryptString($data->id)}}" class="btn btn-med btn-warning">Tambah</button>
                        <a href="/buat_dupak/cetakbutir/{{ Crypt::encryptString($data->id) }}" target="_blank" class="btn btn-med btn-primary"><i class="fa fa-print float-left"></i>&nbspCetak</a>
                    </div>
                </div>  
                <div class="table-responsive">
                    <table class="table table-hover table-flush table-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Butir Kegiatan</th>
                                <th scope="col">Total AK</th>
                                <th scope="col">File/URL</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($datatim as $temp)
                              @php
                              $tampil = "<a href='' target='_blank' data-toggle='tooltip' title='Lihat File'><img src='{{ asset('assets/img/brand/preview.png') }}'/></a>";
                              @endphp
                              <tr>
                            <td class="d-flex align-items-center">{{ ++$i}}</td>
                            <td>{{ date('d-m-Y',strtotime($temp->tgl_kegiatan))}}</td>
                            <td>{{ $temp->kode_kegiatan}}</td>
                            <td style="white-space: normal !important;">{{ $temp->uraian}}</td>
                            <td>{{ $temp->ak_paif}}</td>
                            <td>
                              @if(!empty($temp->file))
                              <a href="/trans_butir/view/{{ Crypt::encryptString($temp->id_paif) }}" data-toggle='tooltip' title='View Dokumen'><img src='{{ asset('assets/img/brand/preview.png') }}'/></a>
                              @endif 
                              @if(!empty($temp->url))
                              <a href="{{ $temp->url }}" target='_blank' data-toggle='tooltip' title='View URL Dokumen'><img style="width:20px;" src='{{ asset('assets/img/icons/common/google.svg') }}'/></a>
                              @endif 
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a role="button" href="javascript:;" class="dropdown-item" onclick="del_uraian('{{($temp->id)}}')" >Hapus Data</a>
                                </div>
                                </div>
                            </td>                     
                            </tr>
                            @endforeach    
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
    <!-- Modal edit anjab -->
<div class="modal fade" id="ajaxModel" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success" >
                <h4 class="modal-title text-white" id="modelHeading">Input PAK Lama</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="KegiatanForm" name="KegiatanForm" class="form-horizontal">
                   <input type="hidden" name="iddupak" id="iddupak" style="display:" value="{{ $data->id }}">
                   <input type="hidden" name="id" id="id" style="display:none" >
                   <div class="form-group row mb-2">
                        <label class="col-form-label text-md-left col-md-12">Kode Unsur</label>
                        <div class="col-md-12">
                        <select id="kodebutir" name="kodebutir" class="select2 form-control" data-live-search="true" style="width:100%">
                            <option value="">..Pilih Kode Unsur..</option>
                            @foreach($subunsur as $temp)
                                <option data-uraian ="{{$temp->kegiatan}}" value="{{ $temp->kode }}">{{ $temp->kegiatan}}</option>
                            @endforeach
                        </select>     
                        <span class="help-block">{{ $errors->has('kodebutir') ? $errors->first('kodebutir') : '' }}</span>
                        </div>
                    </div>
                    <input type="hidden" name="uraian" id="uraian">
                    <div class="form-group row">
                        <label for="ak" class="col-sm-12 control-label">Input Angka Kredit Lama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ak" name="ak" >
                            <span class="help-block">{{ $errors->has('ak') ? $errors->first('ak') : '' }}</span>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="btn-save" value="create">simpan perubahan
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Modal Hapus -->
    <div class="modal fade modal-message" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">  
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header" style="background-color: #dd4b39">
            <h4 class="modal-title" style="color: #fff" id="myModalLabel">Konfirmasi Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              
            <p>Data yang dihapus tidak dapat dikembalikan lagi. Apakah Anda yakin ingin menghapus data?</p>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <a id="submit_hapus" href="#" class="btn btn-danger">Hapus</a>
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
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#fileUploadForm  ').ajaxForm({
            
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                        Swal.fire(
                        'Upload file berhasil.!',
                        '',
                        'success'
                        )
                    }
        });        
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });
        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'uraian', name: 'uraian'},
            {data: 'ak', name: 'ak'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        });
     
        $('body').on('click', '#btn-save', function (event) {
            var id = $("#id").val();
            var id_dupak = $("#iddupak").val();
            var kodebutir = $("#kodebutir").val();
            var uraian = $('#uraian').val();
            var ak = $("#ak").val();
            $("#btn-save").html('Please Wait...');
            $("#btn-save"). attr("disabled", true);
            
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ url('buat_dupak/addupdated') }}",
                data: {
                id:id,
                id_dupak:id_dupak,
                kodebutir:kodebutir,
                uraian:uraian,
                ak:ak,
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
            $('#modelHeading').html("Input PAK Lama");
            $('#ajaxModel').modal({backdrop: true, show: true});
            $(".modal-dialog").draggable({
                        cursor: "move",
                        handle: ".modal-header",
            });             
            });
    });      
    function open_modal(id) {
          $('.modal-message').modal({backdrop: false, show: true});
          $('#submit_hapus').attr("href","{{url('buat_dupak/pakdelete')}}/"+id);
    } 
    function del_uraian(id) {
          $('.modal-uraian').modal({backdrop: true, show: true});
          $('#hapus_uraian').attr("href","{{url('buat_dupak/uraiandelete')}}/"+id);
    } 
    $("#prndupak").popover({
        title: 'Cetak Laporan Dupak', 
        content: "Silahkan Click untuk mencetak Dupak Terinci Untuk Ditandatangan",
        trigger: 'hover',
        delay: {show: 0, hide: 1000}
    });  
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
        var name = document.getElementById("file").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = name
    })
    $('#kodebutir').on('change', function() {
        const ak = $('#kodebutir option:selected').data('uraian');
        $('[name=uraian]').val(ak);
    });
    $("#table").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [0,5,6] }
      ]
    });  
</script>
@stop