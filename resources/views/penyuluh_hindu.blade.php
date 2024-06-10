@extends('layouts.web', ['title' => __('Data Penyuluh Agama Hindu')])
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
                                <a class="nav-link active" id="hindu_chart-tab" data-toggle="tab" href="#hindu_chart" role="tab" aria-controls="" aria-selected="false">Chart Penyuluh Hindu</a>
                            </li>
                            <li class="nav-item">  
                            <a class="nav-link " id="penyuluhhindu-tab" data-toggle="tab" href="#penyuluhhindu" role="tab" aria-controls="" aria-selected="false">Tabel Penyuluh Agama Hindu</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " id="penyuluhpns-tab" data-toggle="tab" href="#penyuluhpns" role="tab" aria-controls="" aria-selected="false">Tabel Penyuluh PNS Agama Hindu</a>       </li>
                            <li class="nav-item">   
                            <a class="nav-link " id="penyuluhnonpns-tab" data-toggle="tab" href="#penyuluhnonpns" role="tab" aria-controls="" aria-selected="false">Tabel Penyuluh Non PNS Agama Hindu</a>
                            </li>
                            
                        </ul>    
                        <br />
                            <div class="tab-content" id="myTabContent">

                            <!-- ------- Awal Chart----------------------- -->


                        <div class="tab-pane fade show active" id="hindu_chart" role="tabpanel" aria-labelledby="hindu_chart_tab">
                        
                                <div class="card card-warning shadow">
                                    <div class="card-header">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 "><h5>GRAFIK DATA PENYULUH AGAMA hindu </h5></div>
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
                                                    <h5 class="card-title">Grafik Penyuluh Agama Hindu</h5>
                                                        <div id="chart"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Penyuluh Agama Hindu PNS</h5>
                                                        <div id="chart2"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                        </div> 
                                        
                                        <div class="row p-2">
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Penyuluh Agama Hindu Non PNS</h5>
                                                        <div id="chart3"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            
                                        </div> 


                                    </div>
                                </div>    

                        </div>


                <!-- ------------------------------ End  ------------------------------  -->
                               
                            <!-- ------- TABEL Penyuluh Agama hindu---------------------- -->


                        <div class="tab-pane fade show " id="penyuluhhindu" role="tabpanel" aria-labelledby="penyuluhhindu-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12 ">
                                    
                                    <div class="row">
                                                <div class="col-md-8 "><h5> DATA PENYULUH AGAMA HINDU</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_hindu" aria-label="Default select example">
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
                                            <table id="tabel-hindu" class="table style table-striped table-hover tabel-hindu" style="width:100%">
                                            <thead  class="text-white" style="background-color:#5BBCFF">
                                            <tr class="text-center">
                                                    <th rowspan="2" >No</th>
                                                    <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                    <th colspan="2" >JENIS KELAMIN</th>
                                                    <th rowspan="2" >JUMLAH</th>
                                                    <th colspan="2" >STATUS</th>
                                                    <th rowspan="2" >JUMLAH</th>
                                                    
                                                </tr>
                                            <tr class="text-center">
                                                
                                                        <th>PRIA</th>
                                                        <th>WANITA</th>
                                                        <th>PNS</th>
                                                        <th>NON PNS</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                                @foreach ($data as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center">{{ number_format($temp->pns_pria+$temp->nonpns_pria) }}</td>
                                                    <td class="text-center">{{ number_format($temp->pns_wanita+$temp->nonpns_wanita) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->pns_pria+$temp->nonpns_pria+$temp->pns_wanita+$temp->nonpns_wanita) }}</b></td>
                                                    <td class="text-center">{{ number_format($temp->pns_pria+$temp->pns_wanita) }}</td>
                                                    <td class="text-center">{{ number_format($temp->nonpns_pria+$temp->nonpns_wanita) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->pns_pria+$temp->nonpns_pria+$temp->pns_wanita+$temp->nonpns_wanita) }}</b></td>
                                                    
                                                                        
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
                     <!-- ------- TABEL DATA PNS AGAMA hindu--------------------- -->


                     <div class="tab-pane fade" id="penyuluhpns" role="tabpanel" aria-labelledby="penyuluhpns-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA PNS AGAMA HINDU</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_pnshindu" aria-label="Default select example">
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
                                        <table id="tabel-pnshindu" class="table style table-striped table-hover tabel-pnshindu" style="width:100%">
                                           <thead class="text-white" style="background-color:#5BBCFF">
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
                                                    <td class="text-center">{{ number_format($temp->pns_pria) }}</td>
                                                    <td class="text-center">{{ number_format($temp->pns_wanita) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->pns_pria+$temp->pns_wanita) }}</b></td>
                                                    <td class="text-center">{{ number_format($temp->kurang_s1) }}</td>
                                                    <td class="text-center">{{ number_format($temp->s1) }}</td>
                                                    <td class="text-center">{{ number_format($temp->lebih_s1) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->kurang_s1+$temp->s1+$temp->lebih_s1) }}</b></td>
                                                    
                                                                        
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

                 <!-- ------- Penyuluh Agama hindu Non PNS---------------------- -->


                 <div class="tab-pane fade" id="penyuluhnonpns" role="tabpanel" aria-labelledby="penyuluhnonpns-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA PENYULUH AGAMA HINDU NON PNS</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_nonpnshindu" aria-label="Default select example">
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
                                        <table id="tabel-nonpnshindu" class="table style table-striped table-hover tabel-nonpnshindu" style="width:100%">
                                        <thead class="text-white" style="background-color:#5BBCFF">
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
                                                    <td class="text-center">{{ number_format($temp->nonpns_pria) }}</td>
                                                    <td class="text-center">{{ number_format($temp->nonpns_wanita) }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->nonpns_pria+$temp->nonpns_wanita) }}</b></td>
                                                    <td class="text-center">{{ number_format($temp->kurang_s1_non) }}</td>
                                                    <td class="text-center">{{ number_format($temp->s1_non) }}</td>
                                                    <td class="text-center">{{ number_format($temp->lebih_s1_non) }}</td>
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
        
             
        $("#tabel-hindu").dataTable({
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

        $("#tabel-pnshindu").dataTable({
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

            $("#tabel-nonpnshindu").dataTable({
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

 //====================== CHART PENYULUH AGAMA hindu ==================

 var ChartOptionsPenyuluhhindu = {
          series: [{
          data: @json($datachart_penyuluhhindu)
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
            'PRIA',
            'WANITA',
            'PNS',
            'NON PNS',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart = new ApexCharts(document.querySelector("#chart"), ChartOptionsPenyuluhhindu);
        chart.render();




//    ----------------------- CHART 2 ----------------------------------------------------------


//====================== CHART PENYULUH AGAMA hindu PNS==================
    

            
var ChartOptionsPenyuluhpnshindu= {
          series: [{
          data: @json($datachart_pnshindu)
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
            'PRIA',
            'WANITA',
            '< S1',
            'S1',
            '> S2',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart2 = new ApexCharts(document.querySelector("#chart2"), ChartOptionsPenyuluhpnshindu);
        chart2.render();



//    ----------------------- CHART 3 ----------------------------------------------------------


//====================== CHART PENYULUH AGAMA hindu PNS==================
    

            
var ChartOptionsPenyuluhnonpns = {
          series: [{
          data: @json($datachart_nonpnshindu)
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
            'PRIA',
            'WANITA',
            '< S1',
            'S1',
            '> S2',

          ],
          labels: {
            style: {
              fontSize: '12px'
            }
          }
        }
        };


        var chart3 = new ApexCharts(document.querySelector("#chart3"), ChartOptionsPenyuluhnonpns);
        chart3.render();


</script>

<script>

// ========================= untuk Mengubah Data Grafik Berdasarkan Tahun =======================


$('#pilih_tahun').on('change',function(){

  var url = 'get_chartkeagamaanhindu/'+this.value;

  $.ajax({
        url: url,
        // data: data,
        type: 'Get',
        dataType: 'json',
        async: true,
        cache: false,
        
        success: function (data) {
            
            var datatpenyuluhindu=data.datachart_penyuluhhindu;
            var datapns_hindu=data.datachart_pnshindu;
            var datanonpns_hindu=data.datachart_nonpnshindu;
            

            // ===== update data chart 1 ======

         

             chart.updateOptions({
  
                series: [{
                data: datatpenyuluhindu
                }]

              });

            // ============ Update Data Chart 2 =======

            chart2.updateOptions({
                series: [{
                data: datapns_hindu
                }]
                
            });


              // ============ Update Data Chart 3 =======

              chart3.updateOptions({
  
                series: [{
                data: datanonpns_hindu
                }]

              });

            
        }
    });


});


// =========================== untuk Mengubah Data Tabel Keagamaan Penyuluh hindu Berdasarkan tahun=================== 

$('#pilih_hindu').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-hindu').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanhindu/"+tahun+"/penyuluhhindu",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pria',
                      render: function(data,type,row) { 
                      
                          data = row.pns_pria+row.nonpns_pria;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'wanita',
                      render: function(data,type,row) { 
                      
                          data = row.pns_wanita+row.nonpns_wanita;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'jml_penyuluh',
                      render: function(data,type,row) { 
                      
                          data = row.pns_pria+row.nonpns_pria+row.pns_wanita+row.nonpns_wanita;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'pns',
                      render: function(data,type,row) { 
                      
                          data = row.pns_pria+row.pns_wanita;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },

                    {data: 'nonpns',
                      render: function(data,type,row) { 
                      
                          data = row.nonpns_pria+row.nonpns_wanita;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'jml_penyuluhindu',
                      render: function(data,type,row) { 
                      
                          data = row.pns_pria+row.nonpns_pria+row.pns_wanita+row.nonpns_wanita;
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

$('#pilih_pnshindu').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-pnshindu').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanhindu/"+tahun+"/penyuluhhindu",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pria',
                      render: function(data,type,row) { 
                      
                          data = row.pns_pria;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'wanita',
                      render: function(data,type,row) { 
                      
                          data = row.pns_wanita;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'jml_penyuluh',
                      render: function(data,type,row) { 
                      
                          data = row.pns_pria+row.pns_wanita;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },

                    {data: 'kurang_s1',
                      render: function(data,type,row) { 
                      
                          data = row.kurang_s1;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 's1',
                      render: function(data,type,row) { 
                      
                          data = row.s1;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },


                    {data: 'lebih_s1',
                      render: function(data,type,row) { 
                      
                          data = row.lebih_s1;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'jml_penyuluhindu',
                      render: function(data,type,row) { 
                      
                          data = row.kurang_s1+row.s1+row.lebih_s1;
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

       $('#pilih_nonpnshindu').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-nonpnshindu').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaanhindu/"+tahun+"/penyuluhhindu",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'pria',
                      render: function(data,type,row) { 
                      
                          data = row.nonpns_pria;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'wanita',
                      render: function(data,type,row) { 
                      
                          data = row.nonpns_wanita;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'jml_penyuluh',
                      render: function(data,type,row) { 
                      
                          data = row.nonpns_pria+row.nonpns_wanita;
                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },

                    {data: 'kurang_s1',
                      render: function(data,type,row) { 
                      
                          data = row.kurang_s1_non;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 's1',
                      render: function(data,type,row) { 
                      
                          data = row.s1_non;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },


                    {data: 'lebih_s1',
                      render: function(data,type,row) { 
                      
                          data = row.lebih_s1_non;
                          return ''+nf.format(data)+'';

                          }
                          ,sortable:false },

                    {data: 'jml_penyuluhindu',
                      render: function(data,type,row) { 
                      
                          data = row.kurang_s1_non+row.s1_non+row.lebih_s1_non;
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


