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
                                    <a class="nav-link active" href="javascript:void(0);">
                                        <i class='fa fa-video-camera me-1'></i> {{ __('content.video') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('instructeur.profile.docs')}}">
                                        <i class='fa fa-files-o me-1'></i> {{ __('content.document') }}
                                    </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('instructeur.profile.playlist')}}"><i class='fa fa-files-o me-1'></i> Playlist</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ Navbar pills -->

                    <!-- User Profile Content -->
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                                <div class="card-title mb-0 me-1">
                                    <h5 class="mb-1">{{ __('content.mes_videos') }}</h5>

                                </div>
                                <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                                    @if(count($detail_cat)==0)
                                        <select id="select2_course_select" class="select2 form-select" name="categ_id" data-placeholder="{{ __('content.tous_cat') }}" onchange="search_photo_by_categ()">
                                            <option value="">{{ __('content.tous_cat') }}</option>
                                            @for($i=0;$i<count($list_cat);$i++)
                                                <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                            @endfor
                                        </select>
                                    @else
                                        <select id="select2_course_select" name="categ_id" class="select2 form-select" data-placeholder="{{ __('content.tous_cat') }}" onchange="search_photo_by_categ()">

                                            @if($detail_cat[0]['id'] != 'null')
                                                <option value="{{$detail_cat[0]['id']}}">
                                                    {{$detail_cat[0]['desc']}}
                                                </option>
                                                <option value="">{{ __('content.tous_cat') }}</option>
                                            @else
                                                <option value="">{{ __('content.tous_cat') }}</option>
                                            @endif
                                            @for($i=0;$i<count($list_cat);$i++)
                                                @if($list_cat[$i]['id'] !=$detail_cat[0]['id'])
                                                    <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>
                                                @endif


                                            @endfor



                                        </select>
                                    @endif




                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row gy-4 mb-4">
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card p-2 h-100 shadow-none border">
                                            <a href="#"  class="me-sm-3 me-1 data-submit"
                                               data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                                                <img class="img-fluid" src="https://cdn-icons-png.freepik.com/512/7245/7245733.png" style="padding: 30px"/>

                                            </a>
                                        </div>
                                    </div>
                                    @if($detail[0]['diplome'])
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card p-2 h-100 shadow-none border">
                                                <div class="rounded-2 text-center mb-3 cursor-pointer">

                                                    <video class="w-100" poster="" playsinline controls controlsList="nodownload" oncontextmenu="return false;">
                                                        <source src="{{ env('APP_URL').'project/storage/app/public/formations/videobasicone/zen gym basic 1 copyright.mp4'}}" type="video/mp4">
                                                    </video>


                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                    @if(count($liste_videos)>0)
                                        @foreach($liste_videos as $elem)
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="card p-2 h-100 shadow-none border">
                                                    <div class="rounded-2 text-center mb-3 cursor-pointer">

                                                        @if($elem['path'])
                                                            <video class="w-100" poster="" playsinline controls>
                                                                <source src="{{ env('APP_URL').'project/storage/app/public/'.$elem['path'] }}" type="video/mp4">
                                                            </video>

                                                        @else
                                                            <img class="img-fluid" src="https://cdn.icon-icons.com/icons2/2979/PNG/512/video_play_film_media_icon_186990.png" alt="tutor image 1" />
                                                        @endif

                                                    </div>
                                                    <div class="card-body p-3 pt-2">
                                                        <div class="d-flex justify-content-between align-items-center mb-3" style="float: right">
                                                            <span class="badge bg-label-primary">{{$elem['categ_desc'] }}</span>

                                                        </div>
                                                        <a href="#" class="h5">{{$elem['titre'] }}</a>
                                                        <p class="mt-2">{{$elem['desc'] }}<br><br></p>

                                                        <div class="d-flex flex-column flex-md-row gap-2 text-nowrap pe-xl-3 pe-xxl-0">

                                                            <a href="#" class="app-academy-md-50 btn btn-label-danger me-md-2 d-flex align-items-center"
                                                               style="width: 90%;position: absolute;bottom: 0;margin-bottom: 10px"
                                                               onclick="call_delete_modal({{$elem['id']}})"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#onboardImageModal">
                                                                <i class="fa fa-trash align-middle me-2 "></i>
                                                                <span>{{ __('content.Supprimer') }}</span>
                                                            </a>


                                                        </div>
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
                                {{ __('content.ajouter_video') }}

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

                            <form method="POST" enctype="multipart/form-data" id="addNewUserForm" action="{{ route('instructeur.profile.videos.add') }}" class="row g-3">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="categ_id">{{ __('content.categorie') }}</label>
                                    <select id="categ_id" name="categ_id" class="select2 form-select" required>
                                        <option value="null">{{ __('content.categorie') }}</option>
                                        @for($i=0;$i<count($list_cat);$i++)
                                            <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                        @endfor
                                    </select>
                                    <a href="#" data-bs-target="#add_categ" data-bs-toggle="modal">
                                        <span>{{ __('content.Ajouter_un_categorie') }}</span>
                                    </a>

                                </div>
                                <div class="mb-3">
                                    <label
                                        class="form-label"
                                        for="video"
                                    >{{ __('content.video') }}</label
                                    >
                                    <input type="file" class="form-control" name="video[]" id="video" accept="video/*" multiple>

                                </div>
{{--                                <div class="mb-3">--}}
{{--                                    <label--}}
{{--                                        class="form-label"--}}
{{--                                        for="libelle"--}}
{{--                                    >{{ __('content.libelle') }}</label--}}
{{--                                    >--}}
{{--                                    <input--}}
{{--                                        type="text"--}}
{{--                                        class="form-control"--}}
{{--                                        id="libelle"--}}
{{--                                        placeholder="{{ __('content.libelle') }}"--}}
{{--                                        name="libelle"--}}
{{--                                        aria-label="{{ __('content.libelle') }}"--}}

{{--                                    />--}}
{{--                                </div>--}}
                                <div class="mb-3">
                                    <label
                                        class="form-label"
                                        for="desc"
                                    >{{ __('content.desc') }}</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="desc"
                                        placeholder="{{ __('content.desc') }}"
                                        name="desc"
                                        aria-label="{{ __('content.desc') }}"

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


                    <!-- Edit User Modal -->
                    <div class="modal fade" id="add_categ" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <h1 class="modal-content p-3 p-md-5">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="text-center mb-4">
                                        <h3>{{ __('content.Ajouter_un_categorie') }}</h3>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data" action="{{route('instructeur.profile.videos.categ.add')}}" class="row g-3">
                                        @csrf
                                        <div class="col-12 col-md-12">
                                            <label
                                                class="form-label"
                                                for="categ_desc"
                                            >{{ __('content.desc') }}</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="categ_desc"
                                                name="categ_desc"
                                                aria-label="{{ __('content.desc') }}"
                                            />
                                        </div>

                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('content.Valider') }}</button>
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">{{ __('content.Annuler') }}</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
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
