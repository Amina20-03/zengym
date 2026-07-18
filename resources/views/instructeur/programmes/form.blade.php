<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu', ['menuprincipaleactive' => 'programmes', 'menuactive' => 'liste_programmes'])
        <div class="layout-page">
            @include('layouts.instructeur.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    {{-- Breadcrumb --}}
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('instructeur.programmes.index') }}">Programmes</a></li>
                            <li class="breadcrumb-item active">{{ isset($detail) ? 'Modifier' : 'Nouveau programme' }}</li>
                        </ol>
                    </nav>

                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-white border-0 pt-4 pb-0">
                                    <h5 class="fw-bold mb-0">
                                        <i class="fa fa-th-large me-2 text-primary"></i>
                                        {{ isset($detail) ? 'Modifier le programme' : 'Nouveau programme' }}
                                    </h5>
                                </div>
                                <div class="card-body pt-3">
                                    <form method="POST"
                                          action="{{ isset($detail)
                                              ? route('instructeur.programmes.update', $detail['id'])
                                              : route('instructeur.programmes.store') }}"
                                          enctype="multipart/form-data"
                                          class="row g-4">
                                        @csrf

                                        {{-- Photo --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">
                                                Photo du programme
                                                <small class="text-muted">(JPG, PNG, WebP — max 5 Mo)</small>
                                            </label>
                                            @if(isset($detail) && !empty($detail['photo_url']))
                                                <div class="mb-2">
                                                    <img src="{{ $detail['photo_url'] }}"
                                                         id="photoPreview"
                                                         style="height:160px;width:100%;object-fit:cover;border-radius:10px;">
                                                </div>
                                            @else
                                                <img id="photoPreview" src="" style="display:none;height:160px;width:100%;object-fit:cover;border-radius:10px;margin-bottom:8px;">
                                            @endif
                                            <input type="file" name="photo" class="form-control" accept="image/*"
                                                   onchange="previewPhoto(this)">
                                        </div>

                                        {{-- Titre --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Titre du programme <span class="text-danger">*</span></label>
                                            <input type="text" name="titre" class="form-control form-control-lg"
                                                   placeholder="ex: Perte de poids"
                                                   value="{{ $detail['titre'] ?? '' }}" required>
                                        </div>

                                        {{-- Description --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Description</label>
                                            <textarea name="description" class="form-control" rows="4"
                                                      placeholder="Décrivez le programme, ses objectifs, son contenu...">{{ $detail['description'] ?? '' }}</textarea>
                                        </div>

                                        {{-- Durée & Niveau --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Durée (semaines)</label>
                                            <input type="number" name="duree_semaines" class="form-control"
                                                   min="1" max="52" placeholder="ex: 12"
                                                   value="{{ $detail['duree_semaines'] ?? '' }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Niveau</label>
                                            <select name="niveau" class="form-select">
                                                <option value="">— Sélectionner —</option>
                                                @foreach(['Débutant','Intermédiaire','Avancé','Tous niveaux'] as $n)
                                                    <option value="{{ $n }}"
                                                        {{ ($detail['niveau'] ?? '') === $n ? 'selected' : '' }}>
                                                        {{ $n }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @if(isset($detail))
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Visibilité</label>
                                            <select name="actif" class="form-select">
                                                <option value="1" {{ ($detail['actif'] ?? true) ? 'selected' : '' }}>Actif</option>
                                                <option value="0" {{ !($detail['actif'] ?? true) ? 'selected' : '' }}>Inactif</option>
                                            </select>
                                        </div>
                                        @endif

                                        {{-- Vidéos --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">
                                                <i class="fa fa-video-camera me-1"></i>Vidéos du programme
                                                <small class="text-muted">(MP4, MOV — max 50 Mo chacune)</small>
                                            </label>

                                            {{-- Vidéos existantes (mode modifier) --}}
                                            @if(isset($videos) && count($videos) > 0)
                                                <div class="row g-2 mb-3">
                                                    @foreach($videos as $video)
                                                    <div class="col-12 col-md-6">
                                                        <div class="card border p-2 d-flex flex-row align-items-center gap-2">
                                                            <i class="fa fa-film fa-lg text-primary"></i>
                                                            <div class="flex-grow-1 text-truncate small">{{ $video['lib'] ?? 'Vidéo' }}</div>
                                                            <a href="{{ route('instructeur.programmes.video.delete', $video['id']) }}"
                                                               class="btn btn-sm btn-outline-danger py-0 px-1"
                                                               onclick="return confirm('Supprimer cette vidéo ?')">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            @endif

                                            {{-- Upload nouvelles vidéos --}}
                                            <input type="file" name="videos[]" class="form-control"
                                                   accept="video/*" multiple
                                                   onchange="previewVideos(this)">
                                            <div id="videos_preview" class="mt-2 d-flex flex-wrap gap-2"></div>
                                        </div>

                                        {{-- Boutons --}}
                                        <div class="col-12 d-flex gap-2 justify-content-end">
                                            <a href="{{ route('instructeur.programmes.index') }}"
                                               class="btn btn-outline-secondary">Annuler</a>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fa fa-save me-1"></i>
                                                {{ isset($detail) ? 'Enregistrer' : 'Créer le programme' }}
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
function previewPhoto(input) {
    const preview = document.getElementById('photoPreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
function previewVideos(input) {
    const container = document.getElementById('videos_preview');
    container.innerHTML = '';
    if (input.files) {
        Array.from(input.files).forEach(file => {
            const div = document.createElement('div');
            div.className = 'd-flex align-items-center gap-1 border rounded px-2 py-1 small';
            div.innerHTML = '<i class="fa fa-film text-primary"></i> ' + file.name;
            container.appendChild(div);
        });
    }
}
</script>
