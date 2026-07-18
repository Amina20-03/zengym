@extends('layouts.app')

@section('content')
    @include('admin.produit.modifier.modifier')
@endsection
@section('datatable')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("editUserForm");
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
                $('#editUserForm').submit();
                setTimeout(function () {
                    console.log("Function completed");
                }, 2000);
            }
        });
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
