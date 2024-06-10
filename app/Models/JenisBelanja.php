<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBelanja extends Model
{
    use HasFactory;
    protected $table    = 'tb_jenis_belanja';
    protected $fillable = ['jenis_belanja'];
}
