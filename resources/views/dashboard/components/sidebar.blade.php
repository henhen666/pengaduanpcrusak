<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3">Lapor PC</div>
    </a>
    <hr class="sidebar-divider my-0">
    @can('admin')
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <span class="fas fa-2x fa-gauge"></span>&nbsp;
                <span>Dashboard</span>
            </a>
        </li>
    @elsecan("users")
        <li class="nav-item {{ Request::is('user/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('user/dashboard') }}">
                <span class="fas fa-2x fa-gauge"></span>&nbsp;
                <span>Dashboard</span>
            </a>
        </li>
    @endcan
    <hr class="sidebar-divider">
    @can('admin')
        <li class="nav-item {{ Request::is('admin/dashboard/laporan*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard/laporan') }}">
                <span class="fas fa-2x fa-solid fa-flag"></span>&nbsp;
                <span>Laporan Kerusakan</span>
            </a>
        </li>
    @elsecan("users")
        <li class="nav-item {{ Request::is('user/dashboard/laporan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('user/dashboard/laporan') }}">
                <span class="fas fa-2x fa-solid fa-flag"></span>&nbsp;
                <span>Laporan Kerusakan</span>
            </a>
        </li>
    @endcan
    <hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
