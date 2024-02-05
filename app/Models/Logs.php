<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $table = "logs";
    protected $fillable = ['id','modul','event','trn_id','user_id','email','description'];
}
