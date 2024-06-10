@extends('layouts.web', ['title' => __('Data Tanah Wakaf')])
@push('style')
                   

    <link href="{{ asset('web/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>

   
    <link href="{{ asset('web/css/buttons.dataTables.min.css') }}" rel="stylesheet"> 
    <style>
        .table>thead>tr>th {
            background-color: lightgoldenrodyellow;
            }

            .table>thead>tr>th.vert-align {
            vertical-align: middle;
            }

            th.rotated-text {
            position: relative;
            height: 175px;
            white-space: nowrap;
            transform: rotate(-90deg) translateY(-50%);
            padding: 0 !important;
            font-size: 0.875em;
            }

            th.rotated-text>div {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: rotate(-90deg) translateY(-50%);
            transform-origin: 0 0;
            }

            th.rotated-text>div>span {
            display: inline-block;
            padding: 0px 15px;
            padding-left: 5px;
            }

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
                                <a class="nav-link active" id="wakaf_chart-tab" data-toggle="tab" href="#wakaf_chart" role="tab" aria-controls="" aria-selected="false">Chart Penyuluh wakaf</a>
                            </li>
                            <li class="nav-item">  
                            <a class="nav-link " id="statuswakaf-tab" data-toggle="tab" href="#statuswakaf" role="tab" aria-controls="" aria-selected="false">Tabel Status dan Luas Tanah wakaf</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " id="pemanfaatanwakaf-tab" data-toggle="tab" href="#pemanfaatanwakaf" role="tab" aria-controls="" aria-selected="false">Tabel Pemanfaatan Tanah wakaf</a>       </li>
                            <li class="nav-item">   
                            <a class="nav-link " id="wakafproduktif-tab" data-toggle="tab" href="#wakafproduktif" role="tab" aria-controls="" aria-selected="false">Tabel Wakaf Produktif</a>
                            </li>
                            
                        </ul>    
                        <br />
                            <div class="tab-content" id="myTabContent">

                            <!-- ------- Awal Chart----------------------- -->


                        <div class="tab-pane fade show active" id="wakaf_chart" role="tabpanel" aria-labelledby="wakaf_chart_tab">
                        
                                <div class="card card-warning shadow">
                                    <div class="card-header">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 "><h5>GRAFIK DATA  WAKAF</h5></div>
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
                                                    <h5 class="card-title">Grafik Luas Tanah Wakaf</h5>
                                                        <div id="chart"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Status Tanah Wakaf</h5>
                                                        <div id="chart2"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                        </div> 
                                        
                                        <div class="row p-2">
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Pemanfaatan Tanah Wakaf</h5>
                                                        <div id="chart3"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Wakaf Produktif</h5>
                                                        <div id="chart4"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            
                                        </div> 


                                    </div>
                                </div>    

                        </div>


                <!-- ------------------------------ End  ------------------------------  -->
                               
                            <!-- ------- TABEL STATUS WAKAF---------------------- -->


                        <div class="tab-pane fade show " id="statuswakaf" role="tabpanel" aria-labelledby="statuswakaf-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12 ">
                                    
                                    <div class="row">
                                                <div class="col-md-8 "><h5> DATA LOKASI, STATUS DAN LUAS TANAH WAKAF</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_wakaf" aria-label="Default select example">
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
                                            <table id="tabel-statuswakaf" class="table style table-striped table-hover tabel-statuswakaf" style="width:100%">
                                            <thead  class="text-white" style="background-color:#5BBCFF">
                                            <tr class="text-center">
                                                    <th rowspan="2" >NO</th>
                                                    <th rowspan="2" text-align="center">KABUPATEN / KOTA</th>
                                                    <th rowspan="2" >JUMLAH</th>
                                                    <th rowspan="2" >LUAS[Ha]</th>
                                                    <th colspan="2" >SUDAH SERTIFIKASI</th>
                                                    <th colspan="2" >BELUM SERTIFIKASI</th>
                                                    
                                                </tr>
                                            <tr class="text-center">
                                                
                                                        <th>JUMLAH</th>
                                                        <th>LUAS[Ha]</th>
                                                        <th>JUMLAH</th>
                                                        <th>LUAS[Ha]</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datastatuswakaf as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->jml_serti+$temp->jml_belum) }}</b></td>
                                                    <td class="text-center"><b>{{ number_format($temp->luas_serti+$temp->luas_belum,2) }}</b></td>
                                                   
                                                    <td class="text-center">{{ number_format($temp->jml_serti) }}</td>
                                                    <td class="text-center">{{ number_format($temp->luas_serti,2) }}</td>
                                                    <td class="text-center">{{ number_format($temp->jml_belum) }}</td>
                                                    <td class="text-center">{{ number_format($temp->luas_belum,2) }}</td>
                                                    
                                                    
                                                                        
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
                     <!-- ------- TABEL DATA WAKAF MENURUT PEMANFAATANNYA--------------------- -->


                     <div class="tab-pane fade" id="pemanfaatanwakaf" role="tabpanel" aria-labelledby="pemanfaatanwakaf-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA WAKAF BERDASARKAN MANFAAT</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_pemanfaatanwakaf" aria-label="Default select example">
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
                                        <table id="tabel-pemanfaatanwakaf" class="table style table-striped table-hover tabel-pemanfaatanwakaf" style="width:100%">
                                           <thead class="text-white" style="background-color:#5BBCFF">
                                           <tr class="text-center">
                                                  <th>NO</th>
                                                  <th  text-align="center">KABUPATEN / KOTA</th>
                                                  <th>MASJID</th>
                                                  <th>MUSHOLLA</th>
                                                  <th>SEKOLAH</th>
                                                  <th>PESANTREN</th>
                                                  <th>MAKAM</th>
                                                  <th>SOSIAL LAINNYA</th>
                                                  <th>JUMLAH</th>
                                                    
                                                </tr>
                                            
                                            </thead>
                                            <tbody class="list bg-light">
                                                @foreach ($datawakafmanfaat as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center">{{ number_format($temp->masjid) }}</td>
                                                    <td class="text-center">{{ number_format($temp->mushalla) }}</td>
                                                    <td class="text-center">{{ number_format($temp->sekolah) }}</td>
                                                    <td class="text-center">{{ number_format($temp->pesantren) }}</td>
                                                    <td class="text-center">{{ number_format($temp->makam) }}</td>
                                                    <td class="text-center">{{ number_format($temp->sosial_lain) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->masjid+$temp->mushalla+$temp->sekolah+$temp->pesantren+$temp->makam+$temp->sosial_lain) }}</b></td>
                                                    
                                                                        
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

                 <!-- ------- DATA WAKAF PRODUKTIF--------------------- -->


                 <div class="tab-pane fade" id="wakafproduktif" role="tabpanel" aria-labelledby="wakafproduktif-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA WAKAF PRODUKTIF</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_wakafproduktif" aria-label="Default select example">
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
                                        <table id="tabel-wakafproduktif" class="table style table-striped table-hover tabel-wakafproduktif" style="width:100%">
                                        <thead class="text-white" style="background-color:#5BBCFF">
                                        <tr class="text-center">
                                                  <th>NO</th>
                                                  <th text-align="center">KABUPATEN / KOTA</th>
                                                  <th class="rotated-text">PERKEBUNAN</th>
                                                  <th class=" rotated-text">KOPERASI</th>
                                                  <th class=" rotated-text">RUMAH SAKIT</th>
                                                  <th class=" rotated-text">RUMAH SEWA</th>
                                                  <th class=" rotated-text">PERIKANAN</th>
                                                  <th class=" rotated-text">TOKO SEWA</th>
                                                  <th class=" rotated-text">PERTANIAN</th>
                                                  <th class=" rotated-text">SPBU</th>
                                                  <th class=" rotated-text">PERKANTORAN SEWA</th>
                                                  <th class=" rotated-text">KLINIK</th>
                                                  <th class=" rotated-text">PETERNAKAN</th>
                                                  <th class=" rotated-text">LAINNYA</th>
                                                  
                                              </tr>
                                          
                                          </thead>
                                          <tbody class="list bg-light">
                                              @foreach ($datawakafproduktif as $temp)
                                              <tr >
                                                  <td class="text-center">{{ $temp->idx}}</td>
                                                  <!-- <td>{{ $temp->id }}</td> -->
                                                  <td>{{ $temp->nama }}</td>
                                                  <td class="text-center">{{ number_format($temp->perkebunan) }}</td>
                                                  <td class="text-center">{{ number_format($temp->koperasi) }}</td>
                                                  <td class="text-center">{{ number_format($temp->rumah_sakit) }}</td>
                                                  <td class="text-center">{{ number_format($temp->rumah_sewa) }}</td>
                                                  <td class="text-center">{{ number_format($temp->perikanan) }}</td>
                                                  <td class="text-center">{{ number_format($temp->toko_sewa) }}</td>
                                                  <td class="text-center">{{ number_format($temp->pertanian) }}</td>
                                                  <td class="text-center">{{ number_format($temp->spbu) }}</td>
                                                  <td class="text-center">{{ number_format($temp->perkantoran_sewa) }}</td>
                                                  <td class="text-center">{{ number_format($temp->klinik) }}</td>
                                                  <td class="text-center">{{ number_format($temp->peternakan) }}</td>
                                                  <td class="text-center">{{ number_format($temp->lainnya) }}</td>
                                                  
                                                                      
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
        
             
        $("#tabel-statuswakaf").dataTable({
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

        $("#tabel-pemanfaatanwakaf").dataTable({
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
        

           

            // =============== Wakaf Produktif ===================== 

            $("#tabel-wakafproduktif").dataTable({
                    
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

 //====================== CHART PENYULUH AGAMA wakaf ==================

 var ChartOptionsstatuswakaf = {
          series: [{
          data: @json($datachart_luaswakaf)
        }],
          chart: {
          height: 380,
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
            'JUMLAH',
            'LUAS[Ha]',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart = new ApexCharts(document.querySelector("#chart"), ChartOptionsstatuswakaf);
        chart.render();




// //    ----------------------- CHART 2 ----------------------------------------------------------


// //====================== CHART STATUS TANAH WAKAF==================
    

            
var ChartOptionsStatuswakaf= {
    series: @json($series_statuswakaf),
          chart: {
          type: 'bar',
          height: 380
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '65%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: @json($categories_statuswakaf),
        },
        yaxis: {
          
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart2 = new ApexCharts(document.querySelector("#chart2"), ChartOptionsStatuswakaf);
        chart2.render();



// //    ----------------------- CHART 3 ----------------------------------------------------------


// //====================== CHART PEMANFAATAN TANAH WAKAF==================
    
var ChartOptionsWakafmanfaat = {
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
                            label: ["TANAH WAKAF", "BANGKA-BELITUNG"],
                            fontSize: "20px",
                        },
                    },
                },
            },
        },
        series: @json($chart_wakafmanfaat_data),
        chart: {
            type: 'donut',
            height: '475px',
        },
        labels: @json($chart_wakafmanfaat_nama),
        legend: {
            position: 'bottom',
        },
        dataLabels: {
            enabled: true,
            formatter: function(val, opts) {
                return opts.w.globals.series[opts.seriesIndex] ;
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

    var chart3 = new ApexCharts(document.querySelector("#chart3"), ChartOptionsWakafmanfaat);
    chart3.render();


    // ============================= Wakaf Produktif ==================
    
    

    var ChartOptionswakafproduktif = {
          series: [{
          data: @json($datachart_wakafproduktif)
        }],
          chart: {
          height: 380,
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
            'PERKEBUNAN',
            'KOPERASI',
            'RUMAH SAKIT',
            'RUMAH SEWA',
            'PERIKANAN',
            'TOKO SEWA',
            'PERTANIAN',
            'SPBU',
            'PERKANTORAN SEWA',
            'KLINIK',
            'PETERNAKAN',
            'LAINNYA',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart4 = new ApexCharts(document.querySelector("#chart4"), ChartOptionswakafproduktif);
        chart4.render();


            


</script>

<script>

// ========================= untuk Mengubah Data Grafik Berdasarkan Tahun =======================


$('#pilih_tahun').on('change',function(){

  var url = 'get_chartkeagamaanwakaf/'+this.value;

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
  
                series: [{
                    data: data.chart_wakafmanfaat_data
                    }]

              });

            // ============ Update Data Chart 2 =======

            chart2.updateOptions({
                series: data.series_statuswakaf
                
            });


              // ============ Update Data Chart 3 =======

              chart3.updateOptions({
  
                series: data.chart_wakafmanfaat_data

              });



              // ============ Update Data Chart 3 =======

              chart4.updateOptions({
  
                series: [{
                    data: data.datachart_wakafproduktif
                    }]

            });

            
        }
    });


});


// =========================== untuk Mengubah Data Tabel Keagamaan Penyuluh wakaf Berdasarkan tahun=================== 

$('#pilih_wakaf').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-statuswakaf').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanwakaf/"+tahun+"/datastatuswakaf",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'jumlah',
                      render: function(data,type,row) { 
                      
                          data = row.jml_serti+row.jml_belum;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },

                    {data: 'luas',
                      render: function(data,type,row) { 
                      
                          data = row.luas_serti+row.luas_belum;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },

                    {data: 'jml_serti',
                      render: function(data,type,row) { 
                      
                          data = row.jml_serti;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'luas_serti',
                      render: function(data,type,row) { 
                      
                          data = row.luas_serti;
                          return nf.format(data);

                          }
                          ,sortable:false },

                    {data: 'jml_belum',
                      render: function(data,type,row) { 
                      
                          data = row.jml_belum;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'luas_belum',
                      render: function(data,type,row) { 
                      
                          data = row.luas_belum;
                          return ''+nf.format(data)+'';

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

$('#pilih_pemanfaatanwakaf').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-pemanfaatanwakaf').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanwakaf/"+tahun+"/datawakafmanfaat",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'masjid',
                      render: function(data,type,row) { 
                      
                          data = row.masjid;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'mushalla',
                      render: function(data,type,row) { 
                      
                          data = row.mushalla;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'sekolah',
                      render: function(data,type,row) { 
                      
                          data = row.sekolah;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },

                    {data: 'pesantren',
                      render: function(data,type,row) { 
                      
                          data = row.pesantren;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'makam',
                      render: function(data,type,row) { 
                      
                          data = row.makam;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },


                    {data: 'sosial_lain',
                      render: function(data,type,row) { 
                      
                          data = row.sosial_lain;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'jml_pemanfaatanwakaf',
                      render: function(data,type,row) { 
                      
                          data = row.masjid+row.mushalla+row.sekolah+row.pesantren+row.pesantren+row.makam+row.sosial_lain;
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

       $('#pilih_wakafproduktif').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-wakafproduktif').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanwakaf/"+tahun+"/datawakafproduktif",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'perkebunan',
                      render: function(data,type,row) { 
                      
                          data = row.perkebunan;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'koperasi',
                      render: function(data,type,row) { 
                      
                          data = row.koperasi;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'rumah_sakit',
                      render: function(data,type,row) { 
                      
                          data = row.rumah_sakit;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'rumah_sewa',
                      render: function(data,type,row) { 
                      
                          data = row.rumah_sewa;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'perikanan',
                      render: function(data,type,row) { 
                      
                          data = row.perikanan;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },


                    {data: 'toko_sewa',
                      render: function(data,type,row) { 
                      
                          data = row.toko_sewa;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    
                    {data: 'pertanian',
                      render: function(data,type,row) { 
                      
                          data = row.pertanian;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'spbu',
                      render: function(data,type,row) { 
                      
                          data = row.spbu;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'perkantoran_sewa',
                      render: function(data,type,row) { 
                      
                          data = row.perkantoran_sewa;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'klinik',
                      render: function(data,type,row) { 
                      
                          data = row.klinik;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'peternakan',
                      render: function(data,type,row) { 
                      
                          data = row.peternakan;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'lainnya',
                      render: function(data,type,row) { 
                      
                          data = row.lainnya;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'jml_wakafproduktif',
                      render: function(data,type,row) { 
                      
                          data = row.perkebunan+row.koperasi+row.rumah_sakit+row.rumah_sewa+row.perikanan+row.toko_sewa+row.pertanian+row.spbu+row.perkantoran_sewa+row.klinik+row.peternakan+row.lainnya;
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


