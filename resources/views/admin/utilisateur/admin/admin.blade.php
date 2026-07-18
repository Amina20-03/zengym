<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'utilisateurs','menuactive' =>'Admin'])

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
                                    {{ __('content.Ajouter_un_admin') }}
                                </button>
                            </div>

                            <div class="card-datatable table-responsive">
                                <table
                                    class="datatables-users table border-top"
                                    id="table"
                                >
                                    <thead>
                                    <tr>
                                        <th style="width: 50px"></th>
                                        <th style="text-align:center">{{ __('content.nom') }}</th>
                                        <th style="text-align:center">{{ __('content.prenom') }}</th>
                                        <th style="text-align:center">{{ __('content.mail') }}</th>
                                        <th style="text-align:center">{{ __('content.adresse') }}</th>
                                        <th style="text-align:center">{{ __('content.tel') }}</th>

                                        <th style="text-align:center">{{ __('content.login') }}</th>

                                        <th style="text-align:center;width: 90px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($liste)>0)
                                        @foreach($liste as $elem)
                                            <tr>

                                                <td style="text-align:center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/3410/3410150.png" alt="" style="width:30px;">
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
                                                    {{$elem['email']}}
                                                </td>

                                                <td style="text-align:center">


                                                    <a href="{{route('admin.admin.edit',$elem['id'])}}" class="btn btn-sm btn-icon">
                                                        <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">
                                                    </a>

                                                    <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>



                    </div>





                </div>
                <form method="POST" action="{{route('admin.admin.delete')}}" class="add-new-user pt-0">
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
                            {{ __('content.Ajouter_un_admin') }}

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

                        <form method="POST" enctype="multipart/form-data" id="addNewUserForm" action="{{ route('admin.admin.add') }}" class="row g-3">
                            @csrf

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
