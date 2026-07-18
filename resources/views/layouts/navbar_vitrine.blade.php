<nav class="layout-navbar shadow-none py-0">
    <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">

            <!-- Logo : Start -->
            <div class="navbar-brand app-brand demo d-flex py-0 me-4">
                <span class="app-brand-logo demo" style="width: 150px">
                    <img src="{{ \Illuminate\Support\Facades\URL::asset('images/logo.png') }}" style="width:60%">
                </span>
            </div>
            <!-- Logo : End -->

            <!-- Toolbar mobile (panier + user) visible en dehors du collapse : Start -->
            <ul class="navbar-nav flex-row align-items-center ms-auto d-lg-none">
                <li class="me-2">
                    <a href="{{ route('shop.produit.cart_index', session('user_id') ?? '-1') }}">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
                @if(session('user_id'))
                    <li class="me-2">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                            <i class="fa fa-sign-out"></i>
                        </a>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endif
                <li class="me-2 px-2" style="border-left: 1px solid gray; border-right: 1px solid gray;">
                    <a href="{{ route('login') }}" target="_blank">
                        <i class="tf-icons fa fa-user"></i>
                    </a>
                </li>
            </ul>
            <!-- Toolbar mobile : End -->

            <!-- Bouton toggler hamburger : Start -->
            <button class="navbar-toggler border-0 px-0 ms-1" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="tf-icons fa fa-bars bx-sm align-middle"></i>
            </button>
            <!-- Bouton toggler hamburger : End -->

            <!-- Menu wrapper : Start -->
            <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">

                <!-- Bouton fermeture menu mobile : Start -->
                <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <i class="tf-icons fa fa-x bx-sm"></i>
                </button>
                <!-- Bouton fermeture : End -->

                @include('layouts.menu_vitrine', ['menuprincipaleactive' => $menuprincipaleactive, 'menuactive' => $menuactive])

            </div>
            <div class="landing-menu-overlay d-lg-none"></div>
            <!-- Menu wrapper : End -->

            <!-- Toolbar desktop (lg+) : Start -->
            <ul class="navbar-nav flex-row align-items-center ms-auto d-none d-lg-flex">
                <li>
                    <a href="{{ route('shop.produit.cart_index', session('user_id') ?? '-1') }}">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
                @if(session('user_id'))
                    <li style="margin-right: 10px; margin-left: 10px">
                        <a href="{{ route('logout') }}"
                           data-toggle="tooltip" data-placement="bottom" title="Déconnexion"
                           onclick="event.preventDefault(); document.getElementById('logout-form-desktop').submit();">
                            <i class="fa fa-sign-out"></i>
                        </a>
                        <form id="logout-form-desktop" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endif
                <li style="margin-right: 10px; margin-left: 10px; padding-right: 10px; padding-left: 10px; border-left: 1px solid gray; border-right: 1px solid gray;">
                    <a href="{{ route('login') }}" target="_blank">
                        <span class="tf-icons fa fa-user me-md-1"></span>
                    </a>
                </li>
            </ul>
            <!-- Toolbar desktop : End -->

        </div>
    </div>
</nav>
<!-- Navbar : End -->
