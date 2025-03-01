<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 overflow-hidden" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ url('outlet/dashboard') }}">
            <img src="../assets/img/lpgas.png" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold">Outlet Dashboard </span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link me-auto {{ (Request::is('outlet/dashboard') ? 'active' : '') }}" href="{{ url('outlet/dashboard') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-house ps-2 pe-2 text-center text-dark {{ (Request::is('outlet/dashboard') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link me-auto {{ (Request::is('outlet/schedule') ? 'active' : '') }}" href="{{ url('outlet/schedule') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-calendar-alt ps-2 pe-2 text-center text-dark {{ (Request::is('outlet/schedule') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Schedule Management</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
