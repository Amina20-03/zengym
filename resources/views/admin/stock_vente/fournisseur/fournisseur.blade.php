<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'stock_vente','menuactive' =>'fournisseurs'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.admin.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper"  style="margin-top: -60px">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y" style="margin-top: -50px">

                    <!-- Users List Table -->

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
                            <div
                                class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4"

                            >
                                <div class="card" style="padding: 10px">
                                    <div class="row row-bordered g-0">
                                        <div class="col-md-10">

                                            <div

                                                class="px-2"
                                            >
                                                <div class="card-datatable table-responsive">
                                                    <table
                                                        class="datatables-users table border-top"
                                                        id="table"  style="white-space: nowrap;"
                                                    >
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 50px"></th>
                                                            <th style="text-align:center">{{ __('content.RAISON_SOCIALE') }}</th>
                                                            <th style="text-align:center">{{ __('content.contact') }}</th>
                                                            <th style="text-align:center">{{ __('content.tel1') }}</th>
                                                            <th style="text-align:center">{{ __('content.tel2') }}</th>
                                                            <th style="text-align:center">{{ __('content.mf') }}</th>
                                                            <th style="text-align:center">{{ __('content.Registre_de_commerce') }}</th>
                                                            <th style="text-align:center;width: 90px"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(count($liste)>0)
                                                            @foreach($liste as $elem)
                                                                <tr>
                                                                    <td style="text-align:center">
                                                                        <img src="https://cdn-icons-png.freepik.com/512/10753/10753547.png" alt="" style="width:30px;">
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['raison_soc_fourn']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['contact_fourn']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['tel1_fourn']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['tel2_fourn']}}
                                                                    </td>

                                                                    <td style="text-align:center">
                                                                        {{$elem['mf_fourn']}}
                                                                    </td>
                                                                    <td style="text-align:center">
                                                                        {{$elem['rc_fourn']}}
                                                                    </td>

                                                                    <td style="text-align:center">


                                                                        <a href="{{route('admin.stock_vente.fournisseur.edit',$elem['id'])}}" class="btn btn-sm btn-icon">
                                                                            <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">
                                                                        </a>

                                                                        <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem["id"]}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
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
                                        <div class="col-md-2" style="padding: 10px;display: grid;">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    {{ __('content.Ajouter_un_fournisseur') }}
                                                </div>
                                            </div>
                                            <div>
                                                <form method="POST" id="addNewUserForm" action="{{ route('admin.stock_vente.fournisseur.add') }}" class="row g-3">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label"
                                                            for="raison_soc_fourn"
                                                        >{{ __('content.RAISON_SOCIALE') }}</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="raison_soc_fourn"
                                                            placeholder="{{ __('content.RAISON_SOCIALE') }}"
                                                            name="raison_soc_fourn"
                                                            aria-label="{{ __('content.RAISON_SOCIALE') }}"
                                                        />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label"
                                                            for="contact_fourn"
                                                        >{{ __('content.contact') }}</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="contact_fourn"
                                                            placeholder="{{ __('content.contact') }}"
                                                            name="contact_fourn"
                                                            aria-label="{{ __('content.contact') }}"
                                                        />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label"
                                                            for="tel1_fourn"
                                                        >{{ __('content.tel1') }}</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="tel1_fourn"
                                                            placeholder="{{ __('content.tel1') }}"
                                                            name="tel1_fourn"
                                                            aria-label="{{ __('content.tel1') }}"
                                                        />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label"
                                                            for="tel2_fourn"
                                                        >{{ __('content.tel2') }}</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="tel2_fourn"
                                                            placeholder="{{ __('content.tel2') }}"
                                                            name="tel2_fourn"
                                                            aria-label="{{ __('content.tel2') }}"
                                                        />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label"
                                                            for="mf_fourn"
                                                        >{{ __('content.mf') }}</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="mf_fourn"
                                                            placeholder="{{ __('content.mf') }}"
                                                            name="mf_fourn"
                                                            aria-label="{{ __('content.mf') }}"
                                                        />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label"
                                                            for="rc_fourn"
                                                        >{{ __('content.Registre_de_commerce') }}</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="rc_fourn"
                                                            placeholder="{{ __('content.Registre_de_commerce') }}"
                                                            name="rc_fourn"
                                                            aria-label="{{ __('content.Registre_de_commerce') }}"
                                                        />
                                                    </div>

                                                    <button
                                                        type="submit"
                                                        class="btn btn-primary me-sm-3 me-1 data-submit"
                                                        id="submitButton"
                                                    >
                                                        {{ __('content.Valider') }}
                                                    </button>

                                                </form>
                                            </div>
                                            <div
                                                class="text-center fw-medium pt-3 mb-2"
                                            >
                                                {{count($liste)}} {{ __('content.fournisseurs') }}
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>






                </div>
                <form method="POST" action="{{route('admin.stock_vente.fournisseur.delete')}}" class="add-new-user pt-0">
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
