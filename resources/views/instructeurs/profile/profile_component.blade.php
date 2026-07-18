@extends('layouts.app_vitrine')

@section('content')
    @include('instructeurs.profile.profile')
@endsection
@section('datatable')

    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/forms-selects.js')}}"></script>
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
                if($('#categ_produit_id').val()=='null'){
                    alert('veuillez_selectionner_un_cat');
                }
                else{
                    $('#addNewUserForm').submit();
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
                    pageLength: 2,
                    lengthMenu: [[2, 10, 20, -1], [2, 10, 20, '{{ __('content.Tous') }}']],
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

                    "paging": true,
                    "autoWidth": true,

                }
            );
            $('.dataTables_filter input').attr('placeholder', 'Recherche');





            $('#table2').DataTable(

                {
                    order: [[ 0, "desc" ]],
                    pageLength: 2,
                    lengthMenu: [[2, 10, 20, -1], [2, 10, 20, '{{ __('content.Tous') }}']],
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

                    "paging": true,
                    "autoWidth": true,

                }
            );
        });
    </script>

@endsection
