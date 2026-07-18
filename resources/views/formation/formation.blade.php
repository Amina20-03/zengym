

@include('layouts.navbar_vitrine',['menuprincipaleactive' =>'formation_instructeur','menuactive' =>''])

<!-- Sections:Start -->

<section id="landingContact" class="section-py bg-body">
    <div class="container" style="margin-top: 100px">

        <h3 class="text-center mb-1">
            <span class="section-title">Trouver</span> des formations
        </h3>
        <p class="text-center mb-4 mb-lg-5 pb-md-3">Trouvez des formations selon vos besoins</p>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">

                    @for($i=0;$i<count($list_cat);$i++)
                        @if($list_cat[$i]['id'] == $detail_cat[0]['id']??'')
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('formations_by_categ',$list_cat[$i]['id'])}}">
                                    <i class='fa fa-minus me-1'></i> {{$list_cat[$i]['lib']}}
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('formations_by_categ',$list_cat[$i]['id'])}}">
                                    <i class='fa fa-plus me-1'></i> {{$list_cat[$i]['lib']}}
                                </a>
                            </li>
                        @endif


                    @endfor

                </ul>
            </div>
        </div>
        <hr>

        <div
            class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0"

        >
            <table
                class="datatables-users table border-bottom"
                id="inputs" style="white-space: nowrap;"
            >
                <tbody>
                <tr>
                    <td>
                        <label
                            class="form-label"
                            for="du_date"
                        >{{ __('content.du_date') }}</label
                        >

                    </td>
                    <td>
                        <input
                            type="date"
                            class="form-control"
                            id="minDate"
                            value="{{$du_date}}"
                            name="du_date"
                            aria-label="{{ __('content.du_date') }}"
                        />
                    </td>
                    <td>
                        <label
                            class="form-label"
                            for="heure_deb"
                        >Min.heure deb</label
                        >



                    </td>
                    <td>
                        <input
                            type="time"
                            class="form-control"
                            id="minTime"
                            value="{{$heure_deb}}"
                            name="heure_deb"
                            aria-label="{{ __('content.heure_deb') }}"
                        />
                    </td>
                    <td>
                        <label
                            class="form-label"
                            for="min_frais"
                        >Min. Frais</label
                        >
                    </td>
                    <td>
                        <input
                            type="text"
                            class="form-control"
                            id="min_frais"
                            value="0"
                            name="min_frais"
                        />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label
                            class="form-label"
                            for="au_date"
                        >{{ __('content.au_date') }}</label
                        >

                    </td>
                    <td>
                        <input
                            type="date"
                            class="form-control"
                            id="maxDate"
                            value="{{$au_date}}"
                            name="au_date"
                            aria-label="{{ __('content.au_date') }}"
                        />
                    </td>
                    <td>
                        <label
                            class="form-label"
                            for="heure_fin"
                        >Max.heure deb</label
                        >


                    </td>
                    <td>
                        <input
                            type="time"
                            class="form-control"
                            id="maxTime"
                            value="{{$heure_fin}}"
                            name="heure_fin"
                            aria-label="{{ __('content.heure_fin') }}"
                        />
                    </td>
                    <td>
                        <label
                            class="form-label"
                            for="max_frais"
                        >Max. Frais</label
                        >
                    </td>
                    <td>
                        <input
                            type="text"
                            class="form-control"
                            id="max_frais"
                            value="1000"
                            name="max_frais"
                        />
                    </td>
                </tr>
                </tbody>
            </table>

        </div>


        <!-- Employee List -->
        <div class="col-md-12 col-xl-12 mb-12">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">{{ __('content.formations') }} {{$detail_cat[0]['lib']??''}}</h5>
                    {{--                    <div class="dropdown">--}}
                    {{--                        <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--                            <i class="bx bx-dots-vertical-rounded"></i>--}}
                    {{--                        </button>--}}
                    {{--                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="employeeList">--}}
                    {{--                            <a class="dropdown-item" href="javascript:void(0);">Featured Employees</a>--}}
                    {{--                            <a class="dropdown-item" href="javascript:void(0);">Based on Task</a>--}}
                    {{--                            <a class="dropdown-item" href="javascript:void(0);">See All</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
                <div class="card-body">


                    <table
                        class="datatables-users table border-bottom"
                        id="example" style="white-space: nowrap;width: 100%"
                    >
                        <thead>
                        <tr>
                            <th hidden>Date</th>
                            <th hidden>heure</th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden>instructeur</th>
                            <th hidden>Frais</th>
                            <th hidden></th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($liste)>0)
                            @foreach($liste as $elem)

                                <tr>
                                    <td hidden>
                                        {{$elem['date']}}
                                    </td>
                                    <td hidden>
                                        {{$elem['heure']}}
                                    </td>
                                    <td style="width: 50px">
                                        <div>

                                            <!-- {{ $carbondate =  \Carbon\Carbon::parse($elem['date'])->timezone('Europe/Paris')}} -->
                                            <!-- {{setlocale(LC_TIME,'fr_FR.UTF-8')}} -->

                                            <h6 class="mb-0">
                                                {{--                                                {{strftime('%A %d %B %Y', $carbondate->timestamp) }}--}}
                                                {{$elem['date']}}
                                            </h6>

                                            <small class="text-muted">{{$elem['heure']}} </small>


                                        </div>
                                    </td>

                                    <td>
                                        <div style="border-right: 1px solid lightgray;">
                                            <h6 class="mb-0">{{$elem['sujet']}}</h6>
                                            <small class="text-muted">{{$elem['categ_formation_desc'] }}</small>
                                        </div>
                                    </td>
                                    <td style="width: 50px;">
                                        <div>


                                            <!-- {{$nbr_participant =intval($elem['nbr_participant']) }}-->
                                            <!-- {{$nbr_place_max =intval($elem['nbr_place_max']) }}-->

                                               <span class="card-title text-primary">Nombre de places libres :</span>
                                                {{$nbr_place_max - $nbr_participant}}



                                        </div>
                                    </td>
                                    <td style="width: 50px">
                                        <div>
                                            {{$elem['frais']}} DT
                                        </div>
                                    </td>

                                    <td style="width: 50px">
                                        <div>
                                            @if($elem['date'] > date('Y-m-d'))
                                                <a href="{{route('demande_formation.details',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                    <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                    &nbsp;
                                                    {{ __('content.enregistrer') }}
                                                </a>
                                            @elseif($elem['date'] == date('Y-m-d'))
                                                @if($elem['heure'] > date('H:i'))
                                                    <a href="{{route('demande_formation.details',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                        <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                        &nbsp;
                                                        {{ __('content.enregistrer') }}
                                                    </a>
                                                @endif
                                            @endif

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
        <!--/ Employee List -->













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



