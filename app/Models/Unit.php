<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table    = "unit";
    protected $fillable = ['id','induk_id','nama_unit','alamat','email'];
    public function madrasah()
    {
        return $this->hasMany(Perjadin::class,'unit');
    }
}
