@extends('layouts.app', ['title' => __('Detail')])

@section('content')
@include('layouts.headers.cards') 
<div class="container-fluid mt--7"">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-0">
                            <h3 class="mb-0">Daftar Pangkat Golongan</h3>
                        </div>
                    </div>
                                       
                   </div> 
                       <div class="card-body p-2">
                          <h2 h2 class="section-title" style="color:red;font-type:bold;">Detail Data Pegawai </h2>
                          <h2 h2 class="section-title" style="color:red;font-type:bold;">NIP : {{$peg->nip}} | Nama : {{$peg->nama}} </h2>
                          <p class="section-lead">Silahkan pilih menu sesuai dengan kategori data yang diinginkan..!</p>
                              @if(Session::has("pesan_berhasil"))
                             <div class="alert alert-success alert-dismissable text-center icon-font">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <i class="fa fa-info-circle"></i>  {{ session('pesan_berhasil') }}
                             </div>
                             @elseif(Session::has("pesan_gagal"))
                             <div class="alert alert-danger alert-dismissable text-center icon-font">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <i class="fa fa-exclamation-triangle"></i>  {{ session('pesan_gagal') }}
                             </div>
                             @elseif(count($errors) > 0)
                             <div class="alert alert-danger alert-dismissable text-center icon-font">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <i class="fa fa-exclamation-triangle"></i>  Mohon periksa kembali inputan anda
                             </div>
                             @endif
                       </div>
                       <div class="card ">
                        <div class="card-body">
                            <ul class="nav nav-pills flex-row">
                                <li class="nav-item"><a href="{{url('pegawai/view', Crypt::encryptString($peg->id)) }}" id="profile" class="click_menu nav-link ">Profile</a></li>
                                <li class="nav-item"><a href="{{url('pegawai/panggol', Crypt::encryptString($peg->id)) }}" id="panggol" class="click_menu nav-link active" >Pangkat/Golongan</a></li>
                                <li class="nav-item"><a href="{{url('pegawai/jabatan',Crypt::encryptString($peg->id)) }}" id="jabatan" class="click_menu nav-link" >Jabatan</a></li>
                                <li class="nav-item"><a href="{{url('pegawai/tkatpend',Crypt::encryptString($peg->id)) }}" id="sekolah"class="click_menu nav-link" >Pendidikan</a></li>
                                <li class="nav-item"><a href="{{url('pegawai/prestasi',Crypt::encryptString($peg->id)) }}" id="prestasi" class="click_menu nav-link"  >Prestasi</a></li>
                                <li class="nav-item"><a href="{{url('pegawai/diklat',Crypt::encryptString($peg->id)) }}" id="diklat" class="click_menu nav-link" >Diklat</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="preloader">
                     <div class="loading">
                    <div class="spinner-grow spinner-grow-sm text-success" style="width: 5rem; height: 5rem;" role="status">
                       <span class="sr-only">Loading...</span>
                   </div>
                   </div>
               </div>

               {{ Form::open(['url'=>'pegawai/ubahprofile/'.$peg->id, 'class' => 'form-horizontal', 'method'=>'post','enctype="multipart/form-data"']) }}
    @csrf

<div class="card author-box card-warning">
            <div class="card-header">
                <h4>Riwayat Data Kepangkatan </h4>
                <div class="section-header-button">
                    <a href="/pegawai/panggol_create/{{ Crypt::encryptString($peg->id) }}" class="btn btn-icon btn-left btn-primary"><i class="fas fa-plus"></i>Add New</a>
                </div>        
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                    <thead>  
                    <tr>
                        <th data-width="40">#</th>
                        <th>Pangkat/Gol</th>
                        <th class="text-center">TMT SK</th>
                        <th class="text-center">Tanggal SK</th>
                        <th class="text-right">No. SK</th>
                        <th class="text-right">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ripang as $temp)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="text-center">{{ ++$i}}</td>
                            <td>{{ $temp->pangkat.' - '.$temp->gol }}</td>
                            <td>{{ $temp->tmt }}</td>
                            <td>{{ $temp->tgl_sk }}</td>
                            <td>{{ $temp->no_sk }}</td>
                            <td class="py-3 px-6 text-center"><div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a role="button" href="/pegawai/panggol/edit/{{ Crypt::encryptString($temp->id) }}/{{ $peg->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a></div>
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a role="button" href="javascript:;" onclick="open_modal('{{($temp->id)}}')" ><i class="fa fa-16px fa-trash text-red-500"></i></a>
                            </div></div></td>                            
                        </tr>
                        @endforeach 
                    </tbody>
                    </table>
                </div>    
            </div>    
        
</div>
{{ Form::close() }}
       





                </div> 
                
                @include('layouts.footers.auth')          
            </div> 
            @endsection
        </div>
    </div>
    @section('modal')
    <!-- Modal Hapus -->
    <div class="modal fade modal-message" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header" style="background-color: #dd4b39">
            <h4 class="modal-title" style="color: #fff">Konfirmasi Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <p>Data yang dihapus tidak dapat dikembalikan lagi. Apakah Anda yakin ingin menghapus data?</p>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <a id="submit_hapus" href="#" class="btn btn-danger">Hapus</a>
          </div>

        </div>
      </div>
      
    </div>
    @endsection
    @section('js')
    <script type="text/javascript">
      $(document).ready(function() {
        $('.click_menu').click(function(){
          var menu = $(this).attr('id');
                $('.nav-link').removeClass('active');
                $(".preloader").fadeIn("1");
          if(menu == "profile"){
                    $(".preloader").fadeOut("100");
          }else if(menu == "panggol"){
                    $(".preloader").fadeOut("slow");
          }else if(menu == "jabatan"){
                    $(".preloader").fadeOut("slow");				
          }else if(menu == "sekolah"){
                    $(".preloader").fadeOut("slow");				
          }else if(menu == "prestasi"){
                    $(".preloader").fadeOut("slow");					
          }else if(menu == "diklat"){
                    $(".preloader").fadeOut("slow");					
          }
        });
            $(".preloader").fadeOut();
      });
      function open_modal(id) {
              $('.modal-message').modal();
              $('#submit_hapus').attr("href","{{url('pegawai/panggol/hapus')}}/"+id);
            }
    </script>
      @stop   

