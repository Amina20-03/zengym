<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu', ['menuprincipaleactive' => 'candidats', 'menuactive' => 'candidats'])
        <div class="layout-page">
            @include('layouts.instructeur.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.candidat.index') }}">Clients</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.candidat.show', $candidat_id) }}">{{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}</a></li>
                            <li class="breadcrumb-item active">Profil santé</li>
                        </ol>
                    </nav>

                    @include('instructeur.candidat._tabs', ['active' => 'profil_sante', 'candidat_id' => $candidat_id])

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="mb-0 fw-bold">
                            <i class="fa fa-heartbeat me-2 text-danger"></i>
                            Profil santé — {{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}
                        </h5>
                        <span class="badge bg-label-info">
                            <i class="fa fa-eye me-1"></i>Consultation uniquement
                        </span>
                    </div>

                    @if(count($liste) > 0)

                        {{-- Derniers indicateurs --}}
                        @php $dernier = $liste[0]; @endphp
                        <div class="row g-3 mb-4">
                            @if(!empty($dernier['poids']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm" style="border-radius:12px;">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-primary">{{ $dernier['poids'] }} kg</div>
                                        <small class="text-muted">Poids</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['imc']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm" style="border-radius:12px;">
                                    <div class="card-body py-3">
                                        @php
                                            $imc = $dernier['imc'];
                                            $c = $imc < 18.5 ? 'text-info' : ($imc < 25 ? 'text-success' : ($imc < 30 ? 'text-warning' : 'text-danger'));
                                        @endphp
                                        <div class="fw-bold fs-5 {{ $c }}">{{ $imc }}</div>
                                        <small class="text-muted">IMC</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['tension_arterielle']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm" style="border-radius:12px;">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-danger">{{ $dernier['tension_arterielle'] }}</div>
                                        <small class="text-muted">Tension</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['frequence_cardiaque']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm" style="border-radius:12px;">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-warning">{{ $dernier['frequence_cardiaque'] }} bpm</div>
                                        <small class="text-muted">Fréq. card.</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($dernier['niveau_stress']))
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card text-center border-0 shadow-sm" style="border-radius:12px;">
                                    <div class="card-body py-3">
                                        <div class="fw-bold fs-5 text-info">{{ $dernier['niveau_stress'] }}/10</div>
                                        <small class="text-muted">Stress</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="card border-0 shadow-sm" style="border-radius:14px;">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Poids</th>
                                            <th>Taille</th>
                                            <th>IMC</th>
                                            <th>Glycémie</th>
                                            <th>Tension</th>
                                            <th>Fréq.</th>
                                            <th>Stress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($liste as $s)
                                        <tr>
                                            <td><strong>{{ \Carbon\Carbon::parse($s['date_suivi'])->format('d/m/Y') }}</strong></td>
                                            <td>{{ $s['poids'] ? $s['poids'].' kg' : '—' }}</td>
                                            <td>{{ $s['taille'] ? $s['taille'].' cm' : '—' }}</td>
                                            <td>
                                                @if($s['imc'])
                                                    @php $c = $s['imc'] < 18.5 ? 'info' : ($s['imc'] < 25 ? 'success' : ($s['imc'] < 30 ? 'warning' : 'danger')); @endphp
                                                    <span class="badge bg-{{ $c }}">{{ $s['imc'] }}</span>
                                                @else —
                                                @endif
                                            </td>
                                            <td>{{ $s['glycemie'] ? $s['glycemie'].' g/L' : '—' }}</td>
                                            <td>{{ $s['tension_arterielle'] ?? '—' }}</td>
                                            <td>{{ $s['frequence_cardiaque'] ? $s['frequence_cardiaque'].' bpm' : '—' }}</td>
                                            <td>{{ $s['niveau_stress'] ? $s['niveau_stress'].'/10' : '—' }}</td>
                                        </tr>
                                        @if(!empty($s['notes']) || !empty($s['objectifs']) || !empty($s['progression']))
                                        <tr class="table-light">
                                            <td colspan="8" class="py-1 ps-4 small text-muted">
                                                @if(!empty($s['objectifs'])) <span class="me-3"><i class="fa fa-flag me-1"></i>{{ $s['objectifs'] }}</span> @endif
                                                @if(!empty($s['progression'])) <span class="me-3"><i class="fa fa-line-chart me-1"></i>{{ $s['progression'] }}</span> @endif
                                                @if(!empty($s['notes'])) <span><i class="fa fa-comment-o me-1"></i>{{ $s['notes'] }}</span> @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @else
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <i class="fa fa-heartbeat fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">Ce candidat n'a pas encore renseigné son profil santé.</p>
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
