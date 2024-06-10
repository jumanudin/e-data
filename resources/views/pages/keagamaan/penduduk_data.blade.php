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
        <h3 >Jumlah Penduduk </h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('rumah_ibadah') }}">Layanan Keagamaan</a></div>
            <div class="breadcrumb-item">Data Jumlah Penduduk  </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data Jumlah Penduduk Berdasarkan Agama Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_JmlPenduduk')->l)     
                    <a class="nav-link {{request()->is('rumah_ibadah')?'active':null}}" id="tahunlalu-tab" data-toggle="tab" href="#tahunlalu" role="tab" aria-controls="" aria-selected="false">{{ $tempstruk->tahun_priode }}</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_JmlPenduduk')->l)   
                    <a class="nav-link" id="tahunlalu1-tab" data-toggle="tab" href="#tahunlalu1" role="tab" aria-controls="tahunlalau1" aria-selected="false">{{ $tempstruk->tahun_priode-1 }}</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_JmlPenduduk')->l)
                    <a class="nav-link" id="tahunlalu2-tab" data-toggle="tab" href="#tahunlalu2" role="tab" aria-controls="tahunlalau2" aria-selected="false">{{ $tempstruk->tahun_priode-2 }}</a>
                    @endif
                    </li>
                </ul>    
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tahunlalu" role="tabpanel" aria-labelledby="tahunlalu-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Penduduk Berdasarkan Agama Tahun {{ $tempstruk->tahun_priode }}</h4>
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
                                              <th>Lainnya</th>
                                              <th>Total</th>
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
                                            <td class="text-center"><a href="" class="lainnya" data-type="number" data-name="lainnya" data-pk="{{$temp->id}}">{{ number_format($temp->lainnya) }}</a></td>
                                            <td class="text-center"><b>{{ number_format($temp->islam+$temp->kristen+$temp->katolik+$temp->hindu+$temp->buddha+$temp->khonghucu+$temp->lainnya) }}</b></td>
                                                                      
                                          </tr>
                                          @endforeach 
                                </tbody>
                                </table>
                            </div>                            
                            </div>                                                                
                            </div>
                        </div>    

                    </div>
                    <div class="tab-pane fade" id="tahunlalu1" role="tabpanel" aria-labelledby="tahunlalu1-tab">
                    <div class="card card-success shadow">
                        <div class="card-header">
                            <div class="col-md-6 text-left mb-0 ">
                                <h4>Data Jumlah Penduduk Berdasarkan Agama Tahun {{ $tempstruk->tahun_priode-1 }} </h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                            <table id="tabel-tahunlalu1" class="table style table-striped table-hover tabel-tahunlalu1" style="width:100%">
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
                                              <th>Lainnya</th>
                                              <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
                                </tbody>
                                </table>
                            </div>                            
                            </div>                                                                
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="tahunlalu2" role="tabpanel" aria-labelledby="tahunlalu2-tab">
                        <div class="card card-success">
                        <div class="card-header">
                            <div class="col-md-6 text-left mb-0 ">
                                <h4>Data Jumlah Penduduk Berdasarkan Agama Tahun {{ $tempstruk->tahun_priode-2 }}</h4>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="table-responsive">       
                                <table id="tabel-tahunlalu2" class="table style table-striped table-hover tabel-tahunlalu2" style="width:100%">
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
                                              <th>Lainnya</th>
                                              <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
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
      
        
                $('.tabel-tahunlalu1').DataTable({
                sorting:false,
                processing: true,
                serverSide: true,
                ajax: "get-jmlpenduduk/{{ $tempstruk->tahun_priode-1 }}",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                  
                    {data: 'nama', name: 'nama',sortable:false},
                   
                    {data: 'islam', name: 'islam',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'kristen', name: 'kristen',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'katolik', name: 'katolik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'hindu', name: 'hindu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'buddha', name: 'buddha',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'khonghucu', name: 'khonghucu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'lainnya', name: 'lainnya',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'total',
                      render: function(data,type,row) { 
                      
                          data = row.islam+row.kristen+row.katolik+row.hindu+row.buddha+row.khonghucu+row.lainnya;
                          return nf.format(data);

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,3,4,5,6,7,8,9], // your case first column
                            "className": "text-center"
                        }
                    ]
            });

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
        

            $('.tabel-tahunlalu2').DataTable({
                sorting:false,
                processing: true,
                serverSide: true,
                ajax: "get-jmlpenduduk/{{ $tempstruk->tahun_priode-2 }}",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                    
                    {data: 'nama', name: 'nama',sortable:false},
                    {data: 'islam', name: 'islam',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'kristen', name: 'kristen',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'katolik', name: 'katolik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'hindu', name: 'hindu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'buddha', name: 'buddha',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'khonghucu', name: 'khonghucu',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'lainnya', name: 'lainnya',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'total',
                      render: function(data,type,row) { 
                      
                          data = row.islam+row.kristen+row.katolik+row.hindu+row.buddha+row.khonghucu+row.lainnya;
                          return nf.format(data);

                          }
                          ,sortable:false },
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,3,4,5,6,7,8,9], // your case first column
                            "className": "text-center"
                        }
                    ]
            });


       
        $('.islam').editable({
            url:"update_jmlpenduduk/islam",
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
            url:"update_jmlpenduduk/kristen",
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
            url:"update_jmlpenduduk/katolik",
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
            url:"update_jmlpenduduk/hindu",
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
            url:"update_jmlpenduduk/buddha",
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
                url:"update_jmlpenduduk/khonghucu",
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
            url:"update_jmlpenduduk/lainnya",
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