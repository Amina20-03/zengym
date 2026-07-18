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
                            <h1 style="font-family: cursive;color: black">Le Blob </h1>
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
                            <h5 class="mb-0">
                                <?php
                                echo html_entity_decode(__('content.This article was published on March 27, 2024'));
                                ?>
                            </h5>
                            <br>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-label-danger">Le Blob</span>
                        </div>
                    </div>
                    <div class="card academy-content shadow-none border">
                        <div class="p-2">
                            <div class="cursor-pointer">
                                <img style="width: 100%" class="img-fluid" src="https://leblob.fr/sites/default/files/styles/full_width_big/public/2024-03/GettyImages-1246034757.jpg?h=119335f7&itok=rAD3ZQws" alt="Le Blob" />
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <p class="mb-0" style="text-align: justify">
                                <?php
                                echo html_entity_decode(__('content.Larticle sur le programme ZENGYM a été publié sur le site Le Blob. Larticle met en avant l’efficacité du programme ZENGYM, qui combine des exercices d’endurance et de résistance, dans la réduction du syndrome métabolique chez les femmes sédentaires.Létude a été menée sur 103 femmes de la ville de Monastir, en Tunisie, qui ont suivi un programme dentraînement de 24 semaines, comprenant trois séances hebdomadaires de 55 minutes chacune.Les résultats ont montré une amélioration significative des indicateurs de santé et de condition physique, notamment une réduction de l’indice de masse corporelle (IMC) d’environ 12 %, une diminution de la masse grasse d’un quart, et une augmentation de la masse musculaire de 25 %.Une baisse du taux de glucose sanguin d’environ 6 % et une réduction de la pression artérielle de près de 20 % ont également été observées.En outre, les participantes ont constaté une diminution du stress et de l’anxiété.'));
                                ?>
                            </p>
                            <br>
                            <p class="mb-0" style="text-align: justify">
                                <?php
                                echo html_entity_decode(__('content.Ces résultats encourageants ont incité la chercheuse Mouna Abrougui, qui a développé le programme dans le cadre de sa thèse en Sciences et Techniques des Activités Physiques et Sportives, à chercher à étendre ce programme à un public plus large afin de réduire les risques de maladies cardiovasculaires.'));
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
                                        <a href="https://leblob.fr/en/lactate-lesions-metabolism-science-and-sport-rich-relationship">
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
