<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'formations','menuactive' =>'dmd_formation'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.instructeur.navbar')
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
                                                src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['code']}} -
                                                    {{$detail[0]['date']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.formation') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="editUserForm" action="{{ route('instructeur.formation.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf
                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="photo_principale"
                                                >{{ __('content.photo_principale') }}</label
                                                >
                                                <input
                                                    type="file"
                                                    id="photo_principale"
                                                    name="photo_principale"
                                                    class="form-control"
                                                    value="{{$detail[0]['photo_principale']}}"
                                                />
                                                <input
                                                    type="hidden"
                                                    class="form-control"
                                                    id="photo_OLD"
                                                    value="{{$detail[0]['photo_principale']}}"
                                                    name="photo_old"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="categ_formation_id">{{ __('content.categ_formation') }}</label>


                                                <select id="categ_formation_id" name="categ_formation_id" class="select2 form-select">

                                                    @if($detail[0]['categ_formation_id'] != 'null')
                                                        <option value="{{$detail[0]['categ_formation_id']}}">
                                                            {{$cat }}
                                                        </option>
                                                        <option value="null">{{ __('content.categ_formation') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.categ_formation') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        @if($list_cat[$i]['id'] !=$detail[0]['categ_formation_id'])
                                                            <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['lib']}}</option>
                                                        @endif


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
                                                    value="{{ $detail[0]['titre'] }}"
                                                    name="titre"
                                                    aria-label="{{ __('content.libelle') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="sujet"
                                                >{{ __('content.sujet') }}</label
                                                >

                                                <textarea class="form-control"  id="sujet" name="sujet">
                                                    {{$detail[0]['sujet']}}
                                                </textarea>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="desc"
                                                >{{ __('content.desc') }}</label
                                                >

                                                <textarea class="form-control"  id="desc" name="desc">
                                                    {{$detail[0]['desc']}}
                                                </textarea>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="select2Primary" class="form-label">{{ __('content.langue') }}</label>
                                                <div class="select2-primary">
                                                    <select id="select2Primary" name="langue[]" class="select2 form-select" multiple>
                                                        <option value="English">English</option>
                                                        <option value="Spanish">Spanish</option>
                                                        <option value="French">French</option>
                                                        <option value="German">German</option>
                                                        <option value="Chinese">Chinese</option>
                                                        <option value="Japanese">Japanese</option>
                                                        <option value="Hindi">Hindi</option>
                                                        <option value="Arabic">Arabic</option>
                                                        <option value="Russian">Russian</option>
                                                        <option value="Portuguese">Portuguese</option>
                                                        <option value="Bengali">Bengali</option>
                                                        <option value="Punjabi">Punjabi</option>
                                                        <option value="Indonesian">Indonesian</option>
                                                        <option value="Korean">Korean</option>
                                                        <option value="Vietnamese">Vietnamese</option>
                                                        <option value="Italian">Italian</option>
                                                        <option value="Thai">Thai</option>
                                                        <option value="Turkish">Turkish</option>
                                                        <option value="Polish">Polish</option>
                                                        <option value="Dutch">Dutch</option>
                                                        <option value="Swedish">Swedish</option>
                                                        <option value="Danish">Danish</option>
                                                        <option value="Finnish">Finnish</option>
                                                        <option value="Norwegian">Norwegian</option>
                                                        <option value="Greek">Greek</option>
                                                        <option value="Hebrew">Hebrew</option>
                                                        <option value="Hungarian">Hungarian</option>
                                                        <option value="Czech">Czech</option>
                                                        <option value="Romanian">Romanian</option>
                                                        <option value="Bulgarian">Bulgarian</option>
                                                        <option value="Slovak">Slovak</option>
                                                        <option value="Ukrainian">Ukrainian</option>
                                                        <option value="Croatian">Croatian</option>
                                                        <option value="Serbian">Serbian</option>
                                                        <option value="Slovenian">Slovenian</option>
                                                        <option value="Lithuanian">Lithuanian</option>
                                                        <option value="Latvian">Latvian</option>
                                                        <option value="Estonian">Estonian</option>
                                                        <option value="Icelandic">Icelandic</option>
                                                        <option value="Malay">Malay</option>
                                                        <option value="Filipino">Filipino</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="date"
                                                >{{ __('content.date') }}</label
                                                >
                                                <input
                                                    type="date"
                                                    id="date"
                                                    name="date"
                                                    class="form-control"
                                                    value="{{$detail[0]['date'] ?? date('Y-m-d')}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="heure"
                                                >{{ __('content.heure') }}</label
                                                >
                                                <input
                                                    type="time"
                                                    id="heure"
                                                    name="heure"
                                                    class="form-control"
                                                    value="{{$detail[0]['heure'] ?? date('H:i')}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="nbr_place_max"
                                                >{{ __('content.nbr_place_max') }}</label
                                                >
                                                <input
                                                    type="number"
                                                    id="nbr_place_max"
                                                    name="nbr_place_max"
                                                    class="form-control"
                                                    value="{{$detail[0]['nbr_place_max']}}"
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
                                                    id="frais"
                                                    name="frais"
                                                    class="form-control"
                                                    value="{{$detail[0]['frais']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6" style="padding-top: 35px">
                                                @if($detail[0]['enligne'])
                                                    <label class="switch">
                                                        <input type="checkbox" class="switch-input" name="enligne" checked>
                                                        <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                        <span class="switch-label">{{ __('content.oui') }}</span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" class="switch-input" name="enligne">
                                                        <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                        <span class="switch-label">{{ __('content.enligne') }}</span>
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
