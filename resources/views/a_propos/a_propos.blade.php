@extends('layouts.app_vitrine')

@section('content')

    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'apropos','menuactive' =>''])

    <!-- Sections:Start -->
    <section class="section-py first-section-pt" style="margin-top: -30px">
        <div class="container">
            <div class="row mb-12 g-12">
                <div class="col-md-12 col-xl-12">
                    <div class="card bg-dark border-0 text-white">
                        <img class="card-img" src="{{\Illuminate\Support\Facades\URL::asset('images/devenir_franchise_affiche_zengym.png')}}" style="height: 300px"/>
                        <div class="card-img-overlay" style="margin-top: 100px">
                            <h5 class="card-title" style="font-size: 30px;color: black">
                                <strong>
                                    {{ __('content.a_propos') }}
                                </strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Help Center Header: Start -->
    <section class="section-py first-section-pt" style="margin-top: -150px">
        <div class="container">

            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="Slogan-ZenGym-iframe"
                            src="{{route('a_propos.Slogan_ZenGym_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                            onload="resizeIframe(this)"
                            style="width:100%; border:none;"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="section-py first-section-pt" style="margin-top: -130px">
        <div class="container">
    
            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="ZenGym-Presentation-iframe"
                            src="{{route('a_propos.ZenGym_Presentation_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                            onload="resizeIframe(this)"
                            style="width:100%; border:none;"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -150px">
        <div class="container">
           
            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <iframe id="Le-Concept-ZENGYM-iframe"
                            src="{{route('a_propos.Le_Concept_ZENGYM_iframe')}}"
                            scrolling="no"
                            frameborder="0"
                            onload="resizeIframe(this)"
                            style="width:100%; border:none;"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>


    <!-- Popular Articles: Start -->
    <section class="section-py">
        <div class="container">
            <h3 class="text-center mb-4">
                <?php
                echo html_entity_decode(__('content.Rejoignez la communauté ZENGYMHEALTH'));
                ?>
            </h3>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="rounded-3 text-center mb-3 pt-4" style="height: 400px;background-image: url('{{\Illuminate\Support\Facades\URL::asset('images/image10.PNG')}}');background-size: cover">

                                    </div>
                                    <h4 class="mb-2 pb-1" style="color: #9b59b6;text-align: center">{{ __('content.Adhérents') }}</h4>
                                    <div class="col-12 text-center">
                                        <a href="javascript:void(0);" class="btn btn-primary w-100 d-grid">{{ __('content.Réservez un cours en ligne.') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="rounded-3 text-center mb-3 pt-4" style="height: 400px;background-image: url('{{\Illuminate\Support\Facades\URL::asset('images/image11.PNG')}}');background-size: cover">

                                    </div>
                                    <h4 class="mb-2 pb-1" style="color: #9b59b6;text-align: center">{{ __('content.Professionnels') }}</h4>

                                    <div class="col-12 text-center">
                                        <a href="javascript:void(0);" class="btn btn-primary w-100 d-grid">{{ __('content.Inscrivez-vous à nos formations.') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="rounded-3 text-center mb-3 pt-4" style="height: 400px;background-image: url('{{\Illuminate\Support\Facades\URL::asset('images/image12.PNG')}}');background-size: cover">

                                    </div>
                                    <h4 class="mb-2 pb-1" style="color: #9b59b6;text-align: center">{{ __('content.Entreprises') }}</h4>
                                    <div class="col-12 text-center">
                                        <a href="javascript:void(0);" class="btn btn-primary w-100 d-grid">{{ __('content.Contactez-nous pour développer un programme sur mesure.') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Articles: End -->


    <!-- Contact Us: Start -->
    <section id="landingContact" class="section-py bg-body landing-contact">
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
                                <div class="col-md-6 col-lg-12 col-xl-7">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-primary rounded p-2 me-2"><i class="fa fa-envelope bx-sm"></i></div>
                                        <div>
                                            <p class="mb-0">Email</p>
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
                                            <p class="mb-0">Téléphone</p>
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
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
    function resizeIframe(iframe) {
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + "px";
    }
</script>

@endsection
