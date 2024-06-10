<?php

/*==============================================================

    NAMA CONTROLLER : IjinbelajarCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 23 April 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle PNS Ijin Belajar Controller

    ===============================================================*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Ijinbelajar;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IjinbelajarController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $satker = Unit::whereIn('kd_satker',['kanwil','pkp','bangka','bateng','babar','basel','belitung','beltim'])->get();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $ijinbelajar= Ijinbelajar::where('tahun',$tahun)->first();
        if(is_null($ijinbelajar))
        {
            foreach ($satker as $satkers) {
                $temp = new Ijinbelajar;
                $temp->id_satker= $satkers->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_ijinbljr p on k.id=p.id_satker where tahun="'.$tahun.'"');
        
        return view('pages.tatakelola.ijinbelajar',compact('datapns_kualifikasi','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_ijinbelajar(Request $request, Ijinbelajar $ijinbelajar, $data)
    {
        if($request->ajax()){
            $ijinbelajar->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

}
