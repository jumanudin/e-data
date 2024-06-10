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
        <h3 >Jumlah Qori dan Hafiz  </h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('rumah_ibadah') }}">Layanan Keagamaan</a></div>
            <div class="breadcrumb-item">Data Qori dan Hafiz </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data Jumlah Qori dan Hafiz Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                  
              
                    <div class="tab-pane fade show active" id="qorihafiz" role="tabpanel" aria-labelledby="qorihafiz-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Qori dan Hafiz Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tabel-qorihafiz" class="table style table-striped table-hover tabel-qorihafiz" style="width:100%">
                                <thead class="text-white">
                                <tr class="text-center">
                                        <th rowspan="2" >No</th>
                                        <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                        <th colspan="2" >Qori</th>
                                        <th rowspan="2" >Total</th>
                                        <th colspan="2" >Hafiz</th>
                                        <th rowspan="2" >Total</th>
                                        
                                    </tr>
                                <tr class="text-center">
                                    
                                              <th>Pria</th>
                                              <th>Wanita</th>
                                              <th>Pria</th>
                                              <th>Wanita</th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-light">
                                @foreach ($dataqorihafiz as $temp)
                                          <tr >
                                            <td class="text-center">{{ $temp->idx}}</td>
                                            <!-- <td>{{ $temp->id }}</td> -->
                                            <td>{{ $temp->nama }}</td>
                                            <td class="text-center"><a href="" class="qori_pria" data-type="number" data-name="qori_pria" data-pk="{{$temp->id}}">{{ number_format($temp->qori_pria) }}</a></td>
                                            <td class="text-center"><a href="" class="qori_wanita" data-type="number" data-name="qori_wanita" data-pk="{{$temp->id}}">{{ number_format($temp->qori_wanita) }}</a></td>
                                            <td class="text-center"><b>{{ number_format($temp->qori_wanita+$temp->qori_pria) }}</b></td>
                                            <td class="text-center"><a href="" class="hafiz_pria" data-type="number" data-name="hafiz_pria" data-pk="{{$temp->id}}">{{ number_format($temp->hafiz_pria)}}</a></td>
                                            <td class="text-center"><a href="" class="hafiz_wanita" data-type="number" data-name="hafiz_wanita" data-pk="{{$temp->id}}">{{ number_format($temp->hafiz_wanita) }}</a></td>
                                            <td class="text-center"><b>{{ number_format($temp->hafiz_pria+$temp->hafiz_wanita) }}</b></td>
                                                                     
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
      
        
               
            $("#tabel-qorihafiz").dataTable({
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
        

            


       
        $('.qori_pria').editable({
            url:"update_qori/qori_pria",
            type:'number',
            pk:1,
            name:'qori_pria',
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

        $('.qori_wanita').editable({
            url:"update_qori/qori_wanita",
            type:'number',
            pk:1,
            name:'qori_wanita',
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

        $('.hafiz_pria').editable({
            url:"update_qori/hafiz_pria",
            type:'number',
            pk:1,
            name:'hafiz_pria',
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

        $('.hafiz_wanita').editable({
            url:"update_qori/hafiz_wanita",
            type:'number',
            pk:1,
            name:'hafiz_wanita',
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