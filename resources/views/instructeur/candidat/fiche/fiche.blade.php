<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu', ['menuprincipaleactive' => 'candidats', 'menuactive' => 'candidats'])
        <div class="layout-page">
            @include('layouts.instructeur.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    {{-- Breadcrumb --}}
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('instructeur.candidat.index') }}">Clients</a>
                                </li>
                                <li class="breadcrumb-item active">{{ $detail['nom'] ?? '' }} {{ $detail['prenom'] ?? '' }}</li>
                            </ol>
                        </nav>
                        <div class="d-flex gap-2">
                            <a href="{{ route('instructeur.candidat.edit', $detail['id']) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-pencil me-1"></i>Modifier
                            </a>
                            <a href="{{ route('instructeur.candidat.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fa fa-arrow-left me-1"></i>Retour
                            </a>
                        </div>
                    </div>

                    {{-- Header profil --}}
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-4 flex-wrap">
                                {{-- Avatar --}}
                                @php
                                    $candidatPhoto = !empty($detail['photo'])
                                        ? 'https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/' . $detail['photo']
                                        : 'https://cdn-icons-png.flaticon.com/512/1672/1672286.png';
                                @endphp
                                <img src="{{ $candidatPhoto }}"
                                     style="width:80px;height:80px;border-radius:50%;object-fit:cover;object-position:center;border:3px solid #6a0dad;"
                                     onerror="this.src='https://cdn-icons-png.flaticon.com/512/1672/1672286.png'">

                                {{-- Infos principales --}}
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <h4 class="mb-0">{{ $detail['nom'] ?? '' }} {{ $detail['prenom'] ?? '' }}</h4>
                                        <span class="badge bg-success">Actif</span>
                                    </div>
                                    <div class="d-flex gap-3 flex-wrap text-muted small">
                                        @if(!empty($detail['tel1']))
                                            <span><i class="fa fa-phone me-1"></i>{{ $detail['tel1'] }}</span>
                                        @endif
                                        @if(!empty($detail['email']))
                                            <span><i class="fa fa-envelope me-1"></i>{{ $detail['email'] }}</span>
                                        @endif
                                        @if(!empty($detail['adr']))
                                            <span><i class="fa fa-map-marker me-1"></i>{{ $detail['adr'] }}</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Stats rapides --}}
                                <div class="d-flex gap-4 text-center flex-wrap">
                                    <div>
                                        <div class="fw-semibold">{{ $cat ?? '—' }}</div>
                                        <small class="text-muted">Catégorie</small>
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $salle_sport ?? '—' }}</div>
                                        <small class="text-muted">Salle</small>
                                    </div>
                                    @if(!empty($detail['mt_affiliation']))
                                    <div>
                                        <div class="fw-semibold">{{ $detail['mt_affiliation'] }}</div>
                                        <small class="text-muted">Affiliation</small>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Onglets --}}
                    @include('instructeur.candidat._tabs', ['active' => 'infos', 'candidat_id' => $detail['id']])


                            <div class="row g-4">

                                {{-- Informations générales --}}
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h6 class="mb-0"><i class="fa fa-user me-2 text-primary"></i>Informations générales</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-sm table-borderless mb-0">
                                                <tr>
                                                    <td class="text-muted" style="width:45%">Nom</td>
                                                    <td class="fw-semibold">{{ $detail['nom'] ?? '—' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Prénom</td>
                                                    <td class="fw-semibold">{{ $detail['prenom'] ?? '—' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Téléphone</td>
                                                    <td>{{ $detail['tel1'] ?? '—' }}</td>
                                                </tr>
                                                @if(!empty($detail['tel2']))
                                                <tr>
                                                    <td class="text-muted">Tél. 2</td>
                                                    <td>{{ $detail['tel2'] }}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td class="text-muted">Email</td>
                                                    <td>{{ $detail['email'] ?? '—' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Adresse</td>
                                                    <td>{{ $detail['adr'] ?? '—' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Code postal</td>
                                                    <td>{{ $detail['cp'] ?? '—' }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                {{-- Informations sportives --}}
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h6 class="mb-0"><i class="fa fa-heartbeat me-2 text-danger"></i>Informations sportives</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-sm table-borderless mb-0">
                                                <tr>
                                                    <td class="text-muted" style="width:45%">Catégorie</td>
                                                    <td>
                                                        @if($cat)
                                                            <span class="badge bg-label-primary">{{ $cat }}</span>
                                                        @else
                                                            <span class="text-muted">—</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Salle de sport</td>
                                                    <td class="fw-semibold">{{ $salle_sport ?? '—' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Instructeur</td>
                                                    <td>{{ $instructeur ?? '—' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Montant affiliation</td>
                                                    <td>{{ $detail['mt_affiliation'] ?? '—' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Membre depuis</td>
                                                    <td>{{ !empty($detail['created_at']) ? \Carbon\Carbon::parse($detail['created_at'])->format('d/m/Y') : '—' }}</td>
                                                </tr>
                                            </table>
                                        </div>
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
