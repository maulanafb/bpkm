<nav class="sidebar sidebar-offcanvas poppins" id="sidebar">
    <ul class="nav poppins font-sm">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title font-sm">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title poppins">Data Masjid</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-profile.index') }}"
                            style="font-size: 13px">Profil
                            Masjid</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-land-edit') }}"
                            style="font-size: 13px">Tanah &
                            Bangunan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-condition-edit') }}"
                            style="font-size: 13px">Kondisi
                            Masjid</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-document-edit') }}"
                            style="font-size: 13px">Dokumen
                            Masjid</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard-administrator-edit') }}"
                            style="font-size: 13px">Profil
                            Koordinator</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('caretaker.index') }}"
                            style="font-size: 13px">Data
                            Pengurus</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard-mosque-programs.index') }}"
                            style="font-size: 13px">Program Masjid</a></li>

                </ul>
            </div>
        </li>

    </ul>
</nav>
