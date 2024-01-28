<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">ENGLISH CHANGE</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">EC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ (request()->is('app/dashboard')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('app/dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Manajemen Data</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    @can('jenis-akun.index')
                    <li class="{{ request()->is('app/jenis-akun') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app.jenis-akun.index') }}">Jenis Akun</a>
                    </li>
                    @endcan

                    @can('jenis-kas.index')
                    <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app.jenis-kas.index') }}">Jenis Kas</a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Tranksasi Kas</span></a>
                <ul class="dropdown-menu">
                    @can('kas-masuk.index')
                    <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app.kas-masuk.index') }}">Pemasukan</a>
                    </li>
                    @endcan

                    @can('kas-keluar.index')
                    <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app.kas-keluar.index') }}">Pengeluaran</a>
                    </li>
                    @endcan

                    @can('kas-transfer.index')
                    <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app.kas-transfer.index') }}">Transfer</a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Laporan - Laporan</span></a>
                <ul class="dropdown-menu">
                    @can('laporan-transaksi-kas.index')
                    <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app.laporan-transaksi-kas.index') }}">Transaksi Kas</a>
                    </li>
                    @endcan

                    @can('laporan-neraca-saldo.index')
                    <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app.laporan-neraca-saldo.index') }}">Neraca Saldo</a>
                    </li>
                    @endcan

                    @can('laporan-laba.index')
                    <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('app.laporan-laba.index') }}">Laba Rugi</a>
                    </li>
                    @endcan
                </ul>
            </li>

            @can('users.index')
            <li class="menu-header">Manajemen Pengguna</li>
            @endcan

            @can('users.index')
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('app.users.index') }}"><i class="fas fa-user"></i>
                    <span>Pengguna</span></a>
            </li>
            @endcan

            @can('permissions.index')
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('app.permissions.index') }}"><i class="fas fa-lock"></i>
                    <span>Izin Akses</span></a>
            </li>
            @endcan

            @can('roles.index')
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('app.roles.index') }}"><i class="fas fa-key"></i>
                    <span>Hak Akses</span></a>
            </li>
            @endcan
        </ul>
    </aside>
</div>