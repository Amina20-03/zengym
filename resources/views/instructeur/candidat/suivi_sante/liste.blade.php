<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu', ['menuprincipaleactive' => 'candidats', 'menuactive' => 'candidats'])
        <div class="layout-page">
            @include('layouts.instructeur.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Breadcrumb --}}
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.candidat.index') }}">Clients</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.candidat.show', $candidat_id) }}">{{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}</a></li>
                            <li class="breadcrumb-item active">Suivi santé</li>
                        </ol>
                    </nav>

                    {{-- Header --}}
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-0">Suivi santé — {{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}</h4>
                            <small class="text-muted">{{ count($liste) }} séance(s) enregistrée(s)</small>
                        </div>
                        <a href="{{ route('instructeur.suivi_sante.create', $candidat_id) }}" class="btn btn-primary">
                            <i class="fa fa-plus me-1"></i>Nouveau suivi
                        </a>
                    </div>

                    {{-- Onglets fiche --}}
                    @include('instructeur.candidat._tabs', ['active' => 'suivi', 'candidat_id' => $candidat_id])

                    @if(count($liste) > 0)

                        {{-- Derniers indicateurs --}}
                        @php $dernier = $liste[0]; @endphp
                        <div class="row g-3 mb-4">
                            @if(!empty($dernier['poids']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-primary">{{ $dernier['poids'] }} kg</div>
                                        <small class="text-muted">Poids</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['tension_arterielle']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-danger">{{ $dernier['tension_arterielle'] }}</div>
                                        <small class="text-muted">Tension</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['frequence_cardiaque']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-warning">{{ $dernier['frequence_cardiaque'] }} bpm</div>
                                        <small class="text-muted">Fréq. cardiaque</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['saturation_oxygene']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-success">{{ $dernier['saturation_oxygene'] }}%</div>
                                        <small class="text-muted">Saturation O₂</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['niveau_energie']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-info">{{ $dernier['niveau_energie'] }}/10</div>
                                        <small class="text-muted">Énergie</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['niveau_stress']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-secondary">{{ $dernier['niveau_stress'] }}/10</div>
                                        <small class="text-muted">Stress</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        {{-- Table des suivis --}}
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Historique des suivis</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Poids</th>
                                            <th>Tour taille</th>
                                            <th>Tension</th>
                                            <th>Fréq. card.</th>
                                            <th>Glycémie</th>
                                            <th>O₂</th>
                                            <th>Énergie</th>
                                            <th>Stress</th>
                                            <th>Sommeil</th>
                                            <th>Présence</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($liste as $s)
                                        <tr>
                                            <td><strong>{{ \Carbon\Carbon::parse($s['date_suivi'])->format('d/m/Y') }}</strong></td>
                                            <td>{{ $s['poids'] ? $s['poids'].' kg' : '—' }}</td>
                                            <td>{{ $s['tour_de_taille'] ? $s['tour_de_taille'].' cm' : '—' }}</td>
                                            <td>{{ $s['tension_arterielle'] ?? '—' }}</td>
                                            <td>{{ $s['frequence_cardiaque'] ? $s['frequence_cardiaque'].' bpm' : '—' }}</td>
                                            <td>{{ $s['glycemie'] ? $s['glycemie'].' g/L' : '—' }}</td>
                                            <td>{{ $s['saturation_oxygene'] ? $s['saturation_oxygene'].'%' : '—' }}</td>
                                            <td>
                                                @if($s['niveau_energie'])
                                                    <span class="badge bg-label-info">{{ $s['niveau_energie'] }}/10</span>
                                                @else —
                                                @endif
                                            </td>
                                            <td>
                                                @if($s['niveau_stress'])
                                                    <span class="badge bg-label-warning">{{ $s['niveau_stress'] }}/10</span>
                                                @else —
                                                @endif
                                            </td>
                                            <td>
                                                @if($s['qualite_sommeil'])
                                                    <span class="badge bg-label-primary">{{ $s['qualite_sommeil'] }}/10</span>
                                                @else —
                                                @endif
                                            </td>
                                            <td>
                                                @if($s['presence'] === 'Présent')
                                                    <span class="badge bg-success">✓ Présent</span>
                                                @elseif($s['presence'])
                                                    <span class="badge bg-danger">✗ Absent</span>
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('instructeur.suivi_sante.edit', $s['id']) }}"
                                                   class="btn btn-sm btn-outline-primary me-1">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{ route('instructeur.suivi_sante.delete', $s['id']) }}"
                                                   class="btn btn-sm btn-outline-danger"
                                                   onclick="return confirm('Supprimer ce suivi ?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @if(!empty($s['commentaire']))
                                        <tr class="table-light">
                                            <td colspan="12" class="py-1 ps-4">
                                                <small class="text-muted"><i class="fa fa-comment me-1"></i>{{ $s['commentaire'] }}</small>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @else
                        <div class="card">
                            <div class="card-body text-center py-5">
                                <i class="fa fa-heartbeat fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-3">Aucun suivi de santé enregistré pour ce candidat.</p>
                                <a href="{{ route('instructeur.suivi_sante.create', $candidat_id) }}" class="btn btn-primary">
                                    <i class="fa fa-plus me-1"></i>Enregistrer le premier suivi
                                </a>
                            </div>
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
