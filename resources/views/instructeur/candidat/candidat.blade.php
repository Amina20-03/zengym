<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'candidats','menuactive' =>'liste_candidat'])

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

                    <!-- Users List Table -->
                    <div class="card" style="padding: 10px">
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
                        {{--                        <div class="card-header border-bottom">--}}
                        {{--                            <h5 class="card-title">Search Filter</h5>--}}
                        {{--                            <div--}}
                        {{--                                class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0"--}}
                        {{--                            >--}}
                        {{--                                <div class="col-md-4 user_role"></div>--}}
                        {{--                                <div class="col-md-4 user_plan"></div>--}}
                        {{--                                <div class="col-md-4 user_status"></div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}


                        <div style=" float: right;text-align: right">
                            <button
                                type="button"
                                class="btn btn-primary me-sm-3 me-1 data-submit"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                            >
                                {{ __('content.ajouter_candidats') }}
                            </button>
                        </div>

                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table"
                                style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="width: 50px"></th>
                                    <th style="text-align:center">{{ __('content.nom') }}</th>
                                    <th style="text-align:center">{{ __('content.prenom') }}</th>
                                    <th style="text-align:center">{{ __('content.tel1') }}</th>
                                    <th style="text-align:center">{{ __('content.tel2') }}</th>
                                    <th style="text-align:center">{{ __('content.mail') }}</th>
                                    <th style="text-align:center">{{ __('content.adresse') }}</th>
                                    <th style="text-align:center">{{ __('content.cp') }}</th>
                                    <th style="text-align:center">{{ __('content.mt_affiliation') }}</th>
                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                    <th style="text-align:center">{{ __('content.salle_de_sport') }}</th>

                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        @if($elem['instructeur_id'] == session('instructeur_id'))
                                            <tr>

                                                <td style="text-align:center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png" alt="" style="width:30px;">
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nom']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['prenom']}}
                                                </td>

                                                <td style="text-align:center">
                                                    {{$elem['tel1']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['tel2']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['email']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['adr']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['cp']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['mt_affiliation']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['categ_candidat_desc']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['salle_sport_nom']}}
                                                </td>

                                                <td style="text-align:center">

                                                    <a href="{{route('instructeur.candidat.show',$elem['id'])}}" class="btn btn-sm btn-icon" title="Voir la fiche">
                                                        <i class="fa fa-eye" style="font-size:18px;color:#6a0dad;"></i>
                                                    </a>

                                                    <a href="{{route('instructeur.candidat.edit',$elem['id'])}}" class="btn btn-sm btn-icon">
                                                        <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">
                                                    </a>

                                                    <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                                    </a>

                                                </td>
                                            </tr>
                                        @endif

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>






                    <!-- Offcanvas to add new user -->

                </div>
                <form method="POST" action="{{route('instructeur.candidat.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>




                <div
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasAddUser"
                    aria-labelledby="offcanvasAddUserLabel"
                >
                    <div class="offcanvas-header">
                        <h5
                            id="offcanvasAddUserLabel"
                            class="offcanvas-title"
                        >
                            {{ __('content.ajouter_candidats') }}

                        </h5>
                        <button
                            type="button"
                            class="btn-close text-reset"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div
                        class="offcanvas-body mx-0 flex-grow-0"
                        style="height: 100%"
                    >

                        <form method="POST" id="addNewUserForm" action="{{ route('instructeur.candidat.add') }}" class="row g-3">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="categ_candidat_id">{{ __('content.categ_candidat') }}</label>
                                <select id="categ_candidat_id" name="categ_candidat_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.categ_candidat') }}</option>
                                    @for($i=0;$i<count($list_cat);$i++)
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['titre']}}</option>

                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="nom"
                                >{{ __('content.nom') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nom"
                                    placeholder="{{ __('content.nom') }}"
                                    name="nom"
                                    aria-label="{{ __('content.nom') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="prenom"
                                >{{ __('content.prenom') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="prenom"
                                    placeholder="{{ __('content.prenom') }}"
                                    name="prenom"
                                    aria-label="{{ __('content.prenom') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="adr"
                                >{{ __('content.adresse') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="adr"
                                    placeholder="{{ __('content.adresse') }}"
                                    name="adr"
                                    aria-label="{{ __('content.adresse') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="tel1"
                                >{{ __('content.tel1') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tel1"
                                    placeholder="{{ __('content.tel1') }}"
                                    name="tel1"
                                    aria-label="{{ __('content.tel1') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="tel2"
                                >{{ __('content.tel2') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tel2"
                                    placeholder="{{ __('content.tel2') }}"
                                    name="tel2"
                                    aria-label="{{ __('content.tel2') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="email"
                                >{{ __('content.mail') }}</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="{{ __('content.mail') }}"
                                    name="email"
                                    aria-label="{{ __('content.mail') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="cp"
                                >{{ __('content.cp') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="cp"
                                    placeholder="{{ __('content.cp') }}"
                                    name="cp"
                                    aria-label="{{ __('content.cp') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="mt_affiliation"
                                >{{ __('content.mt_affiliation') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="mt_affiliation"
                                    placeholder="{{ __('content.mt_affiliation') }}"
                                    name="mt_affiliation"
                                    aria-label="{{ __('content.mt_affiliation') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="salle_sport_id">{{ __('content.salle_de_sport') }}</label>
                                <select id="salle_sport_id" name="salle_sport_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.salle_de_sport') }}</option>
                                    @for($i=0;$i<count($list_salle_sport);$i++)
                                        <option value="{{$list_salle_sport[$i]['id']}}">{{$list_salle_sport[$i]['nom']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label
                                        class="form-label"
                                        for="code_instr"
                                >Votre code à partager</label
                                >
                                <input
                                        type="text"
                                        class="form-control"
                                        id="code_instr"
                                        placeholder="{{ __('content.Code') }}"
                                        value="{{session('code_instr')}}"
                                        name="code_instr"
                                        aria-label="{{ __('content.Code') }}"
                                        readonly
                                />
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary me-sm-3 me-1 data-submit"
                                id="submitButton"
                            >
                                {{ __('content.Valider') }}
                            </button>
                            <button
                                type="reset"
                                class="btn btn-label-secondary"
                                data-bs-dismiss="offcanvas"
                            >
                                {{ __('content.Annuler') }}
                            </button>

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
