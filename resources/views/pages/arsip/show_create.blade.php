@extends('layouts.app', ['title' => __('Tambah Dokumen Arsip')])

@section('content')
@include('layouts.headers.cards') 

<!-- Header -->
<div class="header bg-primary pb-3">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Inbox Dokumen Detail</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('arsip_trc') }}">Arsip Detail ASN</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dokumen Baru</li>
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
                            <h3 class="mb-0">Tambah Data Dokumen Arsip</h3>
                        </div>
                    </div>
            </div>
            <div class="card-body">
            {{ Form::open(['url'=>'arsip_trc/submit/'.$id, 'class' => 'form-horizontal', 'method'=>'post','enctype'=>'multipart/form-data']) }}
            @csrf
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->username }}">
                <div class="form-group{{ $errors->has('arsip_id') ? ' has-danger' : '' }} row mb-2">
                    <div class="col-md-12">
                        <select class="select2 form-control" data-placeholder="--Pilih Kode Arsip --" data-live-search="true" id="arsip_id" name="arsip_id" >
                            <option value=""></option>
                                @foreach ($arsip as $value)
                            <option value="{{ $value->id }}" >{{ $value->nama . ' - ' .$value->keterangan }}</option>
                                @endforeach
                        </select>                        
                        <span class="invalid-feedback"><strong>{{ $errors->first('arsip_di') }}</strong></span>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group {{ $errors->has('file') ? 'has-danger':''}} row mb-2">
                <div class="col-md-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input {{ $errors->has('file') ? ' is-invalid' : '' }}" id="file" name="file" aria-describedby="file">
                        <label class="custom-file-label" for="customFileLang">Upload Dokumen Max 500 KB</label>
                    </div>
                    @if ($errors->has('file'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                    @endif
                </div>  
                </div>  
                <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }} row mb-2">
                    <div class="col-md-12">
                        <input class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('URL Cloude') }}" type="text" name="url" autofocus>
                        <span class="invalid-feedback"><strong>{{ $errors->first('url')}}</strong></span>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }} row mb-2">
                    <div class="col-md-12">
                        <input class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" placeholder="{{ __('Keterangan') }}" type="text" name="keterangan" autofocus>
                        <span class="invalid-feedback"><strong>{{ $errors->first('keterangan')}}</strong></span>
                    </div>
                </div>
             
                <div class="text-left mt-3">
                    <a href="{{url('arsip_trc')}}" class="btn btn-med btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
@section('js')
<script>
  document.querySelector('.custom-file-input').addEventListener('change', function (e) {
    var name = document.getElementById("file").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = name
  })
</script>
@stop
