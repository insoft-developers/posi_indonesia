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
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>

            </li>
            <li class="sidebar-menu-group-title">Menu Utama</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                 <i class="ri-window-line text-xl me-14 d-flex w-auto"></i>
                  <span>Master Data</span> 
                </a>
                <ul class="sidebar-submenu">
                  <li>
                    <a href="{{ url('posiadmin/competition') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Kompetisi</a>
                  </li>
                  <li>
                    <a href="users-grid.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Bidang Studi</a>
                  </li>
                  <li>
                    <a href="{{ url('posiadmin/pelajaran') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Pelajaran</a>
                  </li>
                  <li>
                    <a href="view-profile.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Kelas</a>
                  </li>
                  <li>
                    <a href="view-profile.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Level</a>
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
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Berita</a>
                  </li>
                  <li>
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Event</a>
                  </li>
                  <li>
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pengumuman</a>
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
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Daftar Produk</a>
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
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Daftar Peserta</a>
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
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Transaksi</a>
                  </li>
                 
                </ul>
              </li>
              <li class="dropdown">
                <a href="javascript:void(0)">
                 <i class="ri-id-card-line text-xl me-14 d-flex w-auto"></i>
                  <span>Data Soal</span> 
                </a>
                <ul class="sidebar-submenu">
                  <li>
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Daftar Soal</a>
                  </li>
                  <li>
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Daftar Pembahasan</a>
                  </li>
                 
                </ul>
              </li>

              <li class="dropdown">
                <a href="javascript:void(0)">
                 <i class="ri-group-2-line text-xl me-14 d-flex w-auto"></i>
                  <span>Data Admin</span> 
                </a>
                <ul class="sidebar-submenu">
                  <li>
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Admin</a>
                  </li>
                
                </ul>
              </li>
              <li class="dropdown">
                <a href="javascript:void(0)">
                 <i class="ri-settings-5-line text-xl me-14 d-flex w-auto"></i>
                  <span>Pengaturan</span> 
                </a>
                <ul class="sidebar-submenu">
                  <li>
                    <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> General Setting</a>
                  </li>
                
                </ul>
              </li>
              
           
        </ul>
    </div>
</aside>
