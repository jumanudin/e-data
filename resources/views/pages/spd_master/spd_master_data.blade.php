@extends('layouts.app', ['title' => __('SPD Pegawai')])
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
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Data Kontrol TS Kepala </h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('spd_master') }}">Setup SPD Master</a></li>
                  <li class="breadcrumb-item active" aria-current="page">SPD Setup</li>
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
                            <h3 class="mb-0">Inbox Data Kontrol TS Kepala</h3>
                        </div>
                    </div>
                </div> 
                <div class="card-body p-2">
                <div class="table-responsive">
                        <table class="table table-striped" id="table">
                          <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Tgl Buat TS</th>
                                <th>Dari</th>
                                <th style="width:50%;">Perihal</th>                                                        
                                <th>Status<br> Verifikator</th>                                                            
                                <th>Status TS</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                            <tbody class="list">
                              @php   
                              $status="";  
                              $status_ver="";$lbl_kirim="";
                            @endphp                        
                            @foreach ($veri as $temp) 
                            @if ($temp->status==0) 
                                @php $status = "Draf TS"; $stat_ts = "btn-warning";@endphp
                            @endif 
                            @if ($temp->status==1) 
                                @php $status = "Disetujui"; $stat_ts = "btn-success"; @endphp
                              
                            @endif 
                            @if ($temp->status==2) 
                                @php $status = "Revisi"; $stat_ts = "btn-info";@endphp
                                
                            @endif
                            @if($temp->status==3) 
                                @php $status = "Ditolak"; $stat_ts = "btn-danger";@endphp
                              
                            @endif 
                            @if ($temp->status_verifikator==0) 
                            @php $status_ver = "Belum"; $stat_lbl = "btn-primary";@endphp
                            @endif
                            @if ($temp->status_verifikator==1) 
                                @php $status_ver = "Disetujui" ;$stat_lbl = "btn-success"; @endphp
                              
                            @endif 
                            @if ($temp->status_verifikator==2) 
                                @php $status_ver = "Revisi"; $stat_lbl = "btn-info";@endphp
                                
                            @endif
                            @if($temp->status_verifikator==3) 
                            @php $status_ver = "Ditolak"; $stat_lbl = "btn-danger";@endphp
                            
                            @endif 
    
                            @php ($lbl_kirim==1) ? $lbl_kirim="btn-info" : $lbl_kirim="btn-danger";  
                            @endphp    
                              <tr class=" hover:bg-black-100">
                                  <td class="text-center">{{ ++$i}}</td>
                                  <td>{{ date('d-m-Y',strtotime($temp->tgl)) }}</td>
                                  <td style="white-space: normal !important;">{{ $temp->dari }}</td>
                                  <td style="white-space: normal !important;">{{ $temp->perihal }}</td>                                  
                                  <td><span class="badge badge-pill badge-med {{$stat_lbl}}">{{ $status_ver }}</span></td>                                        
                                  <td><span class="badge badge-med badge-pill {{$stat_ts}}">{{ $status }}</span></td>                                 
                                  <td class="text-right">
                                        <a style="cursor: pointer;" class="dropdown-item" onclick="window.location.href='{{ route('spd_master.lihat', Crypt::encryptString($temp->id))}}'">
                                        <i class="fas fa-eye" style='font-size:21px ;color:red;'></i></a>
                                    </td>                                
                              </tr>
                            @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div> 
                @include('layouts.footers.auth')          
            </div> 
            @endsection

    @section('js')
      <script type="text/javascript">
        $("#table").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [0,7] }
          ],pagingType: 'first_last_numbers',
        });          
      </script>
    @stop       

