<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table    = "pegawai";
    protected $guarded = ['id'];    

    // public function setKodeJenisGuruAttribute($value)
    // {
    //     $this->attributes['kode_jenis_guru'] = implode(',',$value);
    // }
  
    // /**
    //  * Get the categories
    //  *
    //  */
    // public function getKodeJenisGuruAttribute($value)
    // {
    //     // return $this->attributes['kode_jenis_guru'] = json_decode($value);
    //     return explode(',',$value);
    // }
}
