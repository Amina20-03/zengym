

@include('layouts.navbar_vitrine',['menuprincipaleactive' =>'','menuactive' =>''])

<!-- Sections:Start -->

<section id="landingContact" class="section-py bg-body">
    <div class="container" style="margin-top: 20px">
        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);">
                                {{ __('content.Détails') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('evenement.details.photos',$detail['id'])}}">
                                {{ __('content.photos') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('evenement.details.videos',$detail['id'])}}">
                                {{ __('content.video') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Navbar pills -->
        <div class="card" style="padding: 10px">


            <div class="card-body row g-3">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                        <div class="me-1">
                            <h5 class="mb-1">{{$detail['titre']}}</h5>
                            <p class="mb-1">{{$detail['desc']}}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-label-danger">
                                {{$detail_cat['desc']}}
                            </span>

                        </div>
                    </div>
                    <div class="card academy-content shadow-none border">

                        <div class="card-body">

                            <p class="mb-0 pt-1">
                                <?php
                                echo html_entity_decode($detail['sujet']);
                                ?>
                            </p>
                            <hr class="my-4">

                            <div class="d-flex flex-wrap">
                                <table
                                    class="table">

                                    <tr>
                                        <td>
                                            <p style="color: #864299">{{ __('content.date_deb') }}</p>
                                            <i class='fa fa-calendar bx-sm me-2'></i>{{$detail['date_deb']}}<br>
                                            @if($detail['heure_deb'] != $detail['heure_fin'])
                                                <i class='fa fa-clock-o bx-sm me-2'></i>{{$detail['heure_deb'] ?? ''}}
                                            @endif

                                        </td>
                                        <td style="width: 200px">
                                            <p style="color: #864299">{{ __('content.date_fin') }}</p>
                                            <i class='fa fa-calendar bx-sm me-2'></i>{{$detail['date_fin']}}<br>
                                            @if($detail['heure_deb'] != $detail['heure_fin'])
                                                <i class='fa fa-clock-o bx-sm me-2'></i>{{$detail['heure_fin'] ?? ''}}
                                            @endif


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
                                        <td>

                                        </td>

                                    </tr>
                                </table>


                            </div>
                            <div class="d-flex flex-wrap">
                                <table
                                    class="table">

                                    <tr>
                                        <td style="width: 235px;">
                                            <strong>
                                                {{ __('content.participant_a_levennement') }}:
                                            </strong>
                                        </td>
                                        <td>
                                            {{$detail['participant_a_levennement']}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                {{ __('content.participant_non_inscrit') }}:
                                            </strong>
                                        </td>
                                        <td>
                                            {{$detail['participant_non_inscrit']}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                {{ __('content.frais') }}:
                                            </strong>
                                        </td>
                                        <td>
                                            {{$detail['frais']}} {{$detail['devise']}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                {{ __('content.num_contact') }}:
                                            </strong>
                                        </td>
                                        <td>
                                            {{$detail['contacte']}}
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="text-align: center">
{{--                    <h5 class="mb-1">{{ __('content.nbr_place_max') }}</h5>--}}
{{--                    <p class="mb-1">{{$detail['nbr_place_dispo']}}</p>--}}
                    @if(!empty($detail_instructeur))
                        <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                            <div class="card-body">
                                <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.Organisateur_evennement') }}</h5>
                                @if($detail_instructeur['photo'])
                                    <img src="data:image/jpg;base64,{{$detail_instructeur['photo'] }}" alt="Avatar" class="rounded-circle" style="width: 50px;height: 50px">

                                @else
                                    <img src="https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png" alt="Avatar" class="rounded-circle" style="width: 100px">

                                @endif
                                <p>
                                    {{$instructeur}}
                                    <br>
                                    <small class="text-muted">{{$categ_instructeur['desc']}}</small>
                                </p>
                            </div>
                        </div>
                    @endif

                    <div class="card academy-content shadow-none border" style="margin-bottom: 10px">

                        <div class="card-body">
                            <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.salle') }}</h5>

                            <p>
                                {{$detail['salle']}}
                            </p>
                            <h5 class="mb-1" style="padding-bottom: 10px">{{ __('content.info_sur_lieu') }}</h5>

                            <p>
                                {{$detail['info_sur_lieu']}}
                            </p>
                        </div>
                    </div>

                    <div class="card academy-content shadow-none border">

                        <div class="card-body">
{{--                            @if($detail[0]['nbr_place_restant'] != 0)--}}
                                <a href="{{route('evenement.details.inscription',$detail['id'])}}" class="btn btn-sm btn-icon" style="background-color: #864299; color: white; width:100%;padding:20px; margin-bottom: 5px">

                                    {{ __('content.inscrivez_vous_maintenant') }}
                                </a>
{{--                            @endif--}}

                        </div>
                    </div>
                </div>
            </div>




        </div>




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



