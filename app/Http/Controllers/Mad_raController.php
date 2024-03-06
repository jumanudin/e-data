<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Tb_gmadrasah;
use App\Models\Tb_madrasah;
use App\Models\Tb_akra;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class Mad_raController extends Controller
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
        $mad = Tb_madrasah::where('tahun',$tempstruk->tahun_periode)->first();
        if(is_null($mad))
        {
            foreach ($kab as $kabs) {
                $temp = new Tb_madrasah;
                $temp->id_wilayah = $kabs->id;
                $temp->ra =0;
                $temp->min =0;
                $temp->mis =0;
                $temp->mtsn =0;
                $temp->mtss =0;
                $temp->man =0;
                $temp->mas =0;
                $temp->tahun = $tempstruk->tahun_periode;
                $temp->username = $user->username;
                $temp->save();
            }
        }
        if ($request->ajax()) {
            $madstruk = Tb_madrasah::leftJoin('Kabkota','Kabkota.id','=','tb_madrasah.id_wilayah')
            ->select('Tb_madrasah.*','Kabkota.id as idx','Kabkota.nama as nama')->where('tahun',$tempstruk->tahun_periode)->get();
            return Datatables::of($madstruk)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a role="button" href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-primary"><i class="fas fa-16px fa-pen"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }        
        return view('pages.madrasah.mad_data',compact('tempstruk'))
        ->with('i', (request()->input('page', 1) - 1) * 10);    
    }

    public function edit(Request $request)
    {
        $cari = array('Tb_madrasah.id' => $request->id);
        $mad = Tb_madrasah::leftJoin('Kabkota','Kabkota.id','=','Tb_madrasah.id_wilayah')
                ->select('Tb_madrasah.*','Kabkota.id as idx','Kabkota.nama as nama')->where($cari)->first();
                return response()->json($mad);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $mad   =   Tb_madrasah::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'ra' => $request->ra,
                'min' => $request->min,
                'mis' => $request->mis,
                'mtsn' => $request->mtsn,
                'mtss' => $request->mtss,
                'man' => $request->man,
                'mas' => $request->mas,
                'username' => $user->username,
            ]);        
        $log = Helper::create_log('Modul Layanan Madrasah RA','Update Data Jumlah RA',$mad);           
        $log->save();    
        return response()->json(['success' => true]);
    }


    public function index_akra(Request $request )
    {
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $akra = Tb_akra::where('tahun',$tempstruk->tahun_periode)->first();
        if(is_null($akra))
        {
            foreach ($kab as $kabs) {
                $temp = new Tb_akra;
                $temp->id_wilayah = $kabs->id;
                $temp->a =0;
                $temp->b =0;
                $temp->c =0;
                $temp->belum=0;
                $temp->tahun = $tempstruk->tahun_periode;
                $temp->username = $user->username;
                $temp->save();
            }
        }
        if ($request->ajax()) {
            $madstruk = Tb_akra::leftJoin('Kabkota','Kabkota.id','=','tb_akra.id_wilayah')
            ->select('Tb_akra.*','Kabkota.id as idx','Kabkota.nama as nama')
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
    public function edit_akra(Request $request)
    {
        $cari = array('Tb_akra.id' => $request->id);
        $mad = Tb_akra::leftJoin('Kabkota','Kabkota.id','=','Tb_akra.id_wilayah')
                ->select('Tb_akra.*','Kabkota.id as idx','Kabkota.nama as nama')
                ->where($cari)->first();
                return response()->json($mad);
    }    
    public function update_akra(Request $request)
    {
        $user  =   Auth::user(); 
        $mad   =   Tb_akra::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'a' => $request->a,
                'b' => $request->b,
                'c' => $request->c,
                'belum' => $request->belum,
                'username' => $user->username,
            ]);        
        $log = Helper::create_log('Modul Layanan Madrasah RA','Update Data Akreditasi RA',$mad);           
        $log->save();    
        return response()->json(['success' => true]);
    }
    public function index_gra(Request $request )
    {
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $gra = Tb_gmadrasah::where('tahun',$tempstruk->tahun_periode)->first();
        if(is_null($gra))
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
    public function edit_gra(Request $request)
    {
        $cari = array('Tb_gmadrasah.id' => $request->id);
        $mad = Tb_gmadrasah::leftJoin('Kabkota','Kabkota.id','=','Tb_gmadrasah.id_wilayah')
                ->select('Tb_gmadrasah.*','Kabkota.id as idx','Kabkota.nama as nama')->where($cari)->first();
                return response()->json($mad);
    } 
    public function update_gra(Request $request)
    {
        $user  =   Auth::user(); 
        $mad   =   Tb_gmadrasah::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'ra' => $request->ra_pria + $request->ra_wanita,
                'ra_pria' => $request->ra_pria,
                'ra_wanita' => $request->ra_wanita,
                'ra_pns' => $request->ra_pns,
                'ra_nonpns' => $request->ra_nonpns,
                'ra_belums1' => $request->ra_belums1,
                'ra_s1' => $request->ra_s1,
                'ra_s2' => $request->ra_s2,
                'ra_s3' => $request->ra_s3,
                'username' => $user->username,
            ]);        
        $log = Helper::create_log('Modul Layanan Madrasah RA','Update Data Status Guru RA',$mad);           
        $log->save();    
        return response()->json(['success' => true]);
    }          
}
