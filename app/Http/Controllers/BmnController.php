<?php

/*==============================================================

    NAMA CONTROLLER : BmnCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 24 April 2024
    TANGGAL SELESAI : 24 April 2024
    TANGGAL UPDATE  : 07 Mei 2024
    KET UPDATE      : Nambah Tab Realasisasi Berdasarkan Program, 
                      Sumber Dana dan Jenis Belanja
                      

    FUNGSI          : Untuk Menghandle Anggaran dan BMN Controller

    ===============================================================*/
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Unitprogram;
use App\Models\Kabkota;
use App\Models\Program;
use App\Models\JenisBelanja;
use App\Models\SumberDana;
use App\Models\RealisasiProgram;
use App\Models\RealisasiBelanja;
use App\Models\RealisasiSumberdana;
use App\Models\Bmn;
use App\Models\Anggaran;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BmnController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $program = Unitprogram::all();
        $kabkota = Kabkota::all();
        $program_anggaran = Program::all();
        $jenis_belanja = JenisBelanja::all();
        $sumber_dana = SumberDana::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;

        $bmn= Bmn::where('tahun',$tahun)->first();
        $anggaran= Anggaran::where('tahun',$tahun)->first();
        $realisasi_program= RealisasiProgram::where('tahun',$tahun)->first();
        $realisasi_belanja= RealisasiBelanja::where('tahun',$tahun)->first();
        $realisasi_sumberdana= RealisasiSumberdana::where('tahun',$tahun)->first();

        if(is_null($bmn))
        {
            foreach ($kabkota as $kota) {
                $temp = new Bmn;
                $temp->id_wilayah= $kota->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        if(is_null($anggaran))
        {
            foreach ($program as $programs) {
                $temp = new Anggaran;
                $temp->id_unitprogram= $programs->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        if(is_null($realisasi_program))
        {
            foreach ($program_anggaran as $programs) {
                $temp = new RealisasiProgram;
                $temp->id_program= $programs->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        if(is_null($realisasi_belanja))
        {
            foreach ($jenis_belanja as $belanja) {
                $temp = new RealisasiBelanja;
                $temp->id_belanja= $belanja->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

        if(is_null($realisasi_sumberdana))
        {
            foreach ($sumber_dana as $sumberdana) {
                $temp = new RealisasiSumberdana;
                $temp->id_dana= $sumberdana->id;
                $temp->tahun=$tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }
        $databmn= DB::select('select k.id as idx,p.id as id, k.nama as nama,lok_baik,lok_rusak_ringan,lok_rusak_berat,ged_baik,ged_rusak_ringan,ged_rusak_berat from kabkota k left join tb_bmn p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_anggaran= DB::select('select k.id as idx,p.id as id, k.nama_program as nama,pagu_awal,pagu_akhir,anggaran,realisasi,persentase from tb_unitprogram k left join tb_anggaran p on k.id=p.id_unitprogram where tahun="'.$tahun.'"');
        $data_realisasiprogram= DB::select('select k.id as idx,p.id as id, k.program as nama,pagu,realisasi from tb_program k left join tb_realisasi_program p on k.id=p.id_program where tahun="'.$tahun.'"');
        $data_realisasisumberdana= DB::select('select k.id as idx,p.id as id, k.sumber_dana as nama,pagu,realisasi from tb_sumberdana k left join tb_realisasi_dana p on k.id=p.id_dana where tahun="'.$tahun.'"');
        $data_realisasibelanja= DB::select('select k.id as idx,p.id as id, k.jenis_belanja as nama,pagu,realisasi from tb_jenis_belanja k left join tb_realisasi_belanja p on k.id=p.id_belanja where tahun="'.$tahun.'"');
       
        return view('pages.tatakelola.bmn',compact('data_realisasibelanja','data_realisasisumberdana','data_realisasiprogram','databmn','data_anggaran','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_anggaran(Request $request, Anggaran $anggaran, $data)
    {
        if($request->ajax()){
            $anggaran->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 


    // ============ Update Realisasi Program ===================
    public function update_realisasi_program(Request $request, RealisasiProgram $realisasi_program, $data)
    {
        if($request->ajax()){
            $realisasi_program->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

    // ============ Update Realisasi Jenis Belanja ===================
    public function update_realisasi_belanja(Request $request, RealisasiBelanja $realisasi_belanja, $data)
    {
        if($request->ajax()){
            $realisasi_belanja->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

    // ============ Update Realisasi Sumber Dana ===================
    public function update_realisasi_dana(Request $request, RealisasiSumberdana $realisasi_dana, $data)
    {
        if($request->ajax()){
            $realisasi_dana->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

    public function update_bmn(Request $request, Bmn $bmn, $data)
    {
        if($request->ajax()){
            $bmn->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 

}

