

@include('layouts.navbar_vitrine',['menuprincipaleactive' =>'formation_instructeur','menuactive' =>''])

<!-- Sections:Start -->

<section id="landingContact" class="section-py bg-body" style="margin-top: -50px">
    <div class="container" style="margin-top: 100px">
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
        <div class="card" style="padding: 10px">


            <div class="card-body row g-3">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                        <div class="me-1">
                            <h5 class="mb-1">{{$detail[0]['titre']}}</h5>
                            <p class="mb-1">{{$detail[0]['sujet']}}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-label-danger">{{$detail_cat[0]['lib']}}</span>

                        </div>
                    </div>
                    <div class="card academy-content shadow-none border">

                        <div class="card-body">

                            <p class="mb-0 pt-1">
                                <?php
                                echo html_entity_decode($detail[0]['desc']);
                                ?>
                            </p>
                            <hr class="my-4">

                            <div class="d-flex flex-wrap">
                                <table
                                    class="table">

                                    <tr>
                                        <td>
                                            <p style="color: #864299">{{ __('content.date') }} & {{ __('content.heure') }}</p>
                                            <i class='fa fa-calendar bx-sm me-2'></i>{{$detail[0]['date']}}<br>
                                            <i class='fa fa-clock-o bx-sm me-2'></i>{{$detail[0]['heure']}}
                                        </td>
                                        <td style="width: 450px">
                                            <p style="color: #864299">{{ __('content.place') }}</p>
                                            <i class='fa fa-map-marker bx-sm me-2'></i>{{$detail[0]['lieu']}}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="color: #864299">{{ __('content.langue') }}</p>
                                            <ul>
                                                @if(count($detail_langue)>0)
                                                    @foreach($detail_langue as $lang)
                                                        <li>
                                                            {{$lang['langue']}}
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>

                                        </td>
                                        <td></td>

                                    </tr>
                                </table>


                            </div>

                            <h5><br>{{ __('content.instructeur') }}</h5>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar-sm me-2">
                                        @if($detail_instructeur[0]['photo'])
                                            <img src="data:image/jpg;base64,{{$detail_instructeur[0]['photo'] }}" alt="Avatar" class="rounded-circle">

                                        @else
                                            <img src="https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png" alt="Avatar" class="rounded-circle">

                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="fw-medium">{{$instructeur}}</span>
                                    <small class="text-muted">{{$categ_instructeur[0]['desc']}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="text-align: center">
                    <!-- {{$nbr_participant =intval($detail[0]['nbr_participant']) }}-->
                    <!-- {{$nbr_place_max =intval($detail[0]['nbr_place_max']) }}-->
                    <!-- {{$res =$nbr_place_max - $nbr_participant }}-->

                    @if($detail_cat[0]['id'] != 2)
                        <h5 class="mb-1">Nombre de places libres :</h5>
                        <p class="mb-1">  {{$res}}</p>
                    @endif

                    <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                        <div class="card-body">
                            <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.a_propos_du_formateur') }}</h5>

                            @if($detail_instructeur[0]['photo'])
                                <img src="data:image/jpg;base64,{{$detail_instructeur[0]['photo'] }}" alt="Avatar" class="rounded-circle" style="width: 20%; height: 100%;">

                            @else
                                <img src="https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png" alt="Avatar" class="rounded-circle" style="width: 100px">

                            @endif
                            <p>
                                {{$instructeur}}
                                <br>
                                <small class="text-muted">{{$categ_instructeur[0]['desc']}}</small>
                            </p>
                        </div>
                    </div>
                    <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                        <div class="card-body">
                            <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.num_contact') }}</h5>

                            <p>
                                {{$detail[0]['contact']}}
                            </p>
                            <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.frais') }} {{$detail[0]['devise']}}</h5>

                            <p>
                                {{$detail[0]['frais']}}
                                {{$detail[0]['devise']}}
                            </p>
                        </div>
                    </div>
                    @if($detail_cat[0]['id'] != 2)
                        @if($res != 0)
                            <div class="card academy-content shadow-none border">

                                <div class="card-body">
                                    <a href="{{route('formation.details.inscription_form',$detail[0]['id'])}}" class="btn btn-sm btn-icon" style="background-color: #864299; color: white; width:100%;padding:20px; margin-bottom: 5px">

                                        {{ __('content.inscrivez_vous_maintenant') }}
                                    </a>

                                </div>
                            </div>
                        @endif
                    @else
                        <div class="card academy-content shadow-none border">

                            <div class="card-body">
                                <a href="{{route('formation.details.inscription_form',$detail[0]['id'])}}" class="btn btn-sm btn-icon" style="background-color: #864299; color: white; width:100%;padding:20px; margin-bottom: 5px">

                                    {{ __('content.inscrivez_vous_maintenant') }}
                                </a>

                            </div>
                        </div>
                    @endif


                </div>
            </div>




        </div>
{{--        <div class="card" style="margin-top: 10px">--}}


{{--            <div class="card-body row g-3">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <iframe src="{{route('formation.details.iframe_carousel_photos',$detail[0]['id'])}}" style="width: 100%;height: 1000px" title="Example Site">--}}
{{--                    </iframe>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6">--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}





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



