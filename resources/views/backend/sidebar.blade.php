<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="{{ asset('template/backend/umum') }}/logoadmin.png" alt="site logo" class="light-logo">
            <img src="{{ asset('template/backend/umum') }}/logoadmin.png" alt="site logo" class="dark-logo">
            <img src="{{ asset('template/backend/umum') }}/logoadmin.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ url('posiadmin') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>

            </li>
           @if(session('level') !== 3)
            <li class="sidebar-menu-group-title">Website</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-14 d-flex w-auto"></i>
                    <span>HomePage</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('posiadmin/visi-misi') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Visi & Misi</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/flow') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Process Flow Text</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/testimony') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Testimoni</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/partner') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Partner Kami</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/abouts') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Tentang Kami</a>
                    </li>
                    <li>
                        <a href="{{ url('/posiadmin/team') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Tim
                            Kami</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/privacy') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Kebijakan Privasi</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/term') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Syarat Ketentuan</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/refund') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Kebijakan Refund</a>
                    </li>


                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-14 d-flex w-auto"></i>
                    <span>Blog</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('posiadmin/beritas') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Berita</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/event') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Event</a>
                    </li>
                    {{-- <li>
                        <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Pengumuman</a>
                    </li> --}}

                </ul>
            </li>

            <div style="margin-top:30px"></div>
            <li class="sidebar-menu-group-title">Menu Utama</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-window-line text-xl me-14 d-flex w-auto"></i>
                    <span>Master Data</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('posiadmin/competition') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Kompetisi</a>
                    </li>

                    <li>
                        <a href="{{ url('posiadmin/pelajaran') }}"><i
                                class="ri-circle-fill circle-icon text-info-main w-auto"></i> Pelajaran</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/kelas') }}"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Kelas</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/level') }}"><i
                                class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Level</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-briefcase-4-line text-xl me-14 d-flex w-auto"></i>
                    <span>Data Produk</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('posiadmin/product') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Daftar Produk</a>
                    </li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-group-3-line text-xl me-14 d-flex w-auto"></i>
                    <span>Data Peserta</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('posiadmin/user') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Daftar Peserta</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/collective') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pendaftaran</a>
                    </li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-bar-chart-box-line text-xl me-14 d-flex w-auto"></i>
                    <span>Data Transaksi</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('posiadmin/pesanan') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Transaksi</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/cart') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Cart (Keranjang)</a>
                    </li>

                </ul>
            </li>
            @endif
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-id-card-line text-xl me-14 d-flex w-auto"></i>
                    <span>Data Soal & Ujian</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('posiadmin/soal') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Daftar Soal</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/hasil') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Daftar Hasil</a>
                    </li>
                    <li>
                        <a href="{{ url('posiadmin/pemberitahuan') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pengumuman</a>
                    </li>

                </ul>
            </li>
            @if(session('level') == 1)
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-group-2-line text-xl me-14 d-flex w-auto"></i>
                    <span>Data Admin</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('posiadmin/admins') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Admin</a>
                    </li>

                </ul>
            </li>
            @endif
            <div style="margin-top:60px"></div>

        </ul>
    </div>
</aside>
