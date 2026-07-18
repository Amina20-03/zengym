<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'produits','menuactive' =>'produit'])

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

                        <!-- Offcanvas to add new user -->














                    <div style=" float: right;text-align: right">
                        <button
                            type="button"
                            class="btn btn-primary me-sm-3 me-1 data-submit"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                        >
                            {{ __('content.Ajouter_un_produit') }}
                        </button>
                    </div>

                    <div class="card-datatable table-responsive">

                        <table
                            class="datatables-users table border-top"
                            id="table" style="white-space: nowrap;"
                        >
                            <thead>
                            <tr>
                                <th style="width: 50px"></th>
                                <th style="text-align:center">{{ __('content.code_barre') }}</th>
                                <th style="text-align:center">{{ __('content.Code') }}</th>
                                <th style="text-align:center">{{ __('content.desc') }}</th>
                                <th style="text-align:center">{{ __('content.couleur') }}</th>
                                <th style="text-align:center">{{ __('content.dosage') }}</th>
                                <th style="text-align:center">{{ __('content.prix_vente_ht') }}</th>
                                <th style="text-align:center">{{ __('content.prix_vente_net_ht') }}</th>
                                <th style="text-align:center">{{ __('content.prix_vente_ttc') }}</th>
                                <th style="text-align:center">{{ __('content.taux_tva') }}</th>

                                <th style="text-align:center">{{ __('content.max_remise') }}</th>
                                <th style="text-align:center">{{ __('content.active') }}</th>
                                <th style="text-align:center">{{ __('content.categ_produit') }}</th>

                                <th style="text-align:center;width: 90px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($liste)>0)
                                @foreach($liste as $elem)
                                    @php
                                        $barcodeGenerator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                         $barcodeData = $elem['code_barre']??'0';
                                         $barcodePngData = $barcodeGenerator->getBarcode($barcodeData, $barcodeGenerator::TYPE_CODE_128);
                                    @endphp
                                    <tr>

                                        <td style="text-align:center">
                                            @if($elem['photo'])
                                                <img src="data:image/jpg;base64,{{$elem['photo'] }}" alt="" style="width:30px;">
                                            @else
                                                <img src="https://cdn-icons-png.flaticon.com/512/4129/4129528.png" alt="" style="width:30px;">
                                            @endif
                                        </td>
                                        <td style="text-align:center">
                                            <img src="data:image/png;base64,{{ base64_encode($barcodePngData) }}" alt="Generated Barcode">
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['code']}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['desc']}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['couleur']}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['dosage']}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['prix_vente_ht']}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['prix_vente_net_ht']}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['prix_vente_ttc']}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['taux_tva']}}
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['max_remise']}}
                                        </td>
                                        <td style="text-align:center">
                                            @if($elem['active'])
                                                <span class="badge bg-label-success">{{ __('content.oui') }}</span>
                                            @else
                                                <span class="badge bg-label-primary">{{ __('content.non') }}</span>
                                            @endif
                                        </td>
                                        <td style="text-align:center">
                                            {{$elem['categ_produit_desc']}}
                                        </td>

                                        <td style="text-align:center">


                                            <a href="{{route('admin.produit.edit',$elem['id'])}}" class="btn btn-sm btn-icon">
                                                <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">
                                            </a>

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
                <form method="POST" action="{{route('admin.produit.delete')}}" class="add-new-user pt-0">
                    @csrf
                    @include('layouts.delete_modal')

                </form>





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
                            {{ __('content.Ajouter_un_produit') }}

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

                        <form method="POST" enctype="multipart/form-data" id="addNewUserForm" action="{{ route('admin.produit.add') }}" class="row g-3">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="categ_produit_id">{{ __('content.categ_produit') }}</label>
                                <select id="categ_produit_id" name="categ_produit_id" class="select2 form-select" required>
                                    <option value="null">{{ __('content.categ_produit') }}</option>
                                    @for($i=0;$i<count($list_cat);$i++)
                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['lib']}}</option>

                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="photo"
                                >{{ __('content.photo') }}</label
                                >
                                <input
                                    type="file"
                                    class="form-control"
                                    id="photo"
                                    placeholder="{{ __('content.photo') }}"
                                    name="photo"
                                    aria-label="{{ __('content.photo') }}"
                                />
                            </div>
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
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="couleur"
                                >{{ __('content.couleur') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="couleur"
                                    placeholder="{{ __('content.couleur') }}"
                                    name="couleur"
                                    aria-label="{{ __('content.couleur') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="dosage"
                                >{{ __('content.dosage') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="dosage"
                                    placeholder="{{ __('content.dosage') }}"
                                    name="dosage"
                                    aria-label="{{ __('content.dosage') }}"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="prix_vente_ht"
                                >{{ __('content.prix_vente_ht') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="prix_vente_ht"
                                    value="00.000"
                                    name="prix_vente_ht"
                                    aria-label="{{ __('content.prix_vente_ht') }}"
                                    onkeyup="calcul_prix_net_ht()"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="prix_vente_net_ht"
                                >{{ __('content.prix_vente_net_ht') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="prix_vente_net_ht"
                                    value="00.000"
                                    name="prix_vente_net_ht"
                                    aria-label="{{ __('content.prix_vente_net_ht') }}"
                                    readonly
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="prix_vente_ttc"
                                >{{ __('content.prix_vente_ttc') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="prix_vente_ttc"
                                    value="00.000"
                                    name="prix_vente_ttc"
                                    aria-label="{{ __('content.prix_vente_ttc') }}"
                                    readonly
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="taux_tva"
                                >{{ __('content.taux_tva') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="taux_tva"
                                    value="0"
                                    name="taux_tva"
                                    aria-label="{{ __('content.taux_tva') }}"
                                    onkeyup="check_if_is_integer()"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="max_remise"
                                >{{ __('content.max_remise') }}</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="max_remise"
                                    value="00.000"
                                    name="max_remise"
                                    aria-label="{{ __('content.max_remise') }}"
                                    onkeyup="calcul_prix_net_ht()"
                                />
                            </div>






                            <div class="mb-3">
                                <label class="switch">
                                    <input type="checkbox" class="switch-input" name="active">
                                    <span class="switch-toggle-slider">
                                                                <span class="switch-on"></span>
                                                                <span class="switch-off"></span>
                                                            </span>
                                    <span class="switch-label">{{ __('content.active') }}</span>
                                </label>
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
