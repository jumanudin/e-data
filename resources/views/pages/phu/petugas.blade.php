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
                <h3 >DATA PETUGAS HAJI & PASSPOR</h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="{{ route('petugas') }}">Layanan PHU</a></div>
                    <div class="breadcrumb-item">Data Petugas Haji & Passpor</div>
                </div>
            </div>
        </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">Data Petugas Haji dan Passpor Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layphu_petugas')->l)     
                    <a class="nav-link {{request()->is('petugas')?'active':null}}" id="kelamin-tab" data-toggle="tab" href="#kelamin" role="tab" aria-controls="" aria-selected="false">Petugas Berdasarkan Kelamin</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layphu_petugas')->l)     
                    <a class="nav-link" id="pendidikan-tab" data-toggle="tab" href="#pendidikan" role="tab" aria-controls="" aria-selected="false">Petugas Berdasarkan Pendidikan</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layphu_petugas')->l)     
                    <a class="nav-link" id="passpor-tab" data-toggle="tab" href="#passpor" role="tab" aria-controls="" aria-selected="false">Passpor</a>
                    @endif
                    </li>
                </ul>    
                    <div class="tab-content" id="myTabContent">


                    <!-- ------- awal Petugas Berdasarkan Jenis Kelamin---------------------- -->


                        <div class="tab-pane fade show active" id="kelamin" role="tabpanel" aria-labelledby="kelamin-tab">
                        
                            <div class="card card-warning shadow">
                                <div class="card-header">
                                    <div class="col-md-6 text-left ">
                                        <h4>Data Petugas Haji Embarkasi Berdasarkan Jenis Kelamin Tahun {{ $tempstruk->tahun_priode }}</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="tabel-jeniskelamin" class="table style table-striped table-hover tabel-jeniskelamin" style="width:100%">
                                                <thead class="text-white">
                                                    <tr class="text-center">
                                                        <th >No</th>
                                                        <th text-align="center">Kabupaten / Kota</th>
                                                        <th >Laki-Laki</th>
                                                        <th >Perempuan</th>
                                                        <th >Julmah</th>
                                                        
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody class="list bg-light">
                                                @foreach ($datajeniskelamin as $temp)
                                                        <tr >
                                                            <td class="text-center">{{ $temp->idx}}</td>
                                                            <!-- <td>{{ $temp->id }}</td> -->
                                                            <td>{{ $temp->nama }}</td>
                                                            <td class="text-center"><a href="" class="pria" data-type="number" data-name="pria" data-pk="{{$temp->id}}">{{ number_format($temp->pria) }}</a></td>
                                                            <td class="text-center"><a href="" class="wanita" data-type="number" data-name="wanita" data-pk="{{$temp->id}}">{{ number_format($temp->wanita) }}</a></td>
                                                            <td class="text-center">{{ number_format($temp->pria+$temp->wanita) }}</td>
                                                                                
                                                        </tr>
                                                        @endforeach 
                                                </tbody>
                                                </table>
                                            </div>                            
                                        </div>                                                                
                                </div>
                            </div>    

                        </div>
                    <!-- ------------------------------ End PETUGAS ------------------------------  -->

                    <!-- ------- awal Petugas Berdasarkan Jenjang Pendidikan---------------------- -->


                    <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Petugas Haji Embarkasi Berdasarkan Pendidikan Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-pendidikan" class="table style table-striped table-hover tabel-pendidikan" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >No</th>
                                                    <th text-align="center">Kabupaten / Kota</th>
                                                    <th >< S1</th>
                                                    <th >S1</th>
                                                    <th >S2</th>
                                                    <th >S3</th>
                                                    <th >Julmah</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datapendidikan as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="kurang_s1" data-type="number" data-name="kurang_s1" data-pk="{{$temp->id}}">{{ number_format($temp->kurang_s1) }}</a></td>
                                                        <td class="text-center"><a href="" class="s1" data-type="number" data-name="s1" data-pk="{{$temp->id}}">{{ number_format($temp->s1) }}</a></td>
                                                        <td class="text-center"><a href="" class="s2" data-type="number" data-name="s2" data-pk="{{$temp->id}}">{{ number_format($temp->s2) }}</a></td>
                                                        <td class="text-center"><a href="" class="s3" data-type="number" data-name="s3" data-pk="{{$temp->id}}">{{ number_format($temp->s3) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->kurang_s1+$temp->s1+$temp->s2+$temp->s3) }}</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>
                <!-- ------------------------------ End PETUGAS ------------------------------  -->
                
                    <!-- ------- awal Petugas Berdasarkan Passpor---------------------- -->


                    <div class="tab-pane fade" id="passpor" role="tabpanel" aria-labelledby="passpor-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Rekomendasi Passpor Haji dan Umroh Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-passpor" class="table style table-striped table-hover tabel-passpor" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >No</th>
                                                    <th text-align="center">Kabupaten / Kota</th>
                                                    <th >Passpor</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datapasspor as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="passpor" data-type="number" data-name="passpor" data-pk="{{$temp->id}}">{{ number_format($temp->passpor) }}</a></td>
                                                                          
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>
                <!-- ------------------------------ End PASSPOR ------------------------------  -->
  
                        </div>

                        
                </div>  
                
        </div>                               
    </div>
   </div>
</div>  

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
        
             
        $("#tabel-jeniskelamin").dataTable({
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
            url:"update_petugas/pria",
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
            url:"update_petugas/wanita",
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


        $("#tabel-pendidikan").dataTable({
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
        

        $('.kurang_s1').editable({
            url:"update_petugas/kurang_s1",
            type:'number',
            pk:1,
            name:'kurang_s1',
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
            url:"update_petugas/s1",
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
            url:"update_petugas/s2",
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
            url:"update_petugas/s3",
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

        $("#tabel-passpor").dataTable({
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
        

        $('.passpor').editable({
            url:"update_petugas/passpor",
            type:'number',
            pk:1,
            name:'passpor',
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