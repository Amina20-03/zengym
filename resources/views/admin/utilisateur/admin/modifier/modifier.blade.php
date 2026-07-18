<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'utilisateurs','menuactive' =>'Admin'])

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
                            class="col-xl-6 col-lg-5 col-md-5 order-1 order-md-0"
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
                                                src="https://www.geiq-ams.fr/wp-content/uploads/2016/05/user-2-300x300.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail_user[0]['prenom']}} {{$detail_user[0]['nom']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.Admin') }}</span
                                                >
                                            </div>

                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" enctype="multipart/form-data" id="formaddmois2" action="{{ route('admin.admin.update',$detail_user[0]['id']) }}" class="row g-3">
                                            @csrf

                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="prenom"
                                                >{{ __('content.prenom') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="prenom"
                                                    value="{{$detail_user[0]['prenom']}}"
                                                    name="prenom"
                                                    aria-label="{{ __('content.prenom') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="nom"
                                                >{{ __('content.nom') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="nom"
                                                    value="{{$detail_user[0]['nom']}}"
                                                    name="nom"
                                                    aria-label="{{ __('content.nom') }}"
                                                />
                                            </div>


                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="mail"
                                                >{{ __('content.mail') }}</label
                                                >
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    id="mail"
                                                    value="{{$detail_user[0]['mail']}}"
                                                    name="EMAIL"
                                                    aria-label="{{ __('content.mail') }}"
                                                />
                                                <input
                                                    type="hidden"
                                                    class="form-control"
                                                    id="EMAIL_OLD"
                                                    value="{{$detail_user[0]['mail']}}"
                                                    name="mail_old"
                                                    aria-label="{{ __('content.EMAIL') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="adresse"
                                                >{{ __('content.adresse') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="adresse"
                                                    value="{{$detail_user[0]['adresse']}}"
                                                    name="adresse"
                                                    aria-label="{{ __('content.adresse') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="tel"
                                                >{{ __('content.tel') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="tel"
                                                    value="{{$detail_user[0]['tel']}}"
                                                    name="tel"
                                                    aria-label="{{ __('content.tel') }}"
                                                />
                                            </div>



                                            <div class="col-12 col-md-4">
                                                <label
                                                    class="form-label"
                                                    for="email"
                                                >{{ __('content.login') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="email"
                                                    value="{{$detail_user[0]['email']}}"
                                                    name="email"
                                                    aria-label="Login"
                                                />
                                            </div>
                                            <div class="d-flex justify-content-center pt-3">
                                                <button
                                                    type="submit"
                                                    id="submitButton"
                                                    class="btn btn-primary me-sm-3 me-1 data-submit"
                                                    onclick="edituserform_funct()"
                                                >
                                                    {{ __('content.Modifier') }}
                                                </button>

                                            </div>
                                        </form>
                                        <br>
                                        <br>
                                        <br>
                                    </div>


                                </div>
                            </div>
                            <!-- /User Card -->


                        </div>
                        <!--/ User Sidebar -->

                        <div
                            class="col-xl-6 col-lg-5 col-md-5 order-1 order-md-0"
                        >

                            <div class="card mb-12">
                                <div class="card-body">

                                    <div class="user-avatar-section">
                                        <div
                                            class="d-flex align-items-center flex-column"
                                        >
                                            <img
                                                class="img-fluid rounded my-4"
                                                src="https://cdn-icons-png.flaticon.com/512/6195/6195699.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail_user[0]['nom']}}
                                                    {{$detail_user[0]['prenom']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.Utilisateur') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Modifier_le_mot_de_passe') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="editPasswordForm" action="{{ route('admin.admin.updatepassword',$detail_user[0]['id']) }}" class="row g-3">
                                            @csrf

                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="ancienpassword"
                                                >{{ __('content.Ancien_mot_de_passe') }}</label
                                                >
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="ancienpassword"
                                                    placeholder="******"
                                                    name="ancienpassword"
                                                    aria-label="******"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="mail"
                                                >{{ __('content.Nouveau_mot_de_passe') }}</label
                                                >
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="password"
                                                    placeholder="******"
                                                    name="password"
                                                    aria-label="******"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="Salaire"
                                                >{{ __('content.Confirmer_le_mot_de_passe') }}</label
                                                >
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="conf_password"
                                                    placeholder="******"
                                                    name="conf_password"
                                                    aria-label="******"
                                                />
                                            </div>



                                            <div class="d-flex justify-content-center pt-3">

                                                <button type="submit" class="btn btn-primary" onclick="editPasswordForm_funct()" id="submitButton2">{{ __('content.Modifier') }}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- / Content -->

                <!-- Footer -->
                <!-- Footer-->
                @include('layouts.footer')
                <!--/ Footer-->
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
