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
use App\Http\Controllers\JumlahPendudukController;
use App\Http\Controllers\RumahibadahController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\PenyuluhPnsController;
use App\Http\Controllers\PenyuluhNonPnsController;
use App\Http\Controllers\TunjanganController;
use App\Http\Controllers\KuaController;
use App\Http\Controllers\WakafController;
use App\Http\Controllers\QoriController;
use App\Http\Controllers\KuotaController;
use App\Http\Controllers\TungguController;
use App\Http\Controllers\JemaahController;
use App\Http\Controllers\DaftarbaruController;
use App\Http\Controllers\KbihuController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PnsController;
use App\Http\Controllers\PensiunanController;
use App\Http\Controllers\NaikpangkatController;
use App\Http\Controllers\IjinbelajarController;
use App\Http\Controllers\NonpnsController;
use App\Http\Controllers\PtspController;
use App\Http\Controllers\BmnController;
use App\Http\Controllers\OrmasController;
use App\Http\Controllers\SettingController;

// ================= Front End Controller ===================
use App\Http\Controllers\FrontTatakelolaController;
use App\Http\Controllers\FrontKeagamaanController;

/* ===============================================================================

                    FRONT END ROUTER   

=================================================================================*/


Route::get('/', [HomeController::class, "site"]);
// ==================================== Data PNS =====================================================
Route::get('tatakelola_pns', [FrontTatakelolaController::class, "tatakelola_pns"]);
Route::get('getTabelTatakelolaPns/{tahun}/{jenis_data}', [FrontTatakelolaController::class, "getTabelTatakelolaPns"]);
Route::get('get_charttatakelolapns/{value}', [FrontTatakelolaController::class, "getChartTatakelolaPns"]);

// ==================================== Data PNS PENSIUN DAN NON PNS =====================================================
Route::get('tatakelola_pensiun', [FrontTatakelolaController::class, "tatakelola_pnspensiun"]);
Route::get('getTabelTatakelolaPnsPensiun{tahun}/{jenis_data}', [FrontTatakelolaController::class, "getTabelTatakelolaPnsPensiun"]);
Route::get('get_charttatakelolaPnsPensiun/{value}', [FrontTatakelolaController::class, "getChartTatakelolaPnsPensiun"]);

// ==================================== Data PNS NAIK PANGKAT DAN IJIN BELAJAR====================================================
Route::get('tatakelola_pnspangkat', [FrontTatakelolaController::class, "tatakelola_pnspangkat"]);
Route::get('getTabelTatakelolaPnsPangkat/{tahun}/{jenis_data}', [FrontTatakelolaController::class, "getTabelTatakelolaPnsPangkat"]);
Route::get('get_charttatakelolapnsPangkat/{value}', [FrontTatakelolaController::class, "getChartTatakelolaPnsPangkat"]);


// ===================================== Data Anggaran dan BMN =======================================
Route::get('tatakelola_anggaran', [FrontTatakelolaController::class, "tatakelola_anggaran"]);
Route::get('tatakelola_bmn', [FrontTatakelolaController::class, "tatakelola_bmn"]);
Route::get('get_charttatakelolaanggaran/{value}', [FrontTatakelolaController::class, "getChartTatakelolaAnggaran"]);
Route::get('get_charttatakelolabmn/{value}', [FrontTatakelolaController::class, "getChartTatakelolaBmn"]);
Route::get('getTabelTatakelolaAnggaran/{tahun}/{jenis_data}', [FrontTatakelolaController::class, "getTabelTatakelolaAnggaran"]);

