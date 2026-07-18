{{-- Onglets fiche candidat — inclure avec @include('instructeur.candidat._tabs', ['active' => 'suivi', 'candidat_id' => $candidat_id]) --}}
<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link {{ ($active ?? '') === 'infos' ? 'active' : '' }}"
           href="{{ route('instructeur.candidat.show', $candidat_id) }}">
            Informations
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($active ?? '') === 'profil_sante' ? 'active' : '' }}"
           href="{{ route('instructeur.profil_sante_candidat', $candidat_id) }}">
            <i class="fa fa-heartbeat me-1"></i>Profil santé
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($active ?? '') === 'suivi' ? 'active' : '' }}"
           href="{{ route('instructeur.suivi_sante.index', $candidat_id) }}">
            Suivi santé
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($active ?? '') === 'rapport' ? 'active' : '' }}"
           href="{{ route('instructeur.suivi_sante.rapport', $candidat_id) }}">
            <i class="fa fa-file-text me-1"></i>Rapport santé
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($active ?? '') === 'programmes' ? 'active' : '' }}"
           href="{{ route('instructeur.candidat_programmes.index', $candidat_id) }}">
            <i class="fa fa-th-large me-1"></i>Programmes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($active ?? '') === 'rdv' ? 'active' : '' }}"
           href="{{ route('instructeur.fiche_rdv', $candidat_id) }}">
            <i class="fa fa-calendar me-1"></i>Rendez-vous
        </a>
    </li>
</ul>
