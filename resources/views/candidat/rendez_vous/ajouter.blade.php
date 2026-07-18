<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.candidat.menu', ['menuprincipaleactive' => 'rdv_candidat', 'menuactive' => ''])
        <div class="layout-page">
            @include('layouts.candidat.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('candidat.rdv.index') }}">Rendez-vous</a></li>
                            <li class="breadcrumb-item active">Nouvelle demande</li>
                        </ol>
                    </nav>

                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-7">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-header bg-white border-0 pt-4 pb-0">
                                    <h5 class="fw-bold mb-0">
                                        <i class="fa fa-calendar-plus-o me-2 text-primary"></i>
                                        Demander un rendez-vous
                                    </h5>
                                    <p class="text-muted small mt-1 mb-0">
                                        Votre instructeur recevra votre demande et pourra l'accepter ou la refuser.
                                    </p>
                                </div>
                                <div class="card-body pt-4">

                                    @if(Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                                            <i class="fa fa-exclamation-circle me-2"></i>{{ Session::get('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('candidat.rdv.store') }}" class="row g-3">
                                        @csrf

                                        {{-- Type --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Type de rendez-vous</label>
                                            <div class="d-flex gap-2 flex-wrap">
                                                @foreach(['Suivi', 'Séance', 'Consultation', 'Autre'] as $t)
                                                    <label class="type-btn" style="cursor:pointer;">
                                                        <input type="radio" name="type" value="{{ $t }}"
                                                               {{ $t === 'Suivi' ? 'checked' : '' }}
                                                               style="display:none;"
                                                               onchange="highlightType(this)">
                                                        <span class="badge {{ $t === 'Suivi' ? 'bg-primary' : 'bg-label-secondary' }} px-3 py-2"
                                                              style="font-size:0.85rem;">{{ $t }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- Date --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Date souhaitée <span class="text-danger">*</span></label>
                                            <input type="date" name="date" class="form-control"
                                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                                   required>
                                        </div>

                                        {{-- Heures --}}
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Heure début <span class="text-danger">*</span></label>
                                            <input type="time" name="heure_deb" class="form-control"
                                                   value="09:00" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Heure fin <span class="text-danger">*</span></label>
                                            <input type="time" name="heure_fin" class="form-control"
                                                   value="10:00" required>
                                        </div>

                                        {{-- Note --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">
                                                Note <small class="text-muted">(optionnel — précisez l'objet du RDV)</small>
                                            </label>
                                            <textarea name="note" class="form-control" rows="3"
                                                      placeholder="Ex: Je souhaite faire le point sur mes progrès des 2 dernières semaines..."></textarea>
                                        </div>

                                        {{-- Boutons --}}
                                        <div class="col-12 d-flex gap-2 justify-content-end mt-2">
                                            <a href="{{ route('candidat.rdv.index') }}" class="btn btn-outline-secondary">
                                                Annuler
                                            </a>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fa fa-paper-plane me-1"></i>Envoyer la demande
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
function highlightType(radio) {
    document.querySelectorAll('.type-btn span').forEach(s => {
        s.className = s.className.replace('bg-primary', 'bg-label-secondary');
    });
    radio.nextElementSibling.className = radio.nextElementSibling.className.replace('bg-label-secondary', 'bg-primary');
}

// Validation heure fin > heure début
document.querySelector('form').addEventListener('submit', function(e) {
    const deb = document.querySelector('[name=heure_deb]').value;
    const fin = document.querySelector('[name=heure_fin]').value;
    if (deb && fin && deb >= fin) {
        e.preventDefault();
        alert('L\'heure de fin doit être après l\'heure de début.');
    }
});
</script>
