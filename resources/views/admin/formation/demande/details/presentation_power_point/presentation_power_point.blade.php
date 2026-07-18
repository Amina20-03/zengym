<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'formations','menuactive' =>'dmd_formation'])

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
                        <div class="col-md-12">
                            <div class="nav-align-top">
                                <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details',$detail[0]['id'])}}">
                                            <i class='bx bx-user bx-sm me-1_5'></i> {{ __('content.Détails') }}
                                        </a>
                                    </li>
                                    @if($detail_cat[0]['id'] == '1')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.livret_scientifique',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.prog_de_formation',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Programme de formation
                                        </a>
                                    </li>
                                    @endif
                                    @if($detail_cat[0]['id'] == '2')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.livret_scientifique',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.prog_de_formation',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Programme de formation
                                        </a>
                                    </li>
                                    @endif
                                    @if($detail_cat[0]['id'] == '3')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.livret_scientifique',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Présentation PowerPoint
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.demande_formation.details.video_basic_one',$detail[0]['id'])}}">
                                            <i class='bx bx-group bx-sm me-1_5'></i> Vidéo BasicOne
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
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

                        <div class="card-body row g-3">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                                    <div class="me-1">
                                        <h5 class="mb-1">{{$detail[0]['titre']}}</h5>
                                        <p class="mb-1">{{$detail[0]['sujet']}}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-label-danger">{{$detail_cat[0]['lib']}}</span>

                                    </div>
                                </div>
                                <div class="card academy-content shadow-none border">

                                    <div class="card-body">
{{--                                        <iframe src="https://docs.google.com/gview?url={{ env('APP_URL').'project/storage/app/public/'.$detail[0]['path_presentation_power_point']}}&embedded=true" width="100%" height="600px"></iframe>--}}
                                        <iframe src="https://docs.google.com/gview?url={{ env('APP_URL').'project/storage/app/public/formations/presentation_power_point/Basique.pptx'}}&embedded=true" width="100%" height="600px"></iframe>

                                    </div>
                                </div>
                                <!--                                {{ $detail[0]['path_livret_scientifique'] }}-->

                            </div>
                        </div>




                    </div>






                    <!-- Offcanvas to add new user -->

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
