<?php

/*==============================================================

    NAMA CONTROLLER : QoriCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 12 April  2024 Jam 07.21
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Qori Controller

    ===============================================================*/


    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Kabkota;
    use App\Models\Qorihafiz;
    use App\Models\Struktur;
    use DataTables;
    use Helper;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Crypt;
    use Illuminate\Support\Facades\Auth;
    use RealRashid\SweetAlert\Facades\Alert;

class QoriController extends Controller
{
    public function index(Request $request)
    {
      
        // --------- Untuk Membuat data awal jika data kosong ---------- 
        $user = Auth::user();
        $kab = Kabkota::all();
        $tempstruk = Struktur::first();
        $tahun=$tempstruk->tahun_priode;
        $qori= Qorihafiz::where('tahun',$tahun)->first();
        if(is_null($qori))
        {
            foreach ($kab as $kabs) {
                $temp = new Qorihafiz;
                $temp->id_wilayah = $kabs->id;
                $temp->qori_pria=0;
                $temp->qori_wanita=0;
                $temp->hafiz_pria=0;
                $temp->hafiz_wanita=0;
                $temp->tahun = $tahun;
                $temp->username = $user->username;
                $temp->save();
            }
        }

       
        $dataqorihafiz = DB::select('select k.id as idx,p.id as id, k.nama as nama, qori_pria,qori_wanita,hafiz_pria,hafiz_wanita from kabkota k left join tb_qori p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

        return view('pages.keagamaan.qori',compact('dataqorihafiz','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);

    }

   


    

    public function update_qori(Request $request, Qorihafiz $qorihafiz, $data)
    {
        if($request->ajax()){
            $qorihafiz->find($request->pk)->update([$data=>$request->value,'updated_at' =>  \Carbon\Carbon::now()] );
            return response()->json(['success'=>true]);
        }
    } 


}
