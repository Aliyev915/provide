<nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img
                src="{{ asset('manage/images/logo-mini.svg') }}" alt="logo" /></a>
        <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
            <i class="mdi mdi-menu"></i>
        </button>
        <ul class="navbar-nav">
            <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right ml-lg-auto">
            <li class="nav-item dropdown d-none d-xl-flex border-0">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-earth"></i> {{ app()->getLocale() == 'az' ? 'az' : app()->getLocale() == 'en' ? 'EN' : 'RU' }} </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                  <a class="dropdown-item" href="/admin"> AZ </a>
                  <a class="dropdown-item" href="/en/admin"> EN </a>
                    <a class="dropdown-item" href="/ru/admin"> RU </a>
                </div>
            </li>
            <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                    <img class="nav-profile-img mr-2" alt="" src="{{ asset('manage/images/faces/face1.jpg') }}" />
                    <span class="profile-name">{{ Auth::user() ? Auth::user()->name : '' }}</span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="/logout">
                        <i class="mdi mdi-logout mr-2 text-primary"></i> Çıxış </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
