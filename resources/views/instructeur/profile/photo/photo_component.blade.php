@extends('layouts.app')

@section('content')
    @include('instructeur.profile.photo.photo')
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
                if($('#categ_id').val()=='null'){
                    alert("{{ __('content.veuillez_selectionner_un_cat') }}");
                }
                else {
                    if($('#photo').val()==''){
                        alert("{{ __('content.ajouter_photos') }}");
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


        });

        function call_delete_modal(user_id){
            $('#champ_id').val(user_id);
        }

        function search_photo_by_categ(){
            $('#id_categ_searching').val($('#select2_course_select').val());
            $('#search_photo_form').submit();
        }
    </script>

@endsection
