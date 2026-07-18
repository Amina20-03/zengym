<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'utilisateurs','menuactive' =>'instructeur'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.admin.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Users List Table -->
                    <div class="card" style="padding: 10px">
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
                        {{--                        <div class="card-header border-bottom">--}}
                        {{--                            <h5 class="card-title">Search Filter</h5>--}}
                        {{--                            <div--}}
                        {{--                                class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0"--}}
                        {{--                            >--}}
                        {{--                                <div class="col-md-4 user_role"></div>--}}
                        {{--                                <div class="col-md-4 user_plan"></div>--}}
                        {{--                                <div class="col-md-4 user_status"></div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}



                        <div style=" float: right;text-align: right">
                            <button
                                type="button"
                                class="btn btn-primary me-sm-3 me-1 data-submit"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                            >
                                {{ __('content.Ajouter_un_instructeur') }}
                            </button>
                        </div>

                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table" style=" white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="width: 50px"></th>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.nom') }}</th>
                                    <th style="text-align:center">{{ __('content.prenom') }}</th>
                                    <th style="text-align:center">{{ __('content.mail') }}</th>
                                    <th style="text-align:center">{{ __('content.adresse') }}</th>
                                    <th style="text-align:center">{{ __('content.tel') }}</th>
                                    <th style="text-align:center">{{ __('content.profession') }}</th>
                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                    <th style="text-align:center">{{ __('content.Diplomé?') }}</th>
                                    <th style="text-align:center">{{ __('content.cin') }}</th>
                                    <th style="text-align:center">{{ __('content.login') }}</th>

                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        @if($elem['role']=='INSTRUCTEUR')
                                        <tr>

                                            <td style="text-align:center">
                                                @if($elem['photo'])
                                                    <img src="data:image/jpg;base64,{{$elem['photo'] }}" alt="" style="width:30px;">
                                                @else
                                                    <img src="https://cdn-icons-png.flaticon.com/512/3410/3410150.png" alt="" style="width:30px;">
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['code_instr']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['nom']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['prenom']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['mail']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['adresse']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['tel']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['profession']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['categ_instructeur_desc']}}
                                            </td>
                                            <td style="text-align:center">
                                                @if($elem['diplome'])
                                                    <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                @else
                                                    <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['cin']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['email']}}
                                            </td>

                                            <td style="text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{route('admin.instructeur.edit',$elem['id'])}}" class="btn btn-label-success">Modifier</a>

                                                    @if($elem['diplome'])
                                                        <a href="{{route('admin.instructeur.update_diplome_status',$elem['id'])}}" class="btn btn-label-secondary">Non Diplomé</a>
                                                    @else
                                                        <a href="{{route('admin.instructeur.update_diplome_status',$elem['id'])}}" class="btn btn-label-secondary">Diplomé</a>
                                                    @endif

                                                    <a href="#" class="btn btn-label-danger" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">Supprimer</a>
                                                </div>

                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>



                </div>
                <form method="POST" action="{{route('admin.instructeur.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>

                <div
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasAddUser"
                    aria-labelledby="offcanvasAddUserLabel"
                >
                    <div class="offcanvas-header">
                        <h5
                            id="offcanvasAddUserLabel"
                            class="offcanvas-title"
                        >
                            {{ __('content.Ajouter_un_instructeur') }}

                        </h5>
                        <button
                            type="button"
                            class="btn-close text-reset"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div
                        class="offcanvas-body mx-0 flex-grow-0"
                    >

                        <form method="POST" enctype="multipart/form-data" id="addNewUserForm" action="{{ route('admin.instructeur.add') }}" class="row g-3">
                            @csrf
                            <div class="mb-3">
                                <label
                                        class="form-label"
                                        for="code_instr"
                                >{{ __('content.Code') }}</label
                                >
                                <!-- {{$randomCode = strtoupper(Str::random(8)).'-'.\Illuminate\Support\Facades\DB::table('instructeurs')->value('id')}} -->
                                <input
                                        type="text"
                                        class="form-control"
                                        id="code_instr"
                                        placeholder="{{ __('content.Code') }}"
                                        value="{{$randomCode}}"
                                        name="code_instr"
                                        aria-label="{{ __('content.Code') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="photo"
                                >{{ __('content.photo') }}</label
                                >
                                <input
                                    type="file"
                                    class="form-control"
                                    id="photo"
                                    placeholder="{{ __('content.photo') }}"
                                    name="photo"
                                    aria-label="{{ __('content.photo') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="nom"
                                >{{ __('content.nom') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nom"
                                    placeholder="{{ __('content.nom') }}"
                                    name="nom"
                                    aria-label="{{ __('content.nom') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="prenom"
                                >{{ __('content.prenom') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="prenom"
                                    placeholder="{{ __('content.prenom') }}"
                                    name="prenom"
                                    aria-label="{{ __('content.prenom') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="mail"
                                >{{ __('content.mail') }}</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="mail"
                                    placeholder="{{ __('content.mail') }}"
                                    name="mail"
                                    aria-label="{{ __('content.mail') }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="adresse"
                                >{{ __('content.adresse') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="adresse"
                                    placeholder="{{ __('content.adresse') }}"
                                    name="adresse"
                                    aria-label="{{ __('content.adresse') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="tel"
                                >{{ __('content.tel') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tel"
                                    placeholder="{{ __('content.tel') }}"
                                    name="tel"
                                    aria-label="{{ __('content.tel') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="date_naiss"
                                >{{ __('content.date_naiss') }}</label
                                >
                                <input
                                    type="date"
                                    class="form-control"
                                    id="date_naiss"
                                    value="{{ date('Y-m-d')}}"
                                    name="date_naiss"
                                    aria-label="{{ __('content.date_naiss') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="sexe"
                                >{{ __('content.sexe') }}</label
                                >
                                <div class="col-md">
                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="H" checked/>
                                        <label class="form-check-label" for="inlineRadio1">{{ __('content.homme') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="F" />
                                        <label class="form-check-label" for="inlineRadio2">{{ __('content.femme') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="profession"
                                >{{ __('content.profession') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="profession"
                                    placeholder="{{ __('content.profession') }}"
                                    name="profession"
                                    aria-label="{{ __('content.profession') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="cin"
                                >{{ __('content.cin') }}</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id="cin"
                                    placeholder="{{ __('content.cin') }}"
                                    name="cin"
                                    aria-label="{{ __('content.cin') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="pays_id">{{ __('content.pays') }}</label>
                                <select id="pays_id" name="pays_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.pays') }}</option>
                                    @for($i=0;$i<count($list_pays);$i++)
                                        <option value="{{$list_pays[$i]['id']}}">{{$list_pays[$i]['desc']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="categ_instructeur_id">{{ __('content.categorie_instructeur') }}</label>
                                <select id="categ_instructeur_id" name="categ_instructeur_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                    @for($i=0;$i<count($list_cat);$i++)
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="email"
                                >{{ __('content.login') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    placeholder="{{ __('content.login') }}"
                                    name="email"
                                    aria-label="{{ __('content.login') }}"

                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="password"
                                >{{ __('content.password') }}</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="*****"
                                    name="password"
                                    aria-label="{{ __('content.password') }}"

                                />
                            </div>
                            <input
                                type="hidden"
                                class="form-control"
                                id="verif_nature"
                                value="instructeur"
                                name="verif_nature"

                            />
                            <button
                                type="submit"
                                class="btn btn-primary me-sm-3 me-1 data-submit"
                                id="submitButton"
                            >
                                {{ __('content.Valider') }}
                            </button>
                            <button
                                type="reset"
                                class="btn btn-label-secondary"
                                data-bs-dismiss="offcanvas"
                            >
                                {{ __('content.Annuler') }}
                            </button>
                        </form>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <!-- Footer-->
                @include('layouts.footer')
                <!--/ Footer-->
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
