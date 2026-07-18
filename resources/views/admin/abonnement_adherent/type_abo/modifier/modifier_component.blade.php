@extends('layouts.app')

@section('content')
    @include('admin.abonnement_adherent.type_abo.modifier.modifier')
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
        function calcul_total_ttc(){

            var total_ttc = parseFloat($('#prix_ht').val()) + ( (parseFloat($('#prix_ht').val()) * parseInt($('#taux_tva').val()))/100 );

            $('#prix_ttc').val(total_ttc.toFixed(3)+"");


        }
    </script>

@endsection
