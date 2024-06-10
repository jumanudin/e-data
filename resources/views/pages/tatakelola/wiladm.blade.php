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
                <h3 >WILAYAH ADMINISTRASI PEMERINTAH</h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('wiladm') }}"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="{{ route('rumah_ibadah') }}">Layanan Tata Kelola & Dukungan Manajemen </a></div>
                    <div class="breadcrumb-item">Wilayah Administrasi</div>
                </div>
            </div>
        </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">Data Wilayah Administrasi Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('laytatakelola_wiladm')->l)     
                    <a class="nav-link {{request()->is('wiladm')?'active':null}}" id="wiladm-tab" data-toggle="tab" href="#wiladm" role="tab" aria-controls="" aria-selected="false">Wilayah Administrasi</a>
                    @endif
                    </li>
                </ul>    
                    <div class="tab-content" id="myTabContent">


                    <!-- ------- awal Tabel PIHK, PPIU dan KBIHU----------------------- -->


                        <div class="tab-pane fade show active" id="wiladm" role="tabpanel" aria-labelledby="wiladm-tab">
                        
                            <div class="card card-warning shadow">
                                <div class="card-header">
                                    <div class="col-md-6 text-left ">
                                        <h4>Data Wilayah Administrasi Pemerintah Tahun {{ $tempstruk->tahun_priode }}</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="tabel-wiladm" class="table style table-striped table-hover tabel-wiladm" style="width:100%">
                                                <thead class="text-white">
                                                    <tr class="text-center">
                                                        <th >NO</th>
                                                        <th text-align="center">KABUPATEN / KOTA</th>
                                                        <th >KECAMATAN</th>
                                                        <th >KELURAHAN</th>
                                                        <th >DESA</th>
                                                        <th >LUAS WILAYAH[KM]</th>
                                                        
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody class="list bg-light">
                                                @foreach ($datawilayah as $temp)
                                                        <tr >
                                                            <td class="text-center">{{ $temp->idx}}</td>
                                                            <!-- <td>{{ $temp->id }}</td> -->
                                                            <td>{{ $temp->nama }}</td>
                                                            <td class="text-center"><a href="" class="kecamatan" data-type="number" data-name="kecamatan" data-pk="{{$temp->id}}">{{ number_format($temp->kecamatan) }}</a></td>
                                                            <td class="text-center"><a href="" class="kelurahan" data-type="number" data-name="kelurahan" data-pk="{{$temp->id}}">{{ number_format($temp->kelurahan) }}</a></td>
                                                            <td class="text-center"><a href="" class="desa" data-type="number" data-name="desa" data-pk="{{$temp->id}}">{{ number_format($temp->desa) }}</a></td>
                                                            <td class="text-center"><a href="" class="luas" data-type="number" data-name="luas" data-pk="{{$temp->id}}">{{ number_format($temp->luas) }}</a></td>
                                                                                
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
        
             
        $("#tabel-wiladm").dataTable({
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
        

            

       
        $('.kecamatan').editable({
            url:"update_wilayah/kecamatan",
            type:'number',
            pk:1,
            name:'kecamatan',
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

        $('.kelurahan').editable({
            url:"update_wilayah/kelurahan",
            type:'number',
            pk:1,
            name:'kelurahan',
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
        $('.desa').editable({
            url:"update_wilayah/desa",
            type:'number',
            pk:1,
            name:'desa',
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

        $('.luas').editable({
            url:"update_wilayah/luas",
            type:'number',
            pk:1,
            name:'luas',
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