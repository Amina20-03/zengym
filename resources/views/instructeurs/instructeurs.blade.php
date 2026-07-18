

@include('layouts.navbar_vitrine',['menuprincipaleactive' =>'cours_locaux','menuactive' =>''])

<!-- Sections:Start -->

<section id="landingContact" class="section-py bg-body">
    <div class="container" style="margin-top: 100px">

        <h3 class="text-center mb-1">
            <span class="section-title">Trouver</span> des instructeurs
        </h3>
        <p class="text-center mb-4 mb-lg-5 pb-md-3">Trouvez des instructeurs selon vos besoins</p>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">

                    @for($i=0;$i<count($list_cat);$i++)
                        @if($list_cat[$i]['id'] == $detail_cat[0]['id'])
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('instructeur_by_categ',$list_cat[$i]['id'])}}">
                                    <i class='fa fa-minus me-1'></i> {{$list_cat[$i]['desc']}}
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('instructeur_by_categ',$list_cat[$i]['id'])}}">
                                    <i class='fa fa-plus me-1'></i> {{$list_cat[$i]['desc']}}
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
            style="text-align: center"

        >
            <table
                class="datatables-users table border-bottom"
                id="inputs" style="white-space: nowrap;"
            >
                <tbody>
                <tr>


                    <td style="width: 50px;">
                        <label
                            class="form-label"
                            for="min_frais"
                        >{{ __('content.pays') }}</label
                        >
                    </td>
                    <td>
                        <select id="select2Primary" name="pays_id" class="select2 form-select" required>
                            <option value="null">{{ __('content.pays') }}</option>
                            @for($i=0;$i<count($list_pays);$i++)
                                <option value="{{$list_pays[$i]['id']}}">{{$list_pays[$i]['desc']}}</option>

                            @endfor
                        </select>
                    </td>
                </tr>

                </tbody>
            </table>

        </div>


        <!-- Employee List -->
        <div class="col-md-12 col-xl-12 mb-12">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">{{ __('content.instructeur') }} {{$detail_cat[0]['desc']}}</h5>
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

                            <th hidden>pays</th>
                            <th hidden></th>
                            <th hidden>instructeur</th>

                            <th hidden></th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($liste)>0)
                            @foreach($liste as $elem)
                                <tr>
                                    <td hidden>
                                        {{$elem['pays_id'] }}
                                    </td>

                                    <td style="width: 50px">
                                        <div class="avatar flex-shrink-0 me-3" style=" border-left: 1px solid lightgray;">
                                            @php
                                                $photo = !empty($elem['instructeur']) && !empty($elem['instructeur'][0]['photo'])
                                                    ? "data:image/jpg;base64,{$elem['instructeur'][0]['photo']}"
                                                    : "https://www.shareicon.net/download/2015/05/15/38970_man_400x400.png";
                                            @endphp
                                            <img src="{{ $photo }}" alt="" class="rounded" style="margin-left: 20px">

                                        </div>
                                    </td>
                                    <td>
                                        <div style="border-right: 1px solid lightgray;">
                                            <small class="text-muted">{{$elem['categ_instructeur_desc'] }}</small>
                                            <h6 class="mb-0">{{$elem['nom']}} {{$elem['prenom']}}</h6>
                                            <small class="text-muted">{{$elem['pays_desc'] }}</small>
                                        </div>
                                    </td>

                                    <td style="width: 50px">
                                        <div>
                                            <a href="{{route('instructeur_by_categ.profile',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                &nbsp;
                                                {{ __('content.Voir_Profile') }}
                                            </a>
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



