@extends('layouts.web', ['title' => __('Data Penyuluh Agama Kristen')])
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
                                <a class="nav-link active" id="kristen_chart-tab" data-toggle="tab" href="#kristen_chart" role="tab" aria-controls="" aria-selected="false">Chart Penyuluh Kristen</a>
                            </li>
                            <li class="nav-item">  
                            <a class="nav-link " id="penyuluhkristen-tab" data-toggle="tab" href="#penyuluhkristen" role="tab" aria-controls="" aria-selected="false">Tabel Penyuluh Agama Kristen</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " id="penyuluhpns-tab" data-toggle="tab" href="#penyuluhpns" role="tab" aria-controls="" aria-selected="false">Tabel Penyuluh PNS Agama Kristen</a>       </li>
                            <li class="nav-item">   
                            <a class="nav-link " id="penyuluhnonpns-tab" data-toggle="tab" href="#penyuluhnonpns" role="tab" aria-controls="" aria-selected="false">Tabel Penyuluh Non PNS Agama Kristen</a>
                            </li>
                            
                        </ul>    
                        <br />
                            <div class="tab-content" id="myTabContent">

                            <!-- ------- Awal Chart----------------------- -->


                        <div class="tab-pane fade show active" id="kristen_chart" role="tabpanel" aria-labelledby="kristen_chart_tab">
                        
                                <div class="card card-warning shadow">
                                    <div class="card-header">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 "><h5>GRAFIK DATA PENYULUH AGAMA KRISTEN </h5></div>
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
                                                    <h5 class="card-title">Grafik Penyuluh Agama Kristen</h5>
                                                        <div id="chart"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Penyuluh Agama Kristen PNS</h5>
                                                        <div id="chart2"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                        </div> 
                                        
                                        <div class="row p-2">
                                            <div class="col-md-6 ">
                                                <div class="card" >
                                                    <div class="card-body">
                                                    <h5 class="card-title">Grafik Penyuluh Agama Kristen Non PNS</h5>
                                                        <div id="chart3"></div>
                                                    </div>
                                                </div>                  
                                            </div>
                                            
                                        </div> 


                                    </div>
                                </div>    

                        </div>


                <!-- ------------------------------ End  ------------------------------  -->
                               
                            <!-- ------- TABEL Penyuluh Agama kristen---------------------- -->


                        <div class="tab-pane fade show " id="penyuluhkristen" role="tabpanel" aria-labelledby="penyuluhkristen-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12 ">
                                    
                                    <div class="row">
                                                <div class="col-md-8 "><h5> DATA PENYULUH AGAMA KRISTEN</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_kristen" aria-label="Default select example">
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
                                            <table id="tabel-kristen" class="table style table-striped table-hover tabel-kristen" style="width:100%">
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
                     <!-- ------- TABEL DATA PNS AGAMA kristen--------------------- -->


                     <div class="tab-pane fade" id="penyuluhpns" role="tabpanel" aria-labelledby="penyuluhpns-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA PNS AGAMA KRISTEN</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_pnskristen" aria-label="Default select example">
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
                                        <table id="tabel-pnskristen" class="table style table-striped table-hover tabel-pnskristen" style="width:100%">
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

                 <!-- ------- Penyuluh Agama kristen Non PNS---------------------- -->


                 <div class="tab-pane fade" id="penyuluhnonpns" role="tabpanel" aria-labelledby="penyuluhnonpns-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-12  ">
                                    <div class="row">
                                                <div class="col-md-8 "><h5>DATA PENYULUH AGAMA KRISTEN NON PNS</h5></div>
                                                    <div class="col-md-2 text-center "><h5>PILIH TAHUN</h5>
                                                        
                                                    </div>
                                                    <div class="col-md-2 text-left ">
                                                        <select class="form-select form-select-lg" id="pilih_nonpnskristen" aria-label="Default select example">
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
                                        <table id="tabel-nonpnskristen" class="table style table-striped table-hover tabel-nonpnskristen" style="width:100%">
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
        
             
        $("#tabel-kristen").dataTable({
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

        $("#tabel-pnskristen").dataTable({
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

            $("#tabel-nonpnskristen").dataTable({
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

 //====================== CHART PENYULUH AGAMA kristen ==================

 var ChartOptionsPenyuluhkristen = {
          series: [{
          data: @json($datachart_penyuluhkristen)
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


        var chart = new ApexCharts(document.querySelector("#chart"), ChartOptionsPenyuluhkristen);
        chart.render();




//    ----------------------- CHART 2 ----------------------------------------------------------


//====================== CHART PENYULUH AGAMA KRISTEN PNS==================
    

            
var ChartOptionsPenyuluhpnskristen= {
          series: [{
          data: @json($datachart_pnskristen)
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


        var chart2 = new ApexCharts(document.querySelector("#chart2"), ChartOptionsPenyuluhpnskristen);
        chart2.render();



//    ----------------------- CHART 3 ----------------------------------------------------------


//====================== CHART PENYULUH AGAMA KRISTEN PNS==================
    

            
var ChartOptionsPenyuluhnonpns = {
          series: [{
          data: @json($datachart_nonpnskristen)
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

  var url = 'get_chartkeagamaankristen/'+this.value;

  $.ajax({
        url: url,
        // data: data,
        type: 'Get',
        dataType: 'json',
        async: true,
        cache: false,
        
        success: function (data) {
            
            var datatpenyulukristen=data.datachart_penyuluhkristen;
            var datapns_kristen=data.datachart_pnskristen;
            var datanonpns_kristen=data.datachart_nonpnskristen;
            

            // ===== update data chart 1 ======

         

             chart.updateOptions({
  
                series: [{
                data: datatpenyulukristen
                }]

              });

            // ============ Update Data Chart 2 =======

            chart2.updateOptions({
                series: [{
                data: datapns_kristen
                }]
                
            });


              // ============ Update Data Chart 3 =======

              chart3.updateOptions({
  
                series: [{
                data: datanonpns_kristen
                }]

              });

            
        }
    });


});


// =========================== untuk Mengubah Data Tabel Keagamaan Penyuluh kristen Berdasarkan tahun=================== 

$('#pilih_kristen').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-kristen').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaankristen/"+tahun+"/penyuluhkristen",
                
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

                    {data: 'jml_penyulukristen',
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

$('#pilih_pnskristen').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-pnskristen').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaankristen/"+tahun+"/penyuluhkristen",
                
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

                    {data: 'jml_penyulukristen',
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

       $('#pilih_nonpnskristen').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-nonpnskristen').DataTable({
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelKeagamaankristen/"+tahun+"/penyuluhkristen",
                
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

                    {data: 'jml_penyulukristen',
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


