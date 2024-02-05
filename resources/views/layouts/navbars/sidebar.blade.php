<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('turtle') }}/img/login.jpg" class="navbar-brand-img img-fluid" style="width:100px;"alt="e-SPD">
        </a>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @if( auth()->user()->email_verified_at <> null)                
                {!!
                    Helper::multiple_menu([
                    'menu' => 'konfigurasi',
                    'submenu' => ['modul_name','logs','utility']
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
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Dokumentasi</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="" style="color:black;">
                        <i class="ni ni-spaceship"></i> Petunjuk Aplikasi
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
