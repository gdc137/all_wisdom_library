<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto mainlogoarea">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <span class="brand-logo">
                        <img class="mainlogoimage" src="{{ asset('app-assets/images/logo/logo2.png') }}" alt="Logo">
                    </span>
                    <h2 class="brand-text mainlogotext"> Unispeak</h2>
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

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ strpos(Route::currentRouteName(), 'dashboard') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-home"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'categories') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('categories') }}">
                    <i class="fa-solid fa-bookmark"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Categories</span>
                </a>
            </li>

            <li
                class="nav-item {{ strpos(Route::currentRouteName(), 'tasks') === 0 || strpos(Route::currentRouteName(), 'questions') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('tasks') }}">
                    <i class="fa-solid fa-align-left"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Tasks</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'basic-categories') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('basic-categories') }}">
                    <i class="fa-solid fa-bookmark"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Basic Categories</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'basic-tasks') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('basic-tasks') }}">
                    <i class="fa-solid fa-align-left"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Basic Tasks</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'plans') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('plans') }}">
                    <i class="fa-solid fa-money-check"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Plans</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'sliders') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('sliders') }}">
                    <i class="fa-solid fa-image"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Sliders</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'users') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('users') }}">
                    <i class="fa-solid fa-users"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Users</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'transactions') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('transactions') }}">
                    <i class="fa-solid fa-indian-rupee-sign"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Transactions</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'withdraw-requests') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('withdraw-requests') }}">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Withdraw Requests</span>
                </a>
            </li>

            <li class="nav-item {{ strpos(Route::currentRouteName(), 'configuration') === 0 ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('configuration') }}">
                    <i class="fa-solid fa-cogs"></i>
                    <span class="menu-title text-truncate" data-i18n="home">Configuration</span>
                </a>
            </li>
        </ul>
    </div>
</div>
