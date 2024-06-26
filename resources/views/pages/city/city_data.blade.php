@extends('layouts.app')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('main')
<div class="main-content">
  <section class="section">
      <div class="section-header">
        <h3 >Data Kabupaten Kota</h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('city') }}">Data Kabupaten Kota</a></div>
            <div class="breadcrumb-item">Inbox Data  </div>
        </div>
      </div>
  </section>    

  <div class="row">
    <div class="col"> 
    <div class="card shadow">
        <div class="card-header bg-succes border">
          <div class="row col-12 align-items-center">
              <div class="col-8">
                  <h3 class=" mb-0">List Data</h3>
              </div>
              <div class="col-4 text-right">
                  <a href="{{ route('city.create') }}" class="btn btn-sm btn-primary">Tambah</a>
              </div>
          </div>
        </div>      
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="table">
            <thead class="text-white">
              <tr>
                <th class="text-center">No
                </th>
                <th>Nama Kabupaten/Kota</th>
                <th>Nama Ibu Kota</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="list bg-light">
            @foreach ($data as $temp)
              <tr class="border-b border-gray-200 hover:bg-gray-200">
                <td class="text-center">{{ ++$i}}</td>
                <td>{{ $temp->nama }}</td>
                <td>{{ $temp->ibukota }}</td>
                <td class="py-3 px-6 text-center"><div class="flex item-center justify-center">
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-125">
                <a role="button" href="/city/edit/{{ $temp->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a></div>
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-125">
                <a role="button" href="javascript:;" onclick="open_modal('{{($temp->id)}}')" ><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </div></div></td>                            
              </tr>
              @endforeach 
            </tbody>
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
      $('#submit_hapus').attr("href","{{url('city')}}/hapus/"+id);
    }
    $("#table").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [0,4] }
      ]
    });         
  </script>
@endpush    
