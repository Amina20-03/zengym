<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'Paramétrage','menuactive' =>'passage_de_grade'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.admin.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper" style="margin-top: -110px">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="row">
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
                        <!-- User Sidebar -->
                        <div
                            class="col-xl-12 col-lg-5 col-md-5 order-1 order-md-0"
                        >
                            <!-- User Card -->

                            <div class="card mb-12">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div
                                            class="d-flex align-items-center flex-column"
                                        >
                                            <img
                                                class="img-fluid rounded my-4"
                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/People_icon_half.svg/1024px-People_icon_half.svg.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['code']}} -
                                                    {{$detail[0]['des']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.passage_grade') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="editUserForm" action="{{ route('admin.passage_de_grade.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf

                                            <div class="col-12 col-md-4">

                                                <label
                                                    class="form-label"
                                                    for="des"
                                                >{{ __('content.designation') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="des"
                                                    value="{{$detail[0]['des']}}"
                                                    name="des"
                                                    aria-label="{{ __('content.designation') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">

                                                <label
                                                    class="form-label"
                                                    for="nbr_event"
                                                >{{ __('content.nbr_event') }}</label
                                                >
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="nbr_event"
                                                    value="{{$detail[0]['nbr_event']}}"
                                                    name="nbr_event"
                                                    aria-label="{{ __('content.nbr_event') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-4">

                                                <label
                                                    class="form-label"
                                                    for="nbr_masterclass"
                                                >{{ __('content.nbr_masterclass') }}</label
                                                >
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="nbr_masterclass"
                                                    value="{{$detail[0]['nbr_masterclass']}}"
                                                    name="nbr_masterclass"
                                                    aria-label="{{ __('content.nbr_masterclass') }}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="categ_instructeur_id_1">{{ __('content.de_categ') }}</label>


                                                <select id="categ_instructeur_id_1" name="categ_instructeur_id_1" class="select2 form-select">

                                                    @if($detail[0]['categ_instructeur_id_1'] != 'null')
                                                        <option value="{{$detail[0]['categ_instructeur_id_1']}}">
                                                            {{$detail_categ_instructeur_id_1[0]['desc'] }}
                                                        </option>
                                                        <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        @if($list_cat[$i]['id'] !=$detail[0]['categ_instructeur_id_1'])
                                                            <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>
                                                        @endif


                                                    @endfor



                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="categ_instructeur_id_2">{{ __('content.au_categ') }}</label>


                                                <select id="categ_instructeur_id_2" name="categ_instructeur_id_2" class="select2 form-select">

                                                    @if($detail[0]['categ_instructeur_id_2'] != 'null')
                                                        <option value="{{$detail[0]['categ_instructeur_id_2']}}">
                                                            {{$detail_categ_instructeur_id_2[0]['desc'] }}
                                                        </option>
                                                        <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        @if($list_cat[$i]['id'] !=$detail[0]['categ_instructeur_id_2'])
                                                            <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>
                                                        @endif


                                                    @endfor



                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-center pt-3">

                                                <button type="submit" class="btn btn-primary" id="submitButton">{{ __('content.Modifier') }}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->

                        </div>
                        <!--/ User Sidebar -->

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
