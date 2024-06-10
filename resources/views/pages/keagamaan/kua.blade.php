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
        <h3 >KANTOR URUSAN AGAMA</h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('penyuluh_pns') }}">Layanan Keagamaan</a></div>
            <div class="breadcrumb-item">Data KUA  </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data KUA Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link {{request()->is('kua')?'active':null}}" id="typologi-tab" data-toggle="tab" href="#typologi" role="tab" aria-controls="" aria-selected="false">Tipologi KUA</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link " id="statuskua-tab" data-toggle="tab" href="#statuskua" role="tab" aria-controls="" aria-selected="false">Status & Kondinsi KUA</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link " id="revitalisasi-tab" data-toggle="tab" href="#revitalisasikua" role="tab" aria-controls="" aria-selected="false">Revitalisasi KUA</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link " id="balainikah-tab" data-toggle="tab" href="#balainikahkua" role="tab" aria-controls="" aria-selected="false">Balai Nikah</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link " id="penghulu-tab" data-toggle="tab" href="#penghulu" role="tab" aria-controls="" aria-selected="false">Penghulu</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link " id="penghuluDibina-tab" data-toggle="tab" href="#penghuluDibina" role="tab" aria-controls="" aria-selected="false">Penghulu Dibina</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link " id="tempatPeristiwa-tab" data-toggle="tab" href="#tempatPeristiwa" role="tab" aria-controls="" aria-selected="false">Tempat Nikah</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link " id="peristiwa-tab" data-toggle="tab" href="#peristiwa" role="tab" aria-controls="" aria-selected="false">Peristiwa Nikah</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Kua')->l)     
                    <a class="nav-link " id="bukunikah-tab" data-toggle="tab" href="#bukunikah" role="tab" aria-controls="" aria-selected="false">Buku/Kartu NIkah</a>
                    @endif
                    </li>
                    
                </ul>    
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="typologi" role="tabpanel" aria-labelledby="typologi-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Tipologi KUA Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-tipologi" class="table style table-striped table-hover tabel-tipologi" style="width:100%">
                                            <thead class="text-white">
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
                                                    <td class="text-center"><a href="" class="type_a" data-type="number" data-name="type_a" data-pk="{{$temp->id}}">{{ number_format($temp->type_a) }}</a></td>
                                                    <td class="text-center"><a href="" class="type_b" data-type="number" data-name="type_b" data-pk="{{$temp->id}}">{{ number_format($temp->type_b) }}</a></td>
                                                    <td class="text-center"><a href="" class="type_c" data-type="number" data-name="type_c" data-pk="{{$temp->id}}">{{ number_format($temp->type_c) }}</a></td>
                                                    <td class="text-center"><a href="" class="type_d" data-type="number" data-name="type_d" data-pk="{{$temp->id}}">{{ number_format($temp->type_d) }}</a></td>
                                                    <td class="text-center"><a href="" class="type_d2" data-type="number" data-name="type_d2" data-pk="{{$temp->id}}">{{ number_format($temp->type_d2) }}</a></td>
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

                    <!-- ====================== Status Tanah dan Kondisi Bangunan KUA ============================== -->

                    <div class="tab-pane fade" id="statuskua" role="tabpanel" aria-labelledby="statuskua-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Status Tanah dan Kondisi Bangunan KUA Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-statuskua" class="table style table-striped table-hover tabel-statuskua" style="width:100%">
                                            <thead class="text-white">
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
                                                    <td class="text-center"><a href="" class="jml_serti" data-type="number" data-name="jml_serti" data-pk="{{$temp->id}}">{{ number_format($temp->jml_serti) }}</a></td>
                                                    <td class="text-center"><a href="" class="jml_belum" data-type="number" data-name="jml_belum" data-pk="{{$temp->id}}">{{ number_format($temp->jml_belum) }}</a></td>
                                                    <td class="text-center">{{ number_format($temp->jml_serti+$temp->jml_belum) }}</td>
                                                    <td class="text-center"><a href="" class="baik" data-type="number" data-name="baik" data-pk="{{$temp->id}}">{{ number_format($temp->baik) }}</a></td>
                                                    <td class="text-center"><a href="" class="rsk_ringan" data-type="number" data-name="rsk_ringan" data-pk="{{$temp->id}}">{{ number_format($temp->rsk_ringan) }}</a></td>
                                                    <td class="text-center"><a href="" class="rsk_sedang" data-type="number" data-name="rsk_sedang" data-pk="{{$temp->id}}">{{ number_format($temp->rsk_sedang) }}</a></td>
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
                        
                    <!-- ============================= Revitalisasi KUA =================================== -->
                    <div class="tab-pane fade" id="revitalisasikua" role="tabpanel" aria-labelledby="revitalisasi-tab">
                      
                      <div class="card card-warning shadow">
                          <div class="card-header">
                              <div class="col-md-6 text-left ">
                                  <h4>Data Revitalisasi KUA Tahun {{ $tempstruk->tahun_priode }}</h4>
                              </div>
                          </div>

                              <div class="card-body">
                                  <div class="col-md-12">
                                      <div class="table-responsive">
                                          <table id="tabel-revitalisasikua" class="table style table-striped table-hover tabel-revitalisasikua" style="width:100%">
                                          <thead class="text-white">
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
                                                  <td class="text-center"><a href="" class="rehab_ringan" data-type="number" data-name="rehab_ringan" data-pk="{{$temp->id}}">{{ number_format($temp->rehab_ringan) }}</a></td>
                                                  <td class="text-center"><a href="" class="rehab_berat" data-type="number" data-name="rehab_berat" data-pk="{{$temp->id}}">{{ number_format($temp->rehab_berat) }}</a></td>
                                                  <td class="text-center">{{ number_format($temp->rehab_ringan+$temp->rehab_berat) }}</td>
                                                  
                                                                      
                                              </tr>
                                          @endforeach 
                                          </tbody>
                                          </table>
                                      </div>                            
                                  </div>                                                                
                              </div>
                      </div>    
                  </div>       
                            
                <!-- ============================== BALAI NIKAH ============================== -->

                <div class="tab-pane fade" id="balainikahkua" role="tabpanel" aria-labelledby="balainikah-tab">
                      
                      <div class="card card-warning shadow">
                          <div class="card-header">
                              <div class="col-md-6 text-left ">
                                  <h4>Data Balai Nikah Tahun {{ $tempstruk->tahun_priode }}</h4>
                              </div>
                          </div>

                              <div class="card-body">
                                  <div class="col-md-12">
                                      <div class="table-responsive">
                                          <table id="tabel-balainikahkua" class="table style table-striped table-hover tabel-balainikahkua" style="width:100%">
                                          <thead class="text-white">
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
                                                  <td class="text-center"><a href="" class="balai_nikah" data-type="number" data-name="balai_nikah" data-pk="{{$temp->id}}">{{ number_format($temp->balai_nikah) }}</a></td>
                                                  <td class="text-center">{{ number_format($temp->balai_nikah) }}</td>
                                                  
                                                                      
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
                              <div class="col-md-6 text-left ">
                                  <h4>Data Penghulu Tahun {{ $tempstruk->tahun_priode }}</h4>
                              </div>
                          </div>

                              <div class="card-body">
                                  <div class="col-md-12">
                                      <div class="table-responsive">
                                          <table id="tabel-penghulu" class="table style table-striped table-hover tabel-penghulu" style="width:100%">
                                          <thead class="text-white">
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
                                                  
                                                  <td class="text-center"><a href="" class="peng_pertama" data-type="number" data-name="peng_pertama" data-pk="{{$temp->id}}">{{ number_format($temp->peng_pertama) }}</a></td>
                                                  <td class="text-center"><a href="" class="peng_muda" data-type="number" data-name="peng_muda" data-pk="{{$temp->id}}">{{ number_format($temp->peng_muda) }}</a></td>
                                                  <td class="text-center"><a href="" class="peng_madya" data-type="number" data-name="peng_madya" data-pk="{{$temp->id}}">{{ number_format($temp->peng_madya) }}</a></td>
                                                  <td class="text-center"><a href="" class="peng_utama" data-type="number" data-name="peng_utama" data-pk="{{$temp->id}}">{{ number_format($temp->peng_utama) }}</a></td>
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
                              <div class="col-md-6 text-left ">
                                  <h4>Data Penghulu yang Mendapat Pembinaan Tahun {{ $tempstruk->tahun_priode }}</h4>
                              </div>
                          </div>

                              <div class="card-body">
                                  <div class="col-md-12">
                                      <div class="table-responsive">
                                          <table id="tabel-penghuluDibina" class="table style table-striped table-hover tabel-penghuluDibina" style="width:100%">
                                          <thead class="text-white">
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
                                                  
                                                  <td class="text-center"><a href="" class="pembinaan_pertama" data-type="number" data-name="pembinaan_pertama" data-pk="{{$temp->id}}">{{ number_format($temp->pembinaan_pertama) }}</a></td>
                                                  <td class="text-center"><a href="" class="pembinaan_muda" data-type="number" data-name="pembinaan_muda" data-pk="{{$temp->id}}">{{ number_format($temp->pembinaan_muda) }}</a></td>
                                                  <td class="text-center"><a href="" class="pembinaan_madya" data-type="number" data-name="pembinaan_madya" data-pk="{{$temp->id}}">{{ number_format($temp->pembinaan_madya) }}</a></td>
                                                  <td class="text-center"><a href="" class="pembinaan_utama" data-type="number" data-name="pembinaan_utama" data-pk="{{$temp->id}}">{{ number_format($temp->pembinaan_utama) }}</a></td>
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
                                            <div class="col-md-6 text-left ">
                                                <h4>Data Peristiwa Nikah Berdasarkan Tempat Tahun {{ $tempstruk->tahun_priode }}</h4>
                                            </div>
                                        </div>

                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table id="tabel-peristiwa" class="table style table-striped table-hover tabel-peristiwa" style="width:100%">
                                                        <thead class="text-white">
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
                                                                <td class="text-center"><a href="" class="jan" data-type="number" data-name="jan" data-pk="{{$temp->id}}">{{ number_format($temp->jan) }}</a></td>
                                                                <td class="text-center"><a href="" class="feb" data-type="number" data-name="feb" data-pk="{{$temp->id}}">{{ number_format($temp->feb) }}</a></td>
                                                                <td class="text-center"><a href="" class="mar" data-type="number" data-name="mar" data-pk="{{$temp->id}}">{{ number_format($temp->mar) }}</a></td>
                                                                <td class="text-center"><a href="" class="apr" data-type="number" data-name="apr" data-pk="{{$temp->id}}">{{ number_format($temp->apr) }}</a></td>
                                                                <td class="text-center"><a href="" class="mei" data-type="number" data-name="mei" data-pk="{{$temp->id}}">{{ number_format($temp->mei) }}</a></td>
                                                                <td class="text-center"><a href="" class="jun" data-type="number" data-name="jun" data-pk="{{$temp->id}}">{{ number_format($temp->jun) }}</a></td>
                                                                <td class="text-center"><a href="" class="jul" data-type="number" data-name="jul" data-pk="{{$temp->id}}">{{ number_format($temp->jul) }}</a></td>
                                                                <td class="text-center"><a href="" class="ags" data-type="number" data-name="ags" data-pk="{{$temp->id}}">{{ number_format($temp->ags) }}</a></td>
                                                                <td class="text-center"><a href="" class="sep" data-type="number" data-name="sep" data-pk="{{$temp->id}}">{{ number_format($temp->sep) }}</a></td>
                                                                <td class="text-center"><a href="" class="okt" data-type="number" data-name="okt" data-pk="{{$temp->id}}">{{ number_format($temp->okt) }}</a></td>
                                                                <td class="text-center"><a href="" class="nov" data-type="number" data-name="nov" data-pk="{{$temp->id}}">{{ number_format($temp->nov) }}</a></td>
                                                                <td class="text-center"><a href="" class="des" data-type="number" data-name="des" data-pk="{{$temp->id}}">{{ number_format($temp->des) }}</a></td>
                                                                <td class="text-center">{{ number_format($temp->jan+$temp->feb+$temp->mar+$temp->apr+$temp->mei+$temp->jun+$temp->jul+$temp->ags+$temp->sep+$temp->okt+$temp->nov+$temp->des) }}</td>
                                                                
                                                                                    
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
                                            <div class="col-md-6 text-left ">
                                                <h4>Data Peristiwa Nikah Menurut Bulan Tahun {{ $tempstruk->tahun_priode }}</h4>
                                            </div>
                                        </div>

                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table id="tabel-tempatNikah" class="table style table-striped table-hover tabel-tempatNikah" style="width:100%">
                                                        <thead class="text-white">
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
                                                                <td class="text-center"><a href="" class="kua" data-type="number" data-name="kua" data-pk="{{$temp->id}}">{{ number_format($temp->kua) }}</a></td>
                                                                <td class="text-center"><a href="" class="luar_kua" data-type="number" data-name="luar_kua" data-pk="{{$temp->id}}">{{ number_format($temp->luar_kua) }}</a></td>
                                                                <td class="text-center">{{ number_format($temp->kua+$temp->luar_kua) }}</td>
                                                                
                                                                                    
                                                            </tr>
                                                        @endforeach 
                                                        </tbody>
                                                        </table>
                                                    </div>                            
                                                </div>                                                                
                                            </div>
                                    </div>    
                                </div> 

                                <!-- ============================== BALAI NIKAH ============================== -->

                <div class="tab-pane fade" id="bukunikah" role="tabpanel" aria-labelledby="bukunikah-tab">
                      
                      <div class="card card-warning shadow">
                          <div class="card-header">
                              <div class="col-md-6 text-left ">
                                  <h4>Data Buku dan KArtu Nikah Tahun {{ $tempstruk->tahun_priode }}</h4>
                              </div>
                          </div>

                              <div class="card-body">
                                  <div class="col-md-12">
                                      <div class="table-responsive">
                                          <table id="tabel-bukunikah" class="table style table-striped table-hover tabel-bukunikah" style="width:100%">
                                          <thead class="text-white">
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
                                                  <td class="text-center"><a href="" class="buku_nikah" data-type="number" data-name="buku_nikah" data-pk="{{$temp->id}}">{{ number_format($temp->buku_nikah) }}</a></td>
                                                  <td class="text-center"><a href="" class="kartu_nikah" data-type="number" data-name="kartu_nikah" data-pk="{{$temp->id}}">{{ number_format($temp->kartu_nikah) }}</a></td>
                                                  <td class="text-center">{{ number_format($temp->buku_nikah+$temp->kartu_nikah) }}</td>
                                                  
                                                                      
                                              </tr>
                                          @endforeach 
                                          </tbody>
                                          </table>
                                      </div>                            
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
        
        // ------------------------------ Tabel Tipologi KUA   

            $("#tabel-tipologi").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data TIPOLOGI KUA---------------------------------- 

       
            $('.type_a').editable({
                url:"update_kua/type_a",
                type:'number',
                pk:1,
                name:'type_a',
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

            $('.type_b').editable({
                url:"update_kua/type_b",
                type:'number',
                pk:1,
                name:'type_a',
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

            $('.type_c').editable({
                url:"update_kua/type_c",
                type:'number',
                pk:1,
                name:'type_c',
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

            $('.type_d').editable({
                url:"update_kua/type_d",
                type:'number',
                pk:1,
                name:'type_d',
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

            $('.type_d2').editable({
                url:"update_kua/type_d2",
                type:'number',
                pk:1,
                name:'type_d2',
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

        // ------------------------------ Tabel Data STATUS TANAH DAN KONDISI BANGUNAN KUA   

        $("#tabel-statuskua").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data STATUS TANAH DAN KONDISI BANGUNAN KUA---------------------------------- 

       
            $('.jml_serti').editable({
                url:"update_kua/jml_serti",
                type:'number',
                pk:1,
                name:'jml_serti',
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

            $('.jml_belum').editable({
                url:"update_kua/jml_belum",
                type:'number',
                pk:1,
                name:'jml_belum',
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

            $('.baik').editable({
                url:"update_kua/baik",
                type:'number',
                pk:1,
                name:'baik',
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

            $('.rsk_ringan').editable({
                url:"update_kua/rsk_ringan",
                type:'number',
                pk:1,
                name:'rsk_ringan',
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

            $('.rsk_sedang').editable({
                url:"update_kua/rsk_sedang",
                type:'number',
                pk:1,
                name:'rsk_sedang',
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


            // ------------------------------ Tabel Revitalisasi KUA   

        $("#tabel-revitalisasikua").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Revitalisasi KUA---------------------------------- 

       
            $('.rehab_ringan').editable({
                url:"update_kua/rehab_ringan",
                type:'number',
                pk:1,
                name:'rehab_ringan',
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

            $('.rehab_berat').editable({
                url:"update_kua/rehab_berat",
                type:'number',
                pk:1,
                name:'rehab_berat',
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

           // ------------------------------ Tabel Balai Nikah KUA   

        $("#tabel-balainikahkua").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Balai Nikah KUA---------------------------------- 

       
            $('.balai_nikah').editable({
                url:"update_kua/balai_nikah",
                type:'number',
                pk:1,
                name:'balai_nikah',
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

            // ------------------------------ Tabel Penghulu  Dibina========================= 

        $("#tabel-penghulu").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Penghulu -------------------------------- 

       
            $('.peng_pertama').editable({
                url:"update_kua/peng_pertama",
                type:'number',
                pk:1,
                name:'peng_pertama',
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

            
            $('.peng_muda').editable({
                url:"update_kua/peng_muda",
                type:'number',
                pk:1,
                name:'peng_muda',
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

            
            $('.peng_madya').editable({
                url:"update_kua/peng_madya",
                type:'number',
                pk:1,
                name:'peng_madya',
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

            
            $('.peng_utama').editable({
                url:"update_kua/peng_utama",
                type:'number',
                pk:1,
                name:'peng_utama',
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


             // ------------------------------ Tabel Penghulu  Dibina========================= 

        $("#tabel-penghuluDibina").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Penghulu -------------------------------- 

       
            $('.pembinaan_pertama').editable({
                url:"update_kua/pembinaan_pertama",
                type:'number',
                pk:1,
                name:'pembinaan_pertama',
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

            
            $('.pembinaan_muda').editable({
                url:"update_kua/pembinaan_muda",
                type:'number',
                pk:1,
                name:'pembinaan_muda',
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

            
            $('.pembinaan_madya').editable({
                url:"update_kua/pembinaan_madya",
                type:'number',
                pk:1,
                name:'pembinaan_madya',
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

            
            $('.pembinaan_utama').editable({
                url:"update_kua/pembinaan_utama",
                type:'number',
                pk:1,
                name:'pembinaan_utama',
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




            // ------------------------------ Tabel Tempat Nikah  

        $("#tabel-tempatNikah").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Tempat Nikah---------------------------------- 

       
            $('.kua').editable({
                url:"update_peristiwa/kua",
                type:'number',
                pk:1,
                name:'kua',
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

            $('.luar_kua').editable({
                url:"update_peristiwa/luar_kua",
                type:'number',
                pk:1,
                name:'luar_kua',
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


             // ------------------------------ Tabel Peristiwa Nikah  

        $("#tabel-peristiwa").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Peristiwa Nikah---------------------------------- 

       
            $('.jan').editable({
                url:"update_peristiwa/jan",
                type:'number',
                pk:1,
                name:'jan',
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

            $('.feb').editable({
                url:"update_peristiwa/feb",
                type:'number',
                pk:1,
                name:'feb',
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

            $('.mar').editable({
                url:"update_peristiwa/mar",
                type:'number',
                pk:1,
                name:'mar',
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

            $('.apr').editable({
                url:"update_peristiwa/apr",
                type:'number',
                pk:1,
                name:'apr',
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

            $('.mei').editable({
                url:"update_peristiwa/mei",
                type:'number',
                pk:1,
                name:'mei',
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
            $('.jun').editable({
                url:"update_peristiwa/jun",
                type:'number',
                pk:1,
                name:'jun',
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

            $('.jul').editable({
                url:"update_peristiwa/jul",
                type:'number',
                pk:1,
                name:'jul',
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

            $('.ags').editable({
                url:"update_peristiwa/ags",
                type:'number',
                pk:1,
                name:'ags',
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

            $('.sep').editable({
                url:"update_peristiwa/sep",
                type:'number',
                pk:1,
                name:'sep',
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

            $('.okt').editable({
                url:"update_peristiwa/okt",
                type:'number',
                pk:1,
                name:'okt',
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

            $('.nov').editable({
                url:"update_peristiwa/nov",
                type:'number',
                pk:1,
                name:'nov',
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

            $('.des').editable({
                url:"update_peristiwa/des",
                type:'number',
                pk:1,
                name:'des',
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


             // ------------------------------ Tabel Buku NIkah ============================  

        $("#tabel-bukunikah").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Buku NIkah---------------------------------- 

       
            $('.buku_nikah').editable({
                url:"update_peristiwa/buku_nikah",
                type:'number',
                pk:1,
                name:'buku_nikah',
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

            $('.kartu_nikah').editable({
                url:"update_peristiwa/kartu_nikah",
                type:'number',
                pk:1,
                name:'kartu_nikah',
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