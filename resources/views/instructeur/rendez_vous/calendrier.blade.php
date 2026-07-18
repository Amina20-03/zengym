<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu', ['menuprincipaleactive' => 'rendez_vous', 'menuactive' => 'rendez_vous'])
        <div class="layout-page">
            @include('layouts.instructeur.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 fw-bold">
                            <i class="fa fa-calendar-check-o me-2 text-primary"></i>Rendez-vous / Planning
                        </h4>
                        <div class="d-flex gap-2 align-items-center small">
                            <span><span style="display:inline-block;width:12px;height:12px;background:#9b59b6;border-radius:3px;"></span> En attente</span>
                            <span><span style="display:inline-block;width:12px;height:12px;background:#28a745;border-radius:3px;"></span> Accepté</span>
                            <span><span style="display:inline-block;width:12px;height:12px;background:#dc3545;border-radius:3px;"></span> Refusé</span>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm" style="border-radius:14px;">
                        <div class="card-body p-3">
                            <div id="calendar"></div>
                        </div>
                    </div>

                </div>
                @include('layouts.footer')
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
</div>

{{-- Modal détail RDV --}}
<div class="modal fade" id="rdvModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="fa fa-calendar me-2 text-primary"></i>Rendez-vous
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img id="rdv_photo" src="" style="width:50px;height:50px;border-radius:50%;object-fit:cover;border:2px solid #6a0dad;display:none;">
                    <div id="rdv_avatar_placeholder" style="width:50px;height:50px;border-radius:50%;background:#f0e6ff;display:flex;align-items:center;justify-content:center;">
                        <i class="fa fa-user text-primary"></i>
                    </div>
                    <div>
                        <div class="fw-bold" id="rdv_candidat"></div>
                        <small class="text-muted" id="rdv_type"></small>
                    </div>
                    <div class="ms-auto" id="rdv_statut_badge"></div>
                </div>
                <table class="table table-sm table-borderless mb-3">
                    <tr><td class="text-muted ps-0">Date</td><td class="fw-semibold" id="rdv_date"></td></tr>
                    <tr><td class="text-muted ps-0">Heure</td><td id="rdv_heures"></td></tr>
                    <tr><td class="text-muted ps-0">Note</td><td id="rdv_note"></td></tr>
                </table>

                {{-- Motif refus (masqué par défaut) --}}
                <div id="section_refus" style="display:none;">
                    <label class="form-label fw-semibold">Motif du refus <small class="text-muted">(optionnel)</small></label>
                    <textarea id="motif_refus" class="form-control" rows="2" placeholder="Expliquer la raison..."></textarea>
                </div>
            </div>
            <div class="modal-footer gap-2" id="rdv_actions">
                {{-- Injecté par JS --}}
            </div>
        </div>
    </div>
</div>
