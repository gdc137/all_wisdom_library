<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto mainlogoarea">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <span class="brand-logo">
                        <img class="mainlogoimage" src="{{ asset('app-assets/images/logo/logo.png') }}" alt="Logo">
                    </span>
                    <h2 class="brand-text mainlogotext"> Wisdom Library</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle mainlogocollpasearea"><a class="nav-link modern-nav-toggle pe-0"
                    data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4 fa-solid fa-x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary  fa-solid fa-compact-disc"></i></a>
            </li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content mt-1">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ strpos(Route::currentRouteName(), 'dashboard') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-home"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'scriptures') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('scriptures') }}">
                    <i class="fa-solid fa-book"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Scriptures</span>
                </a>
            </li>

            
            <li class="nav-item {{ strpos(Route::currentRouteName(), 'languages') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('languages') }}">
                    <i class="fa-solid fa-language"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Languages</span>
                </a>
            </li>
        </ul>
    </div>
</div>