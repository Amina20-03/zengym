<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'produits','menuactive' =>'produit'])

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

                                            @if($detail[0]['photo'])
                                                <img
                                                    class="img-fluid rounded my-4"
                                                    src="data:image/jpg;base64,{{ $detail[0]['photo'] }}"
                                                    height="110"
                                                    width="110"
                                                    alt="User avatar"
                                                />
                                            @else
                                                <img
                                                    class="img-fluid rounded my-4"
                                                    src="https://cdn-icons-png.flaticon.com/512/4129/4129528.png"
                                                    height="110"
                                                    width="110"
                                                    alt="User avatar"
                                                />
                                            @endif
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['code']}} -
                                                    {{$detail[0]['desc']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.produits') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" enctype="multipart/form-data" id="editUserForm" action="{{ route('admin.produit.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf
                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="photo"
                                                >{{ __('content.photo') }}</label
                                                >
                                                <input
                                                    type="file"
                                                    id="photo"
                                                    name="photo"
                                                    class="form-control"
                                                    value="{{$detail[0]['photo']}}"
                                                />
                                                <input
                                                    type="hidden"
                                                    id="photo_old"
                                                    name="photo_old"
                                                    class="form-control"
                                                    value="{{$detail[0]['photo']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="categ_produit_id">{{ __('content.categ_produit') }}</label>


                                                <select id="categ_produit_id" name="categ_produit_id" class="select2 form-select">

                                                    @if($detail[0]['categ_produit_id'] != 'null')
                                                        <option value="{{$detail[0]['categ_produit_id']}}">
                                                            {{$desc_cat }}
                                                        </option>
                                                        <option value="null">{{ __('content.categ_produit') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.categ_produit') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        @if($list_cat[$i]['id'] !=$detail[0]['categ_produit_id'])
                                                            <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['lib']}}</option>
                                                        @endif


                                                    @endfor



                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="code"
                                                >{{ __('content.Code') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="code"
                                                    name="code"
                                                    class="form-control"
                                                    value="{{$detail[0]['code']}}"
                                                    readonly
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="desc"
                                                >{{ __('content.desc') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="desc"
                                                    name="desc"
                                                    class="form-control"
                                                    value="{{$detail[0]['desc']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="couleur"
                                                >{{ __('content.couleur') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="couleur"
                                                    name="couleur"
                                                    class="form-control"
                                                    value="{{$detail[0]['couleur']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="dosage"
                                                >{{ __('content.dosage') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="dosage"
                                                    name="dosage"
                                                    class="form-control"
                                                    value="{{$detail[0]['dosage']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="prix_vente_ht"
                                                >{{ __('content.prix_vente_ht') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="prix_vente_ht"
                                                    name="prix_vente_ht"
                                                    class="form-control"
                                                    value="{{$detail[0]['prix_vente_ht']}}"
                                                    onkeyup="calcul_prix_net_ht()"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="prix_vente_net_ht"
                                                >{{ __('content.prix_vente_net_ht') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="prix_vente_net_ht"
                                                    name="prix_vente_net_ht"
                                                    class="form-control"
                                                    value="{{$detail[0]['prix_vente_net_ht']}}"
                                                    readonly
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="prix_vente_ttc"
                                                >{{ __('content.prix_vente_ttc') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="prix_vente_ttc"
                                                    name="prix_vente_ttc"
                                                    class="form-control"
                                                    value="{{$detail[0]['prix_vente_ttc']}}"
                                                    readonly
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="taux_tva"
                                                >{{ __('content.taux_tva') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="taux_tva"
                                                    name="taux_tva"
                                                    class="form-control"
                                                    value="{{$detail[0]['taux_tva']}}"
                                                    onkeyup="check_if_is_integer()"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="max_remise"
                                                >{{ __('content.max_remise') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="max_remise"
                                                    name="max_remise"
                                                    class="form-control"
                                                    value="{{$detail[0]['max_remise']}}"
                                                    onkeyup="calcul_prix_net_ht()"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6" style="padding-top: 35px">
                                                @if($detail[0]['active'])
                                                    <label class="switch">
                                                        <input type="checkbox" class="switch-input" name="active" checked>
                                                        <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                        <span class="switch-label">{{ __('content.oui') }}</span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" class="switch-input" name="active">
                                                        <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                        <span class="switch-label">{{ __('content.active') }}</span>
                                                    </label>
                                                @endif

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
