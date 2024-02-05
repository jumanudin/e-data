@extends('layouts.app', ['title' => __('Tambah Pegawai')])

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
              <h6 class="h2 text-white d-inline-block mb-0">Setup Tambah Pegawai TS</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('ts_master') }}">TS Master</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Setup Pegawai</li>
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
        <div class="card shadow">
            <!-- Card header -->
            <div class="card-header bg-default border-1">
              <h2 class="mb-0 text-white">{{ __('Tambah Pegawai') }}</h2>
            </div>

            <div class="card-body">

            <h3 >Form Tambah Daftar Pegawai Yang di Tugaskan</h3>
                <p class="text-blue"><strong>Silahkan pilih Pegawai dengan mengetikan kode atau kreteria lainnya..!</strong></p>


            {{ Form::open(['url'=>'ts_master/rinci/submit', 'class' => 'form-horizontal', 'method'=>'post']) }}
            @csrf
            <input type="hidden" id="jabatan" name="jabatan" value="{{ $pegawai->kode_jabatan }}">
            <div class="form-group{{ $errors->has('tgl_kegiatan') ? ' has-danger' : '' }} row mb-2">
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Tanggal Kegiatan') }}</label>
                <div class="col-md-10">
                    <input class="form-control{{ $errors->has('tgl_kegiatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Tanggal Kegiatan') }}" type="date" name="tgl_kegiatan" >
                    @if ($errors->has('tgl_kegiatan'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('tgl_kegiatan') }}</strong>
                    </span>
                    @endif
                </div>
            </div>  
            <div class="form-group row mb-2">                    
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Unsur') }}</label>
                <div class="col-md-10" >
                    <select class="select2 form-control" data-placeholder="--Pilih Unsur--" data-live-search="true" id="unsur" name="unsur" >
                    <option value="" ></option>
                    @foreach ($unsur as $key => $value)    
                        <option value="{{ $key }}" >{{ $value }}</option>
                    @endforeach
                    </select>
                   
                </div>         
            </div>             
            <div class="form-group row mb-2">                    
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Sub Unsur') }}</label>
                <div class="col-md-10" >
                    <select class="select2 form-control" data-placeholder="--Pilih Sub Unsur--" data-live-search="true" id="subunsur" name="subunsur" >                   
                        <option value=""></option>
                    </select>
                </div>         
            </div>             

            <div class="form-group{{ $errors->has('kode_kegiatan') ? ' has-danger' : '' }} row mb-2">                    
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Uraian Kegiatan') }}</label>
                <div class="col-md-10" >
                    <select class="select2 form-control" data-placeholder="--Pilih Uraian Kegiatan--" data-live-search="true" id="kode_kegiatan" name="kode_kegiatan" >
                        <option value="" ></option>
                    </select>
                </div>         
            </div> 
            <div class="form-group{{ $errors->has('ak') ? ' has-danger' : '' }} row mb-2">
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Angka Kredit') }}</label>
                <div class="col-md-10">
                    <input class="form-control{{ $errors->has('ak') ? ' is-invalid' : '' }}" placeholder="{{ __('Angka Kredit') }}" type="text" id="ak" name="ak" readonly>
                    @if ($errors->has('ak'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('ak') }}</strong>
                    </span>
                    @endif
                </div>

            </div>    
            <div class="form-group {{ $errors->has('persen') ? ' has-danger' : '' }} row mb-2">
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Persentase') }}</label>
                <div class="col-md-10">
                    <input class="form-control{{ $errors->has('persen') ? ' is-invalid' : '' }}" type="text" name="persen" readonly>
                    @if ($errors->has('persen'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('persen') }}</strong>
                    </span>
                    @endif
                </div>
            </div>                              
            <div class="form-group{{ $errors->has('volume') ? ' has-danger' : '' }} row mb-2">
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Volume Kegiatan') }}</label>
                <div class="col-md-10">
                    <input class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}" placeholder="{{ __('Volume Kegiatan') }}" type="text" id="volume" name="volume">
                    @if ($errors->has('volume'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('volume') }}</strong>
                    </span>
                    @endif
                </div>
            </div>                                 
                            
            <div class="form-group{{ $errors->has('ak_paif') ? ' has-danger' : '' }} row mb-2">
                <label class="col-form-label text-md-right col-md-2 ">{{ __('Total AK') }}</label>
                <div class="col-md-10">
                    <input class="form-control{{ $errors->has('ak_paif') ? ' is-invalid' : '' }}" placeholder="{{ __('Total AK') }}" type="text" name="ak_paif" readonly>
                    @if ($errors->has('ak_paif'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('ak_paif') }}</strong>
                    </span>
                    @endif
                </div>
            </div>                                 
                              
                               
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">{{ __('Simpan') }}</button>
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
<script type="text/javascript">
$(document).ready(function () {
    var jenPeg = $('#jabatan').val();
    $('[name="persen"]').val(0);
    $('#unsur').on('change',function(){
        var unsurID = $(this).val();
        if(unsurID)
        {
            $.ajax({
                url : 'getsubunsur/' +unsurID,
                type : "GET",
                dataType : "json",
                success:function(data)
                {                   
                console.log(data);
                $('select[name="subunsur"]').empty();
                $.each(data, function(key,value){
                    $('select[name="subunsur"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
                }
            });
        }
        else
        {
            $('select[name="subunsur"]').empty();
        }
    });
    $('#subunsur').on('change',function(){
        $('select[name="kode_kegiatan"]').empty();
        var unsurID = $('select[name="unsur"]').val();
            subunsurID = $('select[name="subunsur"]').val();
            jenjangID  = $('select[name="jenjang"]').val(); 
            // alert(unsurID+'/'+subunsurID+'/'+jenjangID);
        if(unsurID)
        {
            $.ajax({
                url : 'getkegiatan/' +unsurID+subunsurID+'/'+jenjangID,
                type : "GET",
                dataType : "json",
                success:function(data)
                {                   
                console.log(data);
                $('select[name="kode_kegiatan"]').empty();
                $.each(data, function(key,value){
                    $('select[name="kode_kegiatan"]').append('<option value="'+ value.kode +'" data-ak="'+value.ak+'">'+ value.kode+'-'+value.uraian +'</option>');
                });
                }
            });
        }
        else
        {
            $('select[name="kode_kegiatan"]').empty();
        }
    });
    $('#jenjang').on('change',function(){
        $('select[name="kode_kegiatan"]').empty();
        $('select[name="subunsur"]').empty();
        $('[name="ak"]').val(0);
        $('[name="persen"]').val(0);
        var jenPilih = $(this).val();
        let persen=0;
        if(jenPeg==1){
            if((jenPilih==1) || (jenPilih==0)){
                persen=100;
            }else{
                if(jenPilih==2){
                    persen=80;
                } else {
                persen=0;
                alert ('Jenjang ini tidak dibolehkan..!');
                }
            }    
        }
        $('[name="persen"]').val(persen);
    })
    $('#kode_kegiatan').on('change', function() {
        const ak = $('#kode_kegiatan option:selected').data('ak');
        const vol = $('#volume').val();
        const total = vol * ak;
        $('[name=ak_paif]').val(parseFloat(total).toFixed(3));
        $('[name=ak]').val(ak);
    });
    $('#volume').on('change', function(){
        const vol = $('#volume').val();
        const ak = $('#ak').val();
        const total = vol * ak;
        $('[name=ak_paif]').val(parseFloat(total).toFixed(3));
        // $(this).val(parseFloat($(this).val()).toFixed(2));
    });
});    
</script>
@stop 