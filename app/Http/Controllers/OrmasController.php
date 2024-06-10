<?php

/*==============================================================

    NAMA CONTROLLER : OrmasCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 24 April 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Organisasi Masyarakat Controller

    ===============================================================*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Ormas;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrmasController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kabkota = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $ormas= Ormas::where('tahun',$tahun)->first();
        
        if(is_null($ormas))
        {
            foreach ($kabkota as $kota) {
                $temp = new Ormas;
                $temp->id_wilayah= $kota->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        
       
        $data_ormas= DB::select('select k.id as idx,p.id as id, k.nama as nama,islam,kristen,katolik,hindu,buddha,khonghucu from kabkota k left join tb_ormas p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        return view('pages.keagamaan.ormas',compact('data_ormas','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_ormas(Request $request, Ormas $ormas, $data)
    {
        if($request->ajax()){
            $ormas->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

}

