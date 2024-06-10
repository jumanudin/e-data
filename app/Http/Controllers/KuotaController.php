<?php

/*==============================================================

    NAMA CONTROLLER : KuotaCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 17 April 2024
    TANGGAL SELESAI : 17 April 2024
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Daftar Tunggu Jemaah Haji Controller

    ===============================================================*/

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Kuotahaji;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KuotaController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
        $tahunmin1=$tempstruk->tahun_priode-1;
        $tahunmin2=$tempstruk->tahun_priode-2;
        $tahunmin3=$tempstruk->tahun_priode-3;
        $tahunmin4=$tempstruk->tahun_priode-4;

        $kuota= Kuotahaji::first();
        if(is_null($kuota))
        {
            foreach ($kab as $kabs) {
                $temp = new Kuotahaji;
                $temp->id_wilayah = $kabs->id;
                $temp->passpor=0;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datakuota = DB::select('select k.id as idx,p.id as id, k.nama as nama,`'.$tahun.'` as tahun,`'.$tahunmin1.'` as tahunmin1,`'.$tahunmin2.'` as tahunmin2,`'.$tahunmin3.'` as tahunmin3 ,`'.$tahunmin4.'` as tahunmin4 from kabkota k left join tb_kuota p on k.id=p.id_wilayah ');
        

        return view('pages.phu.kuota',compact('datakuota','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_kuota(Request $request, Kuotahaji $kuotahaji, $data)
    {
        if($request->ajax()){
            $kuotahaji->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 
}
