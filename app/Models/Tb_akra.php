<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_akra extends Model
{
    use HasFactory;
    protected $table  = "tb_akra";
    protected $guarded = ['id']; 
}
