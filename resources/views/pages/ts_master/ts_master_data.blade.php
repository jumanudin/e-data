@extends('layouts.app', ['title' => __('Telaahan Staf')])
<style>
  .table.dataTable th ,tr{
    font-family: Poppins, Tahoma, sans-serif;
    font-size: 14px;
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
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Tela'han Staf</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('ts_master') }}">Ts Master</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Tela'ahan Staf</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--7"">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Daftar Tela'ahan Staf</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('ts_master.create') }}"class="btn btn-med btn-danger">Buat Tela'ahan Staf (TS)</a>
                        </div>
                    </div>
                </div> 
                <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-hover table-striped data-table" id="table">
                        <thead class="bg-primary text-white">
                              <tr>
                                  <th class="text-center">No</th>
                                  <th>Tgl Buat TS</th>
                                  <th>Dari</th>
                                  <th style="width:50%;">Perihal</th>  
                                  <th>Kirim</th>                                                            
                                  <th>Status<br> Verifikator</th>                                                            
                                  <th>Status TS</th>
                                  <th>Action</th>
                              </tr>
                        </thead>
                        <tbody class="list">        
                        @php   
                          $status="";  
                          $status_ver="";$lbl_kirim="";
                        @endphp                        
                        @foreach ($data as $temp) 
                        @if ($temp->status==0) 
                            @php $status = "Draf TS"; $stat_ts = "btn-warning";@endphp
                        @endif 
                        @if ($temp->status==1) 
                            @php $status = "Disetujui"; $stat_ts = "btn-success"; @endphp
                          
                        @endif 
                        @if ($temp->status==2) 
                            @php $status = "Revisi"; $stat_ts = "btn-info";@endphp
                            
                        @endif
                        @if($temp->status==3) 
                            @php $status = "Ditolak"; $stat_ts = "btn-danger";@endphp
                          
                        @endif 
                        @if ($temp->status_verifikator==0) 
                        @php $status_ver = "Belum"; $stat_lbl = "btn-primary";@endphp
                        @endif
                        @if ($temp->status_verifikator==1) 
                            @php $status_ver = "Disetujui" ;$stat_lbl = "btn-success"; @endphp
                          
                        @endif 
                        @if ($temp->status_verifikator==2) 
                            @php $status_ver = "Revisi"; $stat_lbl = "btn-warning";@endphp
                            
                        @endif
                        @if($temp->status_verifikator==3) 
                        @php $status_ver = "Ditolak"; $stat_lbl = "btn-danger";@endphp
                        
                        @endif 

                        @php ($lbl_kirim==1) ? $lbl_kirim="btn-info" : $lbl_kirim="btn-danger";  
                        @endphp    
                          <tr class=" hover:bg-black-300">
                              <td class="text-center">{{ ++$i}}</td>
                              <td>{{ date('d-m-Y',strtotime($temp->tgl)) }}</td>
                              <td style="white-space: normal !important;">{{ $temp->dari }}</td>
                              <td style="white-space: normal !important;"><a href="/ts_master/view/{{ Crypt::encryptString($temp->id) }}" data-toggle="tooltip" title="click untuk melihat detail Data TS">{{ $temp->perihal }}</a></td>                                  
                              <td><span class="badge badge-pill badge-lg {{ ($temp->kirim==1) ? "btn-success":"btn-primary"}}">{{ ($temp->kirim==1) ? "Sudah":"Belum" }}</span></td>                                        
                              <td><span class="badge badge-pill badge-lg {{$stat_lbl}}">{{ $status_ver }}</span></td>                                        
                              <td><span class="badge badge-lg badge-pill {{$stat_ts}}">{{ $status }}</span></td>                                 
                              <td class="text-right">
                                <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                  @if($temp->kirim==0)
                                    <a class="dropdown-item" href="/ts_master/edit/{{ Crypt::encryptString($temp->id) }}"><i class="fa fa-edit"></i>Edit Data</a>
                                  @endif  
                                    <a role="button" href="javascript:;" class="dropdown-item @if($temp->id == 1) @endif" @if($temp->id !=1) onclick="open_modal('{{($temp->id)}}')" @endif><i class="fa fa-trash"></i>Hapus Data</a>
                                  @if($temp->status==1)    
                                    <!--<a class="dropdown-item" href="/ts_master/buatspd/{{ Crypt::encryptString($temp->id) }}"><i class="fa fa-list" ></i>Buat SPD</a>-->
                                    <!--<a class="dropdown-item" target="_blank" href="/ts_master/cetakst/{{ Crypt::encryptString($temp->id) }}">Cetak ST Individu</a>-->
                                    <!--<a class="dropdown-item" href="/ts_master/cetakst_lampiran/{{ Crypt::encryptString($temp->id) }}">Cetak ST dengan Lampiran</a>-->
                                  @endif    
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
    @include('layouts.footers.auth')     
  </div>                 
  @endsection

  @section('modal')
  <!-- Modal Hapus -->
  <div class="modal fade modal-message" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #dd4b39">
          <h4 class="modal-title" style="color: #fff">Konfirmasi Hapus Data</h4>
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
  @endsection
  @section('js')
    <script type="text/javascript">
      function open_modal(id) {
        $('.modal-message').modal();
        $('#submit_hapus').attr("href","{{url('ts_master')}}/hapus/"+id);
      }
      $("#table").dataTable({
        "columnDefs": [
          { "sortable": true, "targets": [1,2,3,4] }
        ],pagingType: 'first_last_numbers',
      });        
    </script>
  @stop       

