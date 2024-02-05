<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role_user;
use App\Models\User;
use app\Models\Logs;
use App\Models\Ts_master;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Helper;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index_view(User $model)
    {
        $user = User::leftJoin('role_user','role_user.id','=','users.id_role')
        ->select('users.*','role_user.id as role_id','role_user.level as level')
        ->get();
        return view('users.index',compact('user'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create()
    {
        $role = Role_user::all();
        return view('users.user-new',compact('role'));    
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {
        $validData = $request->validate([
            'name'    => 'required',            
            'id_role'      => 'required',      
            'username'  => 'required|max:20|unique:users',
            'email'     => 'required|email|unique:users',     
            'password'   => 'required|min:8|confirmed',     
        ]);    
        $pass = $request->password;
        $validData['password'] = Hash::make($pass);
        $validData['profile_photo_url'] = 'user.png';
        $temp = User::create($validData);
        $log = Helper::create_log('Modul Users','Create Data',$temp);    
        $log->save();    
        return redirect('data_user')->with('success','Data berhasil ditambahkan.');
    }  
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'name'    => 'required',            
            'id_role'      => 'required',      
            'username'  => '',
            'email'     => '',     
            // 'password'   => 'required|min:8|confirmed',     
        ]);  
        $pass = $request->password;
        $validData['password'] = Hash::make($pass);
        $temp = User::find($id);
                $temp->update($validData);
        $log = Helper::create_log('Modul Users','Update Data',$temp);           
        $log->save();
        return redirect('data_user')->with('success','data berhasil diubah.'); 
    }  
    public function edit($id)
    {
        $user = User::find($id);
        $role = Role_user::pluck('level', 'id');
        return view('users.user-edit', compact('user','role'));
    }
    public function reset($id)
    {
        $result = User::find($id)->update(['password' =>Hash::make('12345678')]);
        if ($result) {
            return redirect('data_user')->with('success','password berhasil direset.'); 
          }else {
            return redirect('data_user')->with('error','password gagal direset.'); 
        }
        return redirect()->route('user')->with('success','ok');
    }
    public function destroy($id)
    {
      $stat = User::find($id);
      $result = $stat->delete();
      $log = Helper::create_log('Modul Users','Delete Data',$stat);        
      $log->save();
      if ($result) {
        return redirect('data_user')->with('success','data berhasil dihapus.'); 
      }else {
        return redirect('data_user')->with('error','data gagal dihapus.'); 
      }   
    }
}