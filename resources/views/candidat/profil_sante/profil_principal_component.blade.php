@extends('layouts.app')

@section('content')
    @include('candidat.profil_sante.profil_principal')
@endsection

@section('datatable')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
$(document).ready(function() {
    @if(isset($poids_evolution) && count($poids_evolution) >= 1)
    const data = {!! json_encode($poids_evolution) !!};

    const labels = data.map(p => {
        const d = new Date(p.date + 'T00:00:00');
        return d.toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' });
    });

    new Chart(document.getElementById('poidsChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                data:                data.map(p => p.poids),
                borderColor:         '#6a0dad',
                backgroundColor:     'rgba(106,13,173,0.07)',
                borderWidth:         2.5,
                pointBackgroundColor: '#fff',
                pointBorderColor:    '#6a0dad',
                pointBorderWidth:    2.5,
                pointRadius:         5,
                pointHoverRadius:    7,
                fill:                true,
                tension:             0.4,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: ctx => ctx.parsed.y + ' kg'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    grid:  { color: '#f5f0ff' },
                    ticks: { callback: v => v + ' kg', color: '#888', font: { size: 11 } }
                },
                x: {
                    grid:  { display: false },
                    ticks: { color: '#888', font: { size: 11 } }
                }
            }
        }
    });
    @endif
});
</script>
@endsection
