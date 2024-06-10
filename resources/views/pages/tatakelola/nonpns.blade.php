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
                <h3 >DATA HONORER</h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="{{ route('honorer') }}">Layanan Tata Kelola & Dukungan Manajemen </a></div>
                    <div class="breadcrumb-item">Honorer</div>
                </div>
            </div>
        </section>  
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-succes border">
                    <div class="row col-12 align-items-center">
                        <div class="col-8">
                            <h5 class=" mb-0">Data Honorer Per Kabupaten Kota</h5>
                        </div>
                    </div>
                </div>
            <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            @if(Helper::cek_level_akses('laytatakelola_pns_ijinbelajar')->l)     
                            <a class="nav-link {{request()->is('honorer')?'active':null}}" id="pns_kualifikasi_tab" data-toggle="tab" href="#pns_kualifikasi" role="tab" aria-controls="" aria-selected="false">Berdasarkan Kualifikasi</a>
                            @endif
                            </li>
                        </ul>    
                            <div class="tab-content" id="myTabContent">
                    

                 <!-- ------- awal Tabel BERDASARKAN KUALIFIKASI ---------------------- -->


                 <div class="tab-pane fade show active " id="pns_kualifikasi" role="tabpanel" aria-labelledby="pns_kualifikasi_tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Honorer Menurut Jenjang Pendidikan Tahun {{ $tempstruk->tahun_priode }}</h4>
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
                                            @foreach ($datanonpns_kualifikasi as $temp)
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
            url:"update_honorer/min_s1",
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
            url:"update_honorer/s1",
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
            url:"update_honorer/s2",
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
            url:"update_honorer/s3",
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