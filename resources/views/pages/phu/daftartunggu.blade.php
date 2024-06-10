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
                <h3 >Data Daftar Tunggu Jemaah Haji</h3>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
                    <div class="breadcrumb-item"><a href="{{ route('rumah_ibadah') }}">Layanan PHU</a></div>
                    <div class="breadcrumb-item">Data Daftar Tunggu Jemaah Haji</div>
                </div>
            </div>
        </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">Daftar Tunggu Jemaah Haji Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layphu_pendaftaran')->l)     
                    <a class="nav-link {{request()->is('daftartunggu')?'active':null}}" id="kelamin-tab" data-toggle="tab" href="#kelamin" role="tab" aria-controls="" aria-selected="false">Berdasarkan Kelamin</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layphu_pendaftaran')->l)   
                    <a class="nav-link" id="pendidikan-tab" data-toggle="tab" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="false">Berdasarkan Pendidikan</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layphu_pendaftaran')->l)
                    <a class="nav-link" id="usia-tab" data-toggle="tab" href="#usia" role="tab" aria-controls="usia" aria-selected="false">Berdasarkan Usia</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layphu_pendaftaran')->l)
                    <a class="nav-link" id="pekerjaan-tab" data-toggle="tab" href="#pekerjaan" role="tab" aria-controls="pekerjaan" aria-selected="false">Berdasarkan Pekerjaan</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layphu_pendaftaran')->l)
                    <a class="nav-link" id="pengalaman-tab" data-toggle="tab" href="#pengalaman" role="tab" aria-controls="pengalaman" aria-selected="false">Berdasarkan Pengalaman Haji</a>
                    @endif
                    </li>
                </ul>    
                    <div class="tab-content" id="myTabContent">


                    <!-- ------- awal tab berdasarkan jenis kelamin ----------------------- -->


                        <div class="tab-pane fade show active" id="kelamin" role="tabpanel" aria-labelledby="kelamin-tab">
                        
                            <div class="card card-warning shadow">
                                <div class="card-header">
                                    <div class="col-md-6 text-left ">
                                        <h4>Data Daftar Tunggu Jemaah Haji Berdasarkan Jenis Kelamin Tahun {{ $tempstruk->tahun_priode }}</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="tabel-kelamin" class="table style table-striped table-hover tabel-kelamin" style="width:100%">
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
                                                @foreach ($datatunggukelamin as $temp)
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
                    <!-- ------------------------------ End Jenis Kelamin ------------------------------  -->


                            <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
                                        <div class="card card-success shadow">
                                            <div class="card-header">
                                                <div class="col-md-6 text-left mb-0 ">
                                                    <h4>Data Daftar Tunggu Jemaah Haji Berdasarkan Jenjang Pendidikan Tahun {{ $tempstruk->tahun_priode }} </h4>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="col-md-12">
                                                <div class="table-responsive">
                                                <table id="tabel-pendidikan" class="table style table-striped table-hover tabel-pendidikan" style="width:100%">
                                                    <thead class="text-white">
                                                        <tr class="text-center">
                                                            <th >No</th>
                                                            <th  text-align="center">Kabupaten / Kota</th>
                                                            <th >SD/MI</th>
                                                            <th >SLTP/MTs</th>
                                                            <th >SLTA/MA</th>
                                                            <th >DIPLOMA</th>
                                                            <th >S1</th>
                                                            <th >S2</th>
                                                            <th >S3</th>
                                                            <th >LAINNYA</th>
                                                            <th >JUMLAH</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list bg-light">
                                                    @foreach ($datapendidikan as $temp)
                                                            <tr >
                                                                <td class="text-center">{{ $temp->idx}}</td>
                                                                <td>{{ $temp->nama }}</td>
                                                                <td class="text-center"><a href="" class="sd" data-type="number" data-name="sd" data-pk="{{$temp->id}}">{{ number_format($temp->sd) }}</a></td>
                                                                <td class="text-center"><a href="" class="sltp" data-type="number" data-name="sltp" data-pk="{{$temp->id}}">{{ number_format($temp->sltp) }}</a></td>
                                                                <td class="text-center"><a href="" class="slta" data-type="number" data-name="slta" data-pk="{{$temp->id}}">{{ number_format($temp->slta) }}</a></td>
                                                                <td class="text-center"><a href="" class="d1_d3" data-type="number" data-name="d1_d3" data-pk="{{$temp->id}}">{{ number_format($temp->d1_d3) }}</a></td>
                                                                <td class="text-center"><a href="" class="s1" data-type="number" data-name="s1" data-pk="{{$temp->id}}">{{ number_format($temp->s1) }}</a></td>
                                                                <td class="text-center"><a href="" class="s2" data-type="number" data-name="s2" data-pk="{{$temp->id}}">{{ number_format($temp->s2) }}</a></td>
                                                                <td class="text-center"><a href="" class="s3" data-type="number" data-name="s3" data-pk="{{$temp->id}}">{{ number_format($temp->s3) }}</a></td>
                                                                <td class="text-center"><a href="" class="lainnya" data-type="number" data-name="lainnya" data-pk="{{$temp->id}}">{{ number_format($temp->lainnya) }}</a></td>
                                                                <td class="text-center">{{ number_format($temp->sd+$temp->sltp+$temp->slta+$temp->d1_d3+$temp->s1+$temp->s2+$temp->s3+$temp->lainnya) }}</td>
                                                                                    
                                                            </tr>
                                                            @endforeach 
                                                    </tbody>
                                                    </table>
                                                </div>                            
                                                </div>                                                                
                                            </div>
                                        </div>
                            </div>
                            <!-- ------------------------- End Berdasarkan Pendidikan ------------------------------ -->
                        <div class="tab-pane fade" id="usia" role="tabpanel" aria-labelledby="usia-tab">
                            <div class="card card-success shadow">
                                <div class="card-header">
                                    <div class="col-md-6 text-left mb-0 ">
                                        <h4>Data Daftar Tunggu Jemaah Haji Berdasarkan Rentang Usia Tahun {{ $tempstruk->tahun_priode }}</h4>
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">       
                                                <table id="tabel-usia" class="table style table-striped table-hover tabel-usia" style="width:100%">
                                                <thead class="text-white">
                                                    <tr class="text-center">
                                                        <th >No</th>
                                                        <th  text-align="center">Kabupaten / Kota</th>
                                                        <th >< 18</th>
                                                        <th >18-50</th>
                                                        <th >51-65</th>
                                                        <th >66-75</th>
                                                        <th >> 75</th>
                                                        <th >Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list bg-light">
                                                @foreach ($datausia as $temp)
                                                        <tr >
                                                            <td class="text-center">{{ $temp->idx}}</td>
                                                            <td>{{ $temp->nama }}</td>
                                                            <td class="text-center"><a href="" class="kurang_18" data-type="number" data-name="kurang_18" data-pk="{{$temp->id}}">{{ number_format($temp->kurang_18) }}</a></td>
                                                            <td class="text-center"><a href="" class="rentang_18_50" data-type="number" data-name="rentang_18_50" data-pk="{{$temp->id}}">{{ number_format($temp->rentang_18_50) }}</a></td>
                                                            <td class="text-center"><a href="" class="rentang_51_65" data-type="number" data-name="rentang_51_65" data-pk="{{$temp->id}}">{{ number_format($temp->rentang_51_65) }}</a></td>
                                                            <td class="text-center"><a href="" class="rentang_66_75" data-type="number" data-name="rentang_66_75" data-pk="{{$temp->id}}">{{ number_format($temp->rentang_66_75) }}</a></td>
                                                            <td class="text-center"><a href="" class="lebih_75" data-type="number" data-name="lebih_75" data-pk="{{$temp->id}}">{{ number_format($temp->lebih_75) }}</a></td>
                                                            <td class="text-center">{{ number_format($temp->kurang_18+$temp->rentang_18_50+$temp->rentang_51_65+$temp->rentang_66_75+$temp->lebih_75) }}</td>
                                                                                
                                                        </tr>
                                                        @endforeach 
                                                </tbody>
                                                </table>
                                            </div>                                                
                                        </div>
                                </div>
                            </div>    
                        <!-- ----- End berdasarkan Usia------  -->

                            <div class="tab-pane fade" id="pekerjaan" role="tabpanel" aria-labelledby="pekerjaan-tab">
                                    <div class="card card-success shadow">
                                        <div class="card-header">
                                            <div class="col-md-6 text-left mb-0 ">
                                                <h4>Data Daftar Tunggu Jemaah Haji Berdasarkan Jenis Pekerjaan Tahun {{ $tempstruk->tahun_priode }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">       
                                            <table id="tabel-pekerjaan" class="table style table-striped table-hover tabel-pekerjaan" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >No</th>
                                                    <th  text-align="center">Kabupaten / Kota</th>
                                                    <th >PNS</th>
                                                    <th >TNI/POLRI</th>
                                                    <th >NIAGA</th>
                                                    <th >TANI/NELAYAN</th>
                                                    <th >SWASTA</th>
                                                    <th >IRT</th>
                                                    <th >PELAJAR/MHS</th>
                                                    <th >BUMN(D)</th>
                                                    <th >PENSIUNAN</th>
                                                    <th >LAIN-LAIN</th>
                                                    <th >JUMLAH</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datapekerjaan as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="pns" data-type="number" data-name="pns" data-pk="{{$temp->id}}">{{ number_format($temp->pns) }}</a></td>
                                                        <td class="text-center"><a href="" class="tni_polri" data-type="number" data-name="tni_polri" data-pk="{{$temp->id}}">{{ number_format($temp->tni_polri) }}</a></td>
                                                        <td class="text-center"><a href="" class="niaga" data-type="number" data-name="niaga" data-pk="{{$temp->id}}">{{ number_format($temp->niaga) }}</a></td>
                                                        <td class="text-center"><a href="" class="tani" data-type="number" data-name="tani" data-pk="{{$temp->id}}">{{ number_format($temp->tani) }}</a></td>
                                                        <td class="text-center"><a href="" class="swasta" data-type="number" data-name="swasta" data-pk="{{$temp->id}}">{{ number_format($temp->swasta) }}</a></td>
                                                        <td class="text-center"><a href="" class="irt" data-type="number" data-name="irt" data-pk="{{$temp->id}}">{{ number_format($temp->irt) }}</a></td>
                                                        <td class="text-center"><a href="" class="pelajar" data-type="number" data-name="pelajar" data-pk="{{$temp->id}}">{{ number_format($temp->pelajar) }}</a></td>
                                                        <td class="text-center"><a href="" class="bumn_bumd" data-type="number" data-name="bumn_bumd" data-pk="{{$temp->id}}">{{ number_format($temp->bumn_bumd) }}</a></td>
                                                        <td class="text-center"><a href="" class="pensiun" data-type="number" data-name="pensiun" data-pk="{{$temp->id}}">{{ number_format($temp->pensiun) }}</a></td>
                                                        <td class="text-center"><a href="" class="lain_lain" data-type="number" data-name="lain_lain" data-pk="{{$temp->id}}">{{ number_format($temp->lain_lain) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->pns+$temp->tni_polri+$temp->niaga+$temp->tani+$temp->swasta+$temp->irt+$temp->pelajar+$temp->bumn_bumd+$temp->pensiun+$temp->lain_lain) }}</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                            </div>                                                
                                        </div>
                                    </div>
                                </div> 


                                <!-- ==================== End Berdasarkan Pekerjaan ==============================  -->
                            <!-- -------- End Berdasarkan Jenis Pekerjaan --------  -->

                <div class="tab-pane fade show active" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">
                        
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Daftar Tunggu Jemaah Haji Berdasarkan Pengalaman Berhaji Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-pengalaman" class="table style table-striped table-hover tabel-pengalaman" style="width:100%">
                                            <thead class="text-white">
                                                <tr class="text-center">
                                                    <th >No</th>
                                                    <th text-align="center">Kabupaten / Kota</th>
                                                    <th >Belum Haji</th>
                                                    <th >Pernah Haji</th>
                                                    <th >Jumlah</th>
                                                    
                                                </tr>
                                                
                                            </thead>
                                            <tbody class="list bg-light">
                                            @foreach ($datapengalaman as $temp)
                                                    <tr >
                                                        <td class="text-center">{{ $temp->idx}}</td>
                                                        <!-- <td>{{ $temp->id }}</td> -->
                                                        <td>{{ $temp->nama }}</td>
                                                        <td class="text-center"><a href="" class="belum" data-type="number" data-name="belum" data-pk="{{$temp->id}}">{{ number_format($temp->belum) }}</a></td>
                                                        <td class="text-center"><a href="" class="sudah" data-type="number" data-name="sudah" data-pk="{{$temp->id}}">{{ number_format($temp->sudah) }}</a></td>
                                                        <td class="text-center">{{ number_format($temp->belum+$temp->sudah) }}</td>
                                                                            
                                                    </tr>
                                                    @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                            </div>
                        </div>    

                    </div>

                    <!-- ---- End Berdasarkan Pengalaman Haji ----------------------  -->  
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
        
             
        $("#tabel-kelamin").dataTable({
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
            url:"update_daftartunggu/pria",
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
            url:"update_daftartunggu/wanita",
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


        $('.sd').editable({
            url:"update_daftartunggu/sd",
            type:'number',
            pk:1,
            name:'sd',
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

        $('.sltp').editable({
            url:"update_daftartunggu/sltp",
            type:'number',
            pk:1,
            name:'sltp',
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

        $('.slta').editable({
            url:"update_daftartunggu/slta",
            type:'number',
            pk:1,
            name:'sd',
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

        $('.d1_d3').editable({
            url:"update_daftartunggu/d1_d3",
            type:'number',
            pk:1,
            name:'d1_d3',
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
            url:"update_daftartunggu/s1",
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
            url:"update_daftartunggu/s2",
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
            url:"update_daftartunggu/s3",
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

        $('.lainnya').editable({
            url:"update_daftartunggu/lainnya",
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

        $("#tabel-usia").dataTable({
                    "columnDefs": [
                        { "sortable": false }
                    ],
                    ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    }); 


        $('.kurang_18').editable({
            url:"update_daftartunggu/kurang_18",
            type:'number',
            pk:1,
            name:'kurang_18',
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

        $('.rentang_18_50').editable({
            url:"update_daftartunggu/rentang_18_50",
            type:'number',
            pk:1,
            name:'rentang_18_50',
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

        $('.rentang_51_65').editable({
            url:"update_daftartunggu/rentang_51_65",
            type:'number',
            pk:1,
            name:'rentang_51_65',
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

        $('.rentang_66_75').editable({
            url:"update_daftartunggu/rentang_66_75",
            type:'number',
            pk:1,
            name:'rentang_66_75',
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

        $('.lebih_75').editable({
            url:"update_daftartunggu/lebih_75",
            type:'number',
            pk:1,
            name:'lebih_75',
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

        $("#tabel-pekerjaan").dataTable({
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


        $('.pns').editable({
            url:"update_daftartunggu/pns",
            type:'number',
            pk:1,
            name:'pns',
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

        $('.tni_polri').editable({
            url:"update_daftartunggu/tni_polri",
            type:'number',
            pk:1,
            name:'tni_polri',
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

        $('.niaga').editable({
            url:"update_daftartunggu/niaga",
            type:'number',
            pk:1,
            name:'niaga',
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

        $('.tani').editable({
            url:"update_daftartunggu/tani",
            type:'number',
            pk:1,
            name:'tani',
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

        $('.swasta').editable({
            url:"update_daftartunggu/swasta",
            type:'number',
            pk:1,
            name:'swasta',
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

        $('.irt').editable({
            url:"update_daftartunggu/irt",
            type:'number',
            pk:1,
            name:'irt',
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

        $('.pelajar').editable({
            url:"update_daftartunggu/pelajar",
            type:'number',
            pk:1,
            name:'pelajar',
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

        $('.bumn_bumd').editable({
            url:"update_daftartunggu/bumn_bumd",
            type:'number',
            pk:1,
            name:'bumn_bumd',
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

        $('.pensiun').editable({
            url:"update_daftartunggu/pensiun",
            type:'number',
            pk:1,
            name:'pensiun',
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

        $('.lain_lain').editable({
            url:"update_daftartunggu/lain_lain",
            type:'number',
            pk:1,
            name:'lain_lain',
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

        $("#tabel-pengalaman").dataTable({
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
        

            

       
        $('.belum').editable({
            url:"update_daftartunggu/belum",
            type:'number',
            pk:1,
            name:'belum',
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

        $('.sudah').editable({
            url:"update_daftartunggu/sudah",
            type:'number',
            pk:1,
            name:'sudah',
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