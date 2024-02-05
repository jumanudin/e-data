@extends('layouts.app', ['title' => __('Tambah Nama Arsip')])

@section('content')
@include('layouts.headers.cards') 

<!-- Header -->
<div class="header bg-primary pb-3">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Inbox Arsip</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('doc_arsip') }}">Dokumen Arsip</a></li>
              <li class="breadcrumb-item active" aria-current="page">Arsip Baru</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--3">
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Tambah Data Arsip</h3>
                        </div>
                    </div>
            </div>
            <div class="card-body">
            {{ Form::open(['url'=>'doc_arsip/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
            @csrf

                <div class="form-group{{ $errors->has('group_id') ? ' has-danger' : '' }} row mb-2">
                    <div class="col-md-12">
                        <select class="select2 form-control" data-placeholder="--Pilih Kode Arsip --" data-live-search="true" id="group_id" name="group_id" >
                            <option value=""></option>
                                @foreach ($data as $key=> $value)
                            <option value="{{ $key }}" >{{ $key . ' - ' .$value }}</option>
                                @endforeach
                        </select>                        
                        <span class="invalid-feedback"><strong>{{ $errors->first('group_id') }}</strong></span>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }} row mb-2">
                    <div class="col-md-12">
                        <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Arsip') }}" type="text" name="nama" autofocus>
                        <span class="invalid-feedback"><strong>{{ $errors->first('nama') }}</strong></span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }} row mb-2">
                    <div class="col-md-12">
                        <input class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" placeholder="{{ __('Keterangan') }}" type="text" name="keterangan" autofocus>
                        <span class="invalid-feedback"><strong>{{ $errors->first('keterangan')}}</strong></span>
                    </div>
                </div>
             
                <div class="text-left">
                    <a href="{{url('doc_arsip')}}" class="btn btn-med btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

