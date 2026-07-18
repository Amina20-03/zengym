@include('layouts.navbar_vitrine',['menuprincipaleactive' =>'cours_locaux','menuactive' =>''])

<!-- Sections:Start -->

<section id="landingContact" class="section-py bg-body">
    <div class="container" style="margin-top: 100px">

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='fa fa-user me-1'></i> {{ __('content.Mon_Profile') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('instructeur_by_categ.profile.photos',$instructeur[0]['id'])}}"><i class='fa fa-picture-o me-1'></i> {{ __('content.photos') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('instructeur_by_categ.profile.videos',$instructeur[0]['id'])}}"><i class='fa fa-video-camera me-1'></i> {{ __('content.video') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('instructeur_by_categ.profile.docs',$instructeur[0]['id'])}}"><i class='fa fa-files-o me-1'></i> {{ __('content.certif') }}</a></li>
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
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
                                    <h4 class="mb-1">{{$instructeur[0]['nom']}} {{$instructeur[0]['prenom']}}</h4>
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
                                    <span>{{$instructeur[0]['nom']}} {{$instructeur[0]['prenom']}}</span>
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

                        </div>
                    </div>
                </div>


            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">

                <!-- Activity Timeline -->
                <div class="card card-action mb-4">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i class='fa fa-list-ul me-2'></i>{{ __('content.cours') }}</h5>

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
                                                            <h6 class="mb-0">{{$elem['desc']}}</h6>
                                                            <small class="text-muted">{{$elem['frais']}} DT</small>
                                                        </div>
                                                        <p class="mb-2">{{ __('content.categorie') }}: {{$elem['categ_cours_desc']}}</p>

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
                                <h5 class="card-action-title mb-0"><i class='fa fa-list-ul me-2'></i>{{ __('content.evenement') }}</h5>

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
                                                                    <h6 class="mb-0">{{$elem['desc']}}</h6>
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
        </div>
        <!--/ User Profile Content -->




    </div>
</section>
<!-- Contact Us: End -->

<!-- Contact Us: Start -->
<section id="landingContact" class="section-py landing-contact">
    <div class="container">
        <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Contactez nous</span>
        </div>
        <h3 class="text-center mb-1"><span class="section-title">Travaillons</span> ensemble</h3>
        <p class="text-center mb-4 mb-lg-5 pb-md-3">Une question ou une remarque ? écris-nous simplement un message</p>
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="contact-img-box position-relative border p-2 h-100">
                    <img src="https://shoutem.com/wp-content/uploads/2020/11/Fitness_phoneperson@2x-496x489.png" alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid" />
                    <div class="pt-3 px-4 pb-1">
                        <div class="row gy-3 gx-md-4">
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge bg-label-primary rounded p-2 me-2"><i class="fa fa-envelope bx-sm"></i></div>
                                    <div>
                                        <p class="mb-0">Email</p>
                                        <h5 class="mb-0">
                                            <a href="mailto:example@gmail.com" class="text-heading">zengym@gmail.com</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge bg-label-success rounded p-2 me-2">
                                        <i class="fa fa-phone bx-sm"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0">Téléphone</p>
                                        <h5 class="mb-0"><a href="tel:+21658130010" class="text-heading">+216 58 130 010</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-1">Envoyer un message</h4>
                        <p class="mb-4">
                            <br>
                            <br>
                        </p>
                        <form>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="contact-form-fullname">Nom & Prénom</label>
                                    <input type="text" class="form-control" id="contact-form-fullname" placeholder="john" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="contact-form-email">Email</label>
                                    <input type="text" id="contact-form-email" class="form-control" placeholder="johndoe@gmail.com" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="contact-form-message">Message</label>
                                    <textarea id="contact-form-message" class="form-control" rows="9" placeholder="Write a message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>
                        <p class="mb-4">
                            <br>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us: End -->



