<nav class="sidebar sidebar-offcanvas poppins" id="sidebar">
    <ul class="nav poppins font-sm">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title font-sm">Kembali</span>
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
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque.show', $mosqueId) }}"
                            style="font-size: 13px">Profil
                            Masjid</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-land-edit') }}"
                            style="font-size: 13px">Tanah &
                            Bangunan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard-administrator-edit') }}"
                            style="font-size: 13px">Profil
                            Manager</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-program-edit') }}"
                            style="font-size: 13px">Program Masjid</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-structure.index') }}"
                            style="font-size: 13px">Struktur Pengurus</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#finance" aria-expanded="false" aria-controls="finance">
                <i class="fas fa-wallet menu-icon"></i>
                <span class="menu-title poppins">Keuangan</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="finance">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('monthly-report.index') }}"
                            style="font-size: 13px">Keuangan bulanan
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('jumah-report.index') }}"
                            style="font-size: 13px">Pemasukan Jumat</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#checklist" aria-expanded="false"
                aria-controls="checklist">
                <i class="fas fa-tasks menu-icon"></i>
                <span class="menu-title font-sm">Checklist</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="checklist">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('daily-checklists.show', $mosqueId) }}"
                            style="font-size: 13px">Program Harian
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('weekly-checklists.show', $mosqueId) }}"
                            style="font-size: 13px">Program Pekanan</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('monthly-checklists.show', $mosqueId) }}"
                            style="font-size: 13px">Program Bulanan</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mosque-gallery.show', $mosqueId) }}">
                <i class="fas fa-images menu-icon"></i>
                <span class="menu-title font-sm">Gallery</span>
            </a>
        </li>




    </ul>
</nav>
