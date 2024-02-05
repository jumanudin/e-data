<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Rolemiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $modul='none',$akses='')
    {
        if (Auth::check()) {
            if ($modul == 'guest') {
              return redirect('dashboard');
            }else{
              $data = DB::table('role_permission')
                      ->leftJoin('modul','modul.id','=','role_permission.id_modul')
                      ->where('nama_modul',$modul)
                      ->where('id_role',auth()->user()->id_role)
                      ->first();

              if (isset($data->$akses)) {
                if (!$data->$akses) {
                  return redirect('pages/error/pg500');
                }
              }
            }
        }else{
          if ($modul == 'none') {
          }elseif ($modul != 'guest') {
            return redirect('login');
          }
        }
        
        $response = $next($request);

        return $response->header("Cache-Control","no-cache,no-store, must-revalidate")
                        ->header("Pragma", "no-cache") //HTTP 1.0
                        ->header("Expires"," Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    }        
        // return $next($request);
    
}
