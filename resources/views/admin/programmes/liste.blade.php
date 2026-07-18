<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu', ['menuprincipaleactive' => 'programmes', 'menuactive' => 'liste_programmes'])
        <div class="layout-page">
            @include('layouts.admin.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Header --}}
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 fw-bold">Programmes</h4>
                        <a href="{{ route('admin.programmes.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-1"></i>Nouveau programme
                        </a>
                    </div>

                    @if(count($liste) > 0)
                        <div class="row g-4">
                            @foreach($liste as $prog)
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card h-100 border-0 shadow-sm" style="border-radius:12px;overflow:hidden;">

                                    {{-- Photo --}}
                                    @if(!empty($prog['photo_url']))
                                        <div style="position:relative;height:180px;overflow:hidden;">
                                            <img src="{{ $prog['photo_url'] }}"
                                                 alt="{{ $prog['titre'] }}"
                                                 style="width:100%;height:100%;object-fit:cover;transition:transform 0.3s;"
                                                 onmouseover="this.style.transform='scale(1.05)'"
                                                 onmouseout="this.style.transform='scale(1)'">
                                            {{-- Badge actif/inactif --}}
                                            @if(!($prog['actif'] ?? true))
                                                <span class="badge bg-secondary position-absolute" style="top:10px;right:10px;">Inactif</span>
                                            @endif
                                        </div>
                                    @else
                                        <div style="height:180px;background:linear-gradient(135deg,#6a0dad22,#6a0dad44);display:flex;align-items:center;justify-content:center;">
                                            <i class="fa fa-th-large fa-3x" style="color:#6a0dad;opacity:0.4;"></i>
                                        </div>
                                    @endif

                                    {{-- Contenu --}}
                                    <div class="card-body p-3">
                                        <h6 class="fw-bold mb-2">{{ $prog['titre'] }}</h6>

                                        @if(!empty($prog['duree_semaines']))
                                            <p class="text-muted small mb-1">
                                                <i class="fa fa-clock-o me-1"></i>
                                                Durée: {{ $prog['duree_semaines'] }} semaine{{ $prog['duree_semaines'] > 1 ? 's' : '' }}
                                            </p>
                                        @endif

                                        @if(!empty($prog['niveau']))
                                            <p class="text-muted small mb-2">
                                                <i class="fa fa-signal me-1"></i>
                                                Niveau: {{ $prog['niveau'] }}
                                            </p>
                                        @endif

                                        @if(!empty($prog['description']))
                                            <p class="text-muted small mb-3"
                                               style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                {{ $prog['description'] }}
                                            </p>
                                        @endif

                                        {{-- Actions --}}
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.programmes.edit', $prog['id']) }}"
                                               class="btn btn-sm btn-outline-primary flex-grow-1">
                                                <i class="fa fa-pencil me-1"></i>Modifier
                                            </a>
                                          <a href="#" class="btn btn-sm btn-outline-danger"
   onclick="call_delete_modal({{ $prog['id'] }})"
   data-bs-toggle="modal" data-bs-target="#onboardImageModal">
    <i class="fa fa-trash"></i>
</a>
</a>
                                        </div>
                                        <form method="POST" action="{{ route('admin.programmes.delete') }}" class="add-new-user pt-0">
    @csrf
    @include('layouts.delete_modal')
</form>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>

                    @else
                        {{-- État vide --}}
                        <div class="text-center py-5">
                            <div style="width:80px;height:80px;background:#f0e6ff;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                                <i class="fa fa-th-large fa-2x" style="color:#6a0dad;"></i>
                            </div>
                            <h5 class="mb-2">Aucun programme créé</h5>
                            <p class="text-muted mb-4">Créez votre premier programme d'entraînement.</p>
                            <a href="{{ route('admin.programmes.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i>Nouveau programme
                            </a>
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
