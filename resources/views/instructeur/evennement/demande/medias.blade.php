<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu', ['menuprincipaleactive' => 'evenements', 'menuactive' => 'mes_demandes'])
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

                    {{-- Header --}}
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-0">
                                <i class="fa fa-photo me-2 text-primary"></i>
                                Médias — {{ $detail['titre'] ?? $detail['code'] ?? 'Événement' }}
                            </h4>
                            <small class="text-muted">
                                {{ $detail['date_deb'] ?? '' }} | {{ $detail['heure_deb'] ?? '' }} → {{ $detail['heure_fin'] ?? '' }}
                            </small>
                        </div>
                        <a href="{{ route('instructeur.evennement.mes_demandes') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left me-1"></i>Retour
                        </a>
                    </div>

                    <div class="row g-4">

                        {{-- ================================================ --}}
                        {{-- PHOTOS                                            --}}
                        {{-- ================================================ --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><i class="fa fa-image me-2"></i>Galerie photos</h5>
                                    <span class="badge bg-label-primary">{{ count($detail_photos) }} photo(s)</span>
                                </div>
                                <div class="card-body">

                                    {{-- Upload photos --}}
                                    <form method="POST"
                                          action="{{ route('instructeur.evennement.photos.add', $event_id) }}"
                                          enctype="multipart/form-data"
                                          class="mb-4">
                                        @csrf
                                        <div class="row g-2 align-items-end">
                                            <div class="col-md-8">
                                                <label class="form-label fw-semibold">
                                                    Ajouter des photos
                                                    <small class="text-muted">(JPG, PNG, WebP — max 10 Mo chacune)</small>
                                                </label>
                                                <input type="file" name="gallerie[]" class="form-control"
                                                       accept="image/*" multiple
                                                       onchange="previewPhotos(this)">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary w-100">
                                                    <i class="fa fa-upload me-1"></i>Uploader
                                                </button>
                                            </div>
                                        </div>
                                        {{-- Prévisualisation --}}
                                        <div id="photos_preview" class="d-flex flex-wrap gap-2 mt-3"></div>
                                    </form>

                                    {{-- Galerie existante --}}
                                    @if(count($detail_photos) > 0)
                                        <div class="row g-3">
                                            @foreach($detail_photos as $photo)
                                                @php
                                                    $photo_url = null;
                                                    if (!empty($photo['photo_url'])) {
                                                        $photo_url = $photo['photo_url'];
                                                    } elseif (!empty($photo['photo']) && strlen($photo['photo']) < 500) {
                                                        $photo_url = 'https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/' . $photo['photo'];
                                                    }
                                                @endphp
                                                @if($photo_url)
                                                <div class="col-6 col-md-3 col-lg-2">
                                                    <div class="position-relative" style="border-radius:8px;overflow:hidden;">
                                                        <img src="{{ $photo_url }}"
                                                             style="width:100%;height:120px;object-fit:cover;cursor:pointer"
                                                             onclick="$('#lightbox_img').attr('src','{{ $photo_url }}');$('#lightboxModal').modal('show')">
                                                        <a href="{{ route('instructeur.evennement.photos.delete', $photo['id']) }}"
                                                           class="btn btn-sm btn-danger position-absolute"
                                                           style="top:4px;right:4px;padding:2px 6px;"
                                                           onclick="return confirm('Supprimer cette photo ?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted text-center py-3">
                                            <i class="fa fa-image fa-2x mb-2 d-block"></i>
                                            Aucune photo. Uploadez votre première photo.
                                        </p>
                                    @endif

                                </div>
                            </div>
                        </div>

                        {{-- ================================================ --}}
                        {{-- VIDÉOS                                            --}}
                        {{-- ================================================ --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><i class="fa fa-video-camera me-2"></i>Vidéos</h5>
                                    <span class="badge bg-label-primary">{{ count($detail_videos) }} vidéo(s)</span>
                                </div>
                                <div class="card-body">

                                    {{-- Upload vidéos --}}
                                    <form method="POST"
                                          action="{{ route('instructeur.evennement.videos.add', $event_id) }}"
                                          enctype="multipart/form-data"
                                          class="mb-4">
                                        @csrf
                                        <div class="row g-2 align-items-end">
                                            <div class="col-md-8">
                                                <label class="form-label fw-semibold">
                                                    Ajouter des vidéos
                                                    <small class="text-muted">(MP4, MOV, AVI — max 50 Mo chacune)</small>
                                                </label>
                                                <input type="file" name="videos[]" class="form-control"
                                                       accept="video/*" multiple>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary w-100">
                                                    <i class="fa fa-upload me-1"></i>Uploader
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    {{-- Vidéos existantes --}}
                                    @if(count($detail_videos) > 0)
                                        <div class="row g-3">
                                            @foreach($detail_videos as $video)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="card border">
                                                    @if(!empty($video['path']))
                                                        <video controls
                                                               style="width:100%;max-height:200px;background:#000;border-radius:6px 6px 0 0;"
                                                               preload="metadata">
                                                            <source src="https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/{{ $video['path'] }}"
                                                                    type="video/mp4">
                                                            Votre navigateur ne supporte pas la vidéo.
                                                        </video>
                                                    @endif
                                                    <div class="card-body p-2 d-flex justify-content-between align-items-center">
                                                        <small class="text-muted">{{ $video['lib'] ?? 'Vidéo' }}</small>
                                                        <a href="{{ route('instructeur.evennement.videos.delete', $video['id']) }}"
                                                           class="btn btn-sm btn-outline-danger"
                                                           onclick="return confirm('Supprimer cette vidéo ?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted text-center py-3">
                                            <i class="fa fa-video-camera fa-2x mb-2 d-block"></i>
                                            Aucune vidéo. Uploadez votre première vidéo.
                                        </p>
                                    @endif

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

{{-- Lightbox photos --}}
<div class="modal fade" id="lightboxModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark border-0">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center pt-0">
                <img id="lightbox_img" src="" style="max-width:100%;max-height:80vh;border-radius:6px;">
            </div>
        </div>
    </div>
</div>

<script>
function previewPhotos(input) {
    const container = document.getElementById('photos_preview');
    container.innerHTML = '';
    if (input.files) {
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.cssText = 'width:80px;height:80px;object-fit:cover;border-radius:6px;border:2px solid #6a0dad';
                container.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
}
</script>
