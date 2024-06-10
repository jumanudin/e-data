<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nonpns extends Model
{
    use HasFactory;
    protected $table    = 'tb_honorer';
    protected $fillable = ['min_s1','s1','s2','s3'];

}
