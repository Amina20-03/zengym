




@extends('layouts.app_vitrine')

@section('content')
    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'','menuactive' =>''])

    <!-- Sections:Start -->
    <section id="landingContact" class="section-py bg-body">
        <div class="container" style="margin-top: 20px">
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
                                <h5 class="mb-1">{{$detail['titre']}}</h5>
                                <p class="mb-1">{{$detail['desc']}}</p>
                            </div>
                            <div class="d-flex align-items-center">
                            <span class="badge bg-label-danger">
                                {{$detail_cat['desc']}}
                            </span>

                            </div>
                        </div>
                        <div class="card academy-content shadow-none border">
                            <div class="card-body">
                                @if (session('user_id') && session('role')  == 'CANDIDAT')
                                    <form method="POST" id="addNewUserForm" action="{{ route('evenement.details.payer_candidat',$detail['id']) }}" class="row g-3">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <label class="form-label" for="nom" >{{ __('content.nom') }} <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" value="{{session('nom')}}" id="nom" name="nom" readonly/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="prenom">{{ __('content.prenom') }} <span style="color: red">*</span></label>
                                                <input type="text" id="prenom" value="{{session('prenom')}}" class="form-control" name="prenom" readonly/>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label" for="adresse">{{ __('content.adresse') }} <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" value="{{session('adresse')}}" id="adr" name="adr" readonly/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="tel1">{{ __('content.tel1') }} <span style="color: red">*</span></label>
                                                <input type="text" id="tel1" value="{{session('tel')}}" class="form-control" name="tel1" readonly/>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label" for="email">{{ __('content.mail') }} <span style="color: red">*</span></label>
                                                <input type="email" id="email" value="{{session('mail')}}" class="form-control" name="email" readonly/>
                                            </div>

                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="radio" class="switch-input" name="methode_paiement" value="en_espece" checked>
                                                    <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                    <span class="switch-label">{{ __('content.Paiement en espèces') }}</span>
                                                </label>
                                            </div>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="radio" class="switch-input" name="methode_paiement" value="Konnect+">
                                                    <span class="switch-toggle-slider">
                                                                    <span class="switch-on"></span>
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                    <span class="switch-label">Carte Bancaire</span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="frais_formation" value="{{$detail['frais']}}"/>
                                            <input type="hidden" name="user_id" value="{{session('user_id')}}"/>
                                            <input type="hidden" value="{{$detail['id']}}" id="id_event" name="id_event">
                                            <div class="col-12">
                                                <button type="submit" id="submitButton" class="btn btn-primary">Payer {{$detail['frais']}} {{$detail['devise']}}</button>
                                                <a href="#"  onclick="history.back()" class="btn btn-secondary">{{ __('content.Annuler') }}</a>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="col-xl-12">
                                        <div class="nav-align-top mb-6">
                                            <ul class="nav nav-pills mb-4" role="tablist">
                                                <li class="nav-item">
                                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">{{ __('content.connexion') }}</button>
                                                </li>
                                                <li class="nav-item">
                                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">{{ __('content.Inscription') }}</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">

                                                    <form action="{{route('evenement.details.inscription.connexion')}}" method="post" class="row g-3">
                                                        @csrf
                                                        <input type="text" id="email"
                                                               name="emaill"
                                                               placeholder="Entrer votre login"
                                                               class="form-control"
                                                               autofocus>
                                                        <br>
                                                        <input type="password"  id="password"
                                                               class="form-control"
                                                               name="password"
                                                               placeholder="****">
                                                        <br>
                                                        <input type="hidden" value="{{$detail['id']}}" id="id_event" name="id_event">
                                                        <button type="submit" class="btn btn-primary d-grid w-100">{{ __('content.se_connecter') }}</button>
                                                    </form>

                                                </div>
                                                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                                    <form method="POST" id="addNewUserForm" action="{{ route('evenement.details.inscription.new_candidat') }}" class="row g-3">
                                                        @csrf
                                                        <div class="row g-4">
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="nom" >{{ __('content.nom') }} <span style="color: red">*</span></label>
                                                                <input type="text" class="form-control" id="nom" name="nom" required/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="prenom">{{ __('content.prenom') }} <span style="color: red">*</span></label>
                                                                <input type="text" id="prenom" class="form-control" name="prenom" required/>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label" for="adresse">{{ __('content.adresse') }} <span style="color: red">*</span></label>
                                                                <input type="text" class="form-control" id="adr" name="adr" required/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="tel1">{{ __('content.tel1') }} <span style="color: red">*</span></label>
                                                                <input type="text" id="tel1" class="form-control" name="tel1" required/>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label" for="tel2">{{ __('content.tel2') }}</label>
                                                                <input type="text" class="form-control" id="tel2" name="tel2" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="email">{{ __('content.mail') }} <span style="color: red">*</span></label>
                                                                <input type="email" id="email" class="form-control" name="email" required/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="password">{{ __('content.password') }} <span style="color: red">*</span></label>
                                                                <input type="password" id="password" class="form-control" name="password" required/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="Confirmer_le_mot_de_passe">{{ __('content.Confirmer_le_mot_de_passe') }} <span style="color: red">*</span></label>
                                                                <input type="password" id="Confirmer_le_mot_de_passe" class="form-control" name="Confirmer_le_mot_de_passe" required/>
                                                            </div>
                                                            <input type="hidden" value="{{$detail['id']}}" id="id_event" name="id_event">

                                                            <div class="col-12">
                                                                <button type="submit" id="submitButton" class="btn btn-primary">{{ __('content.Valider') }}</button>
                                                                <a href="#"  onclick="history.back()" class="btn btn-secondary">{{ __('content.Annuler') }}</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="text-align: center">
                        {{--                    <h5 class="mb-1">{{ __('content.nbr_place_max') }}</h5>--}}
                        {{--                    <p class="mb-1">{{$detail['nbr_place_dispo']}}</p>--}}
                        @if(!empty($detail_instructeur))
                            <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                                <div class="card-body">
                                    <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.Organisateur_evennement') }}</h5>
                                    @if($detail_instructeur['photo'])
                                        <img src="data:image/jpg;base64,{{$detail_instructeur['photo'] }}" alt="Avatar" class="rounded-circle" style="width: 50px;height: 50px">

                                    @else
                                        <img src="https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png" alt="Avatar" class="rounded-circle" style="width: 100px">

                                    @endif
                                    <p>
                                        {{$instructeur}}
                                        <br>
                                        <small class="text-muted">{{$categ_instructeur['desc']}}</small>
                                    </p>
                                </div>
                            </div>
                        @endif

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
                                {{--                            @if($detail[0]['nbr_place_restant'] != 0)--}}
                                <a href="#" class="btn btn-sm btn-icon" style="background-color: #864299; color: white; width:100%;padding:20px; margin-bottom: 5px">

                                    {{$detail['frais']}} {{$detail['devise']}}
                                </a>
                                {{--                            @endif--}}

                            </div>
                        </div>
                    </div>
                </div>




            </div>




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
@endsection
@section('datatable')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

@endsection
