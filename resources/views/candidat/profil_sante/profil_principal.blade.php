<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.candidat.menu', ['menuprincipaleactive' => 'profil_sante_candidat', 'menuactive' => ''])
        <div class="layout-page">
            @include('layouts.candidat.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Header --}}
                    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
                        <h4 class="mb-0 fw-bold">Profil santé</h4>
                        <div class="d-flex gap-2">
                            <a href="{{ route('candidat.profil_sante.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i>Ajouter nouveau suivi
                            </a>
                            <a href="{{ route('candidat.profil_sante.historique') }}" class="btn btn-outline-primary">
                                <i class="fa fa-history me-1"></i>Historique des suivis
                            </a>
                        </div>
                    </div>

                    @if(!$dernier)
                        {{-- Aucune donnée --}}
                        <div class="card border-0 shadow-sm text-center py-5" style="border-radius:16px;">
                            <div class="card-body">
                                <div style="width:80px;height:80px;background:#f0e6ff;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;">
                                    <i class="fa fa-heartbeat fa-2x" style="color:#6a0dad;"></i>
                                </div>
                                <h5 class="mb-2">Aucun suivi enregistré</h5>
                                <p class="text-muted mb-4">Commencez à suivre vos indicateurs de santé.</p>
                                <a href="{{ route('candidat.profil_sante.create') }}" class="btn btn-primary px-4">
                                    <i class="fa fa-plus me-1"></i>Mon premier suivi
                                </a>
                            </div>
                        </div>
                    @else

                    {{-- Profil card --}}
                    <div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-4 flex-wrap">
                                {{-- Avatar --}}
                                <div style="position:relative;flex-shrink:0;">
                                    @php $photoUrl = !empty($candidat['photo']) ? 'https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/'.$candidat['photo'] : null; @endphp
                                    @if($photoUrl)
                                        <img src="{{ $photoUrl }}" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid #6a0dad;">
                                    @else
                                        <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#6a0dad,#9b59b6);display:flex;align-items:center;justify-content:center;">
                                            <i class="fa fa-user fa-2x text-white"></i>
                                        </div>
                                    @endif
                                    <a href="{{ route('candidat.profile') }}"
                                       style="position:absolute;bottom:0;right:0;width:26px;height:26px;background:#6a0dad;border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid #fff;">
                                        <i class="fa fa-pencil" style="color:#fff;font-size:10px;"></i>
                                    </a>
                                </div>
                                {{-- Infos --}}
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}</h5>
                                    <div class="d-flex gap-3 text-muted small mb-2">
                                        @if(!empty($candidat['adr']))
                                            <span><i class="fa fa-map-marker me-1"></i>{{ $candidat['adr'] }}</span>
                                        @endif
                                    </div>
                                    @if(!empty($dernier['objectifs']))
                                        <span class="badge" style="background:#f0e6ff;color:#6a0dad;border-radius:20px;padding:6px 14px;">
                                            <i class="fa fa-bullseye me-1"></i>Objectif : {{ Str::limit($dernier['objectifs'], 40) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Indicateurs principaux --}}
                    <div class="row g-3 mb-4">

                        @if(!empty($dernier['poids']))
                        <div class="col-6 col-md-3">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width:44px;height:44px;background:#f0e6ff;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fa fa-balance-scale" style="color:#6a0dad;font-size:18px;"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Poids</div>
                                            <div class="fw-bold fs-5">{{ $dernier['poids'] }} kg</div>
                                            <span class="text-success" style="font-size:11px;">● Normal</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($dernier['taille']))
                        <div class="col-6 col-md-3">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width:44px;height:44px;background:#f0e6ff;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fa fa-arrows-v" style="color:#6a0dad;font-size:18px;"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Taille</div>
                                            <div class="fw-bold fs-5">{{ $dernier['taille'] }} cm</div>
                                            <span class="text-success" style="font-size:11px;">● Normal</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($dernier['imc']))
                        @php
                            $imc = $dernier['imc'];
                            $imcLabel = $imc < 18.5 ? ['Maigreur','text-info','info'] : ($imc < 25 ? ['Normal','text-success','success'] : ($imc < 30 ? ['Surpoids','text-warning','warning'] : ['Obésité','text-danger','danger']));
                        @endphp
                        <div class="col-6 col-md-3">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width:44px;height:44px;background:#f0e6ff;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fa fa-calculator" style="color:#6a0dad;font-size:18px;"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">IMC</div>
                                            <div class="fw-bold fs-5">{{ $imc }}</div>
                                            <span class="{{ $imcLabel[1] }}" style="font-size:11px;">● {{ $imcLabel[0] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($dernier['glycemie']))
                        <div class="col-6 col-md-3">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width:44px;height:44px;background:#f0e6ff;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fa fa-tint" style="color:#6a0dad;font-size:18px;"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Glycémie</div>
                                            <div class="fw-bold fs-5">{{ $dernier['glycemie'] }} g/L</div>
                                            @php $g = $dernier['glycemie']; $gLabel = $g < 0.7 ? ['Bas','text-warning'] : ($g <= 1.1 ? ['Normal','text-success'] : ['Élevé','text-danger']); @endphp
                                            <span class="{{ $gLabel[1] }}" style="font-size:11px;">● {{ $gLabel[0] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($dernier['tension_arterielle']))
                        <div class="col-6 col-md-4">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width:44px;height:44px;background:#ffe6e6;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fa fa-heartbeat" style="color:#dc3545;font-size:18px;"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Tension</div>
                                            <div class="fw-bold fs-5">{{ $dernier['tension_arterielle'] }}</div>
                                            <span class="text-success" style="font-size:11px;">● Normale</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($dernier['frequence_cardiaque']))
                        <div class="col-6 col-md-4">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width:44px;height:44px;background:#ffe6e6;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fa fa-heart" style="color:#dc3545;font-size:18px;"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Fréquence cardiaque</div>
                                            <div class="fw-bold fs-5">{{ $dernier['frequence_cardiaque'] }} bpm</div>
                                            @php $fc = $dernier['frequence_cardiaque']; $fcLabel = $fc < 60 ? ['Bas','text-warning'] : ($fc <= 100 ? ['Normale','text-success'] : ['Élevée','text-danger']); @endphp
                                            <span class="{{ $fcLabel[1] }}" style="font-size:11px;">● {{ $fcLabel[0] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($dernier['niveau_stress']))
                        @php
                            $stress = $dernier['niveau_stress'];
                            $stressLabel = $stress <= 3 ? ['Faible','text-success'] : ($stress <= 6 ? ['Modéré','text-warning'] : ['Élevé','text-danger']);
                        @endphp
                        <div class="col-6 col-md-4">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width:44px;height:44px;background:#e6f0ff;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fa fa-brain" style="color:#4a6cf7;font-size:18px;"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Niveau de stress</div>
                                            <div class="fw-bold fs-5">{{ $stress }}/10</div>
                                            <span class="{{ $stressLabel[1] }}" style="font-size:11px;">● {{ $stressLabel[0] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Bas : objectifs + graphique --}}
                    <div class="row g-4">

                        {{-- Objectifs --}}
                        @if(!empty($dernier['objectifs']) || !empty($dernier['progression']) || !empty($dernier['notes']))
                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
                                <div class="card-header bg-white border-0 pt-4 pb-2">
                                    <h6 class="fw-bold mb-0"><i class="fa fa-flag me-2 text-primary"></i>Mes objectifs</h6>
                                </div>
                                <div class="card-body pt-2">
                                    @if(!empty($dernier['objectifs']))
                                        <p class="text-muted small mb-3"><strong>Objectif :</strong> {{ $dernier['objectifs'] }}</p>
                                    @endif
                                    @if(!empty($dernier['progression']))
                                        <p class="text-muted small mb-3"><i class="fa fa-line-chart me-1 text-success"></i>{{ $dernier['progression'] }}</p>
                                    @endif
                                    @if(!empty($dernier['notes']))
                                        <p class="text-muted small mb-0"><i class="fa fa-comment-o me-1"></i>{{ $dernier['notes'] }}</p>
                                    @endif
                                    <hr>
                                    <a href="{{ route('candidat.profil_sante.edit', $dernier['id']) }}"
                                       class="btn btn-primary w-100">
                                        Mettre à jour
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Graphique évolution --}}
                        <div class="col-12 col-lg-8">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-header bg-white border-0 pt-4 pb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-bold mb-0">
                                            <i class="fa fa-line-chart me-2 text-primary"></i>Évolution mensuelle
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(count($poids_evolution) >= 1)
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <canvas id="poidsChart" style="max-height:200px;"></canvas>
                                            </div>
                                            <div class="col-md-4 text-center mt-3 mt-md-0">
                                                <div class="card border-0" style="background:#f8f0ff;border-radius:12px;padding:20px;">
                                                    <div style="width:44px;height:44px;background:#f0e6ff;border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;">
                                                        <i class="fa fa-balance-scale" style="color:#6a0dad;font-size:18px;"></i>
                                                    </div>
                                                    <div class="text-muted small mb-1">Poids actuel</div>
                                                    <div class="fw-bold" style="font-size:1.8rem;color:#6a0dad;">{{ $poids_actuel ?? '—' }} kg</div>
                                                    @if($poids_initial && $poids_actuel)
                                                        @php $diff = round($poids_actuel - $poids_initial, 1); @endphp
                                                        <div class="mt-2 fw-semibold {{ $diff <= 0 ? 'text-success' : 'text-danger' }}" style="font-size:1rem;">
                                                            <i class="fa fa-arrow-{{ $diff <= 0 ? 'down' : 'up' }} me-1"></i>
                                                            {{ $diff > 0 ? '+' : '' }}{{ $diff }} kg
                                                        </div>
                                                        <div class="text-muted" style="font-size:11px;">vs première mesure</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-muted text-center py-4">
                                            <i class="fa fa-info-circle me-1"></i>
                                            Enregistrez au moins un suivi avec votre poids pour voir l'évolution.
                                        </p>
                                    @endif
                                </div>
                            </div>
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
