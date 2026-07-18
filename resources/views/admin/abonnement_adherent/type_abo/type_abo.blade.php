<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'vente_abonnement_adherent','menuactive' =>'type_abo_adherent'])

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


                        <div style=" float: right;text-align: right">
                            <button
                                type="button"
                                class="btn btn-primary me-sm-3 me-1 data-submit"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                            >
                                {{ __('content.Ajouter_un_type') }}
                            </button>
                        </div>

                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table" style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.type_abo') }}</th>
                                    <th style="text-align:center">Période</th>
                                    <th style="text-align:center">Frais</th>
                                    <th style="text-align:center">Remise (%)</th>
                                    <th style="text-align:center">Frais Ap Remise</th>
                                    <th style="text-align:center">Séance d'essai</th>
                                    <th style="text-align:center">Frais Séance d'essai</th>
                                    <th style="text-align:center">Catégorie</th>
                                    <th style="text-align:center">Nombre Limite</th>
                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>
                                            <td style="text-align:center">
                                                {{$elem['code']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['des']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['periode']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['frais']}} TND
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['remise']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['frais_ap_remise']}}
                                            </td>
                                            <td style="text-align:center">
                                                @if($elem['seance_essai'])
                                                <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                @else
                                                <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['frais_seance_essai']}} TND
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['categ_abo_desc']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['nbr_pers_limit']}}
                                            </td>

                                            <td style="text-align:center">


                                                <a href="{{route('admin.abonnements.adherents.type_abo.edit',$elem['id'])}}" class="btn btn-sm btn-icon">
                                                    <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">
                                                </a>

                                                <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>




                </div>
                <form method="POST" action="{{route('admin.abonnements.adherents.type_abo.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>

                <div
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasAddUser"
                    aria-labelledby="offcanvasAddUserLabel"
                >
                    <div class="offcanvas-header">
                        <h5
                            id="offcanvasAddUserLabel"
                            class="offcanvas-title"
                        >
                            {{ __('content.Ajouter_un_type') }}

                        </h5>
                        <button
                            type="button"
                            class="btn-close text-reset"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div
                        class="offcanvas-body mx-0 flex-grow-0"
                    >

                        <form method="POST" id="addNewUserForm" action="{{ route('admin.abonnements.adherents.type_abo.add') }}" class="row g-3">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="categ_abo_id">{{ __('content.categ_abo') }}</label>
                                <select id="categ_abo_id" name="categ_abo_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.categ_abo') }}</option>
                                    @for($i=0;$i<count($list_cat);$i++)
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="desc"
                                >{{ __('content.type_abo') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="des"
                                    placeholder="{{ __('content.type_abo') }}"
                                    name="des"
                                    aria-label="{{ __('content.type_abo') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="periode"
                                >Période</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="periode"
                                    placeholder="Période"
                                    name="periode"
                                    aria-label="Période"
                                />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="frais">Frais</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="frais"
                                        placeholder="Frais"
                                        name="frais"
                                        aria-label="Frais"
                                        onkeyup="calcul_frais_ap_remise()"
                                />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="remise">Remise (%)</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="remise"
                                        value="0"
                                        name="remise"
                                        aria-label="Remise"
                                        onkeyup="calcul_frais_ap_remise()"
                                />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="frais_ap_remise">Frais Ap Remise</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="frais_ap_remise"
                                        value="0"
                                        name="frais_ap_remise"
                                        aria-label="Frais Ap Remise"
                                        readonly
                                />
                            </div>

                            <script>
                                function calcul_frais_ap_remise() {
                                    const frais = parseFloat(document.getElementById('frais').value) || 0;
                                    const remise = parseFloat(document.getElementById('remise').value) || 0;

                                    // calcul
                                    const montantRemise = frais * (remise / 100);
                                    const fraisApRemise = frais - montantRemise;

                                    // affichage dans l'input
                                    document.getElementById('frais_ap_remise').value = fraisApRemise.toFixed(2);
                                }
                            </script>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="seance_essai" name="seance_essai" />
                                    <label class="form-check-label" for="seance_essai">Séance d'essai</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="frais_seance_essai">Frais Séance d'essai</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="frais_seance_essai"
                                        value="0"
                                        name="frais_seance_essai"
                                        aria-label="Frais Séance d'essai"
                                        disabled
                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="frais_seance_essai">Nombre Limite de personne</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="nbr_pers_limit"
                                        value="0"
                                        name="nbr_pers_limit"
                                        aria-label="Nombre Limite de personne"
                                />
                            </div>

                            <script>
                                const seanceEssai = document.getElementById('seance_essai');
                                const fraisInput = document.getElementById('frais_seance_essai');

                                // au changement de la checkbox
                                seanceEssai.addEventListener('change', function () {
                                    if (this.checked) {
                                        fraisInput.removeAttribute('disabled'); // input actif
                                    } else {
                                        fraisInput.setAttribute('disabled', 'disabled'); // input désactivé
                                        fraisInput.value = 0; // réinitialiser si tu veux
                                    }
                                });
                            </script>

                            <button
                                type="submit"
                                class="btn btn-primary me-sm-3 me-1 data-submit"
                                id="submitButton"
                            >
                                {{ __('content.Valider') }}
                            </button>
                            <button
                                type="reset"
                                class="btn btn-label-secondary"
                                data-bs-dismiss="offcanvas"
                            >
                                {{ __('content.Annuler') }}
                            </button>

                        </form>
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
