<ul class="menu">
    <li class="sidebar-title">Menu</li>
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="sidebar-item">
                <a href="{{ route('login') }}" class='sidebar-link'>
                    <i class="bi bi-door-open"></i>
                    <span>Login</span>
                </a>
            </li>
        @endif
    @else
        <li class="sidebar-item">
            <a href="/home" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Master Setup</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/admin">Petugas</a>
                </li>
                <li class="submenu-item ">
                    <a href="/superadmin">Kepala</a>
                </li>
                <li class="submenu-item ">
                    <a href="/category">Jenis Dokumen</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a href="/document" class='sidebar-link'>
                <i class="bi bi-collection"></i>
                <span>Dokumen</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="/backup" class='sidebar-link'>
                <i class="bi bi-layer-backward"></i>
                <span>Backup dokumen</span>
            </a>
        </li>


        <li class="sidebar-item  has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-calendar2"></i>
                <span>Laporan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/reportUser">Petugas</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reportDocument">Dokumen</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item active">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
                class='sidebar-link'>
                <i class="bi bi-door-closed"></i>                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endguest
</ul>
</ul>
