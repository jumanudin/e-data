<?php

/*==============================================================

    NAMA CONTROLLER : PetugasCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 18 April 2024
    TANGGAL SELESAI : 18 April 2024
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Petugas Controller

    ===============================================================*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Petugas;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $petugas= Petugas::where('tahun',$tahun)->first();
        if(is_null($petugas))
        {
            foreach ($kab as $kabs) {
                $temp = new Petugas;
                $temp->id_wilayah = $kabs->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datajeniskelamin= DB::select('select k.id as idx,p.id as id, k.nama as nama,pria, wanita from kabkota k left join tb_petugas p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datapendidikan= DB::select('select k.id as idx,p.id as id, k.nama as nama,kurang_s1,s1,s2,s3 from kabkota k left join tb_petugas p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datapasspor= DB::select('select k.id as idx,p.id as id, k.nama as nama,passpor from kabkota k left join tb_petugas p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

        return view('pages.phu.petugas',compact('datajeniskelamin','datapendidikan','datapasspor','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_petugas(Request $request, Petugas $petugas, $data)
    {
        if($request->ajax()){
            $petugas->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

}
