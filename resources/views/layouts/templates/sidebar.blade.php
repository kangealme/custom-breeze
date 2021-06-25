<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/homeadm')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{Session::get('username') . ' - '}} Page</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

        <li class="nav-item">
            <a class="nav-link" href="{{url('/homeadm')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        {{-- <hr class="sidebar-divider"> --}}



    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Akun
    </div>

     <!-- Divider -->
        <hr class="sidebar-divider">

    <!-- Nav Item - Profile Pengguna -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/adminProfile')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

    <!-- Nav Item - Edit Profile -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/adminEdit')}}">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengguna
    </div>

    <!-- Nav Item - Daftar Pengguna -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/penggunaList')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Daftar Pengguna</span></a>
    </li>

    <!-- Nav Item - Tambah Pengguna -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/penggunaAdd')}}">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Tambah Pengguna</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
