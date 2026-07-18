<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'vente_abonnement_adherent','menuactive' =>'list_abo_adherent'])

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
                                    <th style="text-align:center">Adhérent</th>
                                    <th style="text-align:center">Type d'abonnement</th>
                                    <th style="text-align:center">Catégorie</th>
                                    <th style="text-align:center">Date début</th>
                                    <th style="text-align:center">Date fin</th>

                                    <th style="text-align:center">Frais</th>
                                    <th style="text-align:center">Remise%</th>
                                    <th style="text-align:center">Frais après remise</th>
                                    <th style="text-align:center">Statut de paiement</th>
                                    <th style="text-align:center">Abonnement Active?</th>
                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>


                                            <td style="text-align:center">
                                                {{$elem['user']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['titre']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['categorie_type']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['date_deb']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['date_fin']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['frais']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['remise']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['frais_ap_remise']}}
                                            </td>
                                            <td style="text-align:center">
                                                @if($elem['status_paie'])
                                                    <span class="badge bg-label-success">Payé</span>
                                                @else
                                                    <span class="badge bg-label-danger">Impayé</span>
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if($elem['active'])
                                                    <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                @else
                                                    <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                @endif
                                            </td>

                                            <td style="text-align:center">


{{--                                                <a href="{{route('admin.type_abo.edit',$elem['id'])}}" class="btn btn-sm btn-icon">--}}
{{--                                                    <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">--}}
{{--                                                </a>--}}
                                                @if($elem['active'])
                                                @else
                                                    <a href="{{route('admin.abonnement.adherent.valider',$elem['id'])}}" class="btn btn-sm btn-icon">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/9813/9813984.png" alt="" style="width:100%;">
                                                    </a>
                                                @endif
                                                <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>




                </div>
                <form method="POST" action="{{route('admin.abonnement.adherent.delete')}}" class="add-new-user pt-0">
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
