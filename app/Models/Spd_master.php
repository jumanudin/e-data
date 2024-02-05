<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spd_master extends Model
{
    use HasFactory;
    protected $table = "spd_master";
    protected $guarded = ['id'];
}
