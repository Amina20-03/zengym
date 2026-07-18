@extends('layouts.app')

@section('content')
    @include('instructeur.candidat.rapport_sante.rapport')
@endsection

@section('datatable')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
$(document).ready(function () {

    @if(isset($poids_evolution) && count($poids_evolution) >= 1)
    const poidsData = {!! json_encode($poids_evolution) !!};
    const labels    = poidsData.map(p => {
        const d = new Date(p.date);
        return d.toLocaleDateString('fr-FR', { day:'numeric', month:'short' });
    });
    const values = poidsData.map(p => p.poids);

    new Chart(document.getElementById('poidsChart'), {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Poids (kg)',
                data: values,
                borderColor: '#6a0dad',
                backgroundColor: 'rgba(106,13,173,0.08)',
                borderWidth: 2.5,
                pointBackgroundColor: '#6a0dad',
                pointRadius: 4,
                fill: true,
                tension: 0.3,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: false,
                    grid: { color: '#f0f0f0' },
                    ticks: { callback: v => v + ' kg' }
                },
                x: { grid: { display: false } }
            }
        }
    });
    @endif
});

function printRapport() {
    window.print();
}

function downloadPdf() {
    const el = document.getElementById('rapport_print');
    const opt = {
        margin:       [10, 10],
        filename:     'rapport_sante_{{ $candidat["nom"] ?? "candidat" }}.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2, useCORS: true },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(el).save();
}
</script>

<style>
@media print {
    .layout-menu, .layout-navbar, .content-backdrop,
    .layout-overlay, nav.breadcrumb, .nav.nav-tabs,
    .btn, footer { display: none !important; }
    .layout-page { margin: 0 !important; }
    #rapport_print { padding: 20px; }
}
</style>
@endsection
