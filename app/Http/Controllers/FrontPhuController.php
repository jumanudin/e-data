<?php

/*==============================================================

    NAMA CONTROLLER : FrontPhuCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 10 Juni 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Front End Tampilan
                      Data Layanan PHU

    ===============================================================*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Unit;

// ------------ Kuota Haji ------------------
use App\Models\Kuotahaji;

// ------------ Daftar Tunggu Haji ----------
use App\Models\Tunggu;

// ---------------- Jemaah Haji --------------
use App\Models\Jemaah;

// ------------------- Daftar Baru -----------
use App\Models\Daftarbaru;

// ---------------- Petugas dan Passpor ------
use App\Models\Petugas;

// ------------ PIHK,PPIU dan KBIHU ----------
use App\Models\Kbihu;

use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class FrontPhuController extends Controller
{
    function __construct()
    {
        
        $this->tempstruk = Struktur::first();
        $this->tahun=$this->tempstruk->tahun_priode;
        $this->satker = Unit::whereIn('kd_satker',['kanwil','pkp','bangka','bateng','babar','basel','belitung','beltim'])->get();
        $this->kab = Kabkota::all();
       
        
    }  

 /*===================================================================================================

                                            FRONT END
                                            LAYANAN PHU : KUOTA JAMAAH HAJI
     
     
   ====================================================================================================*/
    
public function phu_kuotajemaah()
{
    $tahun=$this->tempstruk->tahun_priode;
    $tempstruk=$this->tempstruk;
    $tahunmin1=$this->tempstruk->tahun_priode-1;
    $tahunmin2=$this->tempstruk->tahun_priode-2;
    $tahunmin3=$this->tempstruk->tahun_priode-3;
    $tahunmin4=$this->tempstruk->tahun_priode-4;
    $datakuota = DB::select('select k.id as idx,p.id as id, k.nama as nama,`'.$tahun.'` as tahun,`'.$tahunmin1.'` as tahunmin1,`'.$tahunmin2.'` as tahunmin2,`'.$tahunmin3.'` as tahunmin3 ,`'.$tahunmin4.'` as tahunmin4 from kabkota k left join tb_kuota p on k.id=p.id_wilayah');
    $data_kuota = DB::select('select sum(`'.$tahun.'`) as tahun,sum(`'.$tahunmin1.'`) as tahunmin1,sum(`'.$tahunmin2.'`) as tahunmin2,sum(`'.$tahunmin3.'`) as tahunmin3 ,sum(`'.$tahunmin4.'`) as tahunmin4 from kabkota k left join tb_kuota p on k.id=p.id_wilayah');
   
    
    // ------------------------ Tingkatan Jabatan Penghulu KUA ------------------------

    foreach ($data_kuota as $kuota) {

        $datachart_kuota=array(
            $kuota->tahun,
            $kuota->tahunmin1,
            $kuota->tahunmin2,
            $kuota->tahunmin3,       
            $kuota->tahunmin4,       
            );
    }

    $datachart_katagori=[$tahun,$tahunmin1,$tahunmin2,$tahunmin3,$tahunmin4];
    return view('kuota',compact('datakuota','datachart_kuota','datachart_katagori','tempstruk'))->with('i',(request()->input('page',1) - 1) * 10);
}




}
