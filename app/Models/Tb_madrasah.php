<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_madrasah extends Model
{
    use HasFactory;
    protected $table = 'Tb_madrasah';
    protected $guarded = ['id'];
}
