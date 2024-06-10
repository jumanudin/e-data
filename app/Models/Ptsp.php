<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptsp extends Model
{
    use HasFactory;
    protected $table    = 'tb_lay_ptsp';
    protected $fillable = ['elektronik','manual','ada','tidak'];
}
