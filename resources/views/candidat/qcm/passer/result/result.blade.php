<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.candidat.menu',['menuprincipaleactive' =>'qcm','menuactive' =>''])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.candidat.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="row">
                        <!-- Sales Stats -->
                        <div class="col-lg-12 col-md-6 col-sm-6 mb-6">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="card-title fw-normal m-0 me-2">{{$examen['titre']}}</h6>
                                    <div class="dropdown">
                                        <button class="btn btn-text text-muted p-0" type="button" id="totalSalesList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{session('nom')}}
                                            {{session('prenom')}}
{{--                                            <i class="bx bx-chevron-down"></i>--}}
                                        </button>
{{--                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalSalesList">--}}
{{--                                            <a class="dropdown-item" href="javascript:void(0);">Yesterday</a>--}}
{{--                                            <a class="dropdown-item" href="javascript:void(0);">Last Week</a>--}}
{{--                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="d-flex justify-content-center mb-3">
                                        <div class="avatar avatar-md flex-shrink-0">
                                            @if($res_examen == "Formation valide")
                                                <span class="avatar-initial avatar-shadow-success rounded-circle" style="background-color: #058305">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            @elseif($res_examen == "Formation non valide")
                                                <span class="avatar-initial avatar-shadow-warning rounded-circle" style="background-color: orangered">
                                                    <i class="fa fa-exclamation"></i>
                                                </span>
                                            @elseif($res_examen == "Formation échouée")
                                                <span class="avatar-initial avatar-shadow-danger rounded-circle" style="background-color: red">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                            @endif

                                        </div>
                                    </div>
                                    <h4 class="card-title mb-0">
                                        <!-- {{$percentage = ($score / $examen['note_max']) * 100}} -->
                                        {{$percentage}}%
                                    </h4>
                                    <p class="mb-2">
                                       <strong>Votre note : {{$score}}</strong> <span>/ {{$examen['note_max']}}</span>
                                    </p>
                                    @if($res_examen == "Formation valide")
                                        <span class="text-success">
                                            <i class="fa fa-certificate"></i>
                                            {{$commentaire}}
                                        </span>
                                        <br>
                                        <br>
                                        <a class="btn btn-primary" style="width: 100%" href="{{route('candidat.qcm.examen.cerif',$examen['id'])}}">
                                            Certificat
                                        </a>
                                    @elseif($res_examen == "Formation non valide")
                                        <span class="text-warning">
                                            <i class="fa fa-certificate"></i>
                                            {{$commentaire}}
                                        </span>
                                    @elseif($res_examen == "Formation échouée")
                                        <span class="text-danger">
                                            <i class="fa fa-certificate"></i>
                                            {{$commentaire}}
                                        </span>
                                    @endif


                                </div>
                            </div>
                        </div>
                        <!--/ Sales Stats -->
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
