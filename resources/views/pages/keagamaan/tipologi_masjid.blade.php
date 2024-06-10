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
        <h3 >Tipologi Masjid </h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('rumah_ibadah') }}">Layanan Keagamaan</a></div>
            <div class="breadcrumb-item">Data Tipologi Masjid  </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data Tipologi Masjid Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_JmlPenduduk')->l)     
                    <a class="nav-link {{request()->is('penyuluh_nonpns')?'active':null}}" id="tahunlalu-tab" data-toggle="tab" href="#tahunlalu" role="tab" aria-controls="" aria-selected="false">{{ $tempstruk->tahun_priode }}</a>
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
                                    <h4>Data Tipologi Masjid Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tabel-tahunlalu" class="table style table-striped table-hover tabel-tahunlalu" style="width:100%">
                                <thead class="text-white">
                                <tr class="text-center">
                                        <th rowspan="2" >No</th>
                                        <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                        <th colspan="8" >Tipologi Masjid</th>
                                        <th colspan="2" >Jumlah</th>
                                        
                                    </tr>
                                <tr class="text-center">
                                    
                                              <th>Negara</th>
                                              <th>Raya</th>
                                              <th>Agung</th>
                                              <th>Besar</th>
                                              <th>Jamik</th>
                                              <th>Bersejarah</th>
                                              <th>Umum</th>
                                              <th>Nasional</th>
                                              <th>Masjid</th>
                                              <th>Musholla</th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
                                @foreach ($data as $temp)
                                          <tr >
                                            <td class="text-center">{{ $temp->idx}}</td>
                                            <td>{{ $temp->nama }}</td>
                                            <td class="text-center"><a href="" class="ngr" data-type="number" data-name="ngr" data-pk="{{$temp->id}}">{{ number_format($temp->ngr) }}</a></td>
                                            <td class="text-center"><a href="" class="raya" data-type="number" data-name="raya" data-pk="{{$temp->id}}">{{ number_format($temp->raya) }}</a></td>
                                            <td class="text-center"><a href="" class="agung" data-type="number" data-name="agung" data-pk="{{$temp->id}}">{{ number_format($temp->agung) }}</a></td>
                                            <td class="text-center"><a href="" class="besar" data-type="number" data-name="besar" data-pk="{{$temp->id}}">{{ number_format($temp->besar) }}</a></td>
                                            <td class="text-center"><a href="" class="jamik" data-type="number" data-name="jamik" data-pk="{{$temp->id}}">{{ number_format($temp->jamik) }}</a></td>
                                            <td class="text-center"><a href="" class="sejarah" data-type="number" data-name="sejarah" data-pk="{{$temp->id}}">{{ number_format($temp->sejarah) }}</a></td>
                                            <td class="text-center"><a href="" class="umum" data-type="number" data-name="umum" data-pk="{{$temp->id}}">{{ number_format($temp->umum) }}</a></td>
                                            <td class="text-center"><a href="" class="nasional" data-type="number" data-name="nasional" data-pk="{{$temp->id}}">{{ number_format($temp->nasional) }}</a></td>
                                            <td class="text-center">{{ number_format($temp->ngr+$temp->raya+$temp->agung+$temp->besar+$temp->jamik+$temp->sejarah+$temp->umum+$temp->nasional) }}</td>
                                            <td class="text-center"><a href="" class="musholla" data-type="number" data-name="musholla" data-pk="{{$temp->id}}">{{ number_format($temp->musholla) }}</a></td>
                                                                   
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
                                <h4>Data Tipologi Masjid Tahun {{ $tempstruk->tahun_priode-1 }} </h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                            <table id="tabel-tahunlalu1" class="table style table-striped table-hover tabel-tahunlalu1" style="width:100%">
                                <thead class="text-white">
                                <tr class="text-center">
                                        <th rowspan="2" >No</th>
                                        <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                        <th colspan="8" >Tipologi Masjid</th>
                                        <th colspan="2" >Jumlah</th>
                                        
                                    </tr>
                                <tr class="text-center">
                                    
                                              <th>Negara</th>
                                              <th>Raya</th>
                                              <th>Agung</th>
                                              <th>Besar</th>
                                              <th>Jamik</th>
                                              <th>Bersejarah</th>
                                              <th>Umum</th>
                                              <th>Nasional</th>
                                              <th>Masjid</th>
                                              <th>Musholla</th>
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
                                <h4>Data Tipologi Masjid Tahun {{ $tempstruk->tahun_priode-2 }}</h4>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="table-responsive">       
                                <table id="tabel-tahunlalu2" class="table style table-striped table-hover tabel-tahunlalu2" style="width:100%">
                                <thead class="text-white">
                                <tr class="text-center">
                                        <th rowspan="2" >No</th>
                                        <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                        <th colspan="8" >Tipologi Masjid</th>
                                        <th colspan="2" >Jumlah</th>
                                        
                                    </tr>
                                <tr class="text-center">
                                    
                                              <th>Negara</th>
                                              <th>Raya</th>
                                              <th>Agung</th>
                                              <th>Besar</th>
                                              <th>Jamik</th>
                                              <th>Bersejarah</th>
                                              <th>Umum</th>
                                              <th>Nasional</th>
                                              <th>Masjid</th>
                                              <th>Musholla</th>
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
                ajax: "get-tipomasjid/{{ $tempstruk->tahun_priode-1 }}",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                    {data: 'nama', name: 'nama',sortable:false},
                    
                    {data: 'ngr', name: 'ngr',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'raya', name: 'raya',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'agung', name: 'agung',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'besar', name: 'besar',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'jamik', name: 'jamik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'sejarah', name: 'sejarah',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'umum', name: 'umum',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'nasional', name: 'nasional',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'masjid', name: 'masjid',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'musholla', name: 'musholla',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    
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
                    
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });   
        

                    $('.tabel-tahunlalu2').DataTable({
                sorting:false,
                processing: true,
                serverSide: true,
                ajax: "get-tipomasjid/{{ $tempstruk->tahun_priode-2 }}",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                    {data: 'nama', name: 'nama',sortable:false},
                    
                    {data: 'ngr', name: 'ngr',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'raya', name: 'raya',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'agung', name: 'agung',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'besar', name: 'besar',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'jamik', name: 'jamik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'sejarah', name: 'sejarah',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'umum', name: 'umum',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'nasional', name: 'nasional',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},

                    {data: 'masjid', name: 'masjid',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'musholla', name: 'musholla',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    
                ],
                'columnDefs': [
                        {
                            "targets": [0,3,4,5,6,7,8,9], // your case first column
                            "className": "text-center"
                        }
                    ]
            });


       
        $('.ngr').editable({
            url:"update_tipomasjid/ngr",
            type:'number',
            pk:1,
            name:'ngr',
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

        $('.raya').editable({
            url:"update_tipomasjid/raya",
            type:'number',
            pk:1,
            name:'raya',
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

        $('.agung').editable({
            url:"update_tipomasjid/agung",
            type:'number',
            pk:1,
            name:'agung',
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

        $('.besar').editable({
            url:"update_tipomasjid/besar",
            type:'number',
            pk:1,
            name:'besar',
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

        $('.jamik').editable({
            url:"update_tipomasjid/jamik",
            type:'number',
            pk:1,
            name:'jamik',
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
           
            $('.sejarah').editable({
                url:"update_tipomasjid/sejarah",
                type:'number',
                pk:1,
                name:'sejarah',
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

            $('.umum').editable({
            url:"update_tipomasjid/umum",
            type:'number',
            pk:1,
            name:'umum',
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

            $('.nasional').editable({
            url:"update_tipomasjid/nasional",
            type:'number',
            pk:1,
            name:'nasional',
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

            $('.masjid').editable({
            url:"update_tipomasjid/masjid",
            type:'number',
            pk:1,
            name:'masjid',
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

            $('.musholla').editable({
            url:"update_tipomasjid/musholla",
            type:'number',
            pk:1,
            name:'musholla',
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