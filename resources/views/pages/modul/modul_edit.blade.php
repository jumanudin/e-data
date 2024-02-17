@extends('layouts.app')
@section('main')
<div class="main-content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border">
                    <h2 class="mb-0">{{ __('Edit Modul') }}</h2>
                </div>
                <!-- Card header -->
                {{ Form::open(['url'=>'modul_name/edit/'.$data->id, 'class' => 'form-horizontal', 'method'=>'post']) }}
                @csrf
                <div class="card-body">
                <p >Tekan tombol simpan untuk menyimpan data Modul dan tombol back untuk kembali</p>
                    <div class="form-group {{ $errors->has('nama_modul') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Modul</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="nama_modul" class="form-control" value="{{ $data->nama_modul }}" disabled>
                            <span class="help-block">{{ $errors->has('nama_modul') ? $errors->first('nama_modul') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('nama_menu') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan Modul</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="nama_menu" class="form-control" value="{{ $data->nama_menu }}">
                            <span class="help-block">{{ $errors->has('nama_menu') ? $errors->first('nama_menu') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('modul_type_id') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Modul</label>
                        <div class="col-sm-12 col-md-7">
                        <select id="modul_type_id" name="modul_type_id" class="form-control selectric">
                            <option value=''>..Pilih Kode..</option>
                    
                            @foreach($modtype as $key=> $value)
                                <option value="{{ $key }}" {{ ($key == $data->modul_type_id) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>                             
                        <span class="help-block">{{ $errors->has('modul_type_id') ? $errors->first('modul_type_id') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('menu_id') ? 'has-error' : '' }} row mb-2">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Menu</label>
                        <div class="col-sm-12 col-md-7">
                        <select id="menu_id" name="menu_id" class="form-control selectric">
                            <option value=''>..Kode Menu..</option>
                    
                            @foreach($menutype as $key=> $value)
                                <option value="{{ $key }}" {{ ($key == $data->menu_id) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>                             
                        <span class="help-block">{{ $errors->has('menu_id') ? $errors->first('menu_id') : '' }}</span>
                        </div>
                    </div>
        
                </div>    
                <div class="card-footer border">
                    <div class="text-right">
                        <a href="{{url('modul_name')}}" class="btn btn-med btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-med btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>    
        </div>
    </div>
</div>
@endsection

