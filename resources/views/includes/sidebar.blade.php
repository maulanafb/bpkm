<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Profil Masjid</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-profile.index') }}">Profile</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-land-edit') }}">Tanah</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-condition-edit') }}">Kondisi</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('mosque-document-edit') }}">Dokumen</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard-administrator-edit') }}">Profile
                            Koordinator</a></li>

                </ul>
            </div>
        </li>

    </ul>
</nav>
