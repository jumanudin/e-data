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
        <h3 >Jumlah Penyuluh Agama Non PNS Penerima Tunjangan  </h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('rumah_ibadah') }}">Layanan Keagamaan</a></div>
            <div class="breadcrumb-item">Data Penyuluh Non PNS Penerima Tunjangan  </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data Jumlah Penyuluh Non PNS Penerima Tunjangan Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                  
              
                    <div class="tab-pane fade show active" id="tahunlalu" role="tabpanel" aria-labelledby="tahunlalu-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Penyuluh Non PNS Penerima Tunjangan Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tabel-tahunlalu" class="table style table-striped table-hover tabel-tahunlalu" style="width:100%">
                                <thead class="text-white">
                                    <tr class="text-center">
                                    <th class="text-center">No</th>
                                              <th>Wilayah</th>
                                              <th>Islam</th>
                                              <th>Kristen</th>
                                              <th>Katolik</th>
                                              <th>Hindu</th>
                                              <th>Buddha</th>
                                              <th>Khonghucu</th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
                                @foreach ($data as $temp)
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
      
        
               
            $("#tabel-tahunlalu").dataTable({
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
            url:"update_tunjangan/islam",
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
            url:"update_tunjangan/kristen",
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
            url:"update_tunjangan/katolik",
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
            url:"update_tunjangan/hindu",
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
            url:"update_tunjangan/buddha",
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
                url:"update_tunjangan/khonghucu",
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

            $('.lainnya').editable({
            url:"update_tunjangan/lainnya",
            type:'number',
            pk:1,
            name:'lainnya',
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