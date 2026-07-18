<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'evenements','menuactive' =>'add_evennement'])

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

                    <div class="row g-4">

                        {{-- ====================================================== --}}
                        {{-- ÉTAPE 1 : Calendrier                                    --}}
                        {{-- ====================================================== --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">
                                        <span class="badge bg-primary me-2">1</span>
                                        Sélectionnez une date dans le calendrier
                                    </h5>
                                    <span class="badge bg-label-primary">Type : {{ $detail_type_event[0]['desc'] ?? '' }}</span>
                                </div>
                                <div class="card-body p-3">
                                    {{-- FullCalendar intégré directement (pas d'iframe) --}}
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>

                        {{-- ====================================================== --}}
                        {{-- ÉTAPE 2 : Formulaire (masqué jusqu'à sélection date)    --}}
                        {{-- ====================================================== --}}
                        <div class="col-12" id="form_section" style="display:none">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <span class="badge bg-primary me-2">2</span>
                                        Complétez les informations de l'événement
                                        <span id="selected_date_label" class="badge bg-label-success ms-2"></span>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST"
                                          action="{{ route('instructeur.evennement.demande.add') }}"
                                          id="formDemande"
                                          enctype="multipart/form-data"
                                          class="row g-3">
                                        @csrf

                                        {{-- Champs cachés --}}
                                        <input type="hidden" name="type_even_id" value="{{ $type_even_id }}">
                                        <input type="hidden" name="instructeur_id" value="{{ session('instructeur_id') }}">
                                        <input type="hidden" name="instr_id_list" id="instr_id_list" value="{{ session('instructeur_id') }}">

                                        {{-- Dates & Heures --}}
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Date début <span class="text-danger">*</span></label>
                                            <input type="date" name="date_deb" id="date_deb" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Date fin <span class="text-danger">*</span></label>
                                            <input type="date" name="date_fin" id="date_fin" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Heure début <span class="text-danger">*</span></label>
                                            <input type="time" name="heure_deb" id="heure_deb" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Heure fin <span class="text-danger">*</span></label>
                                            <input type="time" name="heure_fin" id="heure_fin" class="form-control" required>
                                        </div>

                                        {{-- Titre & Sujet --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Titre <span class="text-danger">*</span></label>
                                            <input type="text" name="titre" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Sujet</label>
                                            <input type="text" name="sujet" class="form-control">
                                        </div>

                                        {{-- Description --}}
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Description</label>
                                            <textarea name="desc" class="form-control" rows="3"></textarea>
                                        </div>

                                        {{-- Langue --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">{{ __('content.langue') }}</label>
                                            <select name="langue[]" class="select2 form-select" multiple>
                                                <option value="Arabe">Arabe</option>
                                                <option value="Français">Français</option>
                                                <option value="Anglais">Anglais</option>
                                                <option value="Espagnol">Espagnol</option>
                                                <option value="Allemand">Allemand</option>
                                                <option value="Italien">Italien</option>
                                            </select>
                                        </div>

                                        {{-- Pays --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Pays</label>
                                            <select name="pays_id" class="select2 form-select">
                                                <option value="">-- Sélectionner --</option>
                                                @foreach($list_pays as $pays)
                                                    <option value="{{ $pays['id'] ?? $pays->id }}">{{ $pays['desc'] ?? $pays->desc }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Salle & Lieu --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Salle</label>
                                            <input type="text" name="salle" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Info sur le lieu</label>
                                            <textarea name="info_sur_lieu" class="form-control" rows="2"></textarea>
                                        </div>

                                        {{-- Frais & Devise --}}
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Frais</label>
                                            <input type="number" name="frais" class="form-control" value="0" min="0">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Devise</label>
                                            <select name="devise" class="form-select">
                                                <option value="DT">DT</option>
                                                <option value="EUR">EUR</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Nb places</label>
                                            <input type="number" name="nbr_place_dispo" id="nbr_place_dispo" class="form-control" value="0" min="0">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold">Contact</label>
                                            <input type="text" name="contact" class="form-control">
                                        </div>

                                        {{-- Participants --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Participants à l'événement</label>
                                            <input type="text" name="participant_a_levennement" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Participants non inscrits</label>
                                            <input type="text" name="participant_non_inscrit" class="form-control">
                                        </div>

                                        @if(count($liste) > 0)
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">{{ __('content.instructeur') }}</label>
                                            <div class="table-responsive" style="max-height:300px;overflow-y:auto;">
                                                <table class="table table-bordered table-hover table-sm" id="table_instructeurs">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th style="width:50px"></th>
                                                            <th>{{ __('content.nom') }}</th>
                                                            <th>{{ __('content.prenom') }}</th>
                                                            <th>{{ __('content.mail') }}</th>
                                                            <th>{{ __('content.tel') }}</th>
                                                            <th>{{ __('content.profession') }}</th>
                                                            <th>{{ __('content.cin') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($liste as $elem)
                                                        <tr style="cursor:pointer" onclick="selectInstructeur(this, '{{ $elem['id'] ?? $elem->id }}')">
                                                            <td style="text-align:center">
                                                                <input type="radio" name="record"
                                                                       value="{{ $elem['id'] ?? $elem->id }}"
                                                                       onclick="fillTable_instr_id_list()"/>
                                                            </td>
                                                            <td>{{ $elem['nom'] ?? '' }}</td>
                                                            <td>{{ $elem['prenom'] ?? '' }}</td>
                                                            <td>{{ $elem['mail'] ?? '' }}</td>
                                                            <td>{{ $elem['tel'] ?? '' }}</td>
                                                            <td>{{ $elem['profession'] ?? '' }}</td>
                                                            <td>{{ $elem['cin'] ?? '' }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endif

                                        {{-- Affiche --}}
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="fa fa-image me-1"></i>Affiche
                                                <small class="text-muted">(optionnel — JPG, PNG, WebP, max 5 Mo)</small>
                                            </label>
                                            <input type="file" name="affiche" id="afficheInput" class="form-control" accept="image/*">
                                            <img id="affichePreview" src="" style="display:none;max-height:120px;margin-top:8px;border-radius:6px;">
                                        </div>

                                        {{-- Boutons --}}
                                        <div class="col-12 d-flex gap-2 mt-2">
                                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                                <i class="fa fa-send me-1"></i>Envoyer la demande
                                            </button>
                                            <a href="{{ route('instructeur.evennement.demande.index') }}" class="btn btn-outline-secondary">Annuler</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- / Content -->
                @include('layouts.footer')
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
</div>


