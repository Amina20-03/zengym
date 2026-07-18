@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
//////////////
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin.home')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}" style="width:100%;height:50px;padding-right:10px;padding-left:10px">
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto"></a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        {{-- Tableau de bord --}}
        <li class="menu-item {{ $menuprincipaleactive=='tableau_bord' ? 'active open' : '' }}">
            <a href="{{route('admin.home')}}" class="menu-link">
                <i class="fa fa-dashboard"></i>
                <div class="text-truncate">&nbsp;{{ __('content.tableau_bord') }}</div>
            </a>
        </li>

        {{-- Paramétrage --}}
        <li class="menu-item {{ $menuprincipaleactive=='Paramétrage' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-cog"></i>
                <div class="text-truncate">&nbsp;{{ __('content.Paramétrage') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='pays' ? 'active' : '' }}">
                    <a href="{{route('admin.pays.index')}}" class="menu-link">
                        <div>{{ __('content.pays') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='categorie_instructeur' ? 'active' : '' }}">
                    <a href="{{route('admin.categorie_instructeur.index')}}" class="menu-link">
                        <div>{{ __('content.categorie_instructeur') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='pourcentage' ? 'active' : '' }}">
                    <a href="{{route('admin.pourcentage.index')}}" class="menu-link">
                        <div>{{ __('content.pourcentage') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='categorie_representant' ? 'active' : '' }}">
                    <a href="{{route('admin.categorie_representant.index')}}" class="menu-link">
                        <div>{{ __('content.categorie_representant') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='categorie_media' ? 'active' : '' }}">
                    <a href="{{route('admin.categorie_media.photos.index')}}" class="menu-link">
                        <div>{{ __('content.categorie_media') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='article_categories' ? 'active' : '' }}">
                    <a href="{{route('admin.article_categories.index')}}" class="menu-link">
                        <div>Catégories d'articles</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Utilisateurs --}}
        <li class="menu-item {{ $menuprincipaleactive=='utilisateurs' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-users"></i>
                <div class="text-truncate">&nbsp;{{ __('content.Utilisateur') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='Admin' ? 'active' : '' }}">
                    <a href="{{route('admin.admin.index')}}" class="menu-link">
                        <div>{{ __('content.Admin') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='instructeur' ? 'active' : '' }}">
                    <a href="{{route('admin.instructeur.index')}}" class="menu-link">
                        <div>{{ __('content.instructeur') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='representant' ? 'active' : '' }}">
                    <a href="{{route('admin.representant.index')}}" class="menu-link">
                        <div>{{ __('content.representant') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Événements --}}
        <li class="menu-item {{ $menuprincipaleactive=='gest_evenements' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-users"></i>
                <div class="text-truncate">&nbsp;{{ __('content.evenement') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='type_even' ? 'active' : '' }}">
                    <a href="{{route('admin.evenement.type.index')}}" class="menu-link">
                        <div>{{ __('content.type_evenement') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='dmd_evennement' ? 'active' : '' }}">
                    <a href="{{route('admin.evenement.demande.index')}}" class="menu-link">
                        <div>{{ __('content.liste_demande') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='liste_even' ? 'active' : '' }}">
                    <a href="{{route('admin.evenement.index')}}" class="menu-link">
                        <div>{{ __('content.liste_evenement') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='create_even' ? 'active' : '' }}">
                    <a href="#" class="menu-link" data-bs-toggle="modal" data-bs-target="#type_event_Modal">
                        <div>{{ __('content.ajouter_evenement') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Produits --}}
        <li class="menu-item {{ $menuprincipaleactive=='produits' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-th-large"></i>
                <div class="text-truncate">&nbsp;{{ __('content.produits') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='categ_produit' ? 'active' : '' }}">
                    <a href="{{route('admin.categorie_produit.index')}}" class="menu-link">
                        <div>{{ __('content.categ_produit') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='produit' ? 'active' : '' }}">
                    <a href="{{route('admin.produit.index')}}" class="menu-link">
                        <div>{{ __('content.produits') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Cours --}}
        <li class="menu-item {{ $menuprincipaleactive=='cours' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-th-large"></i>
                <div class="text-truncate">&nbsp;{{ __('content.cours') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='categ_cours' ? 'active' : '' }}">
                    <a href="{{route('admin.categ_cours.index')}}" class="menu-link">
                        <div>{{ __('content.categ_cours') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='dmd_cours' ? 'active' : '' }}">
                    <a href="{{route('admin.demande_cours.index')}}" class="menu-link">
                        <div>{{ __('content.liste_demande') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='liste_cours' ? 'active' : '' }}">
                    <a href="{{route('admin.cours.index')}}" class="menu-link">
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

                                                <a href="{{ route('admin.programmes.index') }}" class="menu-link">

                                                    <div>Mes programmes</div>

                                                </a>

                                            </li>

                                        </ul>

                                    </li>

        {{-- Candidats --}}
        <li class="menu-item {{ $menuprincipaleactive=='candidats' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-users"></i>
                <div class="text-truncate">&nbsp;{{ __('content.candidats') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='salle_de_sport' ? 'active' : '' }}">
                    <a href="{{route('admin.candidat.salle_de_sports.index')}}" class="menu-link">
                        <div>{{ __('content.salle_de_sport') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='categ_candidat' ? 'active' : '' }}">
                    <a href="{{route('admin.categ_candidat.index')}}" class="menu-link">
                        <div>{{ __('content.categ_candidat') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='liste_candidat' ? 'active' : '' }}">
                    <a href="{{route('admin.candidat.index')}}" class="menu-link">
                        <div>{{ __('content.candidats') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Formations --}}
        <li class="menu-item {{ $menuprincipaleactive=='formations' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-users"></i>
                <div class="text-truncate">&nbsp;{{ __('content.formations') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='categ_formation' ? 'active' : '' }}">
                    <a href="{{route('admin.categorie_formation.index')}}" class="menu-link">
                        <div>{{ __('content.categ_formation') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='dmd_formation' ? 'active' : '' }}">
                    <a href="{{route('admin.demande_formation.index')}}" class="menu-link">
                        <div>{{ __('content.liste_demande') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='liste_formation' ? 'active' : '' }}">
                    <a href="{{route('admin.formation.index')}}" class="menu-link">
                        <div>{{ __('content.list_formation') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Abonnements Instructeurs --}}
        <li class="menu-item {{ $menuprincipaleactive=='vente_abonnement' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-usd"></i>
                <div class="text-truncate">&nbsp;{{ __('content.abonnement') }} (Instructeurs)</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='categ_abo' ? 'active' : '' }}">
                    <a href="{{route('admin.categ_abo.index')}}" class="menu-link">
                        <div>{{ __('content.categ_abo') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='type_abo' ? 'active' : '' }}">
                    <a href="{{route('admin.type_abo.index')}}" class="menu-link">
                        <div>{{ __('content.type_abo') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='list_abo' ? 'active' : '' }}">
                    <a href="{{route('admin.vente_abo.index')}}" class="menu-link">
                        <div>{{ __('content.liste_abonnement') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='add_abo' ? 'active' : '' }}">
                    <a href="{{route('admin.vente_abo.create')}}" class="menu-link">
                        <div>{{ __('content.Ajouter_un_abo') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Abonnements Adhérents --}}
        <li class="menu-item {{ $menuprincipaleactive=='vente_abonnement_adherent' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-usd"></i>
                <div class="text-truncate">&nbsp;{{ __('content.abonnement') }} (Adhérents)</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='categ_abo_adherent' ? 'active' : '' }}">
                    <a href="{{route('admin.abo.adherent.categ_abo.index')}}" class="menu-link">
                        <div>{{ __('content.categ_abo') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='type_abo_adherent' ? 'active' : '' }}">
                    <a href="{{route('admin.abonnements.adherents.type_abo.index')}}" class="menu-link">
                        <div>{{ __('content.type_abo') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='list_abo_adherent' ? 'active' : '' }}">
                    <a href="{{route('admin.abonnement.adherent.index')}}" class="menu-link">
                        <div>{{ __('content.liste_abonnement') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Vente produits --}}
        <li class="menu-item {{ $menuprincipaleactive=='vente_prod' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-usd"></i>
                <div class="text-truncate">&nbsp;{{ __('content.vente_prod') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='liste_vente_prod' ? 'active' : '' }}">
                    <a href="{{route('admin.vente_prod.index')}}" class="menu-link">
                        <div>{{ __('content.liste_vente') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='add_vente_prod' ? 'active' : '' }}">
                    <a href="{{route('admin.vente_prod.create')}}" class="menu-link">
                        <div>{{ __('content.ajouter_vente') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Stock & vente --}}
        <li class="menu-item {{ $menuprincipaleactive=='stock_vente' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-shopping-bag"></i>
                <div class="text-truncate">&nbsp;{{ __('content.stock_vente') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='fournisseurs' ? 'active' : '' }}">
                    <a href="{{route('admin.stock_vente.fournisseur.index')}}" class="menu-link">
                        <div>{{ __('content.fournisseurs') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='stock' ? 'active' : '' }}">
                    <a href="{{route('admin.stock_vente.stock.index')}}" class="menu-link">
                        <div>{{ __('content.stock') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='bon_entree' ? 'active' : '' }}">
                    <a href="{{route('admin.stock_vente.bon_entre.index')}}" class="menu-link">
                        <div>{{ __('content.bon_entree') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='bon_entree_add' ? 'active' : '' }}">
                    <a href="{{route('admin.stock_vente.bon_entre.create')}}" class="menu-link">
                        <div>{{ __('content.Ajouter_bon_entre') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='bon_sortie' ? 'active' : '' }}">
                    <a href="{{route('admin.stock_vente.bon_sortie.index')}}" class="menu-link">
                        <div>{{ __('content.bon_sortie') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ $menuactive=='bon_sortie_add' ? 'active' : '' }}">
                    <a href="{{route('admin.stock_vente.bon_sortie.create')}}" class="menu-link">
                        <div>{{ __('content.Ajouter_bon_sortie') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Comptes --}}
        <li class="menu-item {{ $menuprincipaleactive=='comptes' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-usd"></i>
                <div class="text-truncate">&nbsp;{{ __('content.comptes') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='liste_comptes' ? 'active' : '' }}">
                    <a href="{{route('admin.instructeur.compte.index')}}" class="menu-link">
                        <div>{{ __('content.liste_comptes') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- ======================================================= --}}
        {{-- GALLERIE                                                 --}}
        {{-- ======================================================= --}}
        <li class="menu-item {{ $menuprincipaleactive=='gallerie' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-image"></i>
                <div class="text-truncate">&nbsp;Gallerie</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='gallerie' ? 'active' : '' }}">
                    <a href="{{route('admin.gallerie.index')}}" class="menu-link">
                        <div>Gérer les images</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- ======================================================= --}}
        {{-- ARTICLES                                                 --}}
        {{-- ======================================================= --}}
        <li class="menu-item {{ $menuprincipaleactive=='articles' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-newspaper-o"></i>
                <div class="text-truncate">&nbsp;Articles</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ $menuactive=='articles' ? 'active' : '' }}">
                    <a href="{{route('admin.articles.index')}}" class="menu-link">
                        <div>Gérer les articles</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>

<form method="GET" action="{{route('admin.evenement.create')}}" class="add-new-user pt-0">
    @csrf
    @include('layouts.type_evenemment_modal')
</form>
