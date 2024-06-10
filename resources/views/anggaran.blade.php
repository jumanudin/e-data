@extends('layouts.web', ['title' => __('DATA ANGGARAN')])
@push('style')
                    <!-- if(Helper::cek_level_akses('trans_madrasah_bezetting')->l)     -->
    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"> -->

    <link href="{{ asset('web/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>

   
    <link href="{{ asset('web/css/buttons.dataTables.min.css') }}" rel="stylesheet"> 
       
@endpush
@section ('hero')
<section id="hore" class="d-flex align-items-center mbr-section" >
            <div class="container" >         
            
            </div>
          </section><!-- End Hero -->
@endsection
@section('main')

            <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link {{request()->is('tatakelola_anggaran')?'active':null}}" id="grafik-tab" data-toggle="tab" href="#grafik" role="tab" aria-controls="" aria-selected="false">Chart</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="anggaran-tab" data-toggle="tab" href="#anggaran" role="tab" aria-controls="" aria-selected="false">Anggaran</a>
                            </li>
                            <li class="nav-item">     
                            <a class="nav-link" id="realisasi_program-tab" data-toggle="tab" href="#realisasi_program" role="tab" aria-controls="" aria-selected="false">Anggaran Menurut Program</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="realisasi_belanja-tab" data-toggle="tab" href="#realisasi_belanja" role="tab" aria-controls="" aria-selected="false">Anggaran Menurut Jenis Belanja</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " id="realisasi_sumberdana-tab" data-toggle="tab" href="#realisasi_sumberdana" role="tab" aria-controls="" aria-selected="false">Anggaran Menurut Sumber Dana</a>
                            </li>
                            <li class="nav-item">
                            
                        </ul>    
                            <div class="tab-content" id="myTabContent">

                                <!-- ------- Awal Chart----------------------- -->


                        <div class="tab-pane fade show active" id="grafik" role="tabpanel" aria-labelledby="grafik_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 "><h5>GRAFIK DATA ANGGARAN & BMN KEMENAG BANGKA BELITUNG </h5></div>
                                            <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                
                                            </div>
                                            <div class="col-md-2 text-left ">
                                                <select class="form-select form-select-lg" id="pilih_tahun" aria-label="Default select example">
                                                    <option selected value="{{ $tempstruk->tahun_priode }}">{{ $tempstruk->tahun_priode }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-1 }}">{{ $tempstruk->tahun_priode-1 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-2 }}">{{ $tempstruk->tahun_priode-2 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-3 }}">{{ $tempstruk->tahun_priode-3 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-4 }}">{{ $tempstruk->tahun_priode-4 }}</option>
                                                </select>
                                            </div>
                                    </div>
                                   
                                    
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row p-2">
                                    <div class="col-md-6 ">
                                        <div class="card" >
                                            <div class="card-body">
                                            <h5 class="card-title">Grafik Realisasi Anggaran Berdasarkan Unit Eselon II</h5>
                                                <div id="chart"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="card" >
                                            <div class="card-body">
                                            <h5 class="card-title">Grafik Realisasi Anggaran Berdasarkan Program</h5>
                                                <div id="chart2"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                </div> 
                                
                                <div class="row p-2">
                                    <div class="col-md-6 ">
                                        <div class="card" >
                                            <div class="card-body">
                                            <h5 class="card-title">Grafik Realisasi Anggaran Berdasarkan Jenis Belanja</h5>
                                                <div id="chart3"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="card" >
                                            <div class="card-body">
                                            <h5 class="card-title">Realisasi Anggaran Berdasarkan Sumber Dana</h5>
                                                <div id="chart4"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                </div> 


                            </div>
                        </div>    

                </div>
        <!-- ------------------------------ End  ------------------------------  -->

                                <!-- ------- awal Tabel Anggaran----------------------- -->


                        <div class="tab-pane fade show" id="anggaran" role="tabpanel" aria-labelledby="anggaran-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 "><h5>DATA PAGU ANGGARAN DAN TINGKAT REALISASI SERAPAN ANGGARAN </h5></div>
                                            <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                
                                            </div>
                                            <div class="col-md-2 text-left ">
                                                <select class="form-select form-select-lg" id="pilih_anggaran" aria-label="Default select example">
                                                    <option selected value="{{ $tempstruk->tahun_priode }}">{{ $tempstruk->tahun_priode }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-1 }}">{{ $tempstruk->tahun_priode-1 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-2 }}">{{ $tempstruk->tahun_priode-2 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-3 }}">{{ $tempstruk->tahun_priode-3 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-4 }}">{{ $tempstruk->tahun_priode-4 }}</option>
                                                </select>
                                            </div>
                                    </div>
                                   
                                    
                                </div>
                               
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12 p-5 " >
                                        <div class="table-responsive">
                                            <table id="tabel-anggaran" class="table style table-striped table-hover tabel-anggaran" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">PROGRAM</th>
                                                    <th text-align="center">PAGU ALOKASI AWAL</th>
                                                    <th text-align="center">PAGU ALOKASI AKHIR</th>
                                                    <th>SELISIH</th>
                                                    <th >ANGGARAN</th>
                                                    <th >REALISASI</th>
                                                    <th >PERSENTASE</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_anggaran as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="dt-right">{{ number_format($temp->pagu_awal) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->pagu_akhir) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->pagu_akhir-$temp->pagu_awal) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->pagu_akhir) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->realisasi) }}</td>
                                                        <td class="dt-right">{{ number_format((($temp->realisasi)/($temp->pagu_akhir ?: 1))*100,2) }}%</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>
                <!-- ------------------------------ End  ------------------------------  -->

                   <!-- ------- awal Tabel Realisasi Berdasarkan Jenis Belanja---------------------- -->


                   <div class="tab-pane fade show " id="realisasi_belanja" role="tabpanel" aria-labelledby="realisasi_belanja-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                            <div class="row">
                                        <div class="col-md-8 "><h5>DATA REALISASI ANGGARAN BERDASARKAN JENIS BELANJA </h5></div>
                                            <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                
                                            </div>
                                            <div class="col-md-2 text-left ">
                                                <select class="form-select form-select-lg" id="pilih_jenisbelanja" aria-label="Default select example">
                                                    <option selected value="{{ $tempstruk->tahun_priode }}">{{ $tempstruk->tahun_priode }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-1 }}">{{ $tempstruk->tahun_priode-1 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-2 }}">{{ $tempstruk->tahun_priode-2 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-3 }}">{{ $tempstruk->tahun_priode-3 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-4 }}">{{ $tempstruk->tahun_priode-4 }}</option>
                                                </select>
                                            </div>
                                    </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12 p-5 ">
                                        <div class="table-responsive">
                                            <table id="tabel-realisasi_belanja" class="table style table-striped table-hover tabel-realisasi_belanja" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">PROGRAM</th>
                                                    <th >PAGU</th>
                                                    <th >REALISASI</th>
                                                    <th >PERSENTASE</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_realisasibelanja as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="dt-right">{{ number_format($temp->pagu) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->realisasi) }}</td>
                                                        <td class="dt-right">{{ number_format((($temp->realisasi)/($temp->pagu ?: 1))*100,2) }}%</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>
                <!-- ------------------------------ End  ------------------------------  -->


                        <!-- ------- awal Tabel Realisasi Berdasarkan Program----------------------- -->


                        <div class="tab-pane fade show " id="realisasi_sumberdana" role="tabpanel" aria-labelledby="realisasi_sumberdana-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 "><h5>DATA REALISASI ANGGARAN BERDASARKAN SUMBER DANA </h5></div>
                                            <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                
                                            </div>
                                            <div class="col-md-2 text-left ">
                                                <select class="form-select form-select-lg" id="pilih_sumberdana" aria-label="Default select example">
                                                    <option selected value="{{ $tempstruk->tahun_priode }}">{{ $tempstruk->tahun_priode }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-1 }}">{{ $tempstruk->tahun_priode-1 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-2 }}">{{ $tempstruk->tahun_priode-2 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-3 }}">{{ $tempstruk->tahun_priode-3 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-4 }}">{{ $tempstruk->tahun_priode-4 }}</option>
                                                </select>
                                            </div>
                                    </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12 p-5 ">
                                        <div class="table-responsive">
                                            <table id="tabel-realisasi_sumberdana" class="table style table-striped table-hover tabel-realisasi_sumberdana" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">PROGRAM</th>
                                                    <th >PAGU</th>
                                                    <th >REALISASI</th>
                                                    <th >PERSENTASE</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_realisasisumberdana as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="dt-right">{{ number_format($temp->pagu) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->realisasi) }}</td>
                                                        <td class="dt-right">{{ number_format((($temp->realisasi)/($temp->pagu ?: 1))*100,2) }}%</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>
                <!-- ------------------------------ End  ------------------------------  -->


                        <!-- ------- awal Tabel Realisasi Berdasarkan Program----------------------- -->


                        <div class="tab-pane fade show " id="realisasi_program" role="tabpanel" aria-labelledby="realisasi_program-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 "><h5>DATA REALISASI ANGGARAN BERDASARKAN PROGRAM </h5></div>
                                            <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                
                                            </div>
                                            <div class="col-md-2 text-left ">
                                                <select class="form-select form-select-lg" id="pilih_program" aria-label="Default select example">
                                                    <option selected value="{{ $tempstruk->tahun_priode }}">{{ $tempstruk->tahun_priode }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-1 }}">{{ $tempstruk->tahun_priode-1 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-2 }}">{{ $tempstruk->tahun_priode-2 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-3 }}">{{ $tempstruk->tahun_priode-3 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-4 }}">{{ $tempstruk->tahun_priode-4 }}</option>
                                                </select>
                                            </div>
                                    </div>
                                   
                                    
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12 p-5 ">
                                        <div class="table-responsive">
                                            <table id="tabel-realisasi_program" class="table style table-striped table-hover tabel-realisasi_program" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">PROGRAM</th>
                                                    <th >PAGU</th>
                                                    <th >REALISASI</th>
                                                    <th >PERSENTASE</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_realisasiprogram as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="dt-right">{{ number_format($temp->pagu) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->realisasi) }}</td>
                                                        <td class="dt-right">{{ number_format((($temp->realisasi)/($temp->pagu ?: 1))*100,2) }}%</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>
                <!-- ------------------------------ End  ------------------------------  -->
                     

                 <!-- ------- awal Tabel BMN Aset Tanah--------------------- -->


                 <div class="tab-pane fade " id="bmn_lokasi" role="tabpanel" aria-labelledby="bmn_tanah-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                            <div class="row">
                                        <div class="col-md-8 "><h5>DATA JUMLAH LOKASI DAN LUAS ASET TANAH </h5></div>
                                            <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                
                                            </div>
                                            <div class="col-md-2 text-left ">
                                                <select class="form-select form-select-lg" id="pilih_lokasi" aria-label="Default select example">
                                                    <option selected value="{{ $tempstruk->tahun_priode }}">{{ $tempstruk->tahun_priode }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-1 }}">{{ $tempstruk->tahun_priode-1 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-2 }}">{{ $tempstruk->tahun_priode-2 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-3 }}">{{ $tempstruk->tahun_priode-3 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-4 }}">{{ $tempstruk->tahun_priode-4 }}</option>
                                                </select>
                                            </div>
                                    </div>
                                
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12 p-5 ">
                                        <div class="table-responsive">
                                            <table id="tabel-bmn_lokasi" class="table style table-striped table-hover tabel-bmn_lokasi" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">KABUPATEN/KOTA</th>
                                                    <th >BAIK</th>
                                                    <th >RUSAK RINGAN</th>
                                                    <th >RUSAK BERAT</th>
                                                    <th >JUMLAH</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($databmn as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="dt-right">{{ number_format($temp->lok_baik) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->lok_rusak_ringan) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->lok_rusak_berat) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->lok_baik+$temp->lok_rusak_ringan+$temp->lok_rusak_berat) }}</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>
                <!-- ------------------------------ End  ------------------------------  -->

                <!-- ------- awal Tabel FKUB--------------------- -->


                 <div class="tab-pane fade show " id="bmn_gedung" role="tabpanel" aria-labelledby="bmn_gedung_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                            <div class="row">
                                        <div class="col-md-8 "><h5>DATA JUMLAH BANGUNAN GEDUNG DAN KANTOR MENURUT KONDISI </h5></div>
                                            <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                
                                            </div>
                                            <div class="col-md-2 text-left ">
                                                <select class="form-select form-select-lg" id="pilih_bmngedung" aria-label="Default select example">
                                                    <option selected value="{{ $tempstruk->tahun_priode }}">{{ $tempstruk->tahun_priode }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-1 }}">{{ $tempstruk->tahun_priode-1 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-2 }}">{{ $tempstruk->tahun_priode-2 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-3 }}">{{ $tempstruk->tahun_priode-3 }}</option>
                                                    <option value="{{ $tempstruk->tahun_priode-4 }}">{{ $tempstruk->tahun_priode-4 }}</option>
                                                </select>
                                            </div>
                                    </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12 p-5 ">
                                        <div class="table-responsive">
                                            <table id="tabel-bmn_gedung" class="table style table-striped table-hover tabel-bmn_gedung" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th  text-align="center">KABUPATEN/KOTA</th>
                                                    <th >BAIK</th>
                                                    <th >RUSAK RINGAN</th>
                                                    <th >RUSAK BERAT</th>
                                                    <th >JUMLAH</th>
                                                    
                                                </tr>

                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($databmn as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="dt-right"><a href="" class="ged_baik" data-type="number" data-name="ged_baik" data-pk="{{$temp->id}}">{{ number_format($temp->ged_baik) }}</a></td>
                                                        <td class="dt-right"><a href="" class="ged_rusak_ringan" data-type="number" data-name="ged_rusak_ringan" data-pk="{{$temp->id}}">{{ number_format($temp->ged_rusak_ringan) }}</a></td>
                                                        <td class="dt-right"><a href="" class="ged_rusak_berat" data-type="number" data-name="ged_rusak_berat" data-pk="{{$temp->id}}">{{ number_format($temp->ged_rusak_berat) }}</a></td>
                                                        <td class="dt-right">{{ number_format($temp->ged_baik+$temp->ged_rusak_ringan+$temp->ged_rusak_berat) }}</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>
                <!-- ------------------------------ End  ------------------------------  -->
        
                </div>  <!-- end Tab Content -->

                        
                </div>  <!-- End Card Body -->
                    
       

@endsection 

@push('scripts')
<script src="{{ asset('web/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('web/js/dataTables.bootstrap5.min.js') }}"></script>


    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>    
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
    <script src="{{ asset('web/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('web/js/buttons.html5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha512-XMVd28F1oH/O71fzwBnV7HucLxVwtxf26XV8P4wPk26EDxuGZ91N8bsOttmnomcCD3CS5ZMRL50H0GgOHvegtg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <!-- ----------------- PDFmake CDN ---------------------------  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js" integrity="sha512-w61kvDEdEhJPJLSAJpuL+RWp1+zTBUUpgPaP+6pcqCk78wQkOaExjnGWrVbovojeisWGQS7XZKz+gr3L+GPYLg==" crossorigin="anonymous" referrerpolicy="no-referrer"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/vfs_fonts.js" integrity="sha512-nNkHPz+lD0Wf0eFGO0ZDxr+lWiFalFutgVeGkPdVgrG4eXDYUnhfEj9Zmg1QkrJFLC0tGs8ZExyU/1mjs4j93w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
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
        
             
        $("#tabel-anggaran").dataTable({

                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    "columnDefs": [
                        { "sortable": false }
                        
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    searching: false,
                    });   
        


        $("#tabel-realisasi_program").dataTable({
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    searching: false,
                    });   
        


        $("#tabel-realisasi_belanja").dataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    searching: false,
                    });   
        
    

        $("#tabel-realisasi_sumberdana").dataTable({
                    
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    searching: false,
                    });   
        

            // =============== Jumlah Aset Tanah===================== 

            $("#tabel-bmn_lokasi").dataTable({
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });   
        

            

       
        // ======================JUMLAH GEDUNG DAN BANGUNGAN ======================== 

        $("#tabel-bmn_gedung").dataTable({
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
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

<script>

// ================= Data Chart Awal ============================================
   
//====================== CHART REALISASI BERDASARKAN UNIT ESELON==================
    
            
var optionsUnitEselon = {
    series: @json($chart_eselon_data),
          chart: {
          width: '100%',
          type: 'pie',
        },
        labels: @json($chart_eselon_nama),
        theme: {
          monochrome: {
            enabled: false
          }
        },
        plotOptions: {
          pie: {
            dataLabels: {
              offset: -5
            }
          }
        },
        
        dataLabels: {
          formatter(val, opts) {
            const name = opts.w.globals.labels[opts.seriesIndex]
            const persen=opts.w.globals.series[opts.seriesIndex]
            return [name, persen.toFixed(1) + '%']
          }
        },
        legend: {
          show: false
        }
        };


        var chart = new ApexCharts(document.querySelector("#chart"), optionsUnitEselon);
        chart.render();
      
      
// ================ Chart Berdasarkan Program =================================

var ChartOptionsProgram = {
    plotOptions: {
    pie: {
      customScale: 1.05,
      donut: {
        labels: {
          show: true,
          name: {
            show: true,
          },
          value: {
            show: false,
          },
          total: {
            show: true,
            showAlways: true,
            label: ["%","REALISASI ANGGARAN", "TAHUN "+{{ $tempstruk->tahun_priode }}],
            fontSize: "20px",
            
          
          },
              
        },
        
      },
    },

  },
    series: @json($chart_program_data),
          chart: {
          type: 'donut',
          height: '475px',
        },
        labels:@json($chart_program_nama) ,
        
        legend: {
          position: 'bottom',
      },dataLabels: {
          enabled: true,
          formatter: function(val, opts) {
            return  opts.w.globals.series[opts.seriesIndex] + " %";
          }
        },
        stroke: {
          colors: ['#fff']
        },
        fill: {
          opacity: 0.8
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };
        var chart2 = new ApexCharts(document.querySelector("#chart2"), ChartOptionsProgram);
        chart2.render();
      
    
    //   ===================== Chart Berdasarkan Jenis Belanja ==========================

    var ChartOptionsBelanja = {
          series: @json($chart_belanja_data),
          labels: @json($chart_belanja_nama),
          chart: {
          type: 'donut',
        },legend: {
          position: 'bottom',
      },
        plotOptions: {
          pie: {   
                donut: {
                        labels: {
                        show: true,
                        name: {
                            show: true,
                        },
                        value: {
                            show: false,
                        },
                        total: {
                            show: true,
                            showAlways: true,
                            label: ["%","REALISASI ANGGARAN", "TAHUN "+{{ $tempstruk->tahun_priode }}],
                            fontSize: "20px",
                        
                        },
                            
                        },
                        
                    },
            startAngle: -90,
            endAngle: 90,
            offsetY: 10
          }
        },
        grid: {
          padding: {
            bottom: -80
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart3 = new ApexCharts(document.querySelector("#chart3"), ChartOptionsBelanja);
        chart3.render();
      
      
    //====================== CHART BERDASARKAN SUMBER DANA ==================
    

            
    var ChartOptionsDana= {
          series: [{
          data: @json($chart_dana_data)
        }],
          chart: {
          height: 430,
          type: 'bar',
          events: {
            click: function(chart, w, e) {
              // console.log(chart, w, e)
            }
          }
        },
        plotOptions: {
          bar: {
            columnWidth: '45%',
            distributed: true,
            horizontal:false,

          }
        },
        dataLabels: {
          enabled: true,
          formatter: function(val, opts) {
            return  val + "%";
          }
        },
        legend: {
          show: false
        },
        xaxis: {
          categories: @json($chart_dana_nama),
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart4 = new ApexCharts(document.querySelector("#chart4"), ChartOptionsDana);
        chart4.render();

    
    
</script>
<script>

// ========================= untuk Mengubah Data Grafik Berdasarkan Tahun =======================


$('#pilih_tahun').on('change',function(){

  var url = 'get_charttatakelolaanggaran/'+this.value;
  var tahunnya=this.value;

  $.ajax({
        url: url,
        // data: data,
        type: 'Get',
        dataType: 'json',
        async: true,
        cache: false,
        
        success: function (data) {
            
            var anggaran_nama=data.datachart_anggaran_nama;
            var anggaran_data=data.datachart_anggaran_data;
            var program_nama=data.datachart_program_nama;
            var program_data=data.datachart_program_data;
            var belanja_nama=data.datachart_belanja_nama;
            var belanja_data=data.datachart_belanja_data;
            var dana_nama=data.datachart_dana_nama;
            var dana_data=data.datachart_dana_data;
      

            // ===== update data chart 1 ======

         

             chart.updateOptions({
  
                series: anggaran_data,
                chart: {
                width: '100%',
                type: 'pie',
                },
                labels: anggaran_nama,
                theme: {
                monochrome: {
                    enabled: false
                }
                },
                plotOptions: {
                pie: {
                    dataLabels: {
                    offset: -5
                    }
                }
                },
                
                dataLabels: {
                formatter(val, opts) {
                    const name = opts.w.globals.labels[opts.seriesIndex]
                    const persen=opts.w.globals.series[opts.seriesIndex]
                    return [name, persen.toFixed(1) + '%']
                }
                },
                legend: {
                show: false
                }
              });

            // ============ Update Data Chart 2 =======

            chart2.updateOptions({
                
                    series: program_data
            });


              // ============ Update Data Chart 3 =======
                
              chart3.updateOptions({
                    series: belanja_data,
                    labels: belanja_nama,
                    chart: {
                    type: 'donut',
                    },legend: {
                    position: 'bottom',
                },
                    plotOptions: {
                    pie: {   
                            donut: {
                                    labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                    },
                                    value: {
                                        show: false,
                                    },
                                    total: {
                                        show: true,
                                        showAlways: true,
                                        label: ["%","REALISASI ANGGARAN", "TAHUN "+tahunnya],
                                        fontSize: "20px",
                                    
                                    },
                                        
                                    },
                                    
                                },
                        startAngle: -90,
                        endAngle: 90,
                        offsetY: 10
                    }
                    },
                    grid: {
                    padding: {
                        bottom: -80
                    }
                    },
                    responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                        width: 200
                        },
                        legend: {
                        position: 'bottom'
                        }
                    }
                    }]
            
                    });

             // ============ Update Data Chart 4 =======

          
            chart4.updateOptions({
  
                series: [{
                    data: dana_data
                    }],
                    chart: {
                    height: 430,
                    type: 'bar',
                    events: {
                        click: function(chart, w, e) {
                        // console.log(chart, w, e)
                        }
                    }
                    },
                    plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true,
                        horizontal:false,

                    }
                    },
                    dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        return  val + "%";
                    }
                    },
                    legend: {
                    show: false
                    },
                    xaxis: {
                    categories: dana_nama,
                    labels: {
                        style: {
                        fontSize: '12px'
                        }
                    }
                    }

              });

            // ================ End Update ====================
            
        }
    });


});




