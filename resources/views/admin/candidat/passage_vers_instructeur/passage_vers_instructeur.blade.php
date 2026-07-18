<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'candidats','menuactive' =>'liste_candidat'])

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

                                            <div
                                                    class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail_user[0]['prenom']}} {{$detail_user[0]['nom']}}
                                                </h4>
                                                <span
                                                        class="badge bg-label-secondary"
                                                >{{ __('content.candidats') }}</span
                                                >
                                            </div>

                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" enctype="multipart/form-data" id="formaddmois2" action="{{ route('admin.candidat.passage_vers_instructeur',$detail_user[0]['id']) }}" class="row g-3">
                                            @csrf

                                            <input
                                                    type="hidden"
                                                    class="form-control"
                                                    id="instructeur_id"
                                                    value="{{$detail_user[0]['instructeur_id']}}"
                                                    name="instructeur_id"
                                                    aria-label="{{ __('content.instructeur_id') }}"
                                            />
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
                                            <div class="col-12 col-md-4">
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
                                            <div class="col-12 col-md-4">
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

                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="pays_id">{{ __('content.pays') }}</label>
                                                <select id="pays_id" name="pays_id" class="select2 form-select" required>
                                                    @for($i=0;$i<count($list_pays);$i++)
                                                        <option value="{{$list_pays[$i]['id']}}">{{$list_pays[$i]['desc']}}</option>

                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="categ_instructeur_id">{{ __('content.categorie_instructeur') }}</label>
                                                <select id="categ_instructeur_id" name="categ_instructeur_id" class="select2 form-select" required>
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                                    @endfor
                                                </select>
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
                                                    {{ __('content.transformer_en_instructeur') }}
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
