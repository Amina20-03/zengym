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
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Breadcrumb --}}
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.candidat.index') }}">Clients</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.candidat.show', $candidat_id) }}">{{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}</a></li>
                            <li class="breadcrumb-item active">Programmes</li>
                        </ol>
                    </nav>

                    {{-- Onglets fiche --}}
                    @include('instructeur.candidat._tabs', ['active' => 'programmes', 'candidat_id' => $candidat_id])

                    <div class="row g-4">

                        {{-- ================================================ --}}
                        {{-- PROGRAMMES ASSIGNÉS                               --}}
                        {{-- ================================================ --}}
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0 fw-bold">
                                    Programmes de {{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}
                                    <span class="badge bg-label-primary ms-2">{{ count($assigned) }}</span>
                                </h5>
                                @if(count($available) > 0)
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#assignModal">
                                        <i class="fa fa-plus me-1"></i>Assigner un programme
                                    </button>
                                @endif
                            </div>

                            @if(count($assigned) > 0)
                                <div class="row g-3">
                                    @foreach($assigned as $prog)
                                    @php
                                        $badgeClass = match($prog['statut']) {
                                            'en_cours' => 'bg-success',
                                            'termine'  => 'bg-label-secondary',
                                            'pause'    => 'bg-warning',
                                            default    => 'bg-label-primary',
                                        };
                                        $badgeLabel = match($prog['statut']) {
                                            'en_cours' => 'En cours',
                                            'termine'  => 'Terminé',
                                            'pause'    => 'En pause',
                                            default    => $prog['statut'],
                                        };
                                    @endphp
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="card border-0 shadow-sm h-100" style="border-radius:12px;overflow:hidden;">

                                            {{-- Photo --}}
                                            @if(!empty($prog['photo_url']))
                                                <img src="{{ $prog['photo_url'] }}"
                                                     style="width:100%;height:150px;object-fit:cover;">
                                            @else
                                                <div style="height:100px;background:linear-gradient(135deg,#6a0dad22,#6a0dad44);display:flex;align-items:center;justify-content:center;">
                                                    <i class="fa fa-th-large fa-2x" style="color:#6a0dad;opacity:0.5;"></i>
                                                </div>
                                            @endif

                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="fw-bold mb-0">{{ $prog['titre'] }}</h6>
                                                    <span class="badge {{ $badgeClass }} ms-1">{{ $badgeLabel }}</span>
                                                </div>

                                                @if(!empty($prog['duree_semaines']))
                                                    <p class="text-muted small mb-1">
                                                        <i class="fa fa-clock-o me-1"></i>{{ $prog['duree_semaines'] }} semaine(s)
                                                    </p>
                                                @endif
                                                @if(!empty($prog['niveau']))
                                                    <p class="text-muted small mb-2">
                                                        <i class="fa fa-signal me-1"></i>{{ $prog['niveau'] }}
                                                    </p>
                                                @endif
                                                @if(!empty($prog['date_debut']))
                                                    <p class="text-muted small mb-2">
                                                        <i class="fa fa-calendar me-1"></i>Début : {{ \Carbon\Carbon::parse($prog['date_debut'])->format('d/m/Y') }}
                                                    </p>
                                                @endif

                                                {{-- Changer statut --}}
                                                <form method="POST"
                                                      action="{{ route('instructeur.candidat_programmes.statut', $prog['pivot_id']) }}"
                                                      class="d-flex gap-1 mt-2">
                                                    @csrf
                                                    <input type="hidden" name="candidat_id" value="{{ $candidat_id }}">
                                                    <select name="statut" class="form-select form-select-sm flex-grow-1"
                                                            onchange="this.form.submit()">
                                                        <option value="en_cours" {{ $prog['statut'] === 'en_cours' ? 'selected' : '' }}>En cours</option>
                                                        <option value="pause"    {{ $prog['statut'] === 'pause'    ? 'selected' : '' }}>En pause</option>
                                                        <option value="termine"  {{ $prog['statut'] === 'termine'  ? 'selected' : '' }}>Terminé</option>
                                                    </select>
                                                </form>

                                                {{-- Retirer --}}
                                                <form method="POST"
                                                      action="{{ route('instructeur.candidat_programmes.unassign', $prog['pivot_id']) }}"
                                                      class="mt-2"
                                                      onsubmit="return confirm('Retirer ce programme du candidat ?')">
                                                    @csrf
                                                    <input type="hidden" name="candidat_id" value="{{ $candidat_id }}">
                                                    <button class="btn btn-sm btn-outline-danger w-100">
                                                        <i class="fa fa-times me-1"></i>Retirer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body text-center py-5">
                                        <div style="width:70px;height:70px;background:#f0e6ff;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                                            <i class="fa fa-th-large fa-2x" style="color:#6a0dad;"></i>
                                        </div>
                                        <h6 class="mb-2">Aucun programme assigné</h6>
                                        <p class="text-muted small mb-3">Assignez un programme à ce candidat pour commencer le suivi.</p>
                                        @if(count($available) > 0)
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignModal">
                                                <i class="fa fa-plus me-1"></i>Assigner un programme
                                            </button>
                                        @else
                                            <p class="text-muted small">
                                                <a href="{{ route('instructeur.programmes.create') }}">Créez d'abord un programme</a>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
                @include('layouts.footer')
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
</div>

{{-- Modal assigner programme --}}
<div class="modal fade" id="assignModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="fa fa-plus-circle me-2 text-primary"></i>
                    Assigner un programme
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST"
                      action="{{ route('instructeur.candidat_programmes.assign', $candidat_id) }}"
                      id="formAssign">
                    @csrf

                    {{-- Grille de sélection --}}
                    <div class="row g-3 mb-4" id="prog_grid">
                        @foreach($available as $prog)
                        <div class="col-12 col-sm-6">
                            <label class="card border h-100 p-0 cursor-pointer"
                                   style="cursor:pointer;border-radius:10px;overflow:hidden;transition:border-color 0.2s;"
                                   onclick="selectProg(this, '{{ $prog['id'] }}')">
                                <input type="radio" name="programme_id" value="{{ $prog['id'] }}"
                                       class="d-none" required>
                                <div class="d-flex gap-3 align-items-center p-3">
                                    @if(!empty($prog['photo_url']))
                                        <img src="{{ $prog['photo_url'] }}"
                                             style="width:60px;height:60px;object-fit:cover;border-radius:8px;flex-shrink:0;">
                                    @else
                                        <div style="width:60px;height:60px;background:#f0e6ff;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fa fa-th-large" style="color:#6a0dad;"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $prog['titre'] }}</div>
                                        <div class="text-muted small">
                                            @if(!empty($prog['duree_semaines'])){{ $prog['duree_semaines'] }} sem. · @endif
                                            {{ $prog['niveau'] ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Date de début</label>
                        <input type="date" name="date_debut" class="form-control"
                               value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" id="btnAssign" disabled>
                            <i class="fa fa-check me-1"></i>Assigner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function selectProg(label, id) {
    // Réinitialiser
    document.querySelectorAll('#prog_grid label').forEach(l => {
        l.style.borderColor = '';
        l.style.background  = '';
    });
    // Sélectionner
    label.style.borderColor = '#6a0dad';
    label.style.background  = '#f8f0ff';
    label.querySelector('input[type=radio]').checked = true;
    document.getElementById('btnAssign').disabled = false;
}
</script>
