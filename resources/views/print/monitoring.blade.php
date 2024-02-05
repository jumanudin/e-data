@extends('layouts.app', ['title' => __('SPD Pegawai')])
@section('content')
@include('layouts.headers.cards') 
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Data SPD </h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('report_spd') }}">Report Data SPD</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Monitoing</li>
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
                <div class="card">
                    <div class="card-header">
                        <p><b>Data SPD adalah data pegawai yang melakukan perjalanan dinas baik dalam maupun luar kota yang sudah di setujui oleh Kepala Satker
                        </p>                                
                    </div>
                    <div class="card-body p-2">
                    {{ Form::open(['url'=>'report_spd/query_tgl', 'class' => 'form-horizontal', 'method'=>'GET']) }}
                    <div class="col-md-12 text-left mt-2 row">
                        <div class="col-md-2 form-group mt-2 mt-md-0 ">
                            <label >Tanggal Awal :</label>
                            <input type = "date" id="tgl1" name="tgl1" class="form-control" data-placeholder="Pilih Tanggal Awal">
                        </div>
                        <div class="col-md-4 form-group mt-2 mt-md-0 ">
                            <label >Tanggal Akhir :</label>
                            <div class="row"> 
                                <div class="col-md-6">
                                <input type = "date" id="tgl2" name="tgl2" class="form-control" data-placeholder="Pilih Tanggal Akhir">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-lg btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>                            
                    {{ Form::close()}}
                    <div class="col-md-12">                   
                    <div class="table-responsive">
                        <table id="table" class="table table-hover" style="width:100%;">
                        <thead >
                            <tr class="bg-primary" >
                            <th class="text-white"></th>
                            <th class="text-white">Tanggal Dinas</th>
                            <th class="text-white">Maksud Dinas</th>
                            <th colspan="2" class="text-white">Unit Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($master as $item)                            
                                <tr data-toggle="collapse" data-target="#head{{++$i}}" class="accordion-toggle border-b border-gray-200 hover:bg-info bg-info">  
                                    <td><button class="btn btn-default btn-xs"><i class="fas fa-eye" style='font-size:21px ;color:red;'></i></button></td>
                                    <td style="font-size:12pt;white-space: normal !important;"><b>{{ Helper::tgl_indo($item->tgl_pergi)}} s/d {{ Helper::tgl_indo($item->tgl_pulang)}}</b></td>
                                    <td style="white-space: normal !important;">{{ $item->maksud_spd}}</td>
                                    <td colspan="2" style="white-space: normal !important;">{{ $item->dari}}</td>
                                </tr>
                                <tr>
                                    <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="head{{$i}}" >
                                            <table class="table table-striped table-hover" style="width:100%;" >
                                                <tr class="info" align="left">
                                                    <td style="font-size:12pt;"><b class="badge badge-pill btn-primary">Nomor SPD : </b> {{$item->nomor_spd}}</td>
                                                </tr>
                                                <tr class="info" align="left">
                                                    <td style="font-size:12pt;"><b class="badge badge-pill btn-primary">Maksud SPD : </b> {{$item->maksud_spd}}</td>
                                                </tr>
                                                <tr class="info" align="left">
                                                    @php $kereta = ""; @endphp
                                                    @foreach($kendaraan as $motor)
                                                        @if($motor->id==$item->kendaraan)
                                                        @php
                                                            $kereta = $motor->nama;
                                                        @endphp   
                                                        @endif 
                                                    @endforeach    
                                                    <td style="font-size:12pt;"><b class="badge badge-pill btn-primary">Kendaraan yang digunakan : </b> {{is_null($kereta) ? "" : $kereta }}</td>
                                                </tr>
                                                <tr class="info" align="left">
                                                    <td style="font-size:12pt;"><b class="badge badge-pill btn-primary">Tempat Berangkat : </b> {{$item->tempat_berangkat}}</td>
                                                </tr>
                                                <tr class="info" align="left">
                                                    <td style="font-size:12pt;"><b class="badge badge-pill btn-primary">Tempat Tujuan : </b> {{$item->tempat_tujuan}}</td>
                                                </tr>
                                            </table>    
                                        </div>    
                                    </td>
                                </tr>                                        
                                <tr class="bg-default" >
                                    <th class="text-white bg-white"><i class="fa fa-users" style="font-size:16pt; color:rgb(135, 77, 6);"></i></th>
                                    <th class="text-white">Photo</th>
                                    <th class="text-white">NIP - Nama</th>
                                    <th class="text-white">Pangkat - Gol</th>
                                    <th class="text-white">Unit Kerja</th>
                                </tr>
                                @php $j=0; $golongan="" ;@endphp
                                @foreach($rinci as $temp)
                                    @if ($item->id==$temp->id_master)
                                    @foreach($gol as $gols)
                                    @if($temp->kode_golongan == $gols->gol)
                                    @php
                                        $golongan = $gols->pangkat.' '.$gols->gol;
                                    @endphp
                                    @endif
                                    @endforeach    
                                    <tr class="border-b border-gray-200 hover:bg-info">
                                        <td></td>
                                        <td><span class="avatar avatar-lg rounded-circle"><img src="{{asset('storage/'.$temp->imagex)}}"></span></td>
                                        <td><b>{{$temp->nip}} - {{$temp->nama}} </b> - {{$temp->jabatan}} </td>
                                        <td>{{$golongan}}</td>
                                        <td>{{$temp->nama_unit}}</td>
                                    </tr>    
                                    @endif                                    
                                @endforeach
                            @endforeach
                        </tbody>
                        </table>
                    </div>                            
                    </div>
                </div>
            </div>            
            @include('layouts.footers.auth') 
            </div>
        </div>
    </div> 
    @endsection       
@section('js')
  
@stop
   