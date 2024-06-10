<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unitprogram extends Model
{
    use HasFactory;
    protected $table    = 'tb_unitprogram';
    protected $fillable = ['nama_program'];
}
