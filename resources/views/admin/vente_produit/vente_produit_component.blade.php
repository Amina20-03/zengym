@extends('layouts.app')

@section('content')
    @include('admin.vente_produit.vente_produit')
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
                $('#addNewUserForm').submit();

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
                            title:'{{ __('content.list_instructeur') }}',
                            titleAttr: 'Copier',
                            className: 'btn btn-app export barras',

                        },

                        {
                            extend:    'excelHtml5',
                            text:      '{{ __('content.excel') }}',
                            title:'{{ __('content.list_instructeur') }}',
                            titleAttr: 'Excel',
                            className: 'btn btn-app export excel',

                        },

                        {
                            extend:    'print',
                            text:      '{{ __('content.Imprimer') }}',
                            title:'{{ __('content.list_instructeur') }}',
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
        function call_ligne_delete_modal(user_id){
            $('#champ_ligne_id').val(user_id);
        }
        function fillTable_ligne_vente() {
            var table1 = document.getElementById("table_ligne_vente");
            var rowCount = table1.rows.length;

            // Iterate through each row and remove it
            for (var i = rowCount - 1; i > 0; i--) {
                table1.deleteRow(i);
            }
            $("#table tbody").find('input[name="record"]').each(function() {
                if ($(this).is(":checked")) {
                    @for($i=0; $i<count($ligne_vente_list);$i++)
                    if ($(this).val() === '{{$ligne_vente_list[$i]['vente_prod_id']}}') {
                        var markup = '<tr>' +
                            ' <td style="text-align:center">' +
                            ' @if($ligne_vente_list[$i]['prod_photo'])' +
                            ' <img src="data:image/jpg;base64,{{$ligne_vente_list[$i]['prod_photo'] }}" alt="" style="width:30px;">' +
                            ' @else' +
                            ' <img src="https://cdn-icons-png.flaticon.com/512/4129/4129528.png" alt="" style="width:30px;">' +
                            ' @endif' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            ' {{$ligne_vente_list[$i]['prod_code']}}' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            '{{$ligne_vente_list[$i]['prod_desc']}}' +
                            ' </td>' +

                            ' <td style="text-align:center">' +
                            '{{$ligne_vente_list[$i]['qte']}}' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            '{{$ligne_vente_list[$i]['pu_vente']}}' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            '{{$ligne_vente_list[$i]['remise']}}' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            '{{$ligne_vente_list[$i]['pu_net_ht_vente']}}' +
                            ' </td>' +

                            ' <td style="text-align:center">' +
                            '<a href="#" class="btn btn-sm btn-icon" onclick="call_ligne_delete_modal({{$ligne_vente_list[$i]['id']}})" data-bs-toggle="modal" data-bs-target="#deleteLigneModal">' +
                            '<img src="https://cdn-icons-png.flaticon.com/512/5496/5496335.png" alt="" style="width:100%;">' +
                            '</a>' +
                            ' </td>' +
                            '</tr>';
                        $("#table_ligne_vente tbody").prepend(markup);
                    }
                    @endfor
                }
            });


        }
    </script>

@endsection
