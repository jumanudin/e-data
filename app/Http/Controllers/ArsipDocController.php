<?php

namespace App\Http\Controllers;

use App\Models\Arsip_doc;
use App\Models\Arsip_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Helper;
class ArsipDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Arsip_doc::all();
        return view('pages.arsip.data',compact('data'))->with('i', (request()->input('page', 1) - 1) * 10); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Arsip_group::pluck('nama_group','kode');
        return view('pages.arsip.arsip_create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'nama'    => 'required|unique:Arsip_doc',
            'keterangan'     => 'required',
            'group_id'      => 'required',
        ],[
            'nama.unique'     => 'nama arsip ini sudah sudah ada',
            'group_id.required'     => 'group arsip harus diisi',
            'keterangan.required'  => 'keterangan harus diisi.',
        ]);
        $temp           = Arsip_doc::create($validData);
        $log = Helper::create_log('Arsip Dokumen - Modul Master','Create Data',$temp);
        $log->save();
        return redirect('doc_arsip')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encrypt = Crypt::decryptString($id);
        $data   = Arsip_doc::find($encrypt);
        $group  = Arsip_group ::pluck('nama_group','kode');
        return view ('pages.arsip.arsip_edit',compact('data','group'));
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
        $data = Arsip_doc::find($id);
        $result = $data->delete();
        $log = Helper::create_log('Arsip Dokumen - Modul Master','Hapus Data',$data);        
        $log->save();
        if ($result) {
            return redirect('doc_arsip')->with('success', 'Berhasil menghapus data');
        } else {
            return redirect('doc_arsip')->with('success', 'Gagal menghapus data');
        }        
    }
}
