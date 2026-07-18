<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'passage_de_grade','menuactive' =>''])

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
                                    <th style="text-align:center">{{ __('content.nom') }}</th>
                                    <th style="text-align:center">{{ __('content.prenom') }}</th>
                                    <th style="text-align:center">{{ __('content.mail') }}</th>
                                    <th style="text-align:center">{{ __('content.adresse') }}</th>
                                    <th style="text-align:center">{{ __('content.tel') }}</th>
                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_event') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_masterclass') }}</th>

                                    <th style="text-align:center;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>


                                            <td style="text-align:center">
                                                {{$elem['nom']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['prenom']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['mail']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['adresse']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['tel']}}
                                            </td>

                                            <td style="text-align:center">
                                                @if($elem['instructeur_id'])
                                                    {{$elem['categ_instructeur_desc']}}
                                                @elseif($elem['representant_id'])
                                                    {{$elem['categ_rep_desc']}}
                                                @else
                                                    {{$elem['categ_candidat_desc']}}
                                                @endif

                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['nbr_events']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['nbr_masterclass']}}
                                            </td>

                                            <td style="text-align:center">

                                                @if($elem['instructeur_id'])
                                                    <a href="{{route('admin.passage_de_grade.get_users.passage_grade_instructeur',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px;color:white">

                                                        {{ __('content.passage_grade') }}
                                                    </a>
                                                    <br>
                                                @elseif($elem['representant_id'])

                                                @elseif($elem['candidat_id'])

                                                    <a href="{{route('admin.passage_de_grade.get_users.devenir_instructeur',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px;color:white">

                                                        {{ __('content.devenir_instructeur') }}
                                                    </a>
                                                    <br>
                                                @endif




                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



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
