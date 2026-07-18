@extends('layouts.app_vitrine')

@section('content')

    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'rejoignez_nous','menuactive' =>''])

    <section class="section-py first-section-pt" style="margin-top: -50px">
        <div class="container">
            <div class="row mb-12 g-12">
                <div class="col-md-12 col-xl-12">
                    <div class="card bg-dark border-0 text-white">
                        <img class="card-img" src="{{\Illuminate\Support\Facades\URL::asset('images/devenir_franchise_affiche_zengym.png')}}" style="height: 300px"/>
                        <div class="card-img-overlay" style="margin-top: 100px">
                            <h5 class="card-title" style="font-size: 30px;color: black">
                                <strong>
                                    Devenir un Adhérent
                                </strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sections:Start -->


    <!-- / Sections:End -->
    <section class="section-py first-section-pt" style="margin-top: -100px">
        <div class="container">

            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <div class="card px-3">
                        <div class="row">
                            <div class="col-lg-7 card-body border-end p-md-8">
{{--                                <h4 class="mb-2">Inscrivez vous</h4>--}}

{{--                                <div class="row g-5 py-8" style="margin-bottom: 30px">--}}
{{--                                    <div class="col-md col-lg-12 col-xl-6">--}}
{{--                                        <div class="form-check custom-option custom-option-basic checked">--}}
{{--                                            <label--}}
{{--                                                    class="form-check-label custom-option-content form-check-input-payment gap-4 align-items-center"--}}
{{--                                                    for="customRadioVisa">--}}
{{--                                                <input name="customRadioTemp" class="form-check-input my-2" type="radio"--}}
{{--                                                       value="credit-card" id="customRadioVisa" checked />--}}
{{--                                                <span class="custom-option-body">--}}
{{--                                            <img src="https://cdn3d.iconscout.com/3d/premium/thumb/user-3d-icon-png-download-3408818@0.png"--}}
{{--                                                 alt="visa-card" width="45"--}}
{{--                                                 data-app-light-img="icons/payments/visa-light.png"--}}
{{--                                                 data-app-dark-img="icons/payments/visa-dark.png" />--}}
{{--                                            <span class="ms-4 fw-medium text-heading">Informations Personnelles</span>--}}
{{--                                        </span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md col-lg-12 col-xl-6">--}}
{{--                                        <div class="form-check custom-option custom-option-basic">--}}
{{--                                            <label--}}
{{--                                                    class="form-check-label custom-option-content form-check-input-payment gap-4 align-items-center"--}}
{{--                                                    for="customRadioPaypal">--}}
{{--                                                <input name="customRadioTemp" class="form-check-input my-2" type="radio"--}}
{{--                                                       value="paypal" id="customRadioPaypal" />--}}
{{--                                                <span class="custom-option-body">--}}
{{--                                            <img src="https://cdn3d.iconscout.com/3d/premium/thumb/document-3d-icon-png-download-5231812.png"--}}
{{--                                                 alt="paypal" width="45"--}}
{{--                                                 data-app-light-img="icons/payments/paypal-light.png"--}}
{{--                                                 data-app-dark-img="icons/payments/paypal-dark.png" />--}}
{{--                                            <span class="ms-4 fw-medium text-heading">Fiche de Tests de Santé</span>--}}
{{--                                        </span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <h4 class="mb-6">Informations Personnelles</h4>
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
                                <form method="POST" id="addNewUserForm" action="{{ route('devenir_adherent.payer_candidat',$detail_type_abo->id) }}" class="row g-3">
                                    @csrf
                                    <div class="row g-6">
                                        <div class="col-md-6">
                                            <label class="form-label" for="nom">Nom (*)</label>
                                            <input type="text" id="nom" name="nom" class="form-control"
                                                   placeholder="Votre nom" required/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="prenom">Prénom (*)</label>
                                            <input type="text" id="prenom" name="prenom" class="form-control"
                                                   placeholder="Votre prénom" required/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="tel1">Téléphone 1 (*)</label>
                                            <input type="text" id="tel1" name="tel1" class="form-control"
                                                   placeholder="Votre numéro de téléphone 1" required/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="tel2">Téléphone 2</label>
                                            <input type="text" id="tel2" name="tel2" class="form-control"
                                                   placeholder="Votre numéro de téléphone 2" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="mail">Email (*)</label>
                                            <input type="email" id="mail" name="mail" class="form-control"
                                                   placeholder="Votre adresse mail" required/>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label" for="mail">Adresse (*)</label>
                                            <input type="text" id="adr" name="adr" class="form-control"
                                                   placeholder="Votre Adresse" required/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="mail">Mot de passe (*)</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                   placeholder="********" required/>
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
                                                <input
                                                        type="radio"
                                                        class="switch-input"
                                                        name="methode_paiement"
                                                        value="Konnect+"
                                                        id="cb-option"
                                                        disabled
                                                >
                                                <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
        </span>
                                                <span class="switch-label">Carte bancaire</span>
                                            </label>
                                            <img src="{{ asset('images/carte_bancaire_choices.PNG') }}" style="width: 200px" id="cb-image"/>
                                        </div>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                const cbOption = document.getElementById('cb-option');
                                                const cbImage = document.getElementById('cb-image');

                                                // Empêche la sélection et affiche un message
                                                const showDisabledMessage = () => {
                                                    Swal.fire({
                                                        icon: 'info',
                                                        title: 'Option indisponible',
                                                        text: "L’option de paiement par carte bancaire n’est pas accessible pour le moment.",
                                                        confirmButtonText: 'OK',
                                                        confirmButtonColor: '#efc139'
                                                    });
                                                };

                                                // Quand on clique sur l’image ou le label
                                                cbImage.addEventListener('click', showDisabledMessage);
                                                cbOption.closest('label').addEventListener('click', showDisabledMessage);
                                            });
                                        </script>
                                        <input type="hidden" name="frais" value="{{$detail_type_abo->frais_ap_remise}}"/>
                                        <input type="hidden" name="titre" value="{{$detail_type_abo->des}}"/>
                                        <div class="col-12">
                                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-callback="onRecaptchaSuccess"></div>

                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                            @endif
                                        </div>
                                        <div class="d-grid mt-5">

                                            <button type="submit" id="submitButton" class="btn btn-success" disabled>
                                                <span class="me-2">Inscription</span>
                                                <i class="icon-base fa fa-right-arrow-alt scaleX-n1-rtl"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    function onRecaptchaSuccess() {
                                        document.getElementById("submitButton").disabled = false;
                                    }
                                </script>
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            </div>
                            <div class="col-lg-5 card-body p-md-8">
                                <h4 class="mb-2">Récapitulatif de la commande</h4>
                                <div class="mt-3 mb-5 text-center">
                                    @if(\Illuminate\Support\Facades\DB::table('categ_type_abo_adherents')->where('id',$detail_type_abo->categ_abo_id)->value('photo'))
                                        <img src="data:image/jpg;base64,{{\Illuminate\Support\Facades\DB::table('categ_type_abo_adherents')->where('id',$detail_type_abo->categ_abo_id)->value('photo') }}" alt="" style="width:50%;">
                                    @else
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/bookmark.png" alt="Basic Image" width="120" />
                                    @endif
                                </div>
                                <p class="mb-8">
                                    {{\Illuminate\Support\Facades\DB::table('categ_type_abo_adherents')->where('id',$detail_type_abo->categ_abo_id)->value('desc')}}<br />
                                    {{$detail_type_abo->des}}
                                </p>
                                <div class="d-flex align-items-center mb-4">
                                    <h1 class="text-heading mb-0">{{$detail_type_abo->frais_ap_remise}}</h1>
                                    <sub class="h6 text-body mb-n3">/TND</sub>
                                </div>
                                <div class="mt-5">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">Frais Principale</p>
                                        <h6 class="mb-0">{{$detail_type_abo->frais}} TND</h6>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <p class="mb-0">Remise</p>
                                        <h6 class="mb-0">{{$detail_type_abo->remise}} %</h6>
                                    </div>
                                    <hr />
                                    <div class="d-flex justify-content-between align-items-center mt-4 pb-1">
                                        <p class="mb-0">Total</p>
                                        <h6 class="mb-0">{{$detail_type_abo->frais_ap_remise}} TND</h6>
                                    </div>


{{--                                    <p class="mt-8">By continuing, you accept to our Terms of Services and Privacy Policy. Please--}}
{{--                                        note that--}}
{{--                                        payments are non-refundable.</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Pricing Plans -->
            </div>
        </div>
        </div>
    </section>
@endsection
