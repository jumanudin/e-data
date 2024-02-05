@extends('layouts.app', ['title' => __('Data Jabatan')])
@section('content')
@include('layouts.headers.cards') 

<div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">{{ __('Data Jabatan') }}</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('jabatan.create') }}" class="btn btn-sm btn-primary">Tambah Data Jabatan </a>
                </div>
            </div>
            </div>
            <!-- Light table -->
            <div class="card-body">
            <div class="table-responsive">
              <table class="table align-items-center table-flush table-hover" id="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="budget">id</th>
                    <th scope="col" class="sort" data-sort="status">Nama Jabatan Fungsional</th>
                    <th scope="col" class="sort" data-sort="status">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach ($data as $temp)
                    <tr>
                      <td class="text-center">{{ ++$i}}</td>
                      <td>{{ $temp->id }}</td>
                      <td>{{ $temp->nama_jabatan }}</td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/jabatan/edit/{{ $temp->id }}">Edit Data</a>
                            <a role="button" href="javascript:;" class="dropdown-item @if($temp->id == 1) @endif" @if($temp->id !=1) onclick="open_modal('{{($temp->id)}}')" @endif>Hapus Data</a>
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
      <div class="modal-header" style="background-color: grey">
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

@section('js')
<script type="text/javascript">
  function open_modal(id) {
    $('.modal-message').modal();
    $('#submit_hapus').attr("href","{{url('jabatan')}}/hapus/"+id);
  }
  $("#table").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": [0,4] }
    ]
  });         
</script>
@stop    
