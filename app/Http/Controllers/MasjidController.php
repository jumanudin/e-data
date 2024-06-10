<?php
/*==============================================================

    NAMA CONTROLLER : MasjidCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 15 Maret 2024
    TANGGAL SELESAI : 15 Maret 2024
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Tipologi Masjid Controller

    ===============================================================*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Masjid;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MasjidController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
        $masjid= Masjid::where('tahun',$tahun)->first();
        if(is_null($masjid))
        {
            foreach ($kab as $kabs) {
                $temp = new Masjid;
                $temp->id_wilayah = $kabs->id;
                $temp->ngr=0;
                $temp->raya=0;
                $temp->agung=0;
                $temp->besar=0;
                $temp->jamik=0;
                $temp->sejarah=0;
                $temp->umum=0;
                $temp->nasional=0;
                $temp->masjid=0;
                $temp->musholla=0;
                $temp->tahun = $tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, ngr, raya, agung,besar,jamik,sejarah,umum,nasional,masjid,musholla from kabkota k left join tb_tipo_masjid p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        return view('pages.keagamaan.tipologi_masjid',compact('data','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

    public function tampil_tipomasjid($tahun){
        
        $data=DB::select('select k.id as idx,p.id as id, k.nama as nama, ngr, raya, agung,besar,jamik,sejarah,umum,nasional,masjid,musholla from kabkota k left join tb_tipo_masjid p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
    }

    public function update_tipoMasjid(Request $request, Masjid $masjid, $data)
    {
        if($request->ajax()){
            $masjid->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    }

}
