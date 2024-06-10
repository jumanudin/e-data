<?php
/*==============================================================

    NAMA CONTROLLER : FrontTatakelolaCotroller  
    VERSI           : 1.0.1
    PROGRAMER       : MARJUANDA, S.KOM
    TANGGAL BUAT    : 03 Mei 2024
    TANGGAL SELESAI : 
    TANGGAL UPDATE  : 
                      

    FUNGSI          : Untuk Menghandle Front End Grafik dan  Data
                      Bab Tatakelola dan Manajemen

    ===============================================================*/

    namespace App\Http\Controllers;
    use App\Models\Unit;
    use App\Models\Unitprogram;
    use App\Models\Ijinbelajar;
    use App\Models\Pns;
    use App\Models\Struktur;
    use App\Models\Program;
    use App\Models\JenisBelanja;
    use App\Models\SumberDana;
    use App\Models\RealisasiProgram;
    use App\Models\RealisasiBelanja;
    use App\Models\RealisasiSumberdana;
    use App\Models\Bmn;
    use App\Models\Anggaran;
    use DataTables;
    use Helper;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Crypt;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    
    use App\Models\Ts_master;

class FrontTatakelolaController extends Controller
{
    function __construct()
    {
        
        $this->tempstruk = Struktur::first();
        $this->tahun=$this->tempstruk->tahun_priode;
        $this->satker = Unit::whereIn('kd_satker',['kanwil','pkp','bangka','bateng','babar','basel','belitung','beltim'])->get();
       
        
    }


    
     /*===================================================================================================

                                            FRONT END
                                            TATA KELOLA PNS
     
     
     ====================================================================================================*/
    public function tatakelola_pns()
    {
        $tempstruk=$this->tempstruk;
        $dataseluruhpns=DB::select('select sum(pria+wanita) as total from tb_pns  where tahun="'.$this->tahun.'"');
        $datajumlahpns_usia= DB::select('select sum(min_30) as kurang_30,sum(range_30_39) as range_30,sum(range_40_49) as range_40,sum(range_50_57) as range_50,sum(lebih_57) as lebih_57 from tb_pns where tahun="'.$this->tahun.'"');
        $datajumlahpns_kualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_pns where tahun="'.$this->tahun.'"');
        $datajumlahpns_agama= DB::select('select sum(islam) as islam,sum(kristen) as kristen,sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha, sum(khonghucu) as khonghucu from tb_pns where tahun="'.$this->tahun.'"');
        
        $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker as kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
        $datapns_usia= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_30,range_30_39,range_40_49,range_50_57,lebih_57 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
        $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
        $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
        
        if(is_null($datapns_jkgol))
        {
                    
                $kd_satker[]= 0;
                $jml_pns[]= 0;
        

            
        }else{

            foreach ($datapns_jkgol as $jkgol) {
            
            
                $kd_satker[]= ucfirst($jkgol->kd_satker);
                $jml_pns[]= round(((((int)$jkgol->pria+(int)$jkgol->wanita)/(int)$dataseluruhpns)));
    
            }

        }

        foreach ($datajumlahpns_usia as $usia) {

        $datachart_usia=array(
            $usia->kurang_30,
            $usia->range_30,
            $usia->range_40,
            $usia->range_50,
            $usia->lebih_57
        );
    }

    foreach ($datajumlahpns_agama as $agama) {

        $islam=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->islam/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $kristen=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->kristen/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $katolik=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->katolik/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $hindu=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->hindu/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $buddha=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->buddha/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $khonghucu=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->khonghucu/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $datachart_agama=array(
           $islam,
            $kristen,
            $katolik,
            $hindu,
            $buddha,
            $khonghucu
        );
    }

    foreach ($datajumlahpns_kualifikasi as $kualifikasi) {

        $datachart_kulifikasi=array(
            $kualifikasi->min_s1,
            $kualifikasi->s1,
            $kualifikasi->s2,
            $kualifikasi->s3,       
            );
    }

        return view('pns',compact('datachart_kulifikasi','datachart_usia','datachart_agama','datapns_jkgol','datapns_usia','datapns_kualifikasi','datapns_agama','tempstruk','kd_satker','jml_pns'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    public function getChartTatakelolaPns($tahun)
    {
                
        $tempstruk=$this->tempstruk;
        $datakabkota=DB::select('select * from kabkota');
        $dataseluruhpns=DB::select('select sum(pria+wanita) as total from tb_pns  where tahun="'.$tahun.'"');
        $datajumlahpns_usia= DB::select('select sum(min_30) as kurang_30,sum(range_30_39) as range_30,sum(range_40_49) as range_40,sum(range_50_57) as range_50,sum(lebih_57) as lebih_57 from tb_pns where tahun="'.$tahun.'"');
        $datajumlahpns_kualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_pns where tahun="'.$tahun.'"');
        $datajumlahpns_agama= DB::select('select sum(islam) as islam,sum(kristen) as kristen,sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha, sum(khonghucu) as khonghucu from tb_pns where tahun="'.$tahun.'"');
        
        $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_usia= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_30,range_30_39,range_40_49,range_50_57,lebih_57 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$tahun.'"');
        
        if(is_null($datapns_jkgol))
        {
                      
                $kd_satker[]= 0;
                $jml_pns[]= 0;
           

            
        }else{

            foreach ($datapns_jkgol as $jkgol) {
            
            
                $kd_satker[]= ucfirst($jkgol->kd_satker);
                $jml_pns[]= round(((((int)$jkgol->pria+(int)$jkgol->wanita)/(int)$dataseluruhpns)));
    
            }

        }

        

        foreach ($datajumlahpns_usia as $usia) {

        $datachart_usia=array(
            $usia->kurang_30,
            $usia->range_30,
            $usia->range_40,
            $usia->range_50,
            $usia->lebih_57
        );
    }

    foreach ($datajumlahpns_agama as $agama) {

        $islam=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->islam/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $kristen=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->kristen/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $katolik=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->katolik/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $hindu=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->hindu/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $buddha=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->buddha/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $khonghucu=$agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu === 0? 0 :  round($agama->khonghucu/($agama->islam+$agama->kristen+$agama->katolik+$agama->hindu+$agama->buddha+$agama->khonghucu)*100,2);
        $datachart_agama=array(
           $islam,
            $kristen,
            $katolik,
            $hindu,
            $buddha,
            $khonghucu
        );
    }

    foreach ($datajumlahpns_kualifikasi as $kualifikasi) {

        $datachart_kulifikasi=array(
            $kualifikasi->min_s1,
            $kualifikasi->s1,
            $kualifikasi->s2,
            $kualifikasi->s3       
            );
    }

    $data=array(
        'kd_satker'                 =>$kd_satker,
        'jml_pns'                   =>$jml_pns,
        'datachart_usia'            =>$datachart_usia,
        'datachart_kualifikasi'     =>$datachart_kulifikasi,
        'datachart_agama'           =>$datachart_agama
    );

        return $data;

    }

    public function getTabelTatakelolaPns($tahun,$jenis_data)
    {
        $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_usia= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_30,range_30_39,range_40_49,range_50_57,lebih_57 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns p on k.id=p.id_satker where tahun="'.$tahun.'"');
        
        switch($jenis_data){

            case 'jkgol':
                return \DataTables::of($datapns_jkgol)
                    ->addIndexColumn()
                    ->make(true);
                break;
        
            case 'usia':
                return \DataTables::of($datapns_usia)
                    ->addIndexColumn()
                    ->make(true);
                break;
        
            case 'kualifikasi':
                return \DataTables::of($datapns_kualifikasi)
                    ->addIndexColumn()
                    ->make(true);
                break;
            
            case 'agama':
                    return \DataTables::of($datapns_agama)
                        ->addIndexColumn()
                        ->make(true);
                    break;
        
            default:
                    return \DataTables::of($datapns_jkgol)
                    ->addIndexColumn()
                    ->make(true);
            
        }
    }

    
     /*===================================================================================================

                                            FRONT END
                                            TATA KELOLA ANGGARAN
     
     
     ====================================================================================================*/

    public function tatakelola_anggaran ()
    {
        $tempstruk=$this->tempstruk;
        $databmn= DB::select('select k.id as idx,p.id as id, k.nama as nama,lok_baik,lok_rusak_ringan,lok_rusak_berat,ged_baik,ged_rusak_ringan,ged_rusak_berat from kabkota k left join tb_bmn p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
        $data_anggaran= DB::select('select k.id as idx,p.id as id, k.nama_program as nama,pagu_awal,pagu_akhir,anggaran,realisasi,persentase from tb_unitprogram k left join tb_anggaran p on k.id=p.id_unitprogram where tahun="'.$this->tahun.'"');
        $data_realisasiprogram= DB::select('select k.id as idx,p.id as id, k.program as nama,pagu,realisasi from tb_program k left join tb_realisasi_program p on k.id=p.id_program where tahun="'.$this->tahun.'"');
        $data_realisasisumberdana= DB::select('select k.id as idx,p.id as id, k.sumber_dana as nama,pagu,realisasi from tb_sumberdana k left join tb_realisasi_dana p on k.id=p.id_dana where tahun="'.$this->tahun.'"');
        $data_realisasibelanja= DB::select('select k.id as idx,p.id as id, k.jenis_belanja as nama,pagu,realisasi from tb_jenis_belanja k left join tb_realisasi_belanja p on k.id=p.id_belanja where tahun="'.$this->tahun.'"');
       
        
        
        foreach ($data_anggaran as $anggaran) {

           
           $chart_eselon_nama[]=$anggaran->nama;
           $chart_eselon_data[]=$anggaran->pagu_akhir=== 0? 0 :  round(($anggaran->realisasi)/($anggaran->pagu_akhir)*100,2);
        }

        foreach ($data_realisasiprogram as $program) {

           
            $chart_program_nama[]=$program->nama;
            $chart_program_data[]=$program->pagu=== 0? 0 :  round(($program->realisasi)/($program->pagu)*100,2);
         }

         foreach ($data_realisasibelanja as $belanja) {

           
            $chart_belanja_nama[]=$belanja->nama;
            $chart_belanja_data[]=$belanja->pagu=== 0? 0 :  round(($belanja->realisasi)/($belanja->pagu)*100,2);
         }
        
         foreach ($data_realisasisumberdana as $dana) {

           
            $chart_dana_nama[]=$dana->nama;
            $chart_dana_data[]=$dana->pagu=== 0? 0 :  round(($dana->realisasi)/($dana->pagu)*100,2);
         }
        
        return view('anggaran',compact('chart_dana_nama','chart_dana_data','chart_belanja_nama','chart_belanja_data','chart_program_nama','chart_program_data','chart_eselon_nama','chart_eselon_data','data_realisasibelanja','data_realisasisumberdana','data_realisasiprogram','databmn','data_anggaran','tempstruk'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    public function getChartTatakelolaAnggaran($tahun)
    {
        $tempstruk=$this->tempstruk;
        $databmn= DB::select('select k.id as idx,p.id as id, k.nama as nama,lok_baik,lok_rusak_ringan,lok_rusak_berat,ged_baik,ged_rusak_ringan,ged_rusak_berat from kabkota k left join tb_bmn p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_anggaran= DB::select('select k.id as idx,p.id as id, k.nama_program as nama,pagu_awal,pagu_akhir,anggaran,realisasi,persentase from tb_unitprogram k left join tb_anggaran p on k.id=p.id_unitprogram where tahun="'.$tahun.'"');
        $data_realisasiprogram= DB::select('select k.id as idx,p.id as id, k.program as nama,pagu,realisasi from tb_program k left join tb_realisasi_program p on k.id=p.id_program where tahun="'.$tahun.'"');
        $data_realisasisumberdana= DB::select('select k.id as idx,p.id as id, k.sumber_dana as nama,pagu,realisasi from tb_sumberdana k left join tb_realisasi_dana p on k.id=p.id_dana where tahun="'.$tahun.'"');
        $data_realisasibelanja= DB::select('select k.id as idx,p.id as id, k.jenis_belanja as nama,pagu,realisasi from tb_jenis_belanja k left join tb_realisasi_belanja p on k.id=p.id_belanja where tahun="'.$tahun.'"');
       
       
        $chart_lokasibmn = [
            "Baik" => [],
            "Rusak Ringan" => [],
            "Rusak Berat" => []
        ];
        
        if(!empty($databmn))
       {
        foreach ($databmn as $lokasi) {
            $chart_lokasi_nama[] = $lokasi->nama;
        
            $chart_lokasibmn["Baik"][] = $lokasi->lok_baik;
            $chart_lokasibmn["Rusak Ringan"][] = $lokasi->lok_rusak_ringan;
            $chart_lokasibmn["Rusak Berat"][] = $lokasi->lok_rusak_berat;
        }
        }else{
            $chart_lokasi_nama[] = 0;
        
            $chart_lokasibmn["Baik"][] = 0;
            $chart_lokasibmn["Rusak Ringan"][] = 0;
            $chart_lokasibmn["Rusak Berat"][] = 0 ;

        }
        
        // Format data untuk chart
        $chart_lokasiseries = [
            ["name" => "Baik", "data" => $chart_lokasibmn["Baik"]],
            ["name" => "Rusak Ringan", "data" => $chart_lokasibmn["Rusak Ringan"]],
            ["name" => "Rusak Berat", "data" => $chart_lokasibmn["Rusak Berat"]]
            ];


           
        $chart_gedungbmn = [
            "Baik" => [],
            "Rusak Ringan" => [],
            "Rusak Berat" => []
        ];
        
        if(!empty($databmn))
        {
        foreach ($databmn as $gedung) {
            $chart_gedung_nama[] = $gedung->nama;
        
            $chart_gedungbmn["Baik"][] = $gedung->ged_baik;
            $chart_gedungbmn["Rusak Ringan"][] = $gedung->ged_rusak_ringan;
            $chart_gedungbmn["Rusak Berat"][] = $gedung->ged_rusak_berat;
        }
    }else{
        $chart_gedung_nama[] = 0;
    
        $chart_gedungbmn["Baik"][] = 0;
        $chart_gedungbmn["Rusak Ringan"][] = 0;
        $chart_gedungbmn["Rusak Berat"][] = 0 ;

    }
        
        // Format data untuk chart
        $chart_gedungseries = [
            ["name" => "Baik","type" => "column", "data" => $chart_gedungbmn["Baik"]],
            ["name" => "Rusak Ringan","type" => "area", "data" => $chart_gedungbmn["Rusak Ringan"]],
            ["name" => "Rusak Berat","type" => "line", "data" => $chart_gedungbmn["Rusak Berat"]]
        ];
        
   
        if(!empty($data_anggaran))
       {
        foreach ($data_anggaran as $anggaran) {
          
            $chart_eselon_nama[]=$anggaran->nama;
            $chart_eselon_data[]=$anggaran->pagu_akhir=== 0? 0 :  round(($anggaran->realisasi)/($anggaran->pagu_akhir)*100,2);
            }
       }       
       else
       {
            $chart_eselon_nama[]=0;
            $chart_eselon_data[]=0;
       }
        
        

        if(!empty($data_realisasiprogram))
       {

        foreach ($data_realisasiprogram as $program) {

           
            $chart_program_nama[]=$program->nama;
            $chart_program_data[]=$program->pagu=== 0? 0 :  round(($program->realisasi)/($program->pagu)*100,2);
         }
        }       
       else
        {
                $chart_program_nama[]=0;
                $chart_program_data[]=0;
        }



        if(!empty($data_realisasibelanja))
       {

            foreach ($data_realisasibelanja as $belanja) {

            
                $chart_belanja_nama[]=$belanja->nama;
                $chart_belanja_data[]=$belanja->pagu=== 0? 0 :  round(($belanja->realisasi)/($belanja->pagu)*100,2);
            }
        }       
       else
            {
                    $chart_belanja_nama[]=0;
                    $chart_belanja_data[]=0;
            }



    if(!empty($data_realisasibelanja))
       {

         foreach ($data_realisasisumberdana as $dana) {

           
            $chart_dana_nama[]=$dana->nama;
            $chart_dana_data[]=$dana->pagu=== 0? 0 :  round(($dana->realisasi)/($dana->pagu)*100,2);
         }
        }       
       else
            {
                    $chart_dana_nama[]=0;
                    $chart_dana_data[]=0;
            }
        
         $data=array(
            'chart_gedung_nama'         =>$chart_gedung_nama,
            'chart_gedungseries'        =>$chart_gedungseries,
            'chart_lokasi_nama'         =>$chart_lokasi_nama,
            'chart_lokasiseries'        =>$chart_lokasiseries,
            'datachart_anggaran_nama'   =>$chart_eselon_nama,
            'datachart_anggaran_data'   =>$chart_eselon_data,
            'datachart_program_nama'    =>$chart_program_nama,
            'datachart_program_data'    =>$chart_program_data,
            'datachart_belanja_nama'    =>$chart_belanja_nama,
            'datachart_belanja_data'    =>$chart_belanja_data,
            'datachart_dana_nama'       =>$chart_dana_nama,
            'datachart_dana_data'       =>$chart_dana_data
            
        );
    
        return response()->json($data);
        
    }



    public function getTabelTatakelolaAnggaran($tahun,$jenis_data)
    {
        $databmn= DB::select('select k.id as idx,p.id as id, k.nama as nama,lok_baik,lok_rusak_ringan,lok_rusak_berat,ged_baik,ged_rusak_ringan,ged_rusak_berat from kabkota k left join tb_bmn p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        $data_anggaran= DB::select('select k.id as idx,p.id as id, k.nama_program as nama,pagu_awal,pagu_akhir,anggaran,realisasi,persentase from tb_unitprogram k left join tb_anggaran p on k.id=p.id_unitprogram where tahun="'.$tahun.'"');
        $data_realisasiprogram= DB::select('select k.id as idx,p.id as id, k.program as nama,pagu,realisasi from tb_program k left join tb_realisasi_program p on k.id=p.id_program where tahun="'.$tahun.'"');
        $data_realisasisumberdana= DB::select('select k.id as idx,p.id as id, k.sumber_dana as nama,pagu,realisasi from tb_sumberdana k left join tb_realisasi_dana p on k.id=p.id_dana where tahun="'.$tahun.'"');
        $data_realisasibelanja= DB::select('select k.id as idx,p.id as id, k.jenis_belanja as nama,pagu,realisasi from tb_jenis_belanja k left join tb_realisasi_belanja p on k.id=p.id_belanja where tahun="'.$tahun.'"');
       
        switch($jenis_data){

            case 'anggaran':
                return \DataTables::of($data_anggaran)
                    ->addIndexColumn()
                    ->make(true);
                break;
        
            case 'program':
                return \DataTables::of($data_realisasiprogram)
                    ->addIndexColumn()
                    ->make(true);
                break;
        
            case 'jenisbelanja':
                return \DataTables::of($data_realisasibelanja)
                    ->addIndexColumn()
                    ->make(true);
                break;
            
            case 'sumberdana':
                    return \DataTables::of($data_realisasisumberdana)
                        ->addIndexColumn()
                        ->make(true);
                    break;
                    
            case 'lokasi':
                    return \DataTables::of($databmn)
                        ->addIndexColumn()
                        ->make(true);
                    break;

            case 'gedung':
                        return \DataTables::of($databmn)
                            ->addIndexColumn()
                            ->make(true);
                        break;
            
            default:
                    return \DataTables::of($databmn)
                    ->addIndexColumn()
                    ->make(true);
            
        }
    }

    /*===================================================================================================

                                            FRONT END
                                            TATA KELOLA BMN
     
     
     ====================================================================================================*/

     public function tatakelola_bmn ()
     {
         $tempstruk=$this->tempstruk;
         $databmn= DB::select('select k.id as idx,p.id as id, k.nama as nama,lok_baik,lok_rusak_ringan,lok_rusak_berat,ged_baik,ged_rusak_ringan,ged_rusak_berat from kabkota k left join tb_bmn p on k.id=p.id_wilayah where tahun="'.$this->tahun.'"');
         $databmntotal= DB::select('select  k.nama as nama,sum(lok_baik) as jumlah_lokbaik,sum(lok_rusak_ringan) as jumlah_lokrusakringan,sum(lok_rusak_berat) as jumlah_lokrusakberat,sum(ged_baik) as jml_gedbaik,sum(ged_rusak_ringan) as jml_gedrusakringan,sum(ged_rusak_berat) as jml_gedrusakberat from kabkota k left join tb_bmn p on k.id=p.id_wilayah where tahun="'.$this->tahun.'" group by nama');
         $data_anggaran= DB::select('select k.id as idx,p.id as id, k.nama_program as nama,pagu_awal,pagu_akhir,anggaran,realisasi,persentase from tb_unitprogram k left join tb_anggaran p on k.id=p.id_unitprogram where tahun="'.$this->tahun.'"');
         $data_realisasiprogram= DB::select('select k.id as idx,p.id as id, k.program as nama,pagu,realisasi from tb_program k left join tb_realisasi_program p on k.id=p.id_program where tahun="'.$this->tahun.'"');
         $data_realisasisumberdana= DB::select('select k.id as idx,p.id as id, k.sumber_dana as nama,pagu,realisasi from tb_sumberdana k left join tb_realisasi_dana p on k.id=p.id_dana where tahun="'.$this->tahun.'"');
         $data_realisasibelanja= DB::select('select k.id as idx,p.id as id, k.jenis_belanja as nama,pagu,realisasi from tb_jenis_belanja k left join tb_realisasi_belanja p on k.id=p.id_belanja where tahun="'.$this->tahun.'"');
        
         
         $chart_lokasibmn = [
            "Baik" => [],
            "Rusak Ringan" => [],
            "Rusak Berat" => []
        ];
        
        foreach ($databmn as $lokasi) {
            $chart_lokasi_nama[] = $lokasi->nama;
        
            $chart_lokasibmn["Baik"][] = $lokasi->lok_baik;
            $chart_lokasibmn["Rusak Ringan"][] = $lokasi->lok_rusak_ringan;
            $chart_lokasibmn["Rusak Berat"][] = $lokasi->lok_rusak_berat;
        }
        
        // Format data untuk chart
        $chart_lokasiseries = [
            ["name" => "Baik", "data" => $chart_lokasibmn["Baik"]],
            ["name" => "Rusak Ringan", "data" => $chart_lokasibmn["Rusak Ringan"]],
            ["name" => "Rusak Berat", "data" => $chart_lokasibmn["Rusak Berat"]]
        ];


           
        $chart_gedungbmn = [
            "Baik" => [],
            "Rusak Ringan" => [],
            "Rusak Berat" => []
        ];
        
        foreach ($databmn as $gedung) {
            $chart_gedung_nama[] = $gedung->nama;
        
            $chart_gedungbmn["Baik"][] = $gedung->ged_baik;
            $chart_gedungbmn["Rusak Ringan"][] = $gedung->ged_rusak_ringan;
            $chart_gedungbmn["Rusak Berat"][] = $gedung->ged_rusak_berat;
        }
        
        // Format data untuk chart
        $chart_gedungseries = [
            ["name" => "Baik","type" => "column", "data" => $chart_gedungbmn["Baik"]],
            ["name" => "Rusak Ringan","type" => "area", "data" => $chart_gedungbmn["Rusak Ringan"]],
            ["name" => "Rusak Berat","type" => "line", "data" => $chart_gedungbmn["Rusak Berat"]]
        ];
        
 



         foreach ($data_anggaran as $anggaran) {
 
            
            $chart_eselon_nama[]=$anggaran->nama;
            $chart_eselon_data[]=$anggaran->pagu_akhir=== 0? 0 :  round(($anggaran->realisasi)/($anggaran->pagu_akhir)*100,2);
         }
 
         foreach ($data_realisasiprogram as $program) {
 
            
             $chart_program_nama[]=$program->nama;
             $chart_program_data[]=$program->pagu=== 0? 0 :  round(($program->realisasi)/($program->pagu)*100,2);
          }
 
          foreach ($data_realisasibelanja as $belanja) {
 
            
             $chart_belanja_nama[]=$belanja->nama;
             $chart_belanja_data[]=$belanja->pagu=== 0? 0 :  round(($belanja->realisasi)/($belanja->pagu)*100,2);
          }
         
          foreach ($data_realisasisumberdana as $dana) {
 
            
             $chart_dana_nama[]=$dana->nama;
             $chart_dana_data[]=$dana->pagu=== 0? 0 :  round(($dana->realisasi)/($dana->pagu)*100,2);
          }
         
         return view('bmn',compact('chart_gedung_nama','chart_gedungseries','chart_lokasi_nama','chart_lokasiseries','chart_dana_nama','chart_dana_data','chart_belanja_nama','chart_belanja_data','chart_program_nama','chart_program_data','chart_eselon_nama','chart_eselon_data','data_realisasibelanja','data_realisasisumberdana','data_realisasiprogram','databmn','data_anggaran','tempstruk'))
         ->with('i',(request()->input('page',1) - 1) * 10);
     }


     public function getChartTatakelolaBmn($tahun)
     {
         $tempstruk=$this->tempstruk;
         $databmn= DB::select('select k.id as idx,p.id as id, k.nama as nama,lok_baik,lok_rusak_ringan,lok_rusak_berat,ged_baik,ged_rusak_ringan,ged_rusak_berat from kabkota k left join tb_bmn p on k.id=p.id_wilayah where tahun="'.$tahun.'"');
        
        
         $chart_lokasibmn = [
             "Baik" => [],
             "Rusak Ringan" => [],
             "Rusak Berat" => []
         ];
         
         if(!empty($databmn))
        {
         foreach ($databmn as $lokasi) {
             $chart_lokasi_nama[] = $lokasi->nama;
         
             $chart_lokasibmn["Baik"][] = $lokasi->lok_baik;
             $chart_lokasibmn["Rusak Ringan"][] = $lokasi->lok_rusak_ringan;
             $chart_lokasibmn["Rusak Berat"][] = $lokasi->lok_rusak_berat;
         }
         }else{
             $chart_lokasi_nama[] = 0;
         
             $chart_lokasibmn["Baik"][] = 0;
             $chart_lokasibmn["Rusak Ringan"][] = 0;
             $chart_lokasibmn["Rusak Berat"][] = 0 ;
 
         }
         
         // Format data untuk chart
         $chart_lokasiseries = [
             ["name" => "Baik", "data" => $chart_lokasibmn["Baik"]],
             ["name" => "Rusak Ringan", "data" => $chart_lokasibmn["Rusak Ringan"]],
             ["name" => "Rusak Berat", "data" => $chart_lokasibmn["Rusak Berat"]]
             ];
 
 
            
         $chart_gedungbmn = [
             "Baik" => [],
             "Rusak Ringan" => [],
             "Rusak Berat" => []
         ];
         
         if(!empty($databmn))
         {
         foreach ($databmn as $gedung) {
             $chart_gedung_nama[] = $gedung->nama;
         
             $chart_gedungbmn["Baik"][] = $gedung->ged_baik;
             $chart_gedungbmn["Rusak Ringan"][] = $gedung->ged_rusak_ringan;
             $chart_gedungbmn["Rusak Berat"][] = $gedung->ged_rusak_berat;
         }
     }else{
         $chart_gedung_nama[] = 0;
     
         $chart_gedungbmn["Baik"][] = 0;
         $chart_gedungbmn["Rusak Ringan"][] = 0;
         $chart_gedungbmn["Rusak Berat"][] = 0 ;
 
     }
         
         // Format data untuk chart
         $chart_gedungseries = [
             ["name" => "Baik","type" => "column", "data" => $chart_gedungbmn["Baik"]],
             ["name" => "Rusak Ringan","type" => "area", "data" => $chart_gedungbmn["Rusak Ringan"]],
             ["name" => "Rusak Berat","type" => "line", "data" => $chart_gedungbmn["Rusak Berat"]]
         ];
         
         
          $data=array(
             'chart_gedung_nama'         =>$chart_gedung_nama,
             'chart_gedungseries'        =>$chart_gedungseries,
             'chart_lokasi_nama'         =>$chart_lokasi_nama,
             'chart_lokasiseries'        =>$chart_lokasiseries,
             
         );
     
         return $data;
         
     }
     
     /*===================================================================================================

                                            FRONT END
                                            TATA KELOLA PNS NAIK PANGKAT
     
     
     ====================================================================================================*/


    public function tatakelola_pnspangkat()
    {
        $tempstruk=$this->tempstruk;
        $dataseluruhpns=DB::select('select sum(pria+wanita) as total from tb_pns_naikpkt  where tahun="'.$this->tahun.'"');
        $datajumlahpns_kualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_pns_naikpkt where tahun="'.$this->tahun.'"');
        $datajumlahpns_agama= DB::select('select sum(islam) as islam,sum(kristen) as kristen,sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha, sum(khonghucu) as khonghucu from tb_pns_naikpkt where tahun="'.$this->tahun.'"');
        
        $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker as kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
        $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
        $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
        
        $datajumlahpns_ijinKualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_unitkerja k left join tb_pns_ijinbljr p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
        $datapns_ijinkualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_ijinbljr p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
      
        
        
        if(empty($datapns_jkgol))
        {
                    
                $kd_satker[]= 0;
                $jml_pns[]= 0;
        

            
        }else{

            foreach ($datapns_jkgol as $jkgol) {
            
            
                $kd_satker[]= ucfirst($jkgol->kd_satker);
                $jml_pns[]= round(((((int)$jkgol->pria+(int)$jkgol->wanita)/(int)$dataseluruhpns)));
    
            }

        }

        
    

    foreach ($datajumlahpns_agama as $agama) {

        $islam=round($agama->islam);
        $kristen=round($agama->kristen);
        $katolik=round($agama->katolik);
        $hindu=round($agama->hindu);
        $buddha=round($agama->buddha);
        $khonghucu=round($agama->khonghucu);
        $datachart_agama=array(
           $islam,
            $kristen,
            $katolik,
            $hindu,
            $buddha,
            $khonghucu
        );
    }

    foreach ($datajumlahpns_kualifikasi as $kualifikasi) {

        $datachart_kualifikasi=array(
            $kualifikasi->min_s1,
            $kualifikasi->s1,
            $kualifikasi->s2,
            $kualifikasi->s3,       
            );
    }


    foreach ($datajumlahpns_ijinKualifikasi as $kualifikasi) {

        $datachart_ijinkualifikasi=array(
            $kualifikasi->min_s1,
            $kualifikasi->s1,
            $kualifikasi->s2,
            $kualifikasi->s3,       
            );
    }

        return view('pns_naikpangkat',compact('datachart_kualifikasi','datachart_ijinkualifikasi','datachart_agama','datapns_jkgol','datapns_kualifikasi','datapns_ijinkualifikasi','datapns_agama','tempstruk','kd_satker','jml_pns'))
        ->with('i',(request()->input('page',1) - 1) * 10);
    }

    public function getChartTatakelolaPnsPangkat($tahun)
    {
                
        $tempstruk=$this->tempstruk;
        $datakabkota=DB::select('select * from kabkota');
        $dataseluruhpns=DB::select('select sum(pria+wanita) as total from tb_pns_naikpkt  where tahun="'.$tahun.'"');
        $datajumlahpns_kualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_pns_naikpkt where tahun="'.$tahun.'"');
        $datajumlahpns_agama= DB::select('select sum(islam) as islam,sum(kristen) as kristen,sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha, sum(khonghucu) as khonghucu from tb_pns_naikpkt where tahun="'.$tahun.'"');
        
        $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        
        $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        
        $datajumlahpns_ijinKualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_unitkerja k left join tb_pns_ijinbljr p on k.id=p.id_satker where tahun="'.$tahun.'"');
        
        if(empty($datapns_jkgol))
        {
                      
                $kd_satker[]= 0;
                $jml_pns[]= 0;
           
        }else{

            foreach ($datapns_jkgol as $jkgol) {
            
            
                $kd_satker[]= ucfirst($jkgol->kd_satker);
                $jml_pns[]= round(((((int)$jkgol->pria+(int)$jkgol->wanita)/(int)$dataseluruhpns)));
    
            }

        }

        

        
    foreach ($datajumlahpns_agama as $agama) {

        $islam=round($agama->islam);
        $kristen=round($agama->kristen);
        $katolik=round($agama->katolik);
        $hindu=round($agama->hindu);
        $buddha=round($agama->buddha);
        $khonghucu=round($agama->khonghucu);
        $datachart_agama=array(
           $islam,
            $kristen,
            $katolik,
            $hindu,
            $buddha,
            $khonghucu
        );
    }

    foreach ($datajumlahpns_kualifikasi as $kualifikasi) {

        $datachart_kualifikasi=array(
            $kualifikasi->min_s1,
            $kualifikasi->s1,
            $kualifikasi->s2,
            $kualifikasi->s3,       
            );
    }


    foreach ($datajumlahpns_ijinKualifikasi as $kualifikasi) {

        $datachart_ijinkualifikasi=array(
            $kualifikasi->min_s1,
            $kualifikasi->s1,
            $kualifikasi->s2,
            $kualifikasi->s3,       
            );
    }

    $data=array(
        'kd_satker'                 =>$kd_satker,
        'jml_pns'                   =>$jml_pns,
        'datachart_kualifikasi'     =>$datachart_kualifikasi,
        'datachart_agama'           =>$datachart_agama,
        'datachart_ijinkualifikasi'  =>$datachart_ijinkualifikasi
    );

        return $data;

    }

    public function getTabelTatakelolaPnsPangkat($tahun,$jenis_data)
    {
        $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns_naikpkt p on k.id=p.id_satker where tahun="'.$tahun.'"');
        $datapns_ijinkualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_ijinbljr p on k.id=p.id_satker where tahun="'.$tahun.'"');
        switch($jenis_data){

            case 'jkgol':
                return \DataTables::of($datapns_jkgol)
                    ->addIndexColumn()
                    ->make(true);
                break;
        
        
            case 'kualifikasi':
                return \DataTables::of($datapns_kualifikasi)
                    ->addIndexColumn()
                    ->make(true);
                break;
            
            case 'ijinkualifikasi':
                    return \DataTables::of($datapns_ijinkualifikasi)
                        ->addIndexColumn()
                        ->make(true);
                    break;
            
            case 'agama':
                    return \DataTables::of($datapns_agama)
                        ->addIndexColumn()
                        ->make(true);
                    break;
        
            default:
                    return \DataTables::of($datapns_jkgol)
                    ->addIndexColumn()
                    ->make(true);
            
        }
    }

/*===================================================================================================

                                        FRONT END
                        TATA KELOLA PNS PENSIUN DAN DATA NON ASN
     
     
====================================================================================================*/


     public function tatakelola_pnspensiun()
     {
         $tempstruk=$this->tempstruk;
         $dataseluruhpns=DB::select('select sum(pria+wanita) as total from tb_pns_pensiun  where tahun="'.$this->tahun.'"');
         $datajumlahpns_kualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_pns_pensiun  where tahun="'.$this->tahun.'"');
         $datajumlahpns_agama= DB::select('select sum(islam) as islam,sum(kristen) as kristen,sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha, sum(khonghucu) as khonghucu from tb_pns_pensiun  where tahun="'.$this->tahun.'"');
         
         $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker as kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns_pensiun  p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
         $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_pensiun  p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
         $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns_pensiun  p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
         
         $datajumlahnonpns_kualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_unitkerja k left join tb_honorer p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
         $datanonpns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_honorer p on k.id=p.id_satker where tahun="'.$this->tahun.'"');
       
         
         
         if(empty($datapns_jkgol))
         {
                     
                 $kd_satker[]= 0;
                 $jml_pns[]= 0;
         
 
             
         }else{
 
             foreach ($datapns_jkgol as $jkgol) {
             
             
                 $kd_satker[]= ucfirst($jkgol->kd_satker);
                 $jml_pns[]= round(((((int)$jkgol->pria+(int)$jkgol->wanita)/(int)$dataseluruhpns)));
     
             }
 
         }
 
         
     
 
     foreach ($datajumlahpns_agama as $agama) {
 
         $islam=round($agama->islam);
         $kristen=round($agama->kristen);
         $katolik=round($agama->katolik);
         $hindu=round($agama->hindu);
         $buddha=round($agama->buddha);
         $khonghucu=round($agama->khonghucu);
         $datachart_agama=array(
            $islam,
             $kristen,
             $katolik,
             $hindu,
             $buddha,
             $khonghucu
         );
     }
 
     foreach ($datajumlahpns_kualifikasi as $kualifikasi) {
 
         $datachart_kualifikasi=array(
             $kualifikasi->min_s1,
             $kualifikasi->s1,
             $kualifikasi->s2,
             $kualifikasi->s3,       
             );
     }
 
 
     foreach ($datajumlahnonpns_kualifikasi as $nonpns_kualifikasi) {
 
         $datachart_nonpnskualifikasi=array(
             $nonpns_kualifikasi->min_s1,
             $nonpns_kualifikasi->s1,
             $nonpns_kualifikasi->s2,
             $nonpns_kualifikasi->s3,       
             );
     }
 
         return view('pensiun',compact('datachart_kualifikasi','datachart_nonpnskualifikasi','datachart_agama','datapns_jkgol','datapns_kualifikasi','datanonpns_kualifikasi','datapns_agama','tempstruk','kd_satker','jml_pns'))
         ->with('i',(request()->input('page',1) - 1) * 10);
     }
 
     public function getChartTatakelolaPnsPensiun($tahun)
     {
                 
         $tempstruk=$this->tempstruk;
         $datakabkota=DB::select('select * from kabkota');
         $dataseluruhpns=DB::select('select sum(pria+wanita) as total from tb_pns_pensiun  where tahun="'.$tahun.'"');
         $datajumlahpns_kualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_pns_pensiun where tahun="'.$tahun.'"');
         $datajumlahpns_agama= DB::select('select sum(islam) as islam,sum(kristen) as kristen,sum(katolik) as katolik,sum(hindu) as hindu,sum(buddha) as buddha, sum(khonghucu) as khonghucu from tb_pns_pensiun where tahun="'.$tahun.'"');
         
         $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns_pensiun p on k.id=p.id_satker where tahun="'.$tahun.'"');
         
         $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_pensiun p on k.id=p.id_satker where tahun="'.$tahun.'"');
         $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns_pensiun p on k.id=p.id_satker where tahun="'.$tahun.'"');
         
         $datajumlahnonpns_kualifikasi= DB::select('select sum(min_s1) as min_s1,sum(s1) as s1,sum(s2) as s2,sum(s3) as s3 from tb_unitkerja k left join tb_honorer p on k.id=p.id_satker where tahun="'.$tahun.'"');
         $datanonpns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_honorer p on k.id=p.id_satker where tahun="'.$tahun.'"');
       
         if(empty($datapns_jkgol))
         {
                       
                 $kd_satker[]= 0;
                 $jml_pns[]= 0;
            
         }else{
 
             foreach ($datapns_jkgol as $jkgol) {
             
             
                 $kd_satker[]= ucfirst($jkgol->kd_satker);
                 $jml_pns[]= round(((((int)$jkgol->pria+(int)$jkgol->wanita)/(int)$dataseluruhpns)));
     
             }
 
         }
 
         
 
         
     foreach ($datajumlahpns_agama as $agama) {
 
         $islam=round($agama->islam);
         $kristen=round($agama->kristen);
         $katolik=round($agama->katolik);
         $hindu=round($agama->hindu);
         $buddha=round($agama->buddha);
         $khonghucu=round($agama->khonghucu);
         $datachart_agama=array(
            $islam,
             $kristen,
             $katolik,
             $hindu,
             $buddha,
             $khonghucu
         );
     }
 
     foreach ($datajumlahpns_kualifikasi as $kualifikasi) {
 
         $datachart_kualifikasi=array(
             $kualifikasi->min_s1,
             $kualifikasi->s1,
             $kualifikasi->s2,
             $kualifikasi->s3,       
             );
     }
 
 
     foreach ($datajumlahnonpns_kualifikasi as $kualifikasi) {
 
         $datachart_nonpnskualifikasi=array(
             $kualifikasi->min_s1,
             $kualifikasi->s1,
             $kualifikasi->s2,
             $kualifikasi->s3,       
             );
     }
 
     $data=array(
         'kd_satker'                    =>$kd_satker,
         'jml_pns'                      =>$jml_pns,
         'datachart_kualifikasi'        =>$datachart_kualifikasi,
         'datachart_agama'              =>$datachart_agama,
         'datachart_nonpnskualifikasi'  =>$datachart_nonpnskualifikasi
     );
 
         return $data;
 
     }
 
     public function getTabelTatakelolaPnsPensiun($tahun,$jenis_data)
     {
         $datapns_jkgol= DB::select('select k.id as idx,p.id as id,k.kd_satker, k.nama_satker as nama,pria,wanita,gol_1,gol_2,gol_3,gol_4 from tb_unitkerja k left join tb_pns_pensiun p on k.id=p.id_satker where tahun="'.$tahun.'"');
         $datapns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_pensiun p on k.id=p.id_satker where tahun="'.$tahun.'"');
         $datapns_agama= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,islam,kristen,katolik,hindu,buddha,khonghucu from tb_unitkerja k left join tb_pns_pensiun p on k.id=p.id_satker where tahun="'.$tahun.'"');
         $datanonpns_kualifikasi= DB::select('select k.id as idx,p.id as id, k.nama_satker as nama,min_s1,s1,s2,s3 from tb_unitkerja k left join tb_pns_pensiun p on k.id=p.id_satker where tahun="'.$tahun.'"');
         switch($jenis_data){
 
             case 'jkgol':
                 return \DataTables::of($datapns_jkgol)
                     ->addIndexColumn()
                     ->make(true);
                 break;
         
         
             case 'kualifikasi':
                 return \DataTables::of($datapns_kualifikasi)
                     ->addIndexColumn()
                     ->make(true);
                 break;
             
             case 'nonpnskualifikasi':
                     return \DataTables::of($datanonpns_kualifikasi)
                         ->addIndexColumn()
                         ->make(true);
                     break;
             
             case 'agama':
                     return \DataTables::of($datapns_agama)
                         ->addIndexColumn()
                         ->make(true);
                     break;
         
             default:
                     return \DataTables::of($datapns_jkgol)
                     ->addIndexColumn()
                     ->make(true);
             
         }
     }
 






}
