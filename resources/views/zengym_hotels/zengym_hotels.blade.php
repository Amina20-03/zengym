@extends('layouts.app_vitrine')

@section('content')
    <style>
        /* Default height for larger screens */
        #responsive-iframe {
            height: 850px;
            width: 100%;
            overflow: hidden;
        }
        #responsive-iframe2 {
            height:420px;
            width: 100%;
            overflow: hidden;
        }
        #responsive-iframe3 {
            height:500px;
            width: 100%;
            overflow: hidden;
        }
        #responsive-iframe4 {
            height:650px;
            width: 100%;
            overflow: hidden;
        }
        #responsive-iframe5 {
            height:400px;
            width: 100%;
            overflow: hidden;
        }
        #responsive-iframe6 {
            height:230px;
            width: 100%;
            overflow: hidden;
        }
        #responsive-iframe7 {
            height:330px;
            width: 100%;
            overflow: hidden;
        }
        /* Adjust height for smaller screens (800px width and below) */
        @media (max-width: 800px) {
            #responsive-iframe {
                height: 1300px;
            }
            #responsive-iframe2 {
                height: 700px;
            }
            #responsive-iframe3 {
                height: 845px;
            }
            #responsive-iframe4 {
                height: 1750px;
            }
            #responsive-iframe5 {
                height: 610px;
            }
            #responsive-iframe6 {
                height: 750px;
            }
            #responsive-iframe7 {
                height: 750px;
            }
        }
        @media (max-width: 400px) {
            #responsive-iframe {
                height: 1400px;
            }
            #responsive-iframe2 {
                height: 655px;
            }
            #responsive-iframe3 {
                height: 955px;
            }
            #responsive-iframe4 {
                height: 2100px;
            }
            #responsive-iframe5 {
                height: 690px;
            }
            #responsive-iframe6 {
                height: 850px;
            }
            #responsive-iframe7 {
                height: 850px;

            }
        }

    </style>
    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'','menuactive' =>''])

    <section class="section-py first-section-pt" style="margin-top: -35px">
        <div class="container">
            <div class="row mb-12 g-12">
                <div class="col-md-12 col-xl-12">
                    <div class="card bg-dark border-0 text-white">
                        <img class="card-img" src="{{\Illuminate\Support\Facades\URL::asset('images/hotel.png')}}" style="height: 300px"/>
                        <div class="card-img-overlay" style="margin-top: 100px">
                            <h5 class="card-title" style="font-size: 30px;color: black">
                                <strong>
                                    <?php
                                    echo html_entity_decode(__('content.ZENGYM - Présentation à l’hôtel'));
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
                            src="{{route('zengym_hotels.presentation_zengym_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -200px">
        <div class="container">

            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="responsive-iframe2"
                            src="{{route('zengym_hotels.slogon_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -140px">
        <div class="container">
            <h3 class="text-center mb-4">
                <?php
                echo html_entity_decode(__('content.Pourquoi ZENGYM® dans un hôtel ?'));
                ?>

            </h3>
            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="responsive-iframe3"
                            src="{{route('zengym_hotels.pourquoi_zengym_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -140px">
        <div class="container">
            <h3 class="text-center mb-4">

                <?php
                echo html_entity_decode(__('content.Les valeurs fondamentales du ZENGYM®'));
                ?>
            </h3>
            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="responsive-iframe4"
                            src="{{route('zengym_hotels.les_valeurs_fondamentales_du_zengym_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -100px">
        <div class="container">
            <h3 class="text-center mb-4">

                <?php
                echo html_entity_decode(__('content.Formules proposées'));
                ?>
            </h3>
            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="responsive-iframe5"
                            src="{{route('zengym_hotels.formules_proposees')}}"
                            scrolling="no"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -140px">
        <div class="container">
            <h3 class="text-center mb-4">

                <?php
                echo html_entity_decode(__('content.Avantages pour l’hôtel'));
                ?>
            </h3>
            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="responsive-iframe6"
                            src="{{route('zengym_hotels.avantages_pour_hotel_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style=" margin-top: -130px;">
        <div class="container">
            <h3 class="text-center mb-4">

                <?php
                echo html_entity_decode(__('content.Collaboration proposée'));
                ?>
            </h3>
            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="responsive-iframe7"
                            src="{{route('zengym_hotels.collaboration_proposee_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us: Start -->
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
            <div class="text-center mb-3 pb-1">
                <span class="badge bg-label-primary">
                <?php
                echo html_entity_decode(__('content.Contactez nous'));
                ?>
                </span>
            </div>
            <h3 class="text-center mb-1">
                <?php
                echo html_entity_decode(__('content.<span class="section-title">Travaillons</span> ensemble'));
                ?>
            </h3>
            <p class="text-center mb-4 mb-lg-5 pb-md-3">
                <?php
                echo html_entity_decode(__('content.Une question ou une remarque ? écris-nous simplement un message'));
                ?>
            </p>
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="contact-img-box position-relative border p-2 h-100">
                        <img src="https://shoutem.com/wp-content/uploads/2020/11/Fitness_phoneperson@2x-496x489.png" alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid" />
                        <div class="pt-3 px-4 pb-1">
                            <div class="row gy-3 gx-md-4">
                                <div class="col-md-6 col-lg-12 col-xl-7">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-primary rounded p-2 me-2"><i class="fa fa-envelope bx-sm"></i></div>
                                        <div>
                                            <p class="mb-0">
                                                <?php
                                                echo html_entity_decode(__('content.Email'));
                                                ?>
                                            </p>
                                            <h5 class="mb-0">
                                                <a href="mailto:contact@zengymhealth.com" class="text-heading">contact@zengymhealth.com</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-success rounded p-2 me-2">
                                            <i class="fa fa-phone bx-sm"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0">
                                                <?php
                                                echo html_entity_decode(__('content.Téléphone'));
                                                ?>
                                            </p>
                                            <h5 class="mb-0"><a href="tel:+21655688828" class="text-heading">+216 55 688 828</a></h5>
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
                            <h4 class="mb-1">
                                <?php
                                echo html_entity_decode(__('content.Envoyer un message'));
                                ?>
                            </h4>
                            <p class="mb-4">
                                <br>
                                <br>
                            </p>
                            <form>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label" for="contact-form-fullname">
                                            <?php
                                            echo html_entity_decode(__('content.Nom & Prénom'));
                                            ?>
                                        </label>
                                        <input type="text" class="form-control" id="contact-form-fullname" placeholder="john" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="contact-form-email">
                                            <?php
                                            echo html_entity_decode(__('content.Email'));
                                            ?>
                                        </label>
                                        <input type="text" id="contact-form-email" class="form-control" placeholder="johndoe@gmail.com" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="contact-form-message">
                                            <?php
                                            echo html_entity_decode(__('content.Message'));
                                            ?>
                                        </label>
                                        <textarea id="contact-form-message" class="form-control" rows="9" placeholder="Write a message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <?php
                                            echo html_entity_decode(__('content.Envoyer'));
                                            ?>
                                        </button>
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
