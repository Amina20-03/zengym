<?php

namespace App\Http\Controllers\CandidatControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProfilSanteController extends Controller
{
    private function headers(): array
    {
        return [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ];
    }

    public function index()
    {
        $candidat_id = session('candidat_id');

        // Infos candidat
        $respC = Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'candidats/' . $candidat_id);
        $dataC = $respC->json();
        if (!$dataC || ($dataC['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        // Suivis
        $response = Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'suivi_candidat/' . $candidat_id);
        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        $liste  = $data['liste'] ?? [];
        $dernier = count($liste) > 0 ? $liste[0] : null;

        // Évolution poids (ordre chronologique pour le graphique)
        $poids_evolution = collect($liste)
            ->filter(fn($s) => !empty($s['poids']) && $s['poids'] > 0)
            ->sortBy('date_suivi')
            ->map(fn($s) => ['date' => $s['date_suivi'], 'poids' => (float)$s['poids']])
            ->values()->toArray();

        $poids_initial = count($poids_evolution) > 0 ? $poids_evolution[0]['poids'] : null;
        $poids_actuel  = count($poids_evolution) > 0 ? end($poids_evolution)['poids'] : null;

        return view('candidat.profil_sante.profil_principal_component', [
            'candidat'        => $dataC['detail'][0] ?? [],
            'dernier'         => $dernier,
            'poids_evolution' => $poids_evolution,
            'poids_initial'   => $poids_initial,
            'poids_actuel'    => $poids_actuel,
            'candidat_id'     => $candidat_id,
        ]);
    }

    public function historique()
    {
        $candidat_id = session('candidat_id');
        $response = Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'suivi_candidat/' . $candidat_id);
        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        return view('candidat.profil_sante.liste_component', [
            'liste'       => $data['liste'] ?? [],
            'candidat_id' => $candidat_id,
        ]);
    }

    public function create()
    {
        return view('candidat.profil_sante.ajouter_component');
    }

    public function store(Request $request)
    {
        $candidat_id = session('candidat_id');

        $response = Http::withHeaders(array_merge($this->headers(), ['Content-Type' => 'application/json']))
            ->post(env('API_URL') . 'suivi_candidat/' . $candidat_id . '/add', [
                'date_suivi'          => $request->date_suivi,
                'poids'               => $request->poids,
                'taille'              => $request->taille,
                'glycemie'            => $request->glycemie,
                'tension_arterielle'  => $request->tension_arterielle,
                'frequence_cardiaque' => $request->frequence_cardiaque,
                'niveau_stress'       => $request->niveau_stress,
                'objectifs'           => $request->objectifs,
                'progression'         => $request->progression,
                'notes'               => $request->notes,
            ]);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        if ($data['status'] ?? false) {
            Session::flash('success', 'Suivi enregistré.' . (!empty($data['imc']) ? ' IMC calculé : ' . $data['imc'] : ''));
        }

        return redirect()->route('candidat.profil_sante.index');
    }

    public function edit($id)
    {
        $response = Http::withHeaders($this->headers())
            ->get(env('API_URL') . 'suivi_candidat/detail/' . $id);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        return view('candidat.profil_sante.modifier_component', [
            'detail' => $data['detail'] ?? [],
        ]);
    }

    public function update($id, Request $request)
    {
        $response = Http::withHeaders(array_merge($this->headers(), ['Content-Type' => 'application/json']))
            ->post(env('API_URL') . 'suivi_candidat/update/' . $id, [
                'date_suivi'          => $request->date_suivi,
                'poids'               => $request->poids,
                'taille'              => $request->taille,
                'glycemie'            => $request->glycemie,
                'tension_arterielle'  => $request->tension_arterielle,
                'frequence_cardiaque' => $request->frequence_cardiaque,
                'niveau_stress'       => $request->niveau_stress,
                'objectifs'           => $request->objectifs,
                'progression'         => $request->progression,
                'notes'               => $request->notes,
            ]);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') return view('auth.login');

        if ($data['status'] ?? false) Session::flash('success', 'Suivi mis à jour.');

        return redirect()->route('candidat.profil_sante.index');
    }

    public function destroy($id)
    {
        Http::withHeaders($this->headers())->get(env('API_URL') . 'suivi_candidat/delete/' . $id);
        Session::flash('success', 'Suivi supprimé.');
        return redirect()->route('candidat.profil_sante.index');
    }
}
