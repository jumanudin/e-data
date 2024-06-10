<?php

/*==============================================================

    NAMA CONTROLLER : KuaCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 04 April  2024
    TANGGAL SELESAI : 05 April 2024
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle KUA Controller

    ===============================================================*/


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Kua;
use App\Models\Peristiwa;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KuaController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
        $kua= Kua::where('tahun',$tahun)->first();
        if(is_null($kua))
        {
            foreach ($kab as $kabs) {
                $temp = new Kua;
                $temp->id_wilayah = $kabs->id;
                $temp->type_a=0;
                $temp->type_b=0;
                $temp->type_c=0;
                $temp->type_d=0;
                $temp->type_d2=0;
                $temp->jml_serti=0;
                $temp->luas_serti=0;
                $temp->jml_belum=0;
                $temp->luas_belum=0;
                $temp->baik=0;
                $temp->rsk_ringan=0;
                $temp->rsk_sedang=0;
                $temp->rehab_ringan=0;
                $temp->rehab_berat=0;
                $temp->balai_nikah=0;
                $temp->peng_pertama=0;
                $temp->peng_muda=0;
                $temp->peng_madya=0;
                $temp->pembinaan_pertama=0;
                $temp->pembinaan_muda=0;
                $temp->pembinaan_madya=0;
                $temp->pembinaan_utama=0;
                $temp->peng_utama=0;
                $temp->tahun = $tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        $nikah= Peristiwa::where('tahun',$tahun)->first();
        if(is_null($nikah))
        {
            foreach ($kab as $kabs) {
                $temp = new Peristiwa;
                $temp->id_wilayah = $kabs->id;
                $temp->jan=0;
                $temp->feb=0;
                $temp->mar=0;
                $temp->apr=0;
                $temp->mei=0;
                $temp->jun=0;
                $temp->jul=0;
                $temp->ags=0;
                $temp->sep=0;
                $temp->okt=0;
                $temp->nov=0;
                $temp->des=0;
                $temp->kua=0;
                $temp->luar_kua=0;
                $temp->tahun = $tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datatipologi = DB::select('select k.id as idx,p.id as id, k.nama as nama, type_a,type_b,type_c,type_d,type_d2 from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datastatus = DB::select('select k.id as idx,p.id as id, k.nama as nama, jml_serti,jml_belum,baik,rsk_ringan,rsk_sedang from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datarevitalisasi = DB::select('select k.id as idx,p.id as id, k.nama as nama, rehab_ringan,rehab_berat from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $databalainikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, balai_nikah from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datapenghulu = DB::select('select k.id as idx,p.id as id, k.nama as nama, peng_pertama,peng_muda,peng_madya,peng_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datapenghuluDibina = DB::select('select k.id as idx,p.id as id, k.nama as nama, pembinaan_pertama,pembinaan_muda,pembinaan_madya,pembinaan_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datatempatNikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, kua,luar_kua from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $dataperistiwa = DB::select('select k.id as idx,p.id as id, k.nama as nama, jan,feb,mar,apr,mei,jun,jul,ags,sep,okt,nov,des from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $databukunikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, buku_nikah, kartu_nikah from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
       

        return view('pages.keagamaan.kua',compact('datatipologi','datastatus','datarevitalisasi','databalainikah','datapenghulu','datapenghuluDibina','datatempatNikah','dataperistiwa','databukunikah','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_kua(Request $request, Kua $kua, $data)
    {
        if($request->ajax()){
            $kua->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

    public function update_peristiwa(Request $request, Peristiwa $peristiwa, $data)
    {
        if($request->ajax()){
            $peristiwa->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 



}

