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
                <h3 >ORGANISASI MASYARAKAT</h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="{{ route('ormas') }}">Layanan Tata Kelola & Dukungan Manajemen </a></div>
                    <div class="breadcrumb-item">Ormas</div>
                </div>
            </div>
        </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">Data Organisasi Kemasyarakatan Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_ormas')->l)     
                    <a class="nav-link {{request()->is('ormas')?'active':null}}" id="ormas-tab" data-toggle="tab" href="#ormas" role="tab" aria-controls="" aria-selected="false">Organisasi Masyarakat Keagamaan</a>
                    @endif
                    </li>
                </ul>    
                    <div class="tab-content" id="myTabContent">


                    <!-- ------- awal Tabel PIHK, PPIU dan KBIHU----------------------- -->


                        <div class="tab-pane fade show active" id="ormas" role="tabpanel" aria-labelledby="ormas-tab">
                        
                            <div class="card card-warning shadow">
                                <div class="card-header">
                                    <div class="col-md-6 text-left ">
                                        <h4>Data Organisasi Masyarakat Keagamaan Menurut Agama Tahun {{ $tempstruk->tahun_priode }}</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="tabel-ormas" class="table style table-striped table-hover tabel-ormas" style="width:100%">
                                                <thead class="text-white">
                                                    <tr class="text-center">
                                                        <th >NO</th>
                                                        <th text-align="center">KABUPATEN / KOTA</th>
                                                        <th >ISLAM</th>
                                                        <th >KRISTEN</th>
                                                        <th >KATOLIK</th>
                                                        <th >HINDU</th>
                                                        <th >BUDDHA</th>
                                                        <th >KHONGHUCU</th>
                                                        
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody class="list bg-light">
                                                @foreach ($data_ormas as $temp)
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
        
             
        $("#tabel-ormas").dataTable({
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
            url:"update_ormas/islam",
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
            url:"update_ormas/kristen",
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
            url:"update_ormas/katolik",
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
            url:"update_ormas/hindu",
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
            url:"update_ormas/buddha",
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
            url:"update_ormas/khonghucu",
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