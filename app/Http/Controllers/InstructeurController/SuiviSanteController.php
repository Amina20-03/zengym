<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SuiviSanteController extends Controller
{
    private function isUnauthenticated($data): bool
    {
        return !$data || ($data['message'] ?? '') === 'Unauthenticated.';
    }

    public function profilSanteCandidat($candidat_id)
    {
        $headers = ['Accept' => 'application/json', 'Authorization' => 'Bearer ' . session('TOKEN')];

        $respC = Http::withHeaders($headers)->get(env('API_URL') . 'candidats/' . $candidat_id);
        $dataC = $respC->json();
        if ($this->isUnauthenticated($dataC)) return view('auth.login');

        $respS = Http::withHeaders($headers)->get(env('API_URL') . 'suivi_candidat/' . $candidat_id);
        $dataS = $respS->json();

        return view('instructeur.candidat.profil_sante_candidat.liste_component', [
            'candidat_id' => $candidat_id,
            'candidat'    => $dataC['detail'][0] ?? [],
            'liste'       => $dataS['liste']     ?? [],
        ]);
    }

    public function sendRapportEmail($candidat_id)
    {
        $headers = ['Accept' => 'application/json', 'Authorization' => 'Bearer ' . session('TOKEN')];

        // Infos candidat
        $respC = Http::withHeaders($headers)->get(env('API_URL') . 'candidats/' . $candidat_id);
        $dataC = $respC->json();
        if ($this->isUnauthenticated($dataC)) return view('auth.login');

        $candidat = $dataC['detail'][0] ?? [];
        $email    = $candidat['email'] ?? null;

        if (!$email) {
            Session::flash('error', 'Ce candidat n\'a pas d\'adresse email.');
            return redirect()->route('instructeur.suivi_sante.rapport', $candidat_id);
        }

        // Rapport
        $respR = Http::withHeaders($headers)->get(env('API_URL') . 'suivi_sante/' . $candidat_id . '/rapport');
        $dataR = $respR->json();
        $rapport         = $dataR['rapport']         ?? null;
        $poids_evolution = $dataR['poids_evolution'] ?? [];

        if (!$rapport) {
            Session::flash('error', 'Aucune donnée de suivi pour générer le rapport.');
            return redirect()->route('instructeur.suivi_sante.rapport', $candidat_id);
        }

        $cat         = $dataC['cat'] ?? '';
        $instructeur = session('nom') . ' ' . session('prenom');

        // Construire le HTML de l'email
        $nom    = ($candidat['nom'] ?? '') . ' ' . ($candidat['prenom'] ?? '');
        $periode = \Carbon\Carbon::parse($rapport['periode_debut'])->format('d/m/Y')
                 . ' → '
                 . \Carbon\Carbon::parse($rapport['periode_fin'])->format('d/m/Y');

        $html = "
        <div style='font-family:Arial,sans-serif;max-width:600px;margin:0 auto;'>
            <div style='background:#6a0dad;padding:24px;border-radius:8px 8px 0 0;'>
                <h2 style='color:#fff;margin:0;'>Rapport de suivi santé</h2>
                <p style='color:#e0c0ff;margin:4px 0 0;'>Période : {$periode}</p>
            </div>
            <div style='background:#f9f9f9;padding:24px;'>
                <p>Bonjour <strong>{$nom}</strong>,</p>
                <p>Veuillez trouver ci-dessous votre rapport de suivi santé établi par votre instructeur <strong>{$instructeur}</strong>.</p>

                <table style='width:100%;border-collapse:collapse;margin:16px 0;'>
                    <tr style='background:#6a0dad;color:#fff;'>
                        <th style='padding:10px;text-align:left;' colspan='2'>Résumé</th>
                    </tr>
                    " . ($rapport['poids_initial'] ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Poids initial</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:bold;'>{$rapport['poids_initial']} kg</td></tr>" : "") . "
                    " . ($rapport['poids_actuel']  ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Poids actuel</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:bold;'>{$rapport['poids_actuel']} kg</td></tr>" : "") . "
                    " . ($rapport['perte_poids'] !== null ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Variation</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:bold;color:" . ($rapport['perte_poids'] < 0 ? 'green' : 'red') . ";'>{$rapport['perte_poids']} kg</td></tr>" : "") . "
                    <tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Présence</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:bold;'>{$rapport['taux_presence']}%</td></tr>
                    <tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Séances</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:bold;'>{$rapport['nb_seances']}</td></tr>
                    " . ($rapport['tension_moy']  ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Tension (dernière)</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:bold;'>{$rapport['tension_moy']}</td></tr>" : "") . "
                    " . ($rapport['energie_moy']  ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Énergie moyenne</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:bold;'>{$rapport['energie_moy']}/10</td></tr>" : "") . "
                    " . ($rapport['stress_moy']   ? "<tr><td style='padding:8px;border-bottom:1px solid #eee;color:#666;'>Stress moyen</td><td style='padding:8px;border-bottom:1px solid #eee;font-weight:bold;'>{$rapport['stress_moy']}/10</td></tr>" : "") . "
                </table>

                <p style='color:#666;font-size:13px;margin-top:24px;'>
                    Rapport généré depuis ZenGym Health · <a href='https://zengymhealth.com' style='color:#6a0dad;'>zengymhealth.com</a>
                </p>
            </div>
        </div>";

        try {
            \Illuminate\Support\Facades\Mail::send([], [], function ($message) use ($email, $nom, $html, $instructeur) {
                $message->to($email, $nom)
                        ->subject('Votre rapport de suivi santé — ZenGym')
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'ZenGym'))
                        ->html($html);
            });

            Session::flash('success', "Rapport envoyé par email à {$email}.");
        } catch (\Exception $e) {
            Session::flash('error', 'Erreur d\'envoi : ' . $e->getMessage());
        }

        return redirect()->route('instructeur.suivi_sante.rapport', $candidat_id);
    }

    public function rapport($candidat_id)
    {
        $headers = ['Accept' => 'application/json', 'Authorization' => 'Bearer ' . session('TOKEN')];

        // Infos candidat
        $respC = Http::withHeaders($headers)->get(env('API_URL') . 'candidats/' . $candidat_id);
        $dataC = $respC->json();
        if ($this->isUnauthenticated($dataC)) return view('auth.login');

        // Rapport
        $respR = Http::withHeaders($headers)->get(env('API_URL') . 'suivi_sante/' . $candidat_id . '/rapport');
        $dataR = $respR->json();

        return view('instructeur.candidat.rapport_sante.rapport_component', [
            'candidat_id'     => $candidat_id,
            'candidat'        => $dataC['detail'][0]    ?? [],
            'cat'             => $dataC['cat']           ?? '',
            'rapport'         => $dataR['rapport']       ?? null,
            'poids_evolution' => $dataR['poids_evolution'] ?? [],
        ]);
    }

    public function index($candidat_id)
    {
        // Infos candidat
        $respCandidat = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'candidats/' . $candidat_id);

        $dataC = $respCandidat->json();
        if ($this->isUnauthenticated($dataC)) return view('auth.login');

        // Liste suivi
        $respSuivi = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'suivi_sante/' . $candidat_id);

        $dataS = $respSuivi->json();

        return view('instructeur.candidat.suivi_sante.liste_component', [
            'candidat_id' => $candidat_id,
            'candidat'    => $dataC['detail'][0] ?? [],
            'cat'         => $dataC['cat']        ?? '',
            'liste'       => $dataS['liste']      ?? [],
        ]);
    }

    public function create($candidat_id)
    {
        $resp = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'candidats/' . $candidat_id);

        $data = $resp->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('instructeur.candidat.suivi_sante.ajouter_component', [
            'candidat_id' => $candidat_id,
            'candidat'    => $data['detail'][0] ?? [],
        ]);
    }

    public function store($candidat_id, Request $request)
    {
        $resp = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'suivi_sante/' . $candidat_id . '/add', [
            'date_suivi'          => $request->date_suivi,
            'poids'               => $request->poids,
            'tour_de_taille'      => $request->tour_de_taille,
            'tension_arterielle'  => $request->tension_arterielle,
            'frequence_cardiaque' => $request->frequence_cardiaque,
            'glycemie'            => $request->glycemie,
            'saturation_oxygene'  => $request->saturation_oxygene,
            'niveau_energie'      => $request->niveau_energie,
            'niveau_stress'       => $request->niveau_stress,
            'qualite_sommeil'     => $request->qualite_sommeil,
            'presence'            => $request->presence,
            'commentaire'         => $request->commentaire,
        ]);

        $data = $resp->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        if ($data['status'] ?? false) {
            Session::flash('success', 'Suivi enregistré avec succès.');
        } else {
            Session::flash('error', 'Erreur lors de l\'enregistrement.');
        }

        return redirect()->route('instructeur.suivi_sante.index', $candidat_id);
    }

    public function edit($id)
    {
        $resp = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'suivi_sante/detail/' . $id);

        $data = $resp->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        $suivi       = $data['detail'] ?? [];
        $candidat_id = $suivi['candidat_id'] ?? null;

        $respC = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'candidats/' . $candidat_id);

        $dataC = $respC->json();

        return view('instructeur.candidat.suivi_sante.modifier_component', [
            'suivi'       => $suivi,
            'candidat_id' => $candidat_id,
            'candidat'    => $dataC['detail'][0] ?? [],
        ]);
    }

    public function update($id, Request $request)
    {
        $resp = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'suivi_sante/update/' . $id, [
            'date_suivi'          => $request->date_suivi,
            'poids'               => $request->poids,
            'tour_de_taille'      => $request->tour_de_taille,
            'tension_arterielle'  => $request->tension_arterielle,
            'frequence_cardiaque' => $request->frequence_cardiaque,
            'glycemie'            => $request->glycemie,
            'saturation_oxygene'  => $request->saturation_oxygene,
            'niveau_energie'      => $request->niveau_energie,
            'niveau_stress'       => $request->niveau_stress,
            'qualite_sommeil'     => $request->qualite_sommeil,
            'presence'            => $request->presence,
            'commentaire'         => $request->commentaire,
        ]);

        $data = $resp->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        $candidat_id = $request->candidat_id;
        if ($data['status'] ?? false) {
            Session::flash('success', 'Suivi mis à jour.');
        }

        return redirect()->route('instructeur.suivi_sante.index', $candidat_id);
    }

    public function destroy($id)
    {
        $resp = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'suivi_sante/delete/' . $id);

        $data = $resp->json();
        if ($data['status'] ?? false) {
            Session::flash('success', 'Suivi supprimé.');
        }

        return redirect()->back();
    }
}
