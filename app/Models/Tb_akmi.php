<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_akmi extends Model
{
    use HasFactory;
    protected $table = 'tb_akmi';
    protected $guarded = ['id']; 
}
