<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'','menuactive' =>''])

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


                    <!-- Navbar pills -->
                    @if(session('abonnement'))
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='fa fa-user me-1'></i> {{ __('content.Mon_Profile') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('instructeur.profile.photos')}}"><i class='fa fa-picture-o me-1'></i> {{ __('content.photos') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('instructeur.profile.videos')}}"><i class='fa fa-video-camera me-1'></i> {{ __('content.video') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('instructeur.profile.docs')}}"><i class='fa fa-files-o me-1'></i> {{ __('content.document') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('instructeur.profile.docs')}}"><i class='fa fa-files-o me-1'></i> Playlist</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!--/ Navbar pills -->

                    <!-- User Profile Content -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <!-- About User -->
                            @if(session('abonnement'))
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="customer-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            @if($instructeur[0]['photo'])
                                                <img class="img-fluid rounded my-3" src="data:image/jpg;base64,{{$instructeur[0]['photo'] }}" height="110" width="110" alt="User avatar" />

                                            @else
                                                <img class="img-fluid rounded my-3" src="https://static.vecteezy.com/system/resources/previews/022/450/297/original/3d-minimal-purple-user-profile-avatar-icon-in-circle-white-frame-design-vector.jpg" height="110" width="110" alt="User avatar" />
                                            @endif
                                            <div class="customer-info text-center">
                                                <h4 class="mb-1">{{session('nom')}} {{session('prenom')}}</h4>
                                                <small>{{ __('content.instructeur') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around flex-wrap mt-4 py-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary"><i class='fa fa-video-camera bx-sm'></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h5 class="mb-0">{{count($nbr_cours)}}</h5>
                                                <span>{{ __('content.cours') }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary"><i class='fa fa-users bx-sm'></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h5 class="mb-0">{{count($nbr_Evennement)}}</h5>
                                                <span>{{ __('content.evenement') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="info-container">
                                        <small class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3">{{ __('content.Détails') }}</small>
                                        <ul class="list-unstyled">
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.nom') }} & {{ __('content.prenom') }}:</span>
                                                <span>{{session('nom')}} {{session('prenom')}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.statut') }}:</span>
                                                <span class="badge bg-label-success">{{$instructeur[0]['profession'] }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.role') }}:</span>
                                                <span>{{ __('content.instructeur') }}</span>
                                            </li>

                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.adresse') }}:</span>
                                                <span>{{$instructeur[0]['adresse'] }}</span>
                                            </li>

                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.pays') }}:</span>
                                                <span>{{$instructeur[0]['pays_desc'] }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.categorie') }}:</span>
                                                <span>{{$instructeur[0]['categ_instructeur_desc'] }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.contact') }}:</span>
                                                <span>{{$instructeur[0]['tel'] }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.mail') }}:</span>
                                                <span>{{$instructeur[0]['mail'] }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">{{ __('content.login') }}:</span>
                                                <span>{{$instructeur[0]['email'] }}</span>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">{{ __('content.Modifier') }}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif


                            <!-- Edit User Modal -->
                            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                    <div class="modal-content p-3 p-md-5">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                            <form method="POST" enctype="multipart/form-data" id="formaddmois2" action="{{ route('instructeur.profile.edit_info_perso',$instructeur[0]['id']) }}" class="row g-3">
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
                                                        value="{{$instructeur[0]['photo']}}"
                                                    />
                                                    <input
                                                        type="hidden"
                                                        class="form-control"
                                                        id="photo_OLD"
                                                        value="{{$instructeur[0]['photo']}}"
                                                        name="photo_old"
                                                    />
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="prenom"
                                                    >{{ __('content.prenom') }}</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="prenom"
                                                        value="{{$instructeur[0]['prenom']}}"
                                                        name="prenom"
                                                        aria-label="{{ __('content.prenom') }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="nom"
                                                    >{{ __('content.nom') }}</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="nom"
                                                        value="{{$instructeur[0]['nom']}}"
                                                        name="nom"
                                                        aria-label="{{ __('content.nom') }}"
                                                    />
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="profession"
                                                    >{{ __('content.profession') }}</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="profession"
                                                        value="{{$instructeur[0]['profession']}}"
                                                        name="profession"
                                                        aria-label="{{ __('content.profession') }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="mail"
                                                    >{{ __('content.mail') }}</label
                                                    >
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="mail"
                                                        value="{{$instructeur[0]['mail']}}"
                                                        name="mail"
                                                        aria-label="{{ __('content.mail') }}"
                                                    />
                                                    <input
                                                        type="hidden"
                                                        class="form-control"
                                                        id="EMAIL_OLD"
                                                        value="{{$instructeur[0]['mail']}}"
                                                        name="mail_old"
                                                        aria-label="{{ __('content.EMAIL') }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="adresse"
                                                    >{{ __('content.adresse') }}</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="adresse"
                                                        value="{{$instructeur[0]['adresse']}}"
                                                        name="adresse"
                                                        aria-label="{{ __('content.adresse') }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="tel"
                                                    >{{ __('content.tel') }}</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="tel"
                                                        value="{{$instructeur[0]['tel']}}"
                                                        name="tel"
                                                        aria-label="{{ __('content.tel') }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="date_naiss"
                                                    >{{ __('content.date_naiss') }}</label
                                                    >
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                        id="date_naiss"
                                                        value="{{ $instructeur[0]['date_naiss']??date('Y-m-d')}}"
                                                        name="date_naiss"
                                                        aria-label="{{ __('content.date_naiss') }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="cin"
                                                    >{{ __('content.cin') }}</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="cin"
                                                        value="{{$instructeur[0]['cin']}}"
                                                        name="cin"
                                                        aria-label="{{ __('content.cin') }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label class="form-label" for="pays_id">{{ __('content.pays') }}</label>


                                                    <select id="pays_id" name="pays_id" class="select2 form-select">

                                                        @if($instructeur[0]['pays_id'] != 'null')
                                                            <option value="{{$instructeur[0]['pays_id']}}">
                                                                {{$instructeur[0]['pays_desc'] }}
                                                            </option>
                                                            <option value="null">{{ __('content.pays') }}</option>
                                                        @else
                                                            <option value="null">{{ __('content.pays') }}</option>
                                                        @endif
                                                        @for($i=0;$i<count($list_pays);$i++)
                                                            @if($list_pays[$i]['id'] !=$instructeur[0]['pays_id'])
                                                                <option value="{{$list_pays[$i]['id']}}">{{$list_pays[$i]['desc']}}</option>
                                                            @endif


                                                        @endfor



                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label class="form-label" for="categ_instructeur_id">{{ __('content.categorie_instructeur') }}</label>


                                                    <select id="categ_instructeur_id" name="categ_instructeur_id" class="select2 form-select">

                                                        @if($instructeur[0]['categ_instructeur_id'] != 'null')
                                                            <option value="{{$instructeur[0]['categ_instructeur_id']}}">
                                                                {{$instructeur[0]['categ_instructeur_desc'] }}
                                                            </option>
                                                            <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                        @else
                                                            <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                        @endif
                                                        @for($i=0;$i<count($list_cat);$i++)
                                                            @if($list_cat[$i]['id'] !=$instructeur[0]['categ_instructeur_id'])
                                                                <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>
                                                            @endif


                                                        @endfor



                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label
                                                        class="form-label"
                                                        for="email"
                                                    >{{ __('content.login') }}</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="email"
                                                        value="{{$instructeur[0]['email']}}"
                                                        name="email"
                                                        aria-label="Login"
                                                    />
                                                </div>
                                                <div class="col-6">
                                                    <label
                                                        class="form-label"
                                                        for="sexe"
                                                    >{{ __('content.sexe') }}</label
                                                    >

                                                    @if($instructeur[0]['sexe']=="F")
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
                                                <div class="col-12 text-center">
                                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('content.Modifier') }}</button>
                                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">{{ __('content.Annuler') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Edit User Modal -->



                            <!--/ About User -->
                            <!-- Plan Card -->
                            <div class="card mb-4">
                                @foreach($instructeur[0]['abonnements'] as $ab)
                                    @if($ab['active'])
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <span class="badge bg-label-primary">{{$ab['titre']}}</span>
{{--                                                <div class="d-flex justify-content-center">--}}
{{--                                                    <sup class="h5 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>--}}
{{--                                                    <h1 class="display-5 mb-0 text-primary">99</h1>--}}
{{--                                                    <sub class="fs-6 pricing-duration mt-auto mb-3">/month</sub>--}}
{{--                                                </div>--}}
                                            </div>
                                            <ul class="ps-3 g-2 my-4">
                                                <li class="mb-2">Date Début : <strong class="mb-0 text-primary" style="text-align: right">{{$ab['date_deb']}}</strong></li>
                                                <li class="mb-2">Date Fin : <strong class="mb-0 text-primary" style="text-align: right">{{$ab['date_fin']}}</strong></li>

                                            </ul>
                                            @php

                                                $dateDebut = \Carbon\Carbon::parse($ab['date_deb']);
                                                $dateFin = \Carbon\Carbon::parse($ab['date_fin']);
                                                $today = \Carbon\Carbon::today();

                                                $totalDays = $dateDebut->diffInDays($dateFin);
                                                $daysPassed = $dateDebut->diffInDays($today);
                                                $daysRemaining = $today->diffInDays($dateFin, false);

                                                $percentage = $totalDays > 0 ? min(100, round(($daysPassed / $totalDays) * 100)) : 0;
                                            @endphp

                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <span>Jours</span>
                                                <span>{{ $percentage }}% Complété(s)</span>
                                            </div>
                                            <div class="progress mb-1" style="height: 8px;">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            @if ($daysRemaining >= 0)
                                                <span>{{ $daysRemaining }} jour{{ $daysRemaining > 1 ? 's' : '' }} restant(s)</span>
                                            @else
                                                <span class="text-danger">Expiré</span>
                                            @endif


                                            <div class="d-grid w-100 mt-4 pt-2">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pricingModal">Plan de mise à niveau</button>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <!-- /Plan Card -->

                        </div>
                        @if(session('abonnement'))
                        <div class="col-xl-8 col-lg-7 col-md-7">
                            <!-- Change Password -->
                            <div class="card mb-4">
                                <h5 class="card-header" style="padding-bottom: 40px">   {{ __('content.Modifier_le_mot_de_passe') }}</h5>
                                <div class="card-body">
                                    <form method="POST" id="editPasswordForm" action="{{ route('instructeur.profile.update_password',$instructeur[0]['id']) }}" class="row g-3">
                                        @csrf

                                        <div class="row">

                                            <div class="mb-3 col-12 col-sm-4 form-password-toggle">

                                                <label
                                                    class="form-label"
                                                    for="ancienpassword"
                                                >{{ __('content.Ancien_mot_de_passe') }}</label
                                                >
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="ancienpassword"
                                                    placeholder="******"
                                                    name="ancienpassword"
                                                    aria-label="******"
                                                />
                                            </div>

                                            <div class="mb-3 col-12 col-sm-4 form-password-toggle">
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
                                            <div class="mb-3 col-12 col-sm-4 form-password-toggle">
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
                                            <div>
                                                <button type="submit" class="btn btn-primary me-2">{{ __('content.Modifier') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/ Change Password -->

                            <!-- Activity Timeline -->
                            <div class="card card-action mb-4">
                                <div class="card-header align-items-center">
                                    <h5 class="card-action-title mb-0"><i class='bx bx-list-ul me-2'></i>{{ __('content.cours') }}</h5>

                                </div>
                                <div class="card-body">

                                    <table
                                        id="table"
                                    >
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <!-- Add more columns as needed -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($courslist)>0)
                                            @foreach($courslist as $elem)
                                        <tr>
                                            <td>
                                                <ul class="timeline">
                                                    <li class="timeline-item timeline-item-transparent">
                                                        <span class="timeline-point-wrapper">
                                                            @if($elem['date'] < date('Y-m-d'))

                                                                <span class="timeline-point timeline-point-success"></span>

                                                            @elseif($elem['date'] == date('Y-m-d'))
                                                                <!--{{$st_time    =   strtotime($elem['hfin'])}}-->
                                                                <!--{{$cur_time   =   strtotime(now())}}-->
                                                                @if($st_time <= $cur_time)

                                                                    <span class="timeline-point timeline-point-success"></span>
                                                                @else
                                                                    <span class="timeline-point timeline-point-warning"></span>
                                                                @endif

                                                            @elseif($elem['date'] > date('Y-m-d'))
                                                                <span class="timeline-point timeline-point-warning"></span>
                                                            @endif



                                                        </span>
                                                        <div class="timeline-event">
                                                            <div class="timeline-header mb-1">
                                                                <h6 class="mb-0">
                                                                    <?php
                                                                    echo html_entity_decode($elem['desc']);
                                                                    ?>
                                                                </h6>
                                                                <small class="text-muted">{{$elem['frais']}} DT</small>
                                                            </div>
                                                            <p class="mb-2">{{ __('content.categorie') }}:
                                                                    <?php
                                                                    echo html_entity_decode($elem['categ_cours_desc']);
                                                                    ?>
                                                            </p>

                                                            <div class="d-flex flex-wrap">
                                                                <div class="avatar me-3">
                                                                    <img src="https://uxwing.com/wp-content/themes/uxwing/download/time-and-date/clock-color-icon.png" alt="Avatar" class="rounded-circle" />
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-0">{{$elem['date']}}</h6>
                                                                    <span class="text-muted">{{$elem['hdeb']}} - {{$elem['hfin']}}</span>
                                                                </div>
                                                            </div>
                                                            <p class="mb-2" style="padding-top: 10px">
                                                                @if($elem['date'] < date('Y-m-d'))

                                                                    <span class="badge bg-label-success">{{ __('content.realiser') }}</span>

                                                                @elseif($elem['date'] == date('Y-m-d'))
                                                                    <!--{{$st_time    =   strtotime($elem['hfin'])}}-->
                                                                    <!--{{$cur_time   =   strtotime(now())}}-->
                                                                    @if($st_time <= $cur_time)

                                                                            <span class="badge bg-label-success">{{ __('content.realiser') }}</span>
                                                                        @else
                                                                            <span class="badge bg-label-warning">{{ __('content.encours') }}</span>
                                                                    @endif

                                                                @elseif($elem['date'] > date('Y-m-d'))
                                                                    <span class="badge bg-label-warning">{{ __('content.encours') }}</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </td>

                                        </tr>
                                            @endforeach
                                        @endif
                                        <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>

                                    </ul>
                                </div>
                            </div>
                            <!--/ Activity Timeline -->
                            <div class="row">
                                <!-- Connections -->
                                <div class="col-lg-12 col-xl-12">
                                    <div class="card card-action mb-4">
                                        <div class="card-header align-items-center">
                                            <h5 class="card-action-title mb-0"><i class='bx bx-list-ul me-2'></i>{{ __('content.evenement') }}</h5>

                                        </div>
                                        <div class="card-body">

                                            <table
                                                id="table2"
                                            >
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <!-- Add more columns as needed -->
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($nbr_Evennement)>0)
                                                    @foreach($nbr_Evennement as $elem)
                                                        <tr>
                                                            <td>
                                                                <ul class="timeline">
                                                                    <li class="timeline-item timeline-item-transparent">
                                                                        <span class="timeline-point-wrapper">
                                                                            @if($elem['fait'])

                                                                                <span class="timeline-point timeline-point-success"></span>
                                                                            @else
                                                                                <span class="timeline-point timeline-point-warning"></span>



                                                                            @endif


                                                                        </span>
                                                                        <div class="timeline-event">
                                                                            <div class="timeline-header mb-1">
                                                                                <h6 class="mb-0">
                                                                                        <?php
                                                                                        echo html_entity_decode($elem['desc']);
                                                                                        ?>

                                                                                </h6>
                                                                                <small class="text-muted">{{$elem['frais']}} DT</small>
                                                                            </div>
                                                                            <p class="mb-2">{{ __('content.nbr_participant') }}: {{$elem['nbr_participant']}}</p>

                                                                            <div class="d-flex flex-wrap">
                                                                                <div class="avatar me-3">
                                                                                    <img src="https://uxwing.com/wp-content/themes/uxwing/download/time-and-date/clock-color-icon.png" alt="Avatar" class="rounded-circle" />
                                                                                </div>
                                                                                <div>
                                                                                    <h6 class="mb-0">{{$elem['date_deb']}} - {{$elem['date_fin']}}</h6>
                                                                                    <span class="text-muted">{{$elem['heure_deb']}} - {{$elem['heure_fin']}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-2" style="padding-top: 10px">
                                                                                @if($elem['date_deb'] < date('Y-m-d'))

                                                                                    <span class="badge bg-label-success">{{ __('content.realiser') }}</span>

                                                                                @elseif($elem['date_deb'] == date('Y-m-d'))
                                                                                    <!--{{$st_time    =   strtotime($elem['hfin'])}}-->
                                                                                    <!--{{$cur_time   =   strtotime(now())}}-->
                                                                                    @if($st_time <= $cur_time)

                                                                                        <span class="badge bg-label-success">{{ __('content.realiser') }}</span>
                                                                                    @else
                                                                                        <span class="badge bg-label-warning">{{ __('content.encours') }}</span>
                                                                                    @endif

                                                                                @elseif($elem['date_deb'] > date('Y-m-d'))
                                                                                    <span class="badge bg-label-warning">{{ __('content.encours') }}</span>
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                @endif
                                                <!-- Add more rows as needed -->
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                                <!--/ Connections -->

                            </div>

                        </div>
                        @endif
                    </div>
                    <!--/ User Profile Content -->
                    <!-- Pricing Modal -->
                    <div class="modal fade" id="pricingModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-pricing">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <!-- Pricing Plans -->
                                    <div class="rounded-top">
                                        <div class="row gy-6">
                                            @foreach($type_abonnements as $type)
                                                <!-- Pro -->

                                                <div class="col-xl mb-md-0 px-3">
                                                    <div class="card border-primary border shadow-none">
                                                    <div class="card-body position-relative pt-4">
                                                        <form method="POST" enctype="multipart/form-data"  action="{{ route('instructeur.profile.payer_abonnement') }}" class="row g-3">
                                                            @csrf
                                                            <div class="my-5 pt-6 text-center">
                                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/wallet-round.png" alt="Pro Image"
                                                                     width="120" />
                                                            </div>
                                                            <h4 class="card-title text-center text-capitalize mb-1">
                                                                {{$type['desc']}}
                                                            </h4>
                                                            <input type="hidden" id="type_abo_id" name="type_abo_id" value="{{$type['id']}}"/>
                                                            <input type="hidden" id="type_abo_desc" name="type_abo_desc" value="{{$type['desc']}}"/>
        {{--                                                            <p class="text-center mb-5">For small to medium businesses</p>--}}
                                                            <div class="text-center h-px-50">
                                                                <div class="d-flex justify-content-center">
                                                                    <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">TND</sup>
                                                                    <h1 class="price-toggle price-yearly text-primary mb-0">{{$type['prix_ttc']}}</h1>
                                                                    <input type="hidden" id="amount" name="amount" value="{{$type['prix_ttc']}}"/>
        {{--                                                                    <h1 class="price-toggle price-monthly text-primary mb-0 d-none">9</h1>--}}
        {{--                                                                    <sub class="h6 text-body pricing-duration mt-auto mb-1">/month</sub>--}}
                                                                </div>
        {{--                                                                <small class="price-yearly price-yearly-toggle text-body-secondary">USD 480 / year</small>--}}
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="switch">
                                                                    <input type="radio" class="switch-input" name="methode_paiement" value="en_espece" required checked>
                                                                    <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                                    <span class="switch-label">{{ __('content.Paiement en espèces') }}</span>
                                                                </label>
                                                            </div>
                                                            <div class="col-12" style="margin-bottom: 50px">
                                                                <label class="switch">
                                                                    <input type="radio" class="switch-input" name="methode_paiement" value="Konnect+" required>
                                                                    <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                                    <span class="switch-label">Carte bancaire</span>
                                                                </label>
                                                                <img src="{{asset('images/carte_bancaire_choices.PNG')}}" style="width: 200px;float: right"/>
                                                            </div>
        {{--                                                            <ul class="list-group my-5 pt-9">--}}
        {{--                                                                <li class="mb-4 d-flex align-items-center">--}}
        {{--                                                                  <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i--}}
        {{--                                                                              class="icon-base bx bx-check icon-xs"></i></span><span>Unlimited responses</span>--}}
        {{--                                                                </li>--}}
        {{--                                                                <li class="mb-4 d-flex align-items-center">--}}
        {{--                                                                  <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i--}}
        {{--                                                                              class="icon-base bx bx-check icon-xs"></i></span><span>Unlimited forms and surveys</span>--}}
        {{--                                                                </li>--}}
        {{--                                                                <li class="mb-4 d-flex align-items-center">--}}
        {{--                                                                  <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i--}}
        {{--                                                                              class="icon-base bx bx-check icon-xs"></i></span><span>Instagram profile page</span>--}}
        {{--                                                                </li>--}}
        {{--                                                                <li class="mb-4 d-flex align-items-center">--}}
        {{--                                                                  <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i--}}
        {{--                                                                              class="icon-base bx bx-check icon-xs"></i></span><span>Google Docs integration</span>--}}
        {{--                                                                </li>--}}
        {{--                                                                <li class="mb-0 d-flex align-items-center">--}}
        {{--                                                                  <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i--}}
        {{--                                                                              class="icon-base bx bx-check icon-xs"></i></span><span>Custom “Thank you” page</span>--}}
        {{--                                                                </li>--}}
        {{--                                                            </ul>--}}

                                                            <button type="submit" class="btn btn-primary d-grid w-100" data-bs-dismiss="modal">
                                                                Mise à niveau
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--/ Pricing Plans -->
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
