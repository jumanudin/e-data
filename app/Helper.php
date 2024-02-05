<?php
use Illuminate\Support\Facades\DB;
use App\Models\Logs;
class Helper
{
  function tgl_indo($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
   
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }
  
  public static function encrypt($string)
  {
    return urlencode(base64_encode($string));
  }

  public static function decrypt($string)
  {
    return base64_decode(urldecode($string));
  }

  public static function create_log($modul,$descript,$tbl_trn)
  {
    $user = auth()->user();
    $logs = new Logs;
    $logs->modul = $modul;
    $logs->event = $descript;
    $logs->trn_id = $tbl_trn->id;
    $logs->user_id = $user->id;
    $logs->user_name = $user->name;
    $logs->email = $user->email;
    return $logs;
  }
  public static function clear_password($string)
  {
    $data = explode(':"',$string);

    if(count($data) == 1){
      return $data[0];
      // echo $data[0];
    }else if(count($data) == 2){
      // echo str_replace('";','',$data[1]);
      return str_replace('";','',$data[1]);
    }
  }

  public static function get_level()
  {
    if (auth()->user()->id_level == 1) {
      $data = DB::table('level_user')
      ->pluck('level','id')
      ->toArray();
    }else {
      $data = DB::table('level_user')
      ->where('id','<>',1)
      ->pluck('level','id')
      ->toArray();
    }

    return $data;
  }
  
  public static function get_agama()
  {
    $data = [
      'Islam' => 'Islam',
      'Kristen' => 'Kristen',
      'Katholik' => 'Katholik',
      'Hindu' => 'Hindu',
      'Budha' => 'Budha',
    ];

    return $data;
  }

  
  public static function get_level_user($id_level)
  {
    $data = DB::table('level_user')
            ->where('id',$id_level)
            ->first();

    return $data;
  }

  public static function get_unit_pengolah_arr()
  {
    $data = DB::table('unit_pengolah')
            ->orderBy('nama_unit_pengolah','asc')
            ->pluck('nama_unit_pengolah','id')
            ->toArray();

    return $data;
  }

  public static function get_output_arr()
  {
    $data = DB::table('output')
            ->orderBy('output','asc')
            ->pluck('output','id')
            ->toArray();

    return $data;
  }

  public static function get_jenis_layanan_arr()
  {
    $data = DB::table('jenis_layanan')
            ->orderBy('jenis_layanan','asc')
            ->pluck('jenis_layanan','id')
            ->toArray();

    return $data;
  }

  public static function get_data_layanan_arr()
  {
    $data = [];
    $result = DB::table('data_layanan')
            ->select('data_layanan.id','data_layanan.nama_layanan','unit_pengolah.nama_unit_pengolah')
            ->leftJoin('unit_pengolah','unit_pengolah.id','=','data_layanan.id_unit_pengolah')
            ->orderBy('unit_pengolah.nama_unit_pengolah','asc')
            ->get();

    foreach ($result as $key => $value) {
      $data[$value->id] = "(".$value->nama_unit_pengolah.") ".$value->nama_layanan;
    }

    return $data;
  }

  public static function cek_level_akses($menu)
  {
    $data = DB::table('role_permission')
            ->leftJoin('modul','modul.id','=','role_permission.id_modul')
            ->where('modul.nama_modul',$menu)
            ->where('id_role',auth()->user()->id_role)
            ->first();
    return $data;
  }

  public static function single_menu($session = '', $url = '', $icon = '', $judul = '')
  {
    $html = '';
    // dd($session);
    if (isset(Helper::cek_level_akses($session)->l)) {
      if (Helper::cek_level_akses($session)->l) {
        $html = 
		'<li class="menu-header">'.$session.'</li>
		 <li class="nav-item">
                  <a href="'.url($url).'" class="nav-link '.((session('menu')==$session)?'active':'').'">
                    <i class="nav-icon '.$icon.'"></i>
                    <p>
                      '.$judul.'
                    </p>
                  </a>
         </li>';

      }else {
        $html = '';
      }
    }else if ($session == "dashboard"){
      $html = '
	  <li class="menu-header">'.$session.'</li>
	  <li class="nav-item">
                  <a href="'.url($url).'" class="nav-link '.((session('menu')==$session)?'active':'').'">
                    <i class="nav-icon '.$icon.'"></i>
                    <span>
                      '.$judul.'
                    </span>
                  </a>
                </li>';
    }

    return $html;
  }

  public static function multiple_menu($session=[], $url=[], $icon=[], $judul=[])
  {
    $tampilkan = [];
     // dd(count($session['submenu']));
    for ($i=0; $i < count($session['submenu']); $i++) {
      // dd(Helper::cek_level_akses($session['submenu'][1])->l);
      if (Helper::cek_level_akses($session['submenu'][$i])->l) {
        $tampilkan[] = $session['submenu'][$i];
      }
    }

    if (count($tampilkan) > 0) {
      $html = ' 
                  <li class="nav-item dropdown ">
                  <a href="#" class="nav-link has-dropdown"><i class="'.$icon['menu'].'"></i>
                    <span>'.$judul['menu'].'</span>
                  </a>
                   <ul class="dropdown-menu">';
                    for ($i=0; $i < count($session['submenu']); $i++) {
                      if (Helper::cek_level_akses($session['submenu'][$i])->l) {
                        if ($url['submenu'][$i] == 'level_user' && auth()->user()->id != 1) {
                          # code...
                          $html .= '';
                        }else{
                          $html .= '<li class="{{ Request::is("'.$url['submenu'][$i].'") ? "active" : "" }}">
                                      <a href="'.url($url['submenu'][$i]).'" class="nav-link">
                                        '.$judul['submenu'][$i].'
                                      </a>
                                    </li>';
                        }
                      }
                    }
                    $html .= '
                 </ul>
                </li>';
    }else {
      $html = '';
    }

    return $html;
  }

  public static function add_logs($ket)
  {
    DB::table('logs')
    ->insert([
      'id_user' => auth()->user()->id,
      'ip' => request()->ip(),
      'device' => request()->header('User-Agent'),
      'ket' => $ket,
      'created_at' => \Carbon\Carbon::now(),
      'updated_at' => \Carbon\Carbon::now(),
    ]);
  }

  public static function date_to_db($date)
  {
    return date('Y-m-d',strtotime($date));
  }

  public static function date_to_view($date)
  {
    return date('d-m-Y',strtotime($date));
  }
}

?>
