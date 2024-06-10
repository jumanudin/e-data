<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fkub extends Model
{
    use HasFactory;
    protected $table    = 'tb_fkub';
    protected $fillable = ['fkub','sekber','sadar_kerukunan'];
}
