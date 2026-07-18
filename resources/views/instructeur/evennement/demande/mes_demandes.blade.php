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

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Mes demandes d'événements</h5>
                            <div class="d-flex gap-2 align-items-center">
                                <span class="badge bg-label-primary me-1">{{ count($liste) }} demande(s)</span>
                                <span><span style="display:inline-block;width:12px;height:12px;background:#f59e0b;border-radius:2px"></span> En attente</span>
                                <span><span style="display:inline-block;width:12px;height:12px;background:#28a745;border-radius:2px"></span> Acceptée</span>
                                <span><span style="display:inline-block;width:12px;height:12px;background:#dc3545;border-radius:2px"></span> Refusée</span>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive">
                            <table class="datatables-users table" id="table_mes_demandes">
                                <thead class="border-top">
                                    <tr>
                                        <th>Affiche</th>
                                        <th>Code</th>
                                        <th>Titre</th>
                                        <th>Type</th>
                                        <th>Date début</th>
                                        <th>Heures</th>
                                        <th>Frais</th>
                                        <th>Statut</th>
                                        <th>Envoyée le</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($liste as $elem)
                                        @php
                                            $approuver = $elem['approuver'] ?? null;
                                            $refuser   = $elem['refuser']   ?? null;
                                            $isEnAttente = $approuver === null && !$refuser;
                                            $isAccepte   = $approuver === true || $approuver == 1;
                                            $isRefuse    = $refuser === true   || $refuser == 1;
                                            $rowClass    = $isAccepte ? 'table-success' : ($isRefuse ? 'table-danger' : 'table-warning');
                                        @endphp
                                        <tr class="{{ $rowClass }}" style="opacity:0.85">
                                            <td>
                                                @if(!empty($elem['affiche_url']))
                                                    <img src="{{ $elem['affiche_url'] }}"
                                                         style="width:45px;height:45px;object-fit:cover;border-radius:4px;cursor:pointer"
                                                         data-bs-toggle="modal" data-bs-target="#afficheModal"
                                                         onclick="$('#modal_affiche_img').attr('src','{{ $elem['affiche_url'] }}')">
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td><span class="fw-semibold">{{ $elem['code'] }}</span></td>
                                            <td>{{ $elem['titre'] ?? $elem['desc'] ?? '' }}</td>
                                            <td><span class="badge bg-label-primary">{{ $elem['type_even_desc'] ?? '' }}</span></td>
                                            <td>{{ $elem['date_deb'] }}</td>
                                            <td>{{ $elem['heure_deb'] }} → {{ $elem['heure_fin'] }}</td>
                                            <td>{{ $elem['frais'] ?? 0 }} {{ $elem['devise'] ?? 'DT' }}</td>
                                            <td>
                                                @if($isAccepte)
                                                    <span class="badge bg-success">✓ Acceptée</span>
                                                @elseif($isRefuse)
                                                    <span class="badge bg-danger">✗ Refusée</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">⏳ En attente</span>
                                                @endif
                                            </td>
                                            <td><small>{{ \Carbon\Carbon::parse($elem['created_at'])->format('d/m/Y') }}</small></td>
                                            <td>
                                                @if($isEnAttente)
                                                    {{-- En attente : modifier + supprimer + médias --}}
                                                    <a href="{{ route('instructeur.evennement.medias', $elem['id']) }}"
                                                       class="btn btn-sm btn-outline-info mb-1 w-100">
                                                        <i class="fa fa-photo me-1"></i>Médias
                                                    </a>
                                                    <button class="btn btn-sm btn-outline-primary mb-1 w-100"
                                                            onclick="openModifier({{ $elem['id'] }}, '{{ addslashes($elem['titre'] ?? '') }}', '{{ $elem['date_deb'] }}', '{{ $elem['date_fin'] }}', '{{ $elem['heure_deb'] }}', '{{ $elem['heure_fin'] }}', '{{ $elem['frais'] ?? 0 }}', '{{ $elem['devise'] ?? 'DT' }}', '{{ addslashes($elem['salle'] ?? '') }}', '{{ $elem['nbr_place_dispo'] ?? 0 }}')">
                                                        <i class="fa fa-pencil me-1"></i>Modifier
                                                    </button>
                                                    <form method="POST"
                                                          action="{{ route('instructeur.evennement.demande.delete') }}"
                                                          style="display:inline"
                                                          onsubmit="return confirm('Supprimer cette demande ?')">
                                                        @csrf
                                                        <input type="hidden" name="champ_id" value="{{ $elem['id'] }}">
                                                        <button class="btn btn-sm btn-outline-danger w-100">
                                                            <i class="fa fa-trash me-1"></i>Supprimer
                                                        </button>
                                                    </form>
                                                @elseif($isRefuse)
                                                    {{-- Refusée : supprimer --}}
                                                    <form method="POST"
                                                          action="{{ route('instructeur.evennement.demande.delete') }}"
                                                          style="display:inline"
                                                          onsubmit="return confirm('Supprimer cette demande refusée ?')">
                                                        @csrf
                                                        <input type="hidden" name="champ_id" value="{{ $elem['id'] }}">
                                                        <button class="btn btn-sm btn-outline-danger w-100">
                                                            <i class="fa fa-trash me-1"></i>Supprimer
                                                        </button>
                                                    </form>
                                                @else
                                                    {{-- Acceptée : médias seulement --}}
                                                    <a href="{{ route('instructeur.evennement.medias', $elem['id']) }}"
                                                       class="btn btn-sm btn-outline-info w-100">
                                                        <i class="fa fa-photo me-1"></i>Médias
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-muted py-4">
                                                Aucune demande envoyée pour le moment.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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

