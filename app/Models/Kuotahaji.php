<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuotahaji extends Model
{
    use HasFactory;
    protected $table    = 'tb_kuota';
    protected $fillable = ['passpor','2030','2029','2028','2027','2026','2025','2024','2023','2022','2021','2020','2019','2018','2017'];
}
