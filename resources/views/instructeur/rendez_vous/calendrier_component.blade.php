@extends('layouts.app')

@section('content')
    @include('instructeur.rendez_vous.calendrier')
@endsection

@section('datatable')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<script>
$(document).ready(function () {

    const events = {!! json_encode($events ?? []) !!};
    let currentRdvId = null;

    const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'timeGridWeek',
        locale: 'fr',
        headerToolbar: {
            left:   'prev,next today',
            center: 'title',
            right:  'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today:  "Aujourd'hui",
            month:  'Mois',
            week:   'Semaine',
            day:    'Jour',
        },
        slotMinTime: '07:00:00',
        slotMaxTime: '20:00:00',
        allDaySlot: false,
        height: 650,
        events: events,

        eventClick: function(info) {
            const p = info.event.extendedProps;
            currentRdvId = p.id;

            // Photo
            const photo    = $('#rdv_photo');
            const placeholder = $('#rdv_avatar_placeholder');
            if (p.candidat_photo) {
                photo.attr('src', p.candidat_photo).show();
                placeholder.hide();
            } else {
                photo.hide();
                placeholder.show();
            }

            $('#rdv_candidat').text(p.candidat_nom || '');
            $('#rdv_type').text(p.type || '');
            $('#rdv_date').text(formatDate(p.date));
            $('#rdv_heures').text((p.heure_deb || '').substring(0,5) + ' → ' + (p.heure_fin || '').substring(0,5));
            $('#rdv_note').text(p.note || '—');

            // Badge statut
            let badge = '';
            if (p.statut === 'accepte')    badge = '<span class="badge bg-success">✓ Accepté</span>';
            else if (p.statut === 'refuse') badge = '<span class="badge bg-danger">✗ Refusé</span>';
            else                           badge = '<span class="badge bg-label-warning">⏳ En attente</span>';
            $('#rdv_statut_badge').html(badge);

            // Actions selon statut
            const actions = $('#rdv_actions');
            actions.empty();
            $('#section_refus').hide();

            actions.append('<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>');

            if (p.statut === 'en_attente') {
                actions.append(`
                    <button class="btn btn-success" onclick="accepterRdv(${p.id})">
                        <i class="fa fa-check me-1"></i>Accepter
                    </button>
                    <button class="btn btn-outline-danger" onclick="showRefusForm()">
                        <i class="fa fa-times me-1"></i>Refuser
                    </button>
                `);
            }

            // Supprimer toujours disponible
            actions.append(`
                <button class="btn btn-outline-secondary btn-sm ms-auto" onclick="supprimerRdv(${p.id})">
                    <i class="fa fa-trash"></i>
                </button>
            `);

            $('#rdvModal').modal('show');
        }
    });

    calendar.render();

    // Accepter
    window.accepterRdv = function(id) {
        $.post('{{ url("instructeur/rendez-vous/accepter") }}/' + id, {
            _token: '{{ csrf_token() }}'
        }).done(() => { window.location.reload(); });
    };

    // Afficher form refus
    window.showRefusForm = function() {
        $('#section_refus').show();
        const actions = $('#rdv_actions');
        actions.empty();
        actions.append('<button type="button" class="btn btn-outline-secondary" onclick="hideRefusForm()">Annuler</button>');
        actions.append(`
            <button class="btn btn-danger" onclick="refuserRdv(${currentRdvId})">
                <i class="fa fa-times me-1"></i>Confirmer le refus
            </button>
        `);
    };

    window.hideRefusForm = function() {
        $('#section_refus').hide();
        $('#rdv_actions').html(`
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
            <button class="btn btn-success" onclick="accepterRdv(${currentRdvId})">
                <i class="fa fa-check me-1"></i>Accepter
            </button>
            <button class="btn btn-outline-danger" onclick="showRefusForm()">
                <i class="fa fa-times me-1"></i>Refuser
            </button>
        `);
    };

    // Refuser
    window.refuserRdv = function(id) {
        $.post('{{ url("instructeur/rendez-vous/refuser") }}/' + id, {
            _token:       '{{ csrf_token() }}',
            motif_refus:  $('#motif_refus').val(),
        }).done(() => { window.location.reload(); });
    };

    // Supprimer
    window.supprimerRdv = function(id) {
        if (!confirm('Supprimer ce rendez-vous ?')) return;
        window.location.href = '{{ url("instructeur/rendez-vous/delete") }}/' + id;
    };

    function formatDate(dateStr) {
        if (!dateStr) return '';
        const d = new Date(dateStr + 'T00:00:00');
        return d.toLocaleDateString('fr-FR', { weekday:'long', day:'numeric', month:'long', year:'numeric' });
    }
});
</script>
@endsection
