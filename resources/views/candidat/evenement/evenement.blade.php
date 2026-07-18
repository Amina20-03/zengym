@extends('layouts.app')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.candidat.menu',['menuprincipaleactive' =>'evenements','menuactive' =>'liste_even'])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.candidat.navbar')
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
                                <th style="text-align:center">{{ __('content.evenement') }}</th>
                                <th style="text-align:center">{{ __('content.date_deb') }}</th>
                                <th style="text-align:center">{{ __('content.date_fin') }}</th>
                                <th style="text-align:center">{{ __('content.type') }}</th>
                                <th style="text-align:center">{{ __('content.salle') }}</th>
                                <th style="text-align:center">{{ __('content.fait') }}</th>
                                <th style="text-align:center">{{ __('content.frais') }}</th>
                                <th style="text-align:center">{{ __('content.methode_paiement') }}</th>
                                <th style="text-align:center">{{ __('content.payer') }}</th>
                                <th style="text-align:center">{{ __('content.date_validation') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($liste)>0)
                            @foreach($liste as $elem)
                            <tr>
                                <td style="text-align:center">
                                    {{$elem['event']}}
                                </td>
                                <td style="text-align:center">
                                    {{$elem['event_date_deb']}}
                                </td>
                                <td style="text-align:center">
                                    {{$elem['event_date_fin']}}
                                </td>

                                <td style="text-align:center">
                                    <span class="badge bg-label-primary">{{$elem['event_type_even']}}</span>
                                </td>

                                <td style="text-align:center">
                                    {{$elem['event_salle']}}
                                </td>
                                <td style="text-align:center">
                                    @if($elem['event_status'])
                                    <span class="badge bg-label-success">{{ __('content.Oui') }}</span>
                                    @else
                                    <span class="badge bg-label-danger">{{ __('content.Non') }}</span>
                                    @endif
                                </td>

                                <td style="text-align:center">
                                    {{$elem['event_frais']}} {{$elem['event_devise']}}
                                </td>
                                <td style="text-align:center">
                                    <span class="badge bg-label-primary">{{$elem['methode_paiement']}}</span>
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
                            </tr>

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

@endsection
@section('datatable')
<script>
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
            if($('#salle_sport_id').val()==='null'){
                alert('{{ __('content.veuillez_selectionner_un_sp') }}')
            }
            else{
                if($('#categ_candidat_id').val()==='null'){
                    alert('{{ __('content.veuillez_selectionner_un_cat') }}')
                }
                else{
                    $('#addNewUserForm').submit();
                }
            }



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
                pageLength:10,
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
                        title:'{{ __('content.list_formation') }}',
                        titleAttr: 'Copier',
                        className: 'btn btn-app export barras',

                    },

                    {
                        extend:    'excelHtml5',
                        text:      '{{ __('content.excel') }}',
                        title:'{{ __('content.list_formation') }}',
                        titleAttr: 'Excel',
                        className: 'btn btn-app export excel',

                    },

                    {
                        extend:    'print',
                        text:      '{{ __('content.Imprimer') }}',
                        title:'{{ __('content.list_formation') }}',
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
