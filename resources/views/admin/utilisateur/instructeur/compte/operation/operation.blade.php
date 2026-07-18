<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'comptes','menuactive' =>'liste_comptes'])

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
                        <div class="card-header border-bottom">
                            <h5 class="card-title" style="text-align: right">{{ __('content.liste_operation_du_compte') }} {{$detail_compte[0]['code']}}</h5>
                            <h5 class="card-title" style="text-align: right">{{ __('content.instructeur') }} : {{$instructeur}}</h5>
                            <h5 class="card-title">{{ __('content.Search_Filter') }}</h5>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.instructeur.compte.operation.search') }}" class="row g-3">
                                @csrf
                                <div
                                    class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0"
                                >

                                    <div class="col-md-3">
                                        <label
                                            class="form-label"
                                            for="du_date"
                                        >{{ __('content.du_date') }}</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            id="du_date"
                                            value="{{$du_date}}"
                                            name="du_date"
                                            aria-label="{{ __('content.du_date') }}"
                                        />

                                    </div>
                                    <div class="col-md-3">
                                        <label
                                            class="form-label"
                                            for="au_date"
                                        >{{ __('content.au_date') }}</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            id="au_date"
                                            value="{{$au_date}}"
                                            name="au_date"
                                            aria-label="{{ __('content.au_date') }}"
                                        />
                                    </div>
                                    <input
                                        type="hidden"
                                        class="form-control"
                                        id="id_compte"
                                        value="{{$detail_compte[0]['id']}}"
                                        name="id_compte"
                                    />
                                    <div class="col-md-3">
                                        <button
                                            type="submit"
                                            class="btn btn-danger me-sm-3 me-1"
                                            style="width: 100%;margin-top: 27px"
                                        >
                                            {{ __('content.sSearch') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>




                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table"
                                style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>

                                    <th style="text-align:center">{{ __('content.date') }}</th>
                                    <th style="text-align:center">{{ __('content.montant') }}</th>
                                    <th style="text-align:center">{{ __('content.type') }}</th>


                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>


                                            <td style="text-align:center">
                                                {{$elem['code']}}
                                            </td>


                                            <td style="text-align:center">
                                                {{$elem['date']}}
                                            </td>

                                            <td style="text-align:center">
                                                <!-- {{$mnt = floatval($elem['montant'])}} -->
                                                @if($mnt<0)
                                                    -{{$elem['montant']}}
                                                @else
                                                    {{$elem['montant']}}
                                                @endif

                                            </td>

                                            <td style="text-align:center">
                                                {{$elem['type']}}

                                            </td>



                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>


                            <div
                                class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0"
                            >

                                <div class="col-md-8">


                                </div>
                                <div class="col-md-2">
                                    <label
                                        class="form-label"
                                        for="du_date"
                                    >{{ __('content.soldecpte') }}</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="global_sum"
                                        value="{{$detail_compte[0]['soldecpte']}}"
                                        name="global_sum"
                                        readonly
                                    />

                                </div>

                                <div class="col-md-2">
                                    <a href="#"
                                       class="btn me-sm-3 me-1"
                                       data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                                       style="background-color: lightgray; width:100%;padding:15px;margin-top:20px;box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.1),0px 10px 15px -3px rgba(0,0,0,0.1)">

                                        <img src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png" alt="" style="width:30px;">
                                        &nbsp;
                                        {{ __('content.ajouter_operation') }}
                                    </a>
                                </div>
                            </div>



                    </div>





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
                                {{ __('content.ajouter_operation') }}

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

                            <form method="POST" enctype="multipart/form-data" id="addNewUserForm" action="{{ route('admin.instructeur.compte.operation.add') }}" class="row g-3">
                                @csrf


                                <div class="mb-3">
                                    <label
                                        class="form-label"
                                        for="type"
                                    >{{ __('content.type') }}</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="type"
                                        value="Débit"
                                        name="type"
                                        aria-label="{{ __('content.type') }}"
                                        readonly

                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        class="form-label"
                                        for="soldecpte"
                                    >{{ __('content.soldecpte') }}</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="soldecpte"
                                        value="{{$detail_compte[0]['soldecpte']}}"
                                        name="soldecpte"
                                        readonly
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        class="form-label"
                                        for="montant"
                                    >{{ __('content.montant') }}</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="montant"
                                        value="00.00"
                                        name="montant"
                                        aria-label="{{ __('content.montant') }}"

                                    />
                                </div>

                                <input
                                    type="hidden"
                                    class="form-control"
                                    id="compte_id"
                                    value="{{$detail_compte[0]['id']}}"
                                    name="compte_id"
                                    readonly
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
                    <!-- Offcanvas to add new user -->

                </div>
                <form method="POST" action="{{route('admin.candidat.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>


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
