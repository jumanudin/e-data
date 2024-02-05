<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Arsip_trc;
use App\Models\Arsip_doc;
use App\Models\Arsip_group;
use Illuminate\Support\Facades\Storage;
use Helper;
use Carbon\Carbon;
class ArsipTrcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
            $data = Arsip_trc::leftJoin('Arsip_doc','Arsip_doc.id','=','Arsip_trc.arsip_id')
            ->where('user_id',$user->username)
            ->select('Arsip_trc.*','Arsip_doc.keterangan as ket','Arsip_doc.nama as nama','Arsip_doc.group_id as group_id')->get();
        $group = Arsip_group::pluck('nama_group','kode');
        return view('pages.arsip.show',compact('data','group')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $arsip = Arsip_doc::where('group_id',$id)->get();
        $user = Auth::user();
        return view('pages.arsip.show_create',compact('arsip','id','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'user_id'    => 'required',
            'arsip_id'    => 'required',
            'keterangan'     => 'required',
            'url'           =>'',
            'file' => 'mimes:pdf|max:500',
        ],[
            'user_id.required' => 'user id harus diisi',
            'arsip_id.required'     => 'jenis arsip harus diisi',
            'file.mimes'    =>'Dokumen File harus pdf',
            'file.max'      =>'maksimum file 500Kb',
            'keterangan.required'  => 'keterangan harus diisi.',
        ]);
        if($request->file('file')) {
            $fileName = $request->user_id.'_'.$request->file->getClientOriginalName();
            $validData['file'] = $request->file('file')->storeAs('file-doc',$fileName);
        } 
        $validData['tgl_buat'] = date('Y-m-d');
        $validData['laci'] = '';
        $temp           = Arsip_trc::create($validData);
        $log = Helper::create_log('Simpan data transaksi upload dokumen ASN - Modul Transaksi','Create Data',$temp);
        $log->save();
        return redirect('arsip_trc')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decrypted = Crypt::decryptString($id);
        $data = Arsip_trc::leftJoin('Arsip_doc','Arsip_doc.id','=','Arsip_trc.arsip_id')
        ->select('Arsip_trc.*','Arsip_doc.keterangan as ket','Arsip_doc.nama as nama','Arsip_doc.group_id as group_id','Arsip_doc.id as idx')  
        ->where('Arsip_trc.id',$decrypted)->first();
        // dd($data);
        return view('pages.arsip.dokumen_view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $decrypted = Crypt::decryptString($id);
        $data= Arsip_trc::find($decrypted);
        return view('pages.arsip.show_edit', compact('data','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validData = $request->validate([
            'keterangan'      => 'required',  
            'group_id'        => 'required',     
        ],[
            'group_id.required'  => 'group arsip harus diisi.',
            'keterangan.required'  => 'keterangan arsip harus diisi.',
        ]);
        $temp = Arsip_doc::find($id);
        $temp->update($validData);
        $log = Helper::create_log('Arsip Dokumen - Modul Master','Update Data',$temp);    
        $log->save();    
        return redirect('doc_arsip')->with('success','data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
