<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'vente_abonnement','menuactive' =>'add_abo'])

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
                                        <form method="POST" id="add_vente_form" action="{{route('instructeur.vente_abo.add')}}" class="row g-3">
                                            @csrf

                                            <h5 class="pb-2 border-bottom mb-4">
                                                {{ __('content.ajouter_vente') }}
                                            </h5>
                                            <div class="col-12 col-md-6">
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


                                            <div class="col-12 col-md-6">
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
