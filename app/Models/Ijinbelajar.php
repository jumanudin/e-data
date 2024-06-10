<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijinbelajar extends Model
{
    use HasFactory;
    protected $table    = 'tb_pns_ijinbljr';
    protected $fillable = ['min_s1','s1','s2','s3'];

}
