@extends('layouts.app_vitrine')

@section('content')

    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'cours_locaux','menuactive' =>''])

    <section class="section-py first-section-pt" style="margin-top: -30px">
        <div class="container">
            <div class="row mb-12 g-12">
                <div class="col-md-12 col-xl-12">
                    <div class="card bg-dark border-0 text-white">
                        <img class="card-img" src="{{\Illuminate\Support\Facades\URL::asset('images/devenir_franchise_affiche_zengym.png')}}" style="height: 300px"/>
                        <div class="card-img-overlay" style="margin-top: 100px">
                            <h5 class="card-title" style="font-size: 30px;color: black">
                                <strong>
                                    <?php
                                    echo html_entity_decode(__('content.Find_a_Class'));
                                    ?>
                                </strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -280px">
        <div class="container">

            <div class="row mb-12 g-12">
                <div class="col-md-3 mb-md-0 mb-12">
                </div>
                <div class="col-md-6 mb-md-0 mb-12">
                    <!-- single card  -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">
                                        <div class="col-sm-6 col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center card-widget-1 pb-4 pb-sm-0">
                                                <div style="text-align: center">
                                                    <h4 class="mb-0">
                                                        COURS
                                                    </h4>
                                                    <p class="mb-0">
                                                        Des cours de danse sportive amusants et dynamiques qui vous redonnent une santé de fer.
                                                    </p>
                                                    <div class="input-group" style="text-align: center;margin-top: 10px">
                                                        <input type="text" class="form-control" placeholder="Ville, État ou ZIP"
                                                               aria-label="Recipient's username" aria-describedby="button-addon2" />
                                                        <button class="btn btn-outline-primary" type="button" id="button-addon2">
                                                            <?php
                                                            echo html_entity_decode(__('content.sSearch'));
                                                            ?>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /single card  -->
                </div>
                <div class="col-md-3 mb-md-0 mb-12">
                </div>
            </div>
        </div>
    </section>

    <section class="section-py first-section-pt" style="margin-top: -150px">
        <div class="container">
            <div class="row mb-12 g-6">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{\Illuminate\Support\Facades\URL::asset('images/photo_cours_en_ligne.jpg')}}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">En ligne</h5>
                            <p class="card-text">Accédez à nos cours en ligne via ZenGymHealth et entraînez-vous où que vous soyez, à votre rythme et en toute liberté !</p>
                            <a href="{{route('cours.en_ligne.index')}}" class="btn btn-outline-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{\Illuminate\Support\Facades\URL::asset('images/photo_cours_presentiele.jpg')}}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">En présentiel</h5>
                            <p class="card-text">Participez à nos cours en présentiel avec ZenGymHealth et profitez d’un accompagnement personnalisé dans une ambiance motivante et conviviale !</p>
                            <a href="javascript:void(0)" class="btn btn-outline-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{\Illuminate\Support\Facades\URL::asset('images/image18.jpg')}}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">A la demande</h5>
                            <p class="card-text">Avec ZenGymHealth, bénéficiez de cours en présentiel à la demande, adaptés à vos disponibilités et à vos objectifs, pour un accompagnement sur mesure.</p>
                            <a href="javascript:void(0)" class="btn btn-outline-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{\Illuminate\Support\Facades\URL::asset('images/image19.jpg')}}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">En direct</h5>
                            <p class="card-text">Suivez nos cours en direct avec ZenGymHealth et vivez une expérience interactive et motivante, comme si vous y étiez, depuis le confort de votre domicile !</p>
                            <a href="javascript:void(0)" class="btn btn-outline-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
