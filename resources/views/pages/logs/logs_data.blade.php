@extends('layouts.app')

@section('main')
<!-- Header -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Log System</h1> 
      <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
          <div class="breadcrumb-item"><a href="{{ route('logs') }}">Log</a></div>
          <div class="breadcrumb-item">Daftar Log</div>
      </div>
    </div>
  </section>  
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border">
                    <div class="row col-12 align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0 ">Logs List</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover " id="table">
                        <thead class="text-white">
                        <tr>
                            <th>Id Logs</th>
                            <th>Nama Modul</th>
                            <th>Deskripsi Modul</th>
                            <th>Trans#</th>
                            <th>User-Id</th>
                            <th>Nama User</th>
                            <th>Email Users</th>
                            <th>Tanggal dibuat</th>
                            <th>Tanggal diupdate</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="list bg-light">
                        @foreach ($logs as $temp)
                        <tr class="border-b border-gray-200 hover:bg-gray-200">
                            <td>{{ $temp->id }}</td>
                            <td>{{ $temp->modul }}</td>
                            <td>{{ $temp->event }}</td>
                            <td>{{ $temp->trn_id }}</td>
                            <td>{{ $temp->user_id }}</td>
                            <td>{{ $temp->user_name }}</td>
                            <td>{{ $temp->email }}</td>
                            <td>{{ $temp->created_at }}</td>
                            <td>{{ $temp->updated_at }}</td>
                            <td class="py-3 px-6 text-center"><div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a role="button" href="javascript:;" onclick="open_modal('{{($temp->id)}}')" ><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            </div></div></td>                            
                        </tr>
                        @endforeach 
                        </tbody>
                    </table>
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
      <script type="text/javascript">
        function open_modal(id) {
          $('.modal-message').modal();
          $('#submit_hapus').attr("href","{{url('logs')}}/hapus/"+id);
        }
        $("#table").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [0,9] }
          ]
        });         
      </script>
    @endpush       

