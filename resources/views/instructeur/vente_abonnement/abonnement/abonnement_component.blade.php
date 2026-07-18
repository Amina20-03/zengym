@extends('layouts.app')

@section('content')
    @include('instructeur.vente_abonnement.abonnement.abonnement')
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
                            title:'{{ __('content.liste_abonnement') }}',
                            titleAttr: 'Copier',
                            className: 'btn btn-app export barras',

                        },

                        {
                            extend:    'excelHtml5',
                            text:      '{{ __('content.excel') }}',
                            title:'{{ __('content.liste_abonnement') }}',
                            titleAttr: 'Excel',
                            className: 'btn btn-app export excel',

                        },

                        {
                            extend:    'print',
                            text:      '{{ __('content.Imprimer') }}',
                            title:'{{ __('content.liste_abonnement') }}',
                            titleAttr: 'Imprimer',
                            className: 'btn btn-app export imprimir',

                        },

                    ]
                }
            );
            $('.dataTables_filter input').attr('placeholder', 'Recherche');
        });


    </script>

@endsection
