@extends('layouts.app', ['title' => __('Pegawai Edit')])
<style type   = "text/css">
  .responsive {
     width: 100%;
     max-width: 150px;
     height: auto;
  }
    img {
display       : block;
max-width     : 100%;
}
.preview {
overflow      : hidden;
width         : 160px;
height        : 160px;
margin        : 10px;
border        : 1px solid red;
}
.modal-lg{
max-width     : 580px !important;
}    
</style>
@section('content')
@include('layouts.headers.cards') 
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
    <div class="header-body">
        <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Data Pegawai</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Data Pegawai</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Pegawai</li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="container-fluid mt--6">
<div class="row">
    <div class="col">
            <div class="card">
            <!-- Card header -->
            <div class="section-body">
                <h2 class="card-header">Edit Data Pegawai</h2>
                <p class="card-header">Tekan tombol update untuk menyimpan data Modul dan tombol back untuk kembali</p>
                {{ Form::open(['url'=>'pegawai/edit/'.$peg->id, 'class' => 'form-horizontal', 'method'=>'post','enctype="multipart/form-data"']) }}
                @csrf
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-right col-md-2">Photo</label>
                            <div class="col-sm-12 col-md-8">
                            <img alt="image" data-toggle="tooltip" title="click untuk ubah photo" src="{{ asset('storage/'.$peg->image) }}" id="upfile1" style="cursor:pointer;" class="responsive" >
                            <input type="file" id="imagex" name="imagex" accept="image/*" class="image" style="display:none">
                            </div>
                        </div>                        
                        <div class="form-group {{ $errors->has('nip') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2">NIP</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" name="nip" class="form-control" value="{{ $peg->nip}}" readonly>
                            <span class="help-block">{{ $errors->has('nip') ? $errors->first('nip') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nip') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2">Nama Pegawai</label>
                            <div class="col-sm-12 col-md-8">
                            <input type="text" name="nama" class="form-control" value="{{ $peg->nama}}">
                            <span class="help-block">{{ $errors->has('nama') ? $errors->first('nama') : '' }}</span>
                            </div>
                        </div>
                
                
                
                        <div class="form-group {{ $errors->has('kode_golongan') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-md-2 ">Pangkat/Golongan</label>
                                <div class="col-sm-12 col-md-8">
                                    <select id="kode_golongan" name="kode_golongan" class="form-control shadow-none mt-1 block w-full">
                                        <option value="">Pilih Pangkat / Golongan Pegawai..!</option>
                                        @foreach($panggol as $key)
                                        <option value="{{ $key->gol }}" {{ ($key->gol == $peg->kode_golongan) ? 'selected' : '' }}>{{ $key->pangkat}} - {{$key->gol}}</option>
                                        @endforeach
                                    </select> 
                                    <span class="help-block">{{ $errors->has('kode_golongan') ? $errors->first('kode_golongan') : '' }}</span>
                                </div>
                        </div>
                      

                        <div class="form-group {{ $errors->has('kode_jabatan') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Jabatan</label>
                            <div class="col-sm-12 col-md-8">
                            <select id="kode_jabatan" name="kode_jabatan" class="form-control shadow-none mt-1 block w-full">
                            @foreach($jab as $key=>$value)
                                <option value="{{ $key }}" {{ ($key ==$peg->kode_jabatan) ? 'selected' : '' }}>{{ $key.' - '.$value }}</option>
                            @endforeach
                            </select> 
                                <span class="help-block">{{ $errors->has('kode_jabatan') ? $errors->first('kode_jabatan') : '' }}</span>
                            </div>
                            
                        </div>
                        <div class="form-group {{ $errors->has('jabatan_tambahan') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2">Jabatan Tambahan</label>
                            <div class="col-sm-12 col-md-8">
                                <select id="jabatan_tambahan" name="jabatan_tambahan" class="form-control shadow-none mt-1 block w-full">
                                        <option value="">Pilih Jabatan Tambahan ..!</option>
                                        <option value="ppk" {{ $peg->jabatan_tambahan == 'ppk' ? 'selected' :''}}>PPK</option>
                                        <option value="bp" {{ $peg->jabatan_tambahan =='bp' ? 'selected' :''}}>Bendahara Pengeluaran</option>
                                </select>                            
                            <span class="help-block">{{ $errors->has('jabatan_tambahan') ? $errors->first('jabatan_tambahan') : '' }}</span>
                            </div>  
                        </div>
                        <div class="form-group {{ $errors->has('status_kepeg') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Status Kepegawaian</label>
                            <div class="col-sm-12 col-md-8">
                            @php 
                            $cpns="";$pns="";$pppk="";$nonasn="";
                            if($peg->status_kepeg=="CPNS") {$cpns='selected="selected"';$pns="";$pppk="";$nonasn="";}
                            else 
                            if($peg->status_kepeg=="PNS") {$cpns="";$pns='selected="selected"';$pppk="";$nonasn="";} 
                            else
                            if($peg->status_kepeg=="PPPK") {$cpns="";$pns="";$pppk='selected="selected"';$nonasn="";}  
                            else
                            if($peg->status_kepeg=="NON ASN") {$cpns="";$nonpns='selected="selected"';$pns="";$pppk="";} else
                            {$cpns="";$pns="";$pppk="";$nonasn='selected="selected"';}
                        @endphp          
                            <select id="status_kepeg" name="status_kepeg" class="form-control shadow-none mt-1 block w-full">
                            <option value="">Pilih Status Kepegawaian!</option>
                            <option value="CPNS" {{$cpns}}>CPNS</option>
                            <option value="PNS" {{$pns}}>PNS</option>
                            <option value="PPPK" {{$pppk}}>PPPK</option>
                            <option value="NON ANS" {{$nonasn}}>NON ASN</option>                           
                            </select> 
                                <span class="help-block">{{ $errors->has('status_kepeg') ? $errors->first('status_kepeg') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Unit Kerja</label>
                            <div class="col-sm-12 col-md-8">
                            <select id="unit_id" name="unit_id" class="form-control shadow-none mt-1 block w-full">                            
                           @foreach($unit as $key=>$value)
                                <option value="{{$key }}" {{($key==$peg->unit_id)? 'selected' :'' }}>{{ $key.' - '.$value}}</option>
                            @endforeach
                            </select> 
                            <span class="help-block">{{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-2">No.Hp</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" name="no_hp" class="form-control" value="{{ $peg->no_hp }}">
                                <span class="help-block">{{ $errors->has('no_hp') ? $errors->first('no_hp') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2">Jenis Kelamin</label>
                            <div class="col-sm-12 col-md-8">
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control shadow-none mt-1 block w-full">
                                @php
                                $laki="";$perempuan="";
                                if($peg->jenis_kelamin=="L"){ $laki='selected="selected"';$perempuan=""; }
                                else if($peg->jenis_kelamin=="P"){ $laki='';$perempuan='selected="selected"'; }
                                else { $laki='';$perempuan='';}
                                @endphp                                  
                                    <option value="" disabled>Pilih Jenis Kelamin ..!</option>
                                    <option value="L" {{ $laki }}>Laki-laki</option>
                                    <option value="P" {{ $perempuan }}>Perempuan</option>
                                </select>                            
                            <span class="help-block">{{ $errors->has('jenis_kelamin') ? $errors->first('jenis_kelamin') : '' }}</span>
                            </div>  
                            
                        </div>
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-md-2 ">Alamat</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" name="alamat" class="form-control" value="{{ $peg->alamat }}">
                                <span class="help-block">{{ $errors->has('alamat') ? $errors->first('alamat') : '' }}</span>
                            </div>
                        </div>          
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} row mb-2">
                            <label class="col-form-label text-md-right col-12 col-md-2">e-Mail</label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" name="email" class="form-control" value="{{ $peg->email }}">
                                <span class="help-block">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>  
                        </div>                                    
                    </div>                     
 
                    <div class="card-footer">
                        <div class="text-left">
                            <a href="{{url('pegawai')}}" class="btn btn-med btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-med btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Update Data Pegawai</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    </div>    
                </div>    
            </div>
            @include('layouts.footers.auth')
            </div>
    </div>
</div>
</div>
@endsection
@section('modal')
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Sesuaikan Gambar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="img-container">
                      <div class="row">
                          <div class="col-md-8">
                              <img id="image" >
                          </div>
                          <div class="col-md-4">
                              <div class="preview"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Batalkan</button>
                  <button type="button" class="btn btn-success" id="crop">Sesuaikan</button>
              </div>  
          </div>    
      </div>
  </div>
@endsection
@section('js')
<script type="text/javascript">
var $modal = $('#modal');
  var image = document.getElementById('image');
  var cropper;
  $("body").on("change", ".image", function(e){
  var files = e.target.files;
  var done = function (url) {
      image.src = url;
      $modal.modal('show');
  };
  var reader;
  var file;
  var url;
  if (files && files.length > 0) {
      file = files[0];
      if (URL) {
          done(URL.createObjectURL(file));
      } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
          done(reader.result);
      };
      reader.readAsDataURL(file);
      }
  }
  });
  $modal.on('shown.bs.modal', function () {
      cropper = new Cropper(image, {
      aspectRatio: 1,
      viewMode: 3,
      preview: '.preview'
      });
  }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
  });
  $("#crop").click(function(){
      canvas = cropper.getCroppedCanvas({
          width: 160,
          height: 160,
      });
      canvas.toBlob(function(blob) {
          $("#upfile1").attr('src',''+URL.createObjectURL(blob));
          url = URL.createObjectURL(blob);
          var reader = new FileReader();
          reader.readAsDataURL(blob); 
          reader.onloadend = function() {
          var base64data = reader.result; 
          $.ajax({
          type: "POST",
          dataType: "json",
          url: '{{ route("profile_upload") }}',
          data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
          success: function(data){
          console.log(data);
          $modal.modal('hide');
          //alert("Crop image successfully uploaded");
          }
          });
          }
      });
  })  
  $("#upfile1").click(function () {
      $("#imagex").trigger('click');
  });
</script>
@stop