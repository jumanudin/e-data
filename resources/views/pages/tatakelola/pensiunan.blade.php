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
                <h3 >DATA PENSIUNAN </h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('pensiun') }}"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pensiun') }}">Layanan Tata Kelola & Dukungan Manajemen </a></div>
                    <div class="breadcrumb-item">Pensiunan</div>
                </div>
            </div>
        </section>  
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-succes border">
                    <div class="row col-12 align-items-center">
                        <div class="col-8">
                            <h5 class=" mb-0">Data Pensiunan Per Kabupaten Kota</h5>
                        </div>
                    </div>
                </div>
            <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_pensiun')->l)     
                            <a class="nav-link {{request()->is('pensiun')?'active':null}}" id="pns_jkgol-tab" data-toggle="tab" href="#pns_jkgol" role="tab" aria-controls="" aria-selected="false">Jenis Kelamin & Golongan</a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_pensiun')->l)     
                            <a class="nav-link" id="pns_kualifikasi-tab" data-toggle="tab" href="#pns_kualifikasi" role="tab" aria-controls="" aria-selected="false">Kualifikasi</a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_pensiun')->l)     
                            <a class="nav-link" id="pns_agama-tab" data-toggle="tab" href="#pns_agama" role="tab" aria-controls="" aria-selected="false">Agama</a>
                            @endif
                            </li>
                        </ul>    
                            <div class="tab-content" id="myTabContent">
                                <!-- ------- awal Tabel BERDASARKAN JENIS KELAMIN DAN GOLONGAN----------------------- -->


                        <div class="tab-pane fade show active" id="pns_jkgol" role="tabpanel" aria-labelledby="pns_jkgol_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Pensiunan Menurut Jenis Kelamin dan Golongan Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-pns_jkgol" class="table style table-striped table-hover tabel-pns_jkgol" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2" text-align="center">UNIT KERJA</th>
                                                    <th colspan="2">JENIS KELAMIN</th>
                                                    <th rowspan="2">JUMLAH</th>
                                                    <th colspan="4">GOLONGAN</th>
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
                                                        <td class="text-center"><a href="" class="pria" data-type="number" data-name="pria" data-pk="{{$temp->id}}">{{ number_format($temp->pria) }}</a></td>
                                                        <td class="text-center"><a href="" class="wanita" data-type="number" data-name="wanita" data-pk="{{$temp->id}}">{{ number_format($temp->wanita) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->wanita+$temp->pria) }}</td>
                                                        <td class="text-center"><a href="" class="gol_1" data-type="number" data-name="gol_1" data-pk="{{$temp->id}}">{{ number_format($temp->gol_1) }}</a></td>
                                                        <td class="text-center"><a href="" class="gol_2" data-type="number" data-name="gol_2" data-pk="{{$temp->id}}">{{ number_format($temp->gol_2) }}</a></td>
                                                        <td class="text-center"><a href="" class="gol_3" data-type="number" data-name="gol_3" data-pk="{{$temp->id}}">{{ number_format($temp->gol_3) }}</a></td>
                                                        <td class="text-center"><a href="" class="gol_4" data-type="number" data-name="gol_4" data-pk="{{$temp->id}}">{{ number_format($temp->gol_4) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->gol_1+$temp->gol_2+$temp->gol_3+$temp->gol_4) }}</td>
                                                                            
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
                                <div class="col-md-6 text-left ">
                                    <h4>Data Pensiunan Menurut Kualifikasi Pendidikan Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-kualifikasi" class="table style table-striped table-hover tabel-kualifikasi" style="width:100%">
                                            <thead class="text-white">
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
                                            @foreach ($datapns_kualifikasi as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="min_s1" data-type="number" data-name="min_s1" data-pk="{{$temp->id}}">{{ number_format($temp->min_s1) }}</a></td>
                                                        <td class="text-center"><a href="" class="s1" data-type="number" data-name="s1" data-pk="{{$temp->id}}">{{ number_format($temp->s1) }}</a></td>
                                                        <td class="text-center"><a href="" class="s2" data-type="number" data-name="s2" data-pk="{{$temp->id}}">{{ number_format($temp->s2) }}</a></td>
                                                        <td class="text-center"><a href="" class="s3" data-type="number" data-name="s3" data-pk="{{$temp->id}}">{{ number_format($temp->s3) }}</a></td>
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
                                <div class="col-md-6 text-left ">
                                    <h4>Data Pensiunan Berdasarkan Agama Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-agama" class="table style table-striped table-hover tabel-agama" style="width:100%">
                                            <thead class="text-white">
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
                                                        <td class="text-center"><a href="" class="islam" data-type="number" data-name="islam" data-pk="{{$temp->id}}">{{ number_format($temp->islam) }}</a></td>
                                                        <td class="text-center"><a href="" class="kristen" data-type="number" data-name="kristen" data-pk="{{$temp->id}}">{{ number_format($temp->kristen) }}</a></td>
                                                        <td class="text-center"><a href="" class="katolik" data-type="number" data-name="katolik" data-pk="{{$temp->id}}">{{ number_format($temp->katolik) }}</a></td>
                                                        <td class="text-center"><a href="" class="hindu" data-type="number" data-name="hindu" data-pk="{{$temp->id}}">{{ number_format($temp->hindu) }}</a></td>
                                                        <td class="text-center"><a href="" class="buddha" data-type="number" data-name="buddha" data-pk="{{$temp->id}}">{{ number_format($temp->buddha) }}</a></td>
                                                        <td class="text-center"><a href="" class="khonghucu" data-type="number" data-name="khonghucu" data-pk="{{$temp->id}}">{{ number_format($temp->khonghucu) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->islam+$temp->kristen+$temp->katolik+$temp->hindu+$temp->buddha+$temp->khonghucu) }}</td>
                                                                            
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
        
             
        $("#tabel-pns_jkgol").dataTable({
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
        

            

       
        $('.pria').editable({
            url:"update_pensiun/pria",
            type:'number',
            pk:1,
            name:'pria',
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

        $('.wanita').editable({
            url:"update_pensiun/wanita",
            type:'number',
            pk:1,
            name:'wanita',
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
        $('.gol_1').editable({
            url:"update_pensiun/gol_1",
            type:'number',
            pk:1,
            name:'gol_1',
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

        $('.gol_2').editable({
            url:"update_pensiun/gol_2",
            type:'number',
            pk:1,
            name:'gol_2',
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

        $('.gol_3').editable({
            url:"update_pensiun/gol_3",
            type:'number',
            pk:1,
            name:'gol_3',
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

        $('.gol_4').editable({
            url:"update_pensiun/gol_4",
            type:'number',
            pk:1,
            name:'gol_4',
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

        
            // =============== Bedasarkan Kualifikasi Pendidikan ===================== 

            $("#tabel-kualifikasi").dataTable({
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
        

            

       
        $('.min_s1').editable({
            url:"update_pensiun/min_s1",
            type:'number',
            pk:1,
            name:'min_s1',
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

        $('.s1').editable({
            url:"update_pensiun/s1",
            type:'number',
            pk:1,
            name:'s1',
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
        $('.s2').editable({
            url:"update_pensiun/s2",
            type:'number',
            pk:1,
            name:'s2',
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

        $('.s3').editable({
            url:"update_pensiun/s3",
            type:'number',
            pk:1,
            name:'s3',
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

        // ====================== Berdasarkan Agama ======================== 

        $("#tabel-agama").dataTable({
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
        

            

       
        $('.islam').editable({
            url:"update_pensiun/islam",
            type:'number',
            pk:1,
            name:'islam',
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

        $('.kristen').editable({
            url:"update_pensiun/kristen",
            type:'number',
            pk:1,
            name:'kristen',
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
        $('.katolik').editable({
            url:"update_pensiun/katolik",
            type:'number',
            pk:1,
            name:'katolik',
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

        $('.hindu').editable({
            url:"update_pensiun/hindu",
            type:'number',
            pk:1,
            name:'hindu',
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

        $('.buddha').editable({
            url:"update_pensiun/buddha",
            type:'number',
            pk:1,
            name:'buddha',
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

        $('.khonghucu').editable({
            url:"update_pensiun/khonghucu",
            type:'number',
            pk:1,
            name:'khonghucu',
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