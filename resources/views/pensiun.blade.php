@extends('layouts.web', ['title' => __('Data PNS Pensiun dan Non PNS Kanwil Kemenag Prov. Kepulauan Bangka Belitung')])
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
                                <a class="nav-link active" id="pns_chart-tab" data-toggle="tab" href="#pns_chart" role="tab" aria-controls="" aria-selected="false">Chart</a>
                            </li>
                            <li class="nav-item">  
                             <a class="nav-link " id="pns_jkgol-tab" data-toggle="tab" href="#pns_jkgol" role="tab" aria-controls="" aria-selected="false">Jenis Kelamin & Golongan</a>
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" id="pns_kualifikasi-tab" data-toggle="tab" href="#pns_kualifikasi" role="tab" aria-controls="" aria-selected="false">Kualifikasi</a>
                            </li>
                            <li class="nav-item">     
                                <a class="nav-link" id="pns_agama-tab" data-toggle="tab" href="#pns_agama" role="tab" aria-controls="" aria-selected="false">Agama</a>
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" id="nonpns_kualifikasi-tab" data-toggle="tab" href="#nonpns_kualifikasi" role="tab" aria-controls="" aria-selected="false">Non PNS</a>
                            </li>
                        </ul>    
                        <br />
                            <div class="tab-content" id="myTabContent">

                            <!-- ------- Awal Chart----------------------- -->


                        <div class="tab-pane fade show active" id="pns_chart" role="tabpanel" aria-labelledby="pns_chart_tab">
                        
                                <div class="card card-warning shadow">
                                    <div class="card-header">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 "><h5>GRAFIK DATA PNS PENSIUN DAN NON PNS KEMENAG BANGKA BELITUNG </h5></div>
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
                                                    <h5 class="card-title">Grafik Persentase Jumlah PNS Pensiun Kemenag Babel</h5>
                                                        <div id="chart"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Jumlah PNS Pensiun Berdasarkan Kualifikasi Pendidiakn</h5>
                                                        <div id="chart2"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                        </div> 
                                        
                                        <div class="row p-2">
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Jumlah PNS Pensiun Berdasarkan Agama</h5>
                                                        <div id="chart3"></div>
                                                    </div>
                                                </div>                  
                                            </div>

                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Jumlah Non PNS</h5>
                                                        <div id="chart4"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            
                                        </div> 


                                    </div>
                                </div>    

                        </div>
                <!-- ------------------------------ End  ------------------------------  -->
                               
                            <!-- ------- awal Tabel BERDASARKAN JENIS KELAMIN DAN GOLONGAN----------------------- -->


                        <div class="tab-pane fade show " id="pns_jkgol" role="tabpanel" aria-labelledby="pns_jkgol_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12 ">
                                    
                                    <div class="row">
                                                <div class="col-md-8 "><h5> DATA PNS PENSIUN MENURUT JENIS KELAMIN DAN GOLONGAN</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_jkgol" aria-label="Default select example">
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
                                            <table id="tabel-pns_jkgol" class="table style table-striped table-hover tabel-pns_jkgol" style="width:100%">
                                            <thead  class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2" text-align="center">UNIT KERJA</th>
                                                    <th colspan="2" text-align="center">JENIS KELAMIN</th>
                                                    <th rowspan="2">JUMLAH</th>
                                                    <th colspan="4" text-align="center">GOLONGAN</th>
                                                    <th rowspan="2">JUMLAH</th>
                                                    
                                                </tr>

                                                <tr class="text-center">
                                                    <th >PRIA</th>
                                                    <th >WANITA</th>
                                                    <th >I</th>
                                                    <th >II</th>
                                                    <th >III</th>
                                                    <th >IV</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datapns_jkgol as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center">{{ number_format($temp->pria) }}</td>
                                                        <td class="text-center">{{ number_format($temp->wanita) }}</td>
                                                        <td class="text-center"><strong>{{ number_format($temp->wanita+$temp->pria) }}</strong></td>
                                                        <td class="text-center">{{ number_format($temp->gol_1) }}</td>
                                                        <td class="text-center">{{ number_format($temp->gol_2) }}</td>
                                                        <td class="text-center">{{ number_format($temp->gol_3) }}</td>
                                                        <td class="text-center">{{ number_format($temp->gol_4) }}</td>
                                                        <td class="text-center"><strong>{{ number_format($temp->gol_1+$temp->gol_2+$temp->gol_3+$temp->gol_4) }}</strong></td>
                                                                            
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
                    
                 <!-- ------- awal Tabel BERDASARKAN KUALIFIKASI ---------------------- -->


                 <div class="tab-pane fade " id="pns_kualifikasi" role="tabpanel" aria-labelledby="pns_kualifikasi_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA PNS PENSIUN MENURUT KUALIFIKASI PENDIDIKAN</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_kualifikasi" aria-label="Default select example">
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
                                            <table id="tabel-kualifikasi" class="table style table-striped table-hover tabel-kualifikasi" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2" text-align="center">UNIT KERJA</th>
                                                    <th colspan="4" >KUALIFIKASI PENDIDIKAN</th>
                                                    <th rowspan="2">JUMLAH</th>
                                                    
                                                </tr>

                                                <tr class="text-center">
                                                    <th > < S1 </th>
                                                    <th >S1</th>
                                                    <th >S2</th>
                                                    <th >S3</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datapns_kualifikasi as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center">{{ number_format($temp->min_s1) }}</td>
                                                        <td class="text-center">{{ number_format($temp->s1) }}</td>
                                                        <td class="text-center">{{ number_format($temp->s2) }}</td>
                                                        <td class="text-center">{{ number_format($temp->s3) }}</td>
                                                        <td class="text-center">{{ number_format($temp->min_s1+$temp->s1+$temp->s2+$temp->s3) }}</td>
                                                                            
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

                 <!-- ------- awal Tabel BERDASARKAN AGAMA---------------------- -->


                 <div class="tab-pane fade show " id="pns_agama" role="tabpanel" aria-labelledby="pns_agama_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA PNS PENSIUN MENURUT AGAMA </h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_agama" aria-label="Default select example">
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
                                            <table id="tabel-agama" class="table style table-striped table-hover tabel-agama" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF">
                                                <tr class="text-center">
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2" text-align="center">UNIT KERJA</th>
                                                    <th colspan="6">AGAMA</th>
                                                    <th rowspan="2">JUMLAH</th>
                                                    
                                                </tr>

                                                <tr class="text-center">
                                                    <th >ISLAM</th>
                                                    <th >KRISTEN</th>
                                                    <th >KATOLIK</th>
                                                    <th >HINDU</th>
                                                    <th >BUDDHA</th>
                                                    <th >KHONGHUCU</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datapns_agama as $temp)
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
                                                        <td class="text-center"><strong>{{ number_format($temp->islam+$temp->kristen+$temp->katolik+$temp->hindu+$temp->buddha+$temp->khonghucu) }}</strong></td>
                                                                            
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

                 <!-- ------- awal Tabel IJIN BELAJAR BERDASARKAN KUALIFIKASI ---------------------- -->


                 <div class="tab-pane fade show" id="nonpns_kualifikasi" role="tabpanel" aria-labelledby="nonpns_kualifikasi_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                            <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA NON-PNS MENURUT KUALIFIKASI PENDIDIKAN</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_nonpnskualifikasi" aria-label="Default select example">
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
                                            <table id="tabel-nonpnskualifikasi" class="table style table-striped table-hover tabel-nonpnskualifikasi" style="width:100%">
                                            <thead class="text-white" style="background-color:#5BBCFF"> 
                                                <tr class="text-center">
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2" text-align="center">UNIT KERJA</th>
                                                    <th colspan="4">KUALIFIKASI PENDIDIKAN</th>
                                                    <th rowspan="2">JUMLAH</th>
                                                    
                                                </tr>

                                                <tr class="text-center">
                                                    <th > < S1 </th>
                                                    <th >S1</th>
                                                    <th >S2</th>
                                                    <th >S3</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datanonpns_kualifikasi as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center">{{ number_format($temp->min_s1) }}</td>
                                                        <td class="text-center">{{ number_format($temp->s1) }}</td>
                                                        <td class="text-center">{{ number_format($temp->s2) }}</td>
                                                        <td class="text-center">{{ number_format($temp->s3) }}</td>
                                                        <td class="text-center"><strong>{{ number_format($temp->min_s1+$temp->s1+$temp->s2+$temp->s3) }}</strong></td>
                                                                            
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
        
             
        $("#tabel-pns_jkgol").dataTable({
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
        

            

       
        
               

            // =============== Bedasarkan Kualifikasi Pendidikan ===================== 

            $("#tabel-kualifikasi").dataTable({
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
        

            

       
        // ====================== Berdasarkan Agama ======================== 

        $("#tabel-agama").dataTable({
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


         // =============== Ijin Belajar Bedasarkan Kualifikasi Pendidikan ===================== 

         $("#tabel-nonpnskualifikasi").dataTable({
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
    var ChartOptionsPns = {
          series: @json($jml_pns),
          labels:@json($kd_satker),
          chart: {
          width: 510,
          type: 'donut',
        },
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

        var chart = new ApexCharts(document.querySelector("#chart"), ChartOptionsPns);
        chart.render();
      
        
        
           //====================== CHART BERDASARKAN KUALIFIKASI PENDIDIKAN ==================
    

            
          var ChartOptionsKualifikasi = {
          series: [{
          data: @json($datachart_kualifikasi)
        }],
          chart: {
          height: 300,
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
            '< S1',
            'S1',
            'S2',
            'S3', 
          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart2 = new ApexCharts(document.querySelector("#chart2"), ChartOptionsKualifikasi);
        chart2.render();


        //================================= Grafik Berdasarkan Agama ================

  

        var ChartOptionsAgama = {
          series: [{
          data: @json($datachart_agama)
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
            'Islam',
            'Kristen',
            'Katolik',
            'Hindu',
            'Buddha',
            'Khonghucu', 
          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart3 = new ApexCharts(document.querySelector("#chart3"), ChartOptionsAgama);
        chart3.render();
      
      
        var options = {
          series: [{
            name: "Desktops",
            data: @json($datachart_nonpnskualifikasi)
        }],
          chart: {
          height: 290,
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
          categories: [
            '< S1',
            'S1',
            'S2',
            'S3', 
          ],
        }
        };

        var chart4 = new ApexCharts(document.querySelector("#chart4"), options);
        chart4.render();
      
    
</script>

<script>

// ========================= untuk Mengubah Data Grafik Berdasarkan Tahun =======================


$('#pilih_tahun').on('change',function(){

  var url = 'get_charttatakelolaPnsPensiun/'+this.value;

  $.ajax({
        url: url,
        // data: data,
        type: 'Get',
        dataType: 'json',
        async: true,
        cache: false,
        
        success: function (data) {
            
            var datakualifikasi=data.datachart_kualifikasi;
            var data_nonpnskualifikasi=data.datachart_nonpnskualifikasi;
            var data_agama=data.datachart_agama;
            var datajml_pns=data.jml_pns;
      

            // ===== update data chart 1 ======

         

             chart.updateOptions({
  
                    series: data.jml_pns,
                    labels:data.kd_satker,
                    chart: {
                    width: 510,
                    type: 'donut',
                  }
              });

            // ============ Update Data Chart 2 =======

            chart2.updateSeries([{
                
                data:  datakualifikasi 
            }]);


              // ============ Update Data Chart 3 =======

              chart3.updateSeries([{
                
                data: data_agama 
            }]);



              // ============ Update Data Chart 3 =======

              chart4.updateSeries([{
                
                data: data_nonpnskualifikasi
            }]);

           
            
        }
    });


});

// =========================== untuk Mengubah Data Tabel Tatakelola PNS Jenis Kelamin dan Golongan Berdasarkan Tahun=================== 

$('#pilih_jkgol').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-pns_jkgol').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaPnsPensiun/"+tahun+"/jkgol",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pria', name: 'pria',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'wanita', name: 'wanita',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_kel',
                      render: function(data,type,row) { 
                      
                          data = row.pria+row.wanita;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },

                {data: 'gol_1', name: 'gol_1',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'gol_2', name: 'gol_2',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'gol_3', name: 'gol_3',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'gol_4', name: 'gol_4',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_gol',
                      render: function(data,type,row) { 
                      
                          data = row.gol_1+row.gol_2+row.gol_3+row.gol_4;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5,6,7,8,9], // your case first column
                            "className": "text-center"
                        }
                    ],"destroy" : true
            });
       });

       // =========================== untuk Mengubah Data Tabel Tatakelola PNS Jenis Kelamin dan Golongan Berdasarkan Tahun=================== 


       $('#pilih_kualifikasi').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-kualifikasi').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaPnsPensiun/"+tahun+"/kualifikasi",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'min_s1', name: 'min_s1',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 's1', name: 's1',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                {data: 's2', name: 's2',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 's3', name: 's3',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_kualifikasi',
                      render: function(data,type,row) { 
                      
                          data = row.min_s1+row.s1+row.s2+row.s3;
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

       $('#pilih_agama').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-agama').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaPnsPensiun/"+tahun+"/agama",
                
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

                    {data: 'jml_agama',
                      render: function(data,type,row) { 
                      
                          data = row.islam+row.kristen+row.katolik+row.hindu+row.buddha+row.khonghucu;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5,6,7,8], // your case first column
                            "className": "text-center"
                        }
                    ],"destroy" : true
            });
       });

// =========================== untuk Mengubah Data Tabel Tatakelola Tabel Ijin Belajar=================== 


$('#pilih_nonpnskualifikasi').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-nonpnskualifikasi').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaPnsPensiun/"+tahun+"/nonpnskualifikasi",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'min_s1', name: 'min_s1',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 's1', name: 's1',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                {data: 's2', name: 's2',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 's3', name: 's3',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jml_kualifikasi',
                      render: function(data,type,row) { 
                      
                          data = row.min_s1+row.s1+row.s2+row.s3;
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


</script>


@endpush 


