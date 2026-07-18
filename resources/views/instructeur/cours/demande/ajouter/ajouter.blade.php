<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'cours','menuactive' =>'add_cours'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.instructeur.navbar')
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
                                                src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png"
                                                height="130"
                                                width="130"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{ __('content.demande_cours') }}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.cours') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="addNewUserForm" action="{{ route('instructeur.demande_cours.add') }}" class="row g-3">
                                            @csrf
                                            <input type="hidden" name="instructeur_id" value="{{ session('instructeur_id') }}">
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="categ_cours_id">{{ __('content.categ_cours') }}</label>
                                                <select id="categ_cours_id" name="categ_cours_id" class="select2 form-select" required>
                                                    <option value="null">{{ __('content.categ_cours') }}</option>
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['titre']}}</option>

                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="titre"
                                                >{{ __('content.libelle') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="titre"
                                                    placeholder="{{ __('content.libelle') }}"
                                                    name="titre"
                                                    aria-label="{{ __('content.libelle') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="sujet"
                                                >{{ __('content.sujet') }}</label
                                                >
                                                <textarea class="form-control"  id="sujet" name="sujet">

                                                </textarea>

                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="desc"
                                                >{{ __('content.desc') }}</label
                                                >

                                                <textarea class="form-control"  id="desc" name="desc">

                                                </textarea>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="emplacement"
                                                >{{ __('content.place') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="emplacement"
                                                    name="emplacement"
                                                    aria-label="{{ __('content.place') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="date"
                                                >{{ __('content.date') }}</label
                                                >
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="date"
                                                    value="{{ date('Y-m-d') }}"
                                                    name="date"
                                                    aria-label="{{ __('content.date') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="hdeb"
                                                >{{ __('content.heure_deb') }}</label
                                                >
                                                <input
                                                    type="time"
                                                    class="form-control"
                                                    id="hdeb"
                                                    value="{{ date('H:i') }}"
                                                    name="hdeb"
                                                    aria-label="{{ __('content.heure_deb') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="hfin"
                                                >{{ __('content.heure_fin') }}</label
                                                >
                                                <input
                                                    type="time"
                                                    class="form-control"
                                                    id="hfin"
                                                    value="{{ date('H:i') }}"
                                                    name="hfin"
                                                    aria-label="{{ __('content.heure_fin') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="frais"
                                                >{{ __('content.frais') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="frais"
                                                    value="0"
                                                    name="frais"
                                                    aria-label="{{ __('content.frais') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="select2Primary" class="form-label">{{ __('content.devise') }}</label>
                                                <div class="select2-primary">
                                                    <select id="devise" name="devise" class="select2 form-select">
                                                        <option value="DT">Dinar</option>
                                                        <option value="Eur">Euro</option>
                                                    </select>
                                                </div>

                                            </div>



                                            <div class="d-flex justify-content-center pt-3">

                                                <button type="submit" class="btn btn-primary" id="submitButton">{{ __('content.Valider') }}</button>
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
