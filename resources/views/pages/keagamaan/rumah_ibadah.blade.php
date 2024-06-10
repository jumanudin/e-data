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
        <h3 >Rumah Ibadah </h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('rumah_ibadah') }}">Layanan Keagamaan</a></div>
            <div class="breadcrumb-item">Data Rumah Ibadah  </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data Rumah Ibadah Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_RmhIbadah')->l)     
                    <a class="nav-link {{request()->is('rumah_ibadah')?'active':null}}" id="tahunlalu-tab" data-toggle="tab" href="#tahunlalu" role="tab" aria-controls="" aria-selected="false">{{ $tempstruk->tahun_priode }}</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_RmhIbadah')->l)   
                    <a class="nav-link" id="tahunlalu1-tab" data-toggle="tab" href="#tahunlalu1" role="tab" aria-controls="tahunlalau1" aria-selected="false">{{ $tempstruk->tahun_priode-1 }}</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_RmhIbadah')->l)
                    <a class="nav-link" id="tahunlalu2-tab" data-toggle="tab" href="#tahunlalu2" role="tab" aria-controls="tahunlalau2" aria-selected="false">{{ $tempstruk->tahun_priode-2 }}</a>
                    @endif
                    </li>
                    
                </ul>    
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tahunlalu" role="tabpanel" aria-labelledby="tahunlalu-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Rumah Ibadah Tahun {{ $tempstruk->tahun_priode }}</h4>
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
                                        <th colspan="2" >Islam</th>
                                        <th >Kristen</th>
                                        <th >Katolik</th>
                                        <th >Hindu</th>
                                        <th >Buddha</th>
                                        <th >Khonghucu</th>
                                        
                                    </tr>
                                    <tr class="text-center">
                                        <th>Masjid</th>
                                        <th>Musholla</th>
                                        <th>Gereja</th>
                                        <th >Gereja</th>
                                        <th >Pura</th>
                                        <th >Vihara</th>
                                        <th >Kelenteng</th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
                                @foreach ($data as $temp)
                                          <tr >
                                            <td class="text-center">{{ $temp->idx}}</td>
                                            <!-- <td>{{ $temp->id }}</td> -->
                                            <td>{{ $temp->nama }}</td>
                                            <td class="text-center"><a href="" class="masjid" data-type="number" data-name="masjid" data-pk="{{$temp->id}}">{{ number_format($temp->masjid) }}</a></td>
                                            <td class="text-center"><a href="" class="musholla" data-type="number" data-name="musholla" data-pk="{{$temp->id}}">{{ number_format($temp->musholla) }}</a></td>
                                            <td class="text-center"><a href="" class="gereja_kristen" data-type="number" data-name="gereja_kristen" data-pk="{{$temp->id}}">{{ number_format($temp->gereja_kristen) }}</a></td>
                                            <td class="text-center"><a href="" class="gereja_katolik" data-type="number" data-name="gereja_katolik" data-pk="{{$temp->id}}">{{ number_format($temp->gereja_katolik) }}</a></td>
                                            <td class="text-center"><a href="" class="pura" data-type="number" data-name="pura" data-pk="{{$temp->id}}">{{ number_format($temp->pura) }}</a></td>
                                            <td class="text-center"><a href="" class="vihara" data-type="number" data-name="vihara" data-pk="{{$temp->id}}">{{ number_format($temp->vihara) }}</a></td>
                                            <td class="text-center"><a href="" class="kelenteng" data-type="number" data-name="kelenteng" data-pk="{{$temp->id}}">{{ number_format($temp->kelenteng) }}</a></td>
                                                                   
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
                                <h4>Data Rumah Ibdah Tahun {{ $tempstruk->tahun_priode-1 }} </h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                            <table id="tabel-tahunlalu1" class="table style table-striped table-hover tabel-tahunlalu1" style="width:100%">
                                <thead class="text-white">
                                    <tr class="text-center">
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                        <th colspan="2" >Islam</th>
                                        <th >Kristen</th>
                                        <th >Katolik</th>
                                        <th >Hindu</th>
                                        <th >Buddha</th>
                                        <th >Khonghucu</th>
                                        
                                    </tr>
                                    <tr class="text-center">
                                        <th>Masjid</th>
                                        <th>Musholla</th>
                                        <th>Gereja</th>
                                        <th >Gereja</th>
                                        <th >Pura</th>
                                        <th >Vihara</th>
                                        <th >Kelenteng</th>
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
                        <div class="card card-success shadow">
                        <div class="card-header">
                            <div class="col-md-6 text-left mb-0 ">
                                <h4>Data Rumah Ibadah Tahun {{ $tempstruk->tahun_priode-2 }}</h4>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="table-responsive">       
                                <table id="tabel-tahunlalu2" class="table style table-striped table-hover tabel-tahunlalu2" style="width:100%">
                                <thead class="text-white">
                                    <tr class="text-center">
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                        <th colspan="2" >Islam</th>
                                        <th >Kristen</th>
                                        <th >Katolik</th>
                                        <th >Hindu</th>
                                        <th >Buddha</th>
                                        <th >Khonghucu</th>
                                        
                                    </tr>
                                    <tr class="text-center">
                                        <th>Masjid</th>
                                        <th>Musholla</th>
                                        <th>Gereja</th>
                                        <th >Gereja</th>
                                        <th >Pura</th>
                                        <th >Vihara</th>
                                        <th >Kelenteng</th>
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
                ajax: "get-rumahibadah/{{ $tempstruk->tahun_priode-1 }}",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                    {data: 'id', name: 'id', visible:false},
                    {data: 'nama', name: 'nama',sortable:false},
                    // {data: 'masjid',
                    //   render: function(data,type,row) { 
                      
                    //       data = '<a href="" class="masjid" data-type="number" data-name="masjid" data-pk="'+row.id+'" >' + data + '</a>';
                    //       return data;

                    //       }
                    //       ,sortable:false },
                    {data: 'masjid', name: 'masjid',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'musholla', name: 'musholla',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'gereja_kristen', name: 'gereja_kristen',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'gereja_katolik', name: 'gereja_katolik',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'pura', name: 'pura',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'vihara', name: 'vihara',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'kelenteng', name: 'kelenteng',
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
                ajax: "get-rumahibadah/{{ $tempstruk->tahun_priode-2 }}",
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' ,sortable:false},
                    {data: 'id', name: 'id', visible:false},
                    {data: 'nama', name: 'nama',sortable:false},
                    {data: 'masjid', name: 'masjid',
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'musholla', name: 'musholla' ,
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'gereja_kristen', name: 'gereja_kristen' ,
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'gereja_katolik', name: 'gereja_katolik' ,
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'pura', name: 'pura' ,
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'vihara', name: 'vihara' ,
                      render: function(data,type,row) { 
                      
                          return nf.format(data);

                          },sortable:false},
                    {data: 'kelenteng', name: 'kelenteng' ,
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


       
        $('.masjid').editable({
            url:"update_data/masjid",
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
            url:"update_data/musholla",
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

        $('.gereja_kristen').editable({
            url:"update_data/gereja_kristen",
            type:'number',
            pk:1,
            name:'gereja_kristen',
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

        $('.gereja_katolik').editable({
            url:"update_data/gereja_katolik",
            type:'number',
            pk:1,
            name:'gereja_katolik',
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

        $('.pura').editable({
            url:"update_data/pura",
            type:'number',
            pk:1,
            name:'pura',
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
           
            $('.vihara').editable({
                url:"update_data/vihara",
                type:'number',
                pk:1,
                name:'vihara',
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

            $('.kelenteng').editable({
            url:"update_data/kelenteng",
            type:'number',
            pk:1,
            name:'kelenteng',
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