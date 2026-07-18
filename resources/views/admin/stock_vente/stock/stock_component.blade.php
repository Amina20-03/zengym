@extends('layouts.app')

@section('content')
    @include('admin.stock_vente.stock.stock')
@endsection
@section('datatable')
    <script>

        $(document).ready(function() {
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
                            title:'{{ __('content.Liste_stock') }}',
                            titleAttr: 'Copier',
                            className: 'btn btn-app export barras',

                        },

                        {
                            extend:    'excelHtml5',
                            text:      '{{ __('content.excel') }}',
                            title:'{{ __('content.Liste_stock') }}',
                            titleAttr: 'Excel',
                            className: 'btn btn-app export excel',

                        },

                        {
                            extend:    'print',
                            text:      '{{ __('content.Imprimer') }}',
                            title:'{{ __('content.Liste_stock') }}',
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
