@extends('layouts.app')

@section('content')
    @include('admin.stock_vente.bon_entre.bon_entre')
@endsection
@section('datatable')
    <script>
        function fillTable() {

            var table = document.getElementById("table_detail");
            var rowCount = table.rows.length;

            // Iterate through each row and remove it
            for (var i = rowCount - 1; i > 0; i--) {
                table.deleteRow(i);
            }

            $("#table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){


                    @for($i=0; $i<count($liste_ligne_be);$i++)
                    if($(this).val() === '{{$liste_ligne_be[$i]['IDBENTREE']}}'){
                        @php
                            $barcodeGenerator = new Picqer\Barcode\BarcodeGeneratorPNG();
                             $barcodeData = $liste_ligne_be[$i]['code_a_barre']??'0';
                             $barcodePngData = $barcodeGenerator->getBarcode($barcodeData, $barcodeGenerator::TYPE_CODE_128);
                        @endphp
                        var markup = '<tr>' +
                            ' <td style="text-align:center">' +
                            ' {{$liste_ligne_be[$i]['code_prod']}}' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            ' {{$liste_ligne_be[$i]['des_prod']}}' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            ' <img src="data:image/png;base64,{{ base64_encode($barcodePngData) }}" alt="Generated Barcode">' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            ' {{$liste_ligne_be[$i]['qte_entree']}}' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            ' {{$liste_ligne_be[$i]['pu_prod_entree']}}' +
                            ' </td>' +
                            ' <td style="text-align:center">' +
                            ' {{$liste_ligne_be[$i]['total_ligne_entree']}}' +
                            ' </td>' +

                            '</tr>';
                        $("#table_detail tbody").prepend(markup);

                    }
                    @endfor
                }

            });
        }
        $(document).ready(function() {
            $('#table').DataTable(

                {
                    order: [[ 0, "desc" ]],
                    pageLength: 4,
                    lengthMenu: [[4, 20, 30, -1], [4, 20, 30, '{{ __('content.Tous') }}']],
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
                            title:'{{ __('content.Liste_bon_etre') }}',
                            titleAttr: 'Copier',
                            className: 'btn btn-app export barras',

                        },

                        {
                            extend:    'excelHtml5',
                            text:      '{{ __('content.excel') }}',
                            title:'{{ __('content.Liste_bon_etre') }}',
                            titleAttr: 'Excel',
                            className: 'btn btn-app export excel',

                        },

                        {
                            extend:    'print',
                            text:      '{{ __('content.Imprimer') }}',
                            title:'{{ __('content.Liste_bon_etre') }}',
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

    </script>

@endsection
