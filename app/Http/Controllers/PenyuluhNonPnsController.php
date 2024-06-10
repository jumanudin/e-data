<?php

/*==============================================================

    NAMA CONTROLLER : PenyuluhNonPnsCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 4 April 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Penyuluh PNS Controller

    ===============================================================*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\PenyuluhIslam;
use App\Models\PenyuluhKristen;
use App\Models\PenyuluhKatolik;
use App\Models\PenyuluhHindu;
use App\Models\PenyuluhBuddha;
use App\Models\PenyuluhKhonghucu;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PenyuluhNonPnsController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
     

        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, nonpns_pria,nonpns_wanita,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_islam p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datakristen=DB::select('select k.id as idx,p.id as id, k.nama as nama, nonpns_pria,nonpns_wanita ,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_kristen p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datakatolik=DB::select('select k.id as idx,p.id as id, k.nama as nama, nonpns_pria,nonpns_wanita ,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_katolik p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datahindu=DB::select('select k.id as idx,p.id as id, k.nama as nama, nonpns_pria,nonpns_wanita ,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_hindu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $databuddha=DB::select('select k.id as idx,p.id as id, k.nama as nama, nonpns_pria,nonpns_wanita ,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_buddha p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datakhonghucu=DB::select('select k.id as idx,p.id as id, k.nama as nama, nonpns_pria,nonpns_wanita ,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_khonghucu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
       

        return view('pages.keagamaan.penyuluh_nonpns',compact('data','datakristen','datakatolik','datahindu','databuddha','datakhonghucu','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_penyuluh_islam(Request $request, PenyuluhIslam $penyuluhislam, $data)
    {
        if($request->ajax()){
            $penyuluhislam->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

    public function update_penyuluh_kristen(Request $request, PenyuluhKristen $penyuluhkristen, $data)
    {
        if($request->ajax()){
            $penyuluhkristen->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

    public function update_penyuluh_katolik(Request $request, PenyuluhKatolik $penyuluhkatolik, $data)
    {
        if($request->ajax()){
            $penyuluhkatolik->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    }

    public function update_penyuluh_hindu(Request $request, PenyuluhHindu $penyuluhhindu, $data)
    {
        if($request->ajax()){
            $penyuluhhindu->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    }

    public function update_penyuluh_buddha(Request $request, PenyuluhBuddha $penyuluhbuddha, $data)
    {
        if($request->ajax()){
            $penyuluhbuddha->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    }

    public function update_penyuluh_khonghucu(Request $request, PenyuluhKhonghucu $penyuluhkhonghucu, $data)
    {
        if($request->ajax()){
            $penyuluhkhonghucu->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    }


}
