<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip_group extends Model
{
    use HasFactory;
    protected $table ='arsip_group';
    protected $guarded = ['id'];
}
