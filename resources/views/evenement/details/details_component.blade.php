@extends('layouts.app_vitrine')

@section('content')
    @include('evenement.details.details')
@endsection
@section('datatable')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
            // DataTable initialization
            var table = $('#example').DataTable(
                {
                    order: [[ 0, "desc" ]],
                    pageLength:10,
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

                }
            );

            // Custom range filtering function
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    // Date range filter
                    var minDate = $('#minDate').val() ? new Date($('#minDate').val()).getTime() : null;
                    var maxDate = $('#maxDate').val() ? new Date($('#maxDate').val()).getTime() : null;
                    var startDate = new Date(data[0]).getTime(); // Use data for the start date column

                    if ((minDate !== null && startDate < minDate) || (maxDate !== null && startDate > maxDate)) {
                        return false;
                    }

                    // Time range filter
                    var minTime = $('#minTime').val() ? $('#minTime').val() : null;
                    var maxTime = $('#maxTime').val() ? $('#maxTime').val() : null;
                    var startTime = data[1]; // Use data for the start time column

                    if (minTime !== null && startTime < minTime) {
                        return false;
                    }
                    if (maxTime !== null && startTime > maxTime) {
                        return false;
                    }

                    // Price range filter
                    var min_frais = parseFloat($('#min_frais').val());
                    var max_frais = parseFloat($('#max_frais').val());
                    var salary = parseFloat(data[5].replace(/[\$,]/g, '')) || 0; // Use data for the salary column

                    if ((min_frais !== NaN && salary < min_frais) || (max_frais !== NaN && salary > max_frais)) {
                        return false;
                    }

                    return true;


                }
            );

            // Event listener to the two range filtering inputs to redraw on input
            $('#min_frais, #max_frais, #minDate, #maxDate, #minTime, #maxTime').on('change keyup', function() {
                table.draw();
            });



        });

        function call_delete_modal(user_id){
            $('#champ_id').val(user_id);
        }

        function search_photo_by_categ(){
            $('#id_categ_searching').val($('#select2_course_select').val());
            $('#search_photo_form').submit();
        }
    </script>

@endsection
