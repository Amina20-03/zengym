@extends('layouts.app')

@section('content')
    @include('instructeur.vente_abonnement.abonnement.ajouter.ajouter')
@endsection
@section('datatable')
    <script>

        function submit_form(){
            var form = document.getElementById("add_vente_form");
            var submitButton = document.getElementById("submitButton");

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                submitButton.disabled = true;
                $('#add_vente_form').submit();
                setTimeout(function () {
                    submitButton.disabled = false;
                }, 2000); // Adjust the time accordingly
            });
        }
        function remplir_partie_detail(){
            var type_abo_id = $('#type_abo_id').val();
            @for($i=0; $i<count($list_type_abo);$i++)
            if(type_abo_id === '{{$list_type_abo[$i]['id']}}'){
                $('#code_prod_input').val('{{$list_type_abo[$i]['code']}}');
                $('#desc_prod_input').val('{{$list_type_abo[$i]['desc']}}');
                $('#nb_mois_input').val('{{$list_type_abo[$i]['nb_mois']}}');
                $('#prix_ttc_input').val('{{$list_type_abo[$i]['prix_ttc']}}');
                $('#prix_ht_input').val('{{$list_type_abo[$i]['prix_ht']}}');
                $('#taux_tva_input').val('{{$list_type_abo[$i]['taux_tva']}}');
                $('#paiement').val('{{$list_type_abo[$i]['prix_ttc']}}');
            }
            @endfor
            calculate_date_fin();
        }
        function calculate_date_fin(){
            var d = new Date($('#date_deb').val());
            var newDate = new Date(d.setMonth(d.getMonth()+parseInt($('#nb_mois_input').val())));

            $('#date_fin').val(newDate.toLocaleDateString("fr"));
        }
    </script>

@endsection
