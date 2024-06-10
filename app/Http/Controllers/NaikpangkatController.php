<?php

/*==============================================================

    NAMA CONTROLLER : NaikpangkatCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 23 April 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle PNS Naik Pangkat Controller

    ===============================================================*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Naikpangkat;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class NaikpangkatController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $satker = Unit::whereIn('kd_satker',['kanwil','pkp','bangka','bateng','babar','basel','belitung','beltim'])->get();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $naikpangkat= Naikpangkat::where('tahun',$tahun)->first();
        if(is_null($naikpangkat))
        {
            foreach ($satker as $satkers) {
                $temp = new Naikpangkat;
                $temp->id_satker= $satkers->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datapns_jkgol= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        

        return view('pages.tatakelola.naikpangkat',compact('datapns_jkgol','datapns_kualifikasi','datapns_agama','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_naikpangkat(Request $request, Naikpangkat $naikpangkat, $data)
    {
        if($request->ajax()){
            $naikpangkat->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

}
