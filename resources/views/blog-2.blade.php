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
                            <h1 style="font-family: cursive;color: black">La revue Atherosclerosis </h1>
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
                            <span class="badge bg-label-danger">La revue Atherosclerosis</span>
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
                                echo html_entity_decode(__('content.En plus de l’article publié sur Le Blob sur l’efficacité du programme ZENGYM dans la réduction du syndrome métabolique chez les femmes sédentaires, une étude scientifique a été publiée dans la revue Atherosclerosis sous le titre : "Effect of a physical activity program ‘ZENGYM’ on metabolic syndrome in sedentary women".Cette étude confirme les résultats positifs du programme dans l’amélioration des indicateurs de santé et de condition physique des participantes.'));
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
                                        <a href="https://www.atherosclerosis-journal.com/article/S0021-9150%2824%2900502-1/fulltext">
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
