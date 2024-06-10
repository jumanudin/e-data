<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pns extends Model
{
    use HasFactory;
    protected $table    = 'tb_pns';
    protected $fillable = ['pria','wanita','gol_1','gol_2','gol_3','gol_4','min_30','range_30_39','range_40_49','range_50_57','lebih_57','islam','kristen','katolik','hindu','buddha','khonghucu','min_s1','s1','s2','s3'];
}
