<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facadas\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Ts_master;
use App\Models\Ts_rinci;
use App\Models\Pegawai;
use App\Models\Panggol;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\Mata_Anggaran;
use Helper;
use DataTables;
class VerifikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();
        $veri = Ts_master::where('kirim',1)->orderBy('tgl','DESC')->get();
        return view('pages.verifikator.verifikator_data',compact('veri','totdraf','totsetuju','totrevisi','tottolak'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    public function show($id, Request $request)
    {
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();
        $decrypted = Crypt::decryptString($id);
        $veri = Ts_master::find($decrypted);
        $pegawai = Pegawai::all();
        $ts_rinci   = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')
                                ->leftJoin('pegawai','pegawai.nip','=','ts_rinci.nip')
                                ->where('id_rinci',$veri->id)
                                ->select('ts_rinci.*','unit.id as idx','unit.nama_unit as nama_unit','pegawai.image as image')->get();
        if ($request->ajax()) {
            return DataTables::of($ts_rinci)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a role="button" href="javascript:void(0)" onclick="open_modal('.$row->id.')" ><i class="fa fa-16px fa-trash text-red-500"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }         
        $verifikator = Pegawai::leftJoin('jabatan','jabatan.id','pegawai.kode_jabatan')->where('nip',$veri->verifikator)->first();
        return view('pages.verifikator.verifikator_show', compact('verifikator','pegawai','veri','totdraf','totsetuju','totrevisi','tottolak'));
    }
    public function update(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $validData = $request->validate([
            'status_verifikator'    => 'required',
            'note_verifikator'   => '', 
            'kirim' =>'',          
            'updated_at' =>  \Carbon\Carbon::now(),            
        ]);
        //$temp           = Kegiatan::create($validData);
        $kirim_cek = $request->kirim;
        if($kirim_cek ==1){
            $validData['kirim'] = 0;
        }else{
            $validData['kirim'] = 1;
        }
        $temp = Ts_master::find($descrypted);
                $temp->update($validData);
        $log = Helper::create_log('Modul Verifikator','Update Data Status TS',$temp);           
        $log->save();
        return redirect('verifikator')->with('success','data berhasil diperbaharui.');
    }
    public function viewrekom(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $data = Ts_master::find($descrypted);
        $gol = Panggol::all();
        $rinci = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')->where('id_rinci',$data->id)->get();
        return view('print.rekom',compact('data','rinci','gol'))->with('i');
    }
    public function view_dukung($id)
    {
        $user       = Auth::user();
        if($user->id_role<>4){
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();
        }else{    
        $totdraf    = Ts_master::where('status',0)->where('updated_by',$user->username)->count(); 
        $totsetuju  = Ts_master::where('status',1)->where('updated_by',$user->username)->count(); 
        $totrevisi  = Ts_master::where('status',2)->where('updated_by',$user->username)->count();
        $tottolak   = Ts_master::where('status',3)->where('updated_by',$user->username)->count();
        }
        $decrypted = Crypt::decryptString($id);    
        $data = Ts_master::find($decrypted);   
        return view('pages.ts_master.dukung_view', compact('data','totdraf','totsetuju','totrevisi','tottolak'));
    }  
}
