<?php

/*==============================================================

    NAMA CONTROLLER : WakafCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 05 April  2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Wakaf Controller

    ===============================================================*/


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Wakaf;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WakafController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
        $wakaf= Wakaf::where('tahun',$tahun)->first();
        if(is_null($wakaf))
        {
            foreach ($kab as $kabs) {
                $temp = new Wakaf;
                $temp->id_wilayah = $kabs->id;
                $temp->jml_serti=0;
                $temp->luas_serti=0;
                $temp->jml_belum=0;
                $temp->luas_belum=0;
                $temp->masjid=0;
                $temp->mushalla=0;
                $temp->sekolah=0;
                $temp->pesantren=0;
                $temp->makam=0;
                $temp->sosial_lain=0;
                $temp->perkebunan=0;
                $temp->koperasi=0;
                $temp->rumah_sakit=0;
                $temp->rumah_sewa=0;
                $temp->perikanan=0;
                $temp->toko_sewa=0;
                $temp->pertanian=0;
                $temp->spbu=0;
                $temp->perkantoran_sewa=0;
                $temp->klinik=0;
                $temp->peternakan=0;
                $temp->lainnya=0;
                $temp->tahun = $tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datastatuswakaf = DB::select('select k.id as idx,p.id as id, k.nama as nama, jml_serti,luas_serti,jml_belum,luas_belum from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datawakafmanfaat = DB::select('select k.id as idx,p.id as id, k.nama as nama, masjid,mushalla,sekolah,pesantren,makam,sosial_lain from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datawakafproduktif = DB::select('select k.id as idx,p.id as id, k.nama as nama,perkebunan,koperasi,rumah_sakit,rumah_sewa,perikanan,toko_sewa,pertanian,spbu,perkantoran_sewa,klinik,peternakan,lainnya from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

        return view('pages.keagamaan.wakaf',compact('datastatuswakaf','datawakafmanfaat','datawakafproduktif','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_wakaf(Request $request, Wakaf $wakaf, $data)
    {
        if($request->ajax()){
            $wakaf->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

 



}

