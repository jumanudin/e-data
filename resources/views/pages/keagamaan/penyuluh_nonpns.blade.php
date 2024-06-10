@extends('layouts.app')
@push('style')
                    <!-- if(Helper::cek_level_akses('trans_madrasah_bezetting')->l)     -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
       
@endpush
@section('main')

<div class="main-content">
  <section class="section">
      <div class="section-header">
        <h3 >PENYULUH AGAMA NON PNS</h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('penyuluh_pns') }}">Layanan Keagamaan</a></div>
            <div class="breadcrumb-item">Data Penyuluh Agama NON PNS  </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data Penyuluh NON PNS Berdasarkan Agama Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_PenyuluhAgamaPNS')->l)     
                    <a class="nav-link {{request()->is('penyuluh_pns')?'active':null}}" id="islam-tab" data-toggle="tab" href="#islam" role="tab" aria-controls="" aria-selected="false">ISLAM</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_PenyuluhAgamaPNS')->l)   
                    <a class="nav-link" id="kristen-tab" data-toggle="tab" href="#kristen" role="tab" aria-controls="kristen" aria-selected="false">KRISTEN</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_PenyuluhAgamaPNS')->l)
                    <a class="nav-link" id="katolik-tab" data-toggle="tab" href="#katolik" role="tab" aria-controls="katolik" aria-selected="false">KATOLIK</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_PenyuluhAgamaPNS')->l)
                    <a class="nav-link" id="hindu-tab" data-toggle="tab" href="#hindu" role="tab" aria-controls="hindu" aria-selected="false">HINDU</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_PenyuluhAgamaPNS')->l)
                    <a class="nav-link" id="buddha-tab" data-toggle="tab" href="#buddha" role="tab" aria-controls="buddha" aria-selected="false">BUDDHA</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_PenyuluhAgamaPNS')->l)
                    <a class="nav-link" id="khonghucu-tab" data-toggle="tab" href="#khonghucu" role="tab" aria-controls="khonghucu" aria-selected="false">KHONGHUCU</a>
                    @endif
                    </li>
                </ul>    
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="islam" role="tabpanel" aria-labelledby="islam-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Penyuluh NON PNS Agama Islam Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-islam" class="table style table-striped table-hover tabel-islam" style="width:100%">
                                            <thead class="text-white">
                                            <tr class="text-center">
                                                    <th rowspan="2" >No</th>
                                                    <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                    <th colspan="2" >Jenis Kelamin</th>
                                                    <th rowspan="2" >Jumlah</th>
                                                    <th colspan="3" >Kualifikasi Pendidikan</th>
                                                    <th rowspan="2" >Jumlah</th>
                                                    
                                                </tr>
                                            <tr class="text-center">
                                                
                                                        <th>PRIA</th>
                                                        <th>WANITA</th>
                                                        <th>< S1</th>
                                                        <th>S1</th>
                                                        <th>S1 ></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                                @foreach ($data as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center"><a href="" class="nonpns_pria" data-type="number" data-name="nonpns_pria" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_pria) }}</a></td>
                                                    <td class="text-center"><a href="" class="nonpns_wanita" data-type="number" data-name="nonpns_wanita" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_wanita) }}</a></td>
                                                    <td class="text-center"><b>{{ number_format($temp->nonpns_pria+$temp->nonpns_wanita) }}</b></td>
                                                    <td class="text-center"><a href="" class="kurang_s1_non" data-type="number" data-name="kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->kurang_s1_non) }}</a></td>
                                                    <td class="text-center"><a href="" class="s1_non" data-type="number" data-name="s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->s1_non) }}</a></td>
                                                    <td class="text-center"><a href="" class="lebih_s1_non" data-type="number" data-name="kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->lebih_s1_non) }}</a></td>
                                                    <td class="text-center"><b>{{ number_format($temp->kurang_s1_non+$temp->s1_non+$temp->lebih_s1_non) }}</b></td>
                                                    
                                                                        
                                                </tr>
                                            @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                                </div>
                        </div>    
                    </div>


                        <div class="tab-pane fade" id="kristen" role="tabpanel" aria-labelledby="kristen-tab">
                            <div class="card card-success shadow">
                                    <div class="card-header">
                                        <div class="col-md-6 text-left mb-0 ">
                                            <h4>Data Penyuluh NON PNS Agama Kristen Tahun {{ $tempstruk->tahun_priode }}</h4>
                                        </div>
                                    </div>

                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="tabel-kristen" class="table style table-striped table-hover tabel-kristen" style="width:100%">
                                                        <thead class="text-white">
                                                        <tr class="text-center">
                                                                <th rowspan="2" >No</th>
                                                                <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                                <th colspan="2" >Jenis Kelamin</th>
                                                                <th rowspan="2" >Jumlah</th>
                                                                <th colspan="3" >Kualifikasi Pendidikan</th>
                                                                <th rowspan="2" >Jumlah</th>
                                                                
                                                            </tr>
                                                        <tr class="text-center">
                                                            
                                                                    <th>PRIA</th>
                                                                    <th>WANITA</th>
                                                                    <th>< S1</th>
                                                                    <th>S1</th>
                                                                    <th>S1 ></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="list bg-light">
                                                        @foreach ($datakristen as $tempkristen)
                                                <tr >
                                                    <td class="text-center">{{ $tempkristen->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $tempkristen->nama }}</td>
                                                    <td class="text-center"><a href="" class="kristen_nonpns_pria" data-type="number" data-name="kristen_nonpns_pria" data-pk="{{$tempkristen->id}}">{{ number_format($tempkristen->nonpns_pria) }}</a></td>
                                                    <td class="text-center"><a href="" class="kristen_nonpns_wanita" data-type="number" data-name="kristen_nonpns_wanita" data-pk="{{$tempkristen->id}}">{{ number_format($tempkristen->nonpns_wanita) }}</a></td>
                                                    <td class="text-center"><b>{{ number_format($tempkristen->nonpns_pria+$tempkristen->nonpns_wanita) }}</b></td>
                                                    <td class="text-center"><a href="" class="kristen_kurang_s1_non" data-type="number" data-name="kristen_kurang_s1_non" data-pk="{{$tempkristen->id}}">{{ number_format($tempkristen->kurang_s1_non) }}</a></td>
                                                    <td class="text-center"><a href="" class="kristen_s1_non" data-type="number" data-name="kristen_s1_non" data-pk="{{$tempkristen->id}}">{{ number_format($tempkristen->s1_non) }}</a></td>
                                                    <td class="text-center"><a href="" class="kristen_lebih_s1_non" data-type="number" data-name="kristen_kurang_s1_non" data-pk="{{$tempkristen->id}}">{{ number_format($tempkristen->lebih_s1_non) }}</a></td>
                                                    <td class="text-center"><b>{{ number_format($tempkristen->kurang_s1_non+$tempkristen->s1_non+$tempkristen->lebih_s1_non) }}</b></td>
                                                    
                                                                        
                                                </tr>
                                            @endforeach 
                                                        </tbody>
                                                        </table>
                                                </div>                            
                                            </div>                                                                
                                        </div>
                            </div>
                        </div>

                            <div class="tab-pane fade" id="katolik" role="tabpanel" aria-labelledby="katolik-tab">
                                <div class="card card-success show">
                                    <div class="card-header">
                                        <div class="col-md-6 text-left mb-0 ">
                                            <h4>Data Penyuluh NON PNS Agama Katolik Tahun {{ $tempstruk->tahun_priode }}</h4>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">       
                                                <table id="tabel-katolik" class="table style table-striped table-hover tabel-katolik" style="width:100%">
                                                    <thead class="text-white">
                                                    <tr class="text-center">
                                                            <th rowspan="2" >No</th>
                                                            <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                            <th colspan="2" >Jenis Kelamin</th>
                                                            <th rowspan="2" >Jumlah</th>
                                                            <th colspan="3" >Kualifikasi Pendidikan</th>
                                                            <th rowspan="2" >Jumlah</th>
                                                            
                                                        </tr>
                                                    <tr class="text-center">
                                                        
                                                                <th>PRIA</th>
                                                                <th>WANITA</th>
                                                                <th>< S1</th>
                                                                <th>S1</th>
                                                                <th>S1 ></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list bg-light">
                                            @foreach ($datakatolik as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center"><a href="" class="katolik_nonpns_pria" data-type="number" data-name="katolik_nonpns_pria" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_pria) }}</a></td>
                                                    <td class="text-center"><a href="" class="katolik_nonpns_wanita" data-type="number" data-name="katolik_nonpns_wanita" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_wanita) }}</a></td>
                                                    <td class="text-center"><b>{{ number_format($temp->nonpns_pria+$temp->nonpns_wanita) }}</b></td>
                                                    <td class="text-center"><a href="" class="katolik_kurang_s1_non" data-type="number" data-name="katolik_kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->kurang_s1_non) }}</a></td>
                                                    <td class="text-center"><a href="" class="katolik_s1_non" data-type="number" data-name="katolik_s1" data-pk="{{$temp->id}}">{{ number_format($temp->s1_non) }}</a></td>
                                                    <td class="text-center"><a href="" class="katolik_lebih_s1_non" data-type="number" data-name="katolik_kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->lebih_s1_non) }}</a></td>
                                                    <td class="text-center"><b>{{ number_format($temp->kurang_s1_non+$temp->s1_non+$temp->lebih_s1_non) }}</b></td>
                                                    
                                                                        
                                                </tr>
                                            @endforeach 
                                                    </tbody>
                                                </table>
                                            </div>                                                
                                        </div>
                                </div>
                            </div> 

                            <!-- ------------------------------- Hindu --------------------------------------  -->

                            <div class="tab-pane fade" id="hindu" role="tabpanel" aria-labelledby="hindu-tab">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <div class="col-md-6 text-left mb-0 ">
                                            <h4>Data Penyuluh NON PNS Agama Hindu Tahun {{ $tempstruk->tahun_priode }}</h4>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">       
                                                <table id="tabel-hindu" class="table style table-striped table-hover tabel-hindu" style="width:100%">
                                                    <thead class="text-white">
                                                    <tr class="text-center">
                                                            <th rowspan="2" >No</th>
                                                            <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                            <th colspan="2" >Jenis Kelamin</th>
                                                            <th rowspan="2" >Jumlah</th>
                                                            <th colspan="3" >Kualifikasi Pendidikan</th>
                                                            <th rowspan="2" >Jumlah</th>
                                                            
                                                        </tr>
                                                    <tr class="text-center">
                                                        
                                                                <th>PRIA</th>
                                                                <th>WANITA</th>
                                                                <th>< S1</th>
                                                                <th>S1</th>
                                                                <th>S1 ></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list bg-light">

                                                    @foreach ($datahindu as $temp)
                                                        <tr >
                                                            <td class="text-center">{{ $temp->idx}}</td>
                                                            <!-- <td>{{ $temp->id }}</td> -->
                                                            <td>{{ $temp->nama }}</td>
                                                            <td class="text-center"><a href="" class="hindu_nonpns_pria" data-type="number" data-name="hindu_nonpns_pria" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_pria) }}</a></td>
                                                            <td class="text-center"><a href="" class="hindu_nonpns_wanita" data-type="number" data-name="hindu_nonpns_wanita" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_wanita) }}</a></td>
                                                            <td class="text-center"><b>{{ number_format($temp->nonpns_pria+$temp->nonpns_wanita) }}</b></td>
                                                            <td class="text-center"><a href="" class="hindu_kurang_s1_non" data-type="number" data-name="hindu_kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->kurang_s1_non) }}</a></td>
                                                            <td class="text-center"><a href="" class="hindu_s1_non" data-type="number" data-name="hindu_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->s1_non) }}</a></td>
                                                            <td class="text-center"><a href="" class="hindu_lebih_s1_non" data-type="number" data-name="hindu_kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->lebih_s1_non) }}</a></td>
                                                            <td class="text-center"><b>{{ number_format($temp->kurang_s1_non+$temp->s1_non+$temp->lebih_s1_non) }}</b></td>
                                                                                     
                                                        </tr>
                                                    @endforeach 
                                                    </tbody>
                                                </table>
                                            </div>                                                
                                        </div>
                                </div>
                            </div> 

                            <!-- ------------------------------- Buddha--------------------------------------  -->

                            <div class="tab-pane fade" id="buddha" role="tabpanel" aria-labelledby="buddha-tab">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <div class="col-md-6 text-left mb-0 ">
                                            <h4>Data Penyuluh NON PNS Agama Buddha Tahun {{ $tempstruk->tahun_priode }}</h4>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">       
                                                <table id="tabel-buddha" class="table style table-striped table-hover tabel-buddha" style="width:100%">
                                                    <thead class="text-white">
                                                    <tr class="text-center">
                                                            <th rowspan="2" >No</th>
                                                            <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                            <th colspan="2" >Jenis Kelamin</th>
                                                            <th rowspan="2" >Jumlah</th>
                                                            <th colspan="3" >Kualifikasi Pendidikan</th>
                                                            <th rowspan="2" >Jumlah</th>
                                                            
                                                        </tr>
                                                    <tr class="text-center">
                                                        
                                                                <th>PRIA</th>
                                                                <th>WANITA</th>
                                                                <th>< S1</th>
                                                                <th>S1</th>
                                                                <th>S1 ></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list bg-light">
                                                    @foreach ($databuddha as $temp)
                                                        <tr >
                                                            <td class="text-center">{{ $temp->idx}}</td>
                                                            <!-- <td>{{ $temp->id }}</td> -->
                                                            <td>{{ $temp->nama }}</td>
                                                            <td class="text-center"><a href="" class="buddha_nonpns_pria" data-type="number" data-name="buddha_nonpns_pria" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_pria) }}</a></td>
                                                            <td class="text-center"><a href="" class="buddha_nonpns_wanita" data-type="number" data-name="buddha_nonpns_wanita" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_wanita) }}</a></td>
                                                            <td class="text-center"><b>{{ number_format($temp->nonpns_pria+$temp->nonpns_wanita) }}</b></td>non
                                                            <td class="text-center"><a href="" class="buddha_kurang_s1_non" data-type="number" data-name="buddha_kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->kurang_s1_non) }}</a></td>
                                                            <td class="text-center"><a href="" class="buddha_s1_non" data-type="number" data-name="buddha_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->s1_non) }}</a></td>
                                                            <td class="text-center"><a href="" class="buddha_lebih_s1_non" data-type="number" data-name="buddha_kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->lebih_s1_non) }}</a></td>
                                                            <td class="text-center"><b>{{ number_format($temp->kurang_s1_non+$temp->s1_non+$temp->lebih_s1_non) }}</b></td>
                                                                                     
                                                        </tr>
                                                    @endforeach 
                                                    </tbody>
                                                </table>
                                            </div>                                                
                                        </div>
                                </div>
                            </div> 


                            <!-- ------------------------------- Khonghucu --------------------------------------  -->

                            <div class="tab-pane fade" id="khonghucu" role="tabpanel" aria-labelledby="khonghucu-tab">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <div class="col-md-6 text-left mb-0 ">
                                            <h4>Data Penyuluh NON PNS Agama Khonghucu Tahun {{ $tempstruk->tahun_priode }}</h4>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">       
                                                <table id="tabel-khonghucu" class="table style table-striped table-hover tabel-khonghucu" style="width:100%">
                                                    <thead class="text-white">
                                                    <tr class="text-center">
                                                            <th rowspan="2" >No</th>
                                                            <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                            <th colspan="2" >Jenis Kelamin</th>
                                                            <th rowspan="2" >Jumlah</th>
                                                            <th colspan="3" >Kualifikasi Pendidikan</th>
                                                            <th rowspan="2" >Jumlah</th>
                                                            
                                                        </tr>
                                                    <tr class="text-center">
                                                        
                                                                <th>PRIA</th>
                                                                <th>WANITA</th>
                                                                <th>< S1</th>
                                                                <th>S1</th>
                                                                <th>S1 ></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list bg-light">
                                                    @foreach ($datakhonghucu as $temp)
                                                        <tr >
                                                            <td class="text-center">{{ $temp->idx}}</td>
                                                            <!-- <td>{{ $temp->id }}</td> -->
                                                            <td>{{ $temp->nama }}</td>
                                                            <td class="text-center"><a href="" class="khonghucu_nonpns_pria" data-type="number" data-name="khonghucu_nonpns_pria" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_pria) }}</a></td>
                                                            <td class="text-center"><a href="" class="khonghucu_nonpns_wanita" data-type="number" data-name="khonghucu_nonpns_wanita" data-pk="{{$temp->id}}">{{ number_format($temp->nonpns_wanita) }}</a></td>
                                                            <td class="text-center"><b>{{ number_format($temp->nonpns_pria+$temp->nonpns_wanita) }}</b></td>
                                                            <td class="text-center"><a href="" class="khonghucu_kurang_s1_non" data-type="number" data-name="khonghucu_kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->kurang_s1_non) }}</a></td>
                                                            <td class="text-center"><a href="" class="khonghucu_s1_non" data-type="number" data-name="khonghucu_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->s1_non) }}</a></td>
                                                            <td class="text-center"><a href="" class="khonghucu_lebih_s1_non" data-type="number" data-name="khonghucu_kurang_s1_non" data-pk="{{$temp->id}}">{{ number_format($temp->lebih_s1_non) }}</a></td>
                                                            <td class="text-center"><b>{{ number_format($temp->kurang_s1_non+$temp->s1_non+$temp->lebih_s1_non) }}</b></td>
                                                                                     
                                                        </tr>
                                                    @endforeach 
                                                    </tbody>
                                                </table>
                                            </div>                                                
                                        </div>
                                </div>
                            </div> 

                            <!-- --- ./div tab content --   -->
                    </div>

                    

                    
                    
                     
            </div>    
        </div>                               
    </div>
   </div>
