@extends('layouts.app')
@section('title','Ubah User Role Permission')
@push('style')
<link rel="stylesheet" href="{{ asset('library/iCheck/all.css') }}">
@endpush
@section('main')
<div class="main-content">
<div class="row">
    <div class="col">
        <div class="card shadow">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">{{ __('Ubah User Role Permission') }}</h3>
            </div>
            {{ Form::open(['url'=>'role_user/edit/'.$data->id, 'class' => 'form-horizontal', 'method'=>'post']) }}
            <!-- Isi dari content yang ada  -->
            <div class="card-body">
                <div class="form-group {{ $errors->has('level') ? 'has-error' : '' }}">
                    {{ Form::label('Role User','', ['class'=>'control-label col-sm-2']) }}
                    <div class="col-sm-12">
                    {{ Form::text('level',$data->level,['class'=>'form-control','readonly']) }}
                    <span class="help-block">{{ $errors->has('level') ? $errors->first('level') : '' }}</span>
                    </div>
                </div>
                <div class="table-responsive">
                    {{ Form::label('Modul Akses','', ['class'=>'control-label col-sm-2']) }}
                    <div class="col-sm-12">
                    <table class="table table-striped table-hover" id="table-2">
                        <thead class="text-white">
                            <tr>
                            <th >No</th>
                            <th >Modul</th>
                            <th >Lihat</th>
                            <th >Detail</th>
                            <th>Tambah</th>
                            <th >Ubah</th>
                            <th >Hapus</th>
                            </tr>
                        </thead>
                        <tbody class="list">    
                            @foreach($role as $key => $value)
                            <tr>
                            <td class="text-center">{{ ++$i}}</td>
                            <td>
                                <div class="custom-checkbox custom-control">
                                {{ Form::checkbox('selectall','',(($value->l||$value->d||$value->t||$value->u||$value->h)?true:false),['id'=>$key]) }}
                                {{ $value->id_modul.'-'.$value->nama_menu }}
                                {{ Form::hidden('id_modul[]',$value->id_modul) }}
                                </div>
                            </td>
                            <td>{{ Form::checkbox('l'.$key,true,$value->l,['id'=>'$key']) }}</td>
                            <td>{{ Form::checkbox('d'.$key,true,$value->d) }}</td>
                            <td>{{ Form::checkbox('t'.$key,true,$value->t) }}</td>
                            <td>{{ Form::checkbox('u'.$key,true,$value->u) }}</td>
                            <td>{{ Form::checkbox('h'.$key,true,$value->h) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="text-white bg-success">
                        <tr>
                            <th >No</th>
                            <th >Modul</th>
                            <th >Lihat</th>
                            <th >Detail</th>
                            <th>Tambah</th>
                            <th >Ubah</th>
                            <th >Hapus</th>
                            </tr>
                        </tfoot>    
                    </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                <a href="{{url('role_user')}}" class="btn btn-med btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-med btn-icon icon-left btn-success"><i class="fas fa-save"></i> Update</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>    
</div>   
</div>
@endsection 
@push('scripts')
<script src="{{ asset('library/iCheck/iCheck.min.js') }}"></script>
<script type="text/javascript">
$('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass   : 'iradio_flat-blue'
});

$("input").on('ifChanged', function (e) {
    if (this.name == "selectall") {
    if (this.checked) {
        $('input[name=l'+this.id+']').iCheck('check');
        $('input[name=d'+this.id+']').iCheck('check');
        $('input[name=t'+this.id+']').iCheck('check');
        $('input[name=u'+this.id+']').iCheck('check');
        $('input[name=h'+this.id+']').iCheck('check');
    }else {
        $('input[name=l'+this.id+']').iCheck('uncheck');
        $('input[name=d'+this.id+']').iCheck('uncheck');
        $('input[name=t'+this.id+']').iCheck('uncheck');
        $('input[name=u'+this.id+']').iCheck('uncheck');
        $('input[name=h'+this.id+']').iCheck('uncheck');
    }
    }
});
</script>
@endpush 
