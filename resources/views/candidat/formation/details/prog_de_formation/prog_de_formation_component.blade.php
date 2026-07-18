@extends('layouts.app')

@section('content')
    @include('candidat.formation.details.prog_de_formation.prog_de_formation')
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

                    "paging": true,
                    "autoWidth": true,

                }
            );
            $('.dataTables_filter input').attr('placeholder', 'Recherche');
        });

        function call_delete_modal(user_id){
            $('#champ_id').val(user_id);
        }
    </script>

@endsection
