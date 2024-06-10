<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_penduduk extends Model
{
    use HasFactory;
    protected $table    = 'tb_penduduk';
    protected $fillable = ['islam','kristen','katolik','hindu','buddha','khonghucu','lainnya'];

    // public $timestamps = false;
}
