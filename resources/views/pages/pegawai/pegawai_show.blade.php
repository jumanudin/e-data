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
                            <h3 class="mb-0">Daftar Detail Pegawai</h3>
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
                                <li class="nav-item"><a href="{{url('pegawai/view', Crypt::encryptString($peg->id)) }}" id="profile" class="click_menu nav-link active">Profile</a></li>
                                <li class="nav-item"><a href="{{url('pegawai/panggol', Crypt::encryptString($peg->id)) }}" id="panggol" class="click_menu nav-link" >Pangkat/Golongan</a></li>
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
        <h4>Profile Pegawai</h4><br>
        
    </div>

    <div class="card-body col-md-8 center">
        <div class="author-box-left form-group">
            <img alt="image" src="/image/{{ $peg->image }}" id="upfile1" style="cursor:pointer" class="rounded-circle author-box-picture " >
            <input type="file" id="imagex" name="imagex" accept="image/*" class="image" style="display:none">
            <div class="clearfix"></div>
        </div>
        
        <div class="author-box-details">
                <div class="form-group mb-1">
                    <label >Satker</label>
                    <select id="kode_satker" name="kode_satker" class="form-control shadow-none mt-1 block w-full" disabled>
                        @foreach($kua as $key=>$value)
                            <option value="{{ $key }}" {{ ($key == $peg->kode_satker) ? 'selected' : '' }}>{{ '('.$key.') '.$value }}</option>
                        @endforeach                            
                    </select>                            
                        
                </div>
                <div class="form-group mb-1">
                    <label>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ $peg->nip}}" readonly>
                </div>    
                <div class="form-group mb-1">
                <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $peg->nama}}" readonly>
                </div> 
                <div class="form-group mb-1">
                <label>Kualifikasi Pendidikan Terakhir</label>
                        <input type="text" name="kualifikasi" class="form-control" value="{{ $peg->kualifikasi}}" >
                </div> 
                <div class="form-group mb-1">
                <label>Gelar Depan</label>
                        <input type="text" name="gelar_depan" class="form-control" value="{{ $peg->gelar_depan}}" >
                </div> 
                <div class="form-group mb-1">
                <label>Gelar Belakang</label>
                        <input type="text" name="gelar_belakang" class="form-control" value="{{ $peg->gelar_belakang}}" >
                </div> 

                <div class="form-group mb-1">
                    <label>Agama</label>
                    @php
                            $is="";$krt="";$kath="";$hin="";$bud="";$kong="";
                            if($peg->agama=="Islam"){ $is='selected="selected"';$krt="";$kath="";$hin="";$bud="";$kong=""; }
                            else if($peg->agama=="Kristen"){ $is="";$krt='selected="selected"';$kath="";$hin="";$bud="";$kong=""; } 
                            else if($peg->agama=="Katolik") { $is="";$krt="";$kath='selected="selected"';$hin="";$bud="";$kong="";}    
                            else if($peg->agama=="Hindu") { $is="";$krt="";$kath="";$hin='selected="selected"';$bud="";$kong="";}
                            else if($peg->agama=="Buddha") { $is="";$krt="";$kath="";$hin='';$bud='selected="selected"';$kong="";}
                            else { $is="";$krt="";$kath="";$hin="";$bud='';$kong='selected="selected"';}
                        @endphp                           
                        <select id          = "agama" name="agama" class="form-control shadow-none mt-1 block w-full">
                        <option value="" disabled>Pilih Agama..!</option>   
                                <option value="Islam" {{ $is }}>Islam</option>
                                <option value="Kristen" {{ $krt }}>Kristen</option>
                                <option value="Katolik" {{ $kath }}>Katolik</option>
                                <option value="Hindu" {{ $hin }}>Hindu</option>
                                <option value="Buddha" {{ $bud }}>Buddha</option>
                                <option value="Konghucu" {{ $kong }}>Konghucu</option>
                        </select> 
                        <span class         = "help-block">{{ $errors->has('agama') ? $errors->first('agama') : '' }}</span>
                </div>    
                <div class="form-group mb-1">
                <label>Jenis Kelamain</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control is-valid shadow-none mt-1 block w-full" >
                                @php
                                $laki="";$perempuan="";
                                if($peg->jenis_kelamin=="L"){ $laki='selected="selected"';$perempuan=""; }
                                else if($peg->jenis_kelamin=="P"){ $laki='';$perempuan='selected="selected"'; }
                                else { $laki='';$perempuan='';}
                                @endphp
                                    <option value   = "" >Pilih Jenis Kelamin ..!</option>
                                    <option value   = "L" {{ $laki }}>Laki-laki</option>
                                    <option value   = "P" {{ $perempuan }}>Perempuan</option>
                    </select>  
                    <span class="help-block">{{ $errors->has('jenis_kelamin') ? $errors->first('jenis_kelamin') : '' }}</span>
                </div>    
                <div class="form-group mb-1">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control is-valid" value="{{ $peg->tempat_lahir}}" >
                    <span class="help-block">{{ $errors->has('tempat_lahir') ? $errors->first('tempat_lahir') : '' }}</span>
                </div> 
                <div class="form-group mb-1">
                <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control is-valid" value="{{ $peg->tgl_lahir}}" >
                        <span class="help-block">{{ $errors->has('tgl_lahir') ? $errors->first('tgl_lahir') : '' }}</span>
                </div> 
                <div class="form-group mb-1">
                    <label >Status</label>
                    @php
                            $nikah="";$bm="";$duja="";
                            if($peg->status=="Sudah Menikah"){$nikah='selected="selected"';$bm="";$duja="";}
                            else if($peg->status=="Belum Menikah") { $nikah="";$bm='selected="selected"';$duja="";}
                            else { $nikah="";$bm="";$duja='selected="selected"';}
                        @endphp                   
                    <select id          = "status" name="status" class="form-control is-valid shadow-none mt-1 block w-full">
                        <option value="" disabled>Pilih Status Hidup..!</option>
                        <option value="Sudah Menikah" {{ $nikah }}>Sudah Menikah</option>
                        <option value="Belum Menikah" {{ $bm }}>Belum Menikah</option>
                        <option value="Duda/Janda" {{ $duja }}>Duda/Janda</option>
                    </select> 
                    <span class="help-block">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
                </div>                
                <div class="form-group mb-1">
                    <label>Alamat</label>
                    <textarea type="text" name="alamat" class="form-control is-valid" >{{ $peg->alamat }}</textarea>
                    <span class="help-block">{{ $errors->has('alamat') ? $errors->first('alamat') : '' }}</span>
                </div>
                <div class="form-group mb-1">
                    <label>No. Hp</label>
                    <input type="text" name="no_hp" class="form-control is-valid" value="{{ $peg->no_hp}}" >
                    <span class="help-block">{{ $errors->has('no_hp') ? $errors->first('no_hp') : '' }}</span>
                </div> 
                <div class="form-group mb-1">
                <label>Email</label>
                    <input type="text" name="email" class="form-control is-valid" value="{{ $peg->email}}" >
                    <span class="help-block">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                </div> 
                <div class="form-group mb-1">
                <label >Latitude Tempat Tinggal</label>
                    <input type="text" name="lat" class="form-control is-valid" value="{{$peg->lat}}">
                    <span class="help-block">{{ $errors->has('lat') ? $errors->first('lat') : '' }}</span>
                </div>   
                <div class="form-group mb-1 {{ $errors->has('long') ? 'has-error' : '' }}">
                    <label>Longitude Tempat Tinggal</label>
                    <input type="text" name="long" class="form-control is-valid" value="{{$peg->long}}" >
                    <span class="help-block">{{ $errors->has('long') ? $errors->first('long') : '' }}</span>
                </div>                 
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button type="create" class="btn btn-primary" id="save-btn">Simpan Perubahan</button>
            
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
        function open_modal(id) {
          $('.modal-message').modal();
          $('#submit_hapus').attr("href","{{url('pegawai')}}/hapus/"+id);
        }
        $("#table").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [0,7] }
          ]
        });          
      </script>
    @stop       

