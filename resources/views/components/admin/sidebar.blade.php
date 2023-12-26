<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/f.png') }}" width="60%">
        </div>
        <div class="sidebar-brand-text mx-3">Festori</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <div class="row">
                <div class="col-2">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                </div>
                <div class="col">
                    <span>{{ __('Dashboard') }}</span>
                </div>
            </div>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.order') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.order') }}">
            <div class="row">
                <div class="col-2">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                </div>
                <div class="col">
                    <span>{{ __('Order') }}</span>
                </div>
            </div>
        </a>
    </li>
    


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Settings') }}
    </div>

    <!-- Nav Item - Profile -->
    
    <li class="nav-item {{ request()->routeIs('logout') }}">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <div class="row">
                <div class="col-2">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                </div>
                <div class="col">
                    <span>{{ __('Logout') }}</span>
                </div>
            </div>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Apakah Anda Yakin Untuk Logout?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah jika Anda ingin untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
