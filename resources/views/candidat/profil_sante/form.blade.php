<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.candidat.menu', ['menuprincipaleactive' => 'profil_sante_candidat', 'menuactive' => ''])
        <div class="layout-page">
            @include('layouts.candidat.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('candidat.profil_sante.index') }}">Profil santé</a></li>
                            <li class="breadcrumb-item active">{{ isset($detail) ? 'Modifier' : 'Nouveau suivi' }}</li>
                        </ol>
                    </nav>

                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-header bg-white border-0 pt-4 pb-0">
                                    <h5 class="fw-bold mb-0">
                                        <i class="fa fa-heartbeat me-2 text-danger"></i>
                                        {{ isset($detail) ? 'Modifier le suivi' : 'Nouveau suivi santé' }}
                                    </h5>
                                    <p class="text-muted small mt-1">L'IMC est calculé automatiquement à partir du poids et de la taille.</p>
                                </div>
                                <div class="card-body">
                                    <form method="POST"
                                          action="{{ isset($detail)
                                              ? route('candidat.profil_sante.update', $detail['id'])
                                              : route('candidat.profil_sante.store') }}"
                                          class="row g-3">
                                        @csrf

                                        {{-- Date --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Date du suivi <span class="text-danger">*</span></label>
                                            <input type="date" name="date_suivi" class="form-control"
                                                   value="{{ $detail['date_suivi'] ?? date('Y-m-d') }}" required>
                                        </div>

                                        {{-- Section indicateurs physiques --}}
                                        <div class="col-12">
                                            <h6 class="fw-semibold text-primary mb-3 border-bottom pb-2">
                                                <i class="fa fa-user me-1"></i>Indicateurs physiques
                                            </h6>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Poids (kg)</label>
                                            <input type="number" step="0.1" name="poids" class="form-control"
                                                   placeholder="ex: 72.5"
                                                   value="{{ $detail['poids'] ?? '' }}"
                                                   oninput="calcIMC()">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Taille (cm)</label>
                                            <input type="number" step="0.1" name="taille" class="form-control"
                                                   placeholder="ex: 170"
                                                   value="{{ $detail['taille'] ?? '' }}"
                                                   oninput="calcIMC()">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">IMC (calculé auto)</label>
                                            <div class="input-group">
                                                <input type="text" id="imc_display" class="form-control bg-light"
                                                       value="{{ $detail['imc'] ?? '' }}" readonly
                                                       placeholder="Auto">
                                                <span class="input-group-text" id="imc_label">—</span>
                                            </div>
                                        </div>

                                        {{-- Section indicateurs biologiques --}}
                                        <div class="col-12 mt-2">
                                            <h6 class="fw-semibold text-primary mb-3 border-bottom pb-2">
                                                <i class="fa fa-flask me-1"></i>Indicateurs biologiques
                                            </h6>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Glycémie (g/L)</label>
                                            <input type="number" step="0.01" name="glycemie" class="form-control"
                                                   placeholder="ex: 1.05"
                                                   value="{{ $detail['glycemie'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Tension artérielle</label>
                                            <input type="text" name="tension_arterielle" class="form-control"
                                                   placeholder="ex: 12/8"
                                                   value="{{ $detail['tension_arterielle'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Fréquence cardiaque (bpm)</label>
                                            <input type="number" name="frequence_cardiaque" class="form-control"
                                                   placeholder="ex: 72"
                                                   value="{{ $detail['frequence_cardiaque'] ?? '' }}">
                                        </div>

                                        {{-- Section bien-être --}}
                                        <div class="col-12 mt-2">
                                            <h6 class="fw-semibold text-primary mb-3 border-bottom pb-2">
                                                <i class="fa fa-smile-o me-1"></i>Bien-être & progression
                                            </h6>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                Niveau de stress (/10)
                                                <span id="stress_val" class="badge bg-label-warning ms-1">{{ $detail['niveau_stress'] ?? 5 }}</span>
                                            </label>
                                            <input type="range" name="niveau_stress" class="form-range"
                                                   min="0" max="10" step="1"
                                                   value="{{ $detail['niveau_stress'] ?? 5 }}"
                                                   oninput="document.getElementById('stress_val').textContent = this.value">
                                            <div class="d-flex justify-content-between small text-muted">
                                                <span>😌 Aucun</span><span>😰 Extrême</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Objectifs personnels</label>
                                            <textarea name="objectifs" class="form-control" rows="3"
                                                      placeholder="Ex: Perdre 5 kg, courir 5 km...">{{ $detail['objectifs'] ?? '' }}</textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Progression physique</label>
                                            <textarea name="progression" class="form-control" rows="3"
                                                      placeholder="Ex: J'arrive à faire 20 pompes sans m'arrêter...">{{ $detail['progression'] ?? '' }}</textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Notes & observations</label>
                                            <textarea name="notes" class="form-control" rows="3"
                                                      placeholder="Ex: Je me sens plus énergique cette semaine...">{{ $detail['notes'] ?? '' }}</textarea>
                                        </div>

                                        {{-- Boutons --}}
                                        <div class="col-12 d-flex gap-2 justify-content-end mt-2">
                                            <a href="{{ route('candidat.profil_sante.index') }}"
                                               class="btn btn-outline-secondary">Annuler</a>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fa fa-save me-1"></i>Enregistrer
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
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

<script>
function calcIMC() {
    const poids  = parseFloat(document.querySelector('[name=poids]').value);
    const taille = parseFloat(document.querySelector('[name=taille]').value);
    const display = document.getElementById('imc_display');
    const label   = document.getElementById('imc_label');

    if (poids > 0 && taille > 0) {
        const tailleM = taille / 100;
        const imc     = (poids / (tailleM * tailleM)).toFixed(1);
        display.value = imc;

        if (imc < 18.5)      { label.textContent = 'Maigreur';    label.className = 'input-group-text text-info'; }
        else if (imc < 25)   { label.textContent = 'Normal';      label.className = 'input-group-text text-success'; }
        else if (imc < 30)   { label.textContent = 'Surpoids';    label.className = 'input-group-text text-warning'; }
        else                  { label.textContent = 'Obésité';     label.className = 'input-group-text text-danger'; }
    } else {
        display.value = '';
        label.textContent = '—';
        label.className = 'input-group-text';
    }
}

// Init si valeurs existantes
window.addEventListener('DOMContentLoaded', calcIMC);
</script>
