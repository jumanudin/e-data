<?php
/*==============================================================

    NAMA CONTROLLER : TunjanganCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 4 April 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Penyuluh Non PNS Penerima Tunjangan  Controller

    ===============================================================*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Tunjangan;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TunjanganController extends Controller
{
    public function index(Request $request)
    {
      
       

        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
        $tunjangan= Tunjangan::where('tahun',$tahun)->first();
        if(is_null($tunjangan))
        {
            foreach ($kab as $kabs) {
                $temp = new Tunjangan;
                $temp->id_wilayah = $kabs->id;
                $temp->islam=0;
                $temp->kristen=0;
                $temp->katolik=0;
                $temp->hindu=0;
                $temp->buddha=0;
                $temp->khonghucu=0;
                $temp->tahun = $tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, islam, kristen, katolik,hindu,buddha,khonghucu from kabkota k left join tb_penyuluh_tunjangan p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        return view('pages.keagamaan.penerima_tunjangan',compact('data','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);



    }

   
    public function update_tunjangan(Request $request, Tunjangan $tunjangan, $data)
    {
        if($request->ajax()){
            $tunjangan->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    }

}
