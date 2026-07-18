<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RendezVousController extends Controller
{
    private function headers(): array
    {
        return [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ];
    }

    public function ficheRdv($candidat_id)
    {
        // Infos candidat
        $respC = Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'candidats/' . $candidat_id);
        $dataC = $respC->json();
        if (!$dataC || ($dataC['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        // RDV du candidat
        $respR = Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'rendez_vous/my', [
                'candidat_id' => $candidat_id,
            ]);
        $dataR = $respR->json();

        return view('instructeur.candidat.fiche_rdv.fiche_rdv_component', [
            'candidat_id' => $candidat_id,
            'candidat'    => $dataC['detail'][0] ?? [],
            'cat'         => $dataC['cat']        ?? '',
            'liste'       => $dataR['liste']      ?? [],
        ]);
    }

    public function index()
    {
        $response = Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'rendez_vous', [
                'instructeur_id' => session('instructeur_id'),
            ]);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        // Formater pour FullCalendar
        $events = [];
        foreach ($data['liste'] ?? [] as $rdv) {
            $color = match($rdv['statut']) {
                'accepte'    => '#28a745',
                'refuse'     => '#dc3545',
                default      => '#9b59b6',  // en_attente
            };
            $events[] = [
                'id'    => $rdv['id'],
                'title' => $rdv['candidat_nom'] . ' — ' . $rdv['type'],
                'start' => $rdv['date'] . 'T' . $rdv['heure_deb'],
                'end'   => $rdv['date'] . 'T' . $rdv['heure_fin'],
                'color' => $color,
                'extendedProps' => $rdv,
            ];
        }

        return view('instructeur.rendez_vous.calendrier_component', [
            'events' => $events,
            'liste'  => $data['liste'] ?? [],
        ]);
    }

    public function accepter($id)
    {
        Http::withHeaders($this->headers())
            ->post(env('API_URL') . 'rendez_vous/accepter/' . $id);

        Session::flash('success', 'Rendez-vous accepté.');
        return redirect()->route('instructeur.rendez_vous.index');
    }

    public function refuser($id, Request $request)
    {
        Http::withHeaders(array_merge($this->headers(), ['Content-Type' => 'application/json']))
            ->post(env('API_URL') . 'rendez_vous/refuser/' . $id, [
                'motif_refus' => $request->motif_refus ?? '',
            ]);

        Session::flash('success', 'Rendez-vous refusé.');
        return redirect()->route('instructeur.rendez_vous.index');
    }

    public function destroy($id)
    {
        Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'rendez_vous/delete/' . $id);

        Session::flash('success', 'Rendez-vous supprimé.');
        return redirect()->route('instructeur.rendez_vous.index');
    }
}
