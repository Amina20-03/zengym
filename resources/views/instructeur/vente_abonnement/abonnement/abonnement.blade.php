<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'vente_abonnement','menuactive' =>'list_abo'])

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
                                    <th style="text-align:center">{{ __('content.date') }}</th>

                                    <th style="text-align:center">{{ __('content.pu_ht') }}</th>
                                    <th style="text-align:center">{{ __('content.pu_ttc') }}</th>
                                    <th style="text-align:center">{{ __('content.taux_tva') }}</th>
                                    <th style="text-align:center">{{ __('content.paiement') }}</th>
                                    <th style="text-align:center">{{ __('content.solder') }}</th>
                                    <th style="text-align:center">{{ __('content.sLast') }}</th>
                                    <th style="text-align:center">{{ __('content.date_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.date_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.type_abonnement') }}</th>
                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        @if($elem['instructeur_id'] == session('instructeur_id'))
                                            <tr>

                                                <td style="text-align:center">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/People_icon_half.svg/1024px-People_icon_half.svg.png" alt="" style="width:30px;">
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['code']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['montant_ht']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['montant_ttc']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['taux_tva']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['paiement']}}
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['solder'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['dernier'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date_deb']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date_fin']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['type_abo_desc']}}
                                                </td>

                                                <td style="text-align:center">


                                                    {{--                                                <a href="{{route('admin.type_abo.edit',$elem['id'])}}" class="btn btn-sm btn-icon">--}}
                                                    {{--                                                    <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">--}}
                                                    {{--                                                </a>--}}



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
