<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'vente_abonnement','menuactive' =>'type_abo'])

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
                                {{ __('content.Ajouter_un_type') }}
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
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.type_abo') }}</th>

                                    <th style="text-align:center">{{ __('content.nb_mois') }}</th>
                                    <th style="text-align:center">{{ __('content.pu_ttc') }}</th>
                                    <th style="text-align:center">{{ __('content.taux_tva') }}</th>
                                    <th style="text-align:center">{{ __('content.pu_ht') }}</th>
                                    <th style="text-align:center">{{ __('content.categ_abo') }}</th>
                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>

                                            <td style="text-align:center">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/People_icon_half.svg/1024px-People_icon_half.svg.png" alt="" style="width:30px;">
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['code']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['desc']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['nb_mois']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['prix_ttc']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['taux_tva']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['prix_ht']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['categ_abo_desc']}}
                                            </td>

                                            <td style="text-align:center">


                                                <a href="{{route('admin.type_abo.edit',$elem['id'])}}" class="btn btn-sm btn-icon">
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
                <form method="POST" action="{{route('admin.type_abo.delete')}}" class="add-new-user pt-0">
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
                            {{ __('content.Ajouter_un_type') }}

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

                        <form method="POST" id="addNewUserForm" action="{{ route('admin.type_abo.add') }}" class="row g-3">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="categ_abo_id">{{ __('content.categ_abo') }}</label>
                                <select id="categ_abo_id" name="categ_abo_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.categ_abo') }}</option>
                                    @for($i=0;$i<count($list_cat);$i++)
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="desc"
                                >{{ __('content.type_abo') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="desc"
                                    placeholder="{{ __('content.type_abo') }}"
                                    name="desc"
                                    aria-label="{{ __('content.type_abo') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="nb_mois"
                                >{{ __('content.nb_mois') }}</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id="nb_mois"
                                    placeholder="{{ __('content.nb_mois') }}"
                                    name="nb_mois"
                                    aria-label="{{ __('content.nb_mois') }}"
                                />
                            </div>

                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="taux_tva"
                                >{{ __('content.taux_tva') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="taux_tva"
                                    placeholder="{{ __('content.taux_tva') }}"
                                    name="taux_tva"
                                    aria-label="{{ __('content.taux_tva') }}"
                                    onkeyup="calcul_total_ttc()"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="prix_ht"
                                >{{ __('content.pu_ht') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="prix_ht"
                                    value="0"
                                    name="prix_ht"
                                    aria-label="{{ __('content.pu_ht') }}"
                                    onkeyup="calcul_total_ttc()"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="prix_ttc"
                                >{{ __('content.pu_ttc') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="prix_ttc"
                                    value="0"
                                    name="prix_ttc"
                                    aria-label="{{ __('content.pu_ttc') }}"
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
