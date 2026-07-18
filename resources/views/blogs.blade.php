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
                            <h1 style="font-family: cursive;color: black">{{ __('content.blogs') }} </h1>
                        </div>

                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="card mb-6">
        <div class="card-body">
            <div class="row gy-6 mb-6">
                <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                        <div class="rounded-2 text-center mb-4">
                            <a href="{{route('blog_1_vitrine')}}">
                                <img class="img-fluid" src="https://leblob.fr/sites/default/files/styles/full_width_big/public/2024-03/GettyImages-1246034757.jpg?h=119335f7&itok=rAD3ZQws" alt="Le Blob" />
                            </a>
                        </div>
                        <div class="card-body p-4 pt-2">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="badge bg-label-primary">Le Blob</span>
                                <p class="d-flex align-items-center justify-content-center fw-medium gap-1 mb-0">
                                    <span class="fw-normal">
                                        <?php
                                        echo html_entity_decode(__('content.March 27, 2024'));
                                        ?>
                                    </span>
                                </p>
                            </div>
                            <a href="{{route('blog_1_vitrine')}}" class="h5">
                                <?php
                                echo html_entity_decode(__('content.Site « Le Blob »'));
                                ?>
                            </a>
                            <p class="mt-1">
                                <?php
                                echo html_entity_decode(__('content.The article about the ZENGYM program was published on the “Le Blob” website. The article focuses on the effectiveness of the ZENGYM program, which combines...'));
                                ?>
                            </p>
                            <div class="d-flex flex-column flex-md-row gap-4 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                <a class="w-100 btn btn-label-primary d-flex align-items-center" href="{{route('blog_1_vitrine')}}">
                                    <span class="me-2">{{ __('content.Détails') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                        <div class="rounded-2 text-center mb-4">
                            <a href="{{route('blog_2_vitrine')}}">
                                <img class="img-fluid" src="https://leblob.fr/sites/default/files/styles/full_width_big/public/2024-03/GettyImages-1246034757.jpg?h=119335f7&itok=rAD3ZQws" alt="Le Blob" />
                            </a>
                        </div>
                        <div class="card-body p-4 pt-2">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="badge bg-label-primary"> La revue Atherosclerosis </span>
                                <p class="d-flex align-items-center justify-content-center fw-medium gap-1 mb-0">

                                </p>
                            </div>
                            <a href="{{route('blog_2_vitrine')}}" class="h5">
                                La revue Atherosclerosis
                            </a>
                            <p class="mt-1">
                                <?php
                                echo html_entity_decode(__('content.Il existe une étude scientifique publiée dans la revue Atherosclerosis intitulée : « Effet d’un programme d’activité physique ‘ZENGYM’ sur le syndrome métabolique chez les femmes sédentaires. » Cette étude confirme...'));
                                ?>
                            </p>
                            <div class="d-flex flex-column flex-md-row gap-4 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                <a class="w-100 btn btn-label-primary d-flex align-items-center" href="{{route('blog_2_vitrine')}}">
                                    <span class="me-2">{{ __('content.Détails') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                        <div class="rounded-2 text-center mb-4">
                            <a href="{{route('blog_3_vitrine')}}">
                                <img class="img-fluid" src="https://i.postimg.cc/tTQQB0v5/Whats-App-Image-2025-02-27-14-32-27-407bf9ef.jpg" alt="Le Blob" style="width: 220px"/>
                            </a>
                        </div>
                        <div class="card-body p-4 pt-2">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="badge bg-label-primary">Atherosclerosis Journal</span>
                                <p class="d-flex align-items-center justify-content-center fw-medium gap-1 mb-0">

                                </p>
                            </div>
                            <a href="{{route('blog_3_vitrine')}}" class="h5">
                                Atherosclerosis Journal
                            </a>
                            <p class="mt-1">
                                <?php
                                echo html_entity_decode(__('content.L’article intitulé « Effectiveness of physical activity program ‘ZENGYM’ on cardiovascular disease risk in a female Tunisian population » explore l’impact du programme ZENGYM sur le risque de maladies cardiovasculaires chez les femmes tunisiennes.'));
                                ?>
                            </p>
                            <div class="d-flex flex-column flex-md-row gap-4 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                <a class="w-100 btn btn-label-primary d-flex align-items-center" href="{{route('blog_3_vitrine')}}">
                                    <span class="me-2">{{ __('content.Détails') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card p-2 h-100 shadow-none border">
                        <div class="rounded-2 text-center mb-4">
                            <a href="{{route('blog_4_vitrine')}}">
                                <img class="img-fluid" src="https://www.termedia.pl/f/covers/mag78.jpg?p=4sa" alt="Le Blob" style="width: 220px"/>
                            </a>
                        </div>
                        <div class="card-body p-4 pt-2">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="badge bg-label-primary">Biology of sport</span>
                                <p class="d-flex align-items-center justify-content-center fw-medium gap-1 mb-0">

                                </p>
                            </div>
                            <a href="{{route('blog_4_vitrine')}}" class="h5">
                                Original paper
                            </a>
                            <p class="mt-1">
                                <?php
                                echo html_entity_decode(__('content.Twenty-four weeks of combined exercise training prevents metabolic syndrome progression in adult women: evidence from a randomized controlled trial'));
                                ?>
                            </p>
                            <div class="d-flex flex-column flex-md-row gap-4 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                <a class="w-100 btn btn-label-primary d-flex align-items-center" href="{{route('blog_4_vitrine')}}">
                                    <span class="me-2">{{ __('content.Détails') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
