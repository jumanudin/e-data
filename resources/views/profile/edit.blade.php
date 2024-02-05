
@extends('layouts.app', ['title' => __('User Profile')])
@section('title','Profile Edit')
@push('style')
<link rel="stylesheet" href="{{ asset('turtle/css/cropper.css') }}">
<style type   = "text/css">
    img {
display       : block;
max-width     : 100%;
}
.preview {
overflow      : hidden;
width         : 160px;
height        : 160px;
margin        : 10px;
border        : 1px solid red;
}
.modal-lg{
max-width     : 580px !important;
}    
</style>
@endpush
@section('main')
<div class="main-content">
    <section class="section">
        @include('users.partials.header', [
            'title' => __('Hello') . ' '. auth()->user()->name,
            'description' => __('Ini adalah halaman Profile anda. Anda bisa melihat dan mengupdate data utama pada profile anda'),
            'class' => 'col-lg-7'
        ])   
    </section>
         <div class="row">
            <div class="col-sm-12 order-xl-1">
                <div class="card shadow">                    

                    <div class="card-header bg-white border-1">
                        <div class="row align-items-center">
                            <h5 class="mb-0">{{ __('Edit User Profile') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                                <div class="card-profile-image">

                                        <img id="upfile1" src="{{ asset('storage/profile-photos/'.Auth::user()->profile_photo_url) }}" style="cursor:pointer" class="circle-100">
                                        <input type="file" id="imagex" name="imagex" accept="image/*" class="image" style="display:none">

                                </div>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Simpan Perubahan') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-sm-12 order-xl-1">
                <div class="card shadow">   
                    <div class="card-header bg-white border-1">
                        <div class="row align-items-center">
                            <h5 class="mb-0">{{ __('Edit Password ') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')
                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Ubah password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>    
@endsection
@section('modal')
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Sesuaikan Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" >
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Batalkan</button>
                    <button type="button" class="btn btn-success" id="crop">Sesuaikan</button>
                </div>  
            </div>    
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('turtle/js/cropper.js') }}"></script>
<script type="text/javascript">
  var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;
    $("body").on("change", ".image", function(e){
    var files = e.target.files;
    var done = function (url) {
        image.src = url;
        $modal.modal('show');
    };
    var reader;
    var file;
    var url;
    if (files && files.length > 0) {
        file = files[0];
        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
            done(reader.result);
        };
        reader.readAsDataURL(file);
        }
    }
    });
    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
        preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });
    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            $("#upfile1").attr('src',''+URL.createObjectURL(blob));
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob); 
            reader.onloadend = function() {
            var base64data = reader.result; 
            $.ajax({
            type: "POST",
            dataType: "json",
            url: '{{ route("profile_upload") }}',
            data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
            success: function(data){
            console.log(data);
            $modal.modal('hide');
            //alert("Crop image successfully uploaded");
            }
            });
            }
        });
    })  
    $("#upfile1").click(function () {
        $("#imagex").trigger('click');
    });
</script>
@endpush

