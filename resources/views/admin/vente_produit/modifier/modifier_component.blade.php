@extends('layouts.app')

@section('content')
    @include('admin.vente_produit.modifier.modifier')
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
        function remplir_list_produit(){
            var dynamicSelect = document.getElementById("prod_id");
            var id_categorie = $('#cat_prod_id').val();
            dynamicSelect.options.length = 0;
            @for($i=0; $i<count($list_prod);$i++)
            if(id_categorie === '{{$list_prod[$i]['categ_produit_id']}}'){
                var option = document.createElement("option");
                option.value = '{{$list_prod[$i]['id']}}';
                option.text = '{{$list_prod[$i]['code']}} | {{$list_prod[$i]['desc']}}';
                dynamicSelect.add(option);
            }
            @endfor
            remplir_partie_detail();
        }
        function remplir_partie_detail(){
            var id_prod = $('#prod_id').val();
            @for($i=0; $i<count($list_prod);$i++)
            if(id_prod === '{{$list_prod[$i]['id']}}'){
                $('#code_prod_input').val('{{$list_prod[$i]['code']}}');
                $('#desc_prod_input').val('{{$list_prod[$i]['desc']}}');
                $('#pu_prod_input').val('{{$list_prod[$i]['prix_vente_ttc']}}');
                $('#id_prod_input').val('{{$list_prod[$i]['id']}}');
                $('#prix_vente_ht_input').val('{{$list_prod[$i]['prix_vente_ht']}}');
                $('#taux_tva_input').val('{{$list_prod[$i]['taux_tva']}}');
            }
            @endfor

        }
        function add_ligne_table_prod() {
            var id = $('#id_prod_input').val();
            var code = $('#code_prod_input').val();
            var designation = $('#desc_prod_input').val();
            var qte = $('#qte_prod_input').val();
            var pu = $('#pu_prod_input').val();
            var prix_vente_ht = $('#prix_vente_ht_input').val();
            var taux_tva = $('#taux_tva_input').val();
            var total_ttc = (parseFloat(prix_vente_ht)*parseInt(qte)) + ( ((parseFloat(prix_vente_ht)*parseInt(qte)) * parseInt(taux_tva))/100 );
            fillTable(id,code,designation,qte,pu,prix_vente_ht,taux_tva,total_ttc);
        }
        function getTdCount() {
            var allTdElements = document.querySelectorAll('#table_prod tbody td');
            var tdCount = allTdElements.length;
            console.log('Total number of td elements:', tdCount);

            return tdCount;
        }
        function occurence_verif(code){
            var occ = false;
            $("#table_prod tbody").find('input[id="code_ligne_entree_table"]').each(function(){
                if($(this).val() === code){
                    occ = true;
                }
            });
            return occ;
        }
        function calcul_punht(IDPROD){

            var input_pu_prod_entree_table = $("#table_prod tbody").find('input[id="pu_prod_entree_table'+IDPROD+'"]');
            var input_remise_table = $("#table_prod tbody").find('input[id="remise_table'+IDPROD+'"]');
            var punht = parseFloat(input_pu_prod_entree_table.val()) - ((parseFloat(input_pu_prod_entree_table.val()) * parseInt(input_remise_table.val()))/100);

            var input_pu_net_ht_table = $("#table_prod tbody").find('input[id="pu_net_ht_table'+IDPROD+'"]');
            input_pu_net_ht_table.val(punht.toFixed(3)+"");

            calcul_total_net_ht(IDPROD);
            calcul_final();
        }
        function calcul_total_net_ht(IDPROD){
            var input_pu_net_ht_table = $("#table_prod tbody").find('input[id="pu_net_ht_table'+IDPROD+'"]');
            var input_qte_entree_table = $("#table_prod tbody").find('input[id="qte_entree_table'+IDPROD+'"]');
            var total_net_ht = parseFloat(input_pu_net_ht_table.val()) * parseInt(input_qte_entree_table.val());

            var input_total_net_ht_table = $("#table_prod tbody").find('input[id="total_net_ht_table'+IDPROD+'"]');
            input_total_net_ht_table.val(total_net_ht.toFixed(3)+"");

            calcul_total_ttc(IDPROD);
            calcul_final();
        }

        function calcul_total_ttc(IDPROD){
            var input_total_net_ht_table = $("#table_prod tbody").find('input[id="total_net_ht_table'+IDPROD+'"]');
            var input_tva_table = $("#table_prod tbody").find('input[id="tva_table'+IDPROD+'"]');
            var total_ttc = parseFloat(input_total_net_ht_table.val()) + ( (parseFloat(input_total_net_ht_table.val()) * parseInt(input_tva_table.val()))/100 );

            var input_tot_ttc_table = $("#table_prod tbody").find('input[id="tot_ttc_table'+IDPROD+'"]');
            input_tot_ttc_table.val(total_ttc.toFixed(3)+"");

            calcul_final();
        }
        function calcul_final(){
            $('#total_net_ht_final').val("0");
            $('#tot_ttc_final').val("0");
            $("#table_prod tbody").find('input[name="total_net_ht_table"]').each(function(){
                $('#total_net_ht_final').val( (parseFloat($('#total_net_ht_final').val())+ parseFloat($(this).val())).toFixed(3));
            });
            $("#table_prod tbody").find('input[name="tot_ttc_table"]').each(function(){
                $('#tot_ttc_final').val((parseFloat($('#tot_ttc_final').val())+parseFloat($(this).val())).toFixed(3));
            });
        }
        function fillTable(id,code,designation,qte,pu,prix_vente_ht,taux_tva,total_ttc) {
            // var table = document.getElementById("table_prod");
            // var rowCount = table.rows.length;
            //
            // // Iterate through each row and remove it
            // for (var i = rowCount - 1; i > 0; i--) {
            //     table.deleteRow(i);
            // }


            var totalCount = getTdCount();
            if(totalCount>0){
                if(occurence_verif(code)){
                    var inputInThirdTd = $("#table_prod tbody").find('input[id="qte_entree_table'+id+'"]');
                    var qteValue = parseInt(inputInThirdTd.val()) + parseInt($('#qte_prod_input').val());
                    inputInThirdTd.val(qteValue+"");

                    // var inputIntotal = $("#table_prod tbody").find('input[id="pu_prod_entree_table'+id+'"]');
                    // var totalValue = parseFloat(inputIntotal.val()) + parseFloat($('#pu_prod_input').val());
                    // inputIntotal.val(totalValue);

                    var inputtot_net_ht = $("#table_prod tbody").find('input[id="total_net_ht_table'+id+'"]');
                    var tot_net_htValue = parseFloat(prix_vente_ht) * parseInt(qteValue);
                    inputtot_net_ht.val(tot_net_htValue);

                    var inputtva = $("#table_prod tbody").find('input[id="tva_table'+id+'"]');

                    var inputtot_ttc = $("#table_prod tbody").find('input[id="tot_ttc_table'+id+'"]');
                    var tot_ttcValue = parseFloat( inputtot_net_ht.val()) + ( (parseFloat( inputtot_net_ht.val()) * parseInt( inputtva.val()))/100 );
                    inputtot_ttc.val(tot_ttcValue);
                }
                else{
                    var IDPROD =document.getElementById("id_prod_input").value;

                    var markup = '<tr>' +
                        ' <td style="text-align:center">' +
                        ' <input type="checkbox" name="record" value="'+IDPROD+'"/> ' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" id="code_ligne_entree_table" name="code_ligne_entree_table" class="form-control" value="'+code+'" readonly/>' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        designation +
                        ' </td>' +

                        ' <td style="text-align:center">' +
                        ' <input type="text" name="qte_entree_table" id="qte_entree_table'+IDPROD+'" class="form-control" onkeyup="calcul_total_net_ht('+IDPROD+')" value="'+qte+'" />' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" value="'+prix_vente_ht+'" name="pu_prod_entree_table" id="pu_prod_entree_table'+IDPROD+'" class="form-control" onkeyup="calcul_punht('+IDPROD+')" />' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" value="0" id="remise_table'+IDPROD+'" name="remise_table" class="form-control" onkeyup="calcul_punht('+IDPROD+')"/>' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" id="pu_net_ht_table'+IDPROD+'" name="pu_net_ht_table" class="form-control" onkeyup="calcul_total_net_ht('+IDPROD+')" value="'+prix_vente_ht+'"/>' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" id="total_net_ht_table'+IDPROD+'" name="total_net_ht_table" onkeyup="calcul_total_ttc('+IDPROD+')" class="form-control" value="'+parseFloat(prix_vente_ht) * parseInt(qte)+'"/>' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" id="tva_table'+IDPROD+'" name="tva_table" onkeyup="calcul_total_ttc('+IDPROD+')" class="form-control" value="'+taux_tva+'"/>' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" id="tot_ttc_table'+IDPROD+'" name="tot_ttc_table" class="form-control" readonly value="'+total_ttc+'" />' +
                        ' </td>' +

                        '</tr>';
                    $("#table_prod tbody").prepend(markup);
                }

            }
            else{
                var IDPROD =document.getElementById("id_prod_input").value;

                var markup = '<tr>' +
                    ' <td style="text-align:center">' +
                    ' <input type="checkbox" name="record" value="'+IDPROD+'"/> ' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" id="code_ligne_entree_table" name="code_ligne_entree_table" class="form-control" value="'+code+'" readonly/>' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    designation +
                    ' </td>' +

                    ' <td style="text-align:center">' +
                    ' <input type="text" name="qte_entree_table" id="qte_entree_table'+IDPROD+'" class="form-control" onkeyup="calcul_total_net_ht('+IDPROD+')" value="'+qte+'"/>' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" value="'+prix_vente_ht+'" name="pu_prod_entree_table" id="pu_prod_entree_table'+IDPROD+'" class="form-control" onkeyup="calcul_punht('+IDPROD+')" />' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" value="0" id="remise_table'+IDPROD+'" name="remise_table" class="form-control" onkeyup="calcul_punht('+IDPROD+')"/>' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" id="pu_net_ht_table'+IDPROD+'" name="pu_net_ht_table" class="form-control" onkeyup="calcul_total_net_ht('+IDPROD+')" value="'+prix_vente_ht+'"/>' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" id="total_net_ht_table'+IDPROD+'" name="total_net_ht_table" onkeyup="calcul_total_ttc('+IDPROD+')" class="form-control" value="'+parseFloat(prix_vente_ht) * parseInt(qte)+'"/>' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" id="tva_table'+IDPROD+'" name="tva_table" onkeyup="calcul_total_ttc('+IDPROD+')" class="form-control" value="'+taux_tva+'"/>' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" id="tot_ttc_table'+IDPROD+'" name="tot_ttc_table" class="form-control" readonly value="'+total_ttc+'"/>' +
                    ' </td>' +
                    '</tr>';
                $("#table_prod tbody").prepend(markup);
            }
            calcul_final();
        }
        function areAnyCheckboxesChecked() {
            // Get all checkboxes in the table
            var checkboxes = document.querySelectorAll('#table_prod input[type="checkbox"]');

            // Check if none of the checkboxes are checked
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    return true; // At least one checkbox is checked
                }
            }
            return false; // No checkboxes are checked
        }
        function removeRow() {
            var checkboxesChecked = areAnyCheckboxesChecked();

            if (!checkboxesChecked) {
                alert("{{ __('content.Veuillez_sélèctionner_une_ligne') }}");
            } else {
                $("#table_prod tbody").find('input[name="record"]').each(function(){
                    if($(this).is(":checked")){
                        $(this).parents("tr").remove();
                    }
                });
                calcul_final();
            }

        }
        function myFunction() {
            $('#qte_list').val("");
            $('#pu_vente_list').val("");
            $('#pu_net_ht_vente_list').val("");
            $('#remise_list').val("");
            $('#prod_id_list').val("");

            $("#table_prod tbody").find('input[name="record"]').each(function(){
                $('#prod_id_list').val($('#prod_id_list').val()+"|"+$(this).val());
            });
            $("#table_prod tbody").find('input[name="qte_entree_table"]').each(function(){
                $('#qte_list').val($('#qte_list').val()+"|"+$(this).val());
            });
            $("#table_prod tbody").find('input[name="pu_net_ht_table"]').each(function(){
                $('#pu_net_ht_vente_list').val($('#pu_net_ht_vente_list').val()+"|"+$(this).val());
            });
            $("#table_prod tbody").find('input[name="pu_prod_entree_table"]').each(function(){
                $('#pu_vente_list').val($('#pu_vente_list').val()+"|"+$(this).val());
            });
            $("#table_prod tbody").find('input[name="remise_table"]').each(function(){
                $('#remise_list').val($('#remise_list').val()+"|"+$(this).val());
            });
            $('#add_vente_form').submit();
            setTimeout(function () {
                console.log("Function completed");
            }, 2000);
        }
        function submit_form(){
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
        }
    </script>

@endsection
