<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmn extends Model
{
    use HasFactory;
    protected $table    = 'tb_bmn';
    protected $fillable = ['lok_baik','lok_rusak_ringan','lok_rusak_berat','ged_baik','ged_rusak_ringan','ged_rusak_berat'];
}
