@extends('layouts.app', ['title' => __('Tambah Nama Jabatan')])

@section('content')
@include('layouts.headers.cards') 

<div class="container-fluid mt--6">
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">{{ __('Tambah Nama Jabatan') }}</h3>
            </div>
            <div class="card-body">
            {{ Form::open(['url'=>'jabatan/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
            @csrf
                
                

                <div class="form-group{{ $errors->has('nama_jabatan') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('nama_jabatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Jabatan') }}" type="text" name="nama_jabatan" autofocus>
                    </div>
                    @if ($errors->has('nama_jabatan'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('nama_jabatan') }}</strong>
                        </span>
                    @endif
                </div>
             
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">{{ __('Create Data') }}</button>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

