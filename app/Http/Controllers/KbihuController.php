<?php

/*==============================================================

    NAMA CONTROLLER : KbihuCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 18 April 2024
    TANGGAL SELESAI : 18 April 2024
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle KBIHU Controller

    ===============================================================*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Kbihu;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KbihuController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $kbihu= Kbihu::where('tahun',$tahun)->first();
        if(is_null($kbihu))
        {
            foreach ($kab as $kabs) {
                $temp = new Kbihu;
                $temp->id_wilayah = $kabs->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datakbihu= DB::select('select k.id as idx,p.id as id, k.nama as nama,pihk,ppiu,kbihu from kabkota k left join tb_kbihu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

        return view('pages.phu.kbihu',compact('datakbihu','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_kbihu(Request $request, Kbihu $kbihu, $data)
    {
        if($request->ajax()){
            $kbihu->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

}
