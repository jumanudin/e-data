@extends('layouts.app', ['title' => __('Inbox Dupak')])

@section('content')
@if(auth()->user()->id_role==1 || auth()->user()->id_role==3)
    @php 
      
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
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Pengajuan Dupak</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('buat_dupak') }}">Dupak</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dupak Data</li>
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
                <div class="card-header bg-default border-1">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="text-white mb-1">Data Pengajuan Dupak</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('buat_dupak.create') }}" class="btn btn-sm btn-primary">Dupak Baru</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover table-flush table-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id Dupak</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Tgl Usul</th>
                                <th scope="col">PAK Lama</th>
                                <th scope="col">PAK Baru</th>
                                <th scope="col">PAK Setuju</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($data as $temp)
                            <tr>
                            <td class="d-flex align-items-center">{{ ++$i}}</td>
                            <td><a href="/buat_dupak/view/{{ Crypt::encryptString($temp->id) }}" data-toggle="tooltip" title="click untuk melihat detail dupak">{{ $temp->id_dupak}}</a></td>
                            <td>{{ strtotime($temp->periode) == NULL ? "" : date('d-m-Y',strtotime($temp->periode))}}</td>
                            <td>{{ strtotime($temp->tgl_usul) == NULL ? "" : date('d-m-Y',strtotime($temp->tgl_usul)) }}</td>
                            <td>{{ $temp->pak_lama}}</td>
                            <td>{{ $temp->pak_baru}}</td>
                            <td>{{ $temp->pak_setuju}}</td>
                            <td class="text-yellow">{{ $temp->status}}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="/buat_dupak/edit/{{ Crypt::encryptString($temp->id) }}">Edit Data</a>
                                    <a role="button" href="javascript:;" class="dropdown-item" onclick="open_modal('{{($temp->id)}}')">Hapus Data</a>
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
@section('js')
  <script type="text/javascript">
    function open_modal(id) {
      $('.modal-message').modal();
      $('#submit_hapus').attr("href","{{url('buat_dupak')}}/hapus/"+id);
    }
    $("#table").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [0,8] }
      ]
    });    
    $(function () { 
    $("#iddupak").popover({
        title: 'Rincian Dupak', 
        content: "Silahkan CLick untuk melihat Rincian Data Dupak Yang Diajukan",
        trigger: 'hover',
        delay: {show: 0, hide: 1000}
    });  
  }); 
  </script>
@stop    