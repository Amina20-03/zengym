@extends('layouts.app')

@section('content')
    @include('instructeur.evennement.demande.ajouter.ajouter')
@endsection

@section('datatable')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
$(document).ready(function () {

    const today       = new Date().toISOString().split('T')[0];
    const existingEvents = {!! json_encode($existing_events ?? []) !!};
    const instructeurId  = '{{ session("instructeur_id") }}';
    const calendarEl  = document.getElementById('calendar');
    if (!calendarEl) return;

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'fr',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        height: 500,
        events: existingEvents,

        // Clic sur événement existant → modal détails
        eventClick: function(info) {
            info.jsEvent.preventDefault();
            const p    = info.event.extendedProps;
            const evId = p.ev_id;

            $('#modal_ev_code').text(p.code || '');
            $('#modal_ev_titre').text(p.titre || p.desc || '');
            $('#modal_ev_dates').text((p.date_deb || '') + ' → ' + (p.date_fin || ''));
            $('#modal_ev_heures').text((p.heure_deb || '') + ' → ' + (p.heure_fin || ''));
            $('#modal_ev_salle').text(p.salle || '—');
            $('#modal_ev_frais').text((p.frais || 0) + ' ' + (p.devise || 'DT'));

            let statut = '<span class="badge bg-label-warning">En attente</span>';
            if (p.approuver === true || p.approuver == 1) {
                statut = '<span class="badge bg-label-success">Accepté</span>';
            } else if (p.refuser === true || p.refuser == 1) {
                statut = '<span class="badge bg-label-danger">Refusé</span>';
            }
            $('#modal_ev_statut').html(statut);

            // Pré-remplir formulaire modifier
            $('#mod_titre').val(p.titre || p.desc || '');
            $('#mod_sujet').val(p.sujet || '');
            $('#mod_date_deb').val(p.date_deb || '');
            $('#mod_date_fin').val(p.date_fin || '');
            $('#mod_heure_deb').val(p.heure_deb || '');
            $('#mod_heure_fin').val(p.heure_fin || '');
            $('#mod_frais').val(p.frais || 0);
            $('#mod_devise').val(p.devise || 'DT');
            $('#mod_salle').val(p.salle || '');
            $('#mod_nbr_place_dispo').val(p.nbr_place_dispo || 0);
            $('#mod_affiche_preview').hide();
            $('#form_modifier_event').attr('action', '/instructeur/evennements/demandes/update/' + evId);

            const isOwner    = String(p.instructeur_id) === String(instructeurId);
            const isEnAttente = (p.approuver === null || p.approuver === undefined) && !(p.refuser === true || p.refuser == 1);
            const isRefuse   = p.refuser === true || p.refuser == 1;

            $('#modal_btn_modifier').hide();
            $('#modal_btn_supprimer').hide();

            if (isOwner && isEnAttente) {
                $('#modal_btn_modifier').show();
                $('#modal_btn_supprimer').show();
            } else if (isOwner && isRefuse) {
                $('#modal_btn_supprimer').show();
            }

            $('#form_delete_event').attr('action', '/instructeur/evennements/demandes/delete');
            $('#delete_event_id').val(evId);

            // Réinitialiser vue
            $('#view_detail').show();
            $('#view_modifier').hide();

            // Ouvrir modal
            $('#eventDetailModal').modal('show');
        },

        // Clic date vide → formulaire
        dateClick: function(info) {
            const clickedDate = info.dateStr;
            if (clickedDate < today) {
                alert('Vous ne pouvez pas sélectionner une date passée.');
                return;
            }
            $('#date_deb').val(clickedDate);
            $('#date_fin').val(clickedDate);
            $('#form_section').show();
            document.getElementById('form_section').scrollIntoView({ behavior: 'smooth', block: 'start' });
            const d = new Date(clickedDate + 'T00:00:00');
            $('#selected_date_label').text(
                d.toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' })
            );
        }
    });

    calendar.render();

    // Preview affiche
    $('#afficheInput').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => { $('#affichePreview').attr('src', e.target.result).show(); };
            reader.readAsDataURL(file);
        }
    });

    // Validation formulaire
    $('#formDemande').on('submit', function(e) {
        const hDeb = $('#heure_deb').val();
        const hFin = $('#heure_fin').val();
        if (hDeb && hFin && hDeb >= hFin) {
            e.preventDefault();
            alert('L\'heure de fin doit être après l\'heure de début.');
            return;
        }
        $('#submitBtn').prop('disabled', true)
            .html('<i class="fa fa-spinner fa-spin me-1"></i>Envoi en cours...');
    });

    // DataTable instructeurs
    if ($('#table_instructeurs').length && !$.fn.DataTable.isDataTable('#table_instructeurs')) {
        $('#table_instructeurs').DataTable({
            pageLength: 5,
            language: { search: 'Recherche', zeroRecords: 'Aucun instructeur trouvé' }
        });
    }
});

function showModifierForm() {
    $('#view_detail').hide();
    $('#view_modifier').show();
}
function hideModifierForm() {
    $('#view_detail').show();
    $('#view_modifier').hide();
}
function previewModAffiche(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { $('#mod_affiche_preview').attr('src', e.target.result).show(); };
        reader.readAsDataURL(input.files[0]);
    }
}
function fillTable_instr_id_list() {
    const val = $('input[name="record"]:checked').val();
    if (val) $('#instr_id_list').val(val);
}
function selectInstructeur(row, id) {
    $('input[name="record"]').prop('checked', false);
    $('#table_instructeurs tr').removeClass('table-primary');
    $(row).find('input[name="record"]').prop('checked', true);
    $(row).addClass('table-primary');
    $('#instr_id_list').val(id);
}
</script>
@endsection