// ==================================== Data KUA=====================================================
Route::get('keagamaan_kua', [FrontKeagamaanController::class, "keagamaan_kua"]);
Route::get('get_chartkeagamaankua/{value}', [FrontKeagamaanController::class, "getChartKeagamaanKua"]);
Route::get('getTabelKeagamaanKua/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaanKua"]);

// ==================================== Data PENYULUH ISLAM=====================================================
Route::get('keagamaan_islam', [FrontKeagamaanController::class, "keagamaan_islam"]);
Route::get('get_chartkeagamaanislam/{value}', [FrontKeagamaanController::class, "getChartKeagamaanIslam"]);
Route::get('getTabelKeagamaanIslam/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaanIslam"]);

// ==================================== Data PENYULUH KRISTEN=====================================================
Route::get('keagamaan_kristen', [FrontKeagamaanController::class, "keagamaan_kristen"]);
Route::get('get_chartkeagamaankristen/{value}', [FrontKeagamaanController::class, "getChartKeagamaankristen"]);
Route::get('getTabelKeagamaankristen/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaankristen"]);

// ==================================== Data PENYULUH KATOLIK=====================================================
Route::get('keagamaan_katolik', [FrontKeagamaanController::class, "keagamaan_katolik"]);
Route::get('get_chartkeagamaankatolik/{value}', [FrontKeagamaanController::class, "getChartKeagamaankatolik"]);
Route::get('getTabelKeagamaankatolik/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaankatolik"]);


// ==================================== Data PENYULUH HINDU=====================================================
Route::get('keagamaan_hindu', [FrontKeagamaanController::class, "keagamaan_hindu"]);
Route::get('get_chartkeagamaanhindu/{value}', [FrontKeagamaanController::class, "getChartKeagamaanhindu"]);
Route::get('getTabelKeagamaanhindu/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaanhindu"]);


// ==================================== Data PENYULUH BUDDHA=====================================================
Route::get('keagamaan_buddha', [FrontKeagamaanController::class, "keagamaan_buddha"]);
Route::get('get_chartkeagamaanbuddha/{value}', [FrontKeagamaanController::class, "getChartKeagamaanbuddha"]);
Route::get('getTabelKeagamaanbuddha/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaanbuddha"]);


// ==================================== Data PENYULUH KHONGHUCU=====================================================
Route::get('keagamaan_khonghucu', [FrontKeagamaanController::class, "keagamaan_khonghucu"]);
Route::get('get_chartkeagamaankhonghucu/{value}', [FrontKeagamaanController::class, "getChartKeagamaankhonghucu"]);
Route::get('getTabelKeagamaankhonghucu/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaankhonghucu"]);



// ==================================== Data WAKAF=====================================================
Route::get('keagamaan_wakaf', [FrontKeagamaanController::class, "keagamaan_wakaf"]);
Route::get('get_chartkeagamaanwakaf/{value}', [FrontKeagamaanController::class, "getChartKeagamaanwakaf"]);
Route::get('getTabelKeagamaanwakaf/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaanwakaf"]);


// ==================================== Data RUMAH IBADAH=====================================================
Route::get('keagamaan_rumahibadah', [FrontKeagamaanController::class, "keagamaan_rumahibadah"]);
Route::get('get_chartkeagamaanrumahibadah/{value}', [FrontKeagamaanController::class, "getChartKeagamaanRumahibadah"]);
Route::get('getTabelKeagamaanRumahibadah/{tahun}/{jenis_data}', [FrontKeagamaanController::class, "getTabelKeagamaanRumahibadah"]);

/* ===================================================================================================

                                        BACK END ROUTER

=====================================================================================================*/





// ========= Back End Route ===========================================
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

    // ---------------- Jumlah Penduduk Berdasarkan Agama ----------------------------------------------
    Route::get('jumlah_penduduk', [ JumlahPendudukController::class, "index"])->name('jumlah_penduduk')->middleware('role:layagama_JmlPenduduk,l');    
    Route::get('get-jmlpenduduk/{value}', [JumlahPendudukController::class, 'tampil_jmlpenduduk'])->name('get-jmlpenduduk')->middleware('role:layagama_JmlPenduduk,l');
    Route::post('update_jmlpenduduk/{value}',[JumlahPendudukController::class,'update_jmlpenduduk'])->middleware('role:layagama_JmlPenduduk,u');

    // ---------------- Rumah Ibadah ----------------------------------------------
    Route::get('rumah_ibadah', [ RumahibadahController::class, "index"])->name('rumah_ibadah')->middleware('role:layagama_RmhIbadah,l');    
    Route::get('get-rumahibadah/{value}', [RumahibadahController::class, 'tampil_rumahibadah'])->name('get-rumahibadah')->middleware('role:layagama_RmhIbadah,l');
    Route::post('update_data/{value}',[RumahibadahController::class,'update_data'])->middleware('role:layagama_RmhIbadah,u');

    // ---------------- Tipologi Masjid ----------------------------------------------
    Route::get('tipo_masjid', [ MasjidController::class, "index"])->name('tipo_masjid')->middleware('role:	layagama_TipoMasjid,l');    
    Route::get('get-tipomasjid/{value}', [MasjidController::class, 'tampil_tipomasjid'])->name('get-tipomasjid')->middleware('role:layagama_TipoMasjid,l');
    Route::post('update_tipomasjid/{value}',[MasjidController::class,'update_tipoMasjid'])->middleware('role:layagama_TipoMasjid,u');

    // ---------------- Penyuluh Agama PNS ----------------------------------------------
    Route::get('penyuluh_pns', [ PenyuluhPnsController::class, "index"])->name('penyuluh_pns')->middleware('role:layagama_PenyuluhAgamaPNS,l');
    Route::post('update_penyuluhislam/{value}',[PenyuluhPnsController::class,'update_penyuluh_islam'])->middleware('role:layagama_PenyuluhAgamaPNS,u');
    Route::post('update_penyuluhkristen/{value}',[PenyuluhPnsController::class,'update_penyuluh_kristen'])->middleware('role:layagama_PenyuluhAgamaPNS,u');
    Route::post('update_penyuluhkatolik/{value}',[PenyuluhPnsController::class,'update_penyuluh_katolik'])->middleware('role:layagama_PenyuluhAgamaPNS,u');
    Route::post('update_penyuluhhindu/{value}',[PenyuluhPnsController::class,'update_penyuluh_hindu'])->middleware('role:layagama_PenyuluhAgamaPNS,u');
    Route::post('update_penyuluhbuddha/{value}',[PenyuluhPnsController::class,'update_penyuluh_buddha'])->middleware('role:layagama_PenyuluhAgamaPNS,u');
    Route::post('update_penyuluhkhonghucu/{value}',[PenyuluhPnsController::class,'update_penyuluh_khonghucu'])->middleware('role:layagama_PenyuluhAgamaPNS,u');

     // ---------------- Penyuluh Agama PNS ----------------------------------------------
     Route::get('penyuluh_nonpns', [ PenyuluhNonPnsController::class, "index"])->name('penyuluh_nonpns')->middleware('role:layagama_PenyuluhAgamaNonPNS,l');
     Route::post('update_non_penyuluhislam/{value}',[PenyuluhNonPnsController::class,'update_non_penyuluh_islam'])->middleware('role:layagama_PenyuluhAgamaNonPNS,u');
     Route::post('update_non_penyuluhkristen/{value}',[PenyuluhNonPnsController::class,'update_non_penyuluh_kristen'])->middleware('role:layagama_PenyuluhAgamaNonPNS,u');
     Route::post('update_non_penyuluhkatolik/{value}',[PenyuluhNonPnsController::class,'update_non_penyuluh_katolik'])->middleware('role:layagama_PenyuluhAgamaNonPNS,u');
     Route::post('update_non_penyuluhhindu/{value}',[PenyuluhNonPnsController::class,'update_non_penyuluh_hindu'])->middleware('role:layagama_PenyuluhAgamaNonPNS,u');
     Route::post('update_non_penyuluhbuddha/{value}',[PenyuluhNonPnsController::class,'update_non_penyuluh_buddha'])->middleware('role:layagama_PenyuluhAgamaNonPNS,u');
     Route::post('update_non_penyuluhkhonghucu/{value}',[PenyuluhNonPnsController::class,'update_non_penyuluh_khonghucu'])->middleware('role:layagama_PenyuluhAgamaNonPNS,u');


     // ---------------- Penyuluh Agama PNS ----------------------------------------------
     Route::get('penerima_tunjangan', [ TunjanganController::class, "index"])->name('penerima_tunjangan')->middleware('role:layagama_Tunjangan,l');
     Route::post('update_tunjangan/{value}',[TunjanganController::class,'update_tunjangan'])->middleware('role:layagama_Tunjangan,u');

     // ---------------- KUA----------------------------------------------
    Route::get('kua', [ KuaController::class, "index"])->name('kua')->middleware('role:layagama_Kua,l');
    Route::post('update_kua/{value}',[KuaController::class,'update_kua'])->middleware('role:layagama_Kua,u');
    Route::post('update_peristiwa/{value}',[KuaController::class,'update_peristiwa'])->middleware('role:layagama_Kua,u');

     // ---------------- WAKAF---------------------------------------------
     Route::get('wakaf', [ WakafController::class, "index"])->name('wakaf')->middleware('role:layagama_Wakaf,l');
     Route::post('update_wakaf/{value}',[WakafController::class,'update_wakaf'])->middleware('role:layagama_Wakaf,u');
    
     // ---------------- QORI DAN HAFIZ--------------------------------------------
     Route::get('qori_hafiz', [ QoriController::class, "index"])->name('qori_hafiz')->middleware('role:layagama_qori_hafiz,l');
     Route::post('update_qori/{value}',[QoriController::class,'update_qori'])->middleware('role:layagama_qori_hafiz,u');

    // ---------------- ORMAS--------------------------------------------
    Route::get('ormas', [ OrmasController::class, "index"])->name('ormas')->middleware('role:layagama_ormas,l');
    Route::post('update_ormas/{value}',[OrmasController::class,'update_ormas'])->middleware('role:layagama_ormas,u');


    // ===================================== Layanan PHU =========================================== 


     // ---------------- KUOTA JAMAAH HAJI-------------------------------------------
     Route::get('kuota_haji', [ KuotaController::class, "index"])->name('kuota_haji')->middleware('role:layphu_kuota,l');
     Route::post('update_kuota/{value}',[KuotaController::class,'update_kuota'])->middleware('role:layphu_kuota,u');
   

     // ---------------- DAFTAR TUNGGU JAMAAH HAJI-------------------------------------------
     Route::get('daftartunggu', [ TungguController::class, "index"])->name('daftartunggu')->middleware('role:layphu_pendaftaran,l');
     Route::post('update_daftartunggu/{value}',[TungguController::class,'update_daftartunggu'])->middleware('role:layphu_pendaftaran,u');
   
    // ---------------- DATA  JAMAAH HAJI-------------------------------------------
    Route::get('jemaah_haji', [ JemaahController::class, "index"])->name('jemaah_haji')->middleware('role:layphu_jemaah,l');
    Route::post('update_jemaah/{value}',[JemaahController::class,'update_jemaah'])->middleware('role:layphu_jemaah,u');
  

    // ---------------- DATA  DAFTAR BARU JAMAAH HAJI-------------------------------------------
    Route::get('daftarbaru', [ DaftarbaruController::class, "index"])->name('daftarbaru')->middleware('role:layphu_daftarbaru,l');
    Route::post('update_daftarbaru/{value}',[DaftarbaruController::class,'update_daftarbaru'])->middleware('role:layphu_daftarbaru,u');
  
     // ---------------- DATA  KBIHU-------------------------------------------
     Route::get('kbihu', [ KbihuController::class, "index"])->name('kbihu')->middleware('role:layphu_kbihu,l');
     Route::post('update_kbihu/{value}',[KbihuController::class,'update_kbihu'])->middleware('role:layphu_kbihu,u');


       // ---------------- DATA  PETUGAS------------------------------------------
       Route::get('petugas', [ PetugasController::class, "index"])->name('petugas')->middleware('role:layphu_petugas,l');
       Route::post('update_petugas/{value}',[PetugasController::class,'update_petugas'])->middleware('role:layphu_petugas,u');
   

       // ===================================== Layanan TATA KELOLA & DUKUNGAN MANAJEMEN =========================================== 


     // ---------------- ADMINISTRASI WILAYAH ------------------------------------------
     Route::get('wiladm', [ WilayahController::class, "index"])->name('wiladm')->middleware('role:laytatakelola_wiladm,l');
     Route::post('update_wilayah/{value}',[WilayahController::class,'update_wilayah'])->middleware('role:laytatakelola_wiladm,u');
    
     // ---------------- PNS -----------------------------------------
     Route::get('pns', [ PnsController::class, "index"])->name('pns')->middleware('role:laytatakelola_pns,l');
     Route::post('update_pns/{value}',[PnsController::class,'update_pns'])->middleware('role:laytatakelola_pns,u'); 
     
     // ---------------- PENSIUNAN-----------------------------------------
     Route::get('pensiun', [ PensiunanController::class, "index"])->name('pensiun')->middleware('role:laytatakelola_pensiun,l');
     Route::post('update_pensiun/{value}',[PensiunanController::class,'update_pensiun'])->middleware('role:laytatakelola_pensiun,u');
   
    // ---------------- PNS NAIK PANGKAT-----------------------------------------
    Route::get('naik_pangkat', [ NaikpangkatController::class, "index"])->name('naik_pangkat')->middleware('role:laytatakelola_pns_pangkat,l');
    Route::post('update_naikpangkat/{value}',[NaikpangkatController::class,'update_naikpangkat'])->middleware('role:laytatakelola_pns_pangkat,u');
  
    // ---------------- PNS IJIN BELAJAR----------------------------------------
    Route::get('ijin_belajar', [ IjinbelajarController::class, "index"])->name('ijin_belajar')->middleware('role:laytatakelola_pns_ijinbelajar,l');
    Route::post('update_ijinbelajar/{value}',[IjinbelajarController::class,'update_ijinbelajar'])->middleware('role:laytatakelola_pns_ijinbelajar,u');
  
    // ---------------- NON PNS / Honorer----------------------------------------
    Route::get('honorer', [ NonpnsController::class, "index"])->name('honorer')->middleware('role:laytatakelola_honorer,l');
    Route::post('update_honorer/{value}',[NonpnsController::class,'update_honorer'])->middleware('role:laytatakelola_honorer,u');

    // ---------------- PTSP dan FKUB----------------------------------------
    Route::get('ptsp', [ PtspController::class, "index"])->name('ptsp')->middleware('role:laytatakelola_ptsp,l');
    Route::post('update_ptsp/{value}',[PtspController::class,'update_ptsp'])->middleware('role:laytatakelola_ptsp,u');
    Route::post('update_fkub/{value}',[PtspController::class,'update_fkub'])->middleware('role:laytatakelola_ptsp,u');

     // ---------------- ANGGARAN DAN BMN---------------------------------------
     Route::get('bmn', [ BmnController::class, "index"])->name('bmn')->middleware('role:laytatakelola_bmn,l');
     Route::post('update_anggaran/{value}',[BmnController::class,'update_anggaran'])->middleware('role:laytatakelola_bmn,u');
     Route::post('update_program/{value}',[BmnController::class,'update_realisasi_program'])->middleware('role:laytatakelola_bmn,u');
     Route::post('update_belanja/{value}',[BmnController::class,'update_realisasi_belanja'])->middleware('role:laytatakelola_bmn,u');
     Route::post('update_dana/{value}',[BmnController::class,'update_realisasi_dana'])->middleware('role:laytatakelola_bmn,u');
     Route::post('update_bmn/{value}',[BmnController::class,'update_bmn'])->middleware('role:laytatakelola_bmn,u');



});

