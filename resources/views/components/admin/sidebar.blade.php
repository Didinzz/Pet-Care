<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="@yield('dashboard')">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            {{-- customer management --}}
            <li class="menu-header">Customer</li>
            <li class="dropdown @yield('customer')">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Customer Management</span></a>
                <ul class="dropdown-menu">
                    <li class="@yield('owner')"><a class="nav-link" href="{{ route('owner') }}">Data Pemilik</a></li>
                    <li class="@yield('pet')"><a class="nav-link" href="{{ route('pet') }}">Data Hewan Peliharaan</a></li>
                </ul>
            </li>

            {{-- dokter management --}}
            <li class="menu-header">Dokter</li>
            <li class="@yield('Dokter')"><a class="nav-link" href="{{ route('dokter') }}"><i class="fas fa-user-md"></i>
                    <span>Data Dokter Hewan</span></a></li>

            {{-- riwayat kunjungan --}}
            <li class="menu-header">Riwayat Kunjungan</li>
            <li class="@yield('riwayat')"><a class="nav-link" href="{{ route('riwayat') }}"><i class="fas fa-history"></i>
                    <span>Riwayat Kunjungan</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <button href="#" class="btn btn-danger btn-lg btn-block btn-icon-split"
                data-confirm="Keluar?|Apakah anda ingin keluar?"
                data-confirm-yes="window.location.href='{{ route('logout') }}'">
                <i class="fas fa-rocket"></i> Logout
            </button>
        </div>
    </aside>
</div>

