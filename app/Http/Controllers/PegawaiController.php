<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Panggol;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Ts_master;
use App\Models\Ts_rinci;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Logs;
use Helper;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user       = Auth::user();
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();
        $data       = Pegawai::all(); 
        $panggol    = Panggol::all();
        $jabatan    = Jabatan::all();
        $unit = Unit::all();
        return view('pages.pegawai.pegawai_data',compact('data','totdraf','totsetuju','totrevisi','tottolak','panggol','unit','jabatan'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();
        

        $peg = Pegawai::latest();
        $jab = Jabatan::all();
        $panggol = Panggol::all();
        $unit = Unit::all();
        
        return view('pages.pegawai.pegawai_create', compact('peg','jab','panggol','unit','totdraf','totsetuju','totrevisi','tottolak'));
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
            'nip'    => 'required|unique:pegawai|max:18',
            'nama'   => 'required',
            'unit_id' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kode_golongan' => 'required',
            'kode_jabatan' => 'required',
            'jabatan_tambahan',
            'status_kepeg' => 'required',
        ], [
            'nip.unique'     => 'Nip pegawai ini sudah ada',
            'nama.required'     => 'Nama Pegawai kegiatan harus diisi.',           
            'unit_id.required'     => 'Satuan Kerja harus diisi.',
            'no_hp.required'     => 'No HP harus diisi.',
            'jenis_kelamin.required'     => 'Jenis Kelamin harus diisi.',
            'alamat.required'     => 'Alamat harus diisi.',
            'email.required'     => 'email harus diisi.',            
            'kode_golongan.required'     => 'kode Golongan harus diisi.',
            'kode_jabatan.required'     => 'kode Jabatan harus diisi.',     
            'jabatan_tambahan.required.',       
            'status_kepeg.required'     => 'Status Kepegawaian harus diisi.',
            
        ]);
        $validData['image'] = 'user.png';
        $temp  = Pegawai::create($validData);
        $log = Helper::create_log('Modul Pegawai', 'Create Data', $temp);
        $log->save();

        return redirect('pegawai')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $decrypted = Crypt::decryptString($id);
        //$kua = Kua::pluck('nama', 'satker');
        $peg = Pegawai::find($decrypted);
        $jab = Jabatan::pluck('nama_jabatan', 'id');
        $panggol = Panggol::pluck('pangkat', 'gol');
        return view('pages.pegawai.pegawai_show', compact('peg','jab', 'panggol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //return ($id);
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();

        $decrypted = Crypt::decryptString($id);
        $peg = Pegawai::find($decrypted); 
        $jab = Jabatan::pluck('nama_jabatan', 'id');
        $panggol = Panggol::all();
        $unit = Unit::pluck('nama_unit','id');
        return view('pages.pegawai.pegawai_edit', compact('peg','jab','panggol','unit','totdraf','totsetuju','totrevisi','tottolak'));
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
            'nip'    => 'required',
            'nama'   => 'required',
            'unit_id' => 'required',            
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kode_golongan' => 'required',
            'kode_jabatan' => 'required',
            'jabatan_tambahan' =>'',
            'status_kepeg' => 'required',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($request->file('imagex')) {
            $validData['image'] = $request->file('imagex')->store('profile-photos');;
        }
        $temp           = Pegawai::find($id);    
        $temp->update($validData);
        $log = Helper::create_log('Modul Pegawai', 'Update Data', $temp);
        $log->save();
        // Alert::success('judul','pesannya');
        // return redirect('pegawai');
        return redirect('pegawai')->with('success', 'Data berhasil diubah.');
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

        $peg = Pegawai::find($id);
        $result = $peg->delete();
        $log = Helper::create_log('Modul Pegawai', 'Hapus Data1', $peg);
        $log->save();
        if ($result) {
            return redirect('pegawai')->with('success', 'Berhasil menghapus data');
        } else {
            return redirect('pegawai')->with('success', 'Gagal menghapus data');
        }
    }



    public function show_panggol($id)
    {
        $decrypted = Crypt::decryptString($id);
        $peg = Pegawai::find($decrypted);

        $ripang = Ripang::leftJoin('panggol', 'Ripang.golongan', '=', 'Panggol.gol')
            ->select('Ripang.*', 'Panggol.id as idx', 'Panggol.pangkat as pangkat', 'Panggol.gol as gol')
            ->where('nip', $peg->nip)->get();
        return view('pages.pegawai.pegawai_show_pangkat', compact('peg', 'ripang'))->with('i');
    }

    public function ubahProfile(Request $request, $id)
    {

        $validData = $request->validate([

            'nip'           => 'required',
            'nama'          => 'required',
            'kualifikasi'   => '',
            'gelar_depan'   => '',
            'gelar_belakang' => '',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'status'        => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'no_hp'         => 'required',
            'lat'       => 'numeric|required',
            'long'      => 'numeric|required',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'updated_at' =>  \Carbon\Carbon::now()
        ]);

        // if ($image = $request->file('imagex')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $validData['image'] = "$profileImage";
        // }
        $temp           = Pegawai::find($id);
        $temp->update($validData);
        $log = Helper::create_log('Modul Pegawai', 'Update Profile', $temp);
        $log->save();

        return redirect('trans_pegawai')->with('success', 'Profile berhasil diubah.');
    }

    public function panggol_create($id)
    {
        $decrypted = Crypt::decryptString($id);

        $peg = Pegawai::find($decrypted);
        $panggol = Panggol::pluck('pangkat', 'gol');
        return view('pages.pegawai.pegawai_show_pangkat_create', compact('peg', 'panggol'))->with('i');
    }

    public function panggol_submit(Request $request)
    {
        $validData = $request->validate([
            'token'         => 'required',
            'nip'           => 'required',
            'golongan'   => 'required',
            'tmt'          => 'required',
            'tgl_sk'  => 'required',
            'no_sk'     => 'required'
        ]);
        $temp           = Ripang::create($validData);
        $decrypted = Crypt::decryptString($request->token);

        $peg = Pegawai::find($decrypted);
        $peg->update(array('kode_golongan' => $request->golongan, 'tmt_gol' => $request->tmt));
        $log = Helper::create_log('Modul Pegawai Riwayat Kepangkatan', 'Create Data', $temp);
        $log->save();
        // Alert::success('judul','pesannya');
        // return redirect()->back();
        // return redirect()->route('user.profile', ['step' => $step, 'id' => $id]);
        return redirect()->route('pegawai.panggol', $request->token)->with('success', 'Data berhasil ditambahkan.');
    }

    public function panggol_edit($id, $nip)
    {
        $decrypted = Crypt::decryptString($id);
        $file = Ripang::find($decrypted);
        $peg = Pegawai::find($nip);
        $panggol = Panggol::pluck('pangkat', 'gol');
        return view('pages.pegawai.pegawai_show_pangkat_edit', compact('file', 'panggol', 'peg'));
    }
    public function panggol_update(Request $request, $id)
    {
        $validData = $request->validate([
            'token'         => 'required',
            'nip'           => 'required',
            'golongan'   => 'required',
            'tmt'          => 'required',
            'tgl_sk'  => 'required',
            'no_sk'     => 'required'
        ]);
        $temp           = Ripang::find($id);
        $temp->update($validData);
        $decrypted = Crypt::decryptString($request->token);
        $peg = Pegawai::find($decrypted);
        $peg->update(array('kode_golongan' => $request->golongan, 'tmt_gol' => $request->tmt));
        $log = Helper::create_log('Modul Pegawai Riwayat Kepangkatan 1', 'Update Data', $temp);
        $log->save();
        return redirect()->route('pegawai.panggol', $request->token)->with('success', 'Data Induk dan Riwayat Pangkat berhasil diubah.');
    }

    public function panggol_hapus($id)
    {
        $file = Ripang::find($id);
        $result = $file->delete();
        $log = Helper::create_log('Modul Riwayat Kepangkatan', 'Hapus Data', $file);
        $log->save();
        if ($result) {
            return redirect()->route('pegawai.panggol', $file->token)->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('pegawai')->with('success', 'Gagal menghapus data');
        }
    }


    public function show_jabatan($id)
    {
        $decrypted = Crypt::decryptString($id);
        $peg = Pegawai::find($decrypted);
        $rijab = Rijab::leftJoin('jabatan', 'Rijab.kode_jabatan', '=', 'Jabatan.id')
            ->select('Rijab.*', 'Jabatan.id as idx', 'Jabatan.nama_jabatan as nama_jab')
            ->where('nip', $peg->nip)->get();
        return view('pages.pegawai.pegawai_show_jabatan', compact('peg', 'rijab'))->with('i');
        // return ('Halaman');
    }

    public function jabatan_create($id)
    {
        $decrypted = Crypt::decryptString($id);
        $kua = Kua::pluck('nama', 'satker');
        $peg = Pegawai::find($decrypted);
        $jabatan = Jabatan::pluck('nama_jabatan', 'id');
        return view('pages.pegawai.pegawai_show_jabatan_create', compact('peg', 'jabatan', 'kua'))->with('i');
    }

    public function jabatan_submit(Request $request)
    {
        $validData = $request->validate([

            'satker'           => 'required',
            'nip'           => 'required',
            'kode_jabatan'   => 'required',
            'tmt_jab'          => 'required',
            'tgl_skjab'  => 'required',
            'no_skjab'     => 'required',
            'token'         => 'required',
            'keterangan'    => 'required'
        ]);
        $temp           = Rijab::create($validData);
        $decrypted = Crypt::decryptString($request->token);
        $peg = Pegawai::find($decrypted);
        $peg->update(array('kode_satker' => $request->satker, 'tmt_jabatan' => $request->tmt_jab));
        $log = Helper::create_log('Modul Pegawai Riwayat Jabatan NIP.' . $request->nip . ' satker:' . $request->satker, 'Create Data', $temp);
        $log->save();
        return redirect()->route('pegawai.jabatan', $request->token)->with('success', 'Data berhasil ditambahkan.');
    }

    public function jabatan_edit($id, $nip)
    {
        $decrypted = Crypt::decryptString($id);
        $kua = Kua::pluck('nama', 'satker');
        $file = Rijab::find($decrypted);
        $peg = Pegawai::find($nip);
        $jabatan = jabatan::pluck('nama_jabatan', 'id');
        return view('pages.pegawai.pegawai_show_jabatan_edit', compact('file', 'jabatan', 'peg', 'kua'));
    }
    public function jabatan_update(Request $request, $id)
    {
        $validData = $request->validate([

            'satker'           => 'required',
            'nip'           => 'required',
            'kode_jabatan'   => 'required',
            'tmt_jab'          => 'required',
            'tgl_skjab'  => 'required',
            'no_skjab'     => 'required',
            'token'         => 'required',
            'keterangan'    => 'required'
        ]);
        $temp           = Rijab::find($id);
        $temp->update($validData);
        $decrypted = Crypt::decryptString($request->token);
        $peg = Pegawai::find($decrypted);
        $peg->update(array('kode_satker' => $request->satker, 'tmt_jabatan' => $request->tmt_jab));
        $log = Helper::create_log('Modul Riwayat Jabatan Pegawai NIP.' . $request->nip . ' satker:' . $request->satker, 'Update Data', $temp);
        $log->save();
        return redirect()->route('pegawai.jabatan', $request->token)->with('success', 'Data berhasil diubah.');
    }
    public function jabatan_hapus($id)
    {
        $file = Rijab::find($id);
        $result = $file->delete();
        $log = Helper::create_log('Modul Riwayat Jabatan', 'Hapus Data', $file);
        $log->save();
        if ($result) {
            return redirect()->route('pegawai.jabatan', $file->token)->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('pegawai')->with('success', 'Gagal menghapus data');
        }
    }
}