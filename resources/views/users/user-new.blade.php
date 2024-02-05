@extends('layouts.app')
@section('title','User New')
@section('main')
<div class="main-content">
<div class="row">
    <div class="col">
        <div class="card shadow">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">{{ __('Buat user') }}</h3>
            </div>
            <div class="card-body">
            {{ Form::open(['url'=>'data_user/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
            @csrf
                
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" autofocus>
                    </div>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('id_role') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-sliders"></i></span>
                        </div>
                        <select class="form-control{{ $errors->has('id_role') ? ' is-invalid' : '' }}" placeholder="{{ __('Role Admin') }}" type="text" name="id_role"  >
                        @foreach ($role as $row)
                            <option value="{{ $row->id }}">{{ $row->level }}</option>
                        @endforeach
                        </select>
                    </div>
                    @if ($errors->has('id_role'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('id_role') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-circle-user"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('User Id / NIP Max 20 Char') }}" type="text" name="username" }}">
                    </div>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" }}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        </div>
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password">
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        </div>
                        <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                            <label class="custom-control-label" for="customCheckRegister">
                                <span class="text-muted">{{ __('Saya setuju') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">{{ __('simpan account') }}</button>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
