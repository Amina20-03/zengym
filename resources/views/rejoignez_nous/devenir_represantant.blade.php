@extends('layouts.app_vitrine')

@section('content')
    <style>
        /* Default height for larger screens */
        #responsive-iframe {
            height: 850px;
            width: 100%;
            overflow: hidden;
        }

        /* Adjust height for smaller screens (800px width and below) */
        @media (max-width: 800px) {
            #responsive-iframe {
                height: 1455px;
            }
        }
        @media (max-width: 400px) {
            #responsive-iframe {
                height: 1455px;
            }
        }

    </style>
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
                                    <?php
                                    echo html_entity_decode(__('content.Devenir un Représentant'));
                                    ?>
                                </strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -250px">
        <div class="container">

            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="responsive-iframe"
                            src="{{route('rejoignez_nous.devenir_representant_demarche_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
