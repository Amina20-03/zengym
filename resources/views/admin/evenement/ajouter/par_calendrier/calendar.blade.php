<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceremony Calendar</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <style>
        /* calendar.css */

        /* General Calendar Styling */
        #calendar {
            max-width: 100%;
            width: 100%; /* Ensure the calendar fills the container */
            height: 100%; /* Ensure the calendar fills the container */
            margin: 0 auto;
            padding: 20px;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Header Styling */
        .fc-header-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .fc-toolbar-title {
            font-size: 24px;
            font-weight: bold;
        }

        .fc-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .fc-button:hover {
            background-color: #0056b3;
        }

        .fc-button:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }

        /* Day Header Styling */
        .fc-col-header-cell {
            background-color: #9ae7f7;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            border-radius: 5px;
        }

        /* Day Cell Styling */
        .fc-daygrid-day {
            background-color: #ffffff;
            border: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .fc-daygrid-day:hover {
            background-color: #f0f8ff;
        }

        .fc-daygrid-day-number {
            font-size: 16px;
            color: #333;
            text-align: center;
            padding: 5px;
        }

        /* Event Styling */
        .fc-event {
            background-color: #28a74;
        }
        .fc-event.solde-true {
            background-color: #007BFF; /* Blue color for solde = true */
            color: white;
            border: none;
        }

        .fc-event.solde-false {
            background-color: #FFA500; /* Orange color for solde = false */
            color: white;
            border: none;
        }
        /* Add custom styles for horizontal scrolling */
        .calendar-container {
            width: 1200px; /* Set a fixed width */
            height: 800px; /* Set a fixed height */
            overflow: hidden; /* Prevent any scrolling */
            margin: 0 auto; /* Center the container */
            background-color: transparent;
        }

        /* Optional: Custom scrollbar */
        .calendar-container::-webkit-scrollbar {
            height: 8px;
        }

        .calendar-container::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .calendar-container::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .calendar-container::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        /* Loader Spinner Styling */
        #loader {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1000;
        }

        .spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/fr.js'></script> <!-- Add French locale -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/ar.js'></script>
</head>
<body>
<!-- Modal to add a new ceremony -->
<div class="modal fade" id="addCeremonyModal" tabindex="-1" aria-labelledby="addCeremonyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCeremonyModalLabel">{{ __('content.add_ceremonies') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCeremonyForm">
                    <div class="mb-3">
                        <label for="startTime" class="form-label">{{ __('content.heure_deb') }}</label>
                        <input type="time" class="form-control" id="startTime" required>
                    </div>
                    <div class="mb-3">
                        <label for="endTime" class="form-label">{{ __('content.heure_fin') }}</label>
                        <input type="time" class="form-control" id="endTime" required>
                    </div>
                    <input type="hidden" id="selectedDate">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('content.annuler') }}</button>
                <button type="button" class="btn btn-primary" onclick="saveCeremony()">{{ __('content.Ajouter') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal to display ceremony details -->
<div class="modal fade" id="ceremonyModal" tabindex="-1" aria-labelledby="ceremonyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        @if(app()->getLocale() === 'ar')
            <div class="modal-content" style="direction: rtl">
                @else
                    <div class="modal-content">
                        @endif

                        <div class="modal-header">
                            <h5 class="modal-title" id="ceremonyModalLabel">{{ __('content.detail_ceremonie') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>{{ __('content.evenement') }}:</strong> <span id="evenement"></span></p>
                            <p><strong>{{ __('content.type_evenement') }}:</strong> <span id="type_evenement"></span></p>
                            <p><strong>{{ __('content.date_deb') }}:</strong> <span id="date_deb"></span></p>
                            <p><strong>{{ __('content.date_fin') }}:</strong> <span id="date_fin"></span></p>
                            <p><strong>{{ __('content.heure_deb') }}:</strong> <span id="ceremonyStartTime"></span></p>
                            <p><strong>{{ __('content.heure_fin') }}:</strong> <span id="ceremonyEndTime"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('content.Annuler') }}</button>
                        </div>
                    </div>
            </div>
    </div>
    <!-- Loader Spinner -->
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <div class="calendar-container">
        <div id='calendar'></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lang = '{{ app()->getLocale() }}';
            var dir = lang === 'ar' ? 'rtl' : 'ltr';

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: lang,
                direction: dir,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [...@json($events), ...@json($holidays)],
                eventClick: function(info) {
                    var event = info.event;
                    var extendedProps = event.extendedProps;

                    // Update modal content with event details
                    $('#ceremonyModalLabel').text(extendedProps.code+' '+extendedProps.desc);
                    $('#evenement').text(extendedProps.code+' '+extendedProps.desc);
                    $('#type_evenement').text(extendedProps.type_desc);
                    $('#date_deb').text(extendedProps.date_deb);
                    $('#date_fin').text(extendedProps.date_fin);
                    $('#ceremonyStartTime').text(event.start ? event.start.toLocaleTimeString() : '');
                    $('#ceremonyEndTime').text(event.end ? event.end.toLocaleTimeString() : '');

                    // Show additional details
            //         $('.modal-body').append(`
            //     <p><strong>Description:</strong> ${extendedProps.desc}</p>
            //     <p><strong>Participants:</strong> ${extendedProps.nbr_participant}</p>
            //     <p><strong>Places disponibles:</strong> ${extendedProps.nbr_place_dispo}</p>
            //     <p><strong>Places restantes:</strong> ${extendedProps.nbr_place_restant}</p>
            // `);

                    // Show the modal
                    var ceremonyModal = new bootstrap.Modal(document.getElementById('ceremonyModal'));
                    ceremonyModal.show();

                    // Clean up when modal is closed
                    $('#ceremonyModal').on('hidden.bs.modal', function() {
                        $('.modal-body p').not(':first, :nth(2), :nth(3), :nth(4), :nth(5), :nth(6)').remove();
                    });
                },
                dateClick: function(info) {
                    $('#selectedDate').val(info.dateStr);
                    $('#addCeremonyModal').modal('show');
                },
                eventDidMount: function(info) {
                    // Custom event styling based on event properties
                    if (info.event.extendedProps.fait) {
                        info.el.style.backgroundColor = '#28a745'; // Green for completed events
                    } else {
                        info.el.style.backgroundColor = '#ffc107'; // Yellow for pending events
                    }
                }
            });

            calendar.render();

            // Hide loader when calendar is ready
            document.getElementById('loader').style.display = 'none';
        });

        function saveCeremony() {
            const startTime = $('#startTime').val();
            const endTime = $('#endTime').val();
            const selectedDate = $('#selectedDate').val();

            if (!startTime || !endTime) {
                alert('Please enter both start and end times');
                return;
            }

            // Set values in parent window and submit form
            window.parent.document.getElementById('date').value = selectedDate;
            window.parent.document.getElementById('heure_deb').value = startTime;
            window.parent.document.getElementById('heure_fin').value = endTime;
            window.parent.document.getElementById('form_1').submit();
        }
    </script>
</body>
</html>
