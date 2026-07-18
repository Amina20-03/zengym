<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'formations','menuactive' =>'add_formation'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.instructeur.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper" style="margin-top: -100px">
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

                        <!-- Navbar pills -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="nav-align-top">
                                    <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                                        <li class="nav-item"><a class="nav-link" href="javascript:void(0);"><i class='bx bx-user bx-sm me-1_5'></i> {{ __('content.Détails') }}</a></li>
                                        @if($categ_formation_id == '1')
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0);">
                                                    <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="javascript:void(0);">
                                                    <i class='bx bx-group bx-sm me-1_5'></i> Programme de formation
                                                </a>
                                            </li>
                                        @endif
                                        @if($categ_formation_id == '2')
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0);">
                                                    <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="javascript:void(0);">
                                                    <i class='bx bx-group bx-sm me-1_5'></i> Programme de formation
                                                </a>
                                            </li>
                                        @endif
                                        @if($categ_formation_id == '3')
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0);">
                                                    <i class='bx bx-group bx-sm me-1_5'></i> Livret scientifique
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:void(0);">
                                                    <i class='bx bx-group bx-sm me-1_5'></i> Présentation PowerPoint
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="javascript:void(0);">
                                                    <i class='bx bx-group bx-sm me-1_5'></i> Vidéo BasicOne
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Navbar pills -->
                        <form method="post" id="addNewUserForm" action="{{route('instructeur.formation.add')}}" enctype="multipart/form-data"  class="row g-3">

                            @csrf
                            <!-- User Profile Content -->
                            <div class="row">
                                <div class="col-xl-12 col-lg-5 col-md-5">
                                    <!-- About User -->
                                    <div class="card mb-6">
                                        <div class="card-body">
                                            <div hidden class="row">
                                                <input type="text" name="path_presentation_power_point" id="path_presentation_power_point" value="{{$path_presentation_power_point}}"/>
                                                <input type="text" name="path_livret_scientifique" id="path_livret_scientifique" value="{{$path_livret_scientifique}}"/>
                                                <input type="text" name="photo_principale_old" id="photo_principale_old" value="{{$photo_principale_old}}"/>
                                                <input type="text" name="categ_formation_id" id="categ_formation_id" value="{{$categ_formation_id}}"/>
                                                <input type="text" name="titre" id="titre" value="{{$titre}}"/>
                                                <input type="text" name="sujet" id="sujet" value="{{$sujet}}"/>
                                                <input type="text" name="desc" id="desc" value="{{$desc}}"/>
                                                <div class="col-12 col-md-6">
                                                    <label for="select2Primary" class="form-label">{{ __('content.langue') }}</label>
                                                    <div class="select2-primary">
                                                        <select id="select2Primary" name="langue[]" class="select2 form-select" multiple>
                                                            @if(!empty($langue))
                                                                @foreach($langue as $lang)
                                                                    <option value="{{$lang}}" selected>{{$lang}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                </div>
                                                <input type="text" name="lieu" id="lieu" value="{{$lieu}}"/>
                                                <input type="text" name="date" id="date" value="{{$date}}"/>
                                                <input type="text" name="heure" id="heure" value="{{$heure}}"/>
                                                <input type="text" name="frais" id="frais" value="{{$frais}}"/>
                                                <input type="text" name="devise" id="devise" value="{{$devise}}"/>
                                                <input type="text" name="nbr_place_max" id="nbr_place_max" value="{{$nbr_place_max}}"/>
                                                <input type="text" name="contact" id="contact" value="{{$contact}}"/>
                                                <input type="text" name="enligne" id="enligne" value="{{$enligne}}"/>

                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <video class="w-100" poster="" playsinline controls>
                                                        <source src="{{ $detail[0]['path_video_basicone']}}" type="video/mp4">
                                                    </video>
                                                </div>
                                                <div class="col-12 col-md-12" style="padding-top: 35px">
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <th>
                                                                <a href="javascript:history.back();" style="background: #03cf68;color: white" type="button" class="btn btn-irv btn-irv-default">
                                                                    {{ __('content.sPrevious') }}
                                                                </a>
                                                            </th>
                                                            <th style="text-align: right">
                                                                <button type="submit" class="btn btn-irv" style=" background: #9d32b6;color: white">
                                                                    {{ __('content.Valider') }}
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--/ About User -->

                                </div>
                            </div>
                            <!--/ User Profile Content -->
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
