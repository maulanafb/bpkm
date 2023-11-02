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
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard-administrator-edit') }}"
                            style="font-size: 13px">Profil
                            Manager</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-program-edit') }}"
                            style="font-size: 13px">Program Masjid</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#finance" aria-expanded="false" aria-controls="finance">
                <i class="icon-head menu-icon"></i>
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


    </ul>
</nav>
