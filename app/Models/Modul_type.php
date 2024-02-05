<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul_type extends Model
{
    use HasFactory;
    protected $table    = 'modul_type';
    protected $fillable  = ['id','modul_type'];
}
