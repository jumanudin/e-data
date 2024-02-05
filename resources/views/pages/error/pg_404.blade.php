@extends('layouts.app', ['title' => __('User Role Permission')])

@section('content')
@include('layouts.headers.guest') 
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-5">{{ __('Error Pages') }}</h3>
              <div class="section-header-button">
                  <a href="{{ route('dashboard') }}" class="btn btn-icon btn-left btn-primary">Back to Home</a>
              </div>
            </div>
            <!-- Light table -->
            <div class="card-body">
            <h1 style="color: red"> Mohon maaf halaman ini tidak ditemukan!</h1>
            </div>
          </div>
        </div>
      </div>      
    @include('layouts.footers.auth')
</div>
@endsection
