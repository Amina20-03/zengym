<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu', ['menuprincipaleactive' => 'candidats', 'menuactive' => 'candidats'])
        <div class="layout-page">
            @include('layouts.instructeur.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    {{-- Breadcrumb --}}
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.candidat.index') }}">Clients</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.candidat.show', $candidat_id) }}">{{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}</a></li>
                            <li class="breadcrumb-item active">Rapport santé</li>
                        </ol>
                    </nav>

                    @include('instructeur.candidat._tabs', ['active' => 'rapport', 'candidat_id' => $candidat_id])

                    @if(!$rapport)
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <i class="fa fa-heartbeat fa-3x text-muted mb-3"></i>
                                <h5>Aucune donnée de suivi</h5>
                                <p class="text-muted">Ajoutez des séances de suivi santé pour générer le rapport.</p>
                                <a href="{{ route('instructeur.suivi_sante.create', $candidat_id) }}" class="btn btn-primary">
                                    <i class="fa fa-plus me-1"></i>Ajouter un suivi
                                </a>
                            </div>
                        </div>
                    @else

                    {{-- ======================================================= --}}
                    {{-- RAPPORT                                                  --}}
                    {{-- ======================================================= --}}
                    <div id="rapport_print">

                        {{-- Header rapport --}}
                        <div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div>
                                        <h4 class="fw-bold mb-1">Rapport de suivi</h4>
                                        <p class="text-muted mb-0">
                                            <i class="fa fa-calendar me-1"></i>
                                            Période : {{ \Carbon\Carbon::parse($rapport['periode_debut'])->format('d/m/Y') }}
                                            → {{ \Carbon\Carbon::parse($rapport['periode_fin'])->format('d/m/Y') }}
                                            &nbsp;·&nbsp; {{ $rapport['nb_seances'] }} séance(s)
                                        </p>
                                    </div>
                                    {{-- Profil candidat --}}
                                    <div class="d-flex align-items-center gap-3">
                                        @php
                                            $photoUrl = !empty($candidat['photo'])
                                                ? 'https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/' . $candidat['photo']
                                                : null;
                                        @endphp
                                        @if($photoUrl)
                                            <img src="{{ $photoUrl }}" style="width:60px;height:60px;border-radius:50%;object-fit:cover;border:3px solid #6a0dad;">
                                        @else
                                            <div style="width:60px;height:60px;border-radius:50%;background:#f0e6ff;display:flex;align-items:center;justify-content:center;">
                                                <i class="fa fa-user fa-2x" style="color:#6a0dad;"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="fw-bold">{{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}</div>
                                            <small class="text-muted">{{ $cat ?? '' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4">

                            {{-- ============================================= --}}
                            {{-- Colonne gauche : graphique                   --}}
                            {{-- ============================================= --}}
                            <div class="col-12 col-lg-7">
                                <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
                                    <div class="card-header bg-white border-0 pt-4 pb-0">
                                        <h6 class="fw-bold mb-0">
                                            <i class="fa fa-line-chart me-2 text-primary"></i>Évolution du poids
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        @if(count($poids_evolution) >= 1)
                                            <canvas id="poidsChart" style="max-height:220px;"></canvas>
                                        @else
                                            <p class="text-muted text-center py-4">Données insuffisantes pour le graphique.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- ============================================= --}}
                            {{-- Colonne droite : résumé                       --}}
                            {{-- ============================================= --}}
                            <div class="col-12 col-lg-5">

                                {{-- Résumé poids --}}
                                <div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
                                    <div class="card-header bg-white border-0 pt-4 pb-0">
                                        <h6 class="fw-bold mb-0"><i class="fa fa-balance-scale me-2 text-primary"></i>Résumé</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-borderless mb-0">
                                            @if($rapport['poids_initial'])
                                            <tr>
                                                <td class="text-muted ps-0">Poids initial</td>
                                                <td class="fw-semibold text-end">{{ $rapport['poids_initial'] }} kg</td>
                                            </tr>
                                            @endif
                                            @if($rapport['poids_actuel'])
                                            <tr>
                                                <td class="text-muted ps-0">Poids actuel</td>
                                                <td class="fw-semibold text-end">{{ $rapport['poids_actuel'] }} kg</td>
                                            </tr>
                                            @endif
                                            @if($rapport['perte_poids'] !== null)
                                            <tr>
                                                <td class="text-muted ps-0">Variation</td>
                                                <td class="fw-bold text-end">
                                                    @if($rapport['perte_poids'] < 0)
                                                        <span class="text-success">{{ $rapport['perte_poids'] }} kg <i class="fa fa-arrow-down"></i></span>
                                                    @elseif($rapport['perte_poids'] > 0)
                                                        <span class="text-danger">+{{ $rapport['perte_poids'] }} kg <i class="fa fa-arrow-up"></i></span>
                                                    @else
                                                        <span class="text-muted">Stable</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td class="text-muted ps-0">Présence</td>
                                                <td class="fw-semibold text-end">
                                                    <span class="{{ $rapport['taux_presence'] >= 75 ? 'text-success' : 'text-warning' }}">
                                                        {{ $rapport['taux_presence'] }}%
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                {{-- Autres indicateurs --}}
                                <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                    <div class="card-header bg-white border-0 pt-4 pb-0">
                                        <h6 class="fw-bold mb-0"><i class="fa fa-heartbeat me-2 text-danger"></i>Autres indicateurs</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-borderless mb-0">
                                            @if($rapport['tension_moy'])
                                            <tr>
                                                <td class="text-muted ps-0">Tension (dernière)</td>
                                                <td class="fw-semibold text-end">{{ $rapport['tension_moy'] }}</td>
                                            </tr>
                                            @endif
                                            @if($rapport['energie_moy'])
                                            <tr>
                                                <td class="text-muted ps-0">Énergie moyenne</td>
                                                <td class="fw-semibold text-end">{{ $rapport['energie_moy'] }}/10</td>
                                            </tr>
                                            @endif
                                            @if($rapport['stress_moy'])
                                            <tr>
                                                <td class="text-muted ps-0">Stress moyen</td>
                                                <td class="fw-semibold text-end">{{ $rapport['stress_moy'] }}/10</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td class="text-muted ps-0">Séances total</td>
                                                <td class="fw-semibold text-end">{{ $rapport['nb_seances'] }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Boutons actions --}}
                    <div class="d-flex gap-3 mt-4 justify-content-center flex-wrap">
                        <button onclick="printRapport()" class="btn btn-outline-secondary px-4">
                            <i class="fa fa-print me-2"></i>Imprimer
                        </button>
                        <button onclick="downloadPdf()" class="btn btn-primary px-4">
                            <i class="fa fa-file-pdf-o me-2"></i>Télécharger PDF
                        </button>
                        <form method="POST" action="{{ route('instructeur.suivi_sante.rapport.email', $candidat_id) }}"
                              onsubmit="return confirm('Envoyer le rapport par email à {{ $candidat['email'] ?? 'ce candidat' }} ?')">
                            @csrf
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fa fa-envelope me-2"></i>Envoyer par email
                            </button>
                        </form>
                    </div>

                    @endif

                </div>
                @include('layouts.footer')
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
</div>
