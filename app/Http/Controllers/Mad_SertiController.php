<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Tb_gser;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class Mad_SertiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $gser = Tb_gser::where('tahun',$tempstruk->tahun_periode)->first();
        if(is_null($gser))
        {
            foreach ($kab as $kabs) {
                $temp = new Tb_gser;
                $temp->id_wilayah = $kabs->id;
                $temp->ra_ss=0;
                $temp->ra_bs=0;
                $temp->mi_ss=0;
                $temp->mi_bs=0;
                $temp->mts_ss=0;
                $temp->mts_bs=0;
                $temp->ma_ss=0;
                $temp->ma_bs=0;
                $temp->ts_ss=0;
                $temp->ts_bs=0;
                $temp->smak_ss=0;
                $temp->smak_bs=0;
                $temp->tahun = $tempstruk->tahun_periode;
                $temp->username = $user->username;
                $temp->save();
            }
        }
        if ($request->ajax()) {
            $madstruk = Tb_gser::leftJoin('Kabkota','Kabkota.id','=','Tb_gser.id_wilayah')
            ->select('Tb_gser.*','Kabkota.id as idx','Kabkota.nama as nama')->where('tahun',$tempstruk->tahun_periode)->get();
            return Datatables::of($madstruk)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a role="button" href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-primary"><i class="fas fa-16px fa-pen"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }        
        return view('pages.madrasah.gsertifikat_data',compact('tempstruk'))
        ->with('i', (request()->input('page', 1) - 1) * 10);    
    }

    public function edit(Request $request)
    {
        $cari = array('Tb_akmi.id' => $request->id);
        $mad = Tb_akmi::leftJoin('Kabkota','Kabkota.id','=','Tb_akmi.id_wilayah')
                ->select('Tb_akmi.*','Kabkota.id as idx','Kabkota.nama as nama')->where($cari)->first();
                return response()->json($mad);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $mad   =   Tb_akmi::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'akmin_a' => $request->akmin_a,
                'akmin_b' => $request->akmin_b,
                'akmin_c' => $request->akmin_c,
                'akmin_belum' => $request->akmin_belum,
                'akmis_a' => $request->akmis_a,
                'akmis_b' => $request->akmis_b,
                'akmis_c' => $request->akmis_c,
                'akmis_belum' => $request->akmis_belum,
                'username' => $user->username,
            ]);        
        $log = Helper::create_log('Modul Layanan Madrasah RA','Update Data Akreditasi MI',$mad);           
        $log->save();    
        return response()->json(['success' => true]);
    }

    public function index_gmi(Request $request )
    {
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $gmi = Tb_gmadrasah::where('tahun',$tempstruk->tahun_periode)->first();
        if(is_null($gmi))
        {
            foreach ($kab as $kabs) {
                $temp = new Tb_gmadrasah;
                $temp->id_wilayah = $kabs->id;
                $temp->ra =0;
                $temp->ra_pria =0;
                $temp->ra_wanita =0;
                $temp->ra_pns=0;
                $temp->ra_nonpns=0;
                $temp->ra_belums1=0;
                $temp->ra_s1=0;
                $temp->ra_s2=0;
                $temp->ra_s3=0;
                $temp->min=0;
                $temp->mis=0;
                $temp->mi_kurangs1=0;
                $temp->mi_s1=0;
                $temp->mi_s2=0;
                $temp->mi_s3=0;
                $temp->mi_pria=0;
                $temp->mi_wanita=0;
                $temp->mi_pns=0;
                $temp->mi_nonpns=0;
                $temp->mtsn=0;
                $temp->mtss=0;
                $temp->mts_kurangs1=0;
                $temp->mts_s1=0;
                $temp->mts_s2=0;
                $temp->mts_s3=0;
                $temp->mts_pria=0;
                $temp->mts_wanita=0;
                $temp->mts_pns=0;
                $temp->mts_nonpns=0;
                $temp->man=0;
                $temp->mas=0;
                $temp->ma_kurangs1=0;
                $temp->ma_s1=0;
                $temp->ma_s2=0;
                $temp->ma_s3=0;
                $temp->ma_pria=0;
                $temp->ma_wanita=0;
                $temp->ma_pns=0;
                $temp->ma_nonpns=0;
                $temp->tahun = $tempstruk->tahun_periode;
                $temp->username = $user->username;
                $temp->save();
            }
        }
        if ($request->ajax()) {
            $madstruk = Tb_gmadrasah::leftJoin('Kabkota','Kabkota.id','=','Tb_gmadrasah.id_wilayah')
            ->select('Tb_gmadrasah.*','Kabkota.id as idx','Kabkota.nama as nama')
            ->where('tahun',$tempstruk->tahun_periode)->get();
            return Datatables::of($madstruk)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a role="button" href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-primary"><i class="fas fa-16px fa-pen"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }    
    }
    public function edit_gmi(Request $request)
    {
        $cari = array('Tb_gmadrasah.id' => $request->id);
        $mad = Tb_gmadrasah::leftJoin('Kabkota','Kabkota.id','=','Tb_gmadrasah.id_wilayah')
                ->select('Tb_gmadrasah.*','Kabkota.id as idx','Kabkota.nama as nama')->where($cari)->first();
                return response()->json($mad);
    } 
    public function update_gmi(Request $request)
    {
        $user  =   Auth::user(); 
        $mad   =   Tb_gmadrasah::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'min' => $request->mi_pria + $request->mi_wanita,
                'mi_pria' => $request->mi_pria,
                'mi_wanita' => $request->mi_wanita,
                'mi_pns' => $request->mi_pns,
                'mi_nonpns' => $request->mi_nonpns,
                'mi_belums1' => $request->mi_belums1,
                'mi_s1' => $request->mi_s1,
                'mi_s2' => $request->mi_s2,
                'mi_s3' => $request->mi_s3,
                'username' => $user->username,
            ]);        
        $log = Helper::create_log('Modul Layanan Madrasah MI','Update Data Status Guru MI',$mad);           
        $log->save();    
        return response()->json(['success' => true]);
    }          
}
