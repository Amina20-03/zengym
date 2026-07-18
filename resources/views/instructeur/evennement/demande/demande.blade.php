<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'evenements','menuactive' =>'dmd_evennement'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.instructeur.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Users List Table -->
                    <div class="card" style="padding: 10px">
                        @if (Session::has('success'))

                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif
                        {{--                        <div class="card-header border-bottom">--}}
                        {{--                            <h5 class="card-title">Search Filter</h5>--}}
                        {{--                            <div--}}
                        {{--                                class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0"--}}
                        {{--                            >--}}
                        {{--                                <div class="col-md-4 user_role"></div>--}}
                        {{--                                <div class="col-md-4 user_plan"></div>--}}
                        {{--                                <div class="col-md-4 user_status"></div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}



                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table"
                                style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="width: 50px"></th>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.date_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.date_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.heure_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.heure_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_participant') }}</th>
                                    <th style="text-align:center">{{ __('content.sujet') }}</th>
                                    <th style="text-align:center">{{ __('content.frais') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_place_max') }}</th>
                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                    <th style="text-align:center">Affiche</th>
                                    <th style="text-align:center">Statut</th>
                                    <th style="text-align:center;width: 120px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        @if($elem['instructeur_id'] == session('instructeur_id'))

                                            <tr>

                                                <td style="text-align:center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png" alt="" style="width:30px;">
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['code']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date_deb']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date_fin']}}
                                                </td>

                                                <td style="text-align:center">
                                                    {{$elem['heure_deb']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['heure_fin']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_participant']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['sujet']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['frais']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_place_dispo']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['type_even_desc']}}
                                                </td>
                                                {{-- Affiche --}}
                                                <td style="text-align:center">
                                                    @if(!empty($elem['affiche_url']))
                                                        <img src="{{$elem['affiche_url']}}"
                                                             style="width:50px;height:50px;object-fit:cover;border-radius:4px;cursor:pointer;"
                                                             onclick="document.getElementById('modal_affiche_img').src='{{$elem['affiche_url']}}';new bootstrap.Modal(document.getElementById('afficheModal')).show();">
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                </td>
                                                {{-- Statut --}}
                                                <td style="text-align:center">
                                                    @if(($elem['approuver'] ?? null) === true || ($elem['approuver'] ?? null) == 1)
                                                        <span class="badge bg-label-success">Acceptée</span>
                                                    @elseif(($elem['refuser'] ?? null) === true || ($elem['refuser'] ?? null) == 1)
                                                        <span class="badge bg-label-danger">Refusée</span>
                                                    @else
                                                        <span class="badge bg-label-warning">En attente</span>
                                                    @endif
                                                </td>
                                                {{-- Actions selon statut --}}
                                                <td style="text-align:center">
                                                    @if(($elem['approuver'] ?? null) === true || ($elem['approuver'] ?? null) == 1)
                                                        {{-- Acceptée : aucune action --}}
                                                        <span class="text-muted small">Aucune action</span>
                                                    @elseif(($elem['refuser'] ?? null) === true || ($elem['refuser'] ?? null) == 1)
                                                        {{-- Refusée : supprimer uniquement --}}
                                                        <a href="#" class="btn btn-sm btn-outline-danger w-100"
                                                           onclick="call_delete_modal({{$elem['id']}})"
                                                           data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                            <i class="fa fa-trash me-1"></i>Supprimer
                                                        </a>
                                                    @else
                                                        {{-- En attente : modifier + supprimer --}}
                                                        <button class="btn btn-sm btn-outline-primary w-100 mb-1"
                                                                onclick="openModifierModal({{$elem['id']}}, '{{$elem['titre']}}', '{{$elem['sujet']}}', '{{$elem['desc']}}', '{{$elem['salle']}}', '{{$elem['date_deb']}}', '{{$elem['date_fin']}}', '{{$elem['heure_deb']}}', '{{$elem['heure_fin']}}', '{{$elem['frais']}}', '{{$elem['devise']}}', '{{$elem['nbr_place_dispo']}}')">
                                                            <i class="fa fa-pencil me-1"></i>Modifier
                                                        </button>
                                                        <a href="#" class="btn btn-sm btn-outline-danger w-100"
                                                           onclick="call_delete_modal({{$elem['id']}})"
                                                           data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                            <i class="fa fa-trash me-1"></i>Supprimer
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>






                    <!-- Offcanvas to add new user -->

                </div>
                <form method="POST" action="{{route('instructeur.evennement.demande.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>

                <!-- / Content -->

                <!-- Footer -->
                <!-- Footer-->
                @include('layouts.footer')
                <!--/ Footer-->
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>

<!-- Modal affiche plein écran -->
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

<!-- Modal Modifier demande -->
<div class="modal fade" id="modifierModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="formModifier" action="" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-pencil me-2"></i>Modifier la demande</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Titre</label>
                            <input type="text" name="titre" id="mod_titre" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sujet</label>
                            <input type="text" name="sujet" id="mod_sujet" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="desc" id="mod_desc" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Salle</label>
                            <input type="text" name="salle" id="mod_salle" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date début</label>
                            <input type="date" name="date_deb" id="mod_date_deb" class="form-control">
                        </div>
                        <div class="col-md-6">
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
                        <div class="col-md-4">
                            <label class="form-label">Frais</label>
                            <input type="number" name="frais" id="mod_frais" class="form-control" min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Devise</label>
                            <select name="devise" id="mod_devise" class="form-select">
                                <option value="DT">DT</option>
                                <option value="EUR">EUR</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nb places disponibles</label>
                            <input type="number" name="nbr_place_dispo" id="mod_nbr_place_dispo" class="form-control" min="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Affiche <small class="text-muted">(laisser vide pour conserver l'actuelle)</small></label>
                            <input type="file" name="affiche" id="mod_affiche" class="form-control" accept="image/*"
                                   onchange="previewModAffiche(this)">
                            <img id="mod_affiche_preview" src="" style="display:none;max-height:120px;margin-top:8px;border-radius:6px;">
                        </div>
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
function openModifierModal(id, titre, sujet, desc, salle, date_deb, date_fin, heure_deb, heure_fin, frais, devise, nbr_place_dispo) {
    document.getElementById('formModifier').action = '/instructeur/evennements/demandes/update/' + id;
    document.getElementById('mod_titre').value          = titre;
    document.getElementById('mod_sujet').value          = sujet;
    document.getElementById('mod_desc').value           = desc;
    document.getElementById('mod_salle').value          = salle;
    document.getElementById('mod_date_deb').value       = date_deb;
    document.getElementById('mod_date_fin').value       = date_fin;
    document.getElementById('mod_heure_deb').value      = heure_deb;
    document.getElementById('mod_heure_fin').value      = heure_fin;
    document.getElementById('mod_frais').value          = frais;
    document.getElementById('mod_devise').value         = devise;
    document.getElementById('mod_nbr_place_dispo').value = nbr_place_dispo;
    document.getElementById('mod_affiche_preview').style.display = 'none';
    new bootstrap.Modal(document.getElementById('modifierModal')).show();
}
function previewModAffiche(input) {
    const preview = document.getElementById('mod_affiche_preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
@if(Session::has('open_type_modal'))
document.addEventListener('DOMContentLoaded', function() {
    new bootstrap.Modal(document.getElementById('type_event_Modal')).show();
});
@endif
</script>
