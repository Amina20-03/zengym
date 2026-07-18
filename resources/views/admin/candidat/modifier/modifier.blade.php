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
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['nom']}} -
                                                    {{$detail[0]['prenom']}}
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
                                        <form method="POST" id="editUserForm" action="{{ route('admin.candidat.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="categ_candidat_id">{{ __('content.categ_candidat') }}</label>


                                                <select id="categ_candidat_id" name="categ_candidat_id" class="select2 form-select">

                                                    @if($detail[0]['categ_candidat_id'] != 'null')
                                                        <option value="{{$detail[0]['categ_candidat_id']}}">
                                                            {{$cat }}
                                                        </option>
                                                        <option value="null">{{ __('content.categ_candidat') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.categ_candidat') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        @if($list_cat[$i]['id'] !=$detail[0]['categ_candidat_id'])
                                                            <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['titre']}}</option>
                                                        @endif


                                                    @endfor



                                                </select>
                                            </div>
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
                                                    for="prenom"
                                                >{{ __('content.prenom') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="prenom"
                                                    name="prenom"
                                                    class="form-control"
                                                    value="{{$detail[0]['prenom']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="adr"
                                                >{{ __('content.adresse') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="adr"
                                                    name="adr"
                                                    class="form-control"
                                                    value="{{$detail[0]['adr']}}"
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
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="cp"
                                                >{{ __('content.cp') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="cp"
                                                    name="cp"
                                                    class="form-control"
                                                    value="{{$detail[0]['cp']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="mt_affiliation"
                                                >{{ __('content.mt_affiliation') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="mt_affiliation"
                                                    name="mt_affiliation"
                                                    class="form-control"
                                                    value="{{$detail[0]['mt_affiliation']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="salle_sport_id">{{ __('content.salle_de_sport') }}</label>


                                                <select id="salle_sport_id" name="salle_sport_id" class="select2 form-select">

                                                    @if($detail[0]['salle_sport_id'] != 'null')
                                                        <option value="{{$detail[0]['salle_sport_id']}}">
                                                            {{$salle_sport }}
                                                        </option>
                                                        <option value="null">{{ __('content.salle_de_sport') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.salle_de_sport') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_salle_sport);$i++)
                                                        @if($list_salle_sport[$i]['id'] !=$detail[0]['salle_sport_id'])
                                                           <option value="{{$list_salle_sport[$i]['id']}}">{{$list_salle_sport[$i]['nom']}}</option>
                                                        @endif


                                                    @endfor



                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="instructeur_id">{{ __('content.instructeur') }}</label>


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
                                            <div class="col-12 col-md-6">
                                                <label
                                                        class="form-label"
                                                        for="password"
                                                >{{ __('content.password') }}</label
                                                >
                                                <input
                                                        type="text"
                                                        id="password"
                                                        name="password"
                                                        class="form-control"
                                                        placeholder="***"
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
