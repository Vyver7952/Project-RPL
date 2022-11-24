<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle" onclick="change()"></i> </div>
        <div class="header_text">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle nav_icon"></i> <span
                            class="nav_name">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li class="ms-auto"> {{ auth()->user()->name }} </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li><a class="dropdown-item" href="/logout"> <i data-feather="log-out"></i>
                                <span class="nav_name">Logout</span>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="/home" id="logo" class="nav_logo"><img class="mx-auto" src={{ asset('img/Logo.png') }}
                        alt="logo" width="70px">
                    <br><span class="nav_logo-name">Koperasi Artha Pratama</span></a>
                <div class="nav_list">
                    <a href="/home" class="nav_link {{ Request::is('home*') ? 'active' : '' }}"> <i
                            class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="/nasabah" class="nav_link {{ Request::is('nasabah*') ? 'active' : '' }}"> <i
                            class="bi bi-people nav_icon"></i> <span class="nav_name">Nasabah</span>
                    </a>
                    <a href="/peminjaman" class="nav_link {{ Request::is('peminjaman*') ? 'active' : '' }}"> <i
                            class="bi bi-cash-coin nav_icon"></i> <span class="nav_name">Peminjaman</span>
                    </a>
                    <a href="/simpanan" class="nav_link {{ Request::is('simpanan*') ? 'active' : '' }}"> <i
                            class='bi bi-safe nav_icon'></i> <span class="nav_name">Simpanan</span> </a>
                    <a href="/laporan" class="nav_link {{ Request::is('laporan*') ? 'active' : '' }}"> <i
                            class="bi bi-file-earmark-text nav_icon"></i> <span class="nav_name">Laporan</span> </a>

                    @if (auth()->user()->is_admin)
                        <a href="/users" class="nav_link {{ Request::is('users*') ? 'active' : '' }}"> <i
                                class="bi bi-person-lock nav_icon"></i> <span class="nav_name">Users</span> </a>
                    @endif

                </div>
            </div>
        </nav>
    </div>
