<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'gest_evenements','menuactive' =>'type_even'])

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
                                                src="https://cdn-icons-png.flaticon.com/512/9783/9783268.png"
                                                height="110"
                                                width="110"
                                                alt="User avatar"
                                            />
                                            <div
                                                class="user-info text-center"
                                            >
                                                <h4 class="mb-2">
                                                    {{$detail[0]['code']}} -
                                                    {{$detail[0]['desc']}}
                                                </h4>
                                                <span
                                                    class="badge bg-label-secondary"
                                                >{{ __('content.type_evenement') }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="pb-2 border-bottom mb-4">
                                        {{ __('content.Détails') }}
                                    </h5>
                                    <div class="info-container">
                                        <form method="POST" id="editUserForm" action="{{ route('admin.evenement.type.update',$detail[0]['id']) }}" class="row g-3">
                                            @csrf

                                            <div class="col-12 col-md-12">
                                                <label
                                                    class="form-label"
                                                    for="desc"
                                                >{{ __('content.type_evenement') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    id="desc"
                                                    name="desc"
                                                    class="form-control"
                                                    value="{{$detail[0]['desc']}}"
                                                />
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label
                                                        class="form-label"
                                                        for="desc"
                                                >{{ __('content.Evénement national') }} ?</label
                                                >
                                                @if($detail[0]['evenement_national'])
                                                <label class="switch switch-primary">
                                                    <input type="checkbox" class="switch-input" name="evenement_national" checked/>
                                                    <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                  <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                  <i class="bx bx-x"></i>
                                                                </span>
                                                              </span>
                                                    <span class="switch-label">{{ __('content.Evénement national') }} ?</span>
                                                </label>
                                                @else
                                                <label class="switch switch-primary">
                                                    <input type="checkbox" class="switch-input" name="evenement_national" />
                                                    <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                  <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                  <i class="bx bx-x"></i>
                                                                </span>
                                                              </span>
                                                    <span class="switch-label">{{ __('content.Evénement national') }} ?</span>
                                                </label>
                                                @endif

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
