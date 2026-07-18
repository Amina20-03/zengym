<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @if($detail['approuver'])
        @include('layouts.admin.menu',['menuprincipaleactive' =>'gest_evenements','menuactive' =>'liste_even'])
        @else
        @include('layouts.admin.menu',['menuprincipaleactive' =>'gest_evenements','menuactive' =>'dmd_evennement'])
        @endif

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
                    <!-- Navbar pills -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="nav-align-top">
                                <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-user bx-sm me-1_5'></i> {{ __('content.Détails') }}</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('admin.evenement.details.photos',$detail['id'])}}"><i class='bx bx-group bx-sm me-1_5'></i> {{ __('content.photos') }}</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('admin.evenement.details.videos',$detail['id'])}}"><i class='bx bx-grid-alt bx-sm me-1_5'></i> {{ __('content.video') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Navbar pills -->
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




                        <div class="card-body row g-3">
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                                    <div class="me-1">
                                        <h5 class="mb-1">{{$detail['titre']}}</h5>
                                        @if(!empty($detail['sujet']))
                                            <p class="text-muted mb-1"><em>{{ $detail['sujet'] }}</em></p>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-label-danger">{{$detail_cat['desc']}}</span>

                                    </div>
                                </div>
                                <div class="card academy-content shadow-none border">

                                    <div class="card-body">

                                        <p class="mb-0 pt-1">
                                            <?php
                                            echo html_entity_decode($detail['desc']);
                                            ?>
                                        </p>
                                        <hr class="my-4">

                                        <div class="d-flex flex-wrap">
                                            <table
                                                class="table">

                                                <tr>
                                                    <td>
                                                        <p style="color: #864299">{{ __('content.date_deb') }}</p>
                                                        <i class='fa fa-calendar bx-sm me-2'></i>{{$detail['date_deb']}}<br>

                                                        @if($detail['heure_deb'] != $detail['heure_fin'])
                                                        <i class='fa fa-clock-o bx-sm me-2'></i>{{$detail['heure_deb']}}
                                                        @endif
                                                    </td>
                                                    <td style="width: 200px">
                                                        <p style="color: #864299">{{ __('content.date_fin') }}</p>
                                                        <i class='fa fa-calendar bx-sm me-2'></i>{{$detail['date_fin']}}<br>

                                                        @if($detail['heure_deb'] != $detail['heure_fin'])
                                                        <i class='fa fa-clock-o bx-sm me-2'></i>{{$detail['heure_fin']}}
                                                        @endif

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
                                                    <td>

                                                    </td>

                                                </tr>
                                            </table>


                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <table
                                                class="table">

                                                <tr>
                                                    <td style="width: 235px;">
                                                        <strong>
                                                            {{ __('content.participant_a_levennement') }}:
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        {{$detail['participant_a_levennement']}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            {{ __('content.participant_non_inscrit') }}:
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        {{$detail['participant_non_inscrit']}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            {{ __('content.frais') }}:
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        {{$detail['frais']}} {{$detail['devise']}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>
                                                            {{ __('content.num_contact') }}:
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        {{$detail['contacte']}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                                <div class="card academy-content shadow-none border" style="margin-top:10px">

                                    <div class="card-body">

                                        <p class="mb-0 pt-1">{{ __('content.list_instructeur') }}</p>
                                        <hr class="my-4">

                                        <div class="card-datatable table-responsive">
                                            <table
                                                class="datatables-users table border-top"
                                                id="table"
                                            >
                                                <thead>
                                                <tr>
                                                    <th style="text-align:center">{{ __('content.nom') }}</th>
                                                    <th style="text-align:center">{{ __('content.prenom') }}</th>
                                                    <th style="text-align:center">{{ __('content.mail') }}</th>
                                                    <th style="text-align:center">{{ __('content.adresse') }}</th>
                                                    <th style="text-align:center">{{ __('content.tel') }}</th>
                                                    <th style="text-align:center">{{ __('content.profession') }}</th>
                                                    <th style="text-align:center">{{ __('content.categorie') }}</th>


                                                    <th style="text-align:center;width: 90px"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($instructeurlist)>0)
                                                    @foreach($instructeurlist as $elem)
                                                        <tr>


                                                            <td style="text-align:center">
                                                                {{$elem['nom']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['prenom']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['mail']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['adresse']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['tel']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['profession']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['categ_instructeur_desc']}}
                                                            </td>

                                                            <td style="text-align:center">


                                                                <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                                    <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                                                </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-4" style="text-align: center">

                                {{-- Affiche de l'événement --}}
                                @php
                                    $affiche_url = null;
                                    if (!empty($detail['affiche'])) {
                                        $affiche_url = 'https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/' . $detail['affiche'];
                                    }
                                @endphp
                                @if($affiche_url)
                                <div class="card academy-content shadow-none border mb-3">
                                    <div class="card-body p-2">
                                        <h6 class="mb-2 text-center">Affiche</h6>
                                        <img src="{{ $affiche_url }}"
                                             alt="Affiche événement"
                                             style="width:100%;border-radius:6px;object-fit:cover;max-height:220px;cursor:pointer"
                                             onclick="window.open('{{ $affiche_url }}','_blank')">
                                    </div>
                                </div>
                                @endif

                                <h5 class="mb-1">{{ __('content.nbr_place_max') }}</h5>
                                <p class="mb-1">{{$detail['nbr_place_dispo']}}</p>
                                <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                                    <div class="card-body">
                                        <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.Organisateur_evennement') }}</h5>
                                        @if($detail_instructeur && $detail_instructeur['photo'])
                                            <img src="data:image/jpg;base64,{{$detail_instructeur['photo'] }}" alt="Avatar" class="rounded-circle" style="width: 50px">

                                        @else
                                            <img src="https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png" alt="Avatar" class="rounded-circle" style="width: 100px">

                                        @endif
                                        <p>
                                            {{$instructeur}}
                                            <br>
                                            <small class="text-muted">{{$categ_instructeur['desc'] ??''}}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                                    <div class="card-body">
                                        <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.salle') }}</h5>

                                        <p>
                                            {{$detail['salle']}}
                                        </p>
                                        <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.info_sur_lieu') }}</h5>

                                        <p>
                                            {{$detail['info_sur_lieu']}}
                                        </p>
                                    </div>
                                </div>

                                <div class="card academy-content shadow-none border">

                                    <div class="card-body">

                                        @if($detail['approuver'])
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
                                        @else
                                        <a href="{{route('admin.evenement.demande.aprouver',$detail['id'])}}"
                                                class="btn btn-success me-sm-3 me-1 data-submit"
                                                style="background-color: lightgreen; color: white; width:100%;margin-bottom: 5px"
                                        >
                                            <img src="https://cdn-icons-png.flaticon.com/512/5610/5610944.png" alt="" style="width:40px;">
                                            &nbsp;
                                            {{ __('content.Valider') }}
                                        </a>
                                        <a href="{{route('admin.evenement.demande.refuser',$detail['id'])}}"
                                                class="btn btn-danger me-sm-3 me-1 data-submit"
                                                style="background-color: red; color: white; width:100%;margin-bottom: 5px"
                                        >
                                            <img src="https://cdn-icons-png.flaticon.com/512/9068/9068678.png" alt="" style="width:40px;">
                                            &nbsp;
                                            {{ __('content.refuser') }}
                                        </a>
                                        @endif

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
                                                {{ __('content.Ajouter_un_instructeur') }}

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

                                            <form method="POST" id="addNewUserForm" action="{{ route('admin.evenement.affecter_user',$detail['id']) }}" class="row g-3">
                                                @csrf
                                                <div class="mb-3">
                                                    <select id="user_id" name="user_id" class="select2 form-select" required>
                                                        <option value="null">{{ __('content.instructeur') }}</option>
                                                        @for($i=0;$i<count($liste_inst);$i++)
                                                            <option value="{{$liste_inst[$i]['id']}}">{{$liste_inst[$i]['nom']}} {{$liste_inst[$i]['prenom']}}</option>

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

                </div>
                <form method="POST" action="{{route('admin.evenement.affecter_user.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>

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
