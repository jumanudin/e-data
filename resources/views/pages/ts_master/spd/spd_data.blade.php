@extends('layouts.app', ['title' => __('Detail Perjalan Dinas ASN ')])
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
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Perjalanan Dinas</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('buat_spd') }}">Buat Spd </a></li>
                  <li class="breadcrumb-item active" aria-current="page">Inbox Perjadin</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-1">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Daftar Perjalanan Dinas ASN </h3>
                        </div>
                    </div>
                </div> 
                <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-hover table-striped data-table" id="table">
                        <thead class="bg-primary text-white">
                              <tr>
                                  <th class="text-center">No</th>
                                  <th>Tgl Buat</th>
                                  <th>No SPD</th>                                                            
                                  <th>Tgl Pergi</th>
                                  <th>Tgl Pulang</th>
                                  <th style="width:50%;">Maksud Perjalanan</th>  
                                  <th>Berangkat</th>                                                            
                                  <th>Tujuan</th>                                                            
                                  <th>Action</th>
                              </tr>
                        </thead>
                        <tbody class="list">   
                        @foreach ($data as $temp) 
                          <tr class=" hover:bg-black-300">
                              <td class="text-center">{{ ++$i}}</td>
                              <td>{{ date('d-m-Y',strtotime($temp->tgl)) }}</td>
                              <td>{{ $temp->nomor_spd }}</td>                                   
                              <td>{{ date('d-m-Y',strtotime($temp->tgl_pergi)) }}</td>
                              <td>{{ date('d-m-Y',strtotime($temp->tgl_pulang)) }}</td>
                              <td style="white-space: normal !important;"><a href="/buat_spd/view/{{ Crypt::encryptString($temp->id) }}" data-toggle="tooltip" title="click untuk melihat detail Data SPD">{{ $temp->maksud_spd }}</a></td>                                  
                              <td>{{ $temp->tempat_berangkat }}</td>                                   
                              <td>{{ $temp->tempat_tujuan }}</td>                                   
                              <td class="text-right">
                                <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="font-size:18px ;color:blue;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="/buat_spd/edit/{{ Crypt::encryptString($temp->id) }}"><i class="fa fa-edit"></i>Edit Data</a>
                                    <a role="button" href="javascript:;" class="dropdown-item @if($temp->id == 1) @endif" @if($temp->id !=1) onclick="open_modal('{{($temp->id)}}')" @endif><i class="fa fa-trash"></i>Hapus Data</a>
                                    <a class="dropdown-item" target="_blank" href="/buat_spd/cetakst/{{ Crypt::encryptString($temp->id) }}"><i class="fa fa-print"></i>Cetak ST Individu</a>
                                    <a class="dropdown-item" href="/buat_spd/cetakst_lampiran/{{ Crypt::encryptString($temp->id) }}"><i class="fa fa-print"></i>Cetak ST dengan Lampiran</a>
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
        $('#submit_hapus').attr("href","{{url('buat_spd')}}/msthapus/"+id);
      }
      $("#table").dataTable({
        "columnDefs": [
          { "sortable": true, "targets": [1,2,3,4] }
        ],pagingType: 'first_last_numbers',
      });        
    </script>
  @stop       

