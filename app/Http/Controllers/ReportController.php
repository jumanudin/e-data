<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Spd_master;
use App\Models\Spd_rinci;
use App\Models\Ts_master;
use App\Models\Kendaraan;
use App\Models\Ts_rinci;
use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\Panggol;
use Illuminate\Support\Carbon;
use DataTables;
use PDF;

class ReportController extends Controller
{
    public function index( Request $request)
    {
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();   
        Session::forget('Cari1');
        Session::forget('Cari2');
        if($request->session()->has('Cari1')) {
            $date1 =  $request->session()->get('Cari1');}
            else { $date1="9999-99-99";
        }              
        if($request->session()->has('Cari2')) {
            $date2 =  $request->session()->get('Cari2');}
            else { $date2="9999-99-99";
        }
        $master  = Spd_master::where('tgl_pergi',">=",$date1)
        ->Where('tgl_pergi',"<=",$date2)
        ->orWhere('tgl_pulang','>=',$date1)->where('tgl_pulang','<=',$date2)->get();
        $rinci = Spd_rinci::where('tgl_pergi',">=",$date1)->where('tgl_pergi',"<=",$date2)
        ->orWhere('tgl_pulang','>=',$date1)->where('tgl_pulang','<=',$date2)->get();
        $gol    = Panggol::all();  
        return view('print.monitoring',compact('gol','master','rinci','totdraf','totsetuju','totrevisi','tottolak'))
               ->with('i',(request()->input('page',1) - 1) * 10);
    }
    public function qtanggal(Request $request)
    {
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();  
        $kendaraan = Kendaraan::all();
        $user = Auth::user();
        $date1 = $request->tgl1;
        $date2 = $request->tgl2;
        if($date1==''|| $date2=='')
           {return redirect('report_spd')->with('success','data tgl tidak boleh kosong.');}
        
        $request->session()->put('Cari1',$date1);
        $request->session()->put('Cari2',$date2);
        $master  = Spd_master::where('tgl_pergi',">=",$date1)->where('tgl_pergi','<=',$date1)
                    ->orWhere('tgl_pulang',">=",$date1)->where('tgl_pulang','<=',$date2)->get();
        $rinci = Spd_rinci::leftJoin('pegawai','pegawai.nip','=','spd_rinci.nip')->leftJoin('unit','unit.id','=','spd_rinci.unit')
                    ->where('tgl_pergi',">=",$date1)->where('tgl_pergi','<=',$date2)
                    ->orWhere('tgl_pulang','>=',$date1)->where('tgl_pulang','<=',$date2)
                    ->select('spd_rinci.*','pegawai.image as imagex','pegawai.kode_golongan as golongan','unit.nama_unit')->get(); 
        $gol    = Panggol::all();        
        return view('print.monitoring',compact('kendaraan','gol','master','rinci','totdraf','totsetuju','totrevisi','tottolak'))
               ->with('i',(request()->input('page',1) - 1) * 10);
    }
    public function token( Request $request)
    {
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();   
        Session::forget('NoToken');         
        if($request->session()->has('NoToken')) {
            $token =  $request->session()->get('NoToken');}
            else { $token="!@#$%^&*()_+";
        }              

        $master  = Spd_master::Where('file_rekom',$token)->first();
        $rinci = Spd_rinci::Where('id_master',$master['id'])->get();
        $gol    = Panggol::all();  
        return view('print.token',compact('gol','master','rinci','totdraf','totsetuju','totrevisi','tottolak'))
               ->with('i',(request()->input('page',1) - 1) * 10);
    }    
    public function token_cari(Request $request)
    {
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();  
        $kendaraan = Kendaraan::all();
        $user = Auth::user();
        $token = $request->no_token;
        $request->session()->put('NoToken',$token);
        $master  = Spd_master::where('file_rekom',"=",$token)->first();
        $rinci = Spd_rinci::leftJoin('pegawai','pegawai.nip','=','spd_rinci.nip')->leftJoin('unit','unit.id','=','spd_rinci.unit')
                    ->where('id_master',"=",$master['id'])
                    ->select('spd_rinci.*','pegawai.image as imagex','pegawai.kode_golongan as golongan','unit.nama_unit')->get();   
        $gol    = Panggol::all();       
        if($master) {
        } else {
            return redirect('report_spd/token')->with('error','data tidak ada.');

        }
        return view('print.token',compact('kendaraan','gol','master','rinci','totdraf','totsetuju','totrevisi','tottolak'))
               ->with('i',(request()->input('page',1) - 1) * 10);
    }    
}
