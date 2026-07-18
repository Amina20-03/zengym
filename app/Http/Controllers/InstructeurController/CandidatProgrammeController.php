<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CandidatProgrammeController extends Controller
{
    private function isUnauthenticated($data): bool
    {
        return !$data || ($data['message'] ?? '') === 'Unauthenticated.';
    }

    public function index($candidat_id)
    {
        $headers = ['Accept' => 'application/json', 'Authorization' => 'Bearer ' . session('TOKEN')];

        // Infos candidat
        $respC = Http::withHeaders($headers)->get(env('API_URL') . 'candidats/' . $candidat_id);
        $dataC = $respC->json();
        if ($this->isUnauthenticated($dataC)) return view('auth.login');

        // Programmes assignés
        $respA = Http::withHeaders($headers)->get(env('API_URL') . 'candidat_programmes/' . $candidat_id);
        $dataA = $respA->json();

        // Programmes disponibles (de l'instructeur, non encore assignés)
        $respD = Http::withHeaders($headers)->get(env('API_URL') . 'candidat_programmes/' . $candidat_id . '/available', [
            'instructeur_id' => session('instructeur_id'),
        ]);
        $dataD = $respD->json();

        return view('instructeur.candidat.programmes.liste_component', [
            'candidat_id'       => $candidat_id,
            'candidat'          => $dataC['detail'][0] ?? [],
            'assigned'          => $dataA['liste']     ?? [],
            'available'         => $dataD['liste']     ?? [],
        ]);
    }

    public function assign($candidat_id, Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'candidat_programmes/' . $candidat_id . '/assign', [
            'programme_id' => $request->programme_id,
            'date_debut'   => $request->date_debut ?? now()->format('Y-m-d'),
            'statut'       => 'en_cours',
        ]);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        if ($data['status'] ?? false) {
            Session::flash('success', 'Programme assigné au candidat.');
        } else {
            Session::flash('error', $data['message'] ?? 'Erreur.');
        }

        return redirect()->route('instructeur.candidat_programmes.index', $candidat_id);
    }

    public function unassign($pivot_id, Request $request)
    {
        $candidat_id = $request->candidat_id;

        Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'candidat_programmes/unassign/' . $pivot_id);

        Session::flash('success', 'Programme retiré.');
        return redirect()->route('instructeur.candidat_programmes.index', $candidat_id);
    }

    public function updateStatut($pivot_id, Request $request)
    {
        $candidat_id = $request->candidat_id;

        Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'candidat_programmes/statut/' . $pivot_id, [
            'statut' => $request->statut,
        ]);

        Session::flash('success', 'Statut mis à jour.');
        return redirect()->route('instructeur.candidat_programmes.index', $candidat_id);
    }
}
