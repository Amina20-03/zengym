<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'stock_vente','menuactive' =>'conventions'])

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
                <div class="container-xxl flex-grow-1 container-p-y" style="margin-top: -50px">

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
                            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.convention.search') }}" class="row g-3">
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
                                id="table" style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="width: 50px"></th>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.Date') }}</th>
                                    <th style="text-align:center">{{ __('content.Heure') }}</th>
                                    <th style="text-align:center">{{ __('content.RAISON_SOCIALE') }}</th>
                                    <th style="text-align:center">{{ __('content.contact') }}</th>
                                    <th style="text-align:center">{{ __('content.tel1') }}</th>
                                    <th style="text-align:center">{{ __('content.mf') }}</th>
                                    <th style="text-align:center">{{ __('content.date_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.date_fin') }}</th>
                                    <th style="text-align:center">{{ __('menu.type_paiement') }}</th>
                                    <th style="text-align:center">{{ __('content.actif') }}</th>
                                    <th style="text-align:center">{{ __('content.nb_personne') }}</th>
                                    <th style="text-align:center">{{ __('content.Solder') }}</th>
                                    <th style="text-align:center">{{ __('content.total_ht') }}</th>
                                    <th style="text-align:center">{{ __('content.TVA') }}</th>
                                    <th style="text-align:center">{{ __('content.mt_ttc') }}</th>

                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <td style="text-align:center">
                                            <input type="radio" name="record" value="{{$elem->IDCONVENTION}}">
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem->code_conv}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem->date_conv}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem->heure_conv}}
                                        </td>
                                        <td style="text-align:center">
                                            {{DB::table('client_societe')->where('IDCLTSOC',$elem->IDENTREPRISE)->value('raison_sociale')}}
                                        </td>
                                        <td style="text-align:center">
                                            {{DB::table('client_societe')->where('IDCLTSOC',$elem->IDENTREPRISE)->value('contact_soc')}}
                                        </td>
                                        <td style="text-align:center">
                                            {{DB::table('client_societe')->where('IDCLTSOC',$elem->IDENTREPRISE)->value('tel_soc')}}
                                        </td>
                                        <td style="text-align:center">
                                            {{DB::table('client_societe')->where('IDCLTSOC',$elem->IDCLIENT)->value('mf_soc')}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem->date_deb_conv}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem->date_fin_conv}}
                                        </td>
                                        <td style="text-align:center">
                                            {{DB::table('typepaiement')->where('IDTYPEPAIEMENT',$elem->IDTYPEPAIEMENT)->value('des_type_paiement')}}
                                        </td>
                                        <td style="text-align:center">
                                            @if($elem->actif_conv)
                                                <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                            @else
                                                <span class="badge bg-label-primary">{{ __('content.Non') }}</span>
                                            @endif
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem->nbpersonne}}
                                        </td>
                                        <td style="text-align:center">
                                            @if($elem->solder_conc)
                                                <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                            @else
                                                <span class="badge bg-label-primary">{{ __('content.Non') }}</span>
                                            @endif
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem->totalht_conv}}
                                        </td>
                                        <td style="text-align:center">
                                            {{DB::table('tva')->where('IDTVA',$elem->tva_conv)->value('taux_tva')}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem->total_ttc_conv}}
                                        </td>
                                        <td style="text-align:center">


                                            <a href="{{route('admin.convention.type_convention.edit',$elem->IDCONVENTION)}}" class="btn btn-sm btn-icon">
                                                <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">
                                            </a>

                                            <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem->IDCONVENTION}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                            </a>

                                        </td>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="card" style="padding: 20px; margin-top: 10px">
                        <h5 class="pb-2 border-bottom mb-4">
                            {{ __('content.Liste_reglement') }}
                        </h5>
                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table_reg"
                            >
                                <thead>
                                <tr>
                                    <th style="width: 50px"></th>
                                    <th style="text-align:center;width: 300px">{{ __('content.Date') }}</th>
                                    <th style="text-align:center">{{ __('content.Prix') }}</th>
                                    <th style="text-align:center;width: 300px">{{ __('content.modalite') }}</th>
                                    <th style="text-align:center">{{ __('content.Commentaire') }}%</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{route('admin.convention.societe.delete')}}" class="add-new-user pt-0">
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
