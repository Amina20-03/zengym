<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'formations','menuactive' =>'liste_formation'])

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




                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table"
                                style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="width: 50px"></th>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.date') }}</th>
                                    <th style="text-align:center">{{ __('content.heure') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_participant') }}</th>
                                    <th style="text-align:center">{{ __('content.sujet') }}</th>
                                    <th style="text-align:center">{{ __('content.frais') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_place_max') }}</th>
                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                    <th style="text-align:center">{{ __('content.approuver') }}</th>
                                    <th style="text-align:center">{{ __('content.realiser') }}</th>
                                    <th style="text-align:center">{{ __('content.enligne') }}</th>
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
                                                    {{$elem['code']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date']}}
                                                </td>

                                                <td style="text-align:center">
                                                    {{$elem['heure']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_participant']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['sujet']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['frais']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_place_max']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['categ_formation_desc']}}
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['approuver'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['realiser'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['enligne'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['approuver'])
                                                        <a href="{{route('formation.photos',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                            Photos
                                                        </a>
                                                    @endif

                                                    <br>
                                                    @if($elem['approuver'])

                                                        @if($elem['date'] < date('Y-m-d'))
                                                            @if(!$elem['realiser'])
                                                                <a href="{{route('instructeur.formation.realiser',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                                    {{ __('content.realiser') }}
                                                                </a>
                                                            @endif


                                                        @elseif($elem['date'] == date('Y-m-d'))
                                                            @if($elem['heure'] <= date('H:i'))
                                                                @if(!$elem['realiser'])
                                                                    <a href="{{route('instructeur.formation.realiser',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                                        {{ __('content.realiser') }}

                                                                    </a>
                                                                @endif

                                                                @if($elem['categ_formation_id'] == 2)
                                                                    <button
                                                                            type="button"
                                                                            class="btn btn-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#basicModal"
                                                                            data-formation-id="{{ $elem['id'] }}"
                                                                            onclick="setFormationId(this)">

                                                                        Démarrer la session
                                                                    </button>
                                                                @endif
                                                            @else
                                                                    @if($elem['categ_formation_id'] == 2)
                                                                        <button
                                                                                type="button"
                                                                                class="btn btn-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#basicModal"
                                                                                data-formation-id="{{ $elem['id'] }}"
                                                                                onclick="setFormationId(this)">

                                                                            Démarrer la session
                                                                        </button>
                                                                    @endif
                                                            @endif

                                                        @endif
                                                        <br>
                                                    @else

                                                        <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">
                                                            {{ __('content.Supprimer') }}
                                                        </a>

                                                    @endif


                                                </td>
                                            </tr>

                                        @endif

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>



                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="POST" action="{{route('instructeur.formation.partager_url')}}" class="add-new-user pt-0">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="exampleModalLabel1">Entrer le lien de google meet</h5>
                                    <br>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="nameBasic" class="form-label">Lien</label>
                                            <input type="hidden" id="formation_id" name="formation_id" />
                                            <input type="text" id="enligne_url" name="enligne_url" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <span class="modal-title" id="exampleModalLabel1">
                                                Démarrez votre session en accédant à Google Meet via le lien suivant :<br>
                                                <a href="https://meet.google.com/landing" target="_blank" class="text-primary">
                                                    Google meet
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    function setFormationId(button) {
                        const formationId = button.getAttribute('data-formation-id');
                        document.getElementById('formation_id').value = formationId;
                    }
                </script>


                    <!-- Offcanvas to add new user -->

                </div>
                <form method="POST" action="{{route('instructeur.formation.delete')}}" class="add-new-user pt-0">
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
                            {{ __('content.ajouter_formation') }}

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

                        <form method="POST" id="addNewUserForm" action="{{ route('instructeur.formation.add') }}" class="row g-3">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="categ_formation_id">{{ __('content.categ_formation') }}</label>
                                <select id="categ_formation_id" name="categ_formation_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.categ_formation') }}</option>
                                    @for($i=0;$i<count($list_cat);$i++)
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['lib']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
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
                                    name="nom"
                                    aria-label="{{ __('content.date') }}"
                                />
                            </div>
                            <div class="mb-3">
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
{{--                            <div class="mb-3">--}}
{{--                                <label--}}
{{--                                    class="form-label"--}}
{{--                                    for="nbr_participant"--}}
{{--                                >{{ __('content.nbr_participant') }}</label--}}
{{--                                >--}}
{{--                                <input--}}
{{--                                    type="number"--}}
{{--                                    class="form-control"--}}
{{--                                    id="nbr_participant"--}}
{{--                                    value="0"--}}
{{--                                    name="nbr_participant"--}}
{{--                                    aria-label="{{ __('content.nbr_participant') }}"--}}
{{--                                />--}}
{{--                            </div>--}}
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="sujet"
                                >{{ __('content.sujet') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="sujet"
                                    placeholder="{{ __('content.sujet') }}"
                                    name="sujet"
                                    aria-label="{{ __('content.sujet') }}"
                                />
                            </div>
                            <div class="mb-3">
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
                            <div class="mb-3">
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
