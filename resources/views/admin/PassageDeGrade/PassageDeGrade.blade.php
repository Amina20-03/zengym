<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu',['menuprincipaleactive' =>'Paramétrage','menuactive' =>'passage_de_grade'])

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




                    <div
                        class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4"
                    >
                        <div class="card" style="padding:10px">
                            <div class="row row-bordered g-0">
                                <div class="col-md-10">

                                    <div

                                        class="px-2"
                                    >
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
                                                    <th style="text-align:center">{{ __('content.designation') }}</th>
                                                    <th style="text-align:center">{{ __('content.nbr_event') }}</th>
                                                    <th style="text-align:center">{{ __('content.nbr_masterclass') }}</th>
                                                    <th style="text-align:center">{{ __('content.de_categ') }}</th>
                                                    <th style="text-align:center">{{ __('content.au_categ') }}</th>

                                                    <th style="text-align:center;width: 90px"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($liste)>0)
                                                    @foreach($liste as $elem)
                                                        <tr>

                                                            <td style="text-align:center">
                                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/People_icon_half.svg/1024px-People_icon_half.svg.png" alt="" style="width:30px;">
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['code']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['des']}}
                                                            </td>

                                                            <td style="text-align:center">
                                                                {{$elem['nbr_event']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['nbr_masterclass']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['categ_instructeur_desc_1']}}
                                                            </td>
                                                            <td style="text-align:center">
                                                                {{$elem['categ_instructeur_desc_2']}}
                                                            </td>
                                                            <td style="text-align:center">

                                                                <a href="{{route('admin.passage_de_grade.edit',$elem['id'])}}" class="btn btn-sm btn-icon">
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
                                <div class="col-md-2" style="padding: 10px;display: grid;">
                                    <div class="card-body">
                                        <div class="text-center">
                                            {{ __('content.ajouter_passage_grade') }}
                                        </div>
                                    </div>
                                    <div>
                                        <form method="POST" id="addNewUserForm" action="{{ route('admin.passage_de_grade.add') }}" class="row g-3">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="categ_instructeur_id_1">{{ __('content.de_categ') }}</label>
                                                <select id="categ_instructeur_id_1" name="categ_instructeur_id_1" class="select2 form-select" required>
                                                    <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="categ_instructeur_id_2">{{ __('content.au_categ') }}</label>
                                                <select id="categ_instructeur_id_2" name="categ_instructeur_id_2" class="select2 form-select" required>
                                                    <option value="null">{{ __('content.categorie_instructeur') }}</option>
                                                    @for($i=0;$i<count($list_cat);$i++)
                                                        <option value="{{$list_cat[$i]['id']}}">{{$list_cat[$i]['desc']}}</option>

                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    class="form-label"
                                                    for="des"
                                                >{{ __('content.designation') }}</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="des"
                                                    placeholder="{{ __('content.designation') }}"
                                                    name="des"
                                                    aria-label="{{ __('content.designation') }}"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    class="form-label"
                                                    for="nbr_event"
                                                >{{ __('content.nbr_event') }}</label
                                                >
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="nbr_event"
                                                    placeholder="{{ __('content.nbr_event') }}"
                                                    name="nbr_event"
                                                    aria-label="{{ __('content.nbr_event') }}"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    class="form-label"
                                                    for="nbr_masterclass"
                                                >{{ __('content.nbr_masterclass') }}</label
                                                >
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="nbr_masterclass"
                                                    placeholder="{{ __('content.nbr_masterclass') }}"
                                                    name="nbr_masterclass"
                                                    aria-label="{{ __('content.nbr_masterclass') }}"
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
                                        {{count($liste)}} {{ __('content.passage_grade') }}
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>








                </div>
                <form method="POST" action="{{route('admin.passage_de_grade.delete')}}" class="add-new-user pt-0">
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
