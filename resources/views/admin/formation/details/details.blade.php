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


                        <div class="card-body row g-3">
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                                    <div class="me-1">
                                        <h5 class="mb-1">{{$detail[0]['titre']}}</h5>
                                        <p class="mb-1">{{$detail[0]['sujet']}}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-label-danger">{{$detail_cat[0]['lib']}}</span>

                                    </div>
                                </div>
                                <div class="card academy-content shadow-none border">

                                    <div class="card-body">

                                        <p class="mb-0 pt-1">

                                            <?php
                                            echo $detail[0]['desc'];
                                            ?>
                                        </p>
                                        <hr class="my-4">

                                        <div class="d-flex flex-wrap">
                                            <table
                                                class="table">

                                                <tr>
                                                    <td>
                                                        <p style="color: #864299">{{ __('content.date') }} & {{ __('content.heure') }}</p>
                                                        <i class='fa fa-calendar bx-sm me-2'></i>{{$detail[0]['date']}}<br>
                                                        <i class='fa fa-clock-o bx-sm me-2'></i>{{$detail[0]['heure']}}
                                                    </td>
                                                    <td style="width: 450px">
                                                        <p style="color: #864299">{{ __('content.place') }}</p>
                                                        <i class='fa fa-map-marker bx-sm me-2'></i>{{$detail[0]['lieu']}}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="color: #864299">{{ __('content.langue') }}</p>
                                                        <ul>
                                                            @if(count($detail_langue)>0)
                                                                @foreach($detail_langue as $lang)
                                                                    <li>
                                                                        {{$lang['langue']}}
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>

                                                    </td>
                                                    <td></td>

                                                </tr>
                                            </table>


                                        </div>

                                        <h5><br>{{ __('content.instructeur') }}</h5>
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-2">
                                                    @if($detail_instructeur[0]['photo'])
                                                        <img src="data:image/jpg;base64,{{$detail_instructeur[0]['photo'] }}" alt="Avatar" class="rounded-circle">

                                                    @else
                                                        <img src="https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png" alt="Avatar" class="rounded-circle">

                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="fw-medium">{{$instructeur}}</span>
                                                <small class="text-muted">{{$categ_instructeur[0]['desc']}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card academy-content shadow-none border" style="margin-top: 10px">

                                    <div class="card-body">

                                        <p class="mb-0 pt-1">{{ __('content.liste_candidats') }}</p>
                                        <hr class="my-4">

                                        <div class="card-datatable table-responsive">
                                            <table
                                                class="datatables-users table border-top"
                                                id="table"
                                                style="white-space: nowrap;"
                                            >
                                                <thead>
                                                <tr>
                                                    <th style="text-align:center;width: 90px"></th>
                                                    <th style="text-align:center">{{ __('content.payer') }}</th>
                                                    <th style="text-align:center">{{ __('content.date_validation') }}</th>

                                                    <th style="text-align:center">{{ __('content.nom') }}</th>
                                                    <th style="text-align:center">{{ __('content.prenom') }}</th>
                                                    <th style="text-align:center">{{ __('content.tel1') }}</th>
                                                    <th style="text-align:center">{{ __('content.mail') }}</th>
                                                    <th style="text-align:center">{{ __('content.adresse') }}</th>
                                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                                    <th style="text-align:center">{{ __('content.salle_de_sport') }}</th>



                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($candidatlist)>0)
                                                    @foreach($candidatlist as $elem)
                                                        @if($elem['candidat_id'])
                                                            <tr>

                                                                <td style="text-align:center">

                                                                    <button style="width: 200px" type="button" class="btn btn-outline-danger" onclick="call_delete_modal({{$elem['id_form_candidat']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                                        Supprimer
                                                                    </button>
                                                                    <br>
                                                                    @if($elem['date_validation'])
                                                                        <a href="{{route('admin.formation.affecter_candidat.transferer_candidat_vers_instructeur',[$elem['id'], $elem['id_form']])}}" style="width: 200px" type="button" class="btn btn-outline-primary">
                                                                            Transferer vers instructeur
                                                                        </a>
                                                                    @else
                                                                        <button style="width: 200px" type="button" class="btn btn-outline-success" onclick="get_candidat_id('{{$elem['candidat_id']}}')">
                                                                            Valider le paiement
                                                                        </button>
                                                                    @endif


                                                                </td>
                                                                <td style="text-align:center">
                                                                    @if($elem['date_validation'])
                                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                                    @else
                                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                                    @endif

                                                                </td>
                                                                <td style="text-align:center">
                                                                    {{$elem['date_validation']}}
                                                                </td>
                                                                <td style="text-align:center">
                                                                    {{$elem['nom']}}
                                                                </td>

                                                                <td style="text-align:center">
                                                                    {{$elem['prenom']}}
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
                                                                    {{$elem['categ_candidat_desc']}}
                                                                </td>
                                                                <td style="text-align:center">
                                                                    {{$elem['salle_sport_nom']}}
                                                                </td>


                                                            </tr>
                                                        @endif

                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4" style="text-align: center">
                                <h5 class="mb-1">{{ __('content.nbr_place_max') }}</h5>
                                <p class="mb-1">{{$detail[0]['nbr_place_max']}}</p>
                                <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                                    <div class="card-body">
                                        <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.a_propos_du_formateur') }}</h5>
                                        @if($detail_instructeur[0]['photo'])
                                            <img src="data:image/jpg;base64,{{$detail_instructeur[0]['photo'] }}" alt="Avatar" class="rounded-circle" style="width: 50px;">

                                        @else
                                            <img src="https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png" alt="Avatar" class="rounded-circle" style="width: 100px">

                                        @endif
                                        <p>
                                            {{$instructeur}}
                                            <br>
                                            <small class="text-muted">{{$categ_instructeur[0]['desc']}}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                                    <div class="card-body">
                                        <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.num_contact') }}</h5>

                                        <p>
                                            {{$detail[0]['contact']}}
                                        </p>
                                        <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.frais') }} {{$detail[0]['devise']}}</h5>

                                        <p>
                                            {{$detail[0]['frais']}}
                                            {{$detail[0]['devise']}}
                                        </p>
                                    </div>
                                </div>

                                <div class="card academy-content shadow-none border">

                                    <div class="card-body">
                                        <button
                                            type="button"
                                            class="btn btn-primary me-sm-3 me-1 data-submit"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                                            style="background-color: lightgray; color: white; width:100%;margin-bottom: 5px"
                                        >
                                            <img src="https://static.vecteezy.com/system/resources/previews/009/592/991/non_2x/3d-rendering-blue-add-user-icon-isolated-free-png.png" alt="" style="width:40px;">
                                            &nbsp;
                                            {{ __('content.ajouter_candidats') }}
                                        </button>


                                    </div>
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

                                            <form method="POST" id="addNewUserForm" action="{{ route('admin.formation.affecter_candidat',$detail[0]['id']) }}" class="row g-3">
                                                @csrf
                                                <div class="mb-3">
                                                    <input type="hidden" id="candidat_id" name="candidat_id"/>
                                                    <select id="candidat" name="candidat" class="select2 form-select" onchange="get_candidat_id2()" required>
                                                        <option value="null">{{ __('content.candidats') }}</option>
                                                        @for($i=0;$i<count($liste_can);$i++)
                                                            <option value="{{$liste_can[$i]['id']}}">{{$liste_can[$i]['nom']}} {{$liste_can[$i]['prenom']}}</option>

                                                        @endfor
                                                    </select>
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
                                </div>
                            </div>
                        </div>




                    </div>


                    <!-- Offcanvas to add new user -->
                    <form method="POST" action="{{route('admin.formation.affecter_candidat.delete',$detail[0]['id'])}}" class="add-new-user pt-0">
                        @csrf
                        @include('layouts.delete_modal')

                    </form>
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
