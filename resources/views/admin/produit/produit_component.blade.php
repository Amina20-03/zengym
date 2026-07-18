@extends('layouts.app')

@section('content')
    @include('admin.produit.produit')
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
                            title:'{{ __('content.list_produits') }}',
                            titleAttr: 'Copier',
                            className: 'btn btn-app export barras',

                        },

                        {
                            extend:    'excelHtml5',
                            text:      '{{ __('content.excel') }}',
                            title:'{{ __('content.list_produits') }}',
                            titleAttr: 'Excel',
                            className: 'btn btn-app export excel',

                        },

                        {
                            extend:    'print',
                            text:      '{{ __('content.Imprimer') }}',
                            title:'{{ __('content.list_produits') }}',
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

        function check_if_is_integer(){
            var userInput = $('#taux_tva').val();
            if (userInput.includes('.') || userInput.includes(',')) {
                alert("{{ __('content.Le_taux_TVA_ne_doit_pas_contient_un_point_ou_une_virgule') }}");
            }
            else {
                calcul_prix_ttc();
            }

        }
        function calcul_prix_net_ht(){
            var prix_ht = parseInt($('#prix_vente_ht').val()) ;
            var max_remise = parseFloat($('#max_remise').val()) ;
            var prix_vente_net_ht = prix_ht;
            if(max_remise !== 0){
                prix_vente_net_ht = prix_ht - ((prix_ht * max_remise)/100);
            }
            $('#prix_vente_net_ht').val(prix_vente_net_ht);
            calcul_prix_ttc();
        }
        function calcul_prix_ttc(){
            var prix_vente_net_ht = parseFloat($('#prix_vente_net_ht').val()) ;
            var taux_tva = parseInt($('#taux_tva').val()) ;
            var prix_vente_ttc = prix_vente_net_ht + ((prix_vente_net_ht * taux_tva)/100);
            $('#prix_vente_ttc').val(prix_vente_ttc);
        }
    </script>

@endsection
