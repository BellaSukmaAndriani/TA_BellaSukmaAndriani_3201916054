<div class="clever-main-menu">
    <div class="classy-nav-container breakpoint-off">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="cleverNav">

            <!-- Logo -->
            {{-- <a class="nav-brand"> Pondok Pesantren</a> --}}
            <a class="navbar-brand" href="#"><img src="img/logo.png" width="260" height="270"></a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu">

                <!-- Close Button -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>

                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="/"
                                class="{{ Request::is('/') || Request::is('home') ? 'text-primary' : '' }}">HOME</a>
                        </li>
                        <li><a href="{{ route('about') }}"
                            class="{{ Request::is('about') ? 'text-primary' : '' }}">PROFIL</a></li>
                        <li><a href="{{ route('pengumuman') }}"
                                class="{{ Request::segment(1) == 'pengumuman' ? 'text-primary' : '' }}">DATA GURU DAN SANTRI</a></li>
                        <li><a href="{{ route('artikel') }}"
                                class="{{ Request::segment(1) == 'artikel' ? 'text-primary' : '' }}">PROGRAM</a>
                        </li>
                        <li> <a href=" {{ route('donasi') }}"
                                class="{{ Request::is('donasi') ? 'text-primary' : '' }}">DONASI</a> </li>
                        <li><a href="{{ route('contact.create') }}"
                                class="{{ Request::is('contact') ? 'text-primary' : '' }}">KONTAK KAMI</a></li>
                    </ul>

                    @auth
                        <div class=" login-state d-flex align-items-center">
                            <div class="user-name mr-30">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="userName"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ auth()->user()->name }}</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endauth

                </div>
                <!-- Nav End -->
            </div>
        </nav>
    </div>
</div>
