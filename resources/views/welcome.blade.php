@extends('layouts.app_vitrine')

@section('content')
    <style>
        /* Basic styling for the title */
        .title {
            font-family: Arial, sans-serif;
            font-size: 30px;
            color: #333;
            text-align: center;
            margin-top: 50px;
            font-weight: bold;
        }

        /* Bubble effect for the changing word */
        .bubble-wizard {
            display: inline-block;
            padding: 5px 40px;
            background-color: #fce3ff;
            font-family: cursive;
            border-radius: 25px;
            color: #9352ad;
            font-weight: bold;
            position: relative;
        // animation: pop 2s infinite; /* Optional animation for the bubble */
        }
        /* Animation to make the bubble "pop" */
        @keyframes pop {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }

        /* Word transition */
        .word {
            display: inline-block;
            animation: fade 3s infinite;
        }
        @keyframes typewriter {
            0% {
                width: 0;
            }
            50% {
                width: 100%;
            }
            100% {
                width: 0;
            }
        }

        .word {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            border-right: 2px solid #fff;
            animation: pop 3s steps(10) infinite;
        }


        /* Smooth fade-in and fade-out */
        @keyframes fade {
            0%, 20% {
                opacity: 0;
                transform: translateY(-20px);
            }
            30%, 70% {
                opacity: 1;
                transform: translateY(0);
            }
            80%, 100% {
                opacity: 0;
                transform: translateY(20px);
            }
        }


    </style>
    <style>
        /* Default height for larger screens */
        #responsive-iframe {
            height: 600px;
            width: 100%;
        }

        /* Adjust height for smaller screens (800px width and below) */
        @media (max-width: 800px) {
            #responsive-iframe {
                height: 1000px;
            }
        }
        #responsive-iframe2 {
            height: 700px;
            width: 100%;
        }
        @media (max-width: 400px) {
            #responsive-iframe2 {
                height: 500px;
            }
        }
        /* Adjust height for smaller screens (800px width and below) */
        @media (max-width: 800px) {
            #responsive-iframe2 {
                height: 300px;
            }
        }
    </style>
    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'accueil','menuactive' =>''])

    <!-- Sections:Start -->
    <!-- Help Center Header: Start -->
    <section class="section-py first-section-pt" style="position: relative; overflow: hidden;">

        <!-- 🎥 Vidéo en background -->
        <video autoplay muted loop playsinline
               style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                  object-fit: cover; z-index: -1;">
            <source src="{{ asset('https://zengymhealth.com/WhatsApp%20Video%202025-09-03%20at%2016.16.20.mp4') }}" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo.
        </video>

        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-3"></div>

                        <div class="col-md-6" style="text-align: center">
{{--                            <h1 style="font-style: italic;color: black">--}}
{{--                                <br><br><br>--}}
{{--                                ZENGYM<span style='font-size: 1.5em;'>®</span>--}}
{{--                                <small style="font-size: 20px">HEALTH</small>--}}
{{--                            </h1>--}}
{{--                            <h4 style="color: #01a65a">--}}
{{--                            <span class="bubble-wizard">--}}
{{--                                <span class="word"></span>--}}
{{--                            </span>--}}
{{--                                Sport et Santé--}}
{{--                            </h4>--}}
{{--                            <img src="{{ asset('images/logo.png') }}" style="width:40%">--}}
                            <br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br>

                        </div>

                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Help Center Header: Start -->
    <div class="row mb-12 g-6" style="background-color: whitesmoke;">
        <div class="col-lg-1 mb-6">
        </div>
        <div class="col-lg-10 mb-6" style="margin-top: -70px">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="card-title mb-auto">
                                <h4 style="font-style: italic;color: #804097">
                                    <?php
                                    echo html_entity_decode(__('content.Définition de la plateforme ZENGYMHEALTH'));
                                    ?>
                                </h4>
                                <p style="text-align: justify; font-size: 20px; color: black">
                                    <?php
                                    echo html_entity_decode(__('content.about_us_1'));
                                    ?>
                                </p>

                                <div class="demo-inline-spacing">
                                    <table style="width: 100%;">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="{{route('a_propos_vitrine')}}" class="btn btn-outline-primary">
                                                    {{ __('content.Read More') }}&nbsp;<span class="tf-icons fa fa-arrow-right bx-18px me-2"></span>
                                                </a>
                                            </td>
                                            <td style="
                                            width: 30%;
                                            background-image: url('{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}');
                                            background-size: contain;
                                            background-repeat: no-repeat;
                                            background-position: right;
                                            ">

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1 mb-6">

        </div>



        <div class="col-lg-1 mb-6">

        </div>


    </div>
    <section class="section-py" style="background-color: whitesmoke;">
        <div class="container">
            <h3 class="text-center mb-4">
                <?php
                echo html_entity_decode(__('content.Qu est-ce qui rend ZENGYMHEALTH spécial ?'));
                ?>
            </h3>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <!-- Centered Image Container -->
                                    <div class="bg-label rounded-3 text-center mb-3 pt-4 d-flex justify-content-center align-items-center mx-auto" style="width: 100px; height: 100px;">
                                        <img
                                                class="img-fluid"
                                                src="https://png.pngtree.com/png-clipart/20230421/original/pngtree-online-course-line-icon-png-image_9073262.png"
                                                alt="Online Course Icon"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;"
                                        />
                                    </div>

                                    <!-- Rest of the Card Content -->
                                    <div style="text-align: center;margin-bottom: 10px">
                                        <strong style="font-size: large;">{{ __('content.Des cours de sport innovants :') }}</strong>
                                    </div>

                                    <ul>
                                        <li style="text-align: justify; font-size: larger; color: black">
                                            <?php echo html_entity_decode(__('content.Les exercices signature de ZENGYM se concentrent sur lamélioration de la posture, le renforcement des muscles profonds et laccélération de la combustion des graisses.')); ?>
                                        </li>
                                        <li style="text-align: justify; font-size: larger; color: black">
                                            <?php echo html_entity_decode(__('content.Les exercices sont basés sur la position debout et assise sans nécessiter déquipement spécial')); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="bg-label rounded-3 text-center mb-3 pt-4 d-flex justify-content-center align-items-center mx-auto" style="width: 100px; height: 100px;">
                                        <img
                                                class="img-fluid"
                                                src="https://static.thenounproject.com/png/4552625-200.png"
                                                alt="Online Course Icon"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;"
                                        />
                                    </div>

                                    <div style="text-align: center;margin-bottom: 10px">
                                        <strong style="font-size: large;">{{__('content.Qualification des formateurs professionnels :')}}</strong>
                                    </div>
                                    <ul>
                                        <li style="text-align: justify; font-size: larger;color: black">
                                            <?php
                                            echo html_entity_decode(__('content.ZENGYM propose des programmes de formation avancée pour qualifier les formateurs, avec un système hiérarchique qui comprend « formateur, maître formateur, formateur composants, distributeur et ambassadeur ».'));
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="bg-label rounded-3 text-center mb-3 pt-4 d-flex justify-content-center align-items-center mx-auto" style="width: 100px; height: 100px;">
                                        <img
                                                class="img-fluid"
                                                src="https://static.thenounproject.com/png/1158854-200.png"
                                                alt="Online Course Icon"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;"
                                        />
                                    </div>

                                    <div style="text-align: center;margin-bottom: 10px">
                                        <strong style="font-size: large;">{{__('content.Business Support (B2B)')}}</strong>
                                    </div>
                                    <ul>
                                        <li style="text-align: justify; font-size: larger;color: black">
                                            <?php
                                            echo html_entity_decode(__('content.Programmes spécialement conçus pour améliorer la productivité des employés en améliorant leur santé physique et mentale.'));
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6 mb-md-0 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <!-- Centered Image Container -->
                                    <div class="bg-label rounded-3 text-center mb-3 pt-4 d-flex justify-content-center align-items-center mx-auto" style="width: 100px; height: 100px;">
                                        <img
                                                class="img-fluid"
                                                src="https://cdn-icons-png.flaticon.com/512/59/59534.png"
                                                alt="Online Course Icon"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;"
                                        />
                                    </div>

                                    <!-- Rest of the Card Content -->

                                    <div style="text-align: center;margin-bottom: 10px">
                                        <strong style="font-size: large;">{{__('content.Online Services:')}}</strong>
                                    </div>
                                    <ul>
                                        <li style="text-align: justify; font-size: larger;color: black">
                                            <?php
                                            echo html_entity_decode(__('content.Des cours virtuels pratiques que vous pouvez pratiquer à tout moment et en tout lieu.'));
                                            ?>
                                        </li>
                                        <li style="text-align: justify; font-size: larger;color: black">
                                            <?php
                                            echo html_entity_decode(__('content.Customized medical and health consultations.'));
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-md-0 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="bg-label rounded-3 text-center mb-3 pt-4 d-flex justify-content-center align-items-center mx-auto" style="width: 100px; height: 100px;">
                                        <img
                                                class="img-fluid"
                                                src="https://cdn-icons-png.flaticon.com/512/4599/4599811.png"
                                                alt="Online Course Icon"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;"
                                        />
                                    </div>

                                    <div style="text-align: center;margin-bottom: 10px">
                                        <strong style="font-size: large;">{{__('content.Recherche scientifique fiable :')}}</strong>
                                    </div>
                                    <ul>
                                        <li style="text-align: justify; font-size: larger;color: black">
                                            <?php
                                            echo html_entity_decode(__('content.The platform is based on scientific research conducted on more than 160 patients with metabolic syndromes, making it effective for patients with type 2 diabetes, hypertension, and obesity.'));
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-py">
        <div class="container">
            <h3 class="text-center mb-4">
                <?php
                echo html_entity_decode(__('content.Rejoignez la communauté ZENGYMHEALTH'));
                ?>
            </h3>

            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-12">
                            <iframe src="{{route('rejoignez_communaute_iframe')}}" style="width: 100%;height: 600px"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-py" style="margin-top: -140px">
        <div class="container">


            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-12">
                            <iframe src="{{route('utilisation_marque_depose_iframe')}}"
                                    id="responsive-iframe"
                                    frameborder="0"
                                    scrolling="no"
                                    style=" border: none;"></iframe>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section-py" style="margin-top: -200px">
        <div class="container" style="text-align: center;">

            <iframe src="{{route('notre_message_iframe')}}"
                    id="responsive-iframe2"
                    frameborder="0"
                    scrolling="no"
                    style=" border: none;"></iframe>


        </div>
    </section>

    <section class="section-py" style="background-color: whitesmoke">
        <div class="container">
            <h3 class="text-center mb-4">

                <?php
                echo 'Nos Événements';
                ?>
            </h3>
            <div class="row">
                <!-- {{$Evenements = \Illuminate\Support\Facades\DB::table('evenements')->get()}} -->
                @if(!empty($Evenements) && count($Evenements) > 0)
                    @foreach($Evenements as $event)
                        @if($event->approuver && $event->date_deb >= \Carbon\Carbon::now()->format('Y-m-d'))
                            <div style="margin-top: 2%" class="col-md-6 col-xxl-4">
                                <div class="card h-100">
                                    @php
                                        $affiche_url = null;
                                        if (!empty($event->affiche)) {
                                            // Affiche uploadée via le nouveau système (storage WebP)
                                            $affiche_url = 'https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/' . $event->affiche;
                                        } else {
                                            // Chercher dans evenements_photos
                                            $ep = \Illuminate\Support\Facades\DB::table('evenements_photos')
                                                ->where('event_id', $event->id)
                                                ->first();
                                            if ($ep && !empty($ep->photo)) {
                                                // Nouveau système : chemin storage
                                                if (strlen($ep->photo) < 500) {
                                                    $affiche_url = 'https://www.zengymhealth.com/zen_gym_ws/project/storage/app/public/' . $ep->photo;
                                                }
                                                // Ancien base64 : on ignore — trop lourd et non webp
                                            }
                                        }
                                    @endphp
                                    @if($affiche_url)
                                        <img src="{{ $affiche_url }}" alt="{{ $event->titre }}" class="img-fluid" style="height:220px;object-fit:cover;">
                                    @else
                                        <div style="height:220px;background:linear-gradient(135deg,#6a0dad,#a855f7);display:flex;align-items:center;justify-content:center;">
                                            <i class="fa fa-calendar-check-o fa-3x text-white opacity-75"></i>
                                        </div>
                                    @endif
                                    <div class="mt-n8">
                                        <span class="featured-date d-inline-block ms-6 rounded shadow-lg text-center py-1 px-4" style="margin-top: -30px;margin-left:15px;background-color: white">
                                          <span class="mb-0 h4">{{ \Carbon\Carbon::parse($event->date_deb)->format('d') }}</span><br>
                                          <span class="text-primary">{{ \Carbon\Carbon::parse($event->date_deb)->format('M') }}</span>
                                        </span>
                                        <span class="featured-date d-inline-block ms-6 rounded shadow-lg text-center py-1 px-4" style="margin-top: -30px;margin-left:15px;background-color: white">
                                          <span class="mb-0 h4">{{ \Carbon\Carbon::parse($event->date_fin)->format('d') }}</span><br>
                                          <span class="text-primary">{{ \Carbon\Carbon::parse($event->date_fin)->format('M') }}</span>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="mb-1">{{$event->titre }}</h5>
                                        <!-- {{$detail_langue = \Illuminate\Support\Facades\DB::table('langue_evennements')->where('evennement_id',$event->id)->get()}} -->
                                        <div class="d-flex gap-2">
                                            @if(count($detail_langue))
                                                @foreach($detail_langue as $lang)
                                                    <span class="badge bg-label-success">{{$lang->langue}}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="d-flex my-6">
                                            <a href="{{route('evenement.details',$event->id)}}" class="btn btn-primary ms-auto" role="button">{{ __('content.enregistrer') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                <!-- {{$Formations = \Illuminate\Support\Facades\DB::table('formations')->get()}} -->
                @if(!empty($Formations) && count($Formations) > 0)
                    @foreach($Formations as $Fr)
                        @if($Fr->date > \Carbon\Carbon::now())
                            <div style="margin-top: 2%" class="col-md-6 col-xxl-4">
                                <div class="card h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <!-- {{$detail_instructeur = \Illuminate\Support\Facades\DB::table('instructeurs')->where('id',$Fr->instructeur_id)->get()}} -->
                                                @if($detail_instructeur[0]->photo)
                                                    <img class="rounded-circle" src="data:image/jpg;base64,{{$detail_instructeur[0]->photo }}" alt="Card image cap" />

                                                @else
                                                    <img class="rounded-circle" src="https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png" alt="Card image cap" />

                                                @endif

                                            </div>
                                            <div class="d-flex w-100 flex-wrap justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-1">
                                                        {{\Illuminate\Support\Facades\DB::table('users')->where('instructeur_id',$detail_instructeur[0]->id)->value('nom') }}
                                                        {{\Illuminate\Support\Facades\DB::table('users')->where('instructeur_id',$detail_instructeur[0]->id)->value('prenom') }}
                                                    </h5>
                                                    <small>{{ \Carbon\Carbon::parse($Fr->date . ' ' . $Fr->heure)->format('d M Y \a\t h:i A') }}
                                                    </small>
                                                </div>
                                                {{--                                            <div class="dropdown">--}}
                                                {{--                                                <button class="btn text-muted p-0" type="button" id="oliviaShared" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                {{--                                                    <i class="bx bx-dots-vertical-rounded bx-lg"></i>--}}
                                                {{--                                                </button>--}}
                                                {{--                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="oliviaShared">--}}
                                                {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                                                {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                                                {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                                                {{--                                                </div>--}}
                                                {{--                                            </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <img src="data:image/jpg;base64,{{$Fr->photo_principale }}" alt="User" class="img-fluid">
                                    <div class="mt-n8">
                                    <span class="featured-date d-inline-block ms-6 rounded shadow-lg text-center py-1 px-4" style="margin-top: -30px;margin-left:15px;background-color: white">
                                      <span class="mb-0 h4">{{ \Carbon\Carbon::parse($Fr->date)->format('d') }}</span><br>
                                      <span class="text-primary">{{ \Carbon\Carbon::parse($Fr->date)->format('M') }}</span>
                                    </span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="mb-1">{{$Fr->titre }}</h5>
                                        <!-- {{$detail_langue = \Illuminate\Support\Facades\DB::table('langue_formations')->where('formation_id',$Fr->id)->get()}} -->
                                        <div class="d-flex gap-2">
                                            @if(count($detail_langue))
                                                @foreach($detail_langue as $lang)
                                                    <span class="badge bg-label-success">{{$lang->langue}}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="d-flex my-6">
                                            {{--                                        <ul class="list-unstyled m-0 d-flex align-items-center avatar-group">--}}
                                            {{--                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar pull-up">--}}
                                            {{--                                                <img class="rounded-circle" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png" alt="Avatar">--}}
                                            {{--                                            </li>--}}
                                            {{--                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Allen Rieske" class="avatar pull-up">--}}
                                            {{--                                                <img class="rounded-circle" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/12.png" alt="Avatar">--}}
                                            {{--                                            </li>--}}
                                            {{--                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Julee Rossignol" class="avatar pull-up">--}}
                                            {{--                                                <img class="rounded-circle" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png" alt="Avatar">--}}
                                            {{--                                            </li>--}}
                                            {{--                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Darcey Nooner" class="avatar pull-up">--}}
                                            {{--                                                <img class="rounded-circle" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/10.png" alt="Avatar">--}}
                                            {{--                                            </li>--}}
                                            {{--                                        </ul>--}}
                                            <a href="{{route('demande_formation.details',$Fr->id)}}" class="btn btn-primary ms-auto" role="button">{{ __('content.enregistrer') }}</a>
                                        </div>
                                        {{--                                    <div class="d-flex align-items-center justify-content-between">--}}
                                        {{--                                        <div class="card-actions">--}}
                                        {{--                                            <a href="javascript:;" class="text-body me-4"><i class="bx bx-heart bx-md me-1"></i> 236</a>--}}
                                        {{--                                            <a href="javascript:;" class="text-body"><i class="bx bx-chat bx-md me-1"></i> 12</a>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>
                            </div>
                        @endif


                    @endforeach

                @endif


            </div>
        </div>
    </section>
<section class="section-py">
    <div class="container">
        <h3 class="text-center mb-4">Nos Programmes</h3>
        
        <div class="row">
            @if($Programmes->count() > 0)
                @foreach($Programmes as $Prog)
                    <div class="col-md-6 col-xxl-4 mb-4">
                        <div class="card h-100 shadow-sm">
                         @if(!empty($Prog->photo))
    <img src="{{ asset('storage/' . $Prog->photo) }}" 
         alt="{{ $Prog->titre }}" 
         class="card-img-top" 
         style="height:220px; object-fit:cover;">
@else
    <div style="height:220px; background:linear-gradient(135deg,#6a0dad,#a855f7); 
                display:flex; align-items:center; justify-content:center;">
        <i class="fa fa-th-large fa-3x text-white opacity-75"></i>
    </div>
@endif
                            
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ $Prog->titre }}</h5>

                                <div class="d-flex gap-2 mb-3 flex-wrap">
                                    @if(!empty($Prog->niveau))
                                        <span class="badge bg-label-success">{{ $Prog->niveau }}</span>
                                    @endif
                                    @if(!empty($Prog->duree_semaines))
                                        <span class="badge bg-label-info">
                                            {{ $Prog->duree_semaines }} semaine{{ $Prog->duree_semaines > 1 ? 's' : '' }}
                                        </span>
                                    @endif
                                </div>

                                @if(!empty($Prog->description))
                                    <p class="text-muted small" style="display: -webkit-box; 
                                       -webkit-line-clamp: 3; -webkit-box-orient: vertical; 
                                       overflow: hidden; text-align: justify;">
                                        {{ $Prog->description }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center text-muted py-5">
                    <i class="fa fa-info-circle fa-2x mb-3"></i>
                    <p>Aucun programme disponible pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
</section>
    <section class="section-py" style="background-color: whitesmoke">
        <div class="container">
            <h3 class="text-center mb-4">

                <?php
                echo html_entity_decode(__('content.Offres de Services ZENGYMHEALTH'));
                ?>
            </h3>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="rounded-3 text-center mb-3 pt-4">
                                        <img class="img-fluid" src="https://static.thenounproject.com/png/428433-200.png" alt="Card girl image" style="width: 80px"/>
                                    </div>
                                    <h4 class="mb-2 pb-1" style="text-align: center">{{ __('content.Pour les Adhérents') }}</h4>
                                    <ul>
                                        <li>
                                            {{ __('content.Cours en ligne interactifs.') }}
                                        </li>
                                        <li>
                                            {{ __('content.Accès aux studios partenaires.') }}
                                        </li>
                                        <li>
                                            {{ __('content.Participation à des masterclasses.') }}
                                        </li>
                                    </ul>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">{{ __('content.Read More') }}</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="rounded-3 text-center mb-3 pt-4">
                                        <img class="img-fluid" src="https://cdn-icons-png.flaticon.com/256/998/998463.png" alt="Card girl image" style="width: 80px"/>
                                    </div>
                                    <h4 class="mb-2 pb-1" style="text-align: center">{{ __('content.Pour les Professionnels') }}</h4>
                                    <ul>
                                        <li>
                                            {{ __('content.Formation des Instructeurs :') }}
                                            <ul>
                                                <li>
                                                    {{ __('content.Certification et progression (Instructeur, Master Trainer, Formateur, Ambassadeur).') }}
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            {{ __('content.Franchises :') }}
                                            <ul>
                                                <li>
                                                    {{ __('content.Modèle économique rentable avec un accompagnement clé en main.') }}
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">{{ __('content.Read More') }}</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="rounded-3 text-center mb-3 pt-4">
                                        <img class="img-fluid" src="https://cdn-icons-png.flaticon.com/512/3009/3009710.png" alt="Card girl image" style="width: 80px"/>
                                    </div>
                                    <h4 class="mb-2 pb-1" style="text-align: center">{{ __('content.Pour les Entreprises et Hôtels') }}</h4>
                                    <ul>
                                        <li>
                                            {{ __('content.Programmes sur mesure pour intégrer le sport santé au quotidien des employés ou clients.') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('zengym_hotels.zengym_hotels')}}" class="btn btn-primary" style="width: 100%">{{ __('content.Read More') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Articles: Start -->

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



    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const words = ["La Référence en ", "L'excellence du ", "Votre expert en "];
            const wordElement = document.querySelector(".word");

            let index = 0;

            function updateWord() {
                wordElement.textContent = words[index];
                index = (index + 1) % words.length;
            }

            updateWord();
            setInterval(updateWord, 3000);
        });
    </script>
@endsection
