<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('layouts.candidat.menu', ['menuprincipaleactive' => 'programmes_candidat', 'menuactive' => ''])

        <div class="layout-page">
            @include('layouts.candidat.navbar')

            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    {{-- Breadcrumb --}}
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('candidat.programmes.index') }}">Mes programmes</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $detail['titre'] ?? '' }}</li>
                        </ol>
                    </nav>

                    <div class="row g-4">

                        {{-- ============================================ --}}
                        {{-- Colonne principale                           --}}
                        {{-- ============================================ --}}
                        <div class="col-12 col-lg-8">

                            {{-- Photo cover --}}
                            @if(!empty($detail['photo_url']))
                                <div style="border-radius:14px;overflow:hidden;margin-bottom:1.5rem;max-height:320px;">
                                    <img src="{{ $detail['photo_url'] }}"
                                         alt="{{ $detail['titre'] }}"
                                         style="width:100%;object-fit:cover;max-height:320px;">
                                </div>
                            @endif

                            {{-- Titre + description --}}
                            <div class="card border-0 shadow-sm mb-4" style="border-radius:14px;">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-2">{{ $detail['titre'] }}</h4>
                                    @if(!empty($detail['description']))
                                        <p class="text-muted mb-0">{{ $detail['description'] }}</p>
                                    @endif
                                </div>
                            </div>

                            {{-- ======================================== --}}
                            {{-- Vidéos                                   --}}
                            {{-- ======================================== --}}
                            @if(count($videos) > 0)
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-header bg-white border-0 pt-4 pb-2">
                                    <h5 class="fw-bold mb-0">
                                        <i class="fa fa-play-circle me-2 text-primary"></i>
                                        Vidéos du programme
                                        <span class="badge bg-label-primary ms-2">{{ count($videos) }}</span>
                                    </h5>
                                </div>
                                <div class="card-body p-4">

                                    {{-- Lecteur principal --}}
                                    <div id="main_player_wrapper" class="mb-4" style="border-radius:10px;overflow:hidden;background:#000;">
                                        <video id="main_player" controls
                                               style="width:100%;max-height:400px;display:block;"
                                               preload="metadata">
                                            <source id="main_source"
                                                    src="{{ $videos[0]['url'] }}"
                                                    type="video/mp4">
                                            Votre navigateur ne supporte pas la vidéo.
                                        </video>
                                    </div>
                                    <p id="main_player_title" class="fw-semibold mb-3">
                                        <i class="fa fa-film me-1 text-primary"></i>
                                        {{ $videos[0]['lib'] ?? 'Vidéo 1' }}
                                    </p>

                                    {{-- Playlist --}}
                                    @if(count($videos) > 1)
                                    <div class="row g-2">
                                        @foreach($videos as $i => $video)
                                        <div class="col-12 col-sm-6">
                                            <div class="d-flex align-items-center gap-3 p-2 rounded playlist-item {{ $i === 0 ? 'bg-label-primary' : 'bg-light' }}"
                                                 style="cursor:pointer;border-radius:8px !important;"
                                                 onclick="playVideo('{{ $video['url'] }}', '{{ addslashes($video['lib'] ?? 'Vidéo '.($i+1)) }}', this)">
                                                <div style="width:50px;height:50px;background:#6a0dad22;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                                    <i class="fa fa-play text-primary"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold small">{{ $video['lib'] ?? 'Vidéo '.($i+1) }}</div>
                                                    <small class="text-muted">Vidéo {{ $i + 1 }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif

                                </div>
                            </div>
                            @else
                            <div class="card border-0 shadow-sm" style="border-radius:14px;">
                                <div class="card-body text-center py-4">
                                    <i class="fa fa-video-camera fa-2x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">Aucune vidéo disponible pour ce programme.</p>
                                </div>
                            </div>
                            @endif

                        </div>

                        {{-- ============================================ --}}
                        {{-- Colonne info                                 --}}
                        {{-- ============================================ --}}
                        <div class="col-12 col-lg-4">
                            <div class="card border-0 shadow-sm" style="border-radius:14px;position:sticky;top:80px;">
                                <div class="card-body p-4">
                                    <h6 class="fw-bold mb-3 text-primary">
                                        <i class="fa fa-info-circle me-1"></i>Détails du programme
                                    </h6>

                                    <table class="table table-borderless table-sm mb-0">
                                        @if(!empty($detail['duree_semaines']))
                                        <tr>
                                            <td class="text-muted ps-0"><i class="fa fa-clock-o me-1"></i>Durée</td>
                                            <td class="fw-semibold text-end">{{ $detail['duree_semaines'] }} semaine(s)</td>
                                        </tr>
                                        @endif
                                        @if(!empty($detail['niveau']))
                                        <tr>
                                            <td class="text-muted ps-0"><i class="fa fa-signal me-1"></i>Niveau</td>
                                            <td class="fw-semibold text-end">
                                                <span class="badge bg-label-primary">{{ $detail['niveau'] }}</span>
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td class="text-muted ps-0"><i class="fa fa-film me-1"></i>Vidéos</td>
                                            <td class="fw-semibold text-end">{{ count($videos) }}</td>
                                        </tr>
                                    </table>

                                    <hr>

                                    <a href="{{ route('candidat.programmes.index') }}"
                                       class="btn btn-outline-secondary w-100">
                                        <i class="fa fa-arrow-left me-1"></i>Retour à mes programmes
                                    </a>
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
function playVideo(url, title, el) {
    // Changer la source du lecteur principal
    const player = document.getElementById('main_player');
    const source  = document.getElementById('main_source');
    source.src = url;
    player.load();
    player.play();

    // Mettre à jour le titre
    document.getElementById('main_player_title').innerHTML =
        '<i class="fa fa-film me-1 text-primary"></i>' + title;

    // Highlight playlist
    document.querySelectorAll('.playlist-item').forEach(item => {
        item.classList.remove('bg-label-primary');
        item.classList.add('bg-light');
    });
    el.classList.remove('bg-light');
    el.classList.add('bg-label-primary');
}
</script>
