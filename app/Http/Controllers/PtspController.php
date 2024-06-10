<?php

/*==============================================================

    NAMA CONTROLLER : PtspCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 23 April 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle PTSP dan FKUB Controller

    ===============================================================*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Ptsp;
use App\Models\Fkub;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PtspController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $satker = Unit::all();
        $satker_kantor = Unit::whereIn('kd_satker',['kanwil','pkp','bangka','bateng','babar','basel','belitung','beltim'])->get();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $ptsp= Ptsp::where('tahun',$tahun)->first();
        $fkub= Fkub::where('tahun',$tahun)->first();

        if(is_null($ptsp))
        {
            foreach ($satker as $satkers) {
                $temp = new Ptsp;
                $temp->id_satker= $satkers->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        if(is_null($fkub))
        {
            foreach ($satker_kantor as $skantor) {
                $temp = new Fkub;
                $temp->id_satker= $skantor->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }
       
        $dataptsp_dibentuk= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,ada,tidak from tb_unitkerja k left join tb_lay_ptsp p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $dataptsp_jenislay= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,elektronik,manual from tb_unitkerja k left join tb_lay_ptsp p on k.id=p.id_satker where kd_satker in ("kanwil","pkp","bangka","bateng","babar","basel","belitung","beltim") and tahun="'.$tahun.'"');
        $datafkub= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,fkub,sekber, sadar_kerukunan from tb_unitkerja k left join tb_fkub p on k.id=p.id_satker where tahun="'.$tahun.'"');
        
        return view('pages.tatakelola.ptsp',compact('dataptsp_dibentuk','dataptsp_jenislay','datafkub','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_ptsp(Request $request, Ptsp $ptsp, $data)
    {
        if($request->ajax()){
            $ptsp->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

    public function update_fkub(Request $request, Fkub $fkub, $data)
    {
        if($request->ajax()){
            $fkub->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

}