<!-- Modal affiche -->
<div class="modal fade" id="afficheModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Affiche de l'événement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modal_affiche_img" src="" style="max-width:100%;border-radius:8px;">
            </div>
        </div>
    </div>
</div>

<!-- Modal modifier demande -->
<div class="modal fade" id="modifierModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="formModifier" method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-pencil me-2"></i>Modifier la demande</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Titre</label>
                        <input type="text" name="titre" id="mod_titre" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date début</label>
                        <input type="date" name="date_deb" id="mod_date_deb" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date fin</label>
                        <input type="date" name="date_fin" id="mod_date_fin" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Heure début</label>
                        <input type="time" name="heure_deb" id="mod_heure_deb" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Heure fin</label>
                        <input type="time" name="heure_fin" id="mod_heure_fin" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Frais</label>
                        <input type="number" name="frais" id="mod_frais" class="form-control" min="0">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Devise</label>
                        <select name="devise" id="mod_devise" class="form-select">
                            <option value="DT">DT</option>
                            <option value="EUR">EUR</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Salle</label>
                        <input type="text" name="salle" id="mod_salle" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nb places</label>
                        <input type="number" name="nbr_place_dispo" id="mod_nbr_place_dispo" class="form-control" min="0">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Nouvelle affiche <small class="text-muted">(optionnel)</small></label>
                        <input type="file" name="affiche" class="form-control" accept="image/*"
                               onchange="previewMod(this)">
                        <img id="mod_preview" src="" style="display:none;max-height:100px;margin-top:6px;border-radius:6px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i>Enregistrer
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function openModifier(id, titre, date_deb, date_fin, heure_deb, heure_fin, frais, devise, salle, nbr) {
    $('#formModifier').attr('action', '/instructeur/evennements/demandes/update/' + id);
    $('#mod_titre').val(titre);
    $('#mod_date_deb').val(date_deb);
    $('#mod_date_fin').val(date_fin);
    $('#mod_heure_deb').val(heure_deb);
    $('#mod_heure_fin').val(heure_fin);
    $('#mod_frais').val(frais);
    $('#mod_devise').val(devise);
    $('#mod_salle').val(salle);
    $('#mod_nbr_place_dispo').val(nbr);
    $('#mod_preview').hide();
    $('#modifierModal').modal('show');
}
function previewMod(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { $('#mod_preview').attr('src', e.target.result).show(); };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
