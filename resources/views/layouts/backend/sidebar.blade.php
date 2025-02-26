<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="/" class="brand-link">
    <img src="{{ asset('img/icons') }}/laravel.jpg" alt="laravel Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"></span>
  </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="/home"> <img src="{{ asset('img/icons') }}/codeigniter4.png" class="img-circle elevation-2"
                        alt="User Image">
            </div>
            <div class="info">
                <a href="/admin/profile" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MANAGE DATA</li>
                @can('admin1')
                    <!-- Pengguna -->
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link {{ Request::segment(2) == 'users' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kelola Admin
                            </p>
                        </a>
                    </li>
                @endcan
                @can('admin1')
                <!-- Visi, Misi dan Sejarah -->
                {{-- <li class="nav-item">
                    <a href="{{ route('kelola-ebook') }}"
                        class="nav-link {{ Request::is('/admin/kelola-ebook-kitab-ulama') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ad"></i>
                        <p>
                            Visi, Misi dan Sejarah
                        </p>
                    </a>
                </li> --}}
                @endcan
                @can('admin1')
                    <!-- Data Guru dan Santri -->
                    <li class="nav-item">
                        <a href="{{ route('admin.pengumuman.index') }}"
                            class="nav-link {{ Request::segment(2) == 'pengumuman' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                               Data Guru dan Santri
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Tambah Program -->
                <li class="nav-item">
                    <a href="{{ route('admin.artikel.index') }}"
                        class="nav-link {{ Request::segment(2) == 'artikel' ? 'active' : '' }}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Program
                        </p>
                    </a>
                </li>
                {{-- @can('admin1')
                    <!-- Jenis Kajian -->
                    <li class="nav-item">
                        <a href="{{ route('admin.kategori-artikel.index') }}"
                            class="nav-link {{ Request::segment(2) == 'kategori-artikel' ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Kelola Jenis Kajian
                            </p>
                        </a>
                    </li>
                @endcan --}}
                @can('admin1')
                    <li class="nav-item">
                        <a href="{{ route('Kelola-Donasi') }}"
                            class="nav-link {{ Request::is('admin/kelola-donasi') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-inbox"></i>
                            <p>
                                Kelola Donasi
                            </p>
                        </a>
                    </li>
                @endcan
                @can('admin1')
                    <!-- Hubungi Kami -->
                    <li class="nav-item">
                        <a href="{{ route('contact.index') }}"
                            class="nav-link {{ Request::is('admin/kelola-hub-kami') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-phone"></i>
                            <p>
                                Pesan, Kritik dan Saran
                            </p>
                        </a>
                </li>
                

                    <!-- Pengaturan -->
                    <li class="nav-header">PENGATURAN</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.profile.index') }}"
                            class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Profil
                            </p>
                        </a>
                    </li>
                @endcan
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.change-password.index') }}"
                        class="nav-link {{ Request::is('admin/change-password') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-unlock"></i>
                        <p>
                            Ubah Password
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
