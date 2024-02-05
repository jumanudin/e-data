<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip_doc extends Model
{
    use HasFactory;
    protected $table ='arsip_doc';
    protected $guarded = ['id'];
}
