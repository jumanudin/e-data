@extends('layouts.app')
@section('main')
<div class="main-content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border">
                    <h2 class="mb-0">{{ __('Tambah Modul') }}</h2>
                </div>    
                {{ Form::open(['url'=>'city/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
                @csrf
                <div class="card-body">
                    <div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }} row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="kode" class="form-control">
                            <span class="help-block">{{ $errors->has('kode') ? $errors->first('kode') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }} row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kab/Kota</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="nama" class="form-control">
                            <span class="help-block">{{ $errors->has('nama') ? $errors->first('nama') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('ibukota') ? 'has-error' : '' }} row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ibu Kota</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="ibukota" class="form-control">
                            <span class="help-block">{{ $errors->has('ibukota') ? $errors->first('ibukota') : '' }}</span>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="text-right">
                            <a href="{{url('city')}}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-sm btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>    
                {{ Form::close() }}                    
            </div>    
        </div>
    </div>
</div>
@endsection