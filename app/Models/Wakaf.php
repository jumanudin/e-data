<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wakaf extends Model
{
    use HasFactory;
    protected $table    = 'tb_wakaf';
    protected $fillable = ['id_wilyah','jml_serti','luas_serti','jml_belum','luas_belum','masjid','mushalla','sekolah','pesantren','makam','sosial_lain','perkebunan','koperasi','rumah_sakit','rumah_sewa','perikanan','toko_sewa','pertanian','spbu','perkantoran_sewa','klinik','peternakan','lainnya','tahun'];
}
