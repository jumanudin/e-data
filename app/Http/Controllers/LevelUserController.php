<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role_user;
use App\Models\Role_permission;
use App\Models\Modul;
use App\Models\Ts_master;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Helper;
class LevelUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $totdraf    = Ts_master::where('status',0)->count(); 
      $totsetuju  = Ts_master::where('status',1)->count(); 
      $totrevisi  = Ts_master::where('status',2)->count();
      $tottolak   = Ts_master::where('status',3)->count();
        $role = Role_user::all();
        return view('pages.role.role_user',compact('role','totdraf','totsetuju','totrevisi','tottolak'))
        ->with('i', (request()->input('page', 1) - 1) * 10);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $totdraf    = Ts_master::where('status',0)->count(); 
      $totsetuju  = Ts_master::where('status',1)->count(); 
      $totrevisi  = Ts_master::where('status',2)->count();
      $tottolak   = Ts_master::where('status',3)->count();
        $modul = Modul::all();
        return view('pages.role.role_create',compact('modul','totdraf','totsetuju','totrevisi','tottolak'));
    }
    public function reupdate($id)
    {
        $modul = Modul::all();
        $data = Role_user::find($id);
        return view('pages.role.role_edit',compact('modul','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $this->validate($req,[
        'level' => 'required'
      ]);

      $counter = 0;
      $id_level = DB::table('role_user')
                  ->insertGetId([
                    'level' => $req->level,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                  ]);

      for ($i=0; $i < count($req->id_modul); $i++) {
        $stat = DB::table('role_permission')
                ->insert([
                  'id_role' => $id_level,
                  'id_modul' => $req->id_modul[$i],
                  'l' => isset($req["l".$i])?$req["l".$i]:false,
                  'd' => isset($req["d".$i])?$req["d".$i]:false,
                  't' => isset($req["t".$i])?$req["t".$i]:false,
                  'u' => isset($req["u".$i])?$req["u".$i]:false,
                  'h' => isset($req["h".$i])?$req["h".$i]:false,
                  'created_at' => \Carbon\Carbon::now(),
                  'updated_at' => \Carbon\Carbon::now(),
                ]);
        if (!$stat) {
          $counter += 1;
        }
      }

      if ($counter == 0) {
        return redirect('role_user')->with('success','data berhasil ditambah.'); 
      }else {
        return redirect('role_user')->with('error','data gagal ditambahkan.'); 
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $totdraf    = Ts_master::where('status',0)->count(); 
        $totsetuju  = Ts_master::where('status',1)->count(); 
        $totrevisi  = Ts_master::where('status',2)->count();
        $tottolak   = Ts_master::where('status',3)->count();
        $data = Role_user::find($id);
        //cek modul dulu di role ada tidaknya
        
        $modul = Modul::all();
        foreach ($modul as $tmodul) {
              $temp = Role_permission::where('id_modul',$tmodul->id)->where('id_role',$id)->first();
              if(is_null($temp)){
                $tempRole = new Role_permission;
                $tempRole->id_role = $id;
                $tempRole->id_modul = $tmodul->id;
                $tempRole->l = 0;
                $tempRole->d = 0;
                $tempRole->t = 0;
                $tempRole->u = 0;
                $tempRole->h = 0;
                $tempRole->save();
              }
        }
        $role = DB::table('role_permission')
              ->select('role_permission.*','modul.nama_menu')  
              ->where('id_role',$id)
              ->leftJoin('modul','modul.id','=','role_permission.id_modul') 
              ->orderBy('id_modul')
              ->get();     
        $modul = Modul::all();        
        return view('pages.role.role_edit',compact('role','data','totdraf','totsetuju','totrevisi','tottolak'))->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'level' => 'required',
          ]);
    
          $counter = 0;
          $stat = DB::table('role_user')
                  ->where('id',$id)
                  ->update([
                    'level' => $request->level,
                    'updated_at' => \Carbon\Carbon::now(),
                  ]);
    
          $stat = DB::table('role_permission')
                  ->where('id_role', $id)
                  ->delete();
    
          for ($i=0; $i < count($request->id_modul); $i++) {
            $stat = DB::table('role_permission')
                    ->insert([
                      'id_role' => $id,
                      'id_modul' => $request->id_modul[$i],
                      'l' => isset($request["l".$i])?$request["l".$i]:false,
                      'd' => isset($request["d".$i])?$request["d".$i]:false,
                      't' => isset($request["t".$i])?$request["t".$i]:false,
                      'u' => isset($request["u".$i])?$request["u".$i]:false,
                      'h' => isset($request["h".$i])?$request["h".$i]:false,
                      'created_at' => \Carbon\Carbon::now(),
                      'updated_at' =>  \Carbon\Carbon::now(),
                    ]);
    
            if (!$stat) {
              $counter += 1;
            }
          }
    
          if ($counter == 0) {
            Alert::success('Updated Data', 'Your Updated data as been submited!');
          }else {
            Alert::warning('Updated Data', 'Your Updated data as been failed!');
          }
    
          return redirect('role_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $stat = DB::table('role_permission')
      ->where('id_role', $id)
      ->delete();

      $stat = DB::table('role_user')
              ->where('id',$id)
              ->delete();

      if ($stat) {
        return redirect('role_user')->with('success','data berhasil dihapus.'); 
      }else {
        return redirect('role_user')->with('error','data gagal dihapus.'); 
      }   
    }
}
