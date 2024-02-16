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
                    'menu' => 'fas fa-folder-open',
                    'submenu' => ['ni ni-bullet-list-67','fas fa-file-alt','fas fa-file-alt']
                    ],[
                    'menu' => 'Sistem Utility',
                    'submenu' => ['Nama Modul','Logs System','Utility']
                    ]);
                !!}
                
                {!!
                    Helper::multiple_menu([
                    'menu' => 'master',
                    'submenu' => ['pegawai','city']
                    ],[
                    'menu' => '#',
                    'submenu' => ['pegawai','city']
                    ],[
                    'menu' => 'fas fa-folder-open',
                    'submenu' => ['fas fa-address-card','']
                    ],[
                    'menu' => 'Master Data',
                    'submenu' => ['Pegawai','Kab / Kota']
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
                    'menu' => 'fas fa-users',
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
            <a href=""
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Petunjuk Aplikasi
            </a>
        </div>
    </aside>
</div>
