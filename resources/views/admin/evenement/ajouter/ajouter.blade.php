<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'gest_evenements','menuactive' =>'create_even'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.admin.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="row">
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
                        <!-- User Sidebar -->
                        <div
                            class="col-xl-12 col-lg-5 col-md-5 order-1 order-md-0"
                        >
                            <!-- User Card -->

                            <div class="card mb-12">
                                <div class="card-body">

                                    <div class="info-container">
                                        <form method="POST" id="add_vente_form" action="{{route('admin.evenement.add')}}" class="row g-3">
                                            @csrf
                                            <input type="hidden" name="type_even_id" id="type_even_id" value="{{$type_even_id}}"/>

                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="titre"
                                                >{{ __('content.libelle') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="titre"
                                                    placeholder="{{ __('content.libelle') }}"
                                                    name="titre"
                                                    aria-label="{{ __('content.libelle') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label
                                                        class="form-label"
                                                        for="desc"
                                                >{{ __('content.desc') }}</label
                                                >
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="desc"
                                                        name="desc"
                                                        aria-label="{{ __('content.desc') }}"

                                                />
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label
                                                        class="form-label"
                                                        for="sujet"
                                                >{{ __('content.sujet') }}</label
                                                >
                                                <textarea class="form-control"  id="sujet" name="sujet">

                                                </textarea>

                                            </div>


                                            <div class="col-12 col-md-4">
                                                <label for="select2Primary" class="form-label">{{ __('content.langue') }}</label>
                                                <div class="select2-primary">
                                                    <select id="select2Primary" name="langue[]" class="select2 form-select" multiple>
                                                        <option value="English">English</option>
                                                        <option value="Spanish">Spanish</option>
                                                        <option value="French">French</option>
                                                        <option value="German">German</option>
                                                        <option value="Chinese">Chinese</option>
                                                        <option value="Japanese">Japanese</option>
                                                        <option value="Hindi">Hindi</option>
                                                        <option value="Arabic">Arabic</option>
                                                        <option value="Russian">Russian</option>
                                                        <option value="Portuguese">Portuguese</option>
                                                        <option value="Bengali">Bengali</option>
                                                        <option value="Punjabi">Punjabi</option>
                                                        <option value="Indonesian">Indonesian</option>
                                                        <option value="Korean">Korean</option>
                                                        <option value="Vietnamese">Vietnamese</option>
                                                        <option value="Italian">Italian</option>
                                                        <option value="Thai">Thai</option>
                                                        <option value="Turkish">Turkish</option>
                                                        <option value="Polish">Polish</option>
                                                        <option value="Dutch">Dutch</option>
                                                        <option value="Swedish">Swedish</option>
                                                        <option value="Danish">Danish</option>
                                                        <option value="Finnish">Finnish</option>
                                                        <option value="Norwegian">Norwegian</option>
                                                        <option value="Greek">Greek</option>
                                                        <option value="Hebrew">Hebrew</option>
                                                        <option value="Hungarian">Hungarian</option>
                                                        <option value="Czech">Czech</option>
                                                        <option value="Romanian">Romanian</option>
                                                        <option value="Bulgarian">Bulgarian</option>
                                                        <option value="Slovak">Slovak</option>
                                                        <option value="Ukrainian">Ukrainian</option>
                                                        <option value="Croatian">Croatian</option>
                                                        <option value="Serbian">Serbian</option>
                                                        <option value="Slovenian">Slovenian</option>
                                                        <option value="Lithuanian">Lithuanian</option>
                                                        <option value="Latvian">Latvian</option>
                                                        <option value="Estonian">Estonian</option>
                                                        <option value="Icelandic">Icelandic</option>
                                                        <option value="Malay">Malay</option>
                                                        <option value="Filipino">Filipino</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="pays_id">{{ __('content.pays') }}</label>
                                                <select id="pays_id" name="pays_id" class="select2 form-select" required>
                                                    <option value="null">{{ __('content.pays') }}</option>
                                                    @for($i=0;$i<count($list_pays);$i++)
                                                        <option value="{{$list_pays[$i]['id']}}">{{$list_pays[$i]['desc']}}</option>

                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="salle"
                                                >{{ __('content.salle') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="salle"
                                                    name="salle"
                                                    aria-label="{{ __('content.salle') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="info_sur_lieu"
                                                >{{ __('content.info_sur_lieu') }}</label
                                                >

                                                <textarea class="form-control"  id="info_sur_lieu" name="info_sur_lieu">

                                                </textarea>
                                            </div>


                                            @if(!empty($date_deb))
                                            <div class="col-12 col-md-6">
                                                <label
                                                        class="form-label"
                                                        for="date_deb"
                                                >{{ __('content.date_deb') }}</label
                                                >
                                                <input
                                                        type="date"
                                                        class="form-control"
                                                        id="date_deb"
                                                        value="{{$date_deb}}"
                                                        name="date_deb"
                                                        aria-label="{{ __('content.date_deb') }}"
                                                        readonly
                                                />
                                            </div>
                                            @else
                                            <div class="col-12 col-md-6">
                                                <label
                                                        class="form-label"
                                                        for="date_deb"
                                                >{{ __('content.date_deb') }}</label
                                                >
                                                <input
                                                        type="date"
                                                        class="form-control"
                                                        id="date_deb"
                                                        value="{{date('Y-m-d')}}"
                                                        name="date_deb"
                                                        aria-label="{{ __('content.date_deb') }}"

                                                />
                                            </div>
                                            @endif
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="date_fin"
                                                >{{ __('content.date_fin') }}</label
                                                >
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="date_fin"
                                                    value="{{date('Y-m-d')}}"
                                                    name="date_fin"
                                                    aria-label="{{ __('content.date_fin') }}"

                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="heure_deb"
                                                >{{ __('content.heure_deb') }}</label
                                                >
                                                <input
                                                    type="time"
                                                    class="form-control"
                                                    id="heure_deb"
                                                    value="{{date('H:i:s')}}"
                                                    name="heure_deb"
                                                    aria-label="{{ __('content.heure_deb') }}"

                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="heure_fin"
                                                >{{ __('content.heure_fin') }}</label
                                                >
                                                <input
                                                    type="time"
                                                    class="form-control"
                                                    id="heure_fin"
                                                    value="{{date('H:i:s')}}"
                                                    name="heure_fin"
                                                    aria-label="{{ __('content.heure_fin') }}"

                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="frais"
                                                >{{ __('content.frais') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="frais"
                                                    value="0"
                                                    name="frais"
                                                    aria-label="{{ __('content.frais') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="select2Primary" class="form-label">{{ __('content.devise') }}</label>
                                                <div class="select2-primary">
                                                    <select id="devise" name="devise" class="select2 form-select">
                                                        <option value="DT">Dinar</option>
                                                        <option value="Eur">Euro</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="contact"
                                                >{{ __('content.contact') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="contact"
                                                    placeholder="+000 00 000 000"
                                                    name="contact"
                                                    aria-label="{{ __('content.contact') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="participant_a_levennement"
                                                >{{ __('content.participant_a_levennement') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="participant_a_levennement"
                                                    name="participant_a_levennement"
                                                    value="Ouvert au public"
                                                    aria-label="{{ __('content.participant_a_levennement') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="nbr_place_dispo"
                                                >{{ __('content.capacité') }}</label
                                                >
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="nbr_place_dispo"
                                                    name="nbr_place_dispo"
                                                    value="0"
                                                    aria-label="{{ __('content.capacité') }}"
                                                    onkeyup="fillTable_instr_id_list()"
                                                />
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="participant_non_inscrit"
                                                >{{ __('content.participant_non_inscrit') }}</label
                                                >
                                                <div class="select2-primary">
                                                    <select id="participant_non_inscrit" name="participant_non_inscrit" class="select2 form-select">
                                                        <option value="{{ __('content.accepter') }}">{{ __('content.accepter') }}</option>
                                                        <option value="{{ __('content.non_accepter') }}">{{ __('content.non_accepter') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="heure_fin"
                                                >{{ __('content.instructeur') }}</label
                                                >
                                                <div class="card-datatable table-responsive">
                                                    <table
                                                        class="datatables-users table border-top"
                                                        id="table"
                                                    >
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 50px"></th>
                                                            <th style="text-align:center">{{ __('content.nom') }}</th>
                                                            <th style="text-align:center">{{ __('content.prenom') }}</th>
                                                            <th style="text-align:center">{{ __('content.mail') }}</th>
                                                            <th style="text-align:center">{{ __('content.adresse') }}</th>
                                                            <th style="text-align:center">{{ __('content.tel') }}</th>
                                                            <th style="text-align:center">{{ __('content.profession') }}</th>
                                                            <th style="text-align:center">{{ __('content.categorie') }}</th>
                                                            <th style="text-align:center">{{ __('content.cin') }}</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(count($liste)>0)
                                                            @foreach($liste as $elem)
                                                                <tr>

                                                                    <td style="text-align:center">
                                                                        <input type="radio" name="record"  value="{{$elem['id']}}" onclick="fillTable_instr_id_list()"/>
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['nom']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['prenom']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['mail']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['adresse']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['tel']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['profession']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['categ_instructeur_desc']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['cin']}}
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="nbr_participant"
                                                >{{ __('content.nbr_participant') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="nbr_participant"
                                                    value="0"
                                                    name="nbr_participant"
                                                    aria-label="{{ __('content.nbr_participant') }}"
                                                    readonly
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="nbr_place_restant"
                                                >{{ __('content.nbr_place_restant') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="nbr_place_restant"
                                                    value="0"
                                                    name="nbr_place_restant"
                                                    aria-label="{{ __('content.nbr_place_restant') }}"
                                                    readonly
                                                />
                                            </div>
                                            <input
                                                type="hidden"
                                                class="form-control"
                                                id="instr_id_list"
                                                value="0"
                                                name="instr_id_list"

                                            />
                                            <div class="d-flex justify-content-center pt-3">

                                                <button type="submit" class="btn btn-primary" id="submitButton" onclick="submit_form()">{{ __('content.Valider') }}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->

                        </div>
                        <!--/ User Sidebar -->

                    </div>

                </div>



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
