<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_gser extends Model
{
    use HasFactory;
    protected $table = "tb_gsertifikasi";
    protected $guarded = ['id'];
}
