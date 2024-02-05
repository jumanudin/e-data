<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\Ts_masterController;
use App\Http\Controllers\SpdmasterController;
use App\Http\Controllers\Buat_spdController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ArsipDocController;
use App\Http\Controllers\ArsipTrcController;

Route::get('/', [HomeController::class, "site"]);
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth','verified'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('pegawai', [PegawaiController::class, "index"])->name('pegawai')->middleware('role:pegawai,l');
    Route::get('pegawai/view/{value}', [PegawaiController::class, "show"])->name('pegawai.detail')->middleware('role:pegawai,d');
    Route::get('pegawai/create', [PegawaiController::class, "create"])->name('pegawai.create')->middleware('role:pegawai,t');
    Route::post('pegawai/submit', [PegawaiController::class, "store"])->name('pegawai.submit')->middleware('role:pegawai,t');
    Route::get('pegawai/edit/{value}', [PegawaiController::class, "edit"])->middleware('role:pegawai,u');
    Route::post('pegawai/edit/{value}', [PegawaiController::class, "update"])->name('pegawai.update')->middleware('role:pegawai,u');
    Route::get('pegawai/hapus/{value}', [PegawaiController::class, "destroy"])->name('pegawai.hapus')->middleware('role:pegawai,h');
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
    Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::get('ts_master', [Ts_masterController::class, "index"])->name('ts_master')->middleware('role:ts_master,l');
    Route::get('ts_master/view/{value}', [Ts_masterController::class, "show"])->name('ts_master.detail')->middleware('role:ts_master,d');
    Route::get('ts_master/create', [Ts_masterController::class, "create"])->name('ts_master.create')->middleware('role:ts_master,t');
    Route::get('ts_master/rinci/create', [Ts_masterController::class, "rinci_create"])->name('ts_master.rinci.create')->middleware('role:ts_master,t');
    Route::post('ts_master/submit', [Ts_masterController::class, "store"])->name('ts_master.submit')->middleware('role:ts_master,t');
    Route::get('ts_master/edit/{value}', [Ts_masterController::class, "edit"])->middleware('role:ts_master,u');
    Route::post('ts_master/edit/{value}', [Ts_masterController::class, "update"])->name('ts_master.update')->middleware('role:ts_master,u');
    Route::get('ts_master/hapus/{value}', [Ts_masterController::class, "destroy"])->name('ts_master.hapus')->middleware('role:ts_master,h');
    Route::post('ts_master/rinci/addupdated',[Ts_masterController::class,"rinci_store"])->middleware('role:ts_master,d');
    Route::get('ts_master/rinci/hapus/{value}/{id_master}',[Ts_masterController::class,"rinci_hapus"])->middleware('role:ts_master,h');
    Route::get('ts_master/kirim/{value}',[Ts_masterController::class,"kirim"])->name('ts_master.kirim')->middleware('role:ts_master,d');
    Route::get('ts_master/viewupload/{value}', [ Ts_masterController::class,"view_dukung"])->name('ts_master.view_dukung')->middleware('role:ts_master,d');
    Route::get('ts_master/viewrekom/{value}', [Ts_masterController::class, "viewrekom"])->name('ts_master.viewrekom')->middleware('role:ts_master,d');
    Route::get('ts_master/viewtugas/{value}', [Ts_masterController::class, "viewtugas"])->name('ts_master.viewtugas')->middleware('role:ts_master,d');
    Route::get('ts_master/buatspd/{value}',[Ts_masterController::class,"buat_spd"])->name('ts_master.buatspd')->middleware('role:ts_master,d');
    
    Route::get('buat_spd', [Buat_spdController::class, "index"])->name('buat_spd')->middleware('role:buat_spd,l');
    Route::post('buat_spd/submit/{value}', [Buat_spdController::class, "store_spd"])->name('buat_spd.submit')->middleware('role:buat_spd,u');
    Route::get('buat_spd/view/{value}', [Buat_spdController::class, "show"])->name('buat_spd.detail')->middleware('role:buat_spd,d');
    Route::post('buat_spd/addupdated',[Buat_spdController::class,"rinci_store"])->middleware('role:buat_spd,d');
    Route::get('buat_spd/edit/{value}', [Buat_spdController::class, "edit"])->middleware('role:buat_spd,u');
    Route::post('buat_spd/edit/{value}', [Buat_spdController::class, "update"])->middleware('role:buat_spd,u');
    Route::get('buat_spd/hapus/{value}/{id_master}',[Buat_spdController::class,"rinci_hapus"])->middleware('role:buat_spd,h');
    Route::get('buat_spd/cetak/{value}',[Buat_spdController::class,"cetak_spd"])->name('buat_spd.cetakspd')->middleware('role:buat_spd,d');
    Route::get('buat_spd/msthapus/{value}', [Buat_spdController::class, "destroy"])->middleware('role:buat_spd,h');
    Route::post('buat_spd/st/submit/{value}', [Buat_spdController::class, "store_st"])->name('buat_spd.st.submit')->middleware('role:buat_spd,u');
    Route::get('buat_spd/cetakst/{value}', [Buat_spdController::class, "cetaktugas"])->name('buat_spd.cetaktugas')->middleware('role:buat_spd,d');
    Route::get('buat_spd/cetakst_lampiran/{value}', [Buat_spdController::class, "cetaktugaslampiran"])->name('buat_spd.cetaktugaslampiran')->middleware('role:buat_spd,d');
    
    Route::get('spd_master', [SpdmasterController::class, "index"])->name('spd_master')->middleware('role:spd_master,l');
    Route::get('spd_master/view/{value}', [SpdmasterController::class, "show"])->name('spd_master.lihat')->middleware('role:spd_master,d');
    Route::post('spd_master/submit/{value}', [SpdmasterController::class, "update"])->name('spd_master.submit')->middleware('role:spd_master,u');
    Route::get('spd_master/rekom/{value}', [SpdmasterController::class, "rekom"])->name('spd_master.rekom')->middleware('role:spd_master,u');
    Route::get('spd_master/viewrekom/{value}', [SpdmasterController::class, "viewrekom"])->name('spd_master.viewrekom')->middleware('role:spd_master,u');
    Route::get('spd_master/rinci/hapus/{value}/{id_master}',[SpdmasterController::class,"rinci_hapus"])->middleware('role:spd_master,h');

    Route::get('report_spd',[ReportController::class,"index"])->name('report_spd')->middleware('role:report_spd,d');
    Route::get('report_spd/query_tgl', [ ReportController::class,"qtanggal"])->name('report_spd.qsatker')->middleware('role:report_spd,l');
    Route::get('report_spd/token', [ ReportController::class,"token"])->name('report_spd.token')->middleware('role:report_spd/token,l');
    Route::get('report_spd/token/cari', [ ReportController::class,"token_cari"])->name('report_spd.token_cari')->middleware('role:report_spd/token,l');

    Route::get('verifikator', [ VerifikatorController::class,"index"])->name('verifikator')->middleware('role:verifikator,l');
    Route::get('verifikator/view/{value}', [VerifikatorController::class, "show"])->name('verifikator.lihat')->middleware('role:verifikator,d');
    Route::post('verifikator/submit/{value}', [VerifikatorController::class, "update"])->name('verifikator.submit')->middleware('role:verifikator,u');
    Route::get('verifikator/viewupload/{value}', [VerifikatorController::class,"view_dukung"])->name('verifikator.view_dukung')->middleware('role:verifikator,d');
    Route::get('verifikator/viewrekom/{value}', [VerifikatorController::class, "viewrekom"])->name('verifikator.viewrekom')->middleware('role:verifikator,d');
    
    Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::get('modul_name', [ ModulController::class, "index" ])->name('modul')->middleware('role:modul_name,l');
    Route::get('modul_name/create', [ ModulController::class, "create" ])->name('modul.create')->middleware('role:modul_name,t');
    Route::post('modul_name/submit', [ ModulController::class, "store" ])->name('modul.submit')->middleware('role:modul_name,t');
    Route::get('modul_name/edit/{value}', [ ModulController::class, "edit" ])->name('modul.edit')->middleware('role:modul_name,u');
    Route::post('modul_name/edit/{value}', [ ModulController::class, "update" ])->middleware('role:modul_name,u');
    Route::get('modul_name/hapus/{value}', [ ModulController::class, "destroy" ])->name('modul.hapus')->middleware('role:modul_name,h');

    Route::get('data_user', [ UserController::class, "index_view" ])->name('user')->middleware('role:data_user,l');
    Route::get('data_user/new', [ UserController::class,"create"])->name('user.new')->middleware('role:data_user,t');
    Route::post('data_user/submit', [ UserController::class,"store"])->name('user.submit')->middleware('role:data_user,t');
    Route::get('data_user/edit/{userId}',[ UserController::class, "edit"])->name('user.edit')->middleware('role:data_user,u');
    Route::post('data_user/edit/{userId}',[ UserController::class, "update"])->middleware('role:data_user,u');
    Route::get('data_user/hapus/{userId}', [ UserController::class,'destroy'])->name('user.hapus')->middleware('role:data_user,h');
    Route::get('data_user/reset/{value}', [ UserController::class, "reset" ])->name('user.reset')->middleware('role:data_user,u');

    Route::get('role_user', [ LevelUserController::class, "index"])->name('role')->middleware('role:role_user,l');
    Route::get('role_user/create', [ LevelUserController::class, "create" ])->name('role.create')->middleware('role:role_user,t');
    Route::post('role_user/submit', [ LevelUserController::class, "store" ])->name('role.submit')->middleware('role:role_user,t');
    Route::get('role_user/edit/{value}', [ LevelUserController::class,"edit"])->name('role.edit')->middleware('role:role_user,u');
    Route::post('role_user/edit/{value}',[ LevelUserController::class,"update"])->middleware('role:role_user,u');
    Route::get('role_user/hapus/{value}', [ LevelUserController::class,"destroy"])->name('role.hapus')->middleware('role:role_user,h');
    Route::get('role_user/reupdate/{value}', [ LevelUserController::class,"reupdate"])->name('role.reupdate')->middleware('role:role_user,u');
    Route::post('crop-image-upload', [UserController::class, 'uploadCropImage'])->name('profile_upload');
    
    Route::get('doc_arsip', [ ArsipDocController::class, "index"])->name('doc_arsip')->middleware('role:doc_arsip,l');
    Route::get('doc_arsip/create', [ ArsipDocController::class, "create"])->name('doc_arsip.create')->middleware('role:doc_arsip,t');
    Route::post('doc_arsip/submit', [ ArsipDocController::class, "store"])->name('doc_arsip.submit')->middleware('role:doc_arsip,t');
    Route::get('doc_arsip/edit/{value}', [ ArsipDocController::class, "edit"])->name('doc_arsip.update')->middleware('role:doc_arsip,u');
    Route::post('doc_arsip/edit/{value}', [ ArsipDocController::class, "update"])->middleware('role:doc_arsip,u');
    Route::get('doc_arsip/hapus/{value}', [ ArsipDocController::class, "destroy"])->middleware('role:doc_arsip,h');
    
    Route::get('arsip_trc', [ ArsipTrcController::class, "index"])->name('arsip_trc')->middleware('role:arsip_trc,l');
    Route::get('arsip_trc/create/{value}', [ ArsipTrcController::class, "create"])->name('arsip_trc.create')->middleware('role:arsip_trc,t');
    Route::get('arsip_trc/view/{value}', [ ArsipTrcController::class, "show"])->name('arsip_trc.show')->middleware('role:arsip_trc,d');
    Route::get('arsip_trc/edit/{value}', [ ArsipTrcController::class, "edit"])->name('arsip_trc.edit')->middleware('role:arsip_trc,u');
    Route::post('arsip_trc/edit/{value}', [ ArsipTrcController::class, "update"])->middleware('role:arsip_trc,u');
    Route::post('arsip_trc/submit/{value}', [ ArsipTrcController::class, "store"])->name('arsip_trc.submit')->middleware('role:arsip_trc,t');
   
    Route::get('logs', [ LogsController::class,"index"])->name('logs')->middleware('role:logs,l');
    Route::get('logs/hapus/{value}',[LogsController::class,"destroy"])->middleware('role:logs,h');
    Route::get('utility', [ SettingController::class, "index" ])->name('utility')->middleware('role:utility,l');
    Route::post('utility/update/{value}', [ SettingController::class,"update"])->name('utility.update')->middleware('role:utility,u');
    
    Route::view('pages/error/pg403', "pages.error.pg_403")->name('page.error.403');
    Route::view('pages/error/pg500', "pages.error.pg_500")->name('page.error.5000');
});

