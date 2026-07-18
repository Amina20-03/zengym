<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'vente_prod','menuactive' =>'liste_vente_prod'])

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
                            <div class="card-header border-bottom" style="margin-bottom: 20px">
                                <h5 class="card-title">{{ __('content.Search_Filter') }}</h5>
                                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.vente_prod.search') }}" class="row g-3">
                                    @csrf
                                    <div
                                        class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0"
                                    >

                                        <div class="col-md-3">
                                            <label
                                                class="form-label"
                                                for="du_date"
                                            >{{ __('content.du_date') }}</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="du_date"
                                                value="{{$du_date}}"
                                                name="du_date"
                                                aria-label="{{ __('content.du_date') }}"
                                            />

                                        </div>
                                        <div class="col-md-3">
                                            <label
                                                class="form-label"
                                                for="au_date"
                                            >{{ __('content.au_date') }}</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="au_date"
                                                value="{{$au_date}}"
                                                name="au_date"
                                                aria-label="{{ __('content.au_date') }}"
                                            />
                                        </div>
                                        <div class="col-md-3">
                                            <button
                                                type="submit"
                                                class="btn btn-danger me-sm-3 me-1"
                                                style="width: 100%;margin-top: 27px"
                                            >
                                                {{ __('content.sSearch') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>


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
                                    <th style="text-align:center">Payé?</th>
                                    <th style="text-align:center">Paiement par</th>

                                    <th style="text-align:center">{{ __('content.date') }}</th>
                                    <th style="text-align:center">{{ __('content.tot_ht') }}</th>
                                    <th style="text-align:center">{{ __('content.tot_ttc') }}</th>
                                    <th style="text-align:center">{{ __('content.instructeur') }}</th>
                                    <th style="text-align:center">{{ __('content.encaisse') }}</th>

                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>

                                            <td style="text-align:center">
                                                <input type="radio" name="record"  value="{{$elem['id']}}" onclick="fillTable_ligne_vente()"/>
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['code']}}
                                            </td>

                                            <td style="text-align:center">
                                                @if($elem['paiement_status'])
                                                    <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                @else
                                                    <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['paiement_par']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['date']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['tot_ht']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['tot_ttc']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['instructeur']}}
                                            </td>
                                            <td style="text-align:center">
                                                @if($elem['encaisse'])
                                                    <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                @else
                                                    <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if($elem['instructeur_id'])
                                                    @if($elem['paiement_status'])
                                                        @if(!$elem['encaisse'])
                                                            <a href="{{route('admin.vente_prod.encaisse',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                                <img src="https://cdn-icons-png.flaticon.com/512/4021/4021642.png" alt="" style="width:20px;">
                                                                &nbsp;
                                                                {{ __('content.encaisse') }}
                                                            </a>
                                                            <br>
                                                        @endif
                                                    @endif

                                                @endif



                                                <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal" style="background-color: red;color:white; width:100%;padding:15px">

                                                    <img src="https://cdn-icons-png.flaticon.com/512/5499/5499405.png" alt="" style="width:25%;">
                                                    &nbsp;
                                                    {{ __('content.Supprimer') }}
                                                </a>


                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>


                            <br>
                            <h5 class="pb-2 border-bottom mb-4">
                                {{ __('content.Détails') }}
                            </h5>
                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table_ligne_vente"
                                style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="text-align:center"></th>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.desc') }}</th>
                                    <th style="text-align:center;width: 150px;">{{ __('content.qte') }}</th>
                                    <th style="text-align:center;width: 150px;">{{ __('content.pu_ht') }}</th>
                                    <th style="text-align:center;width: 150px;">{{ __('content.remise') }}</th>
                                    <th style="text-align:center;width: 150px;">{{ __('content.pu_net_ht') }}</th>
{{--                                    <th style="text-align:center;width: 150px;">{{ __('content.total_net_ht') }}</th>--}}
{{--                                    <th style="text-align:center;width: 150px;">{{ __('content.taux_tva') }}</th>--}}
{{--                                    <th style="text-align:center;width: 150px;">{{ __('content.tot_ttc') }}</th>--}}
                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
                <form method="POST" action="{{route('admin.vente_prod.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>

                <form method="POST" action="{{route('admin.vente_prod.ligne_vente.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal_ligne')

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
