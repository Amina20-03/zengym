<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'vente_prod','menuactive' =>'liste_vente_prod'])

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

                                    <div class="info-container">
                                        <form method="POST" id="add_vente_form" action="{{route('admin.vente_prod.add')}}" class="row g-3">
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
                                                    value="{{$detail[0]['date']}}"
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
                                                <select id="instructeur_id" name="instructeur_id" class="select2 form-select">

                                                    @if($detail[0]['instructeur_id'] != 'null')
                                                        <option value="{{$detail[0]['instructeur_id']}}">
                                                            {{$instructeur }}
                                                        </option>
                                                        <option value="null">{{ __('content.instructeur') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.instructeur') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_instructeurs);$i++)
                                                        @if($list_instructeurs[$i]['id'] !=$detail[0]['instructeur_id'])
                                                            <option value="{{$list_instructeurs[$i]['instructeur_id']}}">{{$list_instructeurs[$i]['nom']}} {{$list_instructeurs[$i]['prenom']}}</option>
                                                        @endif


                                                    @endfor



                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="date"
                                                >{{ __('content.categorie') }}</label
                                                >
                                                <select id="cat_prod_id" name="cat_prod_id" class="select2 form-select" required  onchange="remplir_list_produit()">
                                                    <option value="null">{{ __('content.categorie') }}</option>
                                                    @for($i=0;$i<count($list_cat_prod);$i++)
                                                        <option value="{{$list_cat_prod[$i]['id']}}">{{$list_cat_prod[$i]['lib']}}</option>

                                                    @endfor
                                                </select>
                                            </div>

                                            <div class="card-datatable table-responsive">
                                                <table
                                                    class="datatables-users table border-top"
                                                    style="white-space: nowrap;"
                                                >
                                                    <tr>
                                                        <td style="text-align:center">
                                                            {{ __('content.produits') }}
                                                            <br>
                                                            <select id="prod_id" name="prod_id" class="select2 form-select" onchange="remplir_partie_detail()">

                                                            </select>
                                                        </td>
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
                                                            {{ __('content.qte') }}
                                                            <br>
                                                            <input type="number" id="qte_prod_input" name="qte_prod_input" class="form-control" value="1"/>
                                                        </td>
                                                        <td style="text-align:center;width:150px">
                                                            {{ __('content.pu_ttc') }}
                                                            <br>
                                                            <input type="text" id="pu_prod_input" name="pu_prod_input" class="form-control" value="0"/>
                                                            <input type="hidden" id="id_prod_input" name="id_prod_input" class="form-control"/>
                                                            <input type="hidden" id="prix_vente_ht_input" name="prix_vente_ht_input" class="form-control"/>
                                                            <input type="hidden" id="taux_tva_input" name="taux_tva_input" class="form-control"/>
                                                        </td>

                                                        <td style="text-align:center;padding-top:30px;">
                                                            <button type="button" class="btn btn-success" onclick="add_ligne_table_prod()">+</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div style="text-align: right">
                                                <button type="button" class="btn btn-danger" style="width: 25%;" onclick="removeRow()">{{ __('content.Supprimer') }}</button>
                                            </div>
                                            <div class="card-datatable table-responsive">
                                                <table
                                                    class="datatables-users table border-top"
                                                    id="table_prod"
                                                    style="white-space: nowrap;"
                                                >
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align:center"></th>
                                                        <th style="text-align:center">{{ __('content.Code') }}</th>
                                                        <th style="text-align:center">{{ __('content.desc') }}</th>
                                                        <th style="text-align:center;width: 150px;">{{ __('content.qte') }}</th>
                                                        <th style="text-align:center;width: 150px;">{{ __('content.pu_ht') }}</th>
                                                        <th style="text-align:center;width: 150px;">{{ __('content.remise') }}</th>
                                                        <th style="text-align:center;width: 150px;">{{ __('content.pu_net_ht') }}</th>
                                                        <th style="text-align:center;width: 150px;">{{ __('content.total_net_ht') }}</th>
                                                        <th style="text-align:center;width: 150px;">{{ __('content.taux_tva') }}</th>
                                                        <th style="text-align:center;width: 150px;">{{ __('content.tot_ttc') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label
                                                    class="form-label"
                                                    for="total_net_ht"
                                                >{{ __('content.total_net_ht') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="total_net_ht_final"
                                                    value="0"
                                                    name="total_net_ht_final"
                                                    aria-label="{{ __('content.total_net_ht') }}"
                                                    readonly
                                                />
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label
                                                    class="form-label"
                                                    for="tot_ttc"
                                                >{{ __('content.tot_ttc') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="tot_ttc_final"
                                                    value="0"
                                                    name="tot_ttc_final"
                                                    aria-label="{{ __('content.tot_ttc') }}"
                                                    readonly
                                                />
                                            </div>
                                            <input
                                                type="hidden"
                                                id="qte_list"
                                                name="qte_list"
                                                class="form-control"
                                            />
                                            <input
                                                type="hidden"
                                                id="pu_vente_list"
                                                name="pu_vente_list"
                                                class="form-control"
                                            />
                                            <input
                                                type="hidden"
                                                id="pu_net_ht_vente_list"
                                                name="pu_net_ht_vente_list"
                                                class="form-control"
                                            />
                                            <input
                                                type="hidden"
                                                id="remise_list"
                                                name="remise_list"
                                                class="form-control"
                                            />
                                            <input
                                                type="hidden"
                                                id="prod_id_list"
                                                name="prod_id_list"
                                                class="form-control"
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
