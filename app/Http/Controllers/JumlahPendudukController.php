<?php
/*==============================================================

    NAMA CONTROLLER : JumlahPendudukCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 4 Maret 2024
    TANGGAL SELESAI : 11 Maret 2024
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Jumlah Penduduk Controller

    ===============================================================*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Tb_penduduk;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahPendudukController extends Controller
{
    public function index(Request $request)
    {
      
       

        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
        $penduduk= Tb_penduduk::where('tahun',$tahun)->first();
        if(is_null($penduduk))
        {
            foreach ($kab as $kabs) {
                $temp = new Tb_penduduk;
                $temp->id_wilayah = $kabs->id;
                $temp->islam=0;
                $temp->kristen=0;
                $temp->katolik=0;
                $temp->hindu=0;
                $temp->buddha=0;
                $temp->khonghucu=0;
                $temp->lainnya=0;
                $temp->tahun = $tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, islam, kristen, katolik,hindu,buddha,khonghucu,lainnya from kabkota k left join tb_penduduk p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        return view('pages.keagamaan.penduduk_data',compact('data','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);



    }

    public function tampil_jmlpenduduk($tahun){
        
        $data=DB::select('select k.id as idx,p.id as id, k.nama as nama, islam, kristen, katolik,hindu,buddha,khonghucu,lainnya from kabkota k left join tb_penduduk p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
    }

    public function update_jmlpenduduk(Request $request, Tb_penduduk $penduduk, $data)
    {
        if($request->ajax()){
            $penduduk->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    }



}