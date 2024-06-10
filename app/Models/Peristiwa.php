<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peristiwa extends Model
{
    use HasFactory;
    protected $table    = 'tb_nikah';
    protected $fillable = ['jan','feb','mar','apr','mei','jun','jul','ags','sep','okt','nov','des','kua','luar_kua','buku_nikah','kartu_nikah'];
}
