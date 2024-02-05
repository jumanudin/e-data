@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Cek Email Anda') }}</small>
                        </div>
                        <div>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Link Verifikasi sudah dikirim ke alamat email anda.') }}
                                </div>
                            @endif
                            
                            {{ __('Sebelum diproses, silahkan cek email anda untuk link verifikasi.') }}
                            
                            @if (Route::has('verification.resend'))
                                {{ __('jika email tidak diterima') }}, <a href="{{ route('verification.resend') }}">{{ __('click disini untuk permintaan lagi') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