// =========================== untuk Mengubah Data Tabel Tatakelola Anggaran PAGU DAN REALISASI ANGGARAN  Berdasarkan Tahun=================== 

$('#pilih_anggaran').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-anggaran').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaAnggaran/"+tahun+"/anggaran",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pagu_awal', name: 'pagu_awal',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'pagu_akhir', name: 'pagu_akhir',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'selisih',
                      render: function(data,type,row) { 
                      
                          data = row.pagu_akhir-row.pagu_awal;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },

                {data: 'pagu', name: 'pagu',
                      render: function(data,type,row) { 
                        data = row.pagu_akhir;
                          return nf.format(data);

                          },sortable:false},

                    {data: 'realisasi', name: 'realisasi',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'persentase',
                      render: function(data,type,row) { 
                      
                          data = (row.pagu_akhir=== 0? 0 : (row.realisasi/(row.pagu_akhir))*100)
                          return '<strong>'+nf.format((data.toFixed(2)))+'%</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5,6,7], // your case first column
                            "className": "dt-right"
                        }
                    ],"destroy" : true
            });
       });

       // =========================== untuk Mengubah Data Tabel Tatakelola Anggaran REALISASI Program Berdasarkan Tahun=================== 

$('#pilih_program').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-realisasi_program').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaAnggaran/"+tahun+"/program",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pagu', name: 'pagu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'realisasi', name: 'realisasi',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'persentase',
                      render: function(data,type,row) { 
                      
                          data = (row.pagu== 0? 0 : (row.realisasi/(row.pagu))*100)
                          return '<strong>'+nf.format(data.toFixed(2))+'%</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4], // your case first column
                            "className": "dt-right"
                        }
                    ],"destroy" : true
            });
       });

        // =========================== untuk Mengubah Data Tabel Tatakelola Anggaran REALISASI Jenis Belanja Berdasarkan Tahun=================== 

$('#pilih_jenisbelanja').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-realisasi_belanja').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaAnggaran/"+tahun+"/jenisbelanja",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pagu', name: 'pagu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'realisasi', name: 'realisasi',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'persentase',
                      render: function(data,type,row) { 

                          data =(row.pagu== 0? 0 : (row.realisasi/(row.pagu))*100);

                          return '<strong>'+nf.format(data.toFixed(2))+'%</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4], // your case first column
                            "className": "dt-right"
                        }
                    ],"destroy" : true
            });
       });

       // =========================== untuk Mengubah Data Tabel Tatakelola Anggaran REALISASI MENURUT SUMBER DANA Berdasarkan Tahun=================== 

$('#pilih_sumberdana').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-realisasi_sumberdana').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaAnggaran/"+tahun+"/jenisbelanja",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pagu', name: 'pagu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'realisasi', name: 'realisasi',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'persentase',
                      render: function(data,type,row) { 
                      
                          data = (row.pagu== 0? 0 : (row.realisasi/(row.pagu))*100)
                          return '<strong>'+nf.format(data.toFixed(2))+'%</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4], // your case first column
                            "className": "dt-right"
                        }
                    ],"destroy" : true
            });
       });

</script>


@endpush 