</div>  
</div>
@endsection
@push('scripts')
    <script src="{{ asset('library/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>    
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
    <script>
       
        $.ajaxSetup({
            header:{
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            }
        });

    
      </script>

    <script type="text/javascript">
    $.fn.editable.defaults.mode="inline";
        $.fn.editable.defaults.params = function (params) {
        params._token = $("meta[name=_token]").attr("content");
        return params;
    };

    $(document).ready(function () {
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });
        let nf = new Intl.NumberFormat('en-US');
        
        // ------------------------------ Tabel Islam    

            $("#tabel-islam").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Penyuluh Islam ---------------------------------- 

       
            $('.nonpns_pria').editable({
                url:"update_penyuluhislam/nonpns_pria",
                type:'number',
                pk:1,
                name:'pns_pria',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.nonpns_wanita').editable({
                url:"update_penyuluhislam/nonpns_wanita",
                type:'number',
                pk:1,
                name:'pns_wanita',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.kurang_s1_non').editable({
                url:"update_penyuluhislam/kurang_s1_non",
                type:'number',
                pk:1,
                name:'kurang_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.s1_non').editable({
                url:"update_penyuluhislam/s1_non",
                type:'number',
                pk:1,
                name:'s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.lebih_s1_non').editable({
                url:"update_penyuluhislam/lebih_s1_non",
                type:'number',
                pk:1,
                name:'lebih_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

        // ------------------------------- Tabel Kristen -------------------------------------- 
                    
            $("#tabel-kristen").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });   
        
        

            
        // ---------------- untuk menghendle Penyuluh PNS Kristen ------------------------- 

        $('.kristen_nonpns_pria').editable({
             url:"update_penyuluhkristen/nonpns_pria",
             type:'number',
             pk:1,
            name:'pns_pria',
            title:'Masukkan Jumlah',
             ajaxOptions: {
                 type: 'post'
            },
             validate: function(value) {
                if($.trim(value) == '') {
                    return 'Data Tidak Boleh Kosong';
                }
                
            },
             success: function(response, newValue) {
              location.reload(true);
               }
            

        });

        $('.kristen_nonpns_wanita').editable({
                url:"update_penyuluhkristen/nonpns_wanita",
                type:'number',
                pk:1,
                name:'pns_wanita',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.kristen_kurang_s1_non').editable({
                url:"update_penyuluhkristen/kurang_s1_non",
                type:'number',
                pk:1,
                name:'kurang_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.kristen_s1_non').editable({
                url:"update_penyuluhkristen/s1_non",
                type:'number',
                pk:1,
                name:'s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.kristen_lebih_s1_non').editable({
                url:"update_penyuluhkristen/lebih_s1_non",
                type:'number',
                pk:1,
                name:'lebih_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });



        // ------------------------------ End Tabel Kristen -------------------------------------
          

          
        // ------------------------------- Tabel Katolik -------------------------------------- 

            $("#tabel-katolik").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });   



            // ---------------- untuk menghendle Penyuluh PNS Katolik ------------------------- 

        $('.katolik_nonpns_pria').editable({
             url:"update_penyuluhkatolik/nonpns_pria",
             type:'number',
             pk:1,
            name:'pns_pria',
            title:'Masukkan Jumlah',
             ajaxOptions: {
                 type: 'post'
            },
             validate: function(value) {
                if($.trim(value) == '') {
                    return 'Data Tidak Boleh Kosong';
                }
                
            },
             success: function(response, newValue) {
              location.reload(true);
               }
            

        });

        $('.katolik_nonpns_wanita').editable({
                url:"update_penyuluhkatolik/nonpns_wanita",
                type:'number',
                pk:1,
                name:'pns_wanita',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.katolik_kurang_s1_non').editable({
                url:"update_penyuluhkatolik/kurang_s1_non",
                type:'number',
                pk:1,
                name:'kurang_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.katolik_s1_non').editable({
                url:"update_penyuluhkatolik/s1_non",
                type:'number',
                pk:1,
                name:'s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.katolik_lebih_s1_non').editable({
                url:"update_penyuluhkatolik/lebih_s1_non",
                type:'number',
                pk:1,
                name:'lebih_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

        // ------------------------------- Tabel Hindu -------------------------------------- 

        $("#tabel-hindu").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });   


        // ---------------- untuk menghendle Penyuluh PNS Hindu ------------------------- 

        $('.hindu_nonpns_pria').editable({
             url:"update_penyuluhhindu/nonpns_pria",
             type:'number',
             pk:1,
            name:'pns_pria',
            title:'Masukkan Jumlah',
             ajaxOptions: {
                 type: 'post'
            },
             validate: function(value) {
                if($.trim(value) == '') {
                    return 'Data Tidak Boleh Kosong';
                }
                
            },
             success: function(response, newValue) {
              location.reload(true);
               }
            

        });

        $('.hindu_nonpns_wanita').editable({
                url:"update_penyuluhhindu/nonpns_wanita",
                type:'number',
                pk:1,
                name:'pns_wanita',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.hindu_kurang_s1_non').editable({
                url:"update_penyuluhhindu/kurang_s1_non",
                type:'number',
                pk:1,
                name:'kurang_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.hindu_s1_non').editable({
                url:"update_penyuluhhindu/s1_non",
                type:'number',
                pk:1,
                name:'s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.hindu_lebih_s1_non').editable({
                url:"update_penyuluhhindu/lebih_s1_non",
                type:'number',
                pk:1,
                name:'lebih_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

        // ------------------------------- Tabel Buddha-------------------------------------- 

        $("#tabel-buddha").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });   
        
         // ---------------- untuk menghendle Penyuluh PNS Buddha------------------------- 

         $('.buddha_nonpns_pria').editable({
             url:"update_penyuluhbuddha/nonpns_pria",
             type:'number',
             pk:1,
            name:'pns_pria',
            title:'Masukkan Jumlah',
             ajaxOptions: {
                 type: 'post'
            },
             validate: function(value) {
                if($.trim(value) == '') {
                    return 'Data Tidak Boleh Kosong';
                }
                
            },
             success: function(response, newValue) {
              location.reload(true);
               }
            

        });

        $('.buddha_nonpns_wanita').editable({
                url:"update_penyuluhbuddha/nonpns_wanita",
                type:'number',
                pk:1,
                name:'pns_wanita',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.buddha_kurang_s1_non').editable({
                url:"update_penyuluhbuddha/kurang_s1_non",
                type:'number',
                pk:1,
                name:'kurang_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.buddha_s1_non').editable({
                url:"update_penyuluhbuddha/s1_non",
                type:'number',
                pk:1,
                name:'s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.buddha_lebih_s1_non').editable({
                url:"update_penyuluhbuddha/lebih_s1_non",
                type:'number',
                pk:1,
                name:'lebih_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

        // ------------------------------- Tabel Khonghucu -------------------------------------- 

        $("#tabel-khonghucu").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });   

     
           
         // ---------------- untuk menghendle Penyuluh PNS Khonghucu------------------------- 

         $('.khonghucu_nonpns_pria').editable({
             url:"update_penyuluhkhonghucu/nonpns_pria",
             type:'number',
             pk:1,
            name:'pns_pria',
            title:'Masukkan Jumlah',
             ajaxOptions: {
                 type: 'post'
            },
             validate: function(value) {
                if($.trim(value) == '') {
                    return 'Data Tidak Boleh Kosong';
                }
                
            },
             success: function(response, newValue) {
              location.reload(true);
               }
            

        });

        $('.khonghucu_nonpns_wanita').editable({
                url:"update_penyuluhkhonghucu/nonpns_wanita",
                type:'number',
                pk:1,
                name:'pns_wanita',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.khonghucu_kurang_s1_non').editable({
                url:"update_penyuluhkhonghucu/kurang_s1_non",
                type:'number',
                pk:1,
                name:'kurang_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.khonghucu_s1_non').editable({
                url:"update_penyuluhkhonghucu/s1_non",
                type:'number',
                pk:1,
                name:'s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });

            $('.khonghucu_lebih_s1_non').editable({
                url:"update_penyuluhkhonghucu/lebih_s1_non",
                type:'number',
                pk:1,
                name:'lebih_s1',
                title:'Masukkan Jumlah',
                ajaxOptions: {
                    type: 'post'
                },
                validate: function(value) {
                    if($.trim(value) == '') {
                        return 'Data Tidak Boleh Kosong';
                    }
                    
                },
                success: function(response, newValue) {
                location.reload(true);
                }
                

            });           

           
       

        function formatErrorMessage(jqXHR, exception) {

                    if (jqXHR.status === 0) {
                        return ('Not connected.\nPlease verify your network connection.');
                    } else if (jqXHR.status == 404) {
                        return ('The requested page not found. [404]');
                    } else if (jqXHR.status == 500) {
                        return ('Internal Server Error [500].');
                    } else if (exception === 'parsererror') {
                        return ('Requested JSON parse failed or No Access Allowed. Please to Contact Administrator..!');
                    } else if (exception === 'timeout') {
                        return ('Time out error.');
                    } else if (exception === 'abort') {
                        return ('Ajax request aborted.');
                    } else {
                        return ('Uncaught Error.\n' + jqXHR.responseText);
                    }
            }  
        });  
</script>


@endpush 