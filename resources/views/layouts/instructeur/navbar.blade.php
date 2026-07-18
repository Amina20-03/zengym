<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <!--  Brand demo (display only for navbar-full and hide on below xl) -->

    <!-- ! Not required for layout-without-menu -->
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a
            class="nav-item nav-link px-0 me-xl-4"
            href="javascript:void(0)"
        >
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div
        class="navbar-nav-right d-flex align-items-center"
        id="navbar-collapse"
    >


        <ul
            class="navbar-nav flex-row align-items-center ms-auto"
        >
            <li
                    class="nav-item dropdown-language dropdown me-2 me-xl-0"
            >
                Votre code à partager : {{session('code_instr')}}&nbsp;&nbsp;
            </li>
            <!-- Language -->
            <li
                class="nav-item dropdown-language dropdown me-2 me-xl-0"
            >
                <select class="form-control changeLang">
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>
                        Francais &nbsp;&nbsp;&nbsp;
                    </option>

                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>
                        English &nbsp;&nbsp;&nbsp;
                    </option>

                    <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>
                        العربية&nbsp;&nbsp;&nbsp;
                    </option>
                </select>
            </li>
            <!--/ Language -->


            <!-- Style Switcher -->
            <li
                class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0"
            >
                <a
                    class="nav-link dropdown-toggle hide-arrow"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                >
                    <i class="fa fa-adjust"></i>
                </a>
                <ul
                    class="dropdown-menu dropdown-menu-end dropdown-styles"
                >
                    <li>
                        <a
                            class="dropdown-item"
                            href="javascript:void(0);"
                            data-theme="light"
                        >
                                                <span class="align-middle"
                                                ><i class="fa fa-sun-o"></i>&nbsp;Light</span
                                                >
                        </a>
                    </li>
                    <li>
                        <a
                            class="dropdown-item"
                            href="javascript:void(0);"
                            data-theme="dark"
                        >
                                                <span class="align-middle"
                                                ><i
                                                        class="fa fa-moon-o"
                                                    ></i
                                                    >&nbsp;Dark</span
                                                >
                        </a>
                    </li>
                    <li>
                        <a
                            class="dropdown-item"
                            href="javascript:void(0);"
                            data-theme="system"
                        >
                                                <span class="align-middle"
                                                ><i
                                                        class="fa fa-desktop me-2"
                                                    ></i
                                                    >System</span
                                                >
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Style Switcher -->



            <!-- User -->
            <li
                class="nav-item navbar-dropdown dropdown-user dropdown"
            >
                <a
                    class="nav-link dropdown-toggle hide-arrow"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                >
                    <div class="avatar avatar-online">
                        <img
                            src="https://icons.iconarchive.com/icons/iconshock/real-vista-general/256/administrator-icon.png"
                            alt
                            class="w-px-40 h-auto rounded-circle"
                        />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a
                            class="dropdown-item"
                            href="{{route('instructeur.profile')}}"
                        >
                            <div class="d-flex">
                                <div
                                    class="flex-shrink-0 me-3"
                                >
                                    <div
                                        class="avatar avatar-online"
                                    >
                                        <img
                                            src="https://icons.iconarchive.com/icons/iconshock/real-vista-general/256/administrator-icon.png"
                                            alt
                                            class="w-px-40 h-auto rounded-circle"
                                        />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                                        <span
                                                            class="fw-medium d-block"
                                                        >
                                                            {{session('nom')}}
                                                            {{session('prenom')}}
                                                        </span>
                                    <small
                                        class="text-muted"
                                    >Instructeur</small
                                    >
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a
                            class="dropdown-item"
                            href="{{route('instructeur.profile')}}"
                        >
                            <i class="fa fa-user"></i>
                            <span class="align-middle"
                            >{{ __('content.Mon_Profile') }}</span
                            >
                        </a>
                    </li>
                    {{--                    <li>--}}
                    {{--                        <a--}}
                    {{--                            class="dropdown-item"--}}
                    {{--                            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/pages/account-settings-billing"--}}
                    {{--                        >--}}
                    {{--                                                <span--}}
                    {{--                                                    class="d-flex align-items-center align-middle"--}}
                    {{--                                                >--}}
                    {{--                                                    <i--}}
                    {{--                                                        class="flex-shrink-0 bx bx-credit-card me-2"--}}
                    {{--                                                    ></i>--}}
                    {{--                                                    <span--}}
                    {{--                                                        class="flex-grow-1 align-middle"--}}
                    {{--                                                    >Billing</span--}}
                    {{--                                                    >--}}
                    {{--                                                    <span--}}
                    {{--                                                        class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20"--}}
                    {{--                                                    >4</span--}}
                    {{--                                                    >--}}
                    {{--                                                </span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="bottom" title="Déconnexion"
                           onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                           class="dropdown-item"
                        >
                            <i
                                class="fa fa-sign-out"
                            ></i>
                            <span class="align-middle"
                            >Déconnexion</span
                            >
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div
        class="navbar-search-wrapper search-input-wrapper d-none"
    >
        <input
            type="text"
            class="form-control search-input container-xxl border-0"
            placeholder="Search..."
            aria-label="Search..."
        />
        <i
            class="bx bx-x bx-sm search-toggler cursor-pointer"
        ></i>
    </div>
</nav>
