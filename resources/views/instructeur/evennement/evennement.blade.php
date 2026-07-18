<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'evenements','menuactive' =>'liste_evenement'])

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
                                    <th style="text-align:center">{{ __('content.desc') }}</th>
                                    <th style="text-align:center">{{ __('content.fait') }}</th>
                                    <th style="text-align:center">{{ __('content.date_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.date_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.heure_deb') }}</th>
                                    <th style="text-align:center">{{ __('content.heure_fin') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_participant') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_place_dispo') }}</th>
                                    <th style="text-align:center">{{ __('content.nbr_place_restant') }}</th>
                                    <th style="text-align:center">{{ __('content.type_evenement') }}</th>
                                    <th style="text-align:center">{{ __('content.approuver') }}</th>

                                    <th style="text-align:center;width: 90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($liste)>0)
                                    @foreach($liste as $elem)
                                        @if($elem['instructeur_id'] == session('instructeur_id'))
                                            <tr>

                                                <td style="text-align:center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1672/1672286.png" alt="" style="width:30px;">
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['code']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['desc']}}
                                                </td>

                                                <td style="text-align:center">
                                                    @if($elem['fait'])
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
                                                    {{$elem['heure_deb']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['heure_fin']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_participant']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_place_dispo']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nbr_place_restant']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['type_even_desc']}}
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['approuver'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @elseif(isset($elem['refuser']) && $elem['refuser'])
                                                        <span class="badge bg-label-danger">Refusé</span>
                                                    @else
                                                        <span class="badge bg-label-warning">En attente</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">

                                                    @if($elem['approuver'])
                                                        <a href="{{route('evennement.photos',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">
                                                            Photos
                                                        </a>
                                                    <br>
                                                        @if($elem['date_deb'] < date('Y-m-d'))
                                                            <a href="{{route('instructeur.evennement.realiser',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                                <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                                &nbsp;
                                                                {{ __('content.realiser') }}
                                                            </a>
                                                        @elseif($elem['date_deb'] == date('Y-m-d'))
                                                            @if($elem['heure_deb'] < date('H:i'))
                                                                <a href="{{route('instructeur.evennement.realiser',$elem['id'])}}" class="btn btn-sm btn-icon" style="background-color: lightgray; width:100%;padding:15px; margin-bottom: 5px">

                                                                    <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:20px;">
                                                                    &nbsp;
                                                                    {{ __('content.realiser') }}

                                                                </a>
                                                            @endif
                                                        @endif
                                                        <br>
                                                    @elseif(isset($elem['refuser']) && $elem['refuser'])
                                                        {{-- Refusé : bouton supprimer --}}
                                                        <a href="#" class="btn btn-sm btn-outline-danger w-100"
                                                           onclick="call_delete_modal_even({{$elem['id']}})"
                                                           data-bs-toggle="modal" data-bs-target="#deleteEvenModal">
                                                            <i class="fa fa-trash me-1"></i>Supprimer
                                                        </a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endif

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>



                    </div>






                    <!-- Offcanvas to add new user -->

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

<!-- Modal suppression événement refusé -->
<div class="modal fade" id="deleteEvenModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger"><i class="fa fa-trash me-2"></i>Supprimer l'événement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cet événement refusé ? Cette action est irréversible.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                <form id="formDeleteEven" method="POST" action="{{ route('instructeur.evennement.demande.delete') }}" style="display:inline">
                    @csrf
                    <input type="hidden" name="champ_id" id="delete_even_id">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash me-1"></i>Confirmer la suppression
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function call_delete_modal_even(id) {
    document.getElementById('delete_even_id').value = id;
}
</script>
