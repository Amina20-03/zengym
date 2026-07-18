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
                            <li class="breadcrumb-item active">Rendez-vous</li>
                        </ol>
                    </nav>

                    {{-- Onglets fiche --}}
                    @include('instructeur.candidat._tabs', ['active' => 'rdv', 'candidat_id' => $candidat_id])

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="mb-0 fw-bold">
                            Rendez-vous de {{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}
                            <span class="badge bg-label-primary ms-2">{{ count($liste) }}</span>
                        </h5>
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
                                        <div class="d-flex justify-content-between align-items-start mb-2">
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
                                            <p class="text-muted small mb-2">
                                                <i class="fa fa-comment-o me-1"></i>{{ $rdv['note'] }}
                                            </p>
                                        @endif

                                        @if($statut === 'refuse' && !empty($rdv['motif_refus']))
                                            <div class="alert alert-danger py-1 px-2 small mb-2">
                                                <i class="fa fa-info-circle me-1"></i>{{ $rdv['motif_refus'] }}
                                            </div>
                                        @endif

                                        @if($statut === 'en_attente')
                                            <div class="d-flex gap-2 mt-2">
                                                <form method="POST" action="{{ route('instructeur.rendez_vous.accepter', $rdv['id']) }}" class="flex-grow-1">
                                                    @csrf
                                                    <button class="btn btn-sm btn-success w-100">
                                                        <i class="fa fa-check me-1"></i>Accepter
                                                    </button>
                                                </form>
                                                <button class="btn btn-sm btn-outline-danger"
                                                        onclick="showRefusModal({{ $rdv['id'] }})">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        @endif
                                        <small class="text-muted d-block mt-2">
                                            Demandé le {{ \Carbon\Carbon::parse($rdv['created_at'])->format('d/m/Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <i class="fa fa-calendar fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">Aucun rendez-vous demandé par ce candidat.</p>
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

{{-- Modal refus --}}
<div class="modal fade" id="refusModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form id="formRefus" method="POST" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-times-circle me-2 text-danger"></i>Refuser le rendez-vous</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label fw-semibold">Motif du refus <small class="text-muted">(optionnel)</small></label>
                    <textarea name="motif_refus" class="form-control" rows="3"
                              placeholder="Expliquer la raison du refus..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times me-1"></i>Confirmer le refus
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function showRefusModal(id) {
    $('#formRefus').attr('action', '{{ url("instructeur/rendez-vous/refuser") }}/' + id);
    $('#refusModal').modal('show');
}
</script>
