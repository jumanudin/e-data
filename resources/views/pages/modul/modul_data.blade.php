@extends('layouts.app')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('main')
<div class="main-content">
  <!-- Header -->
    <section class="section">
        <div class="section-header">
          <h1>Data Modul</h1>
          <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
              <div class="breadcrumb-item"><a href="{{ route('modul') }}">Modul</a></div>
              <div class="breadcrumb-item">Data Modul</div>
          </div>
        </div>
    </section>   
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header border-0">
                    <div class="row col-12 align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Daftar Modul</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('modul.create') }}" class="btn btn-sm btn-primary">Add Modul</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover " id="table">
                          <thead class="text-white">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Id Modul</th>
                                <th>Nama Modul</th>
                                <th>Deskripsi Modul</th>
                                <th>Modul type</th>
                                <th>Jenis Menu</th>
                                <th>Tanggal dibuat</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="list bg-light">
                            @foreach ($data as $temp)
                            <tr >
                              <td class="text-center">{{ ++$i}}</td>
                              <td>{{ $temp->id }}</td>
                              <td>{{ $temp->nama_modul }}</td>
                              <td>{{ $temp->nama_menu }}</td>
                              <td>{{ $temp->jenismodul }}</td>
                              <td>{{ $temp->nama_menu }}</td>
                              <td>{{ $temp->created_at }}</td>
                              <td class="text-right">
                                <div class="dropdown">    
                                  <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                      <a class="dropdown-item" href="/modul_name/edit/{{ $temp->id }}">Edit Data</a>
                                      <!-- <a role="button" href="javascript:;" class="dropdown-item" onclick="open_modal('{{($temp->id)}}')" >Hapus Data</a> -->
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

    @push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>    
      <script type="text/javascript">
        function open_modal(id) {
          $('.modal-message').modal();
          $('#submit_hapus').attr("href","{{url('modul_name')}}/hapus/"+id);
        }
        $("#table").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [0,7] }
          ],
          pagingType: 'first_last_numbers',
        });         
      </script>
    @endpush       

