<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'Paramétrage','menuactive' =>'pourcentage'])

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
                                {{ __('content.Ajouter_un_pourcentage') }}
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
                                    <th style="text-align:center">{{ __('content.pr_client') }}</th>
                                    <th style="text-align:center">{{ __('content.pr_prod') }}</th>
                                    <th style="text-align:center">{{ __('content.pr_formation') }}</th>
                                    <th style="text-align:center">{{ __('content.categorie_instructeur') }}</th>

                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>

                                            <td style="text-align:center">
                                                <img src="https://cdn-icons-png.flaticon.com/512/10148/10148474.png" alt="" style="width:30px;">
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['pr_client']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['pr_prod']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['pr_formation']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['categ_instructeur_desc']}}
                                            </td>

                                            <td style="text-align:center">


                                                <a href="{{route('admin.pourcentage.edit',$elem['id'])}}" class="btn btn-sm btn-icon">
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






                        <!-- Offcanvas to add new user -->

                </div>
                <form method="POST" action="{{route('admin.pourcentage.delete')}}" class="add-new-user pt-0">
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
                            {{ __('content.Ajouter_un_pourcentage') }}

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

                        <form method="POST" id="addNewUserForm" action="{{ route('admin.pourcentage.add') }}" class="row g-3">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="cat_inst_id">{{ __('content.categorie_instructeur') }}</label>
                                <select id="cat_inst_id" name="cat_inst_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                    @for($i=0;$i<count($list_cat);$i++)
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="pr_client"
                                >{{ __('content.pr_client') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="pr_client"
                                    placeholder="{{ __('content.pr_client') }}"
                                    name="pr_client"
                                    aria-label="{{ __('content.pr_client') }}"
                                />
                            </div>

                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="pr_prod"
                                >{{ __('content.pr_prod') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="pr_prod"
                                    placeholder="{{ __('content.pr_prod') }}"
                                    name="pr_prod"
                                    aria-label="{{ __('content.pr_prod') }}"
                                />
                            </div>

                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="pr_formation"
                                >{{ __('content.pr_formation') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="pr_formation"
                                    placeholder="{{ __('content.pr_formation') }}"
                                    name="pr_formation"
                                    aria-label="{{ __('content.pr_formation') }}"
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
