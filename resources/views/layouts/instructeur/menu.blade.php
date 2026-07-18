<aside

    id="layout-menu"

    class="layout-menu menu-vertical menu bg-menu-theme"

>

    @if(session('abonnement'))

        <!-- ! Hide app brand if navbar-full -->

        <div class="app-brand demo">

            <a

                    href="{{route('instructeur.home')}}"

                    class="app-brand-link"

            >

            <span class="app-brand-logo demo">

              <img src="{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}" style="width:100px;">

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

                            href="{{route('instructeur.home')}}"

                            class="menu-link"

                    >

                        <i class="fa fa-dashboard"></i>

                        <div class="text-truncate">&nbsp;{{ __('content.tableau_bord') }}</div>

                    </a>

                </li>





                @if($menuprincipaleactive=='candidats')

                    <li class="menu-item active open">

                @else

                    <li class="menu-item">

                        @endif

                        <a

                                href="javascript:void(0);"

                                class="menu-link menu-toggle"

                        >

                            <i class="fa fa-users"></i>

                            <div class="text-truncate">&nbsp;{{ __('content.candidats') }}</div>

                        </a>



                        <ul class="menu-sub">





                            @if($menuactive=='liste_candidat')

                                <li class="menu-item active">

                            @else

                                <li class="menu-item">

                                    @endif

                                    <a

                                            href="{{route('instructeur.candidat.index')}}"

                                            class="menu-link"

                                    >

                                        <div>{{ __('content.liste_candidats') }}</div>

                                    </a>

                                </li>



                        </ul>

                    </li>



                    @if($menuprincipaleactive=='vente_abonnement')

                        <li class="menu-item active open">

                    @else

                        <li class="menu-item">

                            @endif

                            <a

                                    href="javascript:void(0);"

                                    class="menu-link menu-toggle"

                            >

                                <i class="fa fa-usd"></i>

                                <div class="text-truncate">&nbsp;{{ __('content.abonnement') }}</div>

                            </a>



                            <ul class="menu-sub">







                                @if($menuactive=='list_abo')

                                    <li class="menu-item active">

                                @else

                                    <li class="menu-item">

                                        @endif

                                        <a

                                                href="{{route('instructeur.vente_abo.index')}}"

                                                class="menu-link"

                                        >

                                            <div>{{ __('content.liste_abonnement') }}</div>

                                        </a>

                                    </li>



{{--                                    @if($menuactive=='add_abo')--}}

{{--                                        <li class="menu-item active">--}}

{{--                                    @else--}}

{{--                                        <li class="menu-item">--}}

{{--                                            @endif--}}

{{--                                            <a--}}

{{--                                                    href="{{route('instructeur.vente_abo.create')}}"--}}

{{--                                                    class="menu-link"--}}

{{--                                            >--}}

{{--                                                <div>{{ __('content.Ajouter_un_abo') }}</div>--}}

{{--                                            </a>--}}

