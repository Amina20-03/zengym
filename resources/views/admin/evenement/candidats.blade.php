@extends('layouts.app')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.admin.menu',['menuprincipaleactive' =>'gest_evenements','menuactive' =>'liste_even'])

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
                                        <th style="text-align:center;width: 90px"></th>
                                        <th style="text-align:center">{{ __('content.payer') }}</th>
                                        <th style="text-align:center">{{ __('content.date_validation') }}</th>
                                        <th style="text-align:center">{{ __('content.methode_paiement') }}</th>
                                        <th style="text-align:center">{{ __('content.nom') }}</th>
                                        <th style="text-align:center">{{ __('content.prenom') }}</th>
                                        <th style="text-align:center">{{ __('content.tel1') }}</th>
                                        <th style="text-align:center">{{ __('content.mail') }}</th>
                                        <th style="text-align:center">{{ __('content.adresse') }}</th>
                                        <th style="text-align:center">{{ __('content.categorie') }}</th>
                                        <th style="text-align:center">{{ __('content.salle_de_sport') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($list_candidats)>0)
                                        @foreach($list_candidats as $elem)
                                            <tr>
                                                <td style="text-align:center">


                                                    @if($elem['paiement_status'])
                                                    @else
                                                        <a href="#" class="btn btn-sm btn-icon" onclick="call_delete_modal({{$elem['user_id']}})" data-bs-toggle="modal" data-bs-target="#onboardImageModal">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-icon" onclick="change_payment_status('{{$elem['user_id']}}','{{$elem['id_event']}}','1')">
                                                            <img src="https://cdn-icons-png.freepik.com/512/5610/5610944.png" alt="" style="width:100%;">
                                                        </a>
                                                    @endif
                                                </td>
                                                <td style="text-align:center">
                                                    @if($elem['paiement_status'])
                                                        <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                                    @else
                                                        <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                                    @endif

                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['date_validation']}}
                                                </td>
                                                <td style="text-align:center">
                                                    <span class="badge bg-label-primary">{{$elem['methode_paiement']}}</span>
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['nom']}}
                                                </td>

                                                <td style="text-align:center">
                                                    {{$elem['prenom']}}
                                                </td>


                                                <td style="text-align:center">
                                                    {{$elem['tel2']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['email']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['adr']}}
                                                </td>

                                                <td style="text-align:center">
                                                    {{$elem['categ_candidat_desc']}}
                                                </td>
                                                <td style="text-align:center">
                                                    {{$elem['salle_sport_nom']}}
                                                </td>


                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>



                        </div>



                    </div>
                    <form method="POST" action="{{route('admin.evenement.affecter_candidats.delete')}}" class="add-new-user pt-0">
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
                <form method="POST" id="change_payment_status_form" action="{{route('admin.evenement.candidats.change_payment_status')}}" class="row g-3" hidden>
                    @csrf
                    <div class="mb-3">
                        <input type="text" id="id_user" name="id_user"/>
                        <input type="text" id="id_event" name="id_event"/>
                        <input type="text" id="status_payment" name="status_payment"/>

                    </div>


                </form>
                <!--/ Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
@endsection
@section('datatable')

    <script>
        function change_payment_status(id_user,id_event,status_payment){
            $('#id_user').val(id_user);
            $('#id_event').val(id_event);
            $('#status_payment').val(status_payment);
            $('#change_payment_status_form').submit();
        }
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("addNewUserForm");
            var submitButton = document.getElementById("submitButton");

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                submitButton.disabled = true;
                myFunction();
                setTimeout(function () {
                    submitButton.disabled = false;
                }, 2000); // Adjust the time accordingly
            });
            function myFunction() {
                $('#addNewUserForm').submit();
                setTimeout(function () {
                    console.log("Function completed");
                }, 2000);
            }
        });
        $(document).ready(function() {
            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.
            // DataTable initialisation
            $('#table').DataTable(

                {
                    order: [[ 0, "desc" ]],
                    pageLength: 10,
                    lengthMenu: [[10, 20, 30, -1], [10, 20, 30, '{{ __('content.Tous') }}']],
                    "language":
                        {
                            "sProcessing": "{{ __('content.sProcessing') }}",
                            "sLengthMenu": "{{ __('content.sLengthMenu') }}",
                            "sZeroRecords": "{{ __('content.sZeroRecords') }}",
                            "sInfo": "{{ __('content.sInfo') }}",
                            "sInfoEmpty": "{{ __('content.sInfoEmpty') }}",
                            "sInfoFiltered": "{{ __('content.sInfoFiltered') }}",
                            "sInfoPostFix": "{{ __('content.sInfoPostFix') }}",
                            "sSearch": "{{ __('content.sSearch') }}",
                            "sUrl": "{{ __('content.sUrl') }}",
                            "oPaginate": {
                                "sFirst": "{{ __('content.sFirst') }}",
                                "sPrevious": "{{ __('content.sPrevious') }}",
                                "sNext": "{{ __('content.sNext') }}",
                                "sLast": "{{ __('content.sLast') }}"
                            }
                        },
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": true,
                    "autoWidth": true,
                    "buttons": [
                        {
                            extend:    'copyHtml5',
                            text:      '{{ __('content.copier') }}',
                            title:'{{ __('content.liste_evenement') }}',
                            titleAttr: 'Copier',
                            className: 'btn btn-app export barras',

                        },

                        {
                            extend:    'excelHtml5',
                            text:      '{{ __('content.excel') }}',
                            title:'{{ __('content.liste_evenement') }}',
                            titleAttr: 'Excel',
                            className: 'btn btn-app export excel',

                        },

                        {
                            extend:    'print',
                            text:      '{{ __('content.Imprimer') }}',
                            title:'{{ __('content.liste_evenement') }}',
                            titleAttr: 'Imprimer',
                            className: 'btn btn-app export imprimir',

                        },

                    ]
                }
            );
            $('.dataTables_filter input').attr('placeholder', 'Recherche');
        });

        function call_delete_modal(user_id){
            $('#champ_id').val(user_id);
        }
    </script>

@endsection
