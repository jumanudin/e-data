<?php
/*==============================================================

    NAMA CONTROLLER : DaftarbaruCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 18 April 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Daftarbaru  Controller

    ===============================================================*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Daftarbaru;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarbaruController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $daftarbaru= Daftarbaru::where('tahun',$tahun)->first();
        if(is_null($daftarbaru))
        {
            foreach ($kab as $kabs) {
                $temp = new Daftarbaru;
                $temp->id_wilayah = $kabs->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $datadaftarbarukelamin= DB::select('select k.id as idx,p.id as id, k.nama as nama,pria,wanita from kabkota k left join tb_daftarbaru p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $databatal= DB::select('select k.id as idx,p.id as id, k.nama as nama,batal_pria,batal_wanita from kabkota k left join tb_daftarbaru p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datapengalaman= DB::select('select k.id as idx,p.id as id, k.nama as nama,belum,sudah from kabkota k left join tb_daftarbaru p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datapendidikan= DB::select('select k.id as idx,p.id as id, k.nama as nama,sd,sltp,slta,d1_d3,s1,s2,s3,lainnya from kabkota k left join tb_daftarbaru p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datausia= DB::select('select k.id as idx,p.id as id, k.nama as nama,kurang_18,rentang_18_50,rentang_51_65,rentang_66_75,lebih_75 from kabkota k left join tb_daftarbaru p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datapekerjaan= DB::select('select k.id as idx,p.id as id, k.nama as nama,pns,tni_polri,niaga,tani,swasta,irt,pelajar,bumn_bumd,pensiun,lain_lain from kabkota k left join tb_daftarbaru p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

        return view('pages.phu.daftarbaru',compact('datadaftarbarukelamin','datapendidikan','databatal','datausia','datapekerjaan','datapengalaman','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_daftarbaru(Request $request, Daftarbaru $daftarbaru, $data)
    {
        if($request->ajax()){
            $daftarbaru->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 
}