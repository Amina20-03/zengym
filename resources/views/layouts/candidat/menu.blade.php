<aside
    id="layout-menu"
    class="layout-menu menu-vertical menu bg-menu-theme"
>
    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a
            href="{{route('candidat.home')}}"
            class="app-brand-link"
        >
                            <span class="app-brand-logo demo">
                              <img src="{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}" style="width:150px;">
                            </span>

        </a>

        <a
            href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto"
        >
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @if($menuprincipaleactive=='tableau_bord')
            <li class="menu-item active open">
        @else
            <li class="menu-item">
                @endif

                <a
                    href="{{route('candidat.home')}}"
                    class="menu-link"
                >
                    <i class="fa fa-dashboard"></i>
                    <div class="text-truncate">&nbsp;{{ __('content.tableau_bord') }}</div>
                </a>
            </li>

        @if($menuprincipaleactive=='profil_sante_candidat')
            <li class="menu-item active">
        @else
            <li class="menu-item">
        @endif
            <a href="{{ route('candidat.profil_sante.index') }}" class="menu-link">
                <i class="fa fa-heartbeat menu-icon"></i>
                <div class="text-truncate">&nbsp;Profil santé</div>
            </a>
        </li>
        @if($menuprincipaleactive=='formations')
            <li class="menu-item active open">
        @else
            <li class="menu-item">
                @endif
                <a
                        href="javascript:void(0);"
                        class="menu-link menu-toggle"
                >
                    <i class="fa fa-users"></i>
                    <div class="text-truncate">&nbsp;{{ __('content.formation') }}</div>
                </a>

                <ul class="menu-sub">


                @if($menuactive=='liste_formation')
                    <li class="menu-item active">
                @else
                    <li class="menu-item">
                        @endif
                        <a
                                href="{{route('candidat.formation.index')}}"
                                class="menu-link"
                        >
                            <div>{{ __('content.list_formation') }}</div>
                        </a>
                    </li>



                </ul>
            </li>
                @if($menuprincipaleactive=='evenements')
                    <li class="menu-item active open">
                @else
                    <li class="menu-item">
                        @endif
                        <a
                                href="javascript:void(0);"
                                class="menu-link menu-toggle"
                        >
                            <i class="fa fa-users"></i>
                            <div class="text-truncate">&nbsp;{{ __('content.evenement') }}</div>
                        </a>

                        <ul class="menu-sub">


                            @if($menuactive=='liste_even')
                                <li class="menu-item active">
                            @else
                                <li class="menu-item">
                                    @endif
                                    <a
                                            href="{{route('candidat.evenement.index')}}"
                                            class="menu-link"
                                    >
                                        <div>{{ __('content.liste_evenement') }}</div>
                                    </a>
                                </li>



                        </ul>
                    </li>
            @if($menuprincipaleactive=='qcm')
            <li class="menu-item active open">
                <a
                        href="#"
                        class="menu-link"
                >
                @else
            <li class="menu-item">
                <a
                        href="#"
                        class="menu-link"
                        data-bs-toggle="modal" data-bs-target="#onboardImageModal"
                >
                @endif


                    <i class="fa fa-pencil"></i>
                    <div class="text-truncate">&nbsp;Examen QCM </div>
                </a>
            </li>

        @if($menuprincipaleactive=='programmes_candidat')
            <li class="menu-item active open">
        @else
            <li class="menu-item">
        @endif
            <a href="{{ route('candidat.programmes.index') }}" class="menu-link">
                <i class="fa fa-th-large menu-icon"></i>
                <div class="text-truncate">&nbsp;Mes programmes</div>
            </a>
        </li>

        @if($menuprincipaleactive=='rdv_candidat')
            <li class="menu-item active">
        @else
            <li class="menu-item">
        @endif
            <a href="{{ route('candidat.rdv.index') }}" class="menu-link">
                <i class="fa fa-calendar-check-o menu-icon"></i>
                <div class="text-truncate">&nbsp;Rendez-vous</div>
            </a>
        </li>

    </ul>
</aside>
<form method="GET" action="{{route('candidat.qcm.examen.page')}}" class="add-new-user pt-0">
    @csrf
    @include('layouts.quiz_confirmation_modal')

</form>