<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'stock_vente','menuactive' =>'bon_sortie'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.admin.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper" style="margin-top: -60px">
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
                                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.stock_vente.bon_sortie.search') }}" class="row g-3">
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
                                    <th style="text-align:center">{{ __('content.date') }}</th>
                                    <th style="text-align:center">{{ __('content.total_ht') }}</th>
                                    <th style="text-align:center">{{ __('content.mt_ttc') }}</th>
                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>
                                            <td style="text-align:center">
                                                <input type="radio" name="record" onclick="fillTable()" value="{{$elem['IDBSORTIE']}}">
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['code_bs']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['date_bs']}}
                                            </td>


                                            <td style="text-align:center">
                                                {{$elem['total_ht_bs']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['total_ttc_bs']}}
                                            </td>

                                            <td style="text-align:center">


                                                <a href="{{route('admin.stock_vente.bon_sortie.edit',$elem['IDBSORTIE'])}}" class="btn btn-sm btn-icon">
                                                    <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" alt="" style="width:100%;">
                                                </a>

                                                <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['IDBSORTIE']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                                </a>

                                            </td>
                                        </tr>

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>


                        <h5 class="pb-2 border-bottom mb-4">
                            <br>
                            {{ __('content.Détails') }}
                        </h5>
                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table_detail" style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.desc') }}</th>
                                    <th style="text-align:center">{{ __('content.code_barre') }}</th>
                                    <th style="text-align:center">{{ __('content.qte') }}</th>
                                    <th style="text-align:center">{{ __('content.pu') }}</th>
                                    <th style="text-align:center">{{ __('content.total') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
                <form method="POST" action="{{route('admin.stock_vente.bon_sortie.delete')}}" class="add-new-user pt-0">
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
