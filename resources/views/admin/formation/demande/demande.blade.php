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
                                    <th style="width: 50px"></th>
                                    <th style="text-align:center">{{ __('content.instructeur') }}</th>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.date') }}</th>
                                    <th style="text-align:center">{{ __('content.heure') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_participant') }}</th>
                                    <th style="text-align:center">{{ __('content.sujet') }}</th>
                                    <th style="text-align:center">{{ __('content.frais') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_place_max') }}</th>
                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                    <th style="text-align:center">{{ __('content.approuver') }}</th>
                                    <th style="text-align:center">{{ __('content.enligne') }}</th>


                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)


                                            <tr>

                                                <td style="text-align:center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png" alt="" style="width:30px;">
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['instructeur']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['code']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date']}}
                                                </td>

                                                <td style="text-align:center">
                                                    {{$elem['heure']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_participant']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['sujet']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['frais']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_place_max']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['categ_formation_desc']}}
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['approuver'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['enligne'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif
                                                </td>

                                                <td style="text-align:center">


                                                    <a href="{{route('admin.demande_formation.details',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                        <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                        &nbsp;
                                                        {{ __('content.Détails') }}
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
