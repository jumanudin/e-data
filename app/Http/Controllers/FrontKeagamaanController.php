<?php
/*==============================================================

    NAMA CONTROLLER : FrontKeagamaanCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 22 Mei 2024
    TANGGAL SELESAI : 07 Juni 2024
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Front End Tampilan
                      Data Layanan Keagamaan 

    ===============================================================*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabkota;
use App\Models\Unit;
// ------------ Kua ------------------
use App\Models\Kua;
use App\Models\Peristiwa;

// ----------------- Penyuluh PNS ---------
use App\Models\PenyuluhIslam;
use App\Models\PenyuluhKristen;
use App\Models\PenyuluhKatolik;
use App\Models\PenyuluhHindu;
use App\Models\PenyuluhBuddha;
use App\Models\PenyuluhKhonghucu;


// ----------------- Rumah Ibadah ---------------------------
use App\Models\RumahIbadah;

// --------------------- Ormas ------------------------------
use App\Models\Ormas;

// ------------------ Penyuluh Penerima Tunjangan -----------
use App\Models\Tunjangan;

// --------------------- Wakaf ------------------------------
use App\Models\Wakaf;

// ---------------------- Wilayah ---------------------------
use App\Models\Wilayah;

// ------------------------ Qori ----------------------------
use App\Models\Qorihafiz;

// --------------------------- Masjid -----------------------
use App\Models\Masjid;

// -------------------------- Penduduk ------------------------
use App\Models\Tb_penduduk;

use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FrontKeagamaanController extends Controller
{
    function __construct()
    {
        
        $this->tempstruk = Struktur::first();
        $this->tahun=$this->tempstruk->tahun_priode;
        $this->satker = Unit::whereIn('kd_satker',['kanwil','pkp','bangka','bateng','babar','basel','belitung','beltim'])->get();
        $this->kab = Kabkota::all();
       
        
    }  
    
      /*===================================================================================================

                                            FRONT END
                                            LAYANAN KEAGAMAAN : KUA
     
     
     ====================================================================================================*/
    
     public function  keagamaan_kua(){
        
        $tempstruk=$this->tempstruk;
        $datatipologi = DB::select('select k.id as idx,p.id as id, k.nama as nama, type_a,type_b,type_c,type_d,type_d2 from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $datajml_tipologi = DB::select('select sum(type_a) as type_a,sum(type_b) as type_b,sum(type_c) as type_c,sum(type_d) as type_d,sum(type_d2) as type_d2 from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
        $datastatus = DB::select('select k.id as idx,p.id as id, k.nama as nama, jml_serti,jml_belum,baik,rsk_ringan,rsk_sedang from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $data_jmlstatus = DB::select('select sum(jml_serti) as sudah,sum(jml_belum) as belum,sum(baik) as baik,sum(rsk_ringan) as rusak_ringan,sum(rsk_sedang) as rusak_sedang from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
        $datarevitalisasi = DB::select('select k.id as idx,p.id as id, k.nama as nama, rehab_ringan,rehab_berat from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $data_jmlrevitalisasi = DB::select('select  sum(rehab_ringan) as rehab_ringan,sum(rehab_berat) as rehab_berat from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
        
        $databalainikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, balai_nikah from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
        $datapenghulu = DB::select('select k.id as idx,p.id as id, k.nama as nama, peng_pertama,peng_muda,peng_madya,peng_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $data_jmlpenghulu = DB::select('select sum(peng_pertama) as peng_pertama,sum(peng_muda) as peng_muda,sum(peng_madya) as peng_madya,sum(peng_utama) as peng_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
        $datapenghuluDibina = DB::select('select k.id as idx,p.id as id, k.nama as nama, pembinaan_pertama,pembinaan_muda,pembinaan_madya,pembinaan_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $data_jmlpenghuluDibina = DB::select('select sum(pembinaan_pertama) as pembinaan_pertama,sum(pembinaan_muda) as pembinaan_muda,sum(pembinaan_madya) as pembinaan_madya,sum(pembinaan_utama) as pembinaan_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
        
        $datatempatNikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, kua,luar_kua from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $data_jmltempatNikah = DB::select('select sum( kua) as kua,sum(luar_kua) as luar_kua from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
        $dataperistiwa = DB::select('select k.id as idx,p.id as id, k.nama as nama, jan,feb,mar,apr,mei,jun,jul,ags,sep,okt,nov,des from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $data_jmlperistiwa = DB::select('select sum(jan) as jan,sum(feb) as feb,sum(mar) as mar,sum(apr) as apr,sum(mei) as mei,sum(jun) as jun,sum(jul) as jul,sum(ags) as ags,sum(sep) as sep,sum(okt) as okt,sum(nov) as nov,sum(des) as des from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
        $databukunikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, buku_nikah, kartu_nikah from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
       

    //    ---------------- Tipologi KUA -------------------------- 

        if(empty($datajml_tipologi))
        {
                      
            $datachart_kua[]=0;
           

            
        }else{

            foreach ($datajml_tipologi as $tipologi) {
            
                $datachart_kua=array(
                 round(($tipologi->type_a/($tipologi->type_a+$tipologi->type_b+$tipologi->type_c+$tipologi->type_d2))*100,2),
                 round(($tipologi->type_b/($tipologi->type_a+$tipologi->type_b+$tipologi->type_c+$tipologi->type_d2))*100,2),
                 round(($tipologi->type_c/($tipologi->type_a+$tipologi->type_b+$tipologi->type_c+$tipologi->type_d2))*100,2),
                 round(($tipologi->type_d2/($tipologi->type_a+$tipologi->type_b+$tipologi->type_c+$tipologi->type_d2))*100,2)
                        );
                 }
               
    
        }



        // ------------------------ Status dan Kondisi Bangunan KUA------------------------

        foreach ($data_jmlstatus as $status) {

            $datachart_status=array(
                $status->sudah,
                $status->belum,
                $status->baik,
                $status->rusak_ringan,       
                $status->rusak_sedang,       
                );
        }



        // ------------------------ Revitalisasi KUA------------------------

        if(empty($data_jmlrevitalisasi))
        {
                      
            $datachart_revitalisasi[]=0;
           
    
            
        }else {

            foreach ($data_jmlrevitalisasi as $revitalisasi) {

                $datachart_revitalisasi=array(
                    round(($revitalisasi->rehab_ringan/($revitalisasi->rehab_ringan+$revitalisasi->rehab_berat))*100,2),
                    round(($revitalisasi->rehab_berat/($revitalisasi->rehab_ringan+$revitalisasi->rehab_berat))*100,2),
                     
                    );
            }
    
        }

        // ----------------------------- Balai Nikah -----------------------

        
        
        foreach ($databalainikah as $balainikah) {
            
            $datachart_balainikah[]= $balainikah->balai_nikah;

        }

        // ------------------------ Tingkatan Jabatan Penghulu KUA ------------------------

        foreach ($data_jmlpenghulu as $penghulu) {

            $datachart_penghulu=array(
                $penghulu->peng_pertama,
                $penghulu->peng_muda,
                $penghulu->peng_madya,
                $penghulu->peng_utama,       
                );
        }


        // ------------------------ Tingkatan Jabatan Penghulu KUA Yang dibina ------------------------

        foreach ($data_jmlpenghuluDibina as $pembinaan) {

            $datachart_penghuludibina=array(
                $pembinaan->pembinaan_pertama,
                $pembinaan->pembinaan_muda,
                $pembinaan->pembinaan_madya,
                $pembinaan->pembinaan_utama,       
                );
        }




    //    ---------------- Tempat NIKAH -------------------------- 

    if(empty($data_jmltempatNikah))
    {
                  
        $datachart_tempatNikah=0;
       

        
    }else{

        foreach ($data_jmltempatNikah as $tempatNikah) {
        
            $datachart_tempatNikah=array(
             round(($tempatNikah->kua/($tempatNikah->kua+$tempatNikah->luar_kua))*100,2),
             round(($tempatNikah->luar_kua/($tempatNikah->kua+$tempatNikah->luar_kua))*100,2)
                    );
             }
           

    }

    // ------------------------ Chart Peristiwa Nikah ------------------------

    foreach ($data_jmlperistiwa as $peristiwa) {

        $datachart_jmlperistiwa=array(
            $peristiwa->jan,
            $peristiwa->feb,
            $peristiwa->mar,
            $peristiwa->apr,       
            $peristiwa->mei,       
            $peristiwa->jun,       
            $peristiwa->jul,       
            $peristiwa->ags,       
            $peristiwa->sep,       
            $peristiwa->okt,       
            $peristiwa->nov,       
            $peristiwa->des       
            );
    }


        return view('kua',compact('datachart_balainikah','datachart_revitalisasi','datachart_status','datachart_jmlperistiwa','datachart_tempatNikah','datachart_penghuludibina','datachart_penghulu','datachart_kua','datatipologi','datastatus','datarevitalisasi','databalainikah','datapenghulu','datapenghuluDibina','datatempatNikah','dataperistiwa','databukunikah','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);


     }  

     

     public function  getChartKeagamaanKua($tahun){
        
        $tempstruk=$this->tempstruk;
        $datatipologi = DB::select('select k.id as idx,p.id as id, k.nama as nama, type_a,type_b,type_c,type_d,type_d2 from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datajml_tipologi = DB::select('select sum(type_a) as type_a,sum(type_b) as type_b,sum(type_c) as type_c,sum(type_d) as type_d,sum(type_d2) as type_d2 from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        $datastatus = DB::select('select k.id as idx,p.id as id, k.nama as nama, jml_serti,jml_belum,baik,rsk_ringan,rsk_sedang from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_jmlstatus = DB::select('select sum(jml_serti) as sudah,sum(jml_belum) as belum,sum(baik) as baik,sum(rsk_ringan) as rusak_ringan,sum(rsk_sedang) as rusak_sedang from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        $datarevitalisasi = DB::select('select k.id as idx,p.id as id, k.nama as nama, rehab_ringan,rehab_berat from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_jmlrevitalisasi = DB::select('select  sum(rehab_ringan) as rehab_ringan,sum(rehab_berat) as rehab_berat from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        
        $databalainikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, balai_nikah from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        $datapenghulu = DB::select('select k.id as idx,p.id as id, k.nama as nama, peng_pertama,peng_muda,peng_madya,peng_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_jmlpenghulu = DB::select('select sum(peng_pertama) as peng_pertama,sum(peng_muda) as peng_muda,sum(peng_madya) as peng_madya,sum(peng_utama) as peng_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        $datapenghuluDibina = DB::select('select k.id as idx,p.id as id, k.nama as nama, pembinaan_pertama,pembinaan_muda,pembinaan_madya,pembinaan_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_jmlpenghuluDibina = DB::select('select sum(pembinaan_pertama) as pembinaan_pertama,sum(pembinaan_muda) as pembinaan_muda,sum(pembinaan_madya) as pembinaan_madya,sum(pembinaan_utama) as pembinaan_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        
        $datatempatNikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, kua,luar_kua from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_jmltempatNikah = DB::select('select sum( kua) as kua,sum(luar_kua) as luar_kua from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        $dataperistiwa = DB::select('select k.id as idx,p.id as id, k.nama as nama, jan,feb,mar,apr,mei,jun,jul,ags,sep,okt,nov,des from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_jmlperistiwa = DB::select('select sum(jan) as jan,sum(feb) as feb,sum(mar) as mar,sum(apr) as apr,sum(mei) as mei,sum(jun) as jun,sum(jul) as jul,sum(ags) as ags,sum(sep) as sep,sum(okt) as okt,sum(nov) as nov,sum(des) as des from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        $databukunikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, buku_nikah, kartu_nikah from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
       

    //    ---------------- Tipologi KUA -------------------------- 

        if(is_null($datajml_tipologi))
        {
                      
            $datachart_kua[]=0;
           

            
        }else{

            foreach ($datajml_tipologi as $tipologi) {
            
                $cekjml=$tipologi->type_a+$tipologi->type_b+$tipologi->type_c+$tipologi->type_d2;
                $datachart_kua=array(
                    $cekjml=== 0? 0 : round(($tipologi->type_a/$cekjml)*100,2),
                    $cekjml=== 0? 0 : round(($tipologi->type_b/$cekjml)*100,2),
                    $cekjml=== 0? 0 : round(($tipologi->type_c/$cekjml)*100,2),
                    $cekjml=== 0? 0 : round(($tipologi->type_d2/$cekjml)*100,2)
                        );
                 }
               
    
        }



        // ------------------------ Status dan Kondisi Bangunan KUA------------------------

        foreach ($data_jmlstatus as $status) {

            $datachart_status=array(
                $status->sudah,
                $status->belum,
                $status->baik,
                $status->rusak_ringan,       
                $status->rusak_sedang,       
                );
        }



        // ------------------------ Revitalisasi KUA------------------------

        if(empty($data_jmlrevitalisasi))
        {
                      
            $datachart_revitalisasi[]=0;
           
    
            
        }else {

            foreach ($data_jmlrevitalisasi as $revitalisasi) {

                $cekjml_revitalisasi=$revitalisasi->rehab_ringan+$revitalisasi->rehab_berat;

                $datachart_revitalisasi=array(
                    $cekjml_revitalisasi === 0 ? 0 : round(($revitalisasi->rehab_ringan/$cekjml_revitalisasi)*100,2),
                    $cekjml_revitalisasi === 0 ? 0 : round(($revitalisasi->rehab_berat/$cekjml_revitalisasi)*100,2),
                     
                    );
            }
    
        }

        // ----------------------------- Balai Nikah -----------------------

        if (empty($databalainikah))
        {
            $datachart_balainikah[]=0;
        }else {

            foreach ($databalainikah as $balainikah) {
            
                $datachart_balainikah[]= $balainikah->balai_nikah;
    
            }
        }

        

        // ------------------------ Tingkatan Jabatan Penghulu KUA ------------------------

        if(empty($data_jmlpenghulu))
        {
            $datachart_penghulu[]=0;
        } else {

            foreach ($data_jmlpenghulu as $penghulu) {

                $datachart_penghulu=array(
                    $penghulu->peng_pertama,
                    $penghulu->peng_muda,
                    $penghulu->peng_madya,
                    $penghulu->peng_utama,       
                    );
            }
    

        }

        

        // ------------------------ Tingkatan Jabatan Penghulu KUA Yang dibina ------------------------

        foreach ($data_jmlpenghuluDibina as $pembinaan) {

            $datachart_penghuludibina=array(
                $pembinaan->pembinaan_pertama,
                $pembinaan->pembinaan_muda,
                $pembinaan->pembinaan_madya,
                $pembinaan->pembinaan_utama,       
                );
        }




    //    ---------------- Tempat NIKAH -------------------------- 

    if(empty($data_jmltempatNikah))
    {
                  
        $datachart_tempatNikah=0;
       

        
    }else{

        foreach ($data_jmltempatNikah as $tempatNikah) {

            $cekjml_tempatnikah=$tempatNikah->kua+$tempatNikah->luar_kua;
        
            $datachart_tempatNikah=array(
                $cekjml_tempatnikah ===0 ? 0 : round(($tempatNikah->kua/$cekjml_tempatnikah)*100,2),
                $cekjml_tempatnikah ===0 ? 0 : round(($tempatNikah->luar_kua/$cekjml_tempatnikah)*100,2)
                    );
             }
           

    }

    // ------------------------ Chart Peristiwa Nikah ------------------------

    foreach ($data_jmlperistiwa as $peristiwa) {

        $datachart_jmlperistiwa=array(
            $peristiwa->jan,
            $peristiwa->feb,
            $peristiwa->mar,
            $peristiwa->apr,       
            $peristiwa->mei,       
            $peristiwa->jun,       
            $peristiwa->jul,       
            $peristiwa->ags,       
            $peristiwa->sep,       
            $peristiwa->okt,       
            $peristiwa->nov,       
            $peristiwa->des       
            );
    }

    $data=array(
        'datachart_balainikah'          =>$datachart_balainikah,
        'datachart_revitalisasi'        =>$datachart_revitalisasi,
        'datachart_status'              =>$datachart_status,
        'datachart_jmlperistiwa'        =>$datachart_jmlperistiwa,
        'datachart_tempatNikah'         =>$datachart_tempatNikah,
        'datachart_penghuludibina'      =>$datachart_penghuludibina,
        'datachart_penghulu'            =>$datachart_penghulu,
        'datachart_kua'                 =>$datachart_kua,
        'datatipologi'                  =>$datatipologi,
        'datastatus'                    =>$datastatus,
        'datarevitalisasi'              =>$datarevitalisasi,
        'databalainikah'                =>$databalainikah,
        'datapenghulu'                  =>$datapenghulu,
        'datapenghuluDibina'            =>$datapenghuluDibina,
        'databalainikah'                =>$databalainikah,
        'datatempatNikah'               =>$datatempatNikah,
        'dataperistiwa'                 =>$dataperistiwa,
        'databukunikah'                 =>$databukunikah,
        'tempstruk'                     =>$tempstruk
        
    );

    return response()->json($data);


}  


// ========================= untuk merubah Tabel keagamaan KUA =================================

public function getTabelKeagamaanKua($tahun,$jenis_data)
    {
        $tempstruk=$this->tempstruk;
        $datatipologi = DB::select('select k.id as idx,p.id as id, k.nama as nama, type_a,type_b,type_c,type_d,type_d2 from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datastatus = DB::select('select k.id as idx,p.id as id, k.nama as nama, jml_serti,jml_belum,baik,rsk_ringan,rsk_sedang from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datarevitalisasi = DB::select('select k.id as idx,p.id as id, k.nama as nama, rehab_ringan,rehab_berat from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        $databalainikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, balai_nikah from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        $datapenghulu = DB::select('select k.id as idx,p.id as id, k.nama as nama, peng_pertama,peng_muda,peng_madya,peng_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datapenghuluDibina = DB::select('select k.id as idx,p.id as id, k.nama as nama, pembinaan_pertama,pembinaan_muda,pembinaan_madya,pembinaan_utama from kabkota k left join tb_kua p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datatempatNikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, kua,luar_kua from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $dataperistiwa = DB::select('select k.id as idx,p.id as id, k.nama as nama, jan,feb,mar,apr,mei,jun,jul,ags,sep,okt,nov,des from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $databukunikah = DB::select('select k.id as idx,p.id as id, k.nama as nama, buku_nikah, kartu_nikah from kabkota k left join tb_nikah p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
       

        switch($jenis_data){

            case 'tipologi':
                return \DataTables::of($datatipologi)
                    ->addIndexColumn()
                    ->make(true);
                break;
        
            case 'status':
                return \DataTables::of($datastatus)
                    ->addIndexColumn()
                    ->make(true);
                break;
        
            case 'revitalisasi':
                return \DataTables::of($datarevitalisasi)
                    ->addIndexColumn()
                    ->make(true);
                break;
            
            case 'balainikah':
                    return \DataTables::of($databalainikah)
                        ->addIndexColumn()
                        ->make(true);
                    break;
                    
            case 'penghulu':
                    return \DataTables::of($datapenghulu)
                        ->addIndexColumn()
                        ->make(true);
                    break;

            case 'penghuludibina':
                        return \DataTables::of($datapenghuluDibina)
                            ->addIndexColumn()
                            ->make(true);
                        break;

            case 'tempatnikah':
                        return \DataTables::of($datatempatNikah)
                            ->addIndexColumn()
                            ->make(true);
                        break;

            
            case 'peristiwanikah':
                        return \DataTables::of($dataperistiwa)
                            ->addIndexColumn()
                            ->make(true);
                        break;

            case 'bukunikah':
                        return \DataTables::of($databukunikah)
                            ->addIndexColumn()
                            ->make(true);
                        break;
            
            default:

                    return \DataTables::of($dataperistiwa)
                    ->addIndexColumn()
                    ->make(true);
            
        }
    }



      /*===================================================================================================

                                            FRONT END

                                            LAYANAN KEAGAMAAN : PENYULUH AGAMA ISLAM

     ====================================================================================================*/



     public function keagamaan_islam(){


        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_islam p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_islam p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
         // ------------------------ PENYULUH ISLAM ------------------------

         if (empty($datajumlah)){
            $datachart_penyuluhislam[]=0;
         }else{

            foreach ($datajumlah as $datapenhyuluh) {

                $datachart_penyuluhislam=array(
                    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
                    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
                    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
                    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
                          
                    );
            }
    
    
         }

         
        // ------------------------ PENYULUH PNS ISLAM ------------------------

        foreach ($datajumlah as $datapns) {

            $datachart_pnsislam=array(
                $datapns->pns_pria,
                $datapns->pns_wanita,
                $datapns->kurang_s1,
                $datapns->s1,
                $datapns->lebih_s1,
                );
        }


          // ------------------------ PENYULUH NON PNS ISLAM ------------------------

          foreach ($datajumlah as $datanonpns) {

            $datachart_nonpnsislam=array(
                $datanonpns->nonpns_pria,
                $datanonpns->nonpns_wanita,
                $datanonpns->kurang_s1_non,
                $datanonpns->s1_non,
                $datanonpns->lebih_s1_non,
                );
        }

        

        return view('penyuluh_islam',compact('data','tempstruk','datachart_nonpnsislam','datachart_pnsislam','datachart_penyuluhislam'))
        ->with('i',(request()->input('page',1) - 1) * 10);

     }



     public function getChartKeagamaanIslam($tahun){


        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_islam p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_islam p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
         // ------------------------ PENYULUH ISLAM ------------------------

         if (empty($datajumlah)){
            $datachart_penyuluhislam[]=0;
         }else{

            foreach ($datajumlah as $datapenhyuluh) {

                $datachart_penyuluhislam=array(
                    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
                    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
                    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
                    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
                          
                    );
            }
    
    
         }

         
        // ------------------------ PENYULUH PNS ISLAM ------------------------

        foreach ($datajumlah as $datapns) {

            $datachart_pnsislam=array(
                $datapns->pns_pria,
                $datapns->pns_wanita,
                $datapns->kurang_s1,
                $datapns->s1,
                $datapns->lebih_s1,
                );
        }


          // ------------------------ PENYULUH NON PNS ISLAM ------------------------

          foreach ($datajumlah as $datanonpns) {

            $datachart_nonpnsislam=array(
                $datanonpns->nonpns_pria,
                $datanonpns->nonpns_wanita,
                $datanonpns->kurang_s1_non,
                $datanonpns->s1_non,
                $datanonpns->lebih_s1_non,
                );
        }

        

        $data=array(
            'datachart_penyuluhislam'          =>$datachart_penyuluhislam,
            'datachart_pnsislam'               =>$datachart_pnsislam,
            'datachart_nonpnsislam'            =>$datachart_nonpnsislam,
            'tempstruk'                        =>$tempstruk
            
        );
    
        return response()->json($data);
    
     }


     // ========================= untuk merubah Tabel keagamaan Islam =================================

public function getTabelKeagamaanIslam($tahun,$jenis_data)
{
    
        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_islam p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

    switch($jenis_data){

        case 'penyuluhislam':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;
    
        case 'pnsislam':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;
    
        case 'nonpnsislam':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;

        default:

                return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        
    }
}


      /*===================================================================================================

                                            FRONT END

                                            LAYANAN KEAGAMAAN : PENYULUH AGAMA KRISTEN

     ====================================================================================================*/



     public function keagamaan_kristen(){


        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_kristen p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_kristen p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
         // ------------------------ PENYULUH KRISTEN ------------------------

         if (empty($datajumlah)){
            $datachart_penyuluhkristen[]=0;
         }else{

            foreach ($datajumlah as $datapenhyuluh) {

                $datachart_penyuluhkristen=array(
                    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
                    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
                    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
                    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
                          
                    );
            }
    
    
         }

         
        // ------------------------ PENYULUH PNS kristen ------------------------

        foreach ($datajumlah as $datapns) {

            $datachart_pnskristen=array(
                $datapns->pns_pria,
                $datapns->pns_wanita,
                $datapns->kurang_s1,
                $datapns->s1,
                $datapns->lebih_s1,
                );
        }


          // ------------------------ PENYULUH NON PNS kristen ------------------------

          foreach ($datajumlah as $datanonpns) {

            $datachart_nonpnskristen=array(
                $datanonpns->nonpns_pria,
                $datanonpns->nonpns_wanita,
                $datanonpns->kurang_s1_non,
                $datanonpns->s1_non,
                $datanonpns->lebih_s1_non,
                );
        }

        

        return view('penyuluh_kristen',compact('data','tempstruk','datachart_nonpnskristen','datachart_pnskristen','datachart_penyuluhkristen'))
        ->with('i',(request()->input('page',1) - 1) * 10);

     }



     public function getChartKeagamaankristen($tahun){


        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_kristen p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_kristen p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
         // ------------------------ PENYULUH kristen ------------------------

         if (empty($datajumlah)){
            $datachart_penyuluhkristen[]=0;
         }else{

            foreach ($datajumlah as $datapenhyuluh) {

                $datachart_penyuluhkristen=array(
                    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
                    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
                    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
                    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,      
                    );
            }
    
    
         }

         
        // ------------------------ PENYULUH PNS kristen ------------------------

        foreach ($datajumlah as $datapns) {

            $datachart_pnskristen=array(
                $datapns->pns_pria,
                $datapns->pns_wanita,
                $datapns->kurang_s1,
                $datapns->s1,
                $datapns->lebih_s1,
                );
        }


          // ------------------------ PENYULUH NON PNS kristen ------------------------

          foreach ($datajumlah as $datanonpns) {

            $datachart_nonpnskristen=array(
                $datanonpns->nonpns_pria,
                $datanonpns->nonpns_wanita,
                $datanonpns->kurang_s1_non,
                $datanonpns->s1_non,
                $datanonpns->lebih_s1_non,
                );
        }

        

        $data=array(
            'datachart_penyuluhkristen'          =>$datachart_penyuluhkristen,
            'datachart_pnskristen'               =>$datachart_pnskristen,
            'datachart_nonpnskristen'            =>$datachart_nonpnskristen,
            'tempstruk'                        =>$tempstruk
            
        );
    
        return response()->json($data);
    
     }


     // ========================= untuk merubah Tabel keagamaan kristen =================================

public function getTabelKeagamaankristen($tahun,$jenis_data)
{
    
        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_kristen p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

    switch($jenis_data){

        case 'penyuluhkristen':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;
    
        case 'pnskristen':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;
    
        case 'nonpnskristen':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;

        default:

                return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        
    }
}


      /*===================================================================================================

                                            FRONT END

                                            LAYANAN KEAGAMAAN : PENYULUH AGAMA katolik

     ====================================================================================================*/



     public function keagamaan_katolik(){


        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_katolik p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_katolik p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
         // ------------------------ PENYULUH katolik ------------------------

         if (empty($datajumlah)){
            $datachart_penyuluhkatolik[]=0;
         }else{

            foreach ($datajumlah as $datapenhyuluh) {

                $datachart_penyuluhkatolik=array(
                    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
                    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
                    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
                    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,      
                    );
            }
    
    
         }

         
        // ------------------------ PENYULUH PNS katolik ------------------------

        foreach ($datajumlah as $datapns) {

            $datachart_pnskatolik=array(
                $datapns->pns_pria,
                $datapns->pns_wanita,
                $datapns->kurang_s1,
                $datapns->s1,
                $datapns->lebih_s1,
                );
        }


          // ------------------------ PENYULUH NON PNS katolik ------------------------

          foreach ($datajumlah as $datanonpns) {

            $datachart_nonpnskatolik=array(
                $datanonpns->nonpns_pria,
                $datanonpns->nonpns_wanita,
                $datanonpns->kurang_s1_non,
                $datanonpns->s1_non,
                $datanonpns->lebih_s1_non,
                );
        }

        

        return view('penyuluh_katolik',compact('data','tempstruk','datachart_nonpnskatolik','datachart_pnskatolik','datachart_penyuluhkatolik'))
        ->with('i',(request()->input('page',1) - 1) * 10);

     }



     public function getChartKeagamaankatolik($tahun){


        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_katolik p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_katolik p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
         // ------------------------ PENYULUH katolik ------------------------

         if (empty($datajumlah)){
            $datachart_penyuluhkatolik[]=0;
         }else{

            foreach ($datajumlah as $datapenhyuluh) {

                $datachart_penyuluhkatolik=array(
                    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
                    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
                    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
                    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
                          
                    );
            }
    
    
         }

         
        // ------------------------ PENYULUH PNS katolik ------------------------

        foreach ($datajumlah as $datapns) {

            $datachart_pnskatolik=array(
                $datapns->pns_pria,
                $datapns->pns_wanita,
                $datapns->kurang_s1,
                $datapns->s1,
                $datapns->lebih_s1,
                );
        }


          // ------------------------ PENYULUH NON PNS katolik ------------------------

          foreach ($datajumlah as $datanonpns) {

            $datachart_nonpnskatolik=array(
                $datanonpns->nonpns_pria,
                $datanonpns->nonpns_wanita,
                $datanonpns->kurang_s1_non,
                $datanonpns->s1_non,
                $datanonpns->lebih_s1_non,
                );
        }

        

        $data=array(
            'datachart_penyuluhkatolik'          =>$datachart_penyuluhkatolik,
            'datachart_pnskatolik'               =>$datachart_pnskatolik,
            'datachart_nonpnskatolik'            =>$datachart_nonpnskatolik,
            'tempstruk'                        =>$tempstruk
            
        );
    
        return response()->json($data);
    
     }


     // ========================= untuk merubah Tabel keagamaan katolik =================================

public function getTabelKeagamaankatolik($tahun,$jenis_data)
{
    
        $tempstruk = Struktur::first();
        $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_katolik p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        

    switch($jenis_data){

        case 'penyuluhkatolik':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;
    
        case 'pnskatolik':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;
    
        case 'nonpnskatolik':
            return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
            break;

        default:

                return \DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        
    }
}

/*===================================================================================================

FRONT END

LAYANAN KEAGAMAAN : PENYULUH AGAMA HINDU

====================================================================================================*/



public function keagamaan_hindu(){


    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_hindu p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_hindu p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    
    // ------------------------ PENYULUH HINDU ------------------------
    
    if (empty($datajumlah)){
    $datachart_penyuluhhindu[]=0;
    }else{
    
    foreach ($datajumlah as $datapenhyuluh) {
    
    $datachart_penyuluhhindu=array(
    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
    
    );
    }
    
    
    }
    
    
    // ------------------------ PENYULUH PNS hindu ------------------------
    
    foreach ($datajumlah as $datapns) {
    
    $datachart_pnshindu=array(
    $datapns->pns_pria,
    $datapns->pns_wanita,
    $datapns->kurang_s1,
    $datapns->s1,
    $datapns->lebih_s1,
    );
    }
    
    
    // ------------------------ PENYULUH NON PNS hindu ------------------------
    
    foreach ($datajumlah as $datanonpns) {
    
    $datachart_nonpnshindu=array(
    $datanonpns->nonpns_pria,
    $datanonpns->nonpns_wanita,
    $datanonpns->kurang_s1_non,
    $datanonpns->s1_non,
    $datanonpns->lebih_s1_non,
    );
    }
    
    
    
    return view('penyuluh_hindu',compact('data','tempstruk','datachart_nonpnshindu','datachart_pnshindu','datachart_penyuluhhindu'))
    ->with('i',(request()->input('page',1) - 1) * 10);
    
    }
    
    
    
    public function getChartKeagamaanhindu($tahun){
    
    
    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_hindu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_hindu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    
    // ------------------------ PENYULUH hindu ------------------------
    
    if (empty($datajumlah)){
    $datachart_penyuluhhindu[]=0;
    }else{
    
    foreach ($datajumlah as $datapenhyuluh) {
    
    $datachart_penyuluhhindu=array(
    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
    
    );
    }
    
    
    }
    
    
    // ------------------------ PENYULUH PNS hindu ------------------------
    
    foreach ($datajumlah as $datapns) {
    
    $datachart_pnshindu=array(
    $datapns->pns_pria,
    $datapns->pns_wanita,
    $datapns->kurang_s1,
    $datapns->s1,
    $datapns->lebih_s1,
    );
    }
    
    
    // ------------------------ PENYULUH NON PNS hindu ------------------------
    
    foreach ($datajumlah as $datanonpns) {
    
    $datachart_nonpnshindu=array(
    $datanonpns->nonpns_pria,
    $datanonpns->nonpns_wanita,
    $datanonpns->kurang_s1_non,
    $datanonpns->s1_non,
    $datanonpns->lebih_s1_non,
    );
    }
    
    
    
    $data=array(
    'datachart_penyuluhhindu'          =>$datachart_penyuluhhindu,
    'datachart_pnshindu'               =>$datachart_pnshindu,
    'datachart_nonpnshindu'            =>$datachart_nonpnshindu,
    'tempstruk'                        =>$tempstruk
    
    );
    
    return response()->json($data);
    
    }
    
    
    // ========================= untuk merubah Tabel keagamaan hindu =================================
    
    public function getTabelKeagamaanhindu($tahun,$jenis_data)
    {
    
    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_hindu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    
    
    switch($jenis_data){
    
    case 'penyuluhhindu':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    case 'pnshindu':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    case 'nonpnshindu':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    default:
    
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    
    }
}

/*===================================================================================================

FRONT END

LAYANAN KEAGAMAAN : PENYULUH AGAMA buddha

====================================================================================================*/



public function keagamaan_buddha(){


    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_buddha p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_buddha p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    
    // ------------------------ PENYULUH buddha ------------------------
    
    if (empty($datajumlah)){
    $datachart_penyuluhbuddha[]=0;
    }else{
    
    foreach ($datajumlah as $datapenhyuluh) {
    
    $datachart_penyuluhbuddha=array(
    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
    
    );
    }
    
    
    }
    
    
    // ------------------------ PENYULUH PNS buddha ------------------------
    
    foreach ($datajumlah as $datapns) {
    
    $datachart_pnsbuddha=array(
    $datapns->pns_pria,
    $datapns->pns_wanita,
    $datapns->kurang_s1,
    $datapns->s1,
    $datapns->lebih_s1,
    );
    }
    
    
    // ------------------------ PENYULUH NON PNS buddha ------------------------
    
    foreach ($datajumlah as $datanonpns) {
    
    $datachart_nonpnsbuddha=array(
    $datanonpns->nonpns_pria,
    $datanonpns->nonpns_wanita,
    $datanonpns->kurang_s1_non,
    $datanonpns->s1_non,
    $datanonpns->lebih_s1_non,
    );
    }
    
    
    
    return view('penyuluh_buddha',compact('data','tempstruk','datachart_nonpnsbuddha','datachart_pnsbuddha','datachart_penyuluhbuddha'))
    ->with('i',(request()->input('page',1) - 1) * 10);
    
    }
    
    
    
    public function getChartKeagamaanbuddha($tahun){
    
    
    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_buddha p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_buddha p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    
    // ------------------------ PENYULUH buddha ------------------------
    
    if (empty($datajumlah)){
    $datachart_penyuluhbuddha[]=0;
    }else{
    
    foreach ($datajumlah as $datapenhyuluh) {
    
    $datachart_penyuluhbuddha=array(
    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
    
    );
    }
    
    
    }
    
    
    // ------------------------ PENYULUH PNS buddha ------------------------
    
    foreach ($datajumlah as $datapns) {
    
    $datachart_pnsbuddha=array(
    $datapns->pns_pria,
    $datapns->pns_wanita,
    $datapns->kurang_s1,
    $datapns->s1,
    $datapns->lebih_s1,
    );
    }
    
    
    // ------------------------ PENYULUH NON PNS buddha ------------------------
    
    foreach ($datajumlah as $datanonpns) {
    
    $datachart_nonpnsbuddha=array(
    $datanonpns->nonpns_pria,
    $datanonpns->nonpns_wanita,
    $datanonpns->kurang_s1_non,
    $datanonpns->s1_non,
    $datanonpns->lebih_s1_non,
    );
    }
    
    
    
    $data=array(
    'datachart_penyuluhbuddha'          =>$datachart_penyuluhbuddha,
    'datachart_pnsbuddha'               =>$datachart_pnsbuddha,
    'datachart_nonpnsbuddha'            =>$datachart_nonpnsbuddha,
    'tempstruk'                        =>$tempstruk
    
    );
    
    return response()->json($data);
    
    }
    
    
    // ========================= untuk merubah Tabel keagamaan buddha =================================
    
    public function getTabelKeagamaanbuddha($tahun,$jenis_data)
    {
    
    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_buddha p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    
    
    switch($jenis_data){
    
    case 'penyuluhbuddha':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    case 'pnsbuddha':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    case 'nonpnsbuddha':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    default:
    
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    
    }
}


/*===================================================================================================

FRONT END

LAYANAN KEAGAMAAN : PENYULUH AGAMA KHONGHUCU

====================================================================================================*/



public function keagamaan_khonghucu(){


    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_khonghucu p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_khonghucu p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    
    // ------------------------ PENYULUH khonghucu ------------------------
    
    if (empty($datajumlah)){
    $datachart_penyuluhkhonghucu[]=0;
    }else{
    
    foreach ($datajumlah as $datapenhyuluh) {
    
    $datachart_penyuluhkhonghucu=array(
    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
    
    );
    }
    
    
    }
    
    
    // ------------------------ PENYULUH PNS khonghucu ------------------------
    
    foreach ($datajumlah as $datapns) {
    
    $datachart_pnskhonghucu=array(
    $datapns->pns_pria,
    $datapns->pns_wanita,
    $datapns->kurang_s1,
    $datapns->s1,
    $datapns->lebih_s1,
    );
    }
    
    
    // ------------------------ PENYULUH NON PNS khonghucu ------------------------
    
    foreach ($datajumlah as $datanonpns) {
    
    $datachart_nonpnskhonghucu=array(
    $datanonpns->nonpns_pria,
    $datanonpns->nonpns_wanita,
    $datanonpns->kurang_s1_non,
    $datanonpns->s1_non,
    $datanonpns->lebih_s1_non,
    );
    }
    
    
    
    return view('penyuluh_khonghucu',compact('data','tempstruk','datachart_nonpnskhonghucu','datachart_pnskhonghucu','datachart_penyuluhkhonghucu'))
    ->with('i',(request()->input('page',1) - 1) * 10);
    
    }
    
    
    
    public function getChartKeagamaankhonghucu($tahun){
    
    
    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_khonghucu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datajumlah = DB::select('select  sum(pns_pria) as pns_pria,sum(pns_wanita) as pns_wanita,sum(nonpns_pria) as nonpns_pria,sum(nonpns_wanita) as nonpns_wanita,sum(kurang_s1) as kurang_s1,sum(s1) as s1,sum(lebih_s1) as lebih_s1,sum(kurang_s1_non) as kurang_s1_non,sum(s1_non) as s1_non,sum(lebih_s1_non) as lebih_s1_non from kabkota k left join tb_penyuluh_khonghucu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    
    // ------------------------ PENYULUH khonghucu ------------------------
    
    if (empty($datajumlah)){
    $datachart_penyuluhkhonghucu[]=0;
    }else{
    
    foreach ($datajumlah as $datapenhyuluh) {
    
    $datachart_penyuluhkhonghucu=array(
    $datapenhyuluh->pns_pria+$datapenhyuluh->nonpns_pria,
    $datapenhyuluh->pns_wanita+$datapenhyuluh->nonpns_wanita,
    $datapenhyuluh->pns_pria+$datapenhyuluh->pns_wanita,
    $datapenhyuluh->nonpns_pria+$datapenhyuluh->nonpns_wanita,
    
    );
    }
    
    
    }
    
    
    // ------------------------ PENYULUH PNS khonghucu ------------------------
    
    foreach ($datajumlah as $datapns) {
    
    $datachart_pnskhonghucu=array(
    $datapns->pns_pria,
    $datapns->pns_wanita,
    $datapns->kurang_s1,
    $datapns->s1,
    $datapns->lebih_s1,
    );
    }
    
    
    // ------------------------ PENYULUH NON PNS khonghucu ------------------------
    
    foreach ($datajumlah as $datanonpns) {
    
    $datachart_nonpnskhonghucu=array(
    $datanonpns->nonpns_pria,
    $datanonpns->nonpns_wanita,
    $datanonpns->kurang_s1_non,
    $datanonpns->s1_non,
    $datanonpns->lebih_s1_non,
    );
    }
    
    
    
    $data=array(
    'datachart_penyuluhkhonghucu'          =>$datachart_penyuluhkhonghucu,
    'datachart_pnskhonghucu'               =>$datachart_pnskhonghucu,
    'datachart_nonpnskhonghucu'            =>$datachart_nonpnskhonghucu,
    'tempstruk'                        =>$tempstruk
    
    );
    
    return response()->json($data);
    
    }
    
    
    // ========================= untuk merubah Tabel keagamaan khonghucu =================================
    
    public function getTabelKeagamaankhonghucu($tahun,$jenis_data)
    {
    
    $tempstruk = Struktur::first();
    $data = DB::select('select k.id as idx,p.id as id, k.nama as nama, pns_pria,pns_wanita,nonpns_pria,nonpns_wanita,kurang_s1,s1,lebih_s1,kurang_s1_non,s1_non,lebih_s1_non from kabkota k left join tb_penyuluh_khonghucu p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    
    
    switch($jenis_data){
    
    case 'penyuluhkhonghucu':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    case 'pnskhonghucu':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    case 'nonpnskhonghucu':
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    break;
    
    default:
    
    return \DataTables::of($data)
    ->addIndexColumn()
    ->make(true);
    
    }
}


/*===================================================================================================

FRONT END

LAYANAN KEAGAMAAN : WAKAF

====================================================================================================*/



public function keagamaan_wakaf(){


    $tempstruk = Struktur::first();
    $datastatuswakaf = DB::select('select k.id as idx,p.id as id, k.nama as nama, jml_serti,luas_serti,jml_belum,luas_belum from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $jml_statuswakaf = DB::select('select  sum(jml_serti) as jml_serti,sum(luas_serti) as luas_serti,sum(jml_belum) as jml_belum,sum(luas_belum) as luas_belum from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datawakafmanfaat = DB::select('select k.id as idx,p.id as id, k.nama as nama, masjid,mushalla,sekolah,pesantren,makam,sosial_lain from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $jml_wakafmanfaat = DB::select('select  sum(masjid) as masjid,sum(mushalla) as mushalla,sum(sekolah) as sekolah,sum(pesantren) as pesantren,sum(makam) as makam,sum(sosial_lain) as sosial_lain from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datawakafproduktif = DB::select('select k.id as idx,p.id as id, k.nama as nama,perkebunan,koperasi,rumah_sakit,rumah_sewa,perikanan,toko_sewa,pertanian,spbu,perkantoran_sewa,klinik,peternakan,lainnya from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $jml_wakafproduktif = DB::select('select sum(perkebunan) as perkebunan,sum(koperasi) as koperasi,sum(rumah_sakit) as rumah_sakit,sum(rumah_sewa) as rumah_sewa,sum(perikanan) as perikanan,sum(toko_sewa) as toko_sewa,sum(pertanian) as pertanian,sum(spbu) as spbu,sum(perkantoran_sewa) as perkantoran_sewa,sum(klinik) as klinic,sum(peternakan) as peternakan,sum(lainnya) as lainnya from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        
    // ------------------------LUAS TANAH WAKAF ------------------------
    
    if (empty($jml_statuswakaf)){
                $datachart_luaswakaf[]=0;
            }else{
            
                foreach ($jml_statuswakaf as $luas_wakaf) {
                
                $datachart_luaswakaf=array(
                $luas_wakaf->jml_serti+$luas_wakaf->jml_belum,
                number_format(($luas_wakaf->luas_serti+$luas_wakaf->luas_belum),2),
                
                );
            }
    
    
    }
    
    
    // ------------------------STATUS TANAH WAKAF ------------------------
    
    
//}

 // Siapkan data untuk chart
        $categories_statuswakaf = ['Pkp', 'Bangka', 'Bateng', 'Babar', 'Basel', 'Belitung', 'Beltim'];
        $jmlSertiData = [];
        $luasSertiData = [];
        $jmlBelumData = [];
        $luasBelumData = [];

        foreach ($datastatuswakaf as $data) {
            $jmlSertiData[] = $data->jml_serti ?? 0;
            $luasSertiData[] = $data->luas_serti ?? 0;
            $jmlBelumData[] = $data->jml_belum ?? 0;
            $luasBelumData[] = $data->luas_belum ?? 0;
        }

        $series_statuswakaf = [
            [
                'name' => 'Jml Sudah Sertifikat',
                'data' => $jmlSertiData
            ],
            
            [
                'name' => 'Jml Belum Sertifikat',
                'data' => $jmlBelumData
            ]
        ];
    // ------------------------PEMANFAATAN TANAH WAKAF ------------------------
    
    if (empty($jml_wakafmanfaat)){
        $chart_wakafmanfaat_data[]=0;
    }else{
    
        foreach ($jml_wakafmanfaat as $wakaf_manfaat) {

             $chart_wakafmanfaat_data=array(
                                round($wakaf_manfaat->masjid),
                                round($wakaf_manfaat->mushalla),
                                round($wakaf_manfaat->sekolah),
                                round($wakaf_manfaat->pesantren),
                                round($wakaf_manfaat->makam),
                                round($wakaf_manfaat->sosial_lain),
             
    );
    }


}
            $chart_wakafmanfaat_nama = ['Masjid', 'Mushalla', 'Sekolah', 'Pesantren', 'Makam', 'Sosial Lain'];



    //    ---------------- WAKAF PRODUKTIF -------------------------- 

    if(empty($jml_wakafproduktif))
    {
                  
        $datachart_wakafproduktif[]=0;
       

        
    }else{

        foreach ($jml_wakafproduktif as $wakafproduktif) {
        
            $cekjml=$wakafproduktif->perkebunan+$wakafproduktif->koperasi+$wakafproduktif->rumah_sakit+$wakafproduktif->rumah_sewa+
            $wakafproduktif->perikanan+$wakafproduktif->toko_sewa+$wakafproduktif->pertanian+$wakafproduktif->spbu+
            $wakafproduktif->perkantoran_sewa+$wakafproduktif->klinic+$wakafproduktif->peternakan+$wakafproduktif->lainnya;
            $datachart_wakafproduktif=array(
                round($wakafproduktif->perkebunan),
                round($wakafproduktif->koperasi),
                round($wakafproduktif->rumah_sakit),
                round($wakafproduktif->rumah_sewa),
                round($wakafproduktif->perikanan),
                round($wakafproduktif->toko_sewa),
                round($wakafproduktif->pertanian),
                round($wakafproduktif->spbu),
                round($wakafproduktif->perkantoran_sewa),
                round($wakafproduktif->klinic),
                round($wakafproduktif->peternakan),
                round($wakafproduktif->lainnya),
                    );
             }
           

    }

    
    
    return view('wakaf',compact('chart_wakafmanfaat_data','chart_wakafmanfaat_nama','series_statuswakaf', 'categories_statuswakaf','datastatuswakaf','datawakafmanfaat','datawakafproduktif','tempstruk','datachart_luaswakaf','datachart_wakafproduktif'))
    ->with('i',(request()->input('page',1) - 1) * 10);
    
    }
    
    
    
    public function getChartKeagamaanwakaf($tahun){
    
    
        $tempstruk = Struktur::first();
        $datastatuswakaf = DB::select('select k.id as idx,p.id as id, k.nama as nama, jml_serti,luas_serti,jml_belum,luas_belum from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $jml_statuswakaf = DB::select('select  sum(jml_serti) as jml_serti,sum(luas_serti) as luas_serti,sum(jml_belum) as jml_belum,sum(luas_belum) as luas_belum from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datawakafmanfaat = DB::select('select k.id as idx,p.id as id, k.nama as nama, masjid,mushalla,sekolah,pesantren,makam,sosial_lain from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $jml_wakafmanfaat = DB::select('select  sum(masjid) as masjid,sum(mushalla) as mushalla,sum(sekolah) as sekolah,sum(pesantren) as pesantren,sum(makam) as makam,sum(sosial_lain) as sosial_lain from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $datawakafproduktif = DB::select('select k.id as idx,p.id as id, k.nama as nama,perkebunan,koperasi,rumah_sakit,rumah_sewa,perikanan,toko_sewa,pertanian,spbu,perkantoran_sewa,klinik,peternakan,lainnya from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $jml_wakafproduktif = DB::select('select sum(perkebunan) as perkebunan,sum(koperasi) as koperasi,sum(rumah_sakit) as rumah_sakit,sum(rumah_sewa) as rumah_sewa,sum(perikanan) as perikanan,sum(toko_sewa) as toko_sewa,sum(pertanian) as pertanian,sum(spbu) as spbu,sum(perkantoran_sewa) as perkantoran_sewa,sum(klinik) as klinic,sum(peternakan) as peternakan,sum(lainnya) as lainnya from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
            
        // ------------------------LUAS TANAH WAKAF ------------------------
        
        if (empty($jml_statuswakaf)){
                    $datachart_luaswakaf[]=0;
                }else{
                
                    foreach ($jml_statuswakaf as $luas_wakaf) {
                    
                    $datachart_luaswakaf=array(
                    $luas_wakaf->jml_serti+$luas_wakaf->jml_belum,
                    number_format(($luas_wakaf->luas_serti+$luas_wakaf->luas_belum),2),
                    
                    );
                }
        
        
        }
        
        
        // ------------------------STATUS TANAH WAKAF ------------------------
        
        
    //}
    
     // Siapkan data untuk chart
            $categories_statuswakaf = ['Pkp', 'Bangka', 'Bateng', 'Babar', 'Basel', 'Belitung', 'Beltim'];
            $jmlSertiData = [];
            $luasSertiData = [];
            $jmlBelumData = [];
            $luasBelumData = [];
    
            foreach ($datastatuswakaf as $data) {
                $jmlSertiData[] = $data->jml_serti ?? 0;
                $luasSertiData[] = $data->luas_serti ?? 0;
                $jmlBelumData[] = $data->jml_belum ?? 0;
                $luasBelumData[] = $data->luas_belum ?? 0;
            }
    
            $series_statuswakaf = [
                [
                    'name' => 'Jml Sudah Sertifikat',
                    'data' => $jmlSertiData
                ],
                
                [
                    'name' => 'Jml Belum Sertifikat',
                    'data' => $jmlBelumData
                ]
            ];
        // ------------------------PEMANFAATAN TANAH WAKAF ------------------------
        
        if (empty($jml_wakafmanfaat)){
            $chart_wakafmanfaat_data[]=0;
        }else{
        
            foreach ($jml_wakafmanfaat as $wakaf_manfaat) {
    
                 $chart_wakafmanfaat_data=array(
                                    round($wakaf_manfaat->masjid),
                                    round($wakaf_manfaat->mushalla),
                                    round($wakaf_manfaat->sekolah),
                                    round($wakaf_manfaat->pesantren),
                                    round($wakaf_manfaat->makam),
                                    round($wakaf_manfaat->sosial_lain),
                 
        );
        }
    
    
    }
                $chart_wakafmanfaat_nama = ['Masjid', 'Mushalla', 'Sekolah', 'Pesantren', 'Makam', 'Sosial Lain'];
    
    
    
        //    ---------------- WAKAF PRODUKTIF -------------------------- 
    
        if(empty($jml_wakafproduktif))
        {
                      
            $datachart_wakafproduktif[]=0;
           
    
            
        }else{
    
            foreach ($jml_wakafproduktif as $wakafproduktif) {
            
                $cekjml=$wakafproduktif->perkebunan+$wakafproduktif->koperasi+$wakafproduktif->rumah_sakit+$wakafproduktif->rumah_sewa+
                $wakafproduktif->perikanan+$wakafproduktif->toko_sewa+$wakafproduktif->pertanian+$wakafproduktif->spbu+
                $wakafproduktif->perkantoran_sewa+$wakafproduktif->klinic+$wakafproduktif->peternakan+$wakafproduktif->lainnya;
                $datachart_wakafproduktif=array(
                    round($wakafproduktif->perkebunan),
                    round($wakafproduktif->koperasi),
                    round($wakafproduktif->rumah_sakit),
                    round($wakafproduktif->rumah_sewa),
                    round($wakafproduktif->perikanan),
                    round($wakafproduktif->toko_sewa),
                    round($wakafproduktif->pertanian),
                    round($wakafproduktif->spbu),
                    round($wakafproduktif->perkantoran_sewa),
                    round($wakafproduktif->klinic),
                    round($wakafproduktif->peternakan),
                    round($wakafproduktif->lainnya),
                        );
                 }
               
    
        }
    
    
    
    $data=array(

        'chart_wakafmanfaat_data' =>$chart_wakafmanfaat_data,
        'chart_wakafmanfaat_nama'=>$chart_wakafmanfaat_nama,
        'series_statuswakaf' =>$series_statuswakaf,
        'categories_statuswakaf' =>$categories_statuswakaf,
        'datastatuswakaf' =>$datastatuswakaf,
        'datawakafmanfaat' =>$datawakafmanfaat,
        'datawakafproduktif' =>$datawakafproduktif,
        'tempstruk' =>$tempstruk
    
    );
    
    return response()->json($data);
    
    }
    
    
//     // ========================= untuk merubah Tabel Wakaf =================================
    
    public function getTabelKeagamaanwakaf($tahun,$jenis_data)
    {
    
    $tempstruk = Struktur::first();
    $datastatuswakaf = DB::select('select k.id as idx,p.id as id, k.nama as nama, jml_serti,luas_serti,jml_belum,luas_belum from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datawakafmanfaat = DB::select('select k.id as idx,p.id as id, k.nama as nama, masjid,mushalla,sekolah,pesantren,makam,sosial_lain from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datawakafproduktif = DB::select('select k.id as idx,p.id as id, k.nama as nama,perkebunan,koperasi,rumah_sakit,rumah_sewa,perikanan,toko_sewa,pertanian,spbu,perkantoran_sewa,klinik,peternakan,lainnya from kabkota k left join tb_wakaf p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
    
    switch($jenis_data){
    
    case 'datastatuswakaf':
    return \DataTables::of($datastatuswakaf)
    ->addIndexColumn()
    ->make(true);
    break;
    
    case 'datawakafmanfaat':
    return \DataTables::of($datawakafmanfaat)
    ->addIndexColumn()
    ->make(true);
    break;
    
    case 'datawakafproduktif':
    return \DataTables::of($datawakafproduktif)
    ->addIndexColumn()
    ->make(true);
    break;
    
    default:
    
    return \DataTables::of($datastatuswakaf)
    ->addIndexColumn()
    ->make(true);
    
    }
}



/*===================================================================================================

                                                FRONT END

LAYANAN KEAGAMAAN : JUMLAH PENDUDUK, RUMAH IBADAH, TYPOLOGI MASJID, QORI & HAFIZ,  DAN ORMAS

====================================================================================================*/



public function keagamaan_rumahibadah(){


    $tempstruk = Struktur::first();
    $data_jmlpenduduk = DB::select('select k.id as idx,p.id as id, k.nama as nama, islam, kristen, katolik,hindu,buddha,khonghucu,lainnya from kabkota k left join tb_penduduk p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datajml_penduduk = DB::select('select sum(islam) as islam, sum(kristen) as kristen, sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha,sum(khonghucu) as khonghucu,sum(lainnya) as lainnya from kabkota k left join tb_penduduk p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $data_tipologimasjid = DB::select('select k.id as idx,p.id as id, k.nama as nama, ngr, raya, agung,besar,jamik,sejarah,umum,nasional,masjid,musholla from kabkota k left join tb_tipo_masjid p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datajml_tipologimasjid = DB::select('select  sum(ngr) as ngr, sum(raya) as raya, sum(agung) as agung,sum(besar) as besar,sum(jamik) as jamik,sum(sejarah) as sejarah,sum(umum) as umum,sum(nasional) as nasional,sum(masjid) as masjid,sum(musholla) as musholla from kabkota k left join tb_tipo_masjid p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $data_rumahibadah = DB::select('select k.id as idx,r.id as id, k.nama as nama, masjid, musholla, gereja_kristen,gereja_katolik,pura,vihara,kelenteng from kabkota k left join tb_rmh_ibadah r on k.id=r.id_wilayah where tahun="'.$this->tahun.'"');
    $datajml_rumahibadah = DB::select('select sum(masjid) as masjid, sum(musholla) as mushalla,sum(gereja_kristen) as gereja_kristen,sum(gereja_katolik) as gereja_katolik,sum(pura) as pura,sum(vihara) as vihara,sum(kelenteng) as kelenteng from kabkota k left join tb_rmh_ibadah r on k.id=r.id_wilayah where tahun="'.$this->tahun.'"');
    $dataqorihafiz = DB::select('select k.id as idx,p.id as id, k.nama as nama, qori_pria,qori_wanita,hafiz_pria,hafiz_wanita from kabkota k left join tb_qori p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datajml_qorihafiz = DB::select('select  sum(qori_pria) as qori_pria,sum(qori_wanita) as qori_wanita,sum(hafiz_pria) as hafiz_pria,sum(hafiz_wanita) as hafiz_wanita from kabkota k left join tb_qori p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $data_ormas= DB::select('select k.id as idx,p.id as id, k.nama as nama,islam,kristen,katolik,hindu,buddha,khonghucu from kabkota k left join tb_ormas p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datajml_ormas= DB::select('select sum(islam) as islam,sum(kristen) as kristen,sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha,sum(khonghucu) as khonghucu from kabkota k left join tb_ormas p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $data_tunjangan = DB::select('select k.id as idx,p.id as id, k.nama as nama, islam, kristen, katolik,hindu,buddha,khonghucu from kabkota k left join tb_penyuluh_tunjangan p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
    $datajml_tunjangan = DB::select('select sum(islam) as islam, sum(kristen) as kristen, sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha,sum(khonghucu) as khonghucu from kabkota k left join tb_penyuluh_tunjangan p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
          
    
    
    // ------------------------DATA CHART JML PENDUDUK ------------------------
    

        if(empty($datajml_penduduk)){
            $datachart_jmlpenduduk[]=0;
        }
        foreach ($datajml_penduduk as $penduduk) {

            $datachart_jmlpenduduk=array(
                round((int)$penduduk->islam,2),
                round((int)$penduduk->kristen,2),
                round((int)$penduduk->katolik,2),
                round((int)$penduduk->hindu,2),
                round((int)$penduduk->buddha,2),
                round((int)$penduduk->hindu,2),
                round((int)$penduduk->khonghucu,2),
                                );
        }



        
    // ------------------------DATA CHART  RUMAH IBADAH------------------------

    foreach ($datajml_rumahibadah as $rumahibadah) {

        $datachart_rumahibadah=array(
            $rumahibadah->masjid,
            $rumahibadah->mushalla,
            $rumahibadah->gereja_kristen,
            $rumahibadah->gereja_katolik,
            $rumahibadah->pura,
            $rumahibadah->vihara,
            $rumahibadah->kelenteng,      
            );
    }


    // ------------------------DATA CHART  TIPOLOGI MASJID---------------------
    
    foreach ($datajml_tipologimasjid as $tipologi) {

        $datachart_tipologimasjid=array(
            $tipologi->ngr,
            $tipologi->raya,
            $tipologi->agung,
            $tipologi->besar,
            $tipologi->jamik,
            $tipologi->sejarah,
            $tipologi->umum,      
            $tipologi->nasional,      
            $tipologi->masjid,      
            $tipologi->musholla,      
            );
    }



    // ------------------------DATA CHART  PENYULUH PENERIMA TUNJANGAN--------------------
    
    foreach ($datajml_tunjangan as $tunjangan) {

        $datachart_penerimatunjangan=array(
            $tunjangan->islam,
            $tunjangan->kristen,
            $tunjangan->katolik,
            $tunjangan->hindu,
            $tunjangan->buddha,
            $tunjangan->khonghucu,      
            );
    }
      
      
    // ------------------------DATA CHART  QORI & HAFIZ   ---------------------

    foreach ($datajml_qorihafiz as $qorihafiz) {

        $datachart_qorihafiz=array(
            (int)$qorihafiz->qori_pria,
            (int)$qorihafiz->qori_wanita,
            (int)$qorihafiz->hafiz_pria,
            (int)$qorihafiz->hafiz_wanita      
            );
    }

    

    // ------------------------DATA CHART  ORMAS   ---------------------
        
    foreach ($datajml_ormas as $ormas) {

        $datachart_ormas=array(
            $ormas->islam,
            $ormas->kristen,
            $ormas->katolik,
            $ormas->hindu,
            $ormas->buddha,
            $ormas->khonghucu,      
            );
    }
    
    
    return view('rumah_ibadah',compact('tempstruk','datachart_ormas','datachart_qorihafiz','datachart_penerimatunjangan','datachart_tipologimasjid','datachart_jmlpenduduk','datachart_rumahibadah','data_tunjangan','data_tunjangan','data_jmlpenduduk','data_tipologimasjid','data_rumahibadah','dataqorihafiz','data_ormas'))
    ->with('i',(request()->input('page',1) - 1) * 10);
    
}
    
    
    
   // ----------------------------------- 

   public function getChartKeagamaanRumahibadah($tahun){
    $tempstruk = Struktur::first();
    $datajml_penduduk = DB::select('select sum(islam) as islam, sum(kristen) as kristen, sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha,sum(khonghucu) as khonghucu,sum(lainnya) as lainnya from kabkota k left join tb_penduduk p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datajml_tipologimasjid = DB::select('select  sum(ngr) as ngr, sum(raya) as raya, sum(agung) as agung,sum(besar) as besar,sum(jamik) as jamik,sum(sejarah) as sejarah,sum(umum) as umum,sum(nasional) as nasional,sum(masjid) as masjid,sum(musholla) as musholla from kabkota k left join tb_tipo_masjid p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datajml_rumahibadah = DB::select('select sum(masjid) as masjid, sum(musholla) as mushalla,sum(gereja_kristen) as gereja_kristen,sum(gereja_katolik) as gereja_katolik,sum(pura) as pura,sum(vihara) as vihara,sum(kelenteng) as kelenteng from kabkota k left join tb_rmh_ibadah r on k.id=r.id_wilayah where tahun="'.$tahun.'"');
    $datajml_qorihafiz = DB::select('select  sum(qori_pria) as qori_pria,sum(qori_wanita) as qori_wanita,sum(hafiz_pria) as hafiz_pria,sum(hafiz_wanita) as hafiz_wanita from kabkota k left join tb_qori p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datajml_ormas= DB::select('select sum(islam) as islam,sum(kristen) as kristen,sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha,sum(khonghucu) as khonghucu from kabkota k left join tb_ormas p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $datajml_tunjangan = DB::select('select sum(islam) as islam, sum(kristen) as kristen, sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha,sum(khonghucu) as khonghucu from kabkota k left join tb_penyuluh_tunjangan p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    

    // ------------------------DATA CHART JML PENDUDUK ------------------------
    

    if(empty($datajml_penduduk)){
        $datachart_jmlpenduduk[]=0;
    }
    foreach ($datajml_penduduk as $penduduk) {

        $datachart_jmlpenduduk=array(
            round((int)$penduduk->islam,2),
            round((int)$penduduk->kristen,2),
            round((int)$penduduk->katolik,2),
            round((int)$penduduk->hindu,2),
            round((int)$penduduk->buddha,2),
            round((int)$penduduk->hindu,2),
            round((int)$penduduk->khonghucu,2),
                            );
    }



    
// ------------------------DATA CHART  RUMAH IBADAH------------------------

foreach ($datajml_rumahibadah as $rumahibadah) {

    $datachart_rumahibadah=array(
        $rumahibadah->masjid,
        $rumahibadah->mushalla,
        $rumahibadah->gereja_kristen,
        $rumahibadah->gereja_katolik,
        $rumahibadah->pura,
        $rumahibadah->vihara,
        $rumahibadah->kelenteng,      
        );
}


// ------------------------DATA CHART  TIPOLOGI MASJID---------------------

foreach ($datajml_tipologimasjid as $tipologi) {

    $datachart_tipologimasjid=array(
        $tipologi->ngr,
        $tipologi->raya,
        $tipologi->agung,
        $tipologi->besar,
        $tipologi->jamik,
        $tipologi->sejarah,
        $tipologi->umum,      
        $tipologi->nasional,      
        $tipologi->masjid,      
        $tipologi->musholla,      
        );
}



// ------------------------DATA CHART  PENYULUH PENERIMA TUNJANGAN--------------------

foreach ($datajml_tunjangan as $tunjangan) {

    $datachart_penerimatunjangan=array(
        $tunjangan->islam,
        $tunjangan->kristen,
        $tunjangan->katolik,
        $tunjangan->hindu,
        $tunjangan->buddha,
        $tunjangan->khonghucu,      
        );
}
  
  
// ------------------------DATA CHART  QORI & HAFIZ   ---------------------

foreach ($datajml_qorihafiz as $qorihafiz) {

    $datachart_qorihafiz=array(
        (int)$qorihafiz->qori_pria,
        (int)$qorihafiz->qori_wanita,
        (int)$qorihafiz->hafiz_pria,
        (int)$qorihafiz->hafiz_wanita      
        );
}



// ------------------------DATA CHART  ORMAS   ---------------------
    
foreach ($datajml_ormas as $ormas) {

    $datachart_ormas=array(
        $ormas->islam,
        $ormas->kristen,
        $ormas->katolik,
        $ormas->hindu,
        $ormas->buddha,
        $ormas->khonghucu,      
        );
}

$data=array(

    'datachart_jmlpenduduk' =>$datachart_jmlpenduduk,
    'datachart_rumahibadah'=>$datachart_rumahibadah,
    'datachart_tipologimasjid' =>$datachart_tipologimasjid,
    'datachart_penerimatunjangan' =>$datachart_penerimatunjangan,
    'datachart_qorihafiz' =>$datachart_qorihafiz,
    'datachart_ormas' =>$datachart_ormas,
    'tempstruk' =>$tempstruk

);

return response()->json($data);


   }


   public function getTabelKeagamaanRumahibadah($tahun,$jenis_data)
   {
   
    $tempstruk = Struktur::first();
    $data_jmlpenduduk = DB::select('select k.id as idx,p.id as id, k.nama as nama, islam, kristen, katolik,hindu,buddha,khonghucu,lainnya from kabkota k left join tb_penduduk p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $data_tipologimasjid = DB::select('select k.id as idx,p.id as id, k.nama as nama, ngr, raya, agung,besar,jamik,sejarah,umum,nasional,masjid,musholla from kabkota k left join tb_tipo_masjid p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $data_rumahibadah = DB::select('select k.id as idx,r.id as id, k.nama as nama, masjid, musholla, gereja_kristen,gereja_katolik,pura,vihara,kelenteng from kabkota k left join tb_rmh_ibadah r on k.id=r.id_wilayah where tahun="'.$tahun.'"');
    $data_qorihafiz = DB::select('select k.id as idx,p.id as id, k.nama as nama, qori_pria,qori_wanita,hafiz_pria,hafiz_wanita from kabkota k left join tb_qori p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $data_ormas= DB::select('select k.id as idx,p.id as id, k.nama as nama,islam,kristen,katolik,hindu,buddha,khonghucu from kabkota k left join tb_ormas p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    $data_tunjangan = DB::select('select k.id as idx,p.id as id, k.nama as nama, islam, kristen, katolik,hindu,buddha,khonghucu from kabkota k left join tb_penyuluh_tunjangan p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
    
   switch($jenis_data){
   
   case 'data_jmlpenduduk':
   return \DataTables::of($data_jmlpenduduk)
   ->addIndexColumn()
   ->make(true);
   break;
   
   case 'data_tipologimasjid':
   return \DataTables::of($data_tipologimasjid)
   ->addIndexColumn()
   ->make(true);
   break;
   
   case 'data_rumahibadah':
   return \DataTables::of($data_rumahibadah)
   ->addIndexColumn()
   ->make(true);
   break;  
   
   case 'data_qorihafiz':
   return \DataTables::of($data_qorihafiz)
   ->addIndexColumn()
   ->make(true);
   break;
   
   case 'data_ormas':
   return \DataTables::of($data_ormas)
   ->addIndexColumn()
   ->make(true);
   break;
   
   case 'data_tunjangan':
   return \DataTables::of($data_tunjangan)
   ->addIndexColumn()
   ->make(true);
   break;
   
   default:
   
   return \DataTables::of($data_tunjangan)
   ->addIndexColumn()
   ->make(true);
   
   }
}







}
