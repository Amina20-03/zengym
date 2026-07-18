<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'vente_abonnement','menuactive' =>'add_abo'])

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
                                        <form method="POST" id="add_vente_form" action="{{route('admin.vente_abo.add')}}" class="row g-3">
                                            @csrf

                                            <h5 class="pb-2 border-bottom mb-4">
                                                {{ __('content.ajouter_vente') }}
                                            </h5>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="date"
                                                >{{ __('content.date') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="date"
                                                    value="{{date('Y-m-d')}}"
                                                    name="date"
                                                    aria-label="{{ __('content.date') }}"
                                                    readonly
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="date"
                                                >{{ __('content.instructeur') }}</label
                                                >
                                                <select id="instructeur_id" name="instructeur_id" class="select2 form-select" required>

                                                    @for($i=0;$i<count($list_instructeurs);$i++)
                                                        <option value="{{$list_instructeurs[$i]['instructeur_id']}}">{{$list_instructeurs[$i]['nom']}} {{$list_instructeurs[$i]['prenom']}}</option>

                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-2" style="width:90px;padding-top: 29px">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary me-sm-3 me-1 data-submit"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                                                >
                                                    +
                                                </button>
                                            </div>
                                            <div class="col-12 col-md-2" style="width:25%">
                                                <label
                                                    class="form-label"
                                                    for="type_abo_id"
                                                >{{ __('content.type_abonnement') }}</label
                                                >
                                                <select id="type_abo_id" name="type_abo_id" class="select2 form-select" onchange="remplir_partie_detail()">
                                                    <option value="null">{{ __('content.type_abonnement') }}</option>
                                                    @for($i=0;$i<count($list_type_abo);$i++)
                                                        <option value="{{$list_type_abo[$i]['id']}}">{{$list_type_abo[$i]['desc']}}</option>

                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-12">

                                                <div class="card-datatable table-responsive">
                                                    <table
                                                        class="datatables-users table border-top"
                                                        style="white-space: nowrap;width:100%"
                                                    >
                                                        <tr>

                                                            <td style="text-align:center;width:150px">
                                                                {{ __('content.Code') }}
                                                                <br>
                                                                <input type="text" id="code_prod_input" name="code_prod_input" class="form-control" readonly/>
                                                            </td>
                                                            <td style="text-align:center;">
                                                                {{ __('content.desc') }}
                                                                <br>
                                                                <input type="text" id="desc_prod_input" name="desc_prod_input" class="form-control" readonly/>
                                                            </td>
                                                            <td style="text-align:center;width:150px">
                                                                {{ __('content.nb_mois') }}
                                                                <br>
                                                                <input type="number" id="nb_mois_input" name="nb_mois_input" class="form-control" readonly/>
                                                            </td>

                                                            <td style="text-align:center;width:150px">
                                                                {{ __('content.pu_ht') }}
                                                                <br>
                                                                <input type="text" id="prix_ht_input" name="prix_ht_input" class="form-control" readonly/>
                                                            </td>
                                                            <td style="text-align:center;width:150px">
                                                                {{ __('content.taux_tva') }}
                                                                <br>
                                                                <input type="text" id="taux_tva_input" name="taux_tva_input" class="form-control" readonly/>
                                                            </td>
                                                            <td style="text-align:center;width:150px">
                                                                {{ __('content.pu_ttc') }}
                                                                <br>
                                                                <input type="text" id="prix_ttc_input" name="prix_ttc_input" class="form-control" readonly/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>


                                            <div class="col-12 col-md-4">
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
                                                    onchange="calculate_date_fin()"

                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="date_fin"
                                                >{{ __('content.date_fin') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="date_fin"
                                                    value="{{date('Y-m-d')}}"
                                                    name="date_fin"
                                                    aria-label="{{ __('content.date_fin') }}"

                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="paiement"
                                                >{{ __('content.paiement') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="paiement"
                                                    value="0"
                                                    name="paiement"
                                                    aria-label="{{ __('content.paiement') }}"

                                                />
                                            </div>
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
                            {{ __('content.Ajouter_un_instructeur') }}

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

                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.instructeur.add') }}" class="row g-3">
                            @csrf

                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="photo"
                                >{{ __('content.photo') }}</label
                                >
                                <input
                                    type="file"
                                    class="form-control"
                                    id="photo"
                                    placeholder="{{ __('content.photo') }}"
                                    name="photo"
                                    aria-label="{{ __('content.photo') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="nom"
                                >{{ __('content.nom') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nom"
                                    placeholder="{{ __('content.nom') }}"
                                    name="nom"
                                    aria-label="{{ __('content.nom') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="prenom"
                                >{{ __('content.prenom') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="prenom"
                                    placeholder="{{ __('content.prenom') }}"
                                    name="prenom"
                                    aria-label="{{ __('content.prenom') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="mail"
                                >{{ __('content.mail') }}</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="mail"
                                    placeholder="{{ __('content.mail') }}"
                                    name="mail"
                                    aria-label="{{ __('content.mail') }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="adresse"
                                >{{ __('content.adresse') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="adresse"
                                    placeholder="{{ __('content.adresse') }}"
                                    name="adresse"
                                    aria-label="{{ __('content.adresse') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="tel"
                                >{{ __('content.tel') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tel"
                                    placeholder="{{ __('content.tel') }}"
                                    name="tel"
                                    aria-label="{{ __('content.tel') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="date_naiss"
                                >{{ __('content.date_naiss') }}</label
                                >
                                <input
                                    type="date"
                                    class="form-control"
                                    id="date_naiss"
                                    value="{{ date('Y-m-d')}}"
                                    name="date_naiss"
                                    aria-label="{{ __('content.date_naiss') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="sexe"
                                >{{ __('content.sexe') }}</label
                                >
                                <div class="col-md">
                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="H" checked/>
                                        <label class="form-check-label" for="inlineRadio1">{{ __('content.homme') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="F" />
                                        <label class="form-check-label" for="inlineRadio2">{{ __('content.femme') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="profession"
                                >{{ __('content.profession') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="profession"
                                    placeholder="{{ __('content.profession') }}"
                                    name="profession"
                                    aria-label="{{ __('content.profession') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="cin"
                                >{{ __('content.cin') }}</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id="cin"
                                    placeholder="{{ __('content.cin') }}"
                                    name="cin"
                                    aria-label="{{ __('content.cin') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="pays_id">{{ __('content.pays') }}</label>
                                <select id="pays_id" name="pays_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.pays') }}</option>
                                    @for($i=0;$i<count($list_pays);$i++)
                                        <option value="{{$list_pays[$i]['id']}}">{{$list_pays[$i]['desc']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="categ_instructeur_id">{{ __('content.categorie_instructeur') }}</label>
                                <select id="categ_instructeur_id" name="categ_instructeur_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                    @for($i=0;$i<count($list_cat);$i++)
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="email"
                                >{{ __('content.login') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    placeholder="{{ __('content.login') }}"
                                    name="email"
                                    aria-label="{{ __('content.login') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="password"
                                >{{ __('content.password') }}</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="*****"
                                    name="password"
                                    aria-label="{{ __('content.password') }}"

                                />
                            </div>
                            <input
                                type="hidden"
                                class="form-control"
                                id="verif_nature"
                                value="vente_abo"
                                name="verif_nature"

                            />
                            <button
                                type="submit"
                                class="btn btn-primary me-sm-3 me-1 data-submit"

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
