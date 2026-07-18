<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'evenements','menuactive' =>'dmd_evennement'])

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
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.date_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.date_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.heure_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.heure_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_participant') }}</th>
                                    <th style="text-align:center">{{ __('content.sujet') }}</th>
                                    <th style="text-align:center">{{ __('content.frais') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_place_max') }}</th>
                                    <th style="text-align:center">{{ __('content.categorie') }}</th>
                                    <th style="text-align:center">{{ __('content.approuver') }}</th>


                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        @if((string)$elem['instructeur_id'] == (string)session('instructeur_id'))

                                            <tr>

                                                <td style="text-align:center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png" alt="" style="width:30px;">
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['code']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date_deb']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date_fin']}}
                                                </td>

                                                <td style="text-align:center">
                                                    {{$elem['heure_deb']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['heure_fin']}}
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
                                                    {{$elem['nbr_place_dispo']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['type_even_desc']}}
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['approuver'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">


                                                    @if($elem['approuver'])
                                                        @if($elem['date_deb'] < date('Y-m-d'))
                                                            <a href="{{route('instructeur.formation.realiser',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                                <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                                &nbsp;
                                                                {{ __('content.realiser') }}
                                                            </a>
                                                        @elseif($elem['date_deb'] == date('Y-m-d'))
                                                            @if($elem['heure'] < date('H:i'))
                                                                <a href="{{route('instructeur.formation.realiser',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                                    <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                                    &nbsp;
                                                                    {{ __('content.encaisse') }}

                                                                </a>
                                                            @endif
                                                        @endif
                                                        <br>
                                                    @else
                                                        {{--                                                        <a href="{{route('instructeur.formation.edit',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">--}}
                                                        {{--                                                            <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:20px;">--}}
                                                        {{--                                                            {{ __('content.Modifier') }}--}}
                                                        {{--                                                        </a>--}}
                                                        {{--                                                        <br>--}}
                                                        <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:20px;">
                                                            {{ __('content.Supprimer') }}
                                                        </a>

                                                    @endif


                                                </td>
                                            </tr>


                                        @endif

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>






                    <!-- Offcanvas to add new user -->

                </div>
                <form method="POST" action="{{route('instructeur.evennement.demande.delete')}}" class="add-new-user pt-0">
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
