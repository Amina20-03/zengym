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
                                                src="https://cdn-icons-png.flaticon.com/512/10148/10148474.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['id']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.pourcentage') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="editUserForm" action="{{ route('admin.pourcentage.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf

                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="pr_client"
                                                >{{ __('content.pr_client') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="pr_client"
                                                    name="pr_client"
                                                    class="form-control"
                                                    value="{{$detail[0]['pr_client']}}"
                                                />
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="pr_prod"
                                                >{{ __('content.pr_prod') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="pr_prod"
                                                    name="pr_prod"
                                                    class="form-control"
                                                    value="{{$detail[0]['pr_prod']}}"
                                                />
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label
                                                    class="form-label"
                                                    for="pr_formation"
                                                >{{ __('content.pr_formation') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="pr_formation"
                                                    name="pr_formation"
                                                    class="form-control"
                                                    value="{{$detail[0]['pr_formation']}}"
                                                />
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="cat_inst_id">{{ __('content.categorie_instructeur') }}</label>


                                                <select id="cat_inst_id" name="cat_inst_id" class="select2 form-select">

                                                    @if($detail[0]['cat_inst_id'] != 'null')
                                                        <option value="{{$detail[0]['cat_inst_id']}}">
                                                            {{$desc_cat }}
                                                        </option>
                                                        <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @else
                                                        <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @endif
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        @if($list_cat[$i]['id'] !=$detail[0]['cat_inst_id'])
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
