<?php

/*==============================================================

    NAMA CONTROLLER : RumahibadahCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 11 Maret 2024
    TANGGAL SELESAI : 11 Maret 2024
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Jumlah Penduduk Controller

    ===============================================================*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\RumahIbadah;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RumahibadahController extends Controller
{
    public function index(){

        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
        $tahunlalu = RumahIbadah::where('tahun',$tahun)->first();
        if(is_null($tahunlalu))
        {
            foreach ($kab as $kabs) {
                $temp = new RumahIbadah;
                $temp->id_wilayah = $kabs->id;
                $temp->ngr=0;
                $temp->raya=0;
                $temp->agung=0;
                $temp->besar=0;
                $temp->jamik=0;
                $temp->bsjrh=0;
                $temp->umum=0;
                $temp->nas=0;
                $temp->masjid=0;
                $temp->musholla=0;
                $temp->gereja_kristen=0;
                $temp->gereja_katolik=0;
                $temp->pura = 0;
                $temp->vihara = 0;
                $temp->kelenteng = 0;
                $temp->tahun = $tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }
        $data = DB::select('select k.id as idx,r.id as id, k.nama as nama, masjid, musholla, gereja_kristen,gereja_katolik,pura,vihara,kelenteng from kabkota k left join tb_rmh_ibadah r on k.id=r.id_wilayah where tahun="'.$tahun.'"');
        return view('pages.keagamaan.rumah_ibadah',compact('data','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    public function tampil_rumahibadah($tahun){
        
        $data=DB::select('select k.id as idx,r.id as id, k.nama as nama, masjid, musholla, gereja_kristen,gereja_katolik,pura,vihara,kelenteng from kabkota k left join tb_rmh_ibadah r on k.id=r.id_wilayah where tahun="'.$tahun.'"');
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
    }

    public function update_data(Request $request, RumahIbadah $rumahibadah, $data)
    {
        if($request->ajax()){
            $rumahibadah->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    }
}
