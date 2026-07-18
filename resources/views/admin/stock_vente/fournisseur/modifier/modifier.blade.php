<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'stock_vente','menuactive' =>'fournisseurs'])

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
                                                src="https://cdn-icons-png.freepik.com/512/10753/10753547.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['raison_soc_fourn']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('menu.fournisseurs') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="editUserForm" action="{{ route('admin.stock_vente.fournisseur.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf

                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="raison_soc_fourn"
                                                >{{ __('content.RAISON_SOCIALE') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="raison_soc_fourn"
                                                    placeholder="{{ __('content.RAISON_SOCIALE') }}"
                                                    name="raison_soc_fourn"
                                                    aria-label="{{ __('content.RAISON_SOCIALE') }}"
                                                    value="{{$detail[0]['raison_soc_fourn']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="contact_fourn"
                                                >{{ __('content.contact') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="contact_fourn"
                                                    placeholder="{{ __('content.contact') }}"
                                                    name="contact_fourn"
                                                    aria-label="{{ __('content.contact') }}"
                                                    value="{{$detail[0]['contact_fourn']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="tel1_fourn"
                                                >{{ __('content.tel1') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="tel1_fourn"
                                                    placeholder="{{ __('content.tel1') }}"
                                                    name="tel1_fourn"
                                                    aria-label="{{ __('content.tel1') }}"
                                                    value="{{$detail[0]['tel1_fourn']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="tel2_fourn"
                                                >{{ __('content.tel2') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="tel2_fourn"
                                                    placeholder="{{ __('content.tel2') }}"
                                                    name="tel2_fourn"
                                                    aria-label="{{ __('content.tel2') }}"
                                                    value="{{$detail[0]['tel2_fourn']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="mf_fourn"
                                                >{{ __('content.mf') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="mf_fourn"
                                                    placeholder="{{ __('content.mf') }}"
                                                    name="mf_fourn"
                                                    aria-label="{{ __('content.mf') }}"
                                                    value="{{$detail[0]['mf_fourn']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="rc_fourn"
                                                >{{ __('content.Registre_de_commerce') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="rc_fourn"
                                                    placeholder="{{ __('content.Registre_de_commerce') }}"
                                                    name="rc_fourn"
                                                    aria-label="{{ __('content.Registre_de_commerce') }}"
                                                    value="{{$detail[0]['rc_fourn']}}"
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
