@extends('layouts.app_vitrine')

@section('content')
    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'blog','menuactive' =>''])

    <!-- Sections:Start -->
    <!-- Help Center Header: Start -->
    <section class="section-py first-section-pt" style="
    background-image: url('https://img.freepik.com/photos-gratuite/groupe-femmes-travaillant_23-2148387782.jpg?t=st=1733738138~exp=1733741738~hmac=6cbf261d885e68df0716e8f9bfe1f40da7bc6f018635c9b123894425d5c36385&w=1380');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 10px -10px;
    ">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6" style="text-align: center;">
                            <h1 style="font-family: cursive;color: black">Atherosclerosis Journal </h1>
                        </div>

                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row g-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-6 gap-2">
                        <div class="me-1">

                            <br>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-label-danger">Atherosclerosis Journal</span>
                        </div>
                    </div>
                    <div class="card academy-content shadow-none border">
                        <div class="p-2">
                            <div class="cursor-pointer">
                                <img style="width: 100%" class="img-fluid" src="https://i.postimg.cc/tTQQB0v5/Whats-App-Image-2025-02-27-14-32-27-407bf9ef.jpg" alt="Le Blob" />
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <p class="mb-0" style="text-align: justify">
                                <?php
                                echo html_entity_decode(__('content.L’article intitulé « Effectiveness of physical activity program ‘ZENGYM’ on cardiovascular disease risk in a female Tunisian population » explore l’impact du programme ZENGYM sur le risque de maladies cardiovasculaires chez les femmes tunisiennes.'));
                                ?>
                            </p>
                            <p class="mb-0" style="text-align: justify">
                                <?php
                                echo html_entity_decode(__('content.Les auteurs, dont Mouna Abrougui, ont mené une étude sur une période de 12 semaines, démontrant que le programme ZENGYM réduit significativement les facteurs de risque cardiovasculaire chez les participantes. Ces résultats suggèrent que l’intégration du programme ZENGYM pourrait être bénéfique pour améliorer la santé cardiovasculaire dans cette population.'));
                                ?>
                            </p>
                            <hr class="my-6">
                            <h5>
                                <p class="mb-0" style="text-align: justify">
                                    <?php
                                    echo html_entity_decode(__('content.Pour consulter l’article complet, vous pouvez visiter le lien suivant :'));
                                    ?>
                                </p>
                            </h5>
                            <div class="d-flex flex-wrap row-gap-2">
                                <div class="me-12">
                                    <p class="text-nowrap mb-2">
                                        <a href="https://www.atherosclerosis-journal.com/article/S0021-9150%2824%2900470-2/fulltext?utm_source=chatgpt.com">
                                            <?php
                                            echo html_entity_decode(__('content.Cliquer sur ce lien'));
                                            ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <hr class="my-6">
                            <h5>
                                <?php
                                echo html_entity_decode(__('content.Article ajoutée par'));
                                ?>
                            </h5>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-4">
                                        <img src="https://cdn-icons-png.flaticon.com/512/33/33308.png" alt="Avatar" class="rounded-circle">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1">ZENGYM HEALTH</h6>
                                    <small>ZENGYM TEAM</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
