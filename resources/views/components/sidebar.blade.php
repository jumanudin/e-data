<div class="main-sidebar sidebar-style-2 shadow rounded">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">e-DATA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">St</a>
        </div>
        <ul class="sidebar-menu">
        @if( auth()->user()->email_verified_at <> null)                
                {!!
                    Helper::multiple_menu([
                    'menu' => 'konfigurasi',
                    'submenu' => ['modul_name','logs','utility'],
                    ],[
                    'menu' => '#',
                    'submenu' => ['modul_name','logs','utility']
                    ],[
                    'menu' => 'fa fa-folder-open',
                    'submenu' => ['ni ni-bullet-list-67','fas fa-file-alt','fas fa-file-alt']
                    ],[
                    'menu' => 'Sistem Utility',
                    'submenu' => ['Nama Modul','Logs System','Utility']
                    ]);
                !!}
                
                {!!
                    Helper::multiple_menu([
                    'menu' => 'master',
                    'submenu' => ['pegawai','doc_arsip']
                    ],[
                    'menu' => '#',
                    'submenu' => ['pegawai','doc_arsip']
                    ],[
                    'menu' => 'fa fa-folder-open',
                    'submenu' => ['fas fa-address-card','']
                    ],[
                    'menu' => 'Master Data',
                    'submenu' => ['Pegawai','Dokumen Arsip']
                    ]);
                !!}
                {!!
                    Helper::multiple_menu([
                    'menu' => 'transaksi',
                    'submenu' => ['ts_master','spd_master','verifikator','buat_spd','arsip_trc']
                    ],[
                    'menu' => '#',
                    'submenu' => ['ts_master','spd_master','verifikator','buat_spd','arsip_trc']
                    ],[
                    'menu' => 'ni ni-bullet-list-67',
                    'submenu' => ['fas fa-city','fas fa-user-tie','fas fa-user-friends','fas fa-user-friends','fas fa-user-friends']
                    ],[
                    'menu' => 'Transaksi',
                    'submenu' => ['Telaahan Staf','Kontrol SPD','Inbox Verifikator','Inbox Perjadin','Inbox Arsip']
                    ]);
                !!}
                {!!
                    Helper::multiple_menu([
                    'menu' => 'report',
                    'submenu' => ['report_spd','report_spd/token']
                    ],[
                    'menu' => '#',
                    'submenu' => ['report_spd','report_spd/token']
                    ],[
                    'menu' => 'ni ni-bullet-list-67',
                    'submenu' => ['fas fa-file','fas fa-file']
                    ],[
                    'menu' => 'Laporan',
                    'submenu' => ['Monitoring SPD','Monitoring Token SPD']
                    ]);
                !!}
                {!!
                    Helper::multiple_menu([
                    'menu' => 'user',
                    'submenu' => ['role_user','data_user']
                    ],[
                    'menu' => '#',
                    'submenu' => ['role_user','data_user']
                    ],[
                    'menu' => 'fa fa-users',
                    'submenu' => ['fas fa-user-cog','fas fa-user-friends']
                    ],[
                    'menu' => 'User',
                    'submenu' => ['Role User','Data User']
                    ]);
                
                !!}           
                @endif

            <li class="{{ Request::is('credits') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('credits') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Credits</span>
                </a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>