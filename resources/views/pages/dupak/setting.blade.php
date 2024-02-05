@extends('layouts.app', ['title' => __('Setting Dupak')])

@section('content')
@if(auth()->user()->id_role==1 || auth()->user()->id_role==3)
    @include('layouts.headers.cards')
@else
    @include('layouts.headers.guest')    
@endif  
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Setting Dupak</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('set_dupak') }}">Setting Dupak</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Set Dupak Data</li>
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
            <div class="card-header border-0">
              <h3 class="mb-0">{{ __('Setting Dupak') }}</h3>
            </div>
            <div class="card-body">
            {{ Form::open(['url'=>'set_dupak/edit/'.$dupak->id, 'class' => 'form-horizontal', 'method'=>'post']) }}
            @csrf
                
                <div class="form-group{{ $errors->has('userid') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('userid') ? ' is-invalid' : '' }}" placeholder="{{ __('Userid - NIP') }}" type="text" name="userid" value="{{ $dupak->userid }}" disabled>
                    </div>
                    @if ($errors->has('userid'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('userid') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('atasan_nama') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('atasan_nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Atasan') }}" type="text" name="atasan_nama" }}" value="{{ $dupak->atasan_nama}}" autofocus>
                    </div>
                    @if ($errors->has('atasan_nama'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('atasan_nama') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('atasan_nip') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('atasan_nip') ? ' is-invalid' : '' }}" placeholder="{{ __('NIP Atasan') }}" type="text" name="atasan_nip" value="{{ $dupak->atasan_nip }}">
                    </div>
                    @if ($errors->has('atasan_nip'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('atasan_nip') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('atasan_panggol') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                        </div>
                        <select class="form-control{{ $errors->has('atasan_panggol') ? ' is-invalid' : '' }}" placeholder="{{ __('Pangkat / Gol Atasan') }}" type="text" name="atasan_panggol"  >
                        @foreach ($panggol as $value)
                            <option value="{{ $value->id }}" {{($value->gol==$dupak->atasan_panggol) ? 'selected' :''}} >{{ $value->pangkat}} ({{ $value->gol }})</option>
                        @endforeach
                        </select>
                    </div>
                    @if ($errors->has('id_role'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('atasan_panggol') }}</strong>
                        </span>
                    @endif
                </div>       
                <div class="form-group{{ $errors->has('atasan_jabatan') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('atasan_jabatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Jabatan Atasan') }}" type="text" name="atasan_jabatan" value="{{ $dupak->atasan_jabatan }}">
                    </div>
                    @if ($errors->has('atasan_jabatan'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('atasan_jabatan') }}</strong>
                        </span>
                    @endif
                </div>      
                <div class="form-group{{ $errors->has('atasan_unit') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('atasan_unit') ? ' is-invalid' : '' }}" placeholder="{{ __('Unit Kerja Atasan') }}" type="text" name="atasan_unit" value="{{ $dupak->atasan_unit }}">
                    </div>
                    @if ($errors->has('atasan_unit'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('atasan_unit') }}</strong>
                        </span>
                    @endif
                </div>                                   
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">{{ __('Update') }}</button>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection
