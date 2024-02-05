@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('vendor/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
            <div class="d-flex align-items-stretch flex-wrap">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="m-3 p-4">
                        <img src="{{ asset('turtle/img/stisla-fill.svg') }}"
                            alt="logo"
                            width="80"
                            class="shadow-light rounded-circle mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Selamat <span class="font-weight-bold">Datang</span>
                        </h4>
                        <p class="text-muted">Sebelum mulai , anda harus login terlebih dahulu atau daftar bagi yang belum punya akun.</p>
                        <form method="POST" action="{{ route('login') }}" role="form">
                            @csrf
                            <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('User Name') }}" type="text" name="username" value="{{ old('username') }}" required autofocus>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="secret" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                        name="remember"
                                        class="custom-control-input"
                                        tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label"
                                        for="remember-me">Ingatkan</label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <a href="{{ route('password.request') }}" class="float-left mt-3">Lupa Password?</a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                        <div class="text-small mt-5 text-center">
                            Copyright &copy; TIM IT Kanwil Kemenag Prov. Babel
                            <div class="mt-2">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                    data-background="{{ asset('turtle/img/unsplash/login-bg.jpg') }}">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">Selamat Datang..</h1>
                            <h5 class="font-weight-normal text-muted-transparent">e-Data Kanwil Kemenag Prov. Babel</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
