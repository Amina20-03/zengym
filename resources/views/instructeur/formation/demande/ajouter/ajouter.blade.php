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

                            <!-- Navbar pills -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="nav-align-top">
                                        <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                                            <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-user bx-sm me-1_5'></i> {{ __('content.Détails') }}</a></li>
{{--                                            <li class="nav-item"><a class="nav-link" href="javascript:void(0);"><i class='bx bx-group bx-sm me-1_5'></i> Média</a></li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Navbar pills -->
{{--                            <form method="post" id="addNewUserForm" action="{{ route('instructeur.demande_formation.create.media') }}" enctype="multipart/form-data"  class="row g-3">--}}
                            <form method="post" id="addNewUserForm" action="{{ route('instructeur.formation.add') }}" enctype="multipart/form-data"  class="row g-3">
                                @csrf
                                <!-- User Profile Content -->
                                <div class="row">
                                    <div class="col-xl-12 col-lg-5 col-md-5">
                                        <!-- About User -->
                                        <div class="card mb-6">
                                            <div class="card-body">
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
                                                        <input type="hidden" name="photo_principale_old" id="photo_principale_old"/>
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
                                                                aria-label="{{ __('content.libelle') }}" required
                                                        />
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <label
                                                                class="form-label"
                                                                for="sujet"
                                                        >{{ __('content.sujet') }}</label
                                                        >
                                                        <textarea class="form-control"  id="sujet" name="sujet" required>

                                                        </textarea>

                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <label
                                                                class="form-label"
                                                                for="desc"
                                                        >{{ __('content.desc') }}</label
                                                        >

                                                        <textarea class="form-control"  id="desc" name="desc" required>

                                                        </textarea>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="select2Primary" class="form-label">{{ __('content.langue') }}</label>
                                                        <div class="select2-primary">
                                                            <select id="select2Primary" name="langue[]" class="select2 form-select" multiple required>
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
                                                                aria-label="{{ __('content.place') }}" required
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
                                                                aria-label="{{ __('content.date') }}" required
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
                                                                aria-label="{{ __('content.frais') }}" required
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
                                                                aria-label="{{ __('content.contact') }}" required
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
                                                    <div class="col-12 col-md-12" style="padding-top: 35px">
                                                        <table style="width: 100%">
                                                            <tr>
                                                                <th>
{{--                                                                    <button style="background: #03cf68;color: white" type="button" class="btn btn-irv btn-irv-default">--}}
{{--                                                                        {{ __('content.sPrevious') }}--}}
{{--                                                                    </button>--}}
                                                                </th>
                                                                <th style="text-align: right">
{{--                                                                    <button type="submit" class="btn btn-irv" style=" background: #9d32b6;color: white">--}}
{{--                                                                        {{ __('content.sNext') }}--}}
{{--                                                                    </button>--}}
                                                                    <button type="submit" class="btn btn-irv" style=" background: #9d32b6;color: white">
                                                                        {{ __('content.Valider') }}
                                                                    </button>
                                                                </th>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ About User -->

                                    </div>
                                </div>
                                <!--/ User Profile Content -->
                            </form>
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
