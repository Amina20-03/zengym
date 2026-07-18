<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'formations','menuactive' =>'liste_formation'])

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
                                    <th style="text-align:center">Instructeur</th>
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
                                    <th style="text-align:center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)


                                            <tr>

                                                <td style="text-align:center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png" alt="" style="width:30px;">
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['code']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['instructeur']}}
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
                                                    @if($elem['instructeur_id'])
                                                        @if($elem['realiser'])
                                                            @if(!$elem['encaisse'])
                                                                <a href="{{route('admin.formation.encaisse',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                                    <img src="https://cdn-icons-png.flaticon.com/512/4021/4021642.png" alt="" style="width:20px;">
                                                                    &nbsp;
                                                                    {{ __('content.encaisse') }}
                                                                </a>
                                                                <br>
                                                            @endif
                                                        @endif

                                                    @endif
                                                    <a href="{{route('admin.formation.details',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                        <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                        &nbsp;
                                                        {{ __('content.Détails') }}
                                                    </a>
                                                        <br>
                                                    <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:20px;">
                                                        {{ __('content.Supprimer') }}
                                                    </a>
                                                </td>

                                            </tr>



                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>






                    <!-- Offcanvas to add new user -->

                </div>
                <form method="POST" action="{{route('admin.formation.delete')}}" class="add-new-user pt-0">
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
