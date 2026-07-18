<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.candidat.menu', ['menuprincipaleactive' => 'rdv_candidat', 'menuactive' => ''])
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
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 fw-bold">
                            <i class="fa fa-calendar-check-o me-2 text-primary"></i>Mes rendez-vous
                        </h4>
                        @if($instructeur_id)
                            <a href="{{ route('candidat.rdv.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i>Demander un rendez-vous
                            </a>
                        @endif
                    </div>

                    @if(count($liste) > 0)
                        <div class="row g-3">
                            @foreach($liste as $rdv)
                            @php
                                $statut     = $rdv['statut'] ?? 'en_attente';
                                $cardBorder = match($statut) {
                                    'accepte' => 'border-success',
                                    'refuse'  => 'border-danger',
                                    default   => 'border-warning',
                                };
                                $badgeClass = match($statut) {
                                    'accepte' => 'bg-success',
                                    'refuse'  => 'bg-danger',
                                    default   => 'bg-warning text-dark',
                                };
                                $badgeLabel = match($statut) {
                                    'accepte' => '✓ Accepté',
                                    'refuse'  => '✗ Refusé',
                                    default   => '⏳ En attente',
                                };
                            @endphp
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card border {{ $cardBorder }} border-2 h-100" style="border-radius:12px;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <span class="badge bg-label-primary mb-1">{{ $rdv['type'] ?? 'Suivi' }}</span>
                                                <h6 class="fw-bold mb-0">
                                                    {{ \Carbon\Carbon::parse($rdv['date'])->format('d/m/Y') }}
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="fa fa-clock-o me-1"></i>
                                                    {{ substr($rdv['heure_deb'] ?? '', 0, 5) }} → {{ substr($rdv['heure_fin'] ?? '', 0, 5) }}
                                                </small>
                                            </div>
                                            <span class="badge {{ $badgeClass }}">{{ $badgeLabel }}</span>
                                        </div>

                                        @if(!empty($rdv['note']))
                                            <p class="text-muted small mb-3">
                                                <i class="fa fa-comment-o me-1"></i>{{ $rdv['note'] }}
                                            </p>
                                        @endif

                                        @if($statut === 'refuse' && !empty($rdv['motif_refus']))
                                            <div class="alert alert-danger py-1 px-2 small mb-2">
                                                <i class="fa fa-info-circle me-1"></i>{{ $rdv['motif_refus'] }}
                                            </div>
                                        @endif

                                        @if($statut === 'en_attente')
                                            <a href="{{ route('candidat.rdv.delete', $rdv['id']) }}"
                                               class="btn btn-sm btn-outline-danger w-100 mt-2"
                                               onclick="return confirm('Annuler ce rendez-vous ?')">
                                                <i class="fa fa-times me-1"></i>Annuler
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <div style="width:80px;height:80px;background:#f0e6ff;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                                    <i class="fa fa-calendar fa-2x" style="color:#6a0dad;"></i>
                                </div>
                                <h5 class="mb-2">Aucun rendez-vous</h5>
                                <p class="text-muted mb-4">Vous n'avez pas encore de rendez-vous avec votre instructeur.</p>
                                @if($instructeur_id)
                                    <a href="{{ route('candidat.rdv.create') }}" class="btn btn-primary">
                                        <i class="fa fa-plus me-1"></i>Demander un rendez-vous
                                    </a>
                                @endif
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
