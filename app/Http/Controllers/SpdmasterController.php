<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facadas\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Ts_master;
use App\Models\Ts_rinci;
use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\Panggol;
use App\Models\Mata_Anggaran;
use Helper;
use DataTables;
class SpdmasterController extends Controller
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
        $veri = Ts_master::where('kirim',1)->where('status_verifikator',1)->orderBy('tgl','DESC')->get();
        return view('pages.spd_master.spd_master_data',compact('veri','totdraf','totsetuju','totrevisi','tottolak'))
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
        $tgl_pergi  = strtotime($veri->tgl_pergi);
        $tgl_pulang = strtotime($veri->tgl_pulang);
        // konversi tanggal ke array
        $tgl_arr    = array();
        $tgl_text ='';
        // $tgl_text   = strtotime($tgl_pergi);
        // while ($tgl_pergi <= $tgl_pulang) {
        //     $tgl_text  = $tgl_text . date('Y-m-d',$tgl_pergi).','; 
        //     $tgl_pergi = strtotime('+1 day',$tgl_pergi); 
        // }
        $temp =  Ts_rinci::where('id_rinci',$veri->id)->get();
        foreach($temp as $data){
            $tgl_text  = $tgl_text . $data->nip .',';     
        }    
        $tgl_arr = explode(',', substr($tgl_text,0,strlen($tgl_text)-1));
        $ts_spd     = Ts_rinci::select('nip')->whereIn('nip',$tgl_arr)->get();
                    // ->orWhereIn('tgl_pulang',$tgl_arr)->get();
        $pegawai    = Pegawai::leftJoin('jabatan','jabatan.id','=','pegawai.kode_jabatan')->whereNotIn('nip',$ts_spd)->get();      
        $ts_rinci   = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')
                                ->leftJoin('pegawai','pegawai.nip','=','ts_rinci.nip')
                                ->where('id_rinci',$veri->id)
                                ->select('ts_rinci.*','unit.id as idx','unit.nama_unit as nama_unit','pegawai.image as image')->get();
        if ($request->ajax()) {
            return DataTables::of($ts_rinci)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row->pilih==1){
                            $btn = '<button class="btn btn-med btn-default data-toggle="tooltip" title="sudah dipilih"><i class="fa fa-check" style="font-size:18px ;color:white;"></i></button>';  
                        } else {
                            $btn="";
                        }
                        $btn = $btn . '<a class="btn btn-med btn-danger" href="javascript:void(0)" onclick="open_modal('.$row->id.')" ><i class="fa fa-16px fa-trash style="font-size:18px ;color:white;""></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }      

        $verifikator = Pegawai::leftJoin('jabatan','jabatan.id','pegawai.kode_jabatan')->where('nip',$veri->verifikator)->first(); 
        return view('pages.spd_master.spd_master_show', compact('id','verifikator','pegawai','veri','ts_rinci','totdraf','totsetuju','totrevisi','tottolak'));
    }
    public function update(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $hashed_random = Hash::make(Str::random(40));
        $validData = $request->validate([
            'status'    => 'required',
            'note'   => '', 
            'kirim' =>'',   
            'updated_at' =>  \Carbon\Carbon::now(),            
        ]);
        //$temp           = Kegiatan::create($validData);
        $kirim_cek = $request->kirim;
        if($kirim_cek ==1){
            $validData['kirim'] = 0;
            $validData['status_verifikator'] = 0;
        }else{
            $validData['kirim'] = 1;
        }
        if($request->status==1){
            $validData['file_rekom']= $hashed_random;
        } else {
            $validData['file_rekom']= '';
        }
        $temp = Ts_master::find($descrypted);
                $temp->update($validData);
        $log = Helper::create_log('Modul Kontrol e-SPD','Update Data Status Telaah Staf Surat Tugas',$temp);           
        $log->save();
        return redirect($_SERVER['HTTP_REFERER'])->with('success','Data sudah di perbaharui.');
        // return redirect('spd_master')->with('success','data berhasil diperbaharui.');
    }
    public function rinci_hapus($id,$id_master)
    {


        $rinci = Ts_rinci::find($id);
        // $key = Crypt::decryptString($id_master);
        // $ts = Ts_master::find($key);
        if($rinci->pilih==0) {
        $result = $rinci->delete();
        } else {
            return redirect($_SERVER['HTTP_REFERER'])->with('error','tidak diizinkan dihapus.');
        }
        $log = Helper::create_log('Modul TS Master Rincian', 'Hapus Data', $rinci);
        $log->save();
        if ($result) {
            return redirect('spd_master/view/'.$id_master)->with('success', 'Berhasil menghapus data');
        } else {
            return redirect('spd_master/view')->with('success', 'Gagal menghapus data');
        }
    }

    public function viewrekom(Request $request, $id)
    {
        $descrypted = Crypt::decryptString($id);
        $data = Ts_master::find($descrypted);
        $gol = Panggol::all();
        $rinci = Ts_rinci::leftJoin('unit','unit.id','=','ts_rinci.unit')->where('id_rinci',$data->id)->get();
        return view('print.rekom',compact('data','rinci','gol'))->with('i');
    }
}
