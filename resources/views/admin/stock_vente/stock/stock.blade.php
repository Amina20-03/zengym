<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'stock_vente','menuactive' =>'stock'])

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

                        <div class="card-datatable table-responsive">
                            <table
                                class="datatables-users table border-top"
                                id="table"  style="white-space: nowrap;"
                            >
                                <thead>
                                <tr>
                                    <th style="width: 50px"></th>
                                    <th style="text-align:center">{{ __('content.produits') }}</th>
                                    <th style="text-align:center">{{ __('content.qte') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>
                                            <td style="text-align:center">
                                                <img src="https://cdn3d.iconscout.com/3d/premium/thumb/product-5806313-4863042.png" alt="" style="width:30px;">
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['des_prod']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['qte_stk']}}
                                            </td>

                                        </tr>

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>



                </div>







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
