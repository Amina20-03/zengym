@extends('layouts.app')

@section('content')
    @include('admin.cours.ajouter.ajouter')
@endsection
@section('datatable')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("add_vente_form");
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
                if($('#instr_id_list').val()==='0'){
                    alert('{{__('content.veuillez_selectionner_un_instr')}}')
                }
                else{
                    $('#add_vente_form').submit();
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

                    "paging": true,
                    "autoWidth": true,

                }
            );
            $('.dataTables_filter input').attr('placeholder', 'Recherche');
        });

        function call_delete_modal(user_id){
            $('#champ_id').val(user_id);
        }

        function fillTable_instr_id_list(){
            $('#instr_id_list').val("");
            var capacite = parseInt($('#nbr_place_dispo').val()) ;
            var res = 0;
            var res2 = 0;
            $("#table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $('#instr_id_list').val($('#instr_id_list').val()+"|"+$(this).val());
                    if(capacite !== 0){
                        res = capacite - 1;

                    }
                    res2 = res2+1;
                }

            });
            $('#nbr_place_restant').val(res);
            $('#nbr_participant').val(res2);

        }
    </script>

@endsection
