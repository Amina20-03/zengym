<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'formations','menuactive' =>'dmd_formation'])

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
                        <div class="col-md-12">
                            <div class="nav-align-top">
                                <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);">
                                            <i class='bx bx-user bx-sm me-1_5'></i> {{ __('content.Détails') }}
                                        </a>
                                    </li>
                                    @if($detail_cat[0]['id'] == '1')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.livret_scientifique',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                        </a>
                                    </li>
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="{{route('admin.demande_formation.details.prog_de_formation',$detail[0]['id'])}}">-->
<!--                                            <i class='bx bx-group bx-sm me-1_5'></i> Programme de formation-->
<!--                                        </a>-->
<!--                                    </li>-->
                                    @endif
                                    @if($detail_cat[0]['id'] == '2')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.livret_scientifique',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                        </a>
                                    </li>
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="{{route('admin.demande_formation.details.prog_de_formation',$detail[0]['id'])}}">-->
<!--                                            <i class='bx bx-group bx-sm me-1_5'></i> Programme de formation-->
<!--                                        </a>-->
<!--                                    </li>-->
                                    @endif
                                    @if($detail_cat[0]['id'] == '3')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.livret_scientifique',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.presentation_power_point',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Présentation PowerPoint
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.video_basic_one',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Vidéo BasicOne
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
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

                                        <p class="mb-0 pt-1">{{$detail[0]['desc']}}</p>
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
                                                    <th style="text-align:center">{{ __('content.nom') }}</th>
                                                    <th style="text-align:center">{{ __('content.prenom') }}</th>
                                                    <th style="text-align:center">{{ __('content.tel1') }}</th>
                                                    <th style="text-align:center">{{ __('content.mail') }}</th>
                                                    <th style="text-align:center">{{ __('content.adresse') }}</th>
                                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                                    <th style="text-align:center">{{ __('content.salle_de_sport') }}</th>
                                                    <th style="text-align:center">{{ __('content.payer') }}</th>

                                                    <th style="text-align:center;width: 90px"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($candidatlist)>0)
                                                    @foreach($candidatlist as $elem)
                                                        <tr>


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
                                                            <td style="text-align:center">
                                                            </td>
                                                            <td style="text-align:center">



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
                                <h5 class="mb-1">{{ __('content.nbr_place_max') }}</h5>
                                <p class="mb-1">{{$detail[0]['nbr_place_max']}}</p>
                                <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                                    <div class="card-body">
                                        <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.a_propos_du_formateur') }}</h5>
                                        @if($detail_instructeur[0]['photo'])
                                            <img src="data:image/jpg;base64,{{$detail_instructeur[0]['photo'] }}" alt="Avatar" class="rounded-circle" style="width: 50px;height: 50px">

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


                            </div>
                        </div>




                    </div>






                    <!-- Offcanvas to add new user -->

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
