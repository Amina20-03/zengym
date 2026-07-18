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
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.suivi_sante.index', $candidat_id) }}">Suivi santé</a></li>
                            <li class="breadcrumb-item active">{{ isset($suivi) ? 'Modifier' : 'Nouveau suivi' }}</li>
                        </ol>
                    </nav>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fa fa-heartbeat me-2 text-danger"></i>
                                {{ isset($suivi) ? 'Modifier le suivi' : 'Nouveau suivi' }}
                                — {{ $candidat['nom'] ?? '' }} {{ $candidat['prenom'] ?? '' }}
                            </h5>
                        </div>
                        <div class="card-body">

                            <form method="POST"
                                  action="{{ isset($suivi)
                                      ? route('instructeur.suivi_sante.update', $suivi['id'])
                                      : route('instructeur.suivi_sante.store', $candidat_id) }}">
                                @csrf

                                @if(isset($suivi))
                                    <input type="hidden" name="candidat_id" value="{{ $candidat_id }}">
                                @endif

                                <div class="row g-4">

                                    {{-- Colonne gauche --}}
                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Date du suivi <span class="text-danger">*</span></label>
                                            <input type="date" name="date_suivi" class="form-control"
                                                   value="{{ isset($suivi) ? $suivi['date_suivi'] : date('Y-m-d') }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Poids (kg)</label>
                                            <input type="number" step="0.1" name="poids" class="form-control"
                                                   placeholder="ex: 71.2"
                                                   value="{{ $suivi['poids'] ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Tour de taille (cm)</label>
                                            <input type="number" name="tour_de_taille" class="form-control"
                                                   placeholder="ex: 85"
                                                   value="{{ $suivi['tour_de_taille'] ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Tension artérielle</label>
                                            <input type="text" name="tension_arterielle" class="form-control"
                                                   placeholder="ex: 12/8"
                                                   value="{{ $suivi['tension_arterielle'] ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Fréquence cardiaque (bpm)</label>
                                            <input type="number" name="frequence_cardiaque" class="form-control"
                                                   placeholder="ex: 72"
                                                   value="{{ $suivi['frequence_cardiaque'] ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Glycémie (g/L)</label>
                                            <input type="number" step="0.01" name="glycemie" class="form-control"
                                                   placeholder="ex: 1.05"
                                                   value="{{ $suivi['glycemie'] ?? '' }}">
                                        </div>

                                    </div>

                                    {{-- Colonne droite --}}
                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Saturation oxygène (%)</label>
                                            <input type="number" name="saturation_oxygene" class="form-control"
                                                   min="0" max="100" placeholder="ex: 98"
                                                   value="{{ $suivi['saturation_oxygene'] ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Niveau d'énergie (/10)</label>
                                            <input type="number" name="niveau_energie" class="form-control"
                                                   min="0" max="10" placeholder="ex: 7"
                                                   value="{{ $suivi['niveau_energie'] ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Niveau de stress (/10)</label>
                                            <input type="number" name="niveau_stress" class="form-control"
                                                   min="0" max="10" placeholder="ex: 4"
                                                   value="{{ $suivi['niveau_stress'] ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Qualité du sommeil (/10)</label>
                                            <input type="number" name="qualite_sommeil" class="form-control"
                                                   min="0" max="10" placeholder="ex: 6"
                                                   value="{{ $suivi['qualite_sommeil'] ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Présence à la séance</label>
                                            <select name="presence" class="form-select">
                                                <option value="">— Sélectionner —</option>
                                                <option value="Présent" {{ ($suivi['presence'] ?? '') === 'Présent' ? 'selected' : '' }}>Présent</option>
                                                <option value="Absent"  {{ ($suivi['presence'] ?? '') === 'Absent'  ? 'selected' : '' }}>Absent</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Commentaire</label>
                                            <textarea name="commentaire" class="form-control" rows="4"
                                                      placeholder="Bonne progression, continuer les efforts...">{{ $suivi['commentaire'] ?? '' }}</textarea>
                                        </div>

                                    </div>

                                </div>

                                <div class="d-flex gap-2 justify-content-end pt-2">
                                    <a href="{{ route('instructeur.suivi_sante.index', $candidat_id) }}"
                                       class="btn btn-outline-secondary">Annuler</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-1"></i>Enregistrer le suivi
                                    </button>
                                </div>

                            </form>
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
