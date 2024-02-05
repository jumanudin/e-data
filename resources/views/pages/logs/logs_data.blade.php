@extends('layouts.app', ['title' => __('User Role Permission')])

@section('content')
@include('layouts.headers.cards')
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Logs History</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('logs') }}">Logs</a></li>
              <li class="breadcrumb-item active" aria-current="page">Logs Data</li>
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
            <div class="card bg-light shadow">
                <div class="card-header border-1">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0 ">Logs</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-dark table-hover " id="table">
                        <thead class="thead-dark">
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
                        <tbody class="list">
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
          $('#submit_hapus').attr("href","{{url('logs')}}/hapus/"+id);
        }
        $("#table").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [0,9] }
          ]
        });         
      </script>
    @stop       

