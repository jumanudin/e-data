<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_Anggaran extends Model
{
    use HasFactory;
    protected $table    = "mata_anggaran";
    protected $quarded  = ['id'];
}
