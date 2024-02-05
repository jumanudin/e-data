@extends('layouts.app', ['title' => __('Add New')])

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
                <li class="breadcrumb-item active" aria-current="page">Setup Pegawai</li>
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
            <div class="card shadow">
                <!-- Card header -->
                <div class="section-body">
                    <h2 class="card-header">Tambah Data Pegawai</h2>
                    {{ Form::open(['url'=>'pegawai/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
                    @csrf 
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-md-2 ">NIP</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="nip" class="form-control" value="{{ old('nip') }}">
                                    <span class="help-block">{{ $errors->has('nip') ? $errors->first('nip') : '' }}</span>
                                </div>
                            </div>          
                            <div class="form-group {{ $errors->has('nip') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-md-2">Nama Pegawai</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama')}}">
                                    <span class="help-block">{{ $errors->has('nama') ? $errors->first('nama') : '' }}</span>
                                </div>                        
                            </div>
                            <div class="form-group {{ $errors->has('kode_golongan') ? 'has-error' : '' }} row mb-2">
                                    <label class="col-form-label text-md-right col-md-2 ">Pangkat/Golongan</label>
                                    <div class="col-sm-12 col-md-8">
                                        <select id="kode_golongan" name="kode_golongan" class="form-control shadow-none mt-1 block w-full">
                                            <option value="">Pilih Pangkat / Golongan Pegawai..!</option>
                                        @foreach($panggol as $row)
                                            <option value="{{ $row->gol}}" {{ old('kode_golongan')==$row->gol ? 'selected' :''}}>{{ $row->gol.' - '.$row->pangkat }}</option>
                                        @endforeach
                                        </select> 
                                            <span class="help-block">{{ $errors->has('kode_golongan') ? $errors->first('kode_golongan') : '' }}</span>
                                    </div>
                            </div>                      

                            <div class="form-group {{ $errors->has('kode_jabatan') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-md-2 ">Jabatan</label>
                                <div class="col-sm-12 col-md-8">
                                <select id="kode_jabatan" name="kode_jabatan" class="form-control shadow-none mt-1 block w-full">
                                <option value="">Pilih Jabatan..!</option>
                                    @foreach($jab as $row)
                                        <option value="{{ $row->id }}">{{$row->nama_jabatan }}</option>
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
                                            <option value="ppk" {{ old('jabatan_tambahan')=='ppk' ? 'selected' :''}}>PPK</option>
                                            <option value="bp" {{ old('jabatan_tambahan')=='BP' ? 'selected' :''}}>Bendahara Pengeluaran</option>
                                    </select>                            
                                <span class="help-block">{{ $errors->has('jabatan_tambahan') ? $errors->first('jabatan_tambahan') : '' }}</span>
                                </div>  
                            </div>
                            <div class="form-group {{ $errors->has('status_kepeg') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-md-2 ">Status Kepegawaian</label>
                                <div class="col-sm-12 col-md-8">
                                <select id="status_kepeg" name="status_kepeg" class="form-control shadow-none mt-1 block w-full">
                                <option value="">Pilih Status Kepegawaian.1122.!</option>
                                <option value="CPNS" {{ old('status_kepeg')=='CPNS' ? 'selected' :''}}>CPNS</option>
                                <option value="PNS" {{ old('status_kepeg')=='PNS' ? 'selected' :''}}>PNS</option>
                                <option value="PPPK" {{ old('status_kepeg')=='PNS/DPK' ? 'selected' :''}}>PPPK</option>
                                <option value="NON PNS" {{ old('status_kepeg')=='NON PNS' ? 'selected' :''}}>NON PNS</option>                           
                                </select> 
                                    <span class="help-block">{{ $errors->has('status_kepeg') ? $errors->first('status_kepeg') : '' }}</span>
                                </div>
                            </div>
                        
                            <div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-md-2 ">Unit Kerja</label>
                                <div class="col-sm-12 col-md-8">
                                <select id="unit_id" name="unit_id" class="form-control shadow-none mt-1 block w-full">
                                <option value="">Pilih Unit Kerja..!</option>
                            @foreach($unit as $row)
                                    <option value="{{ $row->id }}" >{{$row->id .'-'.$row->nama_unit }}</option>
                                @endforeach
                                </select> 
                                <span class="help-block">{{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-2">No.Hp</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                                    <span class="help-block">{{ $errors->has('no_hp') ? $errors->first('no_hp') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-md-2">Jenis Kelamin</label>
                                <div class="col-sm-12 col-md-8">
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control shadow-none mt-1 block w-full">
                                            <option value="">Pilih Jenis Kelamin ..!</option>
                                            <option value="L" {{ old('jenis_kelamin')=='L' ? 'selected' :''}}>Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin')=='P' ? 'selected' :''}}>Perempuan</option>
                                    </select>                            
                                <span class="help-block">{{ $errors->has('jenis_kelamin') ? $errors->first('jenis_kelamin') : '' }}</span>
                                </div>  
                                
                            </div>
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-md-2 ">Alamat</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
                                    <span class="help-block">{{ $errors->has('alamat') ? $errors->first('alamat') : '' }}</span>
                                </div>
                            </div>          
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-2">e-Mail</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                    <span class="help-block">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                </div>  
                            </div>                                    
                        </div>  
                        <div class="card-footer">
                            <div class="text-left">
                                <a href="{{url('pegawai')}}" class="btn btn-med btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-med btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>

                    </div>        
                    {{ Form::close() }}
                </div>    
            </div> 
            @include('layouts.footers.auth')
        </div>   
    </div>
</div>
@endsection


