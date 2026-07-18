@extends('layouts.app_vitrine')

@section('content')

    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'cours_locaux','menuactive' =>''])

    <section class="section-py first-section-pt" style="margin-top: -30px">
        <div class="container">
            <div class="row mb-12 g-12">
                <div class="col-md-12 col-xl-12">
                    <div class="card bg-dark border-0 text-white">
                        <img class="card-img" src="{{\Illuminate\Support\Facades\URL::asset('images/devenir_franchise_affiche_zengym.png')}}" style="height: 300px"/>
                        <div class="card-img-overlay" style="margin-top: 100px">
                            <h5 class="card-title" style="font-size: 30px;color: black">
                                <strong>
                                    <?php
                                    echo html_entity_decode(__('content.Find_a_Class'));
                                    ?>
                                </strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -280px">
        <div class="container">

            <div class="row mb-12 g-12">
                <div class="col-md-3 mb-md-0 mb-12">
                </div>
                <div class="col-md-6 mb-md-0 mb-12">
                    <!-- single card  -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-widget-separator-wrapper">
                                <div class="card-body card-widget-separator">
                                    <div class="row gy-4 gy-sm-1">
                                        <div class="col-sm-6 col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center card-widget-1 pb-4 pb-sm-0">
                                                <div style="text-align: center">
                                                    <h4 class="mb-0">
                                                        COURS
                                                    </h4>
                                                    <p class="mb-0">
                                                        Des cours de danse sportive amusants et dynamiques qui vous redonnent une santé de fer.
                                                    </p>
                                                    <div class="input-group" style="text-align: center;margin-top: 10px">
                                                        <input type="text" class="form-control" placeholder="Ville, État ou ZIP"
                                                               aria-label="Recipient's username" aria-describedby="button-addon2" />
                                                        <button class="btn btn-outline-primary" type="button" id="button-addon2">
                                                            <?php
                                                            echo html_entity_decode(__('content.sSearch'));
                                                            ?>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /single card  -->
                </div>
                <div class="col-md-3 mb-md-0 mb-12">
                </div>
            </div>
        </div>
    </section>

    <section class="section-py first-section-pt" style="margin-top: -150px">
        <div class="container">
            <div class="row">
                <!-- Top Products by -->
                <div class="col-12 col-xxl-12 mb-12">
                    <div class="card h-100">
                        <div class="row row-bordered g-0 h-100">
                            <div class="col-md-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="card-title m-0 me-2">
                                        <span class="text-primary">
                                             <?php
                                             echo html_entity_decode(__('content.Liste_categorie'));
                                             ?>
                                        </span>
                                    </h5>
                                </div>
                                <div class="card-body pt-6">
                                    <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                                        @for($i=0;$i<count($list_cat);$i++)
                                            @if($list_cat[$i]['en_ligne'])
                                                @if($list_cat[$i]['id'] == $detail_cat[0]['id'])

                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="{{route('cours_page_by_categ',$list_cat[$i]['id'])}}">
                                                            <i class='fa fa-minus me-1'></i> {{$list_cat[$i]['titre']}}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('cours_page_by_categ',$list_cat[$i]['id'])}}">
                                                            <i class='fa fa-plus me-1'></i> {{$list_cat[$i]['titre']}}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endif



                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">

                                <div class="card-body pt-6">
                                    <?php
                                    echo html_entity_decode($detail_cat[0]['desc']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top Products by -->
            </div>
        </div>
    </section>

    <section class="section-py first-section-pt" style="margin-top: -150px">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xxl-12 mb-12">
                    <style>
                        .card-customize {
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            border: 1px solid #ddd;
                            background-color: white;
                            border-radius: 8px;
                            margin-bottom: 20px;
                            padding: 30px;
                            max-width: 100%;
                        }
                        .card-left-customize {
                            display: flex;
                        }
                        .date-time-customize {
                            text-align: center;
                            margin-right: 20px;
                            color: #555;
                        }
                        .date-time-customize strong {
                            display: block;
                            font-size: 1rem;
                        }
                        .date-time-customize span {
                            display: block;
                            font-size: 0.9rem;
                            margin-top: 4px;
                        }
                        .info-customize {
                            display: flex;
                            flex-direction: column;
                        }
                        .info-customize h4 {
                            margin: 0;
                            color: #9352ad;
                            font-size: 1rem;
                        }
                        .info-customize small {
                            color: #888;
                            margin: 4px 0;
                        }
                        .info-customize .location {
                            font-size: 0.9rem;
                            color: #444;
                        }
                        .profile-customize {
                            width: 50px;
                            height: 50px;
                            border-radius: 50%;
                            margin-right: 10px;
                            object-fit: cover;
                        }
                        .card-right-customize {
                            text-align: right;
                        }
                        .price-customize {
                            font-weight: bold;
                            margin-bottom: 10px;
                        }
                        .btn-customize {
                            padding: 8px 16px;
                            border: none;
                            border-radius: 4px;
                            color: white;
                            background-color: #9352ad;
                            cursor: pointer;
                        }
                        .btn-customize:hover {
                            background-color: #603671;
                        }
                    </style>
                    @if(count($liste)>0)
                        @foreach($liste as $elem)
                            <div class="card-customize">
                                <div class="card-left-customize">
                                    <div class="date-time-customize">
                                        <strong>{{ \Carbon\Carbon::parse($elem['date'])->translatedFormat('l d F') }}</strong>
                                        <span>
                                            {{$elem['hdeb']}}
                                            <!-- {{$from_time = strtotime($elem['hdeb'])}} -->
                                            <!-- {{$to_time = strtotime($elem['hfin'])}} -->
                                            <!-- {{ $carbondate =  \Carbon\Carbon::parse($elem['date'])->timezone('Europe/Paris')}} -->
                                            <!-- {{setlocale(LC_TIME,'fr_FR.UTF-8')}} -->
                                            ({{round(abs($from_time - $to_time) / 60,2)}} minutes)
                                        </span>
                                    </div>
                                    @php
                                        $photo = !empty($elem['instructeur']) && !empty($elem['instructeur'][0]['photo'])
                                            ? "data:image/jpg;base64,{$elem['instructeur'][0]['photo']}"
                                            : "https://static.vecteezy.com/system/resources/thumbnails/035/711/962/small_2x/3d-simple-user-icon-png.png";
                                    @endphp
                                    <img src="{{ $photo }}" alt="Coach" class="profile-customize">
                                    <div class="info-customize">
                                        <small>{{ $elem['instructeur_categ'] ?? '' }}</small>
                                        <h4>With {{ $elem['instructeur_user'][0]['nom'] ?? '' }} {{ $elem['instructeur_user'][0]['prenom'] ?? '' }}</h4>
                                        {{--                                        <small>{{ $elem['instructeur_user'][0]['nom'] ?? '' }} {{ $elem['instructeur_user'][0]['prenom'] ?? '' }}</small>--}}
                                        <div class="location-customize">{{$elem['emplacement']}}</div>
                                    </div>
                                </div>
                                <div class="card-right-customize">
                                    <div class="price-customize">{{$elem['frais']}} TND</div>
                                    @if($elem['date'] > date('Y-m-d'))
                                        <a href="{{route('login')}}"  class="btn-customize">
                                            {{ __('content.reserver') }}
                                        </a>
                                    @elseif($elem['date'] == date('Y-m-d'))
                                        @if($elem['hdeb'] > date('H:i'))
                                            <a href="{{route('login')}}"  class="btn-customize">
                                                {{ __('content.reserver') }}
                                            </a>
                                        @endif
                                    @else
                                        <a href="#"  class="btn-customize">
                                            {{ __('content.Détails') }}
                                        </a>
                                    @endif
                                    {{--                                    <button class="btn-customize">S'INSCRIRE</button>--}}
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
