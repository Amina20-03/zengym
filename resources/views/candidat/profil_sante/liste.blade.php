<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.candidat.menu', ['menuprincipaleactive' => 'profil_sante_candidat', 'menuactive' => ''])
        <div class="layout-page">
            @include('layouts.candidat.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <i class="fa fa-check-circle me-2"></i>{{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-0 fw-bold">
                                <i class="fa fa-heartbeat me-2 text-danger"></i>Mon profil santé
                            </h4>
                            <small class="text-muted">Suivez vos indicateurs de santé au fil du temps</small>
                        </div>
                        <a href="{{ route('candidat.profil_sante.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-1"></i>Nouveau suivi
                        </a>
                    </div>

                    {{-- Derniers indicateurs --}}
                    @if(count($liste) > 0)
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
                                        $imcColor = $imc < 18.5 ? 'text-info' : ($imc < 25 ? 'text-success' : ($imc < 30 ? 'text-warning' : 'text-danger'));
                                    @endphp
                                    <div class="fw-bold fs-5 {{ $imcColor }}">{{ $imc }}</div>
                                    <small class="text-muted">IMC</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($dernier['taille']))
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="card text-center border-0 shadow-sm" style="border-radius:12px;">
                                <div class="card-body py-3">
                                    <div class="fw-bold fs-5 text-secondary">{{ $dernier['taille'] }} cm</div>
                                    <small class="text-muted">Taille</small>
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

                    {{-- Historique --}}
                    <div class="card border-0 shadow-sm" style="border-radius:14px;">
                        <div class="card-header bg-white border-0 pt-4 pb-0">
                            <h6 class="fw-bold mb-0">Historique des suivis</h6>
                        </div>
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
                                        <th>Actions</th>
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
                                        <td>
                                            <a href="{{ route('candidat.profil_sante.edit', $s['id']) }}"
                                               class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('candidat.profil_sante.delete', $s['id']) }}"
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Supprimer ?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @if(!empty($s['notes']) || !empty($s['objectifs']) || !empty($s['progression']))
                                    <tr class="table-light">
                                        <td colspan="9" class="py-1 ps-4 small text-muted">
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
                            <div style="width:80px;height:80px;background:#fff0f0;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                                <i class="fa fa-heartbeat fa-2x text-danger"></i>
                            </div>
                            <h5 class="mb-2">Aucun suivi enregistré</h5>
                            <p class="text-muted mb-4">Commencez à suivre vos indicateurs de santé.</p>
                            <a href="{{ route('candidat.profil_sante.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i>Enregistrer mon premier suivi
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
