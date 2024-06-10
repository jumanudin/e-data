<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensiunan extends Model
{
    use HasFactory;
    protected $table    = 'tb_pns_pensiun';
    protected $fillable = ['pria','wanita','gol_1','gol_2','gol_3','gol_4','islam','kristen','katolik','hindu','buddha','khonghucu','min_s1','s1','s2','s3'];

}
