<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;
    protected $table    = 'tb_tipo_masjid';
    protected $fillable = ['ngr','raya','agung','besar','jamik','sejarah','umum','nasional','masjid','musholla'];
}
