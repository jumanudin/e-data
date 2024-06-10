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
                <h3 >DATA PTSP dan FKUB </h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="{{ route('ptsp') }}">Layanan Tata Kelola & Dukungan Manajemen </a></div>
                    <div class="breadcrumb-item">PTSP dan FKUB</div>
                </div>
            </div>
        </section>  
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-succes border">
                    <div class="row col-12 align-items-center">
                        <div class="col-8">
                            <h5 class=" mb-0">Data PTSP dan FKUB Per Kabupaten Kota</h5>
                        </div>
                    </div>
                </div>
            <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_ptsp')->l)     
                            <a class="nav-link {{request()->is('ptsp')?'active':null}}" id="ptsp_dibentuk-tab" data-toggle="tab" href="#ptsp_dibentuk" role="tab" aria-controls="" aria-selected="false">PTSP Dibentuk</a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_ptsp')->l)     
                            <a class="nav-link" id="ptsp_jenislay-tab" data-toggle="tab" href="#ptsp_jenislay" role="tab" aria-controls="" aria-selected="false">Jenis Layanan PTSP </a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_ptsp')->l)     
                            <a class="nav-link" id="fkub-tab" data-toggle="tab" href="#fkub" role="tab" aria-controls="" aria-selected="false">FKUB</a>
                            @endif
                            </li>
                        </ul>    
                            <div class="tab-content" id="myTabContent">
                                <!-- ------- awal Tabel PTSP dibentuk----------------------- -->


                        <div class="tab-pane fade show active" id="ptsp_dibentuk" role="tabpanel" aria-labelledby="ptsp_dibentuk-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data PTSP yang Sudah Dibentuk di Satuan Kerja Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-ptsp_dibentuk" class="table style table-striped table-hover tabel-ptsp_dibentuk" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2" text-align="center">NAMA SATUAN KERJA</th>
                                                    <th colspan="2">PTSP</th>
                                                    
                                                </tr>

                                                <tr class="text-center">
                                                  
                                                    <th >ADA</th>
                                                    <th >TIDAK</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($dataptsp_dibentuk as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="ada" data-type="number" data-name="ada" data-pk="{{$temp->id}}">{{ number_format($temp->ada) }}</a></td>
                                                        <td class="text-center"><a href="" class="tidak" data-type="number" data-name="tidak" data-pk="{{$temp->id}}">{{ number_format($temp->tidak) }}</a></td>
                                                                            
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
                     

                 <!-- ------- awal Jenis Layanan PTSP---------------------- -->


                 <div class="tab-pane fade " id="ptsp_jenislay" role="tabpanel" aria-labelledby="ptsp_jenislay-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jenis PTSP Menurut Jenis Layanan  Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-jenislay" class="table style table-striped table-hover tabel-jenislay" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2" text-align="center">SATUAN KERJA</th>
                                                    <th colspan="2">JUMLAH LAYANAN</th>
                                                    
                                                </tr>

                                                <tr class="text-center">
                                                    <th >ELEKTRONIK</th>
                                                    <th >MANUAL</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($dataptsp_jenislay as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="elektronik" data-type="number" data-name="elektronik" data-pk="{{$temp->id}}">{{ number_format($temp->elektronik) }}</a></td>
                                                        <td class="text-center"><a href="" class="manual" data-type="number" data-name="manual" data-pk="{{$temp->id}}">{{ number_format($temp->manual) }}</a></td>
                                                                            
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


                 <div class="tab-pane fade show " id="fkub" role="tabpanel" aria-labelledby="fkub_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Forum Kerukunan Umat Beragama(FKUB), Sekretariat Bersama (SEKBER) dan Desa Sadar Kerukunan Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-fkub" class="table style table-striped table-hover tabel-fkub" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th  text-align="center">SATUAN KERJA</th>
                                                    <th >FKUB</th>
                                                    <th >SEKBER</th>
                                                    <th >DESA SADAR KERUKUNAN</th>
                                                    
                                                </tr>

                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datafkub as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="fkub" data-type="number" data-name="fkub" data-pk="{{$temp->id}}">{{ number_format($temp->fkub) }}</a></td>
                                                        <td class="text-center"><a href="" class="sekber" data-type="number" data-name="sekber" data-pk="{{$temp->id}}">{{ number_format($temp->sekber) }}</a></td>
                                                        <td class="text-center"><a href="" class="sadar_kerukunan" data-type="number" data-name="sadar_kerukunan" data-pk="{{$temp->id}}">{{ number_format($temp->sadar_kerukunan) }}</a></td>
                                                                            
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
                    
            </div>  <!-- End Card Shadow -->
                                
        </div> <!-- End Col-->
    
    </div> <!-- End Row -->
</div> <!-- End main Content-->

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
        
             
        $("#tabel-ptsp_dibentuk").dataTable({
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    language: {
                        emptyTable: '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateModal"><i class="fa-solid fa-bolt-lightning"></i> Generate Data Awal</button>'
                    },
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                    "iDisplayLength": 25,
                    });   
        

            

       
        $('.ada').editable({
            url:"update_ptsp/ada",
            type:'number',
            pk:1,
            name:'ada',
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

        $('.tidak').editable({
            url:"update_ptsp/tidak",
            type:'number',
            pk:1,
            name:'tidak',
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
            // =============== Bedasarkan Jenis Layanan ===================== 

            $("#tabel-jenislay").dataTable({
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
        

            

       
        $('.elektronik').editable({
            url:"update_ptsp/elektronik",
            type:'number',
            pk:1,
            name:'elektroni',
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

        $('.manual').editable({
            url:"update_ptsp/manual",
            type:'number',
            pk:1,
            name:'manual',
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

        // ====================== FKUB ======================== 

        $("#tabel-fkub").dataTable({
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
        

            

       
        $('.fkub').editable({
            url:"update_fkub/fkub",
            type:'number',
            pk:1,
            name:'fkub',
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

        $('.sekber').editable({
            url:"update_fkub/sekber",
            type:'number',
            pk:1,
            name:'sekber',
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
        $('.sadar_kerukunan').editable({
            url:"update_fkub/sadar_kerukunan",
            type:'number',
            pk:1,
            name:'sadar_kerukunan',
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