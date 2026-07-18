<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'comptes','menuactive' =>'liste_comptes'])

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
                                    <th style="text-align:center">{{ __('content.Code') }}</th>
                                    <th style="text-align:center">{{ __('content.instructeur') }}</th>

                                    <th style="text-align:center">{{ __('content.date') }}</th>
                                    <th style="text-align:center">{{ __('content.datedernmodif') }}</th>
                                    <th style="text-align:center">{{ __('content.soldecpte') }}</th>
                                    <th style="text-align:center;width: 90px"></th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        <tr>


                                            <td style="text-align:center">
                                                {{$elem['code']}}
                                            </td>
                                            <td style="text-align:center">
                                                {{$elem['instructeur']}}
                                            </td>

                                            <td style="text-align:center">
                                                {{$elem['date']}}
                                            </td>

                                            <td style="text-align:center">
                                                {{$elem['datedernmodif']}}
                                            </td>

                                            <td style="text-align:center">
                                                {{$elem['soldecpte']}}

                                            </td>
                                            <td style="text-align:center">


                                                <a href="{{route('admin.instructeur.compte.operation.index',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px">

                                                    <img src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png" alt="" style="width:30px;">
                                                    &nbsp;
                                                    {{ __('content.les_operations') }}
                                                </a>


                                            </td>


                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>






                    <!-- Offcanvas to add new user -->

                </div>
                <form method="POST" action="{{route('admin.candidat.delete')}}" class="add-new-user pt-0">
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
