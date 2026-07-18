<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('layouts.candidat.menu', ['menuprincipaleactive' => '', 'menuactive' => ''])

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
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Header avec upload photo --}}
                    <div class="d-flex align-items-center gap-4 mb-4">

                        {{-- Avatar cliquable --}}
                        <div style="position:relative;flex-shrink:0;">
                            <div id="avatar_wrapper"
                                 style="width:80px;height:80px;border-radius:50%;overflow:hidden;border:3px solid #6a0dad;cursor:pointer;"
                                 onclick="document.getElementById('photoInput').click()"
                                 title="Changer la photo">
                                @if(!empty($detail['photo']))
                                    <img id="avatar_img"
                                         src="https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/{{ $detail['photo'] }}"
                                         style="width:100%;height:100%;object-fit:cover;">
                                @else
                                    <div id="avatar_placeholder"
                                         style="width:100%;height:100%;background:linear-gradient(135deg,#6a0dad,#9b59b6);display:flex;align-items:center;justify-content:center;">
                                        <i class="fa fa-user fa-2x text-white"></i>
                                    </div>
                                @endif
                            </div>
                            {{-- Icône crayon --}}
                            <div style="position:absolute;bottom:0;right:0;width:26px;height:26px;background:#6a0dad;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;border:2px solid #fff;"
                                 onclick="document.getElementById('photoInput').click()">
                                <i class="fa fa-camera" style="color:#fff;font-size:11px;"></i>
                            </div>
                        </div>

                        {{-- Input file caché --}}
                        <input type="file" id="photoInput" accept="image/*" style="display:none"
                               onchange="uploadPhoto(this)">

                        <div>
                            <h4 class="mb-0 fw-bold">{{ $detail['nom'] ?? '' }} {{ $detail['prenom'] ?? '' }}</h4>
                            <small class="text-muted">{{ $cat ?? '' }} — {{ $salle_sport ?? '' }}</small>
                            <div id="photo_status" class="mt-1" style="display:none;font-size:0.8rem;"></div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('candidat.profile.update') }}">
                        @csrf

                        <input type="hidden" name="categ_candidat_id" value="{{ $detail['categ_candidat_id'] ?? '' }}">
                        <input type="hidden" name="salle_sport_id"    value="{{ $detail['salle_sport_id']    ?? '' }}">
                        <input type="hidden" name="instructeur_id"    value="{{ $detail['instructeur_id']    ?? '' }}">
                        <input type="hidden" name="mt_affiliation"    value="{{ $detail['mt_affiliation']    ?? '' }}">

                        <div class="row g-4">

                            {{-- Informations personnelles --}}
                            <div class="col-12 col-lg-6">
                                <div class="card border-0 shadow-sm h-100" style="border-radius:14px;">
                                    <div class="card-header bg-white border-0 pt-4 pb-0">
                                        <h5 class="fw-bold mb-0">
                                            <i class="fa fa-user me-2 text-primary"></i>Informations personnelles
                                        </h5>
                                    </div>
                                    <div class="card-body row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Nom</label>
                                            <input type="text" name="nom" class="form-control"
                                                   value="{{ $detail['nom'] ?? '' }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Prénom</label>
                                            <input type="text" name="prenom" class="form-control"
                                                   value="{{ $detail['prenom'] ?? '' }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                   value="{{ $detail['email'] ?? '' }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Téléphone principal</label>
                                            <input type="text" name="tel1" class="form-control"
                                                   value="{{ $detail['tel1'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Téléphone secondaire</label>
                                            <input type="text" name="tel2" class="form-control"
                                                   value="{{ $detail['tel2'] ?? '' }}">
                                        </div>
                                        <div class="col-md-8">
                                            <label class="form-label fw-semibold">Adresse</label>
                                            <input type="text" name="adr" class="form-control"
                                                   value="{{ $detail['adr'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-semibold">Code postal</label>
                                            <input type="text" name="cp" class="form-control"
                                                   value="{{ $detail['cp'] ?? '' }}">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- Sécurité --}}
                            <div class="col-12 col-lg-6">
                                <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                    <div class="card-header bg-white border-0 pt-4 pb-0">
                                        <h5 class="fw-bold mb-0">
                                            <i class="fa fa-lock me-2 text-warning"></i>Changer le mot de passe
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted small mb-3">
                                            Laissez vide si vous ne souhaitez pas changer votre mot de passe.
                                        </p>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Nouveau mot de passe</label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="pw"
                                                       class="form-control"
                                                       placeholder="Min. 8 caractères"
                                                       autocomplete="new-password">
                                                <button type="button" class="btn btn-outline-secondary"
                                                        onclick="togglePw('pw','eyePw')">
                                                    <i id="eyePw" class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label fw-semibold">Confirmer le mot de passe</label>
                                            <div class="input-group">
                                                <input type="password" name="password_confirmation" id="pw2"
                                                       class="form-control"
                                                       placeholder="Répéter le mot de passe"
                                                       autocomplete="new-password">
                                                <button type="button" class="btn btn-outline-secondary"
                                                        onclick="togglePw('pw2','eyePw2')">
                                                    <i id="eyePw2" class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Infos non modifiables --}}
                                <div class="card border-0 shadow-sm mt-4" style="border-radius:14px;">
                                    <div class="card-header bg-white border-0 pt-4 pb-0">
                                        <h5 class="fw-bold mb-0">
                                            <i class="fa fa-info-circle me-2 text-info"></i>Informations du compte
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless table-sm mb-0">
                                            <tr>
                                                <td class="text-muted ps-0">Catégorie</td>
                                                <td><span class="badge bg-label-primary">{{ $cat ?? '—' }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted ps-0">Salle de sport</td>
                                                <td class="fw-semibold">{{ $salle_sport ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted ps-0">Affiliation</td>
                                                <td>{{ $detail['mt_affiliation'] ?? '—' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Boutons --}}
                            <div class="col-12 d-flex gap-2 justify-content-end">
                                <a href="{{ route('candidat.home') }}" class="btn btn-outline-secondary">Annuler</a>
                                <button type="submit" class="btn btn-primary px-4" id="saveBtn"
                                        onclick="validateForm(event)">
                                    <i class="fa fa-save me-1"></i>Enregistrer les modifications
                                </button>
                            </div>

                        </div>
                    </form>

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
function uploadPhoto(input) {
    if (!input.files || !input.files[0]) return;

    const file     = input.files[0];
    const status   = document.getElementById('photo_status');
    const formData = new FormData();
    formData.append('photo', file);
    formData.append('_token', '{{ csrf_token() }}');

    status.style.display = 'block';
    status.innerHTML = '<span class="text-muted"><i class="fa fa-spinner fa-spin me-1"></i>Upload en cours...</span>';

    // Prévisualisation immédiate
    const reader = new FileReader();
    reader.onload = e => {
        const wrapper = document.getElementById('avatar_wrapper');
        const ph      = document.getElementById('avatar_placeholder');
        let img       = document.getElementById('avatar_img');
        if (!img) {
            img = document.createElement('img');
            img.id = 'avatar_img';
            img.style.cssText = 'width:100%;height:100%;object-fit:cover;';
            if (ph) ph.style.display = 'none';
            wrapper.appendChild(img);
        }
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);

    // Upload AJAX
    fetch('{{ route("candidat.profile.photo") }}', {
        method: 'POST',
        body:   formData,
    })
    .then(r => r.json())
    .then(data => {
        if (data.status) {
            status.innerHTML = '<span class="text-success"><i class="fa fa-check me-1"></i>Photo mise à jour !</span>';
            setTimeout(() => { status.style.display = 'none'; }, 3000);
        } else {
            status.innerHTML = '<span class="text-danger"><i class="fa fa-times me-1"></i>' + (data.message || 'Erreur') + '</span>';
        }
    })
    .catch(() => {
        status.innerHTML = '<span class="text-danger">Erreur réseau.</span>';
    });
}

function togglePw(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'fa fa-eye-slash';
    } else {
        input.type = 'password';
        icon.className = 'fa fa-eye';
    }
}

function validateForm(e) {
    const pw  = document.getElementById('pw').value;
    const pw2 = document.getElementById('pw2').value;
    if (pw && pw.length < 8) {
        e.preventDefault();
        alert('Le mot de passe doit contenir au minimum 8 caractères.');
        return;
    }
    if (pw && pw !== pw2) {
        e.preventDefault();
        alert('Les mots de passe ne correspondent pas.');
        return;
    }
}
</script>