{{--                                        </li>--}}

                            </ul>

                        </li>





                        @if($menuprincipaleactive=='vente_prod')

                            <li class="menu-item active open">

                        @else

                            <li class="menu-item">

                                @endif

                                <a

                                        href="javascript:void(0);"

                                        class="menu-link menu-toggle"

                                >

                                    <i class="fa fa-usd"></i>

                                    <div class="text-truncate">&nbsp;{{ __('content.vente_prod') }}</div>

                                </a>



                                <ul class="menu-sub">



                                    @if($menuactive=='liste_vente_prod')

                                        <li class="menu-item active">

                                    @else

                                        <li class="menu-item">

                                            @endif

                                            <a

                                                    href="{{route('instructeur.vente_prod.index')}}"

                                                    class="menu-link"

                                            >

                                                <div>{{ __('content.liste_vente') }}</div>

                                            </a>

                                        </li>

                                        @if($menuactive=='add_vente_prod')

                                            <li class="menu-item active">

                                        @else

                                            <li class="menu-item">

                                                @endif

                                                <a

                                                        href="{{route('instructeur.vente_prod.create')}}"

                                                        class="menu-link"

                                                >

                                                    <div>{{ __('content.ajouter_vente') }}</div>

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



                                        <!--                    @if($menuactive=='dmd_evennement')-->

                                        <!--                        <li class="menu-item active">-->

                                        <!--                    @else-->

                                        <!--                        <li class="menu-item">-->

                                        <!--                            @endif-->

                                        <!--                            <a-->

                                        <!--                                href="{{route('instructeur.evennement.demande.index')}}"-->

                                        <!--                                class="menu-link"-->

                                        <!--                            >-->

                                        <!--                                <div>{{ __('content.demande_evennement') }}</div>-->

                                        <!--                            </a>-->

                                        <!--                        </li>-->

                                        @if($menuactive=='add_evennement')

                                            <li class="menu-item active">

                                        @else

                                            <li class="menu-item">

                                                @endif

                                                <!--                            <a-->

                                                <!--                                href="{{route('instructeur.evennement.demande.create')}}"-->

                                                <!--                                class="menu-link"-->

                                                <!--                            >-->

                                                <a

                                                        href="#"

                                                        class="menu-link"

                                                        data-bs-toggle="modal" data-bs-target="#type_event_Modal"

                                                >

                                                    <div>{{ __('content.ajouter_demande') }}</div>

                                                </a>

                                            </li>

                                            @if($menuactive=='liste_evenement')

                                                <li class="menu-item active">

                                            @else

                                                <li class="menu-item">

                                                    @endif

                                                    <a

                                                            href="{{route('instructeur.evennement.index')}}"

                                                            class="menu-link"

                                                    >

                                                        <div>{{ __('content.liste_evenement') }}</div>

                                                    </a>

                                                </li>



                                            @if($menuactive=='mes_demandes')

                                                <li class="menu-item active">

                                            @else

                                                <li class="menu-item">

                                            @endif

                                                <a href="{{ route('instructeur.evennement.mes_demandes') }}" class="menu-link">

                                                    <div>Mes demandes</div>

                                                </a>

                                            </li>



                                    </ul>

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

                                            @if($menuactive=='dmd_formation')

                                                <li class="menu-item active">

                                            @else

                                                <li class="menu-item">

                                                    @endif

                                                    <a

                                                            href="{{route('instructeur.demande_formation.index')}}"

                                                            class="menu-link"

                                                    >

                                                        <div>{{ __('content.demande_formation') }}</div>

                                                    </a>

                                                </li>

                                                @if($menuactive=='add_formation')

                                                    <li class="menu-item active">

                                                @else

                                                    <li class="menu-item">

                                                        @endif

                                                        <a

                                                                href="{{route('instructeur.demande_formation.create')}}"

                                                                class="menu-link"

                                                        >

                                                            <div>{{ __('content.ajouter_demande') }}</div>

                                                        </a>

                                                    </li>





                                                    @if($menuactive=='liste_formation')

                                                        <li class="menu-item active">

                                                    @else

                                                        <li class="menu-item">

                                                            @endif

                                                            <a

                                                                    href="{{route('instructeur.formation.index')}}"

                                                                    class="menu-link"

                                                            >

                                                                <div>{{ __('content.list_formation') }}</div>

                                                            </a>

                                                        </li>



                                        </ul>

                                    </li>







                                    @if($menuprincipaleactive=='cours')

                                        <li class="menu-item active open">

                                    @else

                                        <li class="menu-item">

                                            @endif

                                            <a

                                                    href="javascript:void(0);"

                                                    class="menu-link menu-toggle"

                                            >

                                                <i class="fa fa-users"></i>

                                                <div class="text-truncate">&nbsp;{{ __('content.cours') }}</div>

                                            </a>



                                            <ul class="menu-sub">

                                                @if($menuactive=='dmd_cours')

                                                    <li class="menu-item active">

                                                @else

                                                    <li class="menu-item">

                                                        @endif

                                                        <a

                                                                href="{{route('instructeur.demande_cours.index')}}"

                                                                class="menu-link"

                                                        >

                                                            <div>{{ __('content.demande_cours') }}</div>

                                                        </a>

                                                    </li>



                                                    @if($menuactive=='add_cours')

                                                        <li class="menu-item active">

                                                    @else

                                                        <li class="menu-item">

                                                            @endif

                                                            <a

                                                                    href="{{route('instructeur.demande_cours.create')}}"

                                                                    class="menu-link"

                                                            >

                                                                <div>{{ __('content.ajouter_demande') }}</div>

                                                            </a>

                                                        </li>



                                                        @if($menuactive=='liste_cours')

                                                            <li class="menu-item active">

                                                        @else

                                                            <li class="menu-item">

                                                                @endif

                                                                <a

                                                                        href="{{route('instructeur.cours.index')}}"

                                                                        class="menu-link"

                                                                >

                                                                    <div>{{ __('content.liste_cours') }}</div>

                                                                </a>

                                                            </li>







                                            </ul>

                                        </li>



                                    @if($menuprincipaleactive=='programmes')

                                        <li class="menu-item active open">

                                    @else

                                        <li class="menu-item">

                                    @endif

                                        <a href="javascript:void(0);" class="menu-link menu-toggle">

                                            <i class="fa fa-th-large menu-icon"></i>

                                            <div class="text-truncate">&nbsp;Programmes</div>

                                        </a>

                                        <ul class="menu-sub">

                                            @if($menuactive=='liste_programmes')

                                                <li class="menu-item active">

                                            @else

                                                <li class="menu-item">

                                            @endif

                                                <a href="{{ route('instructeur.programmes.index') }}" class="menu-link">

                                                    <div>Mes programmes</div>

                                                </a>

                                            </li>

                                        </ul>

                                    </li>



                                    @if($menuprincipaleactive=='rendez_vous')

                                        <li class="menu-item active">

                                    @else

                                        <li class="menu-item">

                                    @endif

                                        <a href="{{ route('instructeur.rendez_vous.index') }}" class="menu-link">

                                            <i class="fa fa-calendar-check-o menu-icon"></i>

                                            <div class="text-truncate">&nbsp;Rendez-vous</div>

                                        </a>

                                    </li>



        </ul>

    @endif



</aside>

<form method="GET" action="{{route('instructeur.evennement.demande.create')}}" class="add-new-user pt-0">

    @csrf

    @include('layouts.type_evenemment_modal')



</form>