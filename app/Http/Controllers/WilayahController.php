<?php

/*==============================================================

    NAMA CONTROLLER : WilayahCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 19 April 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Wilayah Controller

    ===============================================================*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Wilayah;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WilayahController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $wilayah= Wilayah::where('tahun',$tahun)->first();
        if(is_null($wilayah))
        {
            foreach ($kab as $kabs) {
                $temp = new Wilayah;
                $temp->id_wilayah = $kabs->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datawilayah= DB::select('select k.id as idx,p.id as id, k.nama as nama,kecamatan, kelurahan, desa, luas from kabkota k left join wil_administrasi p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

        return view('pages.tatakelola.wiladm',compact('datawilayah','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_wilayah(Request $request, Wilayah $wilayah, $data)
    {
        if($request->ajax()){
            $wilayah->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

}
