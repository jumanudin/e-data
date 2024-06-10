<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormas extends Model
{
    use HasFactory;
    protected $table    = 'tb_ormas';
    protected $fillable = ['islam','kristen','katolik','hindu','buddha','khonghucu'];
}
