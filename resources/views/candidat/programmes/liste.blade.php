<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('layouts.candidat.menu', ['menuprincipaleactive' => 'programmes_candidat', 'menuactive' => ''])

        <div class="layout-page">
            @include('layouts.candidat.navbar')

            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 fw-bold">
                            <i class="fa fa-th-large me-2 text-primary"></i>Mes programmes
                        </h4>
                        <span class="badge bg-label-primary">{{ count($liste) }} programme(s)</span>
                    </div>

                    @if(count($liste) > 0)
                        <div class="row g-4">
                            @foreach($liste as $prog)
                            @php
                                $statut     = $prog['statut'] ?? 'en_cours';
                                $badgeClass = match($statut) {
                                    'en_cours' => 'bg-success',
                                    'termine'  => 'bg-secondary',
                                    'pause'    => 'bg-warning',
                                    default    => 'bg-label-primary',
                                };
                                $badgeLabel = match($statut) {
                                    'en_cours' => '▶ En cours',
                                    'termine'  => '✓ Terminé',
                                    'pause'    => '⏸ En pause',
                                    default    => $statut,
                                };
                            @endphp
                            <div class="col-12 col-sm-6 col-lg-4">
                                <a href="{{ route('candidat.programmes.show', $prog['programme_id']) }}"
                                   style="text-decoration:none;color:inherit;">
                                <div class="card h-100 border-0 shadow-sm" style="border-radius:14px;overflow:hidden;transition:transform 0.2s,box-shadow 0.2s;cursor:pointer;"
                                     onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 25px rgba(106,13,173,0.15)'"
                                     onmouseout="this.style.transform='';this.style.boxShadow=''">

                                    {{-- Photo --}}
                                    @if(!empty($prog['photo_url']))
                                        <div style="position:relative;height:180px;overflow:hidden;">
                                            <img src="{{ $prog['photo_url'] }}"
                                                 alt="{{ $prog['titre'] }}"
                                                 style="width:100%;height:100%;object-fit:cover;">
                                            <span class="badge {{ $badgeClass }} position-absolute"
                                                  style="bottom:10px;left:10px;font-size:0.75rem;">
                                                {{ $badgeLabel }}
                                            </span>
                                        </div>
                                    @else
                                        <div style="height:120px;background:linear-gradient(135deg,#6a0dad22,#6a0dad55);display:flex;align-items:center;justify-content:center;position:relative;">
                                            <i class="fa fa-th-large fa-3x" style="color:#6a0dad;opacity:0.4;"></i>
                                            <span class="badge {{ $badgeClass }} position-absolute"
                                                  style="bottom:10px;left:10px;">{{ $badgeLabel }}</span>
                                        </div>
                                    @endif

                                    <div class="card-body p-3">
                                        <h6 class="fw-bold mb-2">{{ $prog['titre'] }}</h6>

                                        @if(!empty($prog['duree_semaines']))
                                            <p class="text-muted small mb-1">
                                                <i class="fa fa-clock-o me-1"></i>
                                                Durée : {{ $prog['duree_semaines'] }} semaine(s)
                                            </p>
                                        @endif

                                        @if(!empty($prog['niveau']))
                                            <p class="text-muted small mb-1">
                                                <i class="fa fa-signal me-1"></i>
                                                Niveau : {{ $prog['niveau'] }}
                                            </p>
                                        @endif

                                        @if(!empty($prog['date_debut']))
                                            <p class="text-muted small mb-2">
                                                <i class="fa fa-calendar me-1"></i>
                                                Début : {{ \Carbon\Carbon::parse($prog['date_debut'])->format('d/m/Y') }}
                                            </p>
                                        @endif

                                        @if(!empty($prog['description']))
                                            <p class="text-muted small mb-0"
                                               style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                {{ $prog['description'] }}
                                            </p>
                                        @endif
                                    </div>

                                </div>
                                </a>
                            </div>
                            @endforeach
                        </div>

                    @else
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <div style="width:80px;height:80px;background:#f0e6ff;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                                    <i class="fa fa-th-large fa-2x" style="color:#6a0dad;"></i>
                                </div>
                                <h5 class="mb-2">Aucun programme assigné</h5>
                                <p class="text-muted">Votre instructeur n'a pas encore assigné de programme à votre profil.</p>
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
