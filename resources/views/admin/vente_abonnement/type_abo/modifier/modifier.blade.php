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
                                                    {{$detail[0]['desc']}}
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
                                        <form method="POST" id="editUserForm" action="{{ route('admin.type_abo.update',$detail[0]['id']) }}" class="row g-3">
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
                                                    for="desc"
                                                >{{ __('content.type_abo') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="desc"
                                                    name="desc"
                                                    class="form-control"
                                                    value="{{$detail[0]['desc']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="nb_mois"
                                                >{{ __('content.nb_mois') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="nb_mois"
                                                    name="nb_mois"
                                                    class="form-control"
                                                    value="{{$detail[0]['nb_mois']}}"
                                                />
                                            </div>

                                            <div class="col-12 col-md-4">
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
                                                    onkeyup="calcul_total_ttc()"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="prix_ht"
                                                >{{ __('content.pu_ht') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="prix_ht"
                                                    name="prix_ht"
                                                    class="form-control"
                                                    value="{{$detail[0]['prix_ht']}}"
                                                    onkeyup="calcul_total_ttc()"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="prix_ttc"
                                                >{{ __('content.pu_ttc') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="prix_ttc"
                                                    name="prix_ttc"
                                                    class="form-control"
                                                    value="{{$detail[0]['prix_ttc']}}"
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
