<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'utilisateurs','menuactive' =>'instructeur'])

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
                                                    src="https://www.geiq-ams.fr/wp-content/uploads/2016/05/user-2-300x300.png"
                                                    height="110"
                                                    width="110"
                                                    alt="User avatar"
                                                />
                                            @endif
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail_user[0]['prenom']}} {{$detail_user[0]['nom']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.instructeur') }}</span
                                                >
                                            </div>

                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" enctype="multipart/form-data" id="formaddmois2" action="{{ route('admin.instructeur.update',$detail[0]['id']) }}" class="row g-3">
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
                                                    class="form-control"
                                                    id="photo_OLD"
                                                    value="{{$detail[0]['photo']}}"
                                                    name="photo_old"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label
                                                        class="form-label"
                                                        for="code_instr"
                                                >{{ __('content.Code') }}</label
                                                >
                                                <!-- {{$randomCode = strtoupper(Str::random(8)).'-'.\Illuminate\Support\Facades\DB::table('instructeurs')->value('id')}} -->
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="code_instr"
                                                        value="{{$detail[0]['code_instr'] ?? $randomCode}}"
                                                        name="code_instr"
                                                        aria-label="{{ __('content.Code') }}"
                                                />
                                            </div>
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

                                                @if($detail[0]['sexe']=="F")
                                                    <div class="form-check form-check-danger">
                                                        <input name="sexe" class="form-check-input" type="radio" id="customRadioDanger" value="female" checked />
                                                        <label class="form-check-label" for="sexe"> {{ __('content.femme') }} </label>
                                                    </div>
                                                    <div class="form-check form-check-dark">
                                                        <input name="sexe" class="form-check-input" type="radio" id="customRadioDark" value="male"/>
                                                        <label class="form-check-label" for="sexe"> {{ __('content.homme') }} </label>
                                                    </div>
                                                @else
                                                    <div class="form-check form-check-danger">
                                                        <input name="sexe" class="form-check-input" type="radio" id="customRadioDanger" value="female"  />
                                                        <label class="form-check-label" for="sexe"> {{ __('content.femme') }} </label>
                                                    </div>
                                                    <div class="form-check form-check-dark">
                                                        <input name="sexe" class="form-check-input" type="radio" id="customRadioDark" value="male" checked/>
                                                        <label class="form-check-label" for="sexe"> {{ __('content.homme') }} </label>
                                                    </div>
                                                @endif
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
                                                    value="{{$detail[0]['profession']}}"
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
                                                    name="mail"
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
                                                    value="{{ $detail[0]['date_naiss']??date('Y-m-d')}}"
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
                                                    type="text"
                                                    class="form-control"
                                                    id="cin"
                                                    value="{{$detail[0]['cin']}}"
                                                    name="cin"
                                                    aria-label="{{ __('content.cin') }}"
                                                />
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="pays_id">{{ __('content.pays') }}</label>


                                                <select id="pays_id" name="pays_id" class="select2 form-select">

                                                    @if($detail[0]['pays_id'] != 'null')
                                                        <option value="{{$detail[0]['pays_id']}}">
                                                            {{$desc_pays }}
                                                        </option>
                                                        <option value="null">{{ __('content.pays') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.pays') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_pays);$i++)
                                                        @if($list_pays[$i]['id'] !=$detail[0]['pays_id'])
                                                            <option value="{{$list_pays[$i]['id']}}">{{$list_pays[$i]['desc']}}</option>
                                                        @endif


                                                    @endfor



                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <label class="form-label" for="categ_instructeur_id">{{ __('content.categorie_instructeur') }}</label>


                                                <select id="categ_instructeur_id" name="categ_instructeur_id" class="select2 form-select">

                                                    @if($detail[0]['categ_instructeur_id'] != 'null')
                                                        <option value="{{$detail[0]['categ_instructeur_id']}}">
                                                            {{$desc_cat }}
                                                        </option>
                                                        <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        @if($list_cat[$i]['id'] !=$detail[0]['categ_instructeur_id'])
                                                            <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>
                                                        @endif


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
                                        <form method="POST" id="editPasswordForm" action="{{ route('admin.instructeur.updatepassword',$detail[0]['id']) }}" class="row g-3">
                                            @csrf

{{--                                            <div class="col-12 col-md-12">--}}
{{--                                                <label--}}
{{--                                                    class="form-label"--}}
{{--                                                    for="ancienpassword"--}}
{{--                                                >{{ __('content.Ancien_mot_de_passe') }}</label--}}
{{--                                                >--}}
{{--                                                <input--}}
{{--                                                    type="password"--}}
{{--                                                    class="form-control"--}}
{{--                                                    id="ancienpassword"--}}
{{--                                                    placeholder="******"--}}
{{--                                                    name="ancienpassword"--}}
{{--                                                    aria-label="******"--}}
{{--                                                />--}}
{{--                                            </div>--}}
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
