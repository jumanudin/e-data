<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaah extends Model
{
    protected $table    = 'tb_haji';
    protected $fillable = ['kurang_18','rentang_18_50','rentang_51_65','rentang_66_75','lebih_75','pria','wanita','pns','tni_polri','niaga','tani','swasta','irt','pelajar','bumn_bumd','pensiun','lain_lain','sd','sltp','slta','d1_d3','s1','s2','s3','lainnya','belum','sudah','tahun'];

}
