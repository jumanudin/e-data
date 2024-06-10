<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\Pns;
use App\Models\Struktur;
use DataTables;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use App\Models\Ts_master;
class HomeController extends Controller
{
    function __construct()
    {
        $this->tempstruk = Struktur::first();
        $this->tahun=$this->tempstruk->tahun_priode;
        $this->satker = Unit::whereIn('kd_satker',['kanwil','pkp','bangka','bateng','babar','basel','belitung','beltim'])->get();
        
    }
    

    public function site()
    {
        return view('home');
    }

    

    public function index()
    {
        $user       = Auth::user();
        return view('dashboard');
    }
}
