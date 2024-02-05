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
class Ts_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user       = Auth::user();
        if($user->id_role<>4){
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();
        $data       = Ts_master::orderBy('tgl','DESC')->get();
        }else{
            $totdraf    = Ts_master::where('status',0)->where('updated_by',$user->username)->count(); 
            $totsetuju  = Ts_master::where('status',1)->where('updated_by',$user->username)->count(); 
            $totrevisi  = Ts_master::where('status',2)->where('updated_by',$user->username)->count();
            $tottolak   = Ts_master::where('status',3)->where('updated_by',$user->username)->count();     
            $data       = Ts_master::where('updated_by','=',$user->username)->orderBy('tgl','DESC')->get();       
        }
        $panggol    = Panggol::all();
        $jabatan    = Jabatan::all();
        $unit = Unit::all();
        return view('pages.ts_master.ts_master_data',compact('data','totdraf','totsetuju','totrevisi','tottolak','panggol','unit','jabatan'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }
    public function spd_index()
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
        $data       = Ts_master::where('status',1); 
        $panggol    = Panggol::all();
        $jabatan    = Jabatan::all();
        $unit = Unit::all();
        $ts_master = Ts_master::all();
        return view('pages.spd_master.spd_master_data',compact('data','totdraf','totsetuju','totrevisi','tottolak','panggol','unit','jabatan','ts_master'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $peg_ppk    = Pegawai::where('jabatan_tambahan',"=",'ppk')->get();
        $peg        = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->get();
        $ts_master  = Ts_master::all();
        $setting    = Struktur::leftJoin('pegawai','pegawai.nip','=','struktur.verifikator')->first();
        $anggar     = Mata_Anggaran::all(); 
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('pages.ts_master.ts_master_create', compact('setting','today','anggar','ts_master','peg','peg_ppk','totdraf','totsetuju','totrevisi','tottolak'));
    }
    public function rinci_create()
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
        $peg_ppk    = Pegawai::where('jabatan_tambahan',"=",'ppk')->get();
        $peg        = Pegawai::latest();
        $jab        = Jabatan::all();
        $panggol    = Panggol::all();
        $unit       = Unit::all();
        $ts_master  = Ts_master::all();
        $anggar     = Mata_Anggaran::all(); 
        return view('pages.ts_master.ts_rinci.rinci_create', compact('anggar','ts_master','peg','peg_ppk','peg_ts','jab','panggol','unit','totdraf','totsetuju','totrevisi','tottolak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validData = $request->validate([
            'file' => 'mimes:pdf|max:1024',
            'tgl'       => '',
            'kepada'    => 'required',                
            'perihal'   => 'required',
            'tgl_pergi' => 'required',
            'tgl_pulang'=> 'required',
            // 'persoalan' =>'required',
            // 'anggapan'  =>'required',
            // 'fakta'     =>'required',
            // 'analisis'  =>'required',
            // 'kesimpulan'=>'required',
            // 'saran_tindakan'=>'required',
            'verifikator' => 'required',
            'anggaran' =>'',
            'ppk'=>'',
            'note_verifikator' =>'',
            'file_dukung' =>'',
            'file_rekom' =>'',
            'timbang_1' =>'',
            'timbang_2' =>'',
            'timbang_3' =>'',
            'dasar_1' =>'',
            'dasar_2' =>'',
            'dasar_3' =>'',
            'nomor_st' =>'',
            'tgl_st' =>'',
            'nomor_spd'=>'',
            'maksud_spd'=>'',
            'tempat_berangkat' =>'',
        ]);
        
        $validData['updated_by'] = $user->username;
        $cariunit = Pegawai::where('nip',$user->username)->first(); 
        if(is_null($cariunit)) {
            return redirect($_SERVER['HTTP_REFERER'])->with('error','Data User belum terdaftar di Data Pegawai.');
        }
        if($request->file('file')) {
            $validData['file_dukung'] = $request->file('file')->store('file-dukung');
        }        
  
        $unit = Unit::find($cariunit['unit_id']);
        $validData['dari'] = $unit->nama_unit;
        $validData['tgl'] = date('Y-m-d');
        $validData['status_verifikator'] = 0;
        $validData['status'] = 0;
        $validData['kirim'] = 0;
        $validData['kendaraan'] = 0;
        $validData['lama_perjadin'] = 0;
        $validData['akun'] = 0;
        $validData['persoalan'] = '';
        $validData['anggapan'] = '';
        $validData['fakta'] = '';
        $validData['analisis'] = '';
        $validData['kesimpulan'] = '';
        $validData['saran_tindakan'] = '';
        $temp  = Ts_master::create($validData);
        $log = Helper::create_log('Modul Ts_master', 'Create Data', $temp);
        $log->save();
        return redirect('ts_master')->with('success', 'Data berhasil ditambahkan.');
    }
    public function store_spd(Request $request, $id)
    {
        $validData = $request->validate([
            'nomor_spd' => 'required',
            'ppk' => 'required',
            'maksud_spd' => 'required',
            'kendaraan' =>'required',
            'tempat_berangkat' => 'required',
            'tempat_tujuan' =>'required',
            'pengikut1' =>'',
            'pengikut2' =>'',
            'akun' =>'', 
            'tgl_spd' =>'required',
        ]);
        $temp = Ts_master::find($id);
        $temp->update($validData);
        $log = Helper::create_log('Modul Transaksi Master Telaahan Staf','Update Data SPD Halaman Pertama',$temp);
        $log->save();
        return redirect($_SERVER['HTTP_REFERER'])->with('success','Data SPD sudah di perbaharui.');
  
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
        $temp = Ts_master::find($id);
        $temp->update($validData);
        $log = Helper::create_log('Modul Transaksi Master Telaahan Staf','Update Data Surat Tugas',$temp);
        $log->save();
        return redirect($_SERVER['HTTP_REFERER'])->with('success','Data Surat Tugas sudah diperbaharui.');
    }
    public function kirim($id, Request $request )
    {
        $temp = Ts_master::find($id);
        $t_rinci = Ts_rinci::where('id_rinci',$temp->id)->first();
        if(is_null($t_rinci)){
        return redirect($_SERVER['HTTP_REFERER'])->with('error','Data Pegawai yang berangkat belum dipilih.');
        }
        $validData['kirim'] = 1;
        $temp->update($validData);
        $log = Helper::create_log('Modul Transaksi Master Telaahan Staf','Update Data Kirim Ke Verifikator',$temp);
        $log->save();
        return redirect('ts_master')->with('success','TS telah berhasil dikirim.');        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ts_master  $pegawai
     * @return \Illuminate\Http\Response
     */
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
        $ts_master  = Ts_master::find($decrypted);
        $tgl_pergi  = strtotime($ts_master->tgl_pergi);
        $tgl_pulang = strtotime($ts_master->tgl_pulang);
        // konversi tanggal ke array
        $tgl_arr    = array();
        $tgl_text   = '';
        $temp =  Ts_rinci::where('id_rinci',$ts_master->id)->get();
        foreach($temp as $data){
            $tgl_text  = $tgl_text . $data->nip .',';     
        }        
        $tgl_arr = explode(',', substr($tgl_text,0,strlen($tgl_text)-1));
        $ts_spd     = Ts_rinci::select('nip')->whereIn('nip',$tgl_arr)->get();
        $pegawai    = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->whereNotIn('nip',$ts_spd)->get();    
        if ($request->ajax()) {
            $ts_rinci   = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')
                                ->leftJoin('pegawai','pegawai.nip','=','ts_rinci.nip')
                                ->where('id_rinci',$ts_master->id)
                                ->select('ts_rinci.*','unit.id as idx','unit.nama_unit as nama_unit','pegawai.image as image')->get();
                                
            return DataTables::of($ts_rinci)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row->pilih==1){
                            $btn = '<button class="btn btn-med btn-default data-toggle="tooltip" title="sudah dipilih"><i class="fa fa-check" style="font-size:18px ;color:white;"></i></button>';  
                        } else {
                            $btn="";
                        }
                      $btn = $btn . '<a data-toggle="tooltip" title="Hapus Data" role="button" href="javascript:void(0)" onclick="open_modal('.$row->id.')" class="btn btn-med btn-danger"><i class="fa fa-trash" style="font-size:18px ;color:white;"></i></a>';
                    //   $btn = $btn. str_repeat('&nbsp;', 5) . '<a target="_blank" data-toggle="tooltip" title="Cetap SPD" role="button" href="'.route('ts_master.spd',Crypt::encryptString($row->id)).'" ><i class="fas fa-print" style="font-size:21px ;color:red;"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }  
        $kendaraan = Kendaraan::pluck('nama','id');
        $ppk = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->where('jabatan_tambahan','ppk')->get();
        $verifikator = Pegawai::leftJoin('jabatan','jabatan.id','pegawai.kode_jabatan')->where('nip',$ts_master->verifikator)->first();
        return view('pages.ts_master.ts_rinci.rinci_show', compact('kendaraan','ppk','verifikator','id','ts_master','pegawai','totdraf','totsetuju','totrevisi','tottolak'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }
    public function buat_spd($id, Request $request)
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
        $ts_master  = Ts_master::find($decrypted);
        $spd_master  = Spd_master::find($decrypted);
        $pegawai = array();
        if (is_null($spd_master)){} else {
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
            $pegawai    = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->whereNotIn('nip',$ts_spd)->get();     
        }
        $kendaraan = Kendaraan::pluck('nama','id');
        $ppk = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->where('jabatan_tambahan','ppk')->get();
        // $verifikator = Pegawai::leftJoin('jabatan','jabatan.id','pegawai.kode_jabatan')->where('nip',$spd_master->verifikator)->first();
        return view('pages.ts_master.ts_rinci.rinci_spd', compact('kendaraan','ppk','id','ts_master','spd_master','pegawai','totdraf','totsetuju','totrevisi','tottolak'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
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
        $ts = Ts_master::find($decrypted); 
        $setting    = Struktur::leftJoin('pegawai','pegawai.nip','=','struktur.verifikator')->first();
        $anggar     = Mata_Anggaran::all(); 
        return view('pages.ts_master.ts_master_edit', compact('setting','anggar','ts','totdraf','totsetuju','totrevisi','tottolak'));
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
        $validData = $request->validate([
            'kepada'    => 'required',                
            'perihal'   => 'required',
            'tgl_pergi' => 'required',
            'tgl_pulang'=> 'required',
            // 'persoalan' =>'required',
            // 'anggapan'  =>'required',
            // 'fakta'     =>'required',
            // 'analisis'  =>'required',
            // 'kesimpulan'=>'required',
            // 'saran_tindakan'=>'required',                    
            'anggaran'  =>'',
        ]);
        $temp           = Ts_master::find($id);        
        if($request->file('file')) {
            File::delete(asset('storage/'. $temp->file_dukung));
            $validData['file_dukung'] = $request->file('file')->store('file-dukung');
        }         
    
        $temp->update($validData);
        $log = Helper::create_log('Modul Master Telaahan Staf', 'Update Data', $temp);
        $log->save();
        // toast('Your Post as been submited!','success','top-right');
        // return redirect('pegawai');
        return redirect('ts_master')->with('success', 'Data berhasil diubah.');
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

        $peg = Ts_master::find($id);
        $result = $peg->delete();
        $log = Helper::create_log('Modul TS Master', 'Hapus Data', $peg);
        $log->save();
        if ($result) {
            return redirect('ts_master')->with('success', 'Berhasil menghapus data');
        } else {
            return redirect('ts_master')->with('success', 'Gagal menghapus data');
        }
    }
    public function rinci_hapus($id,$id_master)
    {
        // return ($id);

        $rinci = Ts_rinci::find($id);
        $key = Crypt::decryptString($id_master);
        $ts = Ts_master::find($key);
        if($ts->status<>1) {
        $result = $rinci->delete();
        } else {
            return redirect($_SERVER['HTTP_REFERER'])->with('error','tidak diizinkan dihapus.');
        }
        $log = Helper::create_log('Modul TS Master Rincian', 'Hapus Data', $rinci);
        $log->save();
        if ($result) {
            return redirect('ts_master/view/'.$id_master)->with('success', 'Berhasil menghapus data');
        } else {
            return redirect('ts_master/view')->with('success', 'Gagal menghapus data');
        }
    }

    public function rinci_store(Request $request)
    {
        $getNip = $request->nip;
        for ($i=0; $i < count($getNip); $i++) {
            $pegawai = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')
                       ->where('nip',$request->nip[$i])->first();
            // $mapel       = implode(',', $getMonthReq);
            $qa   =   ts_rinci::updateOrCreate(
                    [
                            'id' => $request->id
                        ],  
                        [
                                'id_rinci'  => $request->id_rinci,
                                'tgl_pergi' => $request->tgl_pergi,
                                'tgl_pulang'=> $request->tgl_pulang,
                                'nip' => $request->nip[$i],
                                'nama' => $pegawai->nama,
                                'jabatan' => $pegawai->nama_jabatan,
                                'unit' => $pegawai->unit_id,
                                'kode_golongan' => $pegawai->kode_golongan,
                            ]);    
                          $log = Helper::create_log('Modul Master Ts rincian','Tambah Data',$qa);           
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
        $temp = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')
                 ->where('ts_rinci.id',$descrypted)->first(); 
        $data = Ts_master::where('id',$temp->id_rinci)->first();
        $ppk = Pegawai::where('nip',$data->ppk)->first();
        $gol = Panggol::where('gol',$temp->kode_golongan)->first();
        $kendaraan = Kendaraan::find($data->kendaraan);
        return view('print.spd',compact('kendaraan','ppk','data','temp','gol'))->with('i');
    }
    public function cetaktugas(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $pejabat = Struktur::first();
        $temp = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')->leftJoin('panggol','gol','=','ts_rinci.kode_golongan')
                 ->where('ts_rinci.id_rinci',$descrypted)->get(); 
        $data = Ts_master::where('id',$descrypted)->first();
        return view('print.stugas',compact('data','temp','pejabat'))->with('i');
    }
}