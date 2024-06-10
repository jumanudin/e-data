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
        <h3 >WAKAF</h3>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('penyuluh_pns') }}">Layanan Keagamaan</a></div>
            <div class="breadcrumb-item">Data Wakaf </div>
        </div>
      </div>
  </section>  
  <div class="row">
    <div class="col"> 
        <div class="card shadow">
            <div class="card-header bg-succes border">
                <div class="row col-12 align-items-center">
                    <div class="col-8">
                        <h5 class=" mb-0">List Data Wakaf Per Kabupaten Kota</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Wakaf')->l)     
                    <a class="nav-link {{request()->is('wakaf')?'active':null}}" id="statuswakaf-tab" data-toggle="tab" href="#statuswakaf" role="tab" aria-controls="" aria-selected="false">Status Wakaf</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Wakaf')->l)     
                    <a class="nav-link " id="wakafmanfaat-tab" data-toggle="tab" href="#wakafmanfaat" role="tab" aria-controls="" aria-selected="false">Pemanfaatan Wakaf</a>
                    @endif
                    </li>
                    <li class="nav-item">
                    @if(Helper::cek_level_akses('layagama_Wakaf')->l)     
                    <a class="nav-link " id="wakafproduktif-tab" data-toggle="tab" href="#wakafproduktif" role="tab" aria-controls="" aria-selected="false">Wakaf Produktif</a>
                    @endif
                    </li>
                </ul>    
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="statuswakaf" role="tabpanel" aria-labelledby="statuswakaf-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Lokasi, Luas dan Status Tanah Wakaf Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-statuswakaf" class="table style table-striped table-hover tabel-statuswakaf" style="width:100%">
                                            <thead class="text-white">
                                            <tr class="text-center">
                                                    <th rowspan="2" >No</th>
                                                    <th rowspan="2" text-align="center">Kabupaten / Kota</th>
                                                    <th rowspan="2" >JUMLAH</th>
                                                    <th rowspan="2" >LUAS</th>
                                                    <th colspan="2" >SUDAH SERTIFIKAT</th>
                                                    <th colspan="2" >BELUM SERTIFIKAT</th>
                                                    
                                                </tr>
                                            <tr class="text-center">
                                                
                                                        <th>JUMLAH</th>
                                                        <th>LUAS[Ha]</th>
                                                        <th>JUMLAH</th>
                                                        <th>LUAS[Ha]</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list bg-light">
                                                @foreach ($datastatuswakaf as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center"><b>{{ number_format($temp->jml_serti+$temp->jml_belum) }}</b></td>
                                                    <td class="text-center"><b>{{ number_format($temp->luas_serti+$temp->luas_belum,2) }}</b></td>
                                                   
                                                    <td class="text-center"><a href="" class="jml_serti" data-type="number" data-name="jml_serti" data-pk="{{$temp->id}}" >{{ number_format($temp->jml_serti) }}</a></td>
                                                    <td class="text-center"><a href="" class="luas_serti" data-type="text"  inputmode="decimal" data-name="luas_serti" data-pk="{{$temp->id}}" >{{ number_format($temp->luas_serti,2) }}</a></td>
                                                    <td class="text-center"><a href="" class="jml_belum" data-type="number" data-name="jml_belum" data-pk="{{$temp->id}}">{{ number_format($temp->jml_belum) }}</a></td>
                                                    <td class="text-center"><a href="" class="luas_belum" data-type="text" inputmode="decimal" data-name="luas_belum" data-pk="{{$temp->id}}">{{ number_format($temp->luas_belum,2) }}</a></td>
                                                    
                                                    
                                                                        
                                                </tr>
                                            @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                                </div>
                        </div>    
                    </div>

                    <!-- ====================== Wakaf Menurut Pemanfaatannya============================== -->

                    <div class="tab-pane fade" id="wakafmanfaat" role="tabpanel" aria-labelledby="wakafmanfaat-tab">
                      
                        <div class="card card-warning shadow">
                            <div class="card-header">
                                <div class="col-md-6 text-left ">
                                    <h4>Data Jumlah Tanah Wakaf Menurut Pemanfaatannya Tahun {{ $tempstruk->tahun_priode }}</h4>
                                </div>
                            </div>

                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="tabel-wakafmanfaat" class="table style table-striped table-hover tabel-wakafmanfaat" style="width:100%">
                                            <thead class="text-white">
                                            <tr class="text-center">
                                                  <th>NO</th>
                                                  <th  text-align="center">KABUPATEN / KOTA</th>
                                                  <th>MASJID</th>
                                                  <th>MUSHOLLA</th>
                                                  <th>SEKOLAH</th>
                                                  <th>PESANTREN</th>
                                                  <th>MAKAM</th>
                                                  <th>SOSIAL LAINNYA</th>
                                                  <th>JUMLAH</th>
                                                    
                                                </tr>
                                            
                                            </thead>
                                            <tbody class="list bg-light">
                                                @foreach ($datawakafmanfaat as $temp)
                                                <tr >
                                                    <td class="text-center">{{ $temp->idx}}</td>
                                                    <!-- <td>{{ $temp->id }}</td> -->
                                                    <td>{{ $temp->nama }}</td>
                                                    <td class="text-center"><a href="" class="masjid" data-type="number" data-name="masjid" data-pk="{{$temp->id}}">{{ number_format($temp->masjid) }}</a></td>
                                                    <td class="text-center"><a href="" class="mushalla" data-type="number" data-name="mushalla" data-pk="{{$temp->id}}">{{ number_format($temp->mushalla) }}</a></td>
                                                    <td class="text-center"><a href="" class="sekolah" data-type="number" data-name="sekolah" data-pk="{{$temp->id}}">{{ number_format($temp->sekolah) }}</a></td>
                                                    <td class="text-center"><a href="" class="pesantren" data-type="number" data-name="pesantren" data-pk="{{$temp->id}}">{{ number_format($temp->pesantren) }}</a></td>
                                                    <td class="text-center"><a href="" class="makam" data-type="number" data-name="makam" data-pk="{{$temp->id}}">{{ number_format($temp->makam) }}</a></td>
                                                    <td class="text-center"><a href="" class="sosial_lain" data-type="number" data-name="sosial_lain" data-pk="{{$temp->id}}">{{ number_format($temp->sosial_lain) }}</a></td>
                                                    <td class="text-center"><b>{{ number_format($temp->masjid+$temp->mushalla+$temp->sekolah+$temp->pesantren+$temp->makam+$temp->sosial_lain) }}</b></td>
                                                    
                                                                        
                                                </tr>
                                            @endforeach 
                                            </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                                                
                                </div>
                        </div>    
                    </div>
                        
                    <!-- ============================= Wakaf Produktif =================================== -->
                    <div class="tab-pane fade" id="wakafproduktif" role="tabpanel" aria-labelledby="wakafproduktif-tab">
                      
                      <div class="card card-warning shadow">
                          <div class="card-header">
                              <div class="col-md-6 text-left ">
                                  <h4>Data Jumlah Tanah Wakaf Produktif Menurut Jenis Usaha Tahun {{ $tempstruk->tahun_priode }}</h4>
                              </div>
                          </div>

                              <div class="card-body">
                                  <div class="col-md-12">
                                      <div class="table-responsive">
                                          <table id="tabel-wakafproduktif" class="table style table-striped table-hover tabel-wakafproduktif" style="width:100%">
                                          <thead class="text-white">
                                          <tr class="text-center">
                                                  <th>NO</th>
                                                  <th  text-align="center">KABUPATEN / KOTA</th>
                                                  <th>PERKEBUNAN</th>
                                                  <th>KOPERASI</th>
                                                  <th>RUMAH SAKIT</th>
                                                  <th>RUMAH SEWA</th>
                                                  <th>PERIKANAN</th>
                                                  <th>TOKO SEWA</th>
                                                  <th>PERTANIAN</th>
                                                  <th>SPBU</th>
                                                  <th>PERKANTORAN SEWA</th>
                                                  <th>KLINIK</th>
                                                  <th>PETERNAKAN</th>
                                                  <th>LAINNYA</th>
                                                  
                                              </tr>
                                          
                                          </thead>
                                          <tbody class="list bg-light">
                                              @foreach ($datawakafproduktif as $temp)
                                              <tr >
                                                  <td class="text-center">{{ $temp->idx}}</td>
                                                  <!-- <td>{{ $temp->id }}</td> -->
                                                  <td>{{ $temp->nama }}</td>
                                                  <td class="text-center"><a href="" class="perkebunan" data-type="number" data-name="perkebunan" data-pk="{{$temp->id}}">{{ number_format($temp->perkebunan) }}</a></td>
                                                  <td class="text-center"><a href="" class="koperasi" data-type="number" data-name="koperasi" data-pk="{{$temp->id}}">{{ number_format($temp->koperasi) }}</a></td>
                                                  <td class="text-center"><a href="" class="rumah_sakit" data-type="number" data-name="ruma_sakit" data-pk="{{$temp->id}}">{{ number_format($temp->rumah_sakit) }}</a></td>
                                                  <td class="text-center"><a href="" class="rumah_sewa" data-type="number" data-name="ruma_sewa" data-pk="{{$temp->id}}">{{ number_format($temp->rumah_sewa) }}</a></td>
                                                  <td class="text-center"><a href="" class="perikanan" data-type="number" data-name="perikanan" data-pk="{{$temp->id}}">{{ number_format($temp->perikanan) }}</a></td>
                                                  <td class="text-center"><a href="" class="toko_sewa" data-type="number" data-name="toko_sewa" data-pk="{{$temp->id}}">{{ number_format($temp->toko_sewa) }}</a></td>
                                                  <td class="text-center"><a href="" class="pertanian" data-type="number" data-name="pertanian" data-pk="{{$temp->id}}">{{ number_format($temp->pertanian) }}</a></td>
                                                  <td class="text-center"><a href="" class="spbu" data-type="number" data-name="spbu" data-pk="{{$temp->id}}">{{ number_format($temp->spbu) }}</a></td>
                                                  <td class="text-center"><a href="" class="perkantoran_sewa" data-type="number" data-name="perkantoran_sewa" data-pk="{{$temp->id}}">{{ number_format($temp->perkantoran_sewa) }}</a></td>
                                                  <td class="text-center"><a href="" class="klinik" data-type="number" data-name="klinik" data-pk="{{$temp->id}}">{{ number_format($temp->klinik) }}</a></td>
                                                  <td class="text-center"><a href="" class="peternakan" data-type="number" data-name="peternakan" data-pk="{{$temp->id}}">{{ number_format($temp->peternakan) }}</a></td>
                                                  <td class="text-center"><a href="" class="lainnya" data-type="number" data-name="lainnya" data-pk="{{$temp->id}}">{{ number_format($temp->lainnya) }}</a></td>
                                                  
                                                                      
                                              </tr>
                                          @endforeach 
                                          </tbody>
                                          </table>
                                      </div>                            
                                  </div>                                                                
                              </div>
                      </div>    
                  </div>       
                            
               



                            <!-- --- ./div tab content --   -->
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
        
        // ------------------------------ Tabel Status Wakaf   

            $("#tabel-statuswakaf").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Status Wakaf---------------------------------- 

       
            $('.jml_serti').editable({
                url:"update_wakaf/jml_serti",
                type:'number',
                pk:1,
                name:'jml_serti',
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

            $('.luas_serti').editable({
                url:"update_wakaf/luas_serti",
                type:'number',
                pk:1,
                name:'luas_serti',
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

            $('.jml_belum').editable({
                url:"update_wakaf/jml_belum",
                type:'number',
                pk:1,
                name:'jml_belum',
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

            $('.luas_belum').editable({
                url:"update_wakaf/luas_belum",
                type:'number',
                pk:1,
                name:'luas_belum',
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

        // ------------------------------ Tabel Data Wakaf Manfaat ----------------------------  

        $("#tabel-wakafmanfaat").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Wakaf Manfaat---------------------------------- 

       
            $('.masjid').editable({
                url:"update_wakaf/masjid",
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

            $('.mushalla').editable({
                url:"update_wakaf/mushalla",
                type:'number',
                pk:1,
                name:'mushalla',
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

            $('.sekolah').editable({
                url:"update_wakaf/sekolah",
                type:'number',
                pk:1,
                name:'baik',
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

            $('.pesantren').editable({
                url:"update_wakaf/pesantren",
                type:'number',
                pk:1,
                name:'pesantren',
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

            $('.makam').editable({
                url:"update_wakaf/makam",
                type:'number',
                pk:1,
                name:'makam',
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


            
            $('.sosial_lain').editable({
                url:"update_wakaf/sosial_lain",
                type:'number',
                pk:1,
                name:'sosial_lain',
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


            // ------------------------------ Tabel Wakaf Produktif 

        $("#tabel-wakafproduktif").dataTable({
                    "columnDefs": [
                       { "sortable": false }
                    ],
                    
                     ordering: false,
                    pagingType: 'first_last_numbers',
                    responsive: true,
                    });  



           // ---------------------- untuk menghendle Edit Data Wakaf Produktif--------------------------------- 

       
            $('.perkebunan').editable({
                url:"update_wakaf/perkebunan",
                type:'number',
                pk:1,
                name:'perkebunan',
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

            $('.koperasi').editable({
                url:"update_wakaf/koperasi",
                type:'number',
                pk:1,
                name:'koperasi',
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

            $('.rumah_sakit').editable({
                url:"update_wakaf/rumah_sakit",
                type:'number',
                pk:1,
                name:'rumah_sakit',
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
       
            $('.rumah_sewa').editable({
                url:"update_wakaf/rumah_sewa",
                type:'number',
                pk:1,
                name:'rumah_sewa',
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

            
            $('.perikanan').editable({
                url:"update_wakaf/perikanan",
                type:'number',
                pk:1,
                name:'perikanan',
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

            
            $('.toko_sewa').editable({
                url:"update_wakaf/toko_sewa",
                type:'number',
                pk:1,
                name:'toko_sewa',
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

            
            $('.pertanian').editable({
                url:"update_wakaf/pertanian",
                type:'number',
                pk:1,
                name:'pertanian',
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

            $('.spbu').editable({
                url:"update_wakaf/spbu",
                type:'number',
                pk:1,
                name:'spbu',
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

            $('.perkantoran_sewa').editable({
                url:"update_wakaf/perkantoran_sewa",
                type:'number',
                pk:1,
                name:'perkantoran_sewa',
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

            $('.klinik').editable({
                url:"update_wakaf/klinik",
                type:'number',
                pk:1,
                name:'klinik',
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

            $('.peternakan').editable({
                url:"update_wakaf/peternakan",
                type:'number',
                pk:1,
                name:'peternakan',
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
                url:"update_wakaf/lainnya",
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