<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    use HasFactory;
    protected $table    = "kabkota";
    protected $fillable = ['id','kode','nama','ibukota'];
    public function madrasah()
    {
        return $this->hasMany(Madrasah::class,'kabkota');
    }
}
