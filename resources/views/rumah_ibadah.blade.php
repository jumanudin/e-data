@extends('layouts.web', ['title' => __('Data Rumah Ibadah, Tipologi Masjid, Jumlah Penduduk, Penyuluh Penerima Tunjangan')])
@push('style')
                   

    <link href="{{ asset('web/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>

   
    <link href="{{ asset('web/css/buttons.dataTables.min.css') }}" rel="stylesheet"> 
    <style>
       

    </style>
       
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
                                <a class="nav-link active" id="data_chart-tab" data-toggle="tab" href="#data_chart" role="tab" aria-controls="" aria-selected="false">Chart Data</a>
                            </li>
                            <li class="nav-item">  
                            <a class="nav-link " id="jmlpenduduk-tab" data-toggle="tab" href="#jmlpenduduk" role="tab" aria-controls="" aria-selected="false">Tabel Jumlah Penduduk</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " id="rumahibadah-tab" data-toggle="tab" href="#rumahibadah" role="tab" aria-controls="" aria-selected="false">Tabel Rumah Ibadah</a>       </li>
                            <li class="nav-item">   
                            <a class="nav-link " id="tipologimasjid-tab" data-toggle="tab" href="#tipologimasjid" role="tab" aria-controls="" aria-selected="false">Tabel Tipologi Masjid</a>
                            </li>
                            <li class="nav-item">   
                            <a class="nav-link " id="qorihafiz-tab" data-toggle="tab" href="#qorihafiz" role="tab" aria-controls="" aria-selected="false">Tabel Qori Hafiz</a>
                            </li>
                            <li class="nav-item">   
                            <a class="nav-link " id="ormas-tab" data-toggle="tab" href="#ormas" role="tab" aria-controls="" aria-selected="false">Tabel Ormas</a>
                            </li>
                            <li class="nav-item">   
                            <a class="nav-link " id="terimatunjangan-tab" data-toggle="tab" href="#terimatunjangan" role="tab" aria-controls="" aria-selected="false">Tabel Penyuluh Penerima Tunjangan</a>
                            </li>
                            
                        </ul>    
                        <br />
                            <div class="tab-content" id="myTabContent">

                            <!-- ------- Awal Chart----------------------- -->


                        <div class="tab-pane fade show active" id="data_chart" role="tabpanel" aria-labelledby="data_chart_tab">
                        
                                <div class="card card-warning shadow">
                                    <div class="card-header">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 "><h5>GRAFIK DATA JUMLAH PENDUDUK, RUMAH IBADAH, TIPOLOGI MASJID, PENYULUH PENERIMA BANTUAN, QORI & HAFIZ, DAN ORMAS </h5></div>
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
                                                    <h5 class="card-title">Grafik Jumlah Penduduk</h5>
                                                        <div id="chart"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Rumah Ibadah</h5>
                                                        <div id="chart2"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                        </div> 
                                        
                                        <div class="row p-2">
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Tipologi Masjid</h5>
                                                        <div id="chart3"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Penyuluh Menerima Tunjangan</h5>
                                                        <div id="chart4"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            
                                        </div> 

                                        <div class="row p-2">
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Qori dan Tahfiz</h5>
                                                        <div id="chart5"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Ormas</h5>
                                                        <div id="chart6"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            
                                        </div> 


                                    </div>
                                </div>    

                        </div>


                <!-- ------------------------------ End  ------------------------------  -->
                               
                            <!-- ------- TABEL JUMLAH PENDUDUK--------------------- -->


                        <div class="tab-pane fade show " id="jmlpenduduk" role="tabpanel" aria-labelledby="jmlpenduduk-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12 ">
                                    
                                    <div class="row">
                                                <div class="col-md-8 "><h5> DATA JUMLAH PENDUDUK</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_jmlpenduduk" aria-label="Default select example">
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
                                    <div class="col-md-12 p-5">                                    
                                        <div class="table-responsive">
                                            <table id="tabel-jmlpenduduk" class="table style table-striped table-hover tabel-jmlpenduduk" style="width:100%">
                                            <thead  class="text-white" style="background-color:#5BBCFF">
                                            <tr class="text-center">
                                                <th class="text-center">No</th>
                                                        <th>Wilayah</th>
                                                        <th>Islam</th>
                                                        <th>Kristen</th>
                                                        <th>Katolik</th>
                                                        <th>Hindu</th>
                                                        <th>Buddha</th>
                                                        <th>Khonghucu</th>
                                                        <th>Lainnya</th>
                                                        <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_jmlpenduduk as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center">{{ number_format($temp->islam) }}</td>
                                                    <td class="text-center">{{ number_format($temp->kristen) }}</td>
                                                    <td class="text-center">{{ number_format($temp->katolik) }}</td>
                                                    <td class="text-center">{{ number_format($temp->hindu) }}</td>
                                                    <td class="text-center">{{ number_format($temp->buddha) }}</td>
                                                    <td class="text-center">{{ number_format($temp->khonghucu) }}</td>
                                                    <td class="text-center">{{ number_format($temp->lainnya) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->islam+$temp->kristen+$temp->katolik+$temp->hindu+$temp->buddha+$temp->khonghucu+$temp->lainnya) }}</b></td>
                                                                            
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
                     <!-- ------- TABEL DATA RUMAH IBADAH--------------------- -->


                     <div class="tab-pane fade" id="rumahibadah" role="tabpanel" aria-labelledby="rumahibadah-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA RUMAH IBADAH</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_rumahibadah" aria-label="Default select example">
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
                                    <div class="col-md-12 p-5">
                                        <div class="table-responsive">
                                        <table id="tabel-rumahibadah" class="table style table-striped table-hover tabel-rumahibadah" style="width:100%">
                                           <thead class="text-white" style="background-color:#5BBCFF">
                                           <tr class="text-center">
                                                <th rowspan="2" >No</th>
                                                <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                <th colspan="2" >Islam</th>
                                                <th >Kristen</th>
                                                <th >Katolik</th>
                                                <th >Hindu</th>
                                                <th >Buddha</th>
                                                <th >Khonghucu</th>
                                                
                                            </tr>
                                            <tr class="text-center">
                                                <th>Masjid</th>
                                                <th>Musholla</th>
                                                <th>Gereja</th>
                                                <th >Gereja</th>
                                                <th >Pura</th>
                                                <th >Vihara</th>
                                                <th >Kelenteng</th>
                                    </tr>
 
                                            </thead>
                                            <tbody class="list bg-light">
                                                @foreach ($data_rumahibadah as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center">{{ number_format($temp->masjid) }}</td>
                                                        <td class="text-center">{{ number_format($temp->musholla) }}</td>
                                                        <td class="text-center">{{ number_format($temp->gereja_kristen) }}</td>
                                                        <td class="text-center">{{ number_format($temp->gereja_katolik) }}</td>
                                                        <td class="text-center">{{ number_format($temp->pura) }}</td>
                                                        <td class="text-center">{{ number_format($temp->vihara) }}</td>
                                                        <td class="text-center">{{ number_format($temp->kelenteng) }}</td>
                                                                            
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

                 <!-- ------- DATA TYPOLOGI MASJID-------------------- -->


                 <div class="tab-pane fade" id="tipologimasjid" role="tabpanel" aria-labelledby="tipologimasjid-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA WAKAF PRODUKTIF</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_tipologimasjid" aria-label="Default select example">
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
                                    <div class="col-md-12 p-5">
                                        <div class="table-responsive">
                                        <table id="tabel-tipologimasjid" class="table style table-striped table-hover tabel-tipologimasjid" style="width:100%">
                                        <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th rowspan="2" >No</th>
                                                    <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                    <th colspan="8" >Tipologi Masjid</th>
                                                    <th colspan="2" >Jumlah</th>
                                                    
                                                </tr>
                                            <tr class="text-center">
                                                
                                                        <th>Negara</th>
                                                        <th>Raya</th>
                                                        <th>Agung</th>
                                                        <th>Besar</th>
                                                        <th>Jamik</th>
                                                        <th>Bersejarah</th>
                                                        <th>Umum</th>
                                                        <th>Nasional</th>
                                                        <th>Masjid</th>
                                                        <th>Musholla</th>
                                                </tr>  
                                          </thead>
                                          <tbody class="list bg-light">
                                                @foreach ($data_tipologimasjid as $temp)
                                                        <tr >
                                                            <td class="text-center">{{ $temp->idx}}</td>
                                                            <td>{{ $temp->nama }}</td>
                                                            <td class="text-center">{{ number_format($temp->ngr) }}</td>
                                                            <td class="text-center">{{ number_format($temp->raya) }}</td>
                                                            <td class="text-center">{{ number_format($temp->agung) }}</td>
                                                            <td class="text-center">{{ number_format($temp->besar) }}</td>
                                                            <td class="text-center">{{ number_format($temp->jamik) }}</td>
                                                            <td class="text-center">{{ number_format($temp->sejarah) }}</td>
                                                            <td class="text-center">{{ number_format($temp->umum) }}</td>
                                                            <td class="text-center">{{ number_format($temp->nasional) }}</td>
                                                            <td class="text-center">{{ number_format($temp->ngr+$temp->raya+$temp->agung+$temp->besar+$temp->jamik+$temp->sejarah+$temp->umum+$temp->nasional) }}</td>
                                                            <td class="text-center">{{ number_format($temp->musholla) }}</td>
                                                                                
                                                        </tr>
                                                        @endforeach 
                                                </tbody>
                              </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>



                 <!-- ------- DATA HAFIZ DAN QORI'------------------- -->


                 <div class="tab-pane fade" id="ormas" role="tabpanel" aria-labelledby="ormas-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA ORMAS</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_ormas" aria-label="Default select example">
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
                                    <div class="col-md-12 p-5">
                                        <div class="table-responsive">
                                        <table id="tabel-ormas" class="table style table-striped table-hover tabel-ormas" style="width:100%">
                                        <thead class="text-white" style="background-color:#5BBCFF">
                                        <tr class="text-center">
                                                        <th >NO</th>
                                                        <th text-align="center">KABUPATEN / KOTA</th>
                                                        <th >ISLAM</th>
                                                        <th >KRISTEN</th>
                                                        <th >KATOLIK</th>
                                                        <th >HINDU</th>
                                                        <th >BUDDHA</th>
                                                        <th >KHONGHUCU</th>
                                                        
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody class="list bg-light">
                                                @foreach ($data_ormas as $temp)
                                                        <tr >
                                                            <td class="text-center">{{ $temp->idx}}</td>
                                                            <!-- <td>{{ $temp->id }}</td> -->
                                                            <td>{{ $temp->nama }}</td>
                                                            <td class="text-center">{{ number_format($temp->islam) }}</td>
                                                            <td class="text-center">{{ number_format($temp->kristen) }}</td>
                                                            <td class="text-center">{{ number_format($temp->katolik) }}</td>
                                                            <td class="text-center">{{ number_format($temp->hindu) }}</td>
                                                            <td class="text-center">{{ number_format($temp->buddha) }}</td>
                                                            <td class="text-center">{{ number_format($temp->khonghucu) }}</td>
                                                                                
                                                        </tr>
                                                        @endforeach 
                                                </tbody>

                                              </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>



                 <!-- ------- DATA ORMAS------------------- -->


                 <div class="tab-pane fade" id="qorihafiz" role="tabpanel" aria-labelledby="qorihafiz-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA HAFIZ DAN QORI'</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_qorihafiz" aria-label="Default select example">
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
                                    <div class="col-md-12 p-5">
                                        <div class="table-responsive">
                                        <table id="tabel-qorihafiz" class="table style table-striped table-hover tabel-qorihafiz" style="width:100%">
                                        <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th rowspan="2" >No</th>
                                                    <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                    <th colspan="2" >Qori</th>
                                                    <th rowspan="2" >Total</th>
                                                    <th colspan="2" >Hafiz</th>
                                                    <th rowspan="2" >Total</th>
                                                    
                                                </tr>
                                                <tr class="text-center">
                                    
                                                            <th>Pria</th>
                                                            <th>Wanita</th>
                                                            <th>Pria</th>
                                                            <th>Wanita</th>
                                                </tr>
                                            
                                          </thead>
                                          <tbody class="list bg-light">
                                                    @foreach ($dataqorihafiz as $temp)
                                                            <tr >
                                                                <td class="text-center">{{ $temp->idx}}</td>
                                                                <!-- <td>{{ $temp->id }}</td> -->
                                                                <td>{{ $temp->nama }}</td>
                                                                <td class="text-center">{{ number_format($temp->qori_pria) }}</td>
                                                                <td class="text-center">{{ number_format($temp->qori_wanita) }}</td>
                                                                <td class="text-center"><b>{{ number_format($temp->qori_wanita+$temp->qori_pria) }}</b></td>
                                                                <td class="text-center">{{ number_format($temp->hafiz_pria)}}</td>
                                                                <td class="text-center">{{ number_format($temp->hafiz_wanita) }}</td>
                                                                <td class="text-center"><b>{{ number_format($temp->hafiz_pria+$temp->hafiz_wanita) }}</b></td>
                                                                                        
                                                            </tr>
                                                            @endforeach 
                                        </tbody>
                              </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>


                  <!-- ------- DATA PENYULUH YANG MENERIMA TUNJANGAN------------------- -->


                 <div class="tab-pane fade" id="terimatunjangan" role="tabpanel" aria-labelledby="terimatunjangan-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA PENYULUH YANG MENERIMA TUNJANGAN</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_terimatunjangan" aria-label="Default select example">
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
                                    <div class="col-md-12 p-5">
                                        <div class="table-responsive">
                                        <table id="tabel-terimatunjangan" class="table style table-striped table-hover tabel-terimatunjangan" style="width:100%">
                                        <thead class="text-white" style="background-color:#5BBCFF">
                                        <tr class="text-center">
                                              <th class="text-center">No</th>
                                                        <th>Wilayah</th>
                                                        <th>Islam</th>
                                                        <th>Kristen</th>
                                                        <th>Katolik</th>
                                                        <th>Hindu</th>
                                                        <th>Buddha</th>
                                                        <th>Khonghucu</th>
                                              </tr>
                                          </thead>
                                          <tbody class="list bg-light">
                                              @foreach ($data_tunjangan as $temp)
                                                        <tr >
                                                          <td class="text-center">{{ $temp->idx}}</td>
                                                          <!-- <td>{{ $temp->id }}</td> -->
                                                          <td>{{ $temp->nama }}</td>
                                                          <td class="text-center">{{ number_format($temp->islam) }}</td>
                                                          <td class="text-center">{{ number_format($temp->kristen) }}</td>
                                                          <td class="text-center">{{ number_format($temp->katolik) }}</td>
                                                          <td class="text-center">{{ number_format($temp->hindu) }}</td>
                                                          <td class="text-center">{{ number_format($temp->buddha) }}</td>
                                                          <td class="text-center">{{ number_format($temp->khonghucu) }}</td>
                                                                                  
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
                    
<br />

@endsection

@push('scripts')
    <!-- <script src="{{ asset('library/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> -->

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
    

    $(document).ready(function () {
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });
        let nf = new Intl.NumberFormat('en-US');


        // ============= Tabel Jumlah Penduduk ================== 
        
             
        $("#tabel-jmlpenduduk").dataTable({
                    "columnDefs": [
                        { "sortable": false },
                        { className: "dt-head-center", targets: [ 2,3,4,5 ] }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    autoWidth: false,
                    searching: false
                    });   
        

            

       
        
        //=============== Tabel Rumah Ibadah ===========================

        $("#tabel-rumahibadah").dataTable({
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    autoWidth: false,
                    searching: false
                    });   
        

           

            // =============== Tabel Tipologi Masjid===================== 

            $("#tabel-tipologimasjid").dataTable({
                    
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    autoWidth: false,
                    searching: false,
                    fixedHeader: true

                    });   
        

            
            // =============== Tabel Qori Hafiz===================== 

            $("#tabel-qorihafiz").dataTable({
                    
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    autoWidth: false,
                    searching: false,
                    fixedHeader: true

                    });   

       

            
            // =============== Tabel Ormas===================== 

            $("#tabel-ormas").dataTable({
                    
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    autoWidth: false,
                    searching: false,
                    fixedHeader: true

                    });   

              // =============== Tabel Penyuluh Penerima Tunjangan===================== 

              $("#tabel-terimatunjangan").dataTable({
                    
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    dom:'Bfrtip',
                    buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    autoWidth: false,
                    searching: false,
                    fixedHeader: true

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
//    ----------------------- CHART 1 ----------------------------------------------------------

var ChartOptionsJmlpenduduk= {
    
    series: @json($datachart_jmlpenduduk),
          labels:['ISLAM','KRISTEN','KATOLIK','HINDU','BUDDHA','KHONGHUCU','LAINNYA'],
          chart: {
          width: 510,
          type: 'donut',
          
        },
        colors: ['#1ddb20', '#FFE8C5', '#4287f5','#ed051c','#5C2FC2','#FF0000','#FFA27F'],
        plotOptions: {
          pie: {
            startAngle: -90,
            endAngle: 270
          }
        },
          noData: {
            text: 'Tidak Ada Data'
          },
        dataLabels: {
          enabled: true
        },
        fill: {
          type: 'gradient',
          
        },
        legend: {
          formatter: function(val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " Orang";
          }
        },
        tooltip: {
              y: {
                formatter: function(value) {
                  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " Orang";
                }
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

        var chart = new ApexCharts(document.querySelector("#chart"), ChartOptionsJmlpenduduk);
        chart.render();


// //    ----------------------- CHART 2 ----------------------------------------------------------


var ChartOptionsRumahIbadah = {
          series: [{
          data: @json($datachart_rumahibadah)
        }],
          chart: {
          height: 350,
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
          enabled: true
        },
        legend: {
          show: false
        },
        xaxis: {
          categories: [
            'MASJID',
            'MUSHOLLA',
            'GEREJA KRISTEN',
            'GEREJA KATOLIK',
            'PURA',
            'VIHARA',
            'KELENTENG',

          ],
          labels: {
            style: {
              fontSize: '10px'
            }
          }
        }
        };


        var chart2 = new ApexCharts(document.querySelector("#chart2"), ChartOptionsRumahIbadah);
        chart2.render();



// //    ----------------------- CHART 3 ----------------------------------------------------------

var ChartOptionsTipologimasjid = {
          series: [{
            name: "Tipologimasjid",
            data: @json($datachart_tipologimasjid)
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'straight'
        },
        
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: [ 'NGR',
            'RAYA',
            'AGUNG',
            'BESAR',
            'JAMIK',
            'SEJARAH',
            'UMUM',
            'NASIONAL',
            'MASJID',
            'MUSHALLA'],
        }
        };

        var chart3 = new ApexCharts(document.querySelector("#chart3"), ChartOptionsTipologimasjid);
        chart3.render();

    // //    ----------------------- CHART 4 ----------------------------------------------------------


var ChartOptionsPenerimaTunjangan = {
          series: [{
          data: @json($datachart_penerimatunjangan)
        }],
          chart: {
          height: 350,
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
          enabled: true
        },
        legend: {
          show: false
        },
        xaxis: {
          categories: [
            'ISLAM',
            'KRISTEN',
            'KATOLIK',
            'HINDU',
            'BUDDHA',
            'KHONGHUCU',

          ],
          labels: {
            style: {
              fontSize: '10px'
            }
          }
        }
        };


        var chart4 = new ApexCharts(document.querySelector("#chart4"), ChartOptionsPenerimaTunjangan);
        chart4.render();


        // ---------------------------- Chart 5 ---------------------------- 

        var ChartOptionsQorihafiz = {
            series: @json($datachart_qorihafiz),
            chart: {
            width: 550,
            type: 'pie',
        },
        labels: ['Qori Pria', 'Qori Wanita', 'Hafiz Pria', 'Hafiz Wanita'],
        legend: {
          formatter: function(val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex] + " Orang";
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

        var chart5 = new ApexCharts(document.querySelector("#chart5"), ChartOptionsQorihafiz);
        chart5.render();


        //    ----------------------- CHART 6 ----------------------------------------------------------


var ChartOptionsOrmas = {
          series: [{
          data: @json($datachart_ormas)
        }],
          chart: {
          height: 350,
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
          enabled: true
        },
        legend: {
          show: false
        },
        xaxis: {
          categories: [
            'ISLAM',
            'KRISTEN',
            'KATOLIK',
            'HINDU',
            'BUDDHA',
            'KHONGHUCU',

          ],
          labels: {
            style: {
              fontSize: '10px'
            }
          }
        }
        };


        var chart6 = new ApexCharts(document.querySelector("#chart6"), ChartOptionsOrmas);
        chart6.render();

    


</script>

<script>

// ========================= untuk Mengubah Data Grafik Berdasarkan Tahun =======================


$('#pilih_tahun').on('change',function(){

  var url = 'get_chartkeagamaanrumahibadah/'+this.value;

  $.ajax({
        url: url,
        // data: data,
        type: 'Get',
        dataType: 'json',
        async: true,
        cache: false,
        
        success: function (data) {
            
            

            // ===== update data chart 1 ======

         

             chart.updateOptions({
  
              series: data.datachart_jmlpenduduk

              });

            // ============ Update Data Chart 2 =======

            chart2.updateOptions({
              series: [{
                  data: data.datachart_rumahibadah
                }]
                
            });


              // ============ Update Data Chart 3 =======

              chart3.updateOptions({
  
                series: [{
                          name: "Tipologimasjid",
                          data: data.datachart_tipologimasjid
                      }]

              });



              // ============ Update Data Chart 4 =======

              chart4.updateOptions({
  
                series: [{
                        data: data.datachart_penerimatunjangan
                      }]

            });



              // ============ Update Data Chart 5 =======

              chart5.updateOptions({
  
                series: data.datachart_qorihafiz

                  });


              // ============ Update Data Chart 6 =======

              chart6.updateOptions({
  
                    series: [{
                            data: data.datachart_ormas
                          }]

                  });

            
        }
    });



   


});


 // =========================== untuk Mengubah Data Tabel Keagamaan Jumlah Penduduk Berdasarkan tahun=================== 

 $('#pilih_jmlpenduduk').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-jmlpenduduk').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanRumahibadah/"+tahun+"/data_jmlpenduduk",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'islam', name: 'islam',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'kristen', name: 'kristen',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    
                {data: 'katolik', name: 'katolik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'hindu', name: 'hindu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'buddha', name: 'buddha',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},


                    {data: 'khonghucu', name: 'khonghucu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},


                    {data: 'lainnya', name: 'lainnya',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},


                    
                    {data: 'jumlah',
                      render: function(data,type,row) { 
                      
                          data = row.islam+row.kristen+row.katolik+row.hindu+row.buddha+row.khonghucu+row.lainnya;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5,6,7], // your case first column
                            "className": "text-center"
                        }
                    ],"destroy" : true
            });
       });


       $('#pilih_tipologimasjid').on('change',function(){

        let nf = new Intl.NumberFormat('en-US');
        var tahun=this.value;

              
                
                        $('.tabel-tipologimasjid').DataTable({
                        
                        dom:'Bfrtip',
                        buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                        sorting:false,
                        processing: true,
                        serverSide: true,
                        searching: false,
                        ajax: "getTabelKeagamaanRumahibadah/"+tahun+"/data_tipologimasjid",
                        
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                          
                            {data: 'nama', name: 'nama',sortable:false},
                          
                            {data: 'ngr', name: 'ngr',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},

                            {data: 'raya', name: 'raya',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},

                            
                        {data: 'agung', name: 'agung',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},

                            {data: 'besar', name: 'besar',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},

                            {data: 'jamik', name: 'jamik',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},


                            {data: 'sejarah', name: 'sejarah',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},



                            {data: 'umum', name: 'umum',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},



                            {data: 'nasional', name: 'nasional',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},


                                  {data: 'jumlah_masjid',
                                    render: function(data,type,row) { 
                                    
                                        data = row.ngr+row.raya+row.agung+row.besar+row.jamik+row.sejarah+row.umum+row.nasional;
                                        return '<strong>'+nf.format(data)+'</strong>';

                                        }
                                        ,sortable:false },
                    




                            {data: 'musholla', name: 'musholla',
                              render: function(data,type,row) { 
                              
                                  return nf.format(data);

                                  },sortable:false},


                            
                        ],
                        'columnDefs': [
                                {
                                    "targets": [0,2,3,4,5,6,7], // your case first column
                                    "className": "text-center"
                                }
                            ],"destroy" : true
                    });
              });


              $('#pilih_rumahibadah').on('change',function(){

              let nf = new Intl.NumberFormat('en-US');
              var tahun=this.value;

                    
                      
                $('.tabel-rumahibadah').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanRumahibadah/"+tahun+"/data_rumahibadah",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                  
                    {data: 'masjid', name: 'masjid',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'musholla', name: 'musholla',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    
                {data: 'gereja_kristen', name: 'gereja_kristen',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'gereja_katolik', name: 'gereja_katolik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'pura', name: 'pura',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},


                    {data: 'vihara', name: 'vihara',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},



                    {data: 'kelenteng', name: 'kelenteng',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},


                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5,6,7], // your case first column
                            "className": "text-center"
                        }
                    ],"destroy" : true
            });
      });


      $('#pilih_qorihafiz').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
  $('.tabel-qorihafiz').DataTable({
  
  dom:'Bfrtip',
  buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
  sorting:false,
  processing: true,
  serverSide: true,
  searching: false,
  ajax: "getTabelKeagamaanRumahibadah/"+tahun+"/data_qorihafiz",
  
  columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
    
      {data: 'nama', name: 'nama',sortable:false},
    
      {data: 'qori_pria', name: 'qori_pria',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

      {data: 'qori_wanita', name: 'qori_wanita',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

  {data: 'jumlah_qori',
           render: function(data,type,row) { 
                                    
          data = row.qori_pria+row.qori_wanita;
              return '<strong>'+nf.format(data)+'</strong>';

               }
          ,sortable:false },
                    
  {data: 'hafiz_pria', name: 'hafiz_pria',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

      {data: 'hafiz_wanita', name: 'hafiz_wanita',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},
            
            
    {data: 'jumlah_hafiz',
           render: function(data,type,row) { 
                                    
          data = row.hafiz_pria+row.hafiz_wanita;
              return '<strong>'+nf.format(data)+'</strong>';

               }
          ,sortable:false },
                    


      
  ],
  'columnDefs': [
          {
              "targets": [0,2,3,4,5,6,7], // your case first column
              "className": "text-center"
          }
      ],"destroy" : true
});
});


$('#pilih_ormas').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
  $('.tabel-ormas').DataTable({
  
  dom:'Bfrtip',
  buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
  sorting:false,
  processing: true,
  serverSide: true,
  searching: false,
  ajax: "getTabelKeagamaanRumahibadah/"+tahun+"/data_ormas",
  
  columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
    
      {data: 'nama', name: 'nama',sortable:false},
    
      {data: 'islam', name: 'islam',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

      {data: 'kristen', name: 'kristen',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

  {data: 'katolik', name: 'katolik',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

{data: 'hindu', name: 'hindu',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},
            
            
{data: 'buddha', name: 'buddha',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},
            
            
{data: 'khonghucu', name: 'khonghucu',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},
            
            
                    


      
  ],
  'columnDefs': [
          {
              "targets": [0,2,3,4,5,6,7], // your case first column
              "className": "text-center"
          }
      ],"destroy" : true
});
});


$('#pilih_terimatunjangan').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
  $('.tabel-terimatunjangan').DataTable({
  
  dom:'Bfrtip',
  buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
  sorting:false,
  processing: true,
  serverSide: true,
  searching: false,
  ajax: "getTabelKeagamaanRumahibadah/"+tahun+"/data_terimatunjangan",
  
  columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
    
      {data: 'nama', name: 'nama',sortable:false},
    
      {data: 'islam', name: 'islam',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

      {data: 'kristen', name: 'kristen',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

  {data: 'katolik', name: 'katolik',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},

{data: 'hindu', name: 'hindu',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},
            
            
{data: 'buddha', name: 'buddha',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},
            
            
{data: 'khonghucu', name: 'khonghucu',
        render: function(data,type,row) { 
        
            return nf.format(data);

            },sortable:false},
            
            
                    
  ],
  'columnDefs': [
          {
              "targets": [0,2,3,4,5,6,7], // your case first column
              "className": "text-center"
          }
      ],"destroy" : true
});
});


      

</script>


@endpush 

