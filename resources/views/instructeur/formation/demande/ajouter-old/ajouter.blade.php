<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'formations','menuactive' =>'add_formation'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.instructeur.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper" style="margin-top: -100px">
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
                            <div id="loader" style="display: none; color:red;text-align: center; font-size: 18px; margin-top: 20px;">
                                Loading, please wait...
                            </div>
                            <div class="card mb-12">
                                <div class="card-body">


                                    <h4 class="pb-2 mb-4">
                                        {{ __('content.demande_formation') }}
                                    </h4>

                                    <div class="info-container">
                                        <form method="POST" id="addNewUserForm" action="{{ route('instructeur.formation.add') }}" enctype="multipart/form-data"  class="row g-3">
                                            @csrf
                                            <div class="wizard card-like">

                                                <div class="wizard-header">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <hr />
                                                            <div class="steps text-center">
                                                                <div class="wizard-step active"></div>
                                                                <div class="wizard-step"></div>
                                                                <div class="wizard-step"></div>
                                                                <div class="wizard-step"></div>
                                                                <div class="wizard-step"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wizard-body">
                                                    <div class="step initial active">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12" style="margin-top: -40px">
                                                                <h5 style="color:#000;">
                                                                    {{ __('content.Détails') }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <label
                                                                    class="form-label"
                                                                    for="titre"
                                                                >{{ __('content.photo_principale') }}</label
                                                                >
                                                                <input
                                                                    type="file"
                                                                    class="form-control"
                                                                    id="photo_principale"
                                                                    placeholder="{{ __('content.photo_principale') }}"
                                                                    name="photo_principale"
                                                                    aria-label="{{ __('content.photo_principale') }}"
                                                                />
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="categ_formation_id">{{ __('content.categ_formation') }}</label>
                                                                <select id="categ_formation_id" name="categ_formation_id" class="select2 form-select" required>
                                                                    <option value="null">{{ __('content.categ_formation') }}</option>
                                                                    @for($i=0;$i<count($list_cat);$i++)
                                                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['lib']}}</option>

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
                                                                    for="lieu"
                                                                >{{ __('content.place') }}</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="lieu"
                                                                    name="lieu"
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
                                                                    for="heure"
                                                                >{{ __('content.heure') }}</label
                                                                >
                                                                <input
                                                                    type="time"
                                                                    class="form-control"
                                                                    id="heure"
                                                                    value="{{ date('H:i') }}"
                                                                    name="heure"
                                                                    aria-label="{{ __('content.heure') }}"
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
                                                            <div class="col-12 col-md-6">
                                                                <label
                                                                    class="form-label"
                                                                    for="nbr_place_max"
                                                                >{{ __('content.nbr_place_max') }}</label
                                                                >
                                                                <input
                                                                    type="number"
                                                                    class="form-control"
                                                                    id="nbr_place_max"
                                                                    value="0"
                                                                    name="nbr_place_max"
                                                                    aria-label="{{ __('content.nbr_place_max') }}"
                                                                />
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label
                                                                    class="form-label"
                                                                    for="contact"
                                                                >{{ __('content.contact') }}</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="contact"
                                                                    placeholder="+000 00 000 000"
                                                                    name="contact"
                                                                    aria-label="{{ __('content.contact') }}"
                                                                />
                                                            </div>
                                                            <div class="col-12 col-md-6" style="padding-top: 35px">
                                                                <label class="switch">
                                                                    <input type="checkbox" class="switch-input" name="enligne">
                                                                    <span class="switch-toggle-slider">
                                                            <span class="switch-on"></span>
                                                            <span class="switch-off"></span>
                                                        </span>
                                                                    <span class="switch-label">{{ __('content.enligne') }}</span>
                                                                </label>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="step">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <input id="fileInput" name="photos[]" type="file" multiple accept="image/*" onchange="app.actions.handleFiles(this.files, 'image')">
                                                                <label class="drop-content" for="fileInput">
                                                                    {{ __('content.Drops image to attach, or click and select') }}
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="none" viewBox="0 0 24 20"
                                                                         stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                                    </svg>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <div id="uploadedImage"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="step">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <input id="videoInput" name="videos[]" type="file" multiple accept="video/*" onchange="app.actions.handleFiles(this.files, 'video')">
                                                                <label class="drop-content" for="videoInput">
                                                                    {{ __('content.Drops video to attach, or click and select') }}
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="none" viewBox="0 0 24 20"
                                                                         stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                                    </svg>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <div id="uploadedVideo"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="step">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <input id="docInput" name="docs[]" type="file" multiple accept="pdf/*" onchange="app.actions.handleFiles(this.files, 'doc')">
                                                                <label class="drop-content" for="docInput">
                                                                    {{ __('content.Drops documents to attach, or click and select') }}
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="none" viewBox="0 0 24 20"
                                                                         stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                                    </svg>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <div id="uploadedDoc"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="step">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <input id="audioInput" name="audios[]" type="file" multiple accept=".m4a, .mp3" onchange="app.actions.handleFiles(this.files, 'audio')">
                                                                <label class="drop-content" for="audioInput">
                                                                    {{ __('content.Drops musics to attach, or click and select') }}
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="none" viewBox="0 0 24 20"
                                                                         stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                                    </svg>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <div id="uploadedAudio"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wizard-footer">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12">
                                                            <table>
                                                                <tr>
                                                                    <th>
                                                                        <button id="wizard-prev" style="display:none;background: #03cf68" type="button" class="btn btn-irv btn-irv-default">
                                                                            {{ __('content.sPrevious') }}
                                                                        </button>
                                                                    </th>
                                                                    <th>
                                                                        <button id="wizard-next" type="button" class="btn btn-irv" style=" background: #9d32b6;">
                                                                            {{ __('content.sNext') }}
                                                                        </button>
                                                                    </th>
                                                                    <th>
                                                                        <button id="wizard-subm" style="display:none;background: #9d32b6" type="submit" class="btn btn-irv">
                                                                            {{ __('content.Valider') }}
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>

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
