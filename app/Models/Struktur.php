<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;
    protected $table = 'struktur';
    protected $fillable =['id','nama_pimpinan','lokasi_kantor','ttd','t_1','t_2','t_3','t_4','t_5','verifikator','tahun_periode'];
}
