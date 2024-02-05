@extends('layouts.app', ['title' => __('Kegiatan')])
<style>
  .table.dataTable th{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
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
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Pegawai</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Pegawai</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Pegawai Data</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid mt--7"">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Daftar Pegawai</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('pegawai.create') }}"class="btn btn-med btn-primary">Tambah Pegawai</a>
                        </div>
                    </div>
                </div> 
                <div class="card-body p-2">
                <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead class="bg-default text-white">
                                  <tr>
                                      <th class="text-center">No</th>
                                      <th>Photo</th>
                                      <th>nip</th>
                                      <th>nama</th>
                                      <th>Pangkat/Golongan</th>
                                      <th>jabatan</th>
                                      <th>status_kepeg</th>                                      
                                      <th>nama_unit</th>                                
                                      <th>Action</th>
                                  </tr>
                            </thead>
                            <tbody class="list">
                                    @foreach ($data as $temp)
                                      @php 
                                      $pangkat= '';$namaunit='';$nama_jabatan="";
                                      @endphp
                                      @foreach ($panggol as $gol)
                                      @if($temp->kode_golongan==$gol->gol)
                                      @php
                                             $pangkat =  $gol->pangkat . '-' .$gol->gol;
                                      @endphp
                                      @endif
                                      @endforeach
                                      @foreach ($unit as $unitkerja)
                                      @if ($temp->unit_id ==$unitkerja->id)
                                      @php
                                          $namaunit =  $unitkerja->nama_unit;
                                      @endphp
                                      @endif
                                      @endforeach
                                      @foreach($jabatan as $jab)
                                      @if($temp->kode_jabatan==$jab->id)
                                      @php
                                        $nama_jabatan = $jab->nama_jabatan;
                                      @endphp  
                                      @endif
                                      @endforeach
                                    <tr class="border-b border-gray-200 hover:bg-black-100">
                                        <td class="text-center">{{ ++$i}}</td>
                                        <td><span class="avatar avatar-sm rounded-circle">
                                          <img alt="Image placeholder" src="{{ asset('storage/'.$temp->image) }}" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$temp->no_hp}}">
                                      </span></td>
                                        <td>{{ $temp->nip }}</td>
                                        <td>{{ $temp->nama }}</td>
                                        <td>{{ $pangkat }}</td>
                                        <td style="white-space: normal !important;">{{ $nama_jabatan }}</td>
                                        <td>{{ $temp->status_kepeg }}</td>                                        
                                        <td style="white-space: normal !important;">{{ $namaunit }}</td>                                        
                                        <td class="text-right">
                                         <div class="dropdown">
                                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="fas fa-ellipsis-v"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                             <a class="dropdown-item" href="/pegawai/edit/{{ Crypt::encryptString($temp->id) }}">Edit Data</a>
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
                @include('layouts.footers.auth')          
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
    @section('js')
      <script type="text/javascript">
        function open_modal(id) {
          $('.modal-message').modal();
          $('#submit_hapus').attr("href","{{url('pegawai')}}/hapus/"+id);
        }
        $("#table").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [0,7] }
          ],
          pagingType: 'first_last_numbers',
        });          
      </script>
    @stop       

