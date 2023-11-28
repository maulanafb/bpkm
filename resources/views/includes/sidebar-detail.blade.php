<nav class="sidebar sidebar-offcanvas poppins" id="sidebar">
    <ul class="nav">
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title font-sm">Dashboard</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mosque.show', ['id' => Auth::user()->id]) }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Profil Masjid</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mosque.show', ['id' => Auth::user()->id]) }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Profil Masjid</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mosque.show', ['id' => Auth::user()->id]) }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Profil Masjid</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mosque.show', ['id' => Auth::user()->id]) }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Profil Masjid</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Profil Masjid</span>
            </a>
        </li>
    </ul>
</nav>
