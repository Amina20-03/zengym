@extends('layouts.app')

@section('content')
    @include('admin.stock_vente.bon_entre.ajouter.ajouter')
@endsection
@section('datatable')

    <script>
        function calcul_total() {
            var qte = parseInt($('#qte_prod_input').val());
            var pu = parseFloat($('#pu_prod_input').val());
            var total = pu * qte;
            $('#total_prod_input').val(total);

        }
        function updateSum() {
            var inputs = document.getElementsByName("total_ligne_entree_table");
            var sum = 0;

            for (var i = 0; i < inputs.length; i++) {
                sum += parseFloat(inputs[i].value) || 0;
            }

            document.getElementById("total_ttc_be").value = sum;
        }
        function add_ligne_table_prod() {
            var id = $('#id_prod_input').val();
            var code = $('#code_prod_input').val();
            var designation = $('#desc_prod_input').val();
            var qte = $('#qte_prod_input').val();
            var pu = $('#pu_prod_input').val();
            var total = $('#total_prod_input').val();
            fillTable(id,code,designation,qte,pu,total);
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
                updateSum();
            }

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
        function fillTable(id,code,designation,qte,pu,total) {
            // var table = document.getElementById("table_prod");
            // var rowCount = table.rows.length;
            //
            // // Iterate through each row and remove it
            // for (var i = rowCount - 1; i > 0; i--) {
            //     table.deleteRow(i);
            // }
            var qte2 = qte;
            var totalCount = getTdCount();
            if(totalCount>0){
                if(occurence_verif(code)){
                    var inputInThirdTd = $("#table_prod tbody").find('input[id="qte_entree_table'+id+'"]');
                    var qteValue = parseInt(inputInThirdTd.val()) + parseInt($('#qte_prod_input').val());
                    inputInThirdTd.val(qteValue+"");

                    var inputIntotal = $("#table_prod tbody").find('input[id="total_ligne_entree_table'+id+'"]');
                    var totalValue = parseFloat(inputIntotal.val()) + parseFloat($('#total_prod_input').val());
                    inputIntotal.val(totalValue);
                }
                else{
                    var IDPROD =document.getElementById("IDPROD").value;

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
                        ' <input type="text" name="qte_entree_table" id="qte_entree_table'+IDPROD+'" class="form-control" value="'+qte+'" />' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" name="pu_prod_entree_table" id="pu_prod_entree_table" class="form-control" value="'+pu+'" />' +
                        ' </td>' +
                        ' <td style="text-align:center">' +
                        ' <input type="text" id="total_ligne_entree_table'+IDPROD+'" name="total_ligne_entree_table" class="form-control" value="'+total+'" readonly/>' +
                        ' </td>' +

                        '</tr>';
                    $("#table_prod tbody").prepend(markup);
                }

            }
            else{
                var IDPROD =document.getElementById("IDPROD").value;

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
                    ' <input type="text" name="qte_entree_table" id="qte_entree_table'+IDPROD+'" class="form-control" value="'+qte+'" readonly/>' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" name="pu_prod_entree_table" id="pu_prod_entree_table" class="form-control" value="'+pu+'" readonly/>' +
                    ' </td>' +
                    ' <td style="text-align:center">' +
                    ' <input type="text" id="total_ligne_entree_table'+IDPROD+'" name="total_ligne_entree_table" class="form-control" value="'+total+'" readonly/>' +
                    ' </td>' +

                    '</tr>';
                $("#table_prod tbody").prepend(markup);
            }







            updateSum();
        }
        $(document).ready(function() {


        });

        function call_delete_modal(user_id){
            $('#champ_id').val(user_id);
        }
        function myFunction() {
            $('#list_prod_selectionnes').val("");
            $('#list_qe_selectionnes').val("");
            $('#list_pu_selectionnes').val("");
            $('#list_total_selectionnes').val("");

            $("#table_prod tbody").find('input[name="record"]').each(function(){
                $('#list_prod_selectionnes').val($('#list_prod_selectionnes').val()+"|"+$(this).val());
            });
            $("#table_prod tbody").find('input[name="qte_entree_table"]').each(function(){
                $('#list_qe_selectionnes').val($('#list_qe_selectionnes').val()+"|"+$(this).val());
            });
            $("#table_prod tbody").find('input[name="pu_prod_entree_table"]').each(function(){
                $('#list_pu_selectionnes').val($('#list_pu_selectionnes').val()+"|"+$(this).val());
            });
            $("#table_prod tbody").find('input[name="total_ligne_entree_table"]').each(function(){
                $('#list_total_selectionnes').val($('#list_total_selectionnes').val()+"|"+$(this).val());
            });
            if($('#list_prod_selectionnes').val() === ""){
                alert("Veuillez séléctionner au moin un produit!");
            }
            else{
                $('#add_bon_en_form').submit();
            }
            setTimeout(function () {
                console.log("Function completed");
            }, 2000);
        }
        function submit_form(){
            var form = document.getElementById("add_bon_en_form");
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




        function remplir_list_produit(){
            var dynamicSelect = document.getElementById("IDPROD");
            var id_categorie = $('#IDCATEGORIE').val();
            dynamicSelect.options.length = 0;
            @for($i=0; $i<count($liste_produit);$i++)
            if(id_categorie === '{{$liste_produit[$i]['categ_produit_id']}}'){
                var option = document.createElement("option");
                option.value = '{{$liste_produit[$i]['id']}}';
                option.text = '{{$liste_produit[$i]['code']}} | {{$liste_produit[$i]['desc']}}';
                dynamicSelect.add(option);
            }
            @endfor
            remplir_partie_detail();
        }

        function remplir_partie_detail(){
            var id_prod = $('#IDPROD').val();
            @for($i=0; $i<count($liste_produit);$i++)
                if(id_prod === '{{$liste_produit[$i]['id']}}'){
                $('#code_prod_input').val('{{$liste_produit[$i]['code']}}');
                $('#desc_prod_input').val('{{$liste_produit[$i]['desc']}}');
                $('#code_a_barre_prod_input').val('{{$liste_produit[$i]['code_barre']}}');
                $('#id_prod_input').val('{{$liste_produit[$i]['id']}}');
                $('#pu_prod_input').val('{{$liste_produit[$i]['prix_vente_ht']}}');
              //  $('#pu_prod_input').val('$liste_produit[$i]['pu_achat_prod']');
                }
            @endfor
            calcul_total();
        }
    </script>

@endsection
