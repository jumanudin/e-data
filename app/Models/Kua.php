<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kua extends Model
{
    use HasFactory;
    protected $table    = 'tb_kua';
    protected $fillable = ['id_wilyah','type_a','type_b','type_c','type_d','type_d2','jml_serti','luas_serti','jml_belum','luas_belum','baik','rsk_ringan','rsk_sedang','rehab_ringan','rehab_berat','balai_nikah','peng_pertama','peng_muda','peng_madya','pembinaan_pertama','pembinaan_muda','pembinaan_madya','pembinaan_utama','peng_utama','tahun'];

}
