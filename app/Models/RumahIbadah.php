<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahIbadah extends Model
{
    use HasFactory;
    protected $table = "tb_rmh_ibadah";
    protected $fillable = ['masjid','musholla','gereja_kristen','gereja_katolik','pura','vihara','kelenteng'];

    public $timestamps = false;
}
