@extends('layouts.app')
@section('title','User Role Permission')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('main')
<div class="main-content">
    <section class="section">
      <!-- Header -->
      <div class="section-header">
        <h1>Data User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('role') }}">Role Data</a></div>
            <div class="breadcrumb-item">Role Detail</div>
        </div>
      </div>
    </section>  
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <!-- Card header -->
          <div class="card-header border-0">
          <div class="row col-12 align-items-center">
              <div class="col-8">
                  <h3 class="mb-0">{{ __('User Role Permission') }}</h3>
              </div>
              <div class="col-4 text-right">
                  <a href="{{ route('role.create') }}" class="btn btn-sm btn-primary">Role Baru</a>
              </div>
          </div>
          </div>
          <!-- Light table -->
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="table">
              <thead class="text-white">
                <tr>
                  <th>NO</th>
                  <th>User Level</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="list bg-light">
              @foreach ($role as $temp)
                  <tr class="text-dark">
                    <td class="d-flex align-items-center">{{ ++$i}}</td>
                    <td>{{ $temp->level}}</td>
                    <td>{{ $temp->created_at->format('d M Y H:i')}}</td>
                    <td>{{ $temp->updated_at->format('d M Y H:i')}}</td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="/role_user/edit/{{ $temp->id }}">Edit Data</a>
                          <a role="button" href="javascript:;" class="dropdown-item @if($temp->id == 1) @endif" @if($temp->id !=1) onclick="open_modal('{{($temp->id)}}')" @endif>Hapus Data</a>
                        </div>
                      </div>
                    </td>                     
                  </tr>
                  @endforeach                   
              </tbody>
              <tfoot class="bg-success text-white">
              <tr>
                  <th >NO</th>
                  <th>User Level</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th></th>
                </tr>                
              </tfoot>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>      
</div>
@endsection
@section('modal')
<!-- Modal Hapus -->
<div class="modal fade modal-message" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: green">
        <h4 class="modal-title" style="color: #fff">Konfirmasi Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>Data yang dihapus tidak dapat dikembalikan lagi. Apakah Anda yakin ingin menghapus data?</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="submit_hapus" href="#" class="btn btn-success">Hapus</a>
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
      $('#submit_hapus').attr("href","{{url('role_user')}}/hapus/"+id);
    }
    $("#table").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [0,4] }
      ]
    });         
  </script>
@endpush   
