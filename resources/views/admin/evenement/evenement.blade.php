<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'gest_evenements','menuactive' =>'liste_even'])

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


                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table"
                                style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.desc') }}</th>
                                    <th style="text-align:center">{{ __('content.type') }}</th>
                                    <th style="text-align:center">{{ __('content.instructeur') }}</th>
                                    <th style="text-align:center">{{ __('content.fait') }}</th>
                                    <th style="text-align:center">{{ __('content.date_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.heure_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.date_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.heure_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_place_dispo') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_participant') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_place_restant') }}</th>
                                    <th style="text-align:center">{{ __('content.approuver') }}</th>
                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        @if($elem['approuver'])
                                            <tr>
                                            <td style="text-align:center">
                                                {{$elem['code']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['desc']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['type_even_desc']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['instructeur']}}
                                            </td>
                                            <td style="text-align:center">
                                                @if($elem['fait'])
                                                    <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                @else
                                                    <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['date_deb']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['heure_deb']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['date_fin']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['heure_fin']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['nbr_place_dispo']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['nbr_participant']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['nbr_place_restant']}}
                                            </td>
                                            <td style="text-align:center">
                                                @if($elem['approuver'])
                                                    <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                @else
                                                    <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                <!-- Icon Dropdown -->
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                    <div class="demo-inline-spacing">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <a href="{{route('admin.evenement.details',$elem['id'])}}" class="dropdown-item">
                                                                        <i class="fa fa-pencil"></i> {{ __('content.Détails') }}
                                                                    </a>
                                                                </li>
                                                                @if($elem['approuver'])
                                                                    <li>
                                                                        <hr class="dropdown-divider">
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('admin.evenement.candidats.liste',$elem['id'])}}" class="dropdown-item">
                                                                            <i class="fa fa-users"></i> {{ __('content.liste_candidats') }}
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('admin.evenement.demande.refuser',$elem['id'])}}" class="dropdown-item" style="color: red">
                                                                            <i class="fa fa-times" style="color: red"></i> {{ __('content.refuser') }}
                                                                        </a>
                                                                    </li>
                                                                @else
                                                                    <li>
                                                                        <hr class="dropdown-divider">
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('admin.evenement.delete',$elem['id'])}}" class="dropdown-item" style="color: red">
                                                                            <i class="fa fa-times" style="color: red"></i> {{ __('content.Supprimer') }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/ Icon Dropdown -->


{{--                                                <a href="{{route('admin.instructeur.edit',$elem['id'])}}" class="btn btn-sm btn-icon">--}}
{{--                                                    <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">--}}
{{--                                                </a>--}}

                                               <!-- <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                                </a>-->

                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>



                </div>
                <form method="POST" action="{{route('admin.evenement.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>


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
