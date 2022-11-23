<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle" onclick="change()"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="/home" id="logo" class="nav_logo"><img class="mx-auto" src="img/{{ $logo }}" alt="logo" width="70px">
                <br><span class="nav_logo-name">Koperasi Artha Pratama</span></a>
                <div class="nav_list">
                    <a href="/home" class="nav_link {{ $title == 'Home' ? 'active' : '' }}"> <i
                            class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span>
                    </a>

                    @if (auth()->user()->is_admin)
                        <a href="/users" class="nav_link {{ $title == 'Users' ? 'active' : '' }}"> <i
                                class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>
                    @endif

                    <a href="/peminjaman" class="nav_link {{ $title == 'Peminjaman' ? 'active' : '' }}"> <i
                            class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Peminjaman</span>
                    </a>
                    <a href="/simpanan" class="nav_link {{ $title == 'Simpanan' ? 'active' : '' }}"> <i
                            class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Simpanan</span> </a>
                    <a href="/laporan" class="nav_link {{ $title == 'Laporan' ? 'active' : '' }}"> <i
                            class='bx bx-folder nav_icon'></i> <span class="nav_name">Laporan</span> </a>
                </div>
            </div>
            <a href="/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">Logout</span>
            </a>
        </nav>
    </div>
