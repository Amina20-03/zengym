<?php

namespace App\Http\Controllers\CandidatControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
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

    private function getInstructeurId(): ?int
    {
        $candidat_id = session('candidat_id');
        return DB::table('candidats')
            ->where('id', $candidat_id)
            ->value('instructeur_id');
    }

    public function index()
    {
        $candidat_id = session('candidat_id');

        $response = Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'rendez_vous/my', [
                'candidat_id' => $candidat_id,
            ]);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        return view('candidat.rendez_vous.liste_component', [
            'liste'          => $data['liste'] ?? [],
            'instructeur_id' => $this->getInstructeurId(),
        ]);
    }

    public function create()
    {
        $instructeur_id = $this->getInstructeurId();
        if (!$instructeur_id) {
            return redirect()->route('candidat.rdv.index')
                ->with('error', 'Aucun instructeur assigné à votre profil.');
        }

        return view('candidat.rendez_vous.ajouter_component', [
            'instructeur_id' => $instructeur_id,
        ]);
    }

    public function store(Request $request)
    {
        $candidat_id    = session('candidat_id');
        $instructeur_id = $this->getInstructeurId();

        $response = Http::withHeaders(array_merge($this->headers(), ['Content-Type' => 'application/json']))
            ->post(env('API_URL') . 'rendez_vous/add', [
                'candidat_id'    => $candidat_id,
                'instructeur_id' => $instructeur_id,
                'date'           => $request->date,
                'heure_deb'      => $request->heure_deb,
                'heure_fin'      => $request->heure_fin,
                'type'           => $request->type ?? 'Suivi',
                'note'           => $request->note,
            ]);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        if ($response->status() === 409 || !($data['status'] ?? true)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $data['message'] ?? 'Conflit horaire détecté.');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', 'Demande de rendez-vous envoyée à votre instructeur.');
        }

        return redirect()->route('candidat.rdv.index');
    }

    public function destroy($id)
    {
        Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'rendez_vous/delete/' . $id);

        Session::flash('success', 'Rendez-vous supprimé.');
        return redirect()->route('candidat.rdv.index');
    }
}
