<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'stock_vente','menuactive' =>'bon_sortie_add'])

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



                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="add_bon_en_form" action="{{route('admin.stock_vente.bon_sortie.add')}}" class="row g-3">
                                            @csrf

                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="date_be"
                                                >{{ __('content.date') }}</label
                                                >
                                                <input
                                                    type="date"
                                                    id="date_be"
                                                    name="date_bs"
                                                    class="form-control"
                                                    value="{{date('Y-m-d')}}"
                                                />
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="total_ttc_be"
                                                >{{ __('content.mt_ttc') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="total_ttc_be"
                                                    name="total_ttc_bs"
                                                    class="form-control"
                                                    value="0"
                                                    readonly
                                                />
                                            </div>
                                            <input
                                                type="hidden"
                                                id="list_prod_selectionnes"
                                                name="list_prod_selectionnes"
                                                class="form-control"
                                            />
                                            <input
                                                type="hidden"
                                                id="list_qe_selectionnes"
                                                name="list_qe_selectionnes"
                                                class="form-control"
                                            />
                                            <input
                                                type="hidden"
                                                id="list_pu_selectionnes"
                                                name="list_pu_selectionnes"
                                                class="form-control"
                                            />
                                            <input
                                                type="hidden"
                                                id="list_total_selectionnes"
                                                name="list_total_selectionnes"
                                                class="form-control"
                                            />
                                            <h5 class="pb-2 border-bottom mb-4">
                                                <br>
                                                {{ __('content.categorie') }}
                                                <select id="IDCATEGORIE" name="IDCATEGORIE" class="select2 form-select" onchange="remplir_list_produit()">

                                                    <option value="Tous">{{ __('content.Tous') }}</option>
                                                    @for($i=0;$i<count($liste_cat);$i++)
                                                        <option value="{{$liste_cat[$i]['id']}}">{{$liste_cat[$i]['lib']}}</option>

                                                    @endfor
                                                </select>
                                            </h5>

                                            <h5 class="pb-2 border-bottom mb-4">
                                                {{ __('content.produits') }}
                                                <select id="IDPROD" name="IDPROD" class="select2 form-select" onchange="remplir_partie_detail()">

                                                </select>
                                            </h5>


                                            <table
                                                class="datatables-users table border-top"
                                            >
                                                <tr>
                                                    <td style="text-align:center">
                                                        {{ __('content.Code') }}
                                                        <br>
                                                        <input type="text" id="code_prod_input" name="code_prod_input" class="form-control" readonly/>
                                                    </td>
                                                    <td style="text-align:center">
                                                        {{ __('content.desc') }}
                                                        <br>
                                                        <input type="text" id="desc_prod_input" name="desc_prod_input" class="form-control" readonly/>
                                                    </td>
                                                    <td style="text-align:center">
                                                        {{ __('content.qte') }}
                                                        <br>
                                                        <input type="number" id="qte_prod_input" name="qte_prod_input" class="form-control" value="1" onkeyup="calcul_total()"/>
                                                    </td>
                                                    <td style="text-align:center">
                                                        {{ __('content.pu') }}
                                                        <br>
                                                        <input type="text" id="pu_prod_input" name="pu_prod_input" class="form-control" value="0" onkeyup="calcul_total()"/>
                                                    </td>
                                                    <td style="text-align:center">
                                                        {{ __('content.total') }}
                                                        <br>
                                                        <input type="text" id="total_prod_input" name="total_prod_input" class="form-control" value="0"/>
                                                        <input type="hidden" id="code_a_barre_prod_input" name="code_a_barre_prod_input" class="form-control"/>
                                                        <input type="hidden" id="id_prod_input" name="id_prod_input" class="form-control"/>
                                                    </td>
                                                    <td style="text-align:center;padding-top:30px">
                                                        <button type="button" class="btn btn-success" onclick="add_ligne_table_prod()">{{ __('content.Valider') }}</button>
                                                    </td>
                                                </tr>
                                            </table>
                                            <h5 class="pb-2 border-bottom mb-4">
                                                <br>
                                                {{ __('content.list_produits') }}
                                            </h5>
                                            <div style="text-align: right">
                                                <button type="button" class="btn btn-danger" style="width: 25%;" onclick="removeRow()">{{ __('content.Supprimer') }}</button>
                                            </div>
                                            <div class="card-datatable table-responsive">
                                                <table
                                                    class="datatables-users table border-top"
                                                    id="table_prod"
                                                >
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align:center"></th>
                                                            <th style="text-align:center">{{ __('content.Code') }}</th>
                                                            <th style="text-align:center">{{ __('content.desc') }}</th>
                                                            <th style="text-align:center;width: 150px;">{{ __('content.qte') }}</th>
                                                            <th style="text-align:center;width: 150px;">{{ __('content.pu') }}</th>
                                                            <th style="text-align:center;width: 150px;">{{ __('content.total') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-flex justify-content-center pt-3">

                                                <button type="submit" id="submitButton" class="btn btn-primary" onclick="submit_form()">{{ __('content.Valider') }}</button>
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
