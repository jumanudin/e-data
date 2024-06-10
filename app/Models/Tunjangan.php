<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    use HasFactory;
    protected $table    = 'tb_penyuluh_tunjangan';
    protected $fillable = ['islam','kristen','katolik','hindu','buddha','khonghucu','tahun'];
}
