<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'candidats','menuactive' =>'salle_de_sport'])

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
                                    <div class="user-avatar-section">
                                        <div
                                            class="d-flex align-items-center flex-column"
                                        >
                                            <img
                                                class="img-fluid rounded my-4"
                                                src="https://cdn-icons-png.flaticon.com/512/7241/7241777.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['code']}} -
                                                    {{$detail[0]['nom']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.salle_de_sport') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="editUserForm" action="{{ route('admin.candidat.salle_de_sports.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf

                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="nom"
                                                >{{ __('content.nom') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="nom"
                                                    name="nom"
                                                    class="form-control"
                                                    value="{{$detail[0]['nom']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="adresse"
                                                >{{ __('content.adresse') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="adresse"
                                                    name="adresse"
                                                    class="form-control"
                                                    value="{{$detail[0]['adresse']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="tel1"
                                                >{{ __('content.tel1') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="tel1"
                                                    name="tel1"
                                                    class="form-control"
                                                    value="{{$detail[0]['tel1']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="tel2"
                                                >{{ __('content.tel2') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="tel2"
                                                    name="tel2"
                                                    class="form-control"
                                                    value="{{$detail[0]['tel2']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="email"
                                                >{{ __('content.mail') }}</label
                                                >
                                                <input
                                                    type="email"
                                                    id="email"
                                                    name="email"
                                                    class="form-control"
                                                    value="{{$detail[0]['email']}}"
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
