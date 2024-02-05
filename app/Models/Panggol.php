<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panggol extends Model
{
    use HasFactory;
    protected $table = 'panggol';
    protected $fillable = ['kode_gol','pangkat','gol'];
}
