<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facadas\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kabkota::all();
        $totsubmit = Dupak::select('*')->count(); 
        $totproses = Dupak::where('status_kirim',1)->count(); 
        return view('pages.city.city_data', compact('data','totsubmit','totproses'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $totsubmit = Dupak::select('*')->count(); 
        $totproses = Dupak::where('status_kirim',1)->count(); 
        $data = Kabkota::latest()->paginate(10);
        return view('pages.city.city_create', compact('data','totsubmit','totproses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'kode' => 'required|unique:kabkota|max:4',
            'nama' => 'required',
            'ibukota' => 'required'
        ], [
            'kode.required'     => 'kode daerah harus diisi.',
            'kode.max'          => 'kode maksimal 4 karakter.',
            'kode.unique'       => 'kode sudah ada',
            'nama.required'     => 'nama harus diisi.',
            'ibukota.required'  => 'ibukota harus diisi.',

        ]);


        Kabkota::create($validData);
        return redirect('city')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kabkota::find($id);
        return view('pages.city.city_edit', compact('kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return ($request);

        $validData = $request->validate([
            'nama' => 'required',
            'ibukota' => 'required',
            'updated_at' =>  \Carbon\Carbon::now()
        ], [
            'kode.required'     => 'kode daerah harus diisi.',
            'kode.max'          => 'kode maksimal 4 karakter.',
            'kode.unique'       => 'kode sudah ada',
            'nama.required'     => 'nama harus diisi.',
            'ibukota.required'  => 'ibukota harus diisi.',
        ]);
        Kabkota::find($id)->update($validData);
        return redirect('city')->with('success', 'data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kabkota::find($id);
        $result = $kota->delete();
        if ($result) {
            \Session::flash('pesan_berhasil', 'Berhasil menghapus data');
        } else {
            \Session::flash('pesan_gagal', 'Gagal menghapus data');
        }
        return redirect('city');
    }
}