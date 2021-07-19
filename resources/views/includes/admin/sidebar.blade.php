<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Sindalida</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if (Auth::user()->roles == 'SUPERADMIN')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-hotel"></i>
            <span>Manajemen User/Admin</span></a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('innovation-proposal.index') }}">
            <i class="fas fa-fw fa-hotel"></i>
            <span>Proposal Inovasi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('innovation-report.index') }}">
            <i class="fas fa-fw fa-sign"></i>
            <span>Laporan Inovasi</span></a>
    </li>

    @if (Auth::user()->roles == 'SUPERADMIN')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('complain-inbox.index') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Daftar Pengaduan</span></a>
    </li>
    @endif

    @if (Auth::user()->roles == 'SUPERADMIN')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('about.index') }}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Manajemen About</span></a>
    </li>
    @endif

    @if (Auth::user()->roles == 'SUPERADMIN')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('carousel.index') }}">
            <i class="fas fa-fw fa-camera"></i>
            <span>Manajemen Carousel</span></a>
    </li>
    @endif

    {{-- <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transaksi</span></a>
    </li> --}}


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->