@extends('layouts.app')
@section('main')
<!-- Header -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item"><a href="{{ route('utility') }}">Setting System</a></div>
            <div class="breadcrumb-item">Setting Item</div>
        </div>
    </section>
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border">
                <h2 class="mb-0">{{ __('Setting Kebutuhan Aplikasi') }}</h2>
            </div>
            <!-- Card header -->
            <div class="card-body">
            <p >Tekan tombol simpan untuk menyimpan data dan tombol back untuk kembali</p>
            {{ Form::open(['url'=>'utility/update/'.$data->id, 'class' => 'form-horizontal','id'=>'fileUploadForm','enctype'=>'multipart/form-data', 'method'=>'post']) }}
            @csrf
                <div class="form-group {{ $errors->has('t_1') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Header KOP 1</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea rows="3" id="t_1" name="t_1" class="form-control">{{ $data->t_1 }}</textarea>
                        <span class="help-block">{{ $errors->has('t_1') ? $errors->first('t_1') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('t_2') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Header KOP 2</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea rows="3" id="t_2" name="t_2" class="form-control">{{ $data->t_2 }}</textarea>
                        <span class="help-block">{{ $errors->has('t_2') ? $errors->first('t_2') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('t_3') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Header KOP 3</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea rows="3" id="t_3" name="t_3" class="form-control">{{ $data->t_3 }}</textarea>
                        <span class="help-block">{{ $errors->has('t_3') ? $errors->first('t_3') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('t_4') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Header KOP 4</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea rows="3" id="t_4" name="t_4" class="form-control">{{ $data->t_4 }}</textarea>
                        <span class="help-block">{{ $errors->has('t_4') ? $errors->first('t_4') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('t_5') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Header KOP 5</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea rows="3" id="t_5" name="t_5" class="form-control">{{ $data->t_5 }}</textarea>
                        <span class="help-block">{{ $errors->has('t_5') ? $errors->first('t_5') : '' }}</span>
                    </div>
                </div>                
                <div class="form-group {{ $errors->has('nama_pimpinan') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pimpinan</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="form-control" value="{{ $data->nama_pimpinan }}" >
                        <span class="help-block">{{ $errors->has('nama_pimpinan') ? $errors->first('nama_pimpinan') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('lokasi_kantor') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kota Lokasi Kantor</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" id="lokasi_kantor" name="lokasi_kantor" class="form-control" value="{{ $data->lokasi_kantor }}">
                        <span class="help-block">{{ $errors->has('lokasi_kantor') ? $errors->first('lokasi_kantor') : '' }}</span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('verifikator') ? 'has-error' : '' }} row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIP Pejabat Verifikator</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" id="verifikator" name="verifikator" class="form-control" value="{{ $data->verifikator }}" placeholder="NIP Pejabat Verifikator">
                        <span class="help-block">{{ $errors->has('verifikator') ? $errors->first('verifikator') : '' }}</span>
                    </div>
                </div>
                <div class="form-group row bm-2">    
                    <label class="col-form-label text-md-right col-md-3 ">{{ __('Upload Tanda Tangan') }}</label>
                    <div class="col-md-4">
                        <input type="file" class="form-control {{ $errors->has('ttd') ? ' is-invalid' : '' }}" id="ttd" name="ttd" aria-describedby="ttd">

                        <span class="help-block">{{ $errors->has('ttd') ? $errors->first('ttd') : '' }}</span>     
                    </div> 
                    <div class="col-md-1">
                        @if(!empty($data->ttd))
                        <img src="{{ asset('storage/'.$data->ttd) }}" alt="Image TTD" class="img-fluid">
                        @endif                        
                    </div>
                </div>    
                <div class="card-footer">
                    <div class="text-left">
                        <a href="{{url('home')}}" class="btn btn-med btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-med btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            {{ Form::close() }}
            </div>    
        </div>    
    </div>
</div>
</div>
@endsection

