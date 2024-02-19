<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Library<sup>40</sup></div>
    </a>
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item" {{ Request::is('/') ? 'active' : '' }} >
        <a class="nav-link" href="{{ url('/index') }} ">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
    Kelola Data
    </div>
    
    <!-- Nav Item - Data Buku -->
    <li class="nav-item">
    <a class="nav-link" href="/books  {{ Request::is('books') ? 'active' : '' }}">
        <i class="fas fa-swatchbook"></i>
        <span>Buku</span></a>
    </li>

    <li class="nav-item" {{ Request::is('books') ? 'active' : '' }}>
        <a class="nav-link" href="{{ url('/databooks') }}  ">
            <i class="fas fa-swatchbook"></i>
            <span>Data Buku</span></a>
        </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
    Peminjaman Buku
    </div>
    
    <!-- Nav Item - Data Pengguna -->
    <li class="nav-item">
    <a class="nav-link" href="/booking  {{ Request::is('booking') ? 'active' : '' }}">
        <i class="far fa-address-book"></i>
        <span>Peminjaman</span></a>
    </li>

    <li class="nav-item">
    <a class="nav-link" href="/adminbooking  {{ Request::is('booking') ? 'active' : '' }}">
        <i class="far fa-address-book"></i>
        <span>Data Peminjaman</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
    History 
    </div>
    
    <!-- Nav Item - Laporan -->
    <li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-wrench"></i>
        <span>History Peminjaman</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    </ul>
    <!-- End of Sidebar -->