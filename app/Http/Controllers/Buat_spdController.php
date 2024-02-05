<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use App\Models\Panggol;
use App\Models\Kendaraan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Ts_master;
use App\Models\Spd_master;
use App\Models\Ts_rinci;
use App\Models\Spd_rinci;
use App\Models\Struktur;
use App\Models\Unit;
use App\Models\Mata_Anggaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;
use App\Models\Logs;
use Helper;
use PDF;
use Carbon\Carbon;
class Buat_spdController extends Controller
{
    public function index()
    {
        $user       = Auth::user();
        if($user->id_role<>4){
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();
        $data       = Spd_master::orderBy('tgl','DESC')->get();
        }else{
            $totdraf    = Ts_master::where('status',0)->where('updated_by',$user->username)->count(); 
            $totsetuju  = Ts_master::where('status',1)->where('updated_by',$user->username)->count(); 
            $totrevisi  = Ts_master::where('status',2)->where('updated_by',$user->username)->count();
            $tottolak   = Ts_master::where('status',3)->where('updated_by',$user->username)->count();     
            $data       = Spd_master::where('updated_by','=',$user->username)->orderBy('tgl','DESC')->get();       
        }
        $panggol    = Panggol::all();
        $jabatan    = Jabatan::all();
        $unit = Unit::all();
        return view('pages.ts_master.spd.spd_data',compact('data','totdraf','totsetuju','totrevisi','tottolak','panggol','unit','jabatan'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }
    public function store_spd(Request $request, $id)
    {
        $user = Auth::user();
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
        $ts_master = Ts_master::find($id);
        $validData = $request->validate([
            'nomor_spd' => 'required',
            'ppk' => 'required',
            'maksud_spd' => 'required',
            'kendaraan' =>'required',
            'tempat_berangkat' => 'required',
            'tempat_tujuan' =>'required',
            'tgl_pergi' => 'required',
            'tgl_pulang' => 'required',
            'pengikut1' =>'',
            'pengikut2' =>'',
            'akun' =>'', 
            'tgl_spd' =>'required',
        ]);
        $validData['file_rekom'] = $ts_master->file_rekom;
        $validData['updated_by'] = $user->username;
        $validData['tgl'] = date('Y-m-d');
        $validData['lama_perjadin'] = 0;
        $validData['id_master'] = $id;
        $temp = Spd_master::create($validData);
        $spd_id = Crypt::encryptString($temp->id);
        $log = Helper::create_log('Modul Transaksi Buat SPD','Buat Data SPD Halaman Pertama',$temp);
        $log->save();
        return redirect('/buat_spd/view/'.$spd_id);
    }
    public function store_st(Request $request, $id)
    {
        $validData = $request->validate([
            'nomor_st' => 'required',
            'tgl_st' => 'required',
            'timbang_1' => 'required',
            'timbang_2' =>'',
            'timbang_3' => '',
            'dasar_1' =>'required',
            'dasar_2' =>'',
            'dasar_3' =>'',
            'lokasi_acara' =>'required', 
        ]);
        $temp = Spd_master::find($id);
        $temp->update($validData);
        $log = Helper::create_log('Modul Transaksi Buat SPD','Update Data Surat Tugas Perjadin',$temp);
        $log->save();
        return redirect($_SERVER['HTTP_REFERER'])->with('success','Data Surat Tugas sudah diperbaharui.');
    }
    public function show($id, Request $request)
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
        $decrypted  = Crypt::decryptString($id);
        $spd_master = Spd_master::find($decrypted);
        $ts_master = Ts_master::find($spd_master->id_master);
        $tgl_pergi  = strtotime($spd_master->tgl_pergi);
        $tgl_pulang = strtotime($spd_master->tgl_pulang);
        // konversi tanggal ke array
        $tgl_arr    = array();
        $tgl_text   = strtotime($tgl_pergi);
        while ($tgl_pergi <= $tgl_pulang) {
            $tgl_text  = $tgl_text . date('Y-m-d',$tgl_pergi).','; 
            $tgl_pergi = strtotime('+1 day',$tgl_pergi); 
        }
        $tgl_arr = explode(',', substr($tgl_text,0,strlen($tgl_text)-1));
        $ts_spd     = Spd_rinci::select('nip')->whereIn('tgl_pergi',$tgl_arr)
                    ->orWhereIn('tgl_pulang',$tgl_arr)->get();
        // $pegawai    = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->whereNotIn('nip',$ts_spd)->get();   
        $pegawai    = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')
        ->leftJoin('ts_rinci','ts_rinci.nip','=','pegawai.nip')
        ->where('ts_rinci.id_rinci',$ts_master->id)
        ->where('ts_rinci.pilih','<>',1)
        ->whereNotIn('pegawai.nip',$ts_spd)->get();   

        if ($request->ajax()) {
            $spd_rinci   = Spd_rinci::leftJoin('unit','unit.id','=','spd_rinci.unit')
                                ->leftJoin('pegawai','pegawai.nip','=','spd_rinci.nip')
                                ->where('id_master',$spd_master->id)
                                ->select('spd_rinci.*','unit.id as idx','unit.nama_unit as nama_unit','pegawai.image as image')->get();
                                
            return DataTables::of($spd_rinci)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                      $btn = '<a data-toggle="tooltip" title="Hapus Data" role="button" href="javascript:void(0)" onclick="open_modal('.$row->id.')" class="btn btn-med btn-danger"><i class="fa fa-trash" style="font-size:18px ;color:white;"></i></a>';
                      $btn = $btn. str_repeat('&nbsp;', 5) . '<a target="_blank" data-toggle="tooltip" title="Cetap SPD" class="btn btn-med btn-danger" href="'.route('buat_spd.cetakspd',Crypt::encryptString($row->id)).'" ><i class="fas fa-print" style="font-size:21px ;color:white;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }    
        $kendaraan = Kendaraan::pluck('nama','id');
        $ppk = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->where('jabatan_tambahan','ppk')->get();
        return view('pages.ts_master.spd.spd_create', compact('ts_master','spd_master','id','ppk','kendaraan','pegawai','totdraf','totsetuju','totrevisi','tottolak'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }
    public function edit($id)
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
        $spd_master = Spd_master::find($decrypted); 
        $ts_master  = Ts_master::find($spd_master->id_master);
        $kendaraan = Kendaraan::pluck('nama','id');
        $ppk = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->where('jabatan_tambahan','ppk')->get();
        $setting    = Struktur::leftJoin('pegawai','pegawai.nip','=','struktur.verifikator')->first();
        $anggar     = Mata_Anggaran::all(); 
        return view('pages.ts_master.spd.spd_edit', compact('ts_master','kendaraan','ppk','setting','anggar','spd_master','totdraf','totsetuju','totrevisi','tottolak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $validData = $request->validate([
            'nomor_spd' => 'required',
            'ppk' => 'required',
            'maksud_spd' => 'required',
            'kendaraan' =>'required',
            'tempat_berangkat' => 'required',
            'tempat_tujuan' =>'required',
            'tgl_pergi' => 'required',
            'tgl_pulang' => 'required',
            'pengikut1' =>'',
            'pengikut2' =>'',
            'akun' =>'', 
            'tgl_spd' =>'required',
        ]);
        $validData['updated_by'] = $user->username;
        $temp = Spd_master::find($id);
        $temp->update($validData);
        $log = Helper::create_log('Modul Transaksi Buat SPD','Edit data buat SPD',$temp);
        $log->save();
        return redirect('buat_spd')->with('success','data sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return ($id);

        $peg = Spd_master::find($id);
        $result = $peg->delete();
        $log = Helper::create_log('Modul Transaksi ', 'Hapus Data Buat SPD', $peg);
        $log->save();
        if ($result) {
            return redirect('buat_spd')->with('success', 'Berhasil menghapus data');
        } else {
            return redirect('buat_spd')->with('success', 'Gagal menghapus data');
        }
    }
    public function rinci_hapus($id,$id_master)
    {
        // return ($id);

        $rinci = spd_rinci::find($id);
        $spd_master = Spd_master::where('id',$rinci->id_master)->first();
        $temp = Ts_rinci::where('id_rinci',$spd_master->id_master)->where('nip',$rinci->nip)->first();
        $temp->update(['pilih' => 0]);
        $result = $rinci->delete();
        $log = Helper::create_log('Modul Transakdi SPD Rinci', 'Hapus Data', $rinci);
        $log->save();
        if ($result) {
            return redirect('buat_spd/view/'.$id_master)->with('success', 'Berhasil menghapus data');
        } else {
            return redirect('buat_spd/view')->with('success', 'Gagal menghapus data');
        }
    }

    public function rinci_store(Request $request)
    {
        $getNip = $request->nip;
        for ($i=0; $i < count($getNip); $i++) {
            $pegawai = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')
                       ->where('nip',$request->nip[$i])->first();
            // $mapel       = implode(',', $getMonthReq);
            $qa   =   spd_rinci::updateOrCreate(
                    [
                        'id' => $request->id
                    ],  
                    [
                        'id_master'  => $request->id_master,
                        'tgl_pergi' => $request->tgl_pergi,
                        'tgl_pulang'=> $request->tgl_pulang,
                        'nip' => $request->nip[$i],
                        'nama' => $pegawai->nama,
                        'jabatan' => $pegawai->nama_jabatan,
                        'unit' => $pegawai->unit_id,
                        'kode_golongan' => $pegawai->kode_golongan,
                    ]);
                    $temp = Ts_rinci::where('nip',$request->nip[$i])->where('id_rinci',$request->id_tsmaster)->first();
                    $temp->update(['pilih' => 1]);
                    $log = Helper::create_log('Modul Transaksi Buat SPD rincian','Tambah Data',$qa);           
                    $log->save();    
                        
        }
        return response()->json($getNip);    
    }
    public function viewrekom(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $data = Ts_master::find($descrypted);
        $gol = Panggol::all();
        $rinci = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')->where('id_rinci',$data->id)->get();
        return view('print.rekom',compact('data','rinci','gol'))->with('i');
    }
    public function viewtugas(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $data = Ts_master::find($descrypted);
        $gol = Panggol::all();
        $rinci = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')->where('id_rinci',$data->id)->get();
        return view('print.tugas_view',compact('data','gol','rinci'))->with('i');
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
    public function cetak_spd(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $temp = Spd_rinci::leftJoin('unit','unit.id','=','spd_rinci.unit')
                 ->where('spd_rinci.id',$descrypted)->first(); 
        $data = Spd_master::where('id',$temp->id_master)->first();
        $ppk = Pegawai::where('nip',$data->ppk)->first();
        $gol = Panggol::where('gol',$temp->kode_golongan)->first();
        $kendaraan = Kendaraan::find($data->kendaraan);
        return view('print.spd',compact('kendaraan','ppk','data','temp','gol'))->with('i');
    }
    public function cetaktugas(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $pejabat = Struktur::first();
        $temp = Spd_rinci::leftJoin('unit','unit.id','=','spd_rinci.unit')->leftJoin('panggol','gol','=','spd_rinci.kode_golongan')
                 ->where('spd_rinci.id_master',$descrypted)->get(); 
        $data = Spd_master::where('id',$descrypted)->first();
        return view('print.stugas',compact('data','temp','pejabat'))->with('i');
    }
}