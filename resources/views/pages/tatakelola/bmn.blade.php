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
                <h3 >DATA ANGGARAN DAN BMN</h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="{{ route('ptsp') }}">Layanan Tata Kelola & Dukungan Manajemen </a></div>
                    <div class="breadcrumb-item">ANGGARAN DAN BMN</div>
                </div>
            </div>
        </section>  
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-succes border">
                    <div class="row col-12 align-items-center">
                        <div class="col-8">
                            <h5 class=" mb-0">Data Anggaran dan BMN Per Kabupaten Kota</h5>
                        </div>
                    </div>
                </div>
            <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_bmn')->l)     
                            <a class="nav-link {{request()->is('bmn')?'active':null}}" id="anggaran-tab" data-toggle="tab" href="#anggaran" role="tab" aria-controls="" aria-selected="false">Anggaran</a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_bmn')->l)     
                            <a class="nav-link" id="realisasi_program-tab" data-toggle="tab" href="#realisasi_program" role="tab" aria-controls="" aria-selected="false">Anggaran Menurut Program</a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_bmn')->l)     
                            <a class="nav-link" id="realisasi_belanja-tab" data-toggle="tab" href="#realisasi_belanja" role="tab" aria-controls="" aria-selected="false">Anggaran Menurut Jenis Belanja</a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_bmn')->l)     
                            <a class="nav-link " id="realisasi_sumberdana-tab" data-toggle="tab" href="#realisasi_sumberdana" role="tab" aria-controls="" aria-selected="false">Anggaran Menurut Sumber Dana</a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_bmn')->l)     
                            <a class="nav-link" id="bmn_lokasi-tab" data-toggle="tab" href="#bmn_lokasi" role="tab" aria-controls="" aria-selected="false">BMN Aset Tanah </a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_bmn')->l)     
                            <a class="nav-link" id="bmn_gedung-tab" data-toggle="tab" href="#bmn_gedung" role="tab" aria-controls="" aria-selected="false">BMN Gedung dan Bangunan</a>
                            @endif
                            </li>
                        </ul>    
                            <div class="tab-content" id="myTabContent">

                                <!-- ------- awal Tabel Anggaran----------------------- -->


                        <div class="tab-pane fade show active" id="anggaran" role="tabpanel" aria-labelledby="anggaran-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Pagu Anggaran dan Tingkat Realisasi Serapan Anggaran Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-anggaran" class="table style table-striped table-hover tabel-anggaran" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">PROGRAM</th>
                                                    <th>PAGU ALOKASI AWAL</th>
                                                    <th>PAGU ALOKASI AKHIR</th>
                                                    <th>SELISIH</th>
                                                    <th >ANGGARAN</th>
                                                    <th >REALISASI</th>
                                                    <th >PERSENTASE</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_anggaran as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="pagu_awal" data-type="number" data-name="pagu_awal" data-pk="{{$temp->id}}">{{ number_format($temp->pagu_awal) }}</a></td>
                                                        <td class="text-center"><a href="" class="pagu_akhir" data-type="number" data-name="pagu_akhir" data-pk="{{$temp->id}}">{{ number_format($temp->pagu_akhir) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->pagu_akhir-$temp->pagu_awal) }}</td>
                                                        <td class="text-center">{{ number_format($temp->pagu_akhir) }}</td>
                                                        <td class="text-center"><a href="" class="realisasi" data-type="number" data-name="realisasi" data-pk="{{$temp->id}}">{{ number_format($temp->realisasi) }}</a></td>
                                                        <td class="text-center">{{ number_format((($temp->realisasi)/($temp->pagu_akhir ?: 1))*100,2) }}%</td>
                                                                            
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

                   <!-- ------- awal Tabel Realisasi Berdasarkan Jenis Belanja---------------------- -->


                   <div class="tab-pane fade show " id="realisasi_belanja" role="tabpanel" aria-labelledby="realisasi_belanja-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Pagu Anggaran Berdasarkan Jenis Belanja Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-realisasi_belanja" class="table style table-striped table-hover tabel-realisasi_belanja" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">PROGRAM</th>
                                                    <th >PAGU</th>
                                                    <th >REALISASI</th>
                                                    <th >PERSENTASE</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_realisasibelanja as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="pagu_belanja" data-type="number" data-name="pagu_belanja" data-pk="{{$temp->id}}">{{ number_format($temp->pagu) }}</a></td>
                                                        <td class="text-center"><a href="" class="realisasi_belanja" data-type="number" data-name="realisasi_belanja" data-pk="{{$temp->id}}">{{ number_format($temp->realisasi) }}</a></td>
                                                        <td class="text-center">{{ number_format((($temp->realisasi)/($temp->pagu ?: 1))*100,2) }}%</td>
                                                                            
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


                        <!-- ------- awal Tabel Realisasi Berdasarkan Program----------------------- -->


                        <div class="tab-pane fade show " id="realisasi_sumberdana" role="tabpanel" aria-labelledby="realisasi_sumberdana-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Pagu Anggaran Berdasarkan Sumber Dana Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-realisasi_sumberdana" class="table style table-striped table-hover tabel-realisasi_sumberdana" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">PROGRAM</th>
                                                    <th >PAGU</th>
                                                    <th >REALISASI</th>
                                                    <th >PERSENTASE</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_realisasisumberdana as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="pagu_dana" data-type="number" data-name="pagu_dana" data-pk="{{$temp->id}}">{{ number_format($temp->pagu) }}</a></td>
                                                        <td class="text-center"><a href="" class="realisasi_dana" data-type="number" data-name="realisasi_dana" data-pk="{{$temp->id}}">{{ number_format($temp->realisasi) }}</a></td>
                                                        <td class="text-center">{{ number_format((($temp->realisasi)/($temp->pagu ?: 1))*100,2) }}%</td>
                                                                            
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


                        <!-- ------- awal Tabel Realisasi Berdasarkan Program----------------------- -->


                        <div class="tab-pane fade show " id="realisasi_program" role="tabpanel" aria-labelledby="realisasi_program-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Pagu Anggaran Berdasarkan Program Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-realisasi_program" class="table style table-striped table-hover tabel-realisasi_program" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >NO</th>
                                                    <th text-align="center">PROGRAM</th>
                                                    <th >PAGU</th>
                                                    <th >REALISASI</th>
                                                    <th >PERSENTASE</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($data_realisasiprogram as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="pagu" data-type="number" data-name="pagu" data-pk="{{$temp->id}}">{{ number_format($temp->pagu) }}</a></td>
                                                        <td class="text-center"><a href="" class="realisasi_program" data-type="number" data-name="realisasi_program" data-pk="{{$temp->id}}">{{ number_format($temp->realisasi) }}</a></td>
                                                        <td class="text-center">{{ number_format((($temp->realisasi)/($temp->pagu ?: 1))*100,2) }}%</td>
                                                                            
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
                     

                 <!-- ------- awal Tabel BMN Aset Tanah--------------------- -->


                 <div class="tab-pane fade " id="bmn_lokasi" role="tabpanel" aria-labelledby="bmn_tanah-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Lokasi dan Luas Aset Tanah  Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-bmn_lokasi" class="table style table-striped table-hover tabel-bmn_lokasi" style="width:100%">
                                            <thead class="text-white">
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
                                                        <td class="text-center"><a href="" class="lok_baik" data-type="number" data-name="lok_baik" data-pk="{{$temp->id}}">{{ number_format($temp->lok_baik) }}</a></td>
                                                        <td class="text-center"><a href="" class="lok_rusak_ringan" data-type="number" data-name="lok_rusak_ringan" data-pk="{{$temp->id}}">{{ number_format($temp->lok_rusak_ringan) }}</a></td>
                                                        <td class="text-center"><a href="" class="lok_rusak_berat" data-type="number" data-name="lok_rusak_berat" data-pk="{{$temp->id}}">{{ number_format($temp->lok_rusak_berat) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->lok_baik+$temp->lok_rusak_ringan+$temp->lok_rusak_berat) }}</td>
                                                                            
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
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Bangunan Gedung dan Kantor Menurut Kondisi Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-bmn_gedung" class="table style table-striped table-hover tabel-bmn_gedung" style="width:100%">
                                            <thead class="text-white">
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
                                                        <td class="text-center"><a href="" class="ged_baik" data-type="number" data-name="ged_baik" data-pk="{{$temp->id}}">{{ number_format($temp->ged_baik) }}</a></td>
                                                        <td class="text-center"><a href="" class="ged_rusak_ringan" data-type="number" data-name="ged_rusak_ringan" data-pk="{{$temp->id}}">{{ number_format($temp->ged_rusak_ringan) }}</a></td>
                                                        <td class="text-center"><a href="" class="ged_rusak_berat" data-type="number" data-name="ged_rusak_berat" data-pk="{{$temp->id}}">{{ number_format($temp->ged_rusak_berat) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->ged_baik+$temp->ged_rusak_ringan+$temp->ged_rusak_berat) }}</td>
                                                                            
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
        
             
        $("#tabel-anggaran").dataTable({
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
        

            

    $('.pagu_awal').editable({
            url:"update_anggaran/pagu_awal",
            type:'number',
            pk:1,
            name:'pagu_awal',
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


    $('.pagu_akhir').editable({
            url:"update_anggaran/pagu_akhir",
            type:'number',
            pk:1,
            name:'pagu_akhir',
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
        

        $('.anggaran').editable({
            url:"update_anggaran/anggaran",
            type:'number',
            pk:1,
            name:'anggaran',
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

        $('.realisasi').editable({
            url:"update_anggaran/realisasi",
            type:'number',
            pk:1,
            name:'realisasi',
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


        $("#tabel-realisasi_program").dataTable({
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
        

            

    $('.pagu').editable({
            url:"update_program/pagu",
            type:'number',
            pk:1,
            name:'pagu',
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


    $('.realisasi_program').editable({
            url:"update_program/realisasi",
            type:'number',
            pk:1,
            name:'realisasi_program',
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



        $("#tabel-realisasi_belanja").dataTable({
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
        

            

    $('.pagu_belanja').editable({
            url:"update_belanja/pagu",
            type:'number',
            pk:1,
            name:'pagu_belanja',
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


    $('.realisasi_belanja').editable({
            url:"update_belanja/realisasi",
            type:'number',
            pk:1,
            name:'realisasi_belanja',
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

    

        $("#tabel-realisasi_sumberdana").dataTable({
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
        

            

    $('.pagu_dana').editable({
            url:"update_dana/pagu",
            type:'number',
            pk:1,
            name:'pagu_dana',
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


    $('.realisasi_dana').editable({
            url:"update_dana/realisasi",
            type:'number',
            pk:1,
            name:'realisasi_dana',
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
            // =============== Jumlah Aset Tanah===================== 

            $("#tabel-bmn_lokasi").dataTable({
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
        

            

       
        $('.lok_baik').editable({
            url:"update_bmn/lok_baik",
            type:'number',
            pk:1,
            name:'lok_baik',
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

        $('.lok_rusak_ringan').editable({
            url:"update_bmn/lok_rusak_ringan",
            type:'number',
            pk:1,
            name:'lok_rusak_ringan',
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

        $('.lok_rusak_berat').editable({
            url:"update_bmn/lok_rusak_berat",
            type:'number',
            pk:1,
            name:'lok_rusak_berat',
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

        // ======================JUMLAH GEDUNG DAN BANGUNGAN ======================== 

        $("#tabel-bmn_gedung").dataTable({
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
        

            

       
        $('.ged_baik').editable({
            url:"update_bmn/ged_baik",
            type:'number',
            pk:1,
            name:'ged_baik',
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

        $('.ged_rusak_ringan').editable({
            url:"update_bmn/ged_rusak_ringan",
            type:'number',
            pk:1,
            name:'ged_rusak_ringan',
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
        $('.ged_rusak_berat').editable({
            url:"update_bmn/ged_rusak_berat",
            type:'number',
            pk:1,
            name:'ged_rusak_berat',
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