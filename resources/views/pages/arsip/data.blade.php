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
    <div class="header bg-primary pb-2">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Data Arsip ASN</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('doc_arsip') }}">Dokumen Arsip</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Item Jenis Dokumen Arsip</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--3"">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0"></h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('doc_arsip.create') }}"class="btn btn-med btn-primary">Tambah</a>
                        </div>
                    </div>
                </div> 
                <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-hover table-striped " id="table">
                        <thead class="bg-primary text-white">
                              <tr>
                                  <th class="text-center">No</th>
                                  <th>Jenis Dokumen</th>
                                  <th>Keterangan Dokumen</th>
                                  <th>Group</th>
                                  <th>Action</th>
                              </tr>
                        </thead>
                        <tbody class="list">        
                  
                        @foreach ($data as $temp) 

                          <tr class=" hover:bg-black-300">
                              <td class="text-center">{{ ++$i}}</td>
                              <td style="white-space: normal !important;">{{ $temp->nama }}</td>
                              <td style="white-space: normal !important;">{{ $temp->keterangan }}</td>
                              <td style="white-space: normal !important;">{{ $temp->group_id }}</td>
                            
                              <td class="text-right">
                                <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-eye" style='font-size:21px ;color:green;'></i></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                  @if($temp->kirim==0)
                                    <a class="dropdown-item" href="/doc_arsip/edit/{{ Crypt::encryptString($temp->id) }}"><i class="fa fa-edit"></i>Edit Data</a>
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
        $('#submit_hapus').attr("href","{{url('doc_arsip')}}/hapus/"+id);
      }
      $("#table").dataTable({
        "columnDefs": [
          { "sortable": true, "targets": [1,2,3,4] }
        ],pagingType: 'first_last_numbers',
      });        
    </script>
  @stop       

