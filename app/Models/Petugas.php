<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table    = 'tb_petugas';
    protected $fillable = ['pria','wanita','kurang_s1','s1','s2','s3','passpor'];
}
