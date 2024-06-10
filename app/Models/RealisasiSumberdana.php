<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiSumberdana extends Model
{
    use HasFactory;
    protected $table    = 'tb_realisasi_dana';
    protected $fillable = ['pagu','realisasi'];
}
