<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\Mad_raController;
use App\Http\Controllers\Mad_miController;

use App\Http\Controllers\SettingController;


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
/* Master */
    Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::get('modul_name', [ ModulController::class, "index" ])->name('modul')->middleware('role:modul_name,l');
    Route::get('modul_name/create', [ ModulController::class, "create" ])->name('modul.create')->middleware('role:modul_name,t');
    Route::post('modul_name/submit', [ ModulController::class, "store" ])->name('modul.submit')->middleware('role:modul_name,t');
    Route::get('modul_name/edit/{value}', [ ModulController::class, "edit" ])->name('modul.edit')->middleware('role:modul_name,u');
    Route::post('modul_name/edit/{value}', [ ModulController::class, "update" ])->middleware('role:modul_name,u');
    Route::get('modul_name/hapus/{value}', [ ModulController::class, "destroy" ])->name('modul.hapus')->middleware('role:modul_name,h');
    Route::get('city', [ CityController::class,"index"])->name('city')->middleware('role:city,l');
    Route::get('city/create', [ CityController::class,"create"])->name('city.create')->middleware('role:city,t');
    Route::post('city/submit', [ CityController::class,"store"])->name('city.submit')->middleware('role:city,t');
    Route::get('city/edit/{value}', [ CityController::class,"edit"])->middleware('role:city,u');
    Route::post('city/edit/{value}', [ CityController::class,"update"])->middleware('role:city,u');
    Route::get('city/hapus/{value}', [ CityController::class,"destroy"])->middleware('role:city,h');
/* Transaksi */
    Route::get('laymad_ra', [ Mad_raController::class, "index" ])->name('laymad_ra')->middleware('role:laymad_ra,l');
    Route::post('laymad_ra/edit', [ Mad_raController::class, "edit" ])->name('laymad_ra.edit')->middleware('role:laymad_ra,u');
    Route::post('laymad_ra/update', [ Mad_raController::class, "update" ])->name('laymad_ra.update')->middleware('role:laymad_ra,u');
    Route::get('laymad_akra', [ Mad_raController::class, "index_akra" ])->name('laymad_akra')->middleware('role:laymad_akra,l');
    Route::post('laymad_akra/edit', [ Mad_raController::class, "edit_akra" ])->name('laymad_ra.edit.akra')->middleware('role:laymad_akra,u');
    Route::post('laymad_akra/update', [ Mad_raController::class, "update_akra" ])->name('laymad_ra.update.akra')->middleware('role:laymad_ra,u');
    Route::get('laymad_gra', [ Mad_raController::class, "index_gra" ])->name('laymad_gra')->middleware('role:laymad_gra,l');
    Route::post('laymad_gra/edit', [ Mad_raController::class, "edit_gra" ])->name('laymad_ra.edit.gra')->middleware('role:laymad_gra,u');
    Route::post('laymad_gra/update', [ Mad_raController::class, "update_gra" ])->name('laymad_ra.update.gra')->middleware('role:laymad_gra,u');
 
    Route::get('laymad_akmi', [ Mad_miController::class, "index" ])->name('laymad_akmi')->middleware('role:laymad_akmi,l');
    Route::post('laymad_akmi/edit', [ Mad_miController::class, "edit" ])->name('laymad_mi.edit')->middleware('role:laymad_akmi,u');
    Route::post('laymad_akmi/update', [ Mad_miController::class, "update" ])->name('laymad_mi.update')->middleware('role:laymad_akmi,u');
    Route::get('laymad_gmi', [ Mad_miController::class, "index_gmi" ])->name('laymad_gmi')->middleware('role:laymad_gmi,l');
    Route::post('laymad_gmi/edit', [ Mad_miController::class, "edit_gmi" ])->name('laymad_mi.edit.gmi')->middleware('role:laymad_gmi,u');
    Route::post('laymad_gmi/update', [ Mad_miController::class, "update_gmi" ])->name('laymad_mi.update.gmi')->middleware('role:laymad_gmi,u');
        
/* System */    
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
    
    Route::get('logs', [ LogsController::class,"index"])->name('logs')->middleware('role:logs,l');
    Route::get('logs/hapus/{value}',[LogsController::class,"destroy"])->middleware('role:logs,h');
    Route::get('utility', [ SettingController::class, "index" ])->name('utility')->middleware('role:utility,l');
    Route::post('utility/update/{value}', [ SettingController::class,"update"])->name('utility.update')->middleware('role:utility,u');
    
    Route::view('pages/error/pg403', "pages.error.pg_403")->name('page.error.403');
    Route::view('pages/error/pg500', "pages.error.pg_500")->name('page.error.5000');
});

