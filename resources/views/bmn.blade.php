@extends('layouts.web', ['title' => __('DATA BARANG MILIK NEGARA')])
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
                            <a class="nav-link {{request()->is('tatakelola_bmn')?'active':null}}" id="grafik-tab" data-toggle="tab" href="#grafik" role="tab" aria-controls="" aria-selected="false">Chart</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="bmn_lokasi-tab" data-toggle="tab" href="#bmn_lokasi" role="tab" aria-controls="" aria-selected="false">BMN Aset Tanah </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="bmn_gedung-tab" data-toggle="tab" href="#bmn_gedung" role="tab" aria-controls="" aria-selected="false">BMN Gedung dan Bangunan</a>
                            </li>
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
                                            <h5 class="card-title">Grafik Lokasi dan Luas Aset Tanah Menurut Kondisi</h5>
                                                <div id="chart"></div>
                                            </div>
                                        </div>                  
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="card" >
                                            <div class="card-body">
                                            <h5 class="card-title">Grafik Bangunan Gedung dan Kantor Menurut Kondisi</h5>
                                                <div id="chart2"></div>
                                            </div>
                                        </div>                  
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
                                                        <td class="dt-right">{{ number_format($temp->ged_baik) }}</a></td>
                                                        <td class="dt-right">{{ number_format($temp->ged_rusak_ringan) }}</td>
                                                        <td class="dt-right">{{ number_format($temp->ged_rusak_berat) }}</td>
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
                    searching: false,
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
                    searching: false,
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
   
//====================== CHART BMN ASET LOKASI dan LUAS TANAH==================
    

var options = {
          series: @json($chart_lokasiseries),
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: true,
        formatter: function (value) {
            // Format angka ke dalam ribuan
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        },
        
        stroke: {
          width: [5, 7, 5],
          curve: 'straight',
          dashArray: [0, 8, 5]
        },
        
        legend: {
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</strong>'
          }
        },
        markers: {
          size: 0,
          hover: {
            sizeOffset: 6
          }
        },
        xaxis: {
          categories: ['Pangkalpinang', 'Bangka','Bateng','Babar','Basel','Belitung','Beltim']
          ,
        },
    yaxis: {
        labels: {
            formatter: function (value) {
                // Format angka ke dalam ribuan
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        }
    },
        
        tooltip: {
          y: [
            {
              title: {
                formatter: function (val) {
                  return val + ""
                }
              }
            },
            {
              title: {
                formatter: function (val) {
                  return val + ""
                }
              }
            },
            {
              title: {
                formatter: function (val) {
                  return val;
                }
              }
            }
          ]
        },
        grid: {
          borderColor: '#f1f1f1',
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
    
    


  
// ================ Chart BMN ASET GEDUNG DAN BANGUNAN =================================

var options = {
          series:  @json($chart_gedungseries),
          chart: {
          height: 350,
          type: 'line',
          stacked: false,
        },
        stroke: {
          width: [0, 2, 5],
          curve: 'smooth'
        },
        plotOptions: {
          bar: {
            columnWidth: '50%'
          }
        },
        
        fill: {
          opacity: [0.85, 0.25, 1],
          gradient: {
            inverseColors: false,
            shade: 'light',
            type: "vertical",
            opacityFrom: 0.85,
            opacityTo: 0.55,
            stops: [0, 100, 100, 100]
          }
        },
        labels: ['Pangkalpinang', 'Bangka', 'Bateng', 'Babar', 'Basel', 'Belitung', 'Beltim'
        ],
        markers: {
          size: 0
        },
        xaxis: {
         
        },
        yaxis: {
          title: {
            text: 'Unit',
          },
          min: 0
        },
        tooltip: {
         
          y: {
                     }
        },dataLabels: {
          enabled: true,
          formatter: function(val, opts) {
            return  val ;
          }
        }
        };

        var chart2 = new ApexCharts(document.querySelector("#chart2"), options);
        chart2.render();
      
      
        
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
          
          var lokasi_nama=data.datachart_lokasi_nama;
          var lokasi_series=data.chart_lokasiseries;
          var gedung_nama=data.datachart_gedung_nama;
          var gedung_series=data.chart_gedungseries;
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

              series: lokasi_series
            });

          // ============ Update Data Chart 2 =======

          chart2.updateOptions({
            series: gedung_series
              
          });


            // ============ Update Data Chart 3 =======
              
           
           // ============ Update Data Chart 4 =======

        
          

          // ================ End Update ====================
          
      }
  });


});




$('#pilih_lokasi').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-bmn_lokasi').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaAnggaran/"+tahun+"/lokasi",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'lok_baik', name: 'lok_baik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'lok_rusak_ringan', name: 'lok_rusak_ringan',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'lok_rusak_berat', name: 'lok_rusak_berat',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jumlah',
                      render: function(data,type,row) { 

                          data =row.lok_baik+row.lok_rusak_ringan+row.lok_rusak_berat;

                          return '<strong>'+nf.format(data)+'</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5], // your case first column
                            "className": "dt-right"
                        }
                    ],"destroy" : true
            });
       });

       // =========================== untuk Mengubah Data Tabel Tatakelola Anggaran REALISASI MENURUT SUMBER DANA Berdasarkan Tahun=================== 

$('#pilih_bmngedung').on('change',function(){

let nf = new Intl.NumberFormat('en-US');
var tahun=this.value;

      
        
                $('.tabel-bmn_gedung').DataTable({
                
                dom:'Bfrtip',
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ],
                sorting:false,
                processing: true,
                serverSide: true,
                searching: false,
                ajax: "getTabelTatakelolaAnggaran/"+tahun+"/gedung",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'ged_baik', name: 'ged_baik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'ged_rusak_ringan', name: 'ged_rusak_ringan',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'ged_rusak_berat', name: 'ged_rusak_berat',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'jumlah',
                      render: function(data,type,row) { 

                          data =row.ged_baik+row.ged_rusak_ringan+row.ged_rusak_berat;

                          return '<strong>'+nf.format(data)+'%</strong>';

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,2,3,4,5], // your case first column
                            "className": "dt-right"
                        }
                    ],"destroy" : true
            });
       });

</script>


@endpush 