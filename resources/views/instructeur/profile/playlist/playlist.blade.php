<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'','menuactive' =>''])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.instructeur.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper">

                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">


                    <!-- Navbar pills -->
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('instructeur.profile')}}">
                                        <i class='fa fa-user me-1'></i> {{ __('content.Mon_Profile') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('instructeur.profile.photos')}}">
                                        <i class='fa fa-picture-o me-1'></i> {{ __('content.photos') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0);">
                                        <i class='fa fa-video-camera me-1'></i> {{ __('content.video') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('instructeur.profile.docs')}}">
                                        <i class='fa fa-files-o me-1'></i> {{ __('content.document') }}
                                    </a>
                                </li>
                                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='fa fa-files-o me-1'></i> Playlist</a></li>

                            </ul>
                        </div>
                    </div>
                    <!--/ Navbar pills -->

                    <!-- User Profile Content -->
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                                <div class="card-title mb-0 me-1">
                                    <h5 class="mb-1">ZenGym1</h5>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row gy-4 mb-4">
                                    @if($detail[0]['diplome'])
                                        @foreach($songs as $song)
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card p-2 h-100 shadow-none border">
                                                <div class="rounded-2 text-center mb-3 cursor-pointer">
                                                    <audio controls>
                                                        <source src="{{ $song }}" type="audio/mpeg">
                                                        Your browser does not support the audio element.
                                                    </audio>

                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                                <div class="card-title mb-0 me-1">
                                    <h5 class="mb-1">ZenGym2</h5>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row gy-4 mb-4">
                                    @if($detail[0]['diplome'])
                                        @foreach($songs2 as $song)
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="card p-2 h-100 shadow-none border">
                                                    <div class="rounded-2 text-center mb-3 cursor-pointer">
                                                        <audio controls>
                                                            <source src="{{ $song }}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>

                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{route('instructeur.profile.videos.delete')}}" class="add-new-user pt-0">
                        @csrf
                        @include('layouts.delete_modal')

                    </form>
                    <form method="POST" action="{{route('instructeur.profile.videos.search')}}" id="search_photo_form" class="add-new-user pt-0">
                        @csrf
                        @include('layouts.delete_modal')
                        <input type="hidden" name="id_categ_searching" id="id_categ_searching"/>

                    </form>
                    <!--/ User Profile Content -->



                </div>
                <!--/ Edit User Modal -->
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
