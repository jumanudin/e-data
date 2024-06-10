<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory;
    protected $table    = 'tb_anggaran';
    protected $fillable = ['anggaran','realisasi','pesentase','pagu_awal','pagu_akhir'];
}
