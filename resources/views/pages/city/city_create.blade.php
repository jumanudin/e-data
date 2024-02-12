<x-app-layout>
    <x-slot name="header_content">
    <h1> {{ __('Kabupaten/Kota') }} </h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ url('city') }}" >Kabupaten/Kota</a></div>
            <div class="breadcrumb-item active">Tambah Kabupaten/Kota</a></div>
        </div>
    </x-slot>
    <div class="section-body">
        <h2 class="section-title">Tambah Data Kabupaten / Kota</h2>
        <p class="section-lead">Tekan tombol simpan untuk menyimpan data Kabupaten atau Kota</p>


            @if(Session::has("pesan_berhasil"))
            <div class="alert alert-success alert-dismissable text-center icon-font">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  {{ session('pesan_berhasil') }}
            </div>
            @elseif(Session::has("pesan_gagal"))
            <div class="alert alert-danger alert-dismissable text-center icon-font">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-exclamation-triangle"></i>  {{ session('pesan_gagal') }}
            </div>
            @elseif(count($errors) > 0)
            <div class="alert alert-danger alert-dismissable text-center icon-font">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-exclamation-triangle"></i>  Mohon periksa kembali inputan anda
            </div>
            @endif

            {{ Form::open(['url'=>'city/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
            @csrf
            <div class="card card-primary">
                <div class="card-header"><h4>Data Input Kabupaten / Kota<h4>
                </div>
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
            </div>    
            {{ Form::close() }}
  </div>

</x-app-layout>
