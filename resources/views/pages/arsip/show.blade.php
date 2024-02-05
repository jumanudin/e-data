@extends('layouts.app', ['title' => __('SPD Pegawai')])
@section('content')
@include('layouts.headers.cards') 
    <!-- Header -->
    <div class="header bg-primary pb-3">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Inbox Data Arsip </h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('arsip_trc') }}">Data Arsip ASN</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Dokumen</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--3"">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <p><b>Inbox Data Dokumen Personal ASN
                        </p>                                
                    </div>
                    <div class="card-body p-2 shadow">
                    <div class="col-md-12">                   
                    <div class="table-responsive">
                        <table id="table" class="table table-hover" style="width:100%;">
                        <thead >
                            <tr class="bg-success text-white">
                            <th colspan="2" width="10%">GROUP DOKUMEN</th>
                            <th width="10%"></th>
                            <th width="80%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0;@endphp
                            @foreach ($group as $key=> $value )                            
                                <tr data-toggle="collapse" data-target="#head{{++$i}}" class="accordion-toggle hover:bg-info bg-light flex">  
                                    <td><button class="btn btn-success btn-med"><i class="fas fa-eye" style='font-size:21px ;color:white;'></i></button></td>
                                    <td colspan="3"><b>{{ $key }} - {{ $value }}</b></td>
                                </tr>
                                <tr class="">
                                    <td colspan="4" class="hiddenRow">
                                        <div class="accordian-body collapse" id="head{{$i}}" >
                                            <table class="table table-striped table-hover" style="width:100%;" >
                                            <thead>
                                            <tr><td><a href="{{ route('arsip_trc.create',$key)}}" data-toggle="tooltip" title="Lihat Detailnya" class="btn btn-success btn-med"><i class="fas fa-plus" style='font-size:21px ;color:white;'></i></a></td></tr>    
                                            <tr class="bg-default" >
                                                <th class="text-white">JENIS</th>
                                                <th class="text-white">KETERANGAN</th>
                                                <th class="text-white">FILE</th>
                                                <th class="text-white">URL</th>
                                                <th class="text-white">ACTION</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach($data as $temp)
                                                @if ($key == $temp->group_id)
                                                <tr class="border-b border-gray-200 hover:bg-info">
                                                    <td>{{$temp->nama}}</td>
                                                    <td>{{$temp->keterangan}}</td>
                                                    <td ><a href="/arsip_trc/view/{{ Crypt::encryptString($temp->id)}}"  
                                                    data-toggle="tooltip" title="lihat dokumen">{{$temp->file}}</a></td>
                                                    <td ><a href="{{ $temp->url }}" target="_blank" data-toggle="tooltip" title="lihat dokumen cloude">{{$temp->url}}</a></td>
                                                    <td ><a href="/arsip_trc/edit/{{ Crypt::encryptString($temp->id)}}" class="btn btn-med btn-success">edit</a></td>  
                                                </tr>    
                                                @endif                                    
                                            @endforeach
                                            </tbody>
                                            </table>    
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
            @include('layouts.footers.auth') 
            </div>
        </div>
    </div> 
    @endsection       
@section('js')
  
@stop
   