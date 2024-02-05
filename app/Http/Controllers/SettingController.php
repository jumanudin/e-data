<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;
use App\Models\Ts_master;
use Illuminate\Support\Facadas\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Logs;
use Helper;
use Carbon\Carbon;
class SettingController extends Controller
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
        $data = Struktur::first();
        return view('pages.setting', compact('data','totdraf','totsetuju','totrevisi','tottolak'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function update(Request $request, $id)
    {
        // return ($request);

        $validData = $request->validate([
            'verifikator' => 'required|max:20',
            't_1' => 'required',
            't_2' => 'required',
            't_3' => 'required',
            't_4' => 'required',
            't_5' => 'required',
            'nama_pimpinan' => 'required',
            'lokasi_kantor' => 'required',
            'ttd' => '',
            'updated_at' =>  \Carbon\Carbon::now()
        ]);
        $temp = Struktur::find($id);
        $temp->update($validData);
        $log = Helper::create_log('Modul Master System','Update Data Setting System',$temp);
        $log->save();        
        return redirect('utility')->with('success', 'data berhasil diupdate.');
    }
  
}    
