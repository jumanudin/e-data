<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facadas\DB;
use Illuminate\Support\Se;
use App\Models\Modul;
use App\Models\Ts_master;
use App\Models\Logs;
use App\Models\Modul_type;
use App\Models\Menu_type;

use Helper;
class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Modul::leftJoin('Modul_type','modul.modul_type_id','=','modul_type.id')
        ->leftJoin('menu_type','menu_type.id','=','modul.menu_id')
        ->select('Modul.*','menu_type.id as menu','menu_type.menu_name as nama_menu','modul_type.id as modul_id','modul_type.modul_type as jenismodul')
        ->get();
        //$data = Modul::all();
        return view('pages.modul.modul_data',compact('data'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Modul::latest();
        $modtype = Modul_type::all();
        return view('pages.modul.modul_create', compact('data'));
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
            'nama_modul'    => 'required|unique:modul',
            'nama_menu'     => 'required',
            'modul_type_id' => 'required'
        ],[
            'nama_modul.unique'     => 'modul ini sudah sudah ada',
            'nama_modul.required'  => 'nama modul harus diisi.',
            'nama_menu.required'  => 'keterangan modul harus diisi.',
        ]);
        $temp           = Modul::create($validData);
        $log = Helper::create_log('Modul  - Modul System','Create Data',$temp);
        $log->save();
        return redirect('modul_name')->with('success','Data berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $data = Modul::find($id);
        $modtype = Modul_type::pluck('modul_type','id');
        $menutype = Menu_type::pluck('menu_name','id');
        return view('pages.modul.modul_edit', compact('data','menutype','modtype'));
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
        $validData = $request->validate([
            'nama_menu'   => 'required',
            'modul_type_id'      => 'required',
            'menu_id'      => 'required',
            'updated_at' =>  \Carbon\Carbon::now()            
        ],[
            'nama_modul.required'  => 'nama modul harus diisi.',
            'nama_menu.required'  => 'keterangan modul harus diisi.',
            'menu_id.required'  => 'jenis menu harus diisi.',
        ]);
        $temp = Modul::find($id);
                $temp->update($validData);
        $log = Helper::create_log('Modul - Modul System','Update Data',$temp);    
        $log->save();    
        return redirect('modul_name')->with('success','data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Modul::find($id);
        $result = $data->delete();
        $log = Helper::create_log('Modul - Modul System','Hapus Data',$data);        
        $log->save();
        if ($result) {
            \Session::flash('pesan_berhasil','Berhasil menghapus data');
          }else {
            \Session::flash('pesan_gagal','Gagal menghapus data');
        }
        return redirect('modul_name');
    }
}
