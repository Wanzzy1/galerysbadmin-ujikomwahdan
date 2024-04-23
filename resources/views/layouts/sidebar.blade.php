<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-brands fa-paper-plane"></i>
        </div>
        <div class="">Galleryid</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-solid fa-layer-group"></i>
            <span>Dasboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('albums.index')}}">
            <i class="fas fa-regular fa-images"></i>
            <span>Album</span></a>
    </li>

    </ul>
