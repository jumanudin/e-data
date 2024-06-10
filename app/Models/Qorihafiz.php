<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qorihafiz extends Model
{
    use HasFactory;
    protected $table    = 'tb_qori';
    protected $fillable = ['qori_pria','qori_wanita','hafiz_pria','hafiz_wanita'];
}
