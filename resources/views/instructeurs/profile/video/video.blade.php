

@include('layouts.navbar_vitrine',['menuprincipaleactive' =>'cours_locaux','menuactive' =>''])

<!-- Sections:Start -->

<section id="landingContact" class="section-py bg-body">
    <div class="container" style="margin-top: 100px">

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('instructeur_by_categ.profile',$instructeur_id)}}">
                            <i class='fa fa-user me-1'></i> {{ __('content.Mon_Profile') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('instructeur_by_categ.profile.photos',$instructeur_id)}}">
                            <i class='fa fa-picture-o me-1'></i> {{ __('content.photos') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);">
                            <i class='fa fa-video-camera me-1'></i> {{ __('content.video') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('instructeur_by_categ.profile.docs',$instructeur_id)}}">
                            <i class='fa fa-files-o me-1'></i> {{ __('content.certif') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- User Profile Content -->
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">{{ __('content.mes_videos') }}</h5>

                    </div>
                    <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                        @if(count($detail_cat)==0)
                            <select id="select2_course_select" class="select2 form-select" name="categ_id" data-placeholder="{{ __('content.tous_cat') }}" onchange="search_photo_by_categ()">
                                <option value="">{{ __('content.tous_cat') }}</option>
                                @for($i=0;$i<count($list_cat);$i++)
                                    <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['lib']}}</option>

                                @endfor
                            </select>
                        @else
                            <select id="select2_course_select" name="categ_id" class="select2 form-select" data-placeholder="{{ __('content.tous_cat') }}" onchange="search_photo_by_categ()">

                                @if($detail_cat[0]['id'] != 'null')
                                    <option value="{{$detail_cat[0]['id']}}">
                                        {{$detail_cat[0]['lib']}}
                                    </option>
                                    <option value="">{{ __('content.tous_cat') }}</option>
                                @else
                                    <option value="">{{ __('content.tous_cat') }}</option>
                                @endif
                                @for($i=0;$i<count($list_cat);$i++)
                                    @if($list_cat[$i]['id'] !=$detail_cat[0]['id'])
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['lib']}}</option>
                                    @endif


                                @endfor



                            </select>
                        @endif




                    </div>
                </div>
                <div class="card-body">

                    <div class="row gy-4 mb-4">

                        @if(count($liste_videos)>0)
                            @foreach($liste_videos as $elem)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card p-2 h-100 shadow-none border">
                                        <div class="rounded-2 text-center mb-3 cursor-pointer">

                                            @if($elem['path'])

                                                <video class="w-100" poster="" playsinline controls>
                                                    <source src="{{storage_path() .'/app/public/'. $elem['path']}}" type="video/mp4" />
                                                </video>

                                            @else
                                                <img class="img-fluid" src="https://cdn.icon-icons.com/icons2/2979/PNG/512/video_play_film_media_icon_186990.png" alt="tutor image 1" />
                                            @endif

                                        </div>
                                        <div class="card-body p-3 pt-2">
                                            <div class="d-flex justify-content-between align-items-center mb-3" style="float: right">
                                                <span class="badge bg-label-primary">{{$elem['categ_lib'] }}</span>

                                            </div>
                                            <a href="#" class="h5">{{$elem['titre'] }}</a>
                                            <p class="mt-2">{{$elem['desc'] }}<br><br></p>


                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif

                    </div>

                </div>
            </div>
        </div>

        <form method="POST" action="{{route('instructeur.profile.videos.search')}}" id="search_photo_form" class="add-new-user pt-0">
            @csrf
            @include('layouts.delete_modal')
            <input type="hidden" name="id_categ_searching" id="id_categ_searching"/>

        </form>
        <!--/ User Profile Content -->




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



