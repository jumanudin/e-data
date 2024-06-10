@extends('layouts.web', ['title' => __('Data Kuota Jamaah Haji 5 Tahun Terakhir')])
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


<!-- --------------------------  GRAFIK CHART DATA KUOTA JEMAAH HAJI -----------------------  -->
<div class="row">
    <div class="col">
        <div class="card card-warning shadow">
                    <div class="card-header">
                        <div class="col-md-12 text-left ">
                            <div class="row">
                                                <div class="col-md-12 "><h5>GRAFIK DATA KUOTA JAMAAH HAJI 5 TAHUN TERAKHIR (TAHUN {{ $tempstruk->tahun_priode-4 }} s.d {{ $tempstruk->tahun_priode }}) </h5></div>
                                                    
                                            </div>
                        
                        </div>
                     </div>

                     <div class="card-body">
                        <div class="row">
                            <div class="col-1">

                            </div>
                            <div class="col-md-10 ">
                                 <div class="card center" >
                                    <div class="card-body">
                                        <h5 class="card-title">GRAFIK DATA KUOTA JAMAAH HAJI 5 TAHUN TERAKHIR (TAHUN {{ $tempstruk->tahun_priode-4 }} s.d {{ $tempstruk->tahun_priode }})</h5>
                                        <div id="chart"></div>
                                    </div>
                                 </div> 
                                                      
                            </div> 

                            <div class="col-1">
                                
                            </div>
                        
                        </div>
                            
                    </div><!-- Tutup div Card-body -->

        </div><!-- Tutup div Card Warning -->
    </div><!-- Tutup div Col --> 
</div> <!-- Tutup div Row --> 

   <br />

   <!-- --------------- END GRAFIK CHART DATA KUOTA JEMAAH HAJI -------------------------------------------  -->


<!-- -------------------- TABEL DATA KUOTA JEMAAH HAJI ---------------------------------------------  -->

   <div class="row">
    <div class="col">
        <div class="card card-warning shadow">
                    <div class="card-header">
                        <div class="col-md-12 text-left ">
                            <div class="row">
                                                <div class="col-md-12 "><h5>DATA KUOTA JAMAAH HAJI 5 TAHUN TERAKHIR (TAHUN {{ $tempstruk->tahun_priode-4 }} s.d {{ $tempstruk->tahun_priode }}) </h5></div>
                                                    
                                            </div>
                        
                        </div>
                     </div>

                     <div class="card-body">
                     <div class="col-md-12 p-5">
                            <div class="table-responsive">
                                <table id="tabel-kuotahaji" class="table style table-striped table-hover tabel-kuotahaji" style="width:100%">
                                <thead class="text-white" style="background-color:#5BBCFF">
                                <tr class="text-center">
                                        <th >No</th>
                                        <th text-align="center">Kabupaten / Kota</th>
                                        <th >Tahun {{$tempstruk->tahun_priode }}</th>
                                        <th >Tahun {{$tempstruk->tahun_priode-1 }}</th>
                                        <th >Tahun {{$tempstruk->tahun_priode-2 }}</th>
                                        <th >Tahun {{$tempstruk->tahun_priode-3 }}</th>
                                        <th >Tahun {{$tempstruk->tahun_priode-4 }}</th>
                                        
                                    </tr>
                                    
                                             
                                </thead>
                                <tbody class="list bg-light">
                                @foreach ($datakuota as $temp)
                                
                                

                                    <tr >
                                            <td class="text-center">{{ $temp->idx}}</td>
                                            <!-- <td>{{ $temp->id }}</td> -->
                                            <td>{{ $temp->nama }}</td>
                                            <td class="text-center">{{ number_format($temp->tahun)}}</td>
                                            <td class="text-center">{{ number_format($temp->tahunmin1)}}</td>
                                            <td class="text-center">{{ number_format($temp->tahunmin2)}}</td>
                                            <td class="text-center">{{ number_format($temp->tahunmin3)}}</td>
                                            
                                            <td class="text-center">{{ number_format($temp->tahunmin4) }}</td>
                                                                     
                                    </tr>

                                                         
                                
                                          
                                        
                                @endforeach 
                                
                                </tbody>
                                </table>
                            </div>                            
                            </div> 
                        
                    </div><!-- Tutup div Card-body -->

        </div><!-- Tutup div Card Warning -->
    </div><!-- Tutup div Col --> 
</div> <!-- Tutup div Row --> 

   <br />


<!-- -------------------- END TABEL DATA KUOTA JEMAAH HAJI ---------------------------------------------  -->

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
        
             
        $("#tabel-kuotahaji").dataTable({
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


var options = {
          series: [{
            name: "Desktops",
            data: @json($datachart_kuota)
        }],
          chart: {
          height: 400,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        annotations: {
          xaxis: [ {
            x: 2021,
            x2: 2020,
            fillColor: '#B3F7CA',
            opacity: 0.4,
            label: {
              borderColor: '#B3F7CA',
              style: {
                fontSize: '10px',
                color: '#fff',
                background: '#00E396',
              },
              offsetY: -10,
              text: 'COVID-19 TIDAK ADA KUOTA',
            }
          }]
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
          categories: @json($datachart_katagori),
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
          
    



</script>




@endpush 

