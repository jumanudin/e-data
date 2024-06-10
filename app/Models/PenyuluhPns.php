<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyuluhPns extends Model
{
    use HasFactory;
    protected $table    = 'tb_penyuluh_islam';
    protected $fillable = ['pns_pria','pns_wanita','kurang_s1','s1','lebih_s1','nonpns_pria','nonpns_wanita','kurang_s1_non','s1_non','lebih_s1_non','tahun'];
}
