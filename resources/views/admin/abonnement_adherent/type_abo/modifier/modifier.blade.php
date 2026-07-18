<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'vente_abonnement','menuactive' =>'type_abo'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.admin.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper" style="margin-top: -110px">
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
                                    <div class="user-avatar-section">
                                        <div
                                            class="d-flex align-items-center flex-column"
                                        >
                                            <img
                                                class="img-fluid rounded my-4"
                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/People_icon_half.svg/1024px-People_icon_half.svg.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['code']}} -
                                                    {{$detail[0]['des']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.type_abo') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="editUserForm" action="{{ route('admin.abonnements.adherents.type_abo.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf
                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="categ_abo_id">{{ __('content.categ_abo') }}</label>


                                                <select id="categ_abo_id" name="categ_abo_id" class="select2 form-select">

                                                    @if($detail[0]['categ_abo_id'] != 'null')
                                                        <option value="{{$detail[0]['categ_abo_id']}}">
                                                            {{$desc_cat }}
                                                        </option>
                                                        <option value="null">{{ __('content.categ_abo') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.categ_abo') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        @if($list_cat[$i]['id'] !=$detail[0]['categ_abo_id'])
                                                            <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>
                                                        @endif


                                                    @endfor



                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="des"
                                                >{{ __('content.type_abo') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="des"
                                                    name="des"
                                                    class="form-control"
                                                    value="{{$detail[0]['des']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                        class="form-label"
                                                        for="periode"
                                                >Période</label
                                                >
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="periode"
                                                        value="{{$detail[0]['periode']}}"
                                                        name="periode"
                                                        aria-label="Période"
                                                />
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="frais">Frais</label>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="frais"
                                                        value="{{$detail[0]['frais']}}"
                                                        name="frais"
                                                        aria-label="Frais"
                                                        onkeyup="calcul_frais_ap_remise()"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="remise">Remise (%)</label>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="remise"
                                                        value="{{$detail[0]['remise']}}"
                                                        name="remise"
                                                        aria-label="Remise"
                                                        onkeyup="calcul_frais_ap_remise()"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="frais_ap_remise">Frais Ap Remise</label>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="frais_ap_remise"
                                                        value="{{$detail[0]['frais_ap_remise']}}"
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
                                            <div class="col-12 col-md-4" style="padding-top: 30px">
                                                @if($detail[0]['seance_essai'])
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="seance_essai" name="seance_essai" checked/>
                                                    <label class="form-check-label" for="seance_essai">Séance d'essai</label>
                                                </div>
                                                @else
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="seance_essai" name="seance_essai"/>
                                                    <label class="form-check-label" for="seance_essai">Séance d'essai</label>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="frais_seance_essai">Frais Séance d'essai</label>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="frais_seance_essai"
                                                        value="{{$detail[0]['frais_seance_essai']}}"
                                                        name="frais_seance_essai"
                                                        aria-label="Frais Séance d'essai"
                                                        disabled
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
                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="frais_seance_essai">Nombre Limite de personne</label>
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="nbr_pers_limit"
                                                        value="{{$detail[0]['nbr_pers_limit']}}"
                                                        name="nbr_pers_limit"
                                                        aria-label="Nombre Limite de personne"
                                                />
                                            </div>
                                            <div class="d-flex justify-content-center pt-3">

                                                <button type="submit" class="btn btn-primary" id="submitButton">{{ __('content.Modifier') }}</button>
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
