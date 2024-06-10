@extends('layouts.web', ['title' => __('Data Kantor Urusan Agama(KUA)')])
@push('style')
                   

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
                                <a class="nav-link active" id="kua_chart-tab" data-toggle="tab" href="#kua_chart" role="tab" aria-controls="" aria-selected="false">Chart KUA</a>
                            </li>
                            <li class="nav-item">  
                                <a class="nav-link " id="peng_nikahchart-tab" data-toggle="tab" href="#peng_nikahchart" role="tab" aria-controls="" aria-selected="false">Chart Peristiwa NIkah</a>
                            </li>
                            <li class="nav-item">  
                            <a class="nav-link " id="typologi-tab" data-toggle="tab" href="#typologi" role="tab" aria-controls="" aria-selected="false">Tipologi KUA</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " id="statuskua-tab" data-toggle="tab" href="#statuskua" role="tab" aria-controls="" aria-selected="false">Status & Kondinsi KUA</a>       </li>
                            <li class="nav-item">   
                            <a class="nav-link " id="revitalisasi-tab" data-toggle="tab" href="#revitalisasikua" role="tab" aria-controls="" aria-selected="false">Revitalisasi KUA</a>
                            </li>
                            <li class="nav-item">     
                            <a class="nav-link " id="balainikah-tab" data-toggle="tab" href="#balainikahkua" role="tab" aria-controls="" aria-selected="false">Balai Nikah</a>
                            </li>
                            <li class="nav-item">     
                            <a class="nav-link " id="penghulu-tab" data-toggle="tab" href="#penghulu" role="tab" aria-controls="" aria-selected="false">Penghulu</a>
                            </li>
                            <li class="nav-item">     
                            <a class="nav-link " id="penghuluDibina-tab" data-toggle="tab" href="#penghuluDibina" role="tab" aria-controls="" aria-selected="false">Penghulu Dibina</a>
                            </li>
                            <li class="nav-item">     
                            <a class="nav-link " id="tempatPeristiwa-tab" data-toggle="tab" href="#tempatPeristiwa" role="tab" aria-controls="" aria-selected="false">Tempat Nikah</a>
                            </li>
                            <li class="nav-item">     
                            <a class="nav-link " id="peristiwa-tab" data-toggle="tab" href="#peristiwa" role="tab" aria-controls="" aria-selected="false">Peristiwa Nikah</a>
                            </li>
                            <li class="nav-item">     
                            <a class="nav-link " id="bukunikah-tab" data-toggle="tab" href="#bukunikah" role="tab" aria-controls="" aria-selected="false">Buku/Kartu NIkah</a>
                            </li>
                            
                        </ul>    
                        <br />
                            <div class="tab-content" id="myTabContent">

                            <!-- ------- Awal Chart----------------------- -->


                        <div class="tab-pane fade show active" id="kua_chart" role="tabpanel" aria-labelledby="kua_chart_tab">
                        
                                <div class="card card-warning shadow">
                                    <div class="card-header">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 "><h5>GRAFIK DATA KUA KEMENAG BANGKA BELITUNG </h5></div>
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
                                                    <h5 class="card-title">Grafik Tipologi KUA</h5>
                                                        <div id="chart"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Status & Kondisi KUA</h5>
                                                        <div id="chart2"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                        </div> 
                                        
                                        <div class="row p-2">
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">GrafikGrafik Revitalisasi KUA</h5>
                                                        <div id="chart3"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Balai Nikah</h5>
                                                        <div id="chart4"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                        </div> 


                                    </div>
                                </div>    

                        </div>


                <!-- ============================ Chart Peristiwa Nikah ========================= -->



                <div class="tab-pane fade show" id="peng_nikahchart" role="tabpanel" aria-labelledby="peng_nikahchart_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 "><h5>GRAFIK DATA PERISTIWA NIKAH KEMENAG BANGKA BELITUNG </h5></div>
                                            <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                
                                            </div>
                                            <div class="col-md-2 text-left ">
                                                <select class="form-select form-select-lg" id="pilih_peristiwa" aria-label="Default select example">
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
                                            <h5 class="card-title">Grafik Tingkat Jabatan Penghulu</h5>
                                                <div id="chart5"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="card" >
                                            <div class="card-body">
                                            <h5 class="card-title">Grafik Penghulu yang Dibina</h5>
                                                <div id="chart6"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                </div> 
                                
                                <div class="row p-2">
                                    <div class="col-md-6 ">
                                        <div class="card" >
                                            <div class="card-body">
                                            <h5 class="card-title">Grafik  Grafik Tempat Nikah</h5>
                                                <div id="chart7"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="card" >
                                            <div class="card-body">
                                            <h5 class="card-title">Grafik Peristiwa Nikah Menurut Bulan</h5>
                                                <div id="chart8"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                </div> 


                            </div>
                        </div>    

                </div>

                <!-- ------------------------------ End  ------------------------------  -->
                               
                            <!-- ------- TABEL TIPOLOGI KUA---------------------- -->


                        <div class="tab-pane fade show " id="typologi" role="tabpanel" aria-labelledby="typologi-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12 ">
                                    
                                    <div class="row">
                                                <div class="col-md-8 "><h5> DATA TIPOLOGI KUA</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_tipologi" aria-label="Default select example">
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
                                            <table id="tabel-kua_tipologi" class="table style table-striped table-hover tabel-kua_tipologi" style="width:100%">
                                            <thead  class="text-white" style="background-color:#5BBCFF">
                                            <tr class="text-center">
                                                    <th rowspan="2" >No</th>
                                                    <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                    <th colspan="5" >TIPOLOGI</th>
                                                    <th rowspan="2" >Jumlah</th>
                                                    
                                                </tr>
                                            <tr class="text-center">
                                                
                                                        <th>A</th>
                                                        <th>B</th>
                                                        <th>C</th>
                                                        <th>D1</th>
                                                        <th>D2</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datatipologi as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center">{{ number_format($temp->type_a) }}</td>
                                                    <td class="text-center">{{ number_format($temp->type_b) }}</td>
                                                    <td class="text-center">{{ number_format($temp->type_c) }}</td>
                                                    <td class="text-center">{{ number_format($temp->type_d) }}</td>
                                                    <td class="text-center">{{ number_format($temp->type_d2) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->type_a+$temp->type_b+$temp->type_c+$temp->type_d+$temp->type_d2) }}</b></td>
                                                    
                                                                        
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
                     <!-- ------- TABEL DATA STATUS TANAH DAN KONDISI BANGUNAN KUA---------------------- -->


                     <div class="tab-pane fade" id="statuskua" role="tabpanel" aria-labelledby="statuskua-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA STATUS TANAH DAN KONDISI BANGUNAN KUA</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_status" aria-label="Default select example">
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
                                        <table id="tabel-statuskua" class="table style table-striped table-hover tabel-statuskua" style="width:100%">
                                           <thead class="text-white" style="background-color:#5BBCFF">
                                            <tr class="text-center">
                                                    <th rowspan="2" >NO</th>
                                                    <th rowspan="2" text-align="center">KABUPATEN / KOTA</th>
                                                    <th rowspan="2" >SDH SERTIFIKAT</th>
                                                    <th rowspan="2" >BLM SERTIFIKAT</th>
                                                    <th rowspan="2" >JUMLAH</th>
                                                    <th colspan="3" >KONDISI BANGUNAN</th>
                                                    <th rowspan="2" >JUMLAH</th>
                                                    
                                                </tr>
                                            <tr class="text-center">
                                                
                                                        
                                                        <th>BAIK</th>
                                                        <th>RUSAK RINGAN</th>
                                                        <th>RUSAK SEDANG</th>
                                                </tr>
                                           
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datastatus as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center">{{ number_format($temp->jml_serti) }}</td>
                                                    <td class="text-center">{{ number_format($temp->jml_belum) }}</td>
                                                    <td class="text-center">{{ number_format($temp->jml_serti+$temp->jml_belum) }}</td>
                                                    <td class="text-center">{{ number_format($temp->baik) }}</td>
                                                    <td class="text-center">{{ number_format($temp->rsk_ringan) }}</td>
                                                    <td class="text-center">{{ number_format($temp->rsk_sedang) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->baik+$temp->rsk_ringan+$temp->rsk_sedang) }}</b></td>
                                                    
                                                                        
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

                 <!-- ------- REVITALISASI KUA ---------------------- -->


                 <div class="tab-pane fade" id="revitalisasikua" role="tabpanel" aria-labelledby="revitalisasi-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA REVITALISASI KUA</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_revitalisasikua" aria-label="Default select example">
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
                                        <table id="tabel-revitalisasikua" class="table style table-striped table-hover tabel-revitalisasikua" style="width:100%">
                                        <thead class="text-white" style="background-color:#5BBCFF">
                                        <tr class="text-center">
                                                  <th>NO</th>
                                                  <th  text-align="center">KABUPATEN / KOTA</th>
                                                  <th>REHAB RINGAN</th>
                                                  <th>RAHAB BERAT</th>
                                                  <th>JUMLAH</th>
                                                  
                                              </tr>

                                            </thead>
                                            <tbody class="list bg-light">
                                              @foreach ($datarevitalisasi as $temp)
                                              <tr >
                                                  <td class="text-center">{{ $temp->idx}}</td>
                                                  <!-- <td>{{ $temp->id }}</td> -->
                                                  <td>{{ $temp->nama }}</td>
                                                  <td class="text-center">{{ number_format($temp->rehab_ringan) }}</td>
                                                  <td class="text-center">{{ number_format($temp->rehab_berat) }}</td>
                                                  <td class="text-center"><strong>{{ number_format($temp->rehab_ringan+$temp->rehab_berat) }}</strong></td>
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

                 <!-- ------- TABEL BALAI NIKAH--------------------- -->


                 <div class="tab-pane fade" id="balainikahkua" role="tabpanel" aria-labelledby="balainikah-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA BALAI NIKAH</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_balainikah" aria-label="Default select example">
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
                                        <table id="tabel-balainikahkua" class="table style table-striped table-hover tabel-balainikahkua" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                            <tr class="text-center">
                                                  <th>NO</th>
                                                  <th  text-align="center">KABUPATEN / KOTA</th>
                                                  <th>BALAI NIKAH</th>
                                                  <th>JUMLAH</th>
                                                  
                                              </tr>
                                          
                                          </thead>
                                          <tbody class="list bg-light">
                                              @foreach ($databalainikah as $temp)
                                              <tr >
                                                  <td class="text-center">{{ $temp->idx}}</td>
                                                  <!-- <td>{{ $temp->id }}</td> -->
                                                  <td>{{ $temp->nama }}</td>
                                                  <td class="text-center">{{ number_format($temp->balai_nikah) }}</td>
                                                  <td class="text-center"><strong>{{ number_format($temp->balai_nikah) }}</strong></td>
                                                  
                                                                      
                                              </tr>
                                          @endforeach 
                                          </tbody>
                                          </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>

                    
                <!-- ====================== PENGHULU KUA ============================== -->

                <div class="tab-pane fade" id="penghulu" role="tabpanel" aria-labelledby="penghulu-tab">
                      
                      <div class="card card-warning shadow">
                          <div class="card-header">
                            <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA BALAI NIKAH</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_penghulu" aria-label="Default select example">
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
                                          <table id="tabel-penghulu" class="table style table-striped table-hover tabel-penghulu" style="width:100%">
                                          <thead class="text-white" style="background-color:#5BBCFF">
                                          <tr class="text-center">
                                                  <th rowspan="2" >NO</th>
                                                  <th rowspan="2" text-align="center">KABUPATEN / KOTA</th>
                                                  <th colspan="4" >TINGKAT JABATAN</th>
                                                  <th rowspan="2" >JUMLAH</th>
                                                  
                                              </tr>
                                          <tr class="text-center">
                                              
                                                      <th>PERTAMA</th>
                                                      <th>MUDA</th>
                                                      <th>MADYA</th>
                                                      <th>UTAMA</th>
                                              </tr>
                                          </thead>
                                          <tbody class="list bg-light">
                                              @foreach ($datapenghulu as $temp)
                                              <tr >
                                                  <td class="text-center">{{ $temp->idx}}</td>
                                                  <!-- <td>{{ $temp->id }}</td> -->
                                                  <td>{{ $temp->nama }}</td>
                                                  
                                                  <td class="text-center">{{ number_format($temp->peng_pertama) }}</td>
                                                  <td class="text-center">{{ number_format($temp->peng_muda) }}</td>
                                                  <td class="text-center">{{ number_format($temp->peng_madya) }}</td>
                                                  <td class="text-center">{{ number_format($temp->peng_utama) }}</td>
                                                  <td class="text-center"><b>{{ number_format($temp->peng_pertama+$temp->peng_muda+$temp->peng_madya+$temp->peng_utama) }}</b></td>
                                                  
                                                                      
                                              </tr>
                                          @endforeach 
                                          </tbody>
                                          </table>
                                      </div>                            
                                  </div>                                                                
                              </div>
                      </div>    
                  </div>
                
                    <!-- ====================== PENGHULU DIBINA ============================== -->

                <div class="tab-pane fade" id="penghuluDibina" role="tabpanel" aria-labelledby="penghuluDibina-tab">
                      
                      <div class="card card-warning shadow">
                          <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA PENGHULU YANG DIBINA</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_penghuludibina" aria-label="Default select example">
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
                                          <table id="tabel-penghuluDibina" class="table style table-striped table-hover tabel-penghuluDibina" style="width:100%">
                                          <thead class="text-white" style="background-color:#5BBCFF">
                                          <tr class="text-center">
                                                  <th rowspan="2" >NO</th>
                                                  <th rowspan="2" text-align="center">KABUPATEN / KOTA</th>
                                                  <th colspan="4" >TINGKAT JABATAN</th>
                                                  <th rowspan="2" >JUMLAH</th>
                                                  
                                              </tr>
                                          <tr class="text-center">
                                              
                                                      <th>PERTAMA</th>
                                                      <th>MUDA</th>
                                                      <th>MADYA</th>
                                                      <th>UTAMA</th>
                                              </tr>
                                          </thead>
                                          <tbody class="list bg-light">
                                              @foreach ($datapenghuluDibina as $temp)
                                              <tr >
                                                  <td class="text-center">{{ $temp->idx}}</td>
                                                  <!-- <td>{{ $temp->id }}</td> -->
                                                  <td>{{ $temp->nama }}</td>
                                                  
                                                  <td class="text-center">{{ number_format($temp->pembinaan_pertama) }}</td>
                                                  <td class="text-center">{{ number_format($temp->pembinaan_muda) }}</td>
                                                  <td class="text-center">{{ number_format($temp->pembinaan_madya) }}</td>
                                                  <td class="text-center">{{ number_format($temp->pembinaan_utama) }}</td>
                                                  <td class="text-center"><b>{{ number_format($temp->pembinaan_pertama+$temp->pembinaan_muda+$temp->pembinaan_madya+$temp->pembinaan_utama) }}</b></td>
                                                  
                                                                      
                                              </tr>
                                          @endforeach 
                                          </tbody>
                                          </table>
                                      </div>                            
                                  </div>                                                                
                              </div>
                      </div>    
                  </div>

                <!-- ============================= Peristiwa  Nikah perbulan =================================== -->
                                <div class="tab-pane fade" id="peristiwa" role="tabpanel" aria-labelledby="peristiwa-tab">
                                    
                                    <div class="card card-warning shadow">
                                        <div class="card-header">
                                            <div class="col-md-12">
                                                    <div class="row">
                                                                <div class="col-md-8 "><h5>DATA PERISTIWA NIKAH PERBULAN</h5></div>
                                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-2 text-left ">
                                                                        <select class="form-select form-select-lg" id="pilih_peristiwanikah" aria-label="Default select example">
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
                                                        <table id="tabel-peristiwa" class="table style table-striped table-hover tabel-peristiwa" style="width:100%">
                                                        <thead class="text-white" style="background-color:#5BBCFF">
                                                        <tr class="text-center">
                                                                <th rowspan="2" >NO</th>
                                                                <th rowspan="2" text-align="center">KABUPATEN / KOTA</th>
                                                                <th colspan="12" >BULAN</th>
                                                                <th rowspan="2" >JUMLAH</th>
                                                                
                                                            </tr>
                                                             <tr class="text-center">
                                                            
                                                                    <th>JAN</th>
                                                                    <th>FEB</th>
                                                                    <th>MAR</th>
                                                                    <th>APR</th>
                                                                    <th>MEI</th>
                                                                    <th>JUN</th>
                                                                    <th>JUL</th>
                                                                    <th>AGS</th>
                                                                    <th>SEP</th>
                                                                    <th>OKT</th>
                                                                    <th>NOV</th>
                                                                    <th>DES</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list bg-light">
                                                            @foreach ($dataperistiwa as $temp)
                                                            <tr >
                                                                <td class="text-center">{{ $temp->idx}}</td>
                                                                <!-- <td>{{ $temp->id }}</td> -->
                                                                <td>{{ $temp->nama }}</td>
                                                                <td class="text-center">{{ number_format($temp->jan) }}</td>
                                                                <td class="text-center">{{ number_format($temp->feb) }}</td>
                                                                <td class="text-center">{{ number_format($temp->mar) }}</td>
                                                                <td class="text-center">{{ number_format($temp->apr) }}</td>
                                                                <td class="text-center">{{ number_format($temp->mei) }}</td>
                                                                <td class="text-center">{{ number_format($temp->jun) }}</td>
                                                                <td class="text-center">{{ number_format($temp->jul) }}</td>
                                                                <td class="text-center">{{ number_format($temp->ags) }}</td>
                                                                <td class="text-center">{{ number_format($temp->sep) }}</td>
                                                                <td class="text-center">{{ number_format($temp->okt) }}</td>
                                                                <td class="text-center">{{ number_format($temp->nov) }}</td>
                                                                <td class="text-center">{{ number_format($temp->des) }}</td>
                                                                <td class="text-center"><strong>{{ number_format($temp->jan+$temp->feb+$temp->mar+$temp->apr+$temp->mei+$temp->jun+$temp->jul+$temp->ags+$temp->sep+$temp->okt+$temp->nov+$temp->des) }}</strong></td>
                                                                
                                                                                    
                                                            </tr>
                                                        @endforeach 
                                                        </tbody>
                                                        </table>
                                                    </div>                            
                                                </div>                                                                
                                            </div>
                                    </div>    
                                </div>       
                            
                            <!-- ============================= TEMPAT NIkah=================================== -->
                            <div class="tab-pane fade" id="tempatPeristiwa" role="tabpanel" aria-labelledby="tempatPeristiwa-tab">
                                    
                                    <div class="card card-warning shadow">
                                        <div class="card-header">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                                <div class="col-md-8 "><h5>DATA TEMPAT NIKAH</h5></div>
                                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-2 text-left ">
                                                                        <select class="form-select form-select-lg" id="pilih_tempatnikah" aria-label="Default select example">
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
                                                        <table id="tabel-tempatNikah" class="table style table-striped table-hover tabel-tempatNikah" style="width:100%">
                                                        <thead class="text-white" style="background-color:#5BBCFF">
                                                        <tr class="text-center">
                                                                <th>NO</th>
                                                                <th  text-align="center">KABUPATEN / KOTA</th>
                                                                <th>KUA</th>
                                                                <th>LUAR KUA</th>
                                                                <th>JUMLAH</th>
                                                                
                                                            </tr>
                                                        
                                                        </thead>
                                                        <tbody class="list bg-light">
                                                            @foreach ($datatempatNikah as $temp)
                                                            <tr >
                                                                <td class="text-center">{{ $temp->idx}}</td>
                                                                <!-- <td>{{ $temp->id }}</td> -->
                                                                <td>{{ $temp->nama }}</td>
                                                                <td class="text-center">{{ number_format($temp->kua) }}</td>
                                                                <td class="text-center">{{ number_format($temp->luar_kua) }}</td>
                                                                <td class="text-center"><strong>{{ number_format($temp->kua+$temp->luar_kua) }}</strong></td>
                                                                
                                                                                    
                                                            </tr>
                                                        @endforeach 
                                                        </tbody>
                                                        </table>
                                                    </div>                            
                                                </div>                                                                
                                            </div>
                                    </div>    
                                </div> 



                            <!-- ============================= Buku NIkah=================================== -->
                            <div class="tab-pane fade" id="bukunikah" role="tabpanel" aria-labelledby="bukunikah-tab">
                                    
                                    <div class="card card-warning shadow">
                                        <div class="card-header">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                                <div class="col-md-8 "><h5>DATA BUKU NIKAH</h5></div>
                                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-2 text-left ">
                                                                        <select class="form-select form-select-lg" id="pilih_bukunikah" aria-label="Default select example">
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
                                                        <table id="tabel-bukunikah" class="table style table-striped table-hover tabel-bukunikah" style="width:100%">
                                                        <thead class="text-white" style="background-color:#5BBCFF">
                                                        <tr class="text-center">
                                                                <th>NO</th>
                                                                <th  text-align="center">KABUPATEN / KOTA</th>
                                                                <th>BUKU NIKAH</th>
                                                                <th>KARTU NIKAH</th>
                                                                <th>JUMLAH</th>
                                                                
                                                            </tr>
                                                        
                                                        </thead>
                                                        <tbody class="list bg-light">
                                                            @foreach ($databukunikah as $temp)
                                                            <tr >
                                                                <td class="text-center">{{ $temp->idx}}</td>
                                                                <!-- <td>{{ $temp->id }}</td> -->
                                                                <td>{{ $temp->nama }}</td>
                                                                <td class="text-center">{{ number_format($temp->buku_nikah) }}</td>
                                                                <td class="text-center">{{ number_format($temp->kartu_nikah) }}</td>
                                                                <td class="text-center"><strong>{{ number_format($temp->buku_nikah+$temp->kartu_nikah) }}</strong></td>
                                                                
                                                                                    
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
        
             
        $("#tabel-kua_tipologi").dataTable({
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
        

            

       
        
        //=============== Rentang usia ===========================

        $("#tabel-statuskua").dataTable({
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
        

           

            // =============== Bedasarkan Kualifikasi Pendidikan ===================== 

            $("#tabel-revitalisasikua").dataTable({
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
        

            

       
        // ====================== Berdasarkan Revitalisasi KUA======================== 

        $("#tabel-balainikahkua").dataTable({
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
        

          
        // ====================== Berdasarkan Penghulu======================== 

        $("#tabel-penghulu").dataTable({
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
            
        // ====================== Berdasarkan Penghulu Dibina======================== 

        $("#tabel-penghuluDibina").dataTable({
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
        

                    // ====================== Berdasarkan Tempat Nikah======================== 

        $("#tabel-tempatnikah").dataTable({
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


        // ====================== Berdasarkan Tempat NIkah======================= 

        $("#tabel-tempatNikah").dataTable({
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
        
        
   // ====================== Berdasarkan Tempat NIkah======================= 

   $("#tabel-peristiwa").dataTable({
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


        // ====================== Berdasarkan Tempat NIkah======================= 

        $("#tabel-bukunikah").dataTable({
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

 //====================== CHART BERDASARKAN KUALIFIKASI PENDIDIKAN ==================
            
 var ChartOptionsKua= {
    
    series: @json($datachart_kua),
          labels:['A','B','C','D'],
          chart: {
          width: 510,
          type: 'donut',
          
        },
        colors: ['#05f3f7', '#dff705', '#4287f5','#ed051c'],
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
            return "Type "+val + " - " + opts.w.globals.series[opts.seriesIndex] + "%";
          }
        },
        plotOptions: {
          pie: {   
                donut: {
                        labels: {
                        show: true,
                        name: {
                            show: true,
                        },
                        style: {
                                fontSize: "140px",
                                fontFamily: "Helvetica, Arial, sans-serif",
                                fontWeight: "bold"
                            },
                        value: {
                            show: false,
                        },
                        total: {
                            show: true,
                            showAlways: true,
                            label: ["Tipologi","KUA"],
                            fontSize: "20px",
                        
                        },
                            
                        },
                        
                    },

          },
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

        var chart = new ApexCharts(document.querySelector("#chart"), ChartOptionsKua);
        chart.render();




//    ----------------------- CHART 2 ----------------------------------------------------------

var ChartOptionsStatusKua = {
          series: [{
          data: @json($datachart_status)
        }],
          chart: {
          height: 320,
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
            'SUDAH SERTIFIKAT',
            'BELUM SERTIFIKAT',
            'BAIK',
            'RUSAK RINGAN',
            'RUSAK SEDANG',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart2 = new ApexCharts(document.querySelector("#chart2"), ChartOptionsStatusKua);
        chart2.render();



//    ----------------------- CHART 3 ----------------------------------------------------------

     
var ChartOptionsRevitalisasiKua = {
    series: @json($datachart_revitalisasi),
          chart: {
            height: 385,
          width: '100%',
          type: 'pie',
        },
        labels: ['REHAB RINGAN','REHAB BERAT'],
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




        var chart3 = new ApexCharts(document.querySelector("#chart3"), ChartOptionsRevitalisasiKua);
        chart3.render();



//    ----------------------- CHART 4 ----------------------------------------------------------

var ChartOptionsBalainikah = {
          series: [{
          data: @json($datachart_balainikah)
        }],
          chart: {
          height: 320,
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
            'PKP',
            'BANGKA',
            'BATENG',
            'BABAR',
            'BASEL',
            'BELITUNG',
            'BELTIM',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart4 = new ApexCharts(document.querySelector("#chart4"), ChartOptionsBalainikah);
        chart4.render();


//   ----------------------- CHART 5 ----------------------------------------------------------

        //====================== CHART JABATAN PENGHULU KUA ==================
    

            
        var ChartOptionsPenghulu = {
          series: [{
          data: @json($datachart_penghulu)
        }],
          chart: {
          height: 290,
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
            horizontal:true,

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
            'PERTAMA',
            'MUDA',
            'MADYA',
            'UTAMA',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart5 = new ApexCharts(document.querySelector("#chart5"), ChartOptionsPenghulu);
        chart5.render();


//   ------------------------- CHART 6 ------------------------------------------------------

//====================== CHART JABATAN PENGHULU KUA YANG DIBINA==================
    

            
var ChartOptionsPenghulu = {
          series: [{
          data: @json($datachart_penghuludibina)
        }],
          chart: {
          height: 290,
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
            'PERTAMA',
            'MUDA',
            'MADYA',
            'UTAMA',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart6 = new ApexCharts(document.querySelector("#chart6"), ChartOptionsPenghulu);
        chart6.render();


//   ------------------------- CHART 7 ------------------------------------------------------


//====================== CHART TEMPAT NIKAH==================
    
            
var optionsTempatNikah = {
    series: @json($datachart_tempatNikah),
          chart: {
            height: 385,
          width: '100%',
          type: 'pie',
        },
        labels: ['KUA','LUAR KUA'],
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


        var chart7 = new ApexCharts(document.querySelector("#chart7"), optionsTempatNikah);
        chart7.render();
      


//   ------------------------- CHART 8 ------------------------------------------------------

// ------------------------ Peristiwa Nikah Tiap Bulan ---------------------------------

var optionsPeristiwaNikah = {
          series: [{
            name: "Desktops",
            data: @json($datachart_jmlperistiwa)
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (value) {
            // Format angka ke dalam ribuan
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
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
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Okt','Nov','Des'],
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    // Format angka ke dalam ribuan
                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            }
        }
        };

        var chart8 = new ApexCharts(document.querySelector("#chart8"), optionsPeristiwaNikah);
        chart8.render();
      
      
    

</script>

<script>

// ========================= untuk Mengubah Data Grafik Berdasarkan Tahun =======================


$('#pilih_tahun').on('change',function(){

  var url = 'get_chartkeagamaankua/'+this.value;

  $.ajax({
        url: url,
        // data: data,
        type: 'Get',
        dataType: 'json',
        async: true,
        cache: false,
        
        success: function (data) {
            
            var datatipologi=data.datachart_kua;
            var datastatus=data.datachart_status;
            var data_revitalisasi=data.datachart_revitalisasi;
            var data_balainikah=data.datachart_balainikah;
      

            // ===== update data chart 1 ======

         

             chart.updateOptions({
  
              series: datatipologi,

              });

            // ============ Update Data Chart 2 =======

            chart2.updateSeries([{
                
                data:  datastatus,
            }]);


              // ============ Update Data Chart 3 =======

              chart3.updateOptions({
  
              series: data_revitalisasi,

              });

             // ============ Update Data Chart 4 =======

             chart4.updateSeries([{
                
                data: data_balainikah,
            }]);
            
        }
    });


});


$('#pilih_peristiwa').on('change',function(){

var url = 'get_chartkeagamaankua/'+this.value;

$.ajax({
      url: url,
      // data: data,
      type: 'Get',
      dataType: 'json',
      async: true,
      cache: false,
      
      success: function (data) {
          
          var data_penghulu=data.datachart_penghulu;
          var data_penghuludibina=data.datachart_penghuludibina;
          var data_tempatnikah=data.datachart_tempatNikah;
          var data_jumlahperistiwa=data.datachart_jmlperistiwa;
    

          // ===== update data chart 1 ======

       

           chart5.updateOptions({

            series: [{
                data: data_penghulu
              }]

            

            });

          // ============ Update Data Chart 2 =======

          chart6.updateSeries([{
              
              data:  data_penghuludibina,
          }]);


            // ============ Update Data Chart 3 =======

            chart7.updateOptions({

            series: data_tempatnikah,

            });

           // ============ Update Data Chart 4 =======

           chart8.updateSeries([{
              
              data: data_jumlahperistiwa,
          }]);
          
      }
  });


});
// =========================== untuk Mengubah Data Tabel Keagamaan Berdasarkan tahun=================== 

$('#pilih_tipologi').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-kua_tipologi').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanKua/"+tahun+"/tipologi",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'type_a', name: 'type_a',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'type_b', name: 'type_b',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    
                {data: 'type_c', name: 'type_c',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'type_d', name: 'type_d',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'type_d2', name: 'type_d2',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    
                    {data: 'jml_data',
                      render: function(data,type,row) { 
                      
                          data = row.type_a+row.type_b+row.type_c+row.type_d+row.type_d2;
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

       // =========================== untuk Mengubah Data Tabel Status  Berdasarkan Tahun=================== 

$('#pilih_status').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-statuskua').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanKua/"+tahun+"/status",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'jml_serti', name: 'jml_serti',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_belum', name: 'jml_belum',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    
                {data: 'jml_serti',
                      render: function(data,type,row) { 
                      
                          data = row.jml_serti+row.jml_belum;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },


                {data: 'baik', name: 'baik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                          

                    {data: 'rsk_ringan', name: 'rsk_ringan',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'rsk_berat', name: 'rsk_berat',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_kondisi',
                      render: function(data,type,row) { 
                      
                          data = row.baik+row.rsk_ringan+row.rsk_berat;
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

       $('#pilih_revitalisasikua').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-revitalisasikua').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanKua/"+tahun+"/revitalisasi",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'rehab_ringan', name: 'rehab_ringan',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'rehab_berat', name: 'rehab_berat',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_revitalisasi',
                      render: function(data,type,row) { 
                      
                          data = row.rehab_ringan+row.rehab_berat;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4], // your case first column
                            "className": "text-center"
                        }
                    ],"destroy" : true
            });
       });


      //  ================= untuk mengubah data balainikah =====================================

       $('#pilih_balainikah').on('change',function(){

              let nf = new Intl.NumberFormat('en-US');
              var tahun=this.value;

            
              
                      $('.tabel-balainikahkua').DataTable({
                      dom:'Bfrtip',
                      buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                      sorting:false,
                      processing: true,
                      serverSide: true,
                      searching: false,
                      ajax: "getTabelKeagamaanKua/"+tahun+"/balainikah",
                      
                      columns: [
                          {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                        
                          {data: 'nama', name: 'nama',sortable:false},
                        
                          {data: 'balai_nikah', name: 'balai_nikah',
                            render: function(data,type,row) { 
                            
                                return nf.format(data);

                                },sortable:false},

                          {data: 'jml_balainikah',
                            render: function(data,type,row) { 
                            
                                data = row.balai_nikah;
                                return '<strong>'+nf.format(data)+'</strong>';

                                }
                                ,sortable:false },
                          
                      ],
                      'columnDefs': [
                              {
                                  "targets": [0,2,3], // your case first column
                                  "className": "text-center"
                              }
                          ],"destroy" : true
                  });
       });



// ============================= untuk mengubah data tabel penghulu ===========================


$('#pilih_penghulu').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-penghulu').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanKua/"+tahun+"/penghulu",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'peng_pertama', name: 'peng_pertama',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'peng_muda', name: 'peng_muda',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    

                    {data: 'peng_madya', name: 'peng_madya',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                          

                    {data: 'peng_utama', name: 'peng_utama',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_prnghulu',
                      render: function(data,type,row) { 
                      
                          data = row.peng_pertama+row.peng_muda+row.peng_madya+row.peng_utama;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5,6], // your case first column
                            "className": "text-center"
                        }
                    ],"destroy" : true
            });
       });


// ============================= untuk mengubah data tabel Peristiwa Nikah===========================


$('#pilih_penghuluDibina').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-penghuluDibina').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanKua/"+tahun+"/penghuludibina",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pembinaan_pertama', name: 'pembinaan_pertama',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'pembinaan_muda', name: 'pembinaan_muda',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    

                    {data: 'pembinaan_madya', name: 'pembinaan_madya',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                          

                    {data: 'pembinaan_utama', name: 'pembinaan_utama',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_prnghulu',
                      render: function(data,type,row) { 
                      
                          data = row.pembinaan_pertama+row.pembinaan_muda+row.pembinaan_madya+row.pembinaan_utama;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5,6], // your case first column
                            "className": "text-center"
                        }
                    ],"destroy" : true
            });
       });

       // ============================= untuk mengubah data tabel Peristiwa nikah===========================


$('#pilih_peristiwanikah').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-peristiwa').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                
                ajax: "getTabelKeagamaanKua/"+tahun+"/peristiwanikah",
                columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    
                  {data: 'nama', name: 'nama',sortable:false},
                    {data: 'jan', name: 'jan',
                      render: function(data,type,row) { 
                        
                          return nf.format(data);

                          },sortable:false},

                    {data: 'feb', name: 'feb',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    

                    {data: 'mar', name: 'mar',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                          

                    {data: 'apr', name: 'apr',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'mei', name: 'mei',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jun', name: 'jun',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jul', name: 'jul',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'ags', name: 'ags',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'sep', name: 'sep',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'okt', name: 'okt',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'nov', name: 'nov',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'des', name: 'des',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_peristiwa',
                      render: function(data,type,row) { 
                      
                          data = row.jan+row.feb+row.mar+row.apr+row.mei+row.jun+row.jul+row.ags+row.sep+row.okt+row.nov+row.des;
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


       // ============================= untuk mengubah data tabel Buku nikah===========================


$('#pilih_bukunikah').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-bukunikah').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                
                ajax: "getTabelKeagamaanKua/"+tahun+"/bukunikah",
                columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    
                  {data: 'nama', name: 'nama',sortable:false},
                    {data: 'buku_nikah', name: 'buku_nikah',
                      render: function(data,type,row) { 
                        
                          return nf.format(data);

                          },sortable:false},

                    {data: 'kartu_nikah', name: 'kartu_nikah',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    

                    {data: 'jml_bukunikah',
                      render: function(data,type,row) { 
                      
                          data = row.buku_nikah+row.kartu_nikah;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4], // your case first column
                            "className": "text-center"
                        }
                    ],"destroy" : true
            });
       });


</script>


@endpush 


