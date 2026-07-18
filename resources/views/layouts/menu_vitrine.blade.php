
<ul class="navbar-nav me-auto">

    <li class="nav-item {{ $menuprincipaleactive == 'accueil' ? 'active' : '' }}">
        <a class="nav-link fw-medium" aria-current="page" href="{{ route('accueil_vitrine') }}">
            {{ __('content.accueil') }}
        </a>
    </li>

    <li class="nav-item {{ $menuprincipaleactive == 'apropos' ? 'active' : '' }}">
        <a class="nav-link fw-medium" aria-current="page" href="{{ route('a_propos_vitrine') }}">
            {{ __('content.a_propos') }}
        </a>
    </li>

    <li class="nav-item mega-dropdown {{ $menuprincipaleactive == 'cours_locaux' ? 'active' : '' }}">
        <a href="javascript:void(0);"
           class="nav-link dropdown-toggle navbar-ex-14-mega-dropdown mega-dropdown fw-medium"
           aria-expanded="false"
           data-bs-toggle="mega-dropdown"
           data-trigger="hover">
            <span>{{ __('content.cours_locaux') }}</span>
        </a>
        <div class="dropdown-menu p-4">
            <div class="row gy-4" style="width:90%;">
                <div class="col-12 col-lg">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link mega-dropdown-link" href="{{ route('cours_page') }}">
                                <i class="fa fa-certificate me-2"></i>
                                <span>Trouver des cours</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mega-dropdown-link" href="{{ route('instructeur_by_categ', 'all') }}">
                                <i class="fa fa-certificate me-2"></i>
                                <span>Trouver des instructeurs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mega-dropdown-link" href="{{ route('evenement_by_categ', 'all') }}">
                                <i class="fa fa-certificate me-2"></i>
                                <span>Événements</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="bg-body nav-img-col p-2">
                        <img src="https://radicalfitnesseurope.eu/wp-content/uploads/2020/05/16-copy.jpg"
                             alt="nav item col image" style="width: 300px;" />
                    </div>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item {{ $menuprincipaleactive == 'gallerie' ? 'active' : '' }}">
        <a class="nav-link fw-medium" aria-current="page" href="{{ route('gallerie') }}">Gallerie</a>
    </li>

    <li class="nav-item {{ $menuprincipaleactive == 'acheter_prod' ? 'active' : '' }}">
        <a class="nav-link fw-medium" href="{{ route('shop') }}">Boutique</a>
    </li>

    <li class="nav-item {{ $menuprincipaleactive == 'articles' ? 'active' : '' }}">
        <a class="nav-link fw-medium" href="{{ route('articles_vitrine') }}">Articles</a>
    </li>

    <li class="nav-item {{ $menuprincipaleactive == 'contact' ? 'active' : '' }}">
        <a class="nav-link fw-medium" href="{{ route('contact_vitrine') }}">{{ __('content.contact') }}</a>
    </li>

    <!-- Sélecteur de langue (visible uniquement dans le menu mobile) -->
    <li class="nav-item d-lg-none mt-2">
        <select class="form-control changeLang" style="width: 100%; max-width: 180px;">
            <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>Français</option>
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>Anglais</option>
            <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabe</option>
        </select>
    </li>

</ul>
