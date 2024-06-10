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
                <!-- --------- Menu Layanan Tata Kelola & Dukungan Manajemen ----------   -->
                {!!
                    Helper::multiple_menu([
                    'menu' => 'layanan',
                    'submenu' => ['laytatakelola_wiladm','laytatakelola_pns','laytatakelola_pns_pangkat','laytatakelola_pns_ijinbelajar','laytatakelola_pensiun','laytatakelola_honorer','laytatakelola_ptsp','laytatakelola_bmn']
                    ],[
                    'menu' => '#',
                    'submenu' => ['wiladm','pns','naik_pangkat','ijin_belajar','pensiun','honorer','ptsp','bmn']
                    ],[
                    'menu' => 'fas fa-business-time',
                    'submenu' => ['fas fa-user-cog','fas fa-user-cog','fas fa-user-friends','fas fa-user-friends']
                    ],[
                    'menu' => 'Layanan Manajemen Tata Kelola',
                    'submenu' => ['Wilayah Administrasi','PNS','PNS Naik Pangkat','PNS Ijin Belajar','Pensiunan','Non PNS','PTSP & FKUB','Anggaran & BMN']
                    ]);
                !!}
                <!-- ------------- End Menu Layanan PHU-------------  -->
                {!!
                    Helper::multiple_menu([
                    'menu' => 'layanan',
                    'submenu' => ['laymad_gsertifikat','laymad_ra','laymad_akmi']
                    ],[
                    'menu' => '#',
                    'submenu' => ['laymad_gsertifikat','laymad_ra','laymad_akmi']
                    ],[
                    'menu' => 'fas fa-database',
                    'submenu' => ['fas fa-user-cog','fas fa-user-cog','fas fa-user-friends']
                    ],[
                    'menu' => 'Layanan Madrasah',
                    'submenu' => ['Sertifikasi Guru','Data RA','Data MI','Data MTs','Data MA','Keagamaan','Kristen','Katolik','Hindu','Buddha','Konghucu']
                    ]);
                !!}     
                <!-- --------- Menu Layanan Keagamaan ----------   -->
                {!!
                    Helper::multiple_menu([
                    'menu' => 'layanan',
                    'submenu' => ['layagama_JmlPenduduk','layagama_RmhIbadah','layagama_TipoMasjid','layagama_PenyuluhAgamaPNS','layagama_PenyuluhAgamaNonPNS','layagama_Tunjangan','layagama_Kua','layagama_Wakaf','layagama_qori_hafiz','layagama_ormas']
                    ],[
                    'menu' => '#',
                    'submenu' => ['jumlah_penduduk','rumah_ibadah','tipo_masjid','penyuluh_pns','penyuluh_nonpns','penerima_tunjangan','kua','wakaf','qori_hafiz','ormas']
                    ],[
                    'menu' => 'fas fa-business-time',
                    'submenu' => ['fas fa-user-cog','fas fa-user-cog','fas fa-user-friends','fas fa-user-friends','fas fa-user-friends','fas fa-user-friends']
                    ],[
                    'menu' => 'Layanan Keagamaan',
                    'submenu' => ['Jumlah Penduduk','Rumah Ibadah','Tipologi Masjid','Penyuluh PNS','Penyuluh Non PNS','Penyuluh Terima Tunjangan','KUA','Wakaf','Qori dan Hafiz','ormas']
                    ]);
                !!}
                <!-- ------------- End Menu Layanan Keagamaan -------------  -->

                <!-- --------- Menu Layanan PHU ----------   -->
                    {!!
                    Helper::multiple_menu([
                    'menu' => 'layanan',
                    'submenu' => ['layphu_kuota','layphu_pendaftaran','layphu_jemaah','layphu_daftarbaru','layphu_petugas','layphu_kbihu']
                    ],[
                    'menu' => '#',
                    'submenu' => ['kuota_haji','daftartunggu','jemaah_haji','daftarbaru','petugas','kbihu']
                    ],[
                    'menu' => 'fas fa-business-time',
                    'submenu' => ['fas fa-user-cog','fas fa-user-cog','fas fa-user-friends','fas fa-user-friends']
                    ],[
                    'menu' => 'Layanan PHU',
                    'submenu' => ['Kuota Haji','Daftar Tunggu Haji','Jemaah Haji','Pendaftar Baru','Petugas & Paspor','KBIHU']
                    ]);
                !!}
                <!-- ------------- End Menu Layanan PHU-------------  -->
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
