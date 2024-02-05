@extends('layouts.app')
@section('title','User Control')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('main')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data User</h1>
      <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
          <div class="breadcrumb-item"><a href="{{ route('user') }}">Data User</a></div>
          <div class="breadcrumb-item">User Detail</div>
      </div>
    </div>
  </section>     
        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-succes border-0">
                        <div class="row col-12 align-items-center">
                            <div class="col-8">
                                <h3 class=" mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.new') }}" class="btn btn-sm btn-primary">Add user</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead class="text-white ">
                                <tr >
                                    <th scope="col">No</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Role User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list bg-light">
                                @foreach ($user as $temp)
                                <tr class="text-dark">
                                <td class="d-flex align-items-center">{{ ++$i}}</td>
                                <td>
                                <div class="flex items-center">
                                  <div class="">
                                  <a href="#" class="" data-toggle="tooltip" data-original-title="{{ $temp->username }}">
                                      <img class="circle-50" src="{{ asset('storage/profile-photos/'.$temp->profile_photo_url) }}"/>
                                  </a><span>{{ $temp->name }}</span>
                                  </div>
                                  
                                </div>
                                </td>
                                <td>{{ $temp->username}}</td>
                                <td>{{ $temp->level}}</td>
                                <td>{{ $temp->email}}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="/data_user/edit/{{ $temp->id }}"><i class="fa fa-16px fa-pen"></i>Edit Data</a>
                                        <a role="button" href="javascript:;" class="dropdown-item @if($temp->id == 1) @endif" @if($temp->id !=1) onclick="open_modal('{{($temp->id)}}')" @endif><i class="fa fa-16px fa-trash text-red-500"></i>Hapus Data</a>
                                        <a role="button" href="javascript:;" class="dropdown-item @if($temp->id == 1) @endif" @if($temp->id !=1) onclick="open_reset('{{($temp->id)}}')" @endif><i class="fas fa-bullseye text-red-500"></i>Reset Password</a>
                                    
                                      </div>
                                    </div>
                                </td>                     
                                </tr>
                                @endforeach    
                            </tbody>
                            <tfoot class="text-white bg-success">
                                <tr >
                                    <th scope="col">No</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Role User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"></th>
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
    <!-- Modal Reset -->
    <div class="modal fade modal-reset" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header" style="background-color: #dd4b39">
            <h4 class="modal-title" style="color: #fff">Konfirmasi Reset Password</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <p>Apakah Anda yakin ingin meresest password?</p>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <a id="submit_reset" href="#" class="btn btn-success">Reset</a>
            <a id="cancel" href="#" class="btn btn-danger" data-dismiss="modal">Batal</a>
          </div>

        </div>
      </div>
    </div>
<!-- Modal Hapus -->
<div class="modal fade modal-message" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #0080ff">
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
      $('#submit_hapus').attr("href","{{url('data_user')}}/hapus/"+id);
    }
    function open_reset(id) {
          $('.modal-reset').modal();
          $('#submit_reset').attr("href","{{url('data_user')}}/reset/"+id);
        }
    $("#table").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [0,5] }
      ]
    });         
  </script>
@endpush    