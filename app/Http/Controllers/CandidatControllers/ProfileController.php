<?php

namespace App\Http\Controllers\CandidatControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $candidat_id = session('candidat_id');

        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'candidats/' . $candidat_id);

        $data = $response->json();

        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') {
            return view('auth.login');
        }

        if (!empty($data['detail'][0]['photo'])) {
            Session::put('candidat_photo', $data['detail'][0]['photo']);
        }

        return view('candidat.profile.profile_component', [
            'detail'      => $data['detail'][0]   ?? [],
            'cat'         => $data['cat']          ?? '',
            'salle_sport' => $data['salle_sport']  ?? '',
        ]);
    }

    public function uploadPhoto(Request $request)
    {
        $candidat_id = session('candidat_id');

        if (!$request->hasFile('photo')) {
            return response()->json(['status' => false, 'message' => 'Aucune photo.']);
        }

        $file   = $request->file('photo');
        $client = new \GuzzleHttp\Client();

        try {
            $guzzle = $client->post(env('API_URL') . 'candidats/photo/' . $candidat_id, [
                'headers'   => [
                    'Authorization' => 'Bearer ' . session('TOKEN'),
                    'Accept'        => 'application/json',
                ],
                'multipart' => [[
                    'name'     => 'photo',
                    'contents' => fopen($file->getRealPath(), 'r'),
                    'filename' => $file->getClientOriginalName(),
                ]],
            ]);
            $data = json_decode($guzzle->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }

        if ($data['status'] ?? false) {
            Session::put('candidat_photo', $data['photo'] ?? null);
        }
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $candidat_id = session('candidat_id');

        $passwordValue = $request->filled('password') && strlen(trim($request->password)) >= 8
            ? $request->password
            : null;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'candidats/update/' . $candidat_id, [
            'nom'               => $request->nom,
            'prenom'            => $request->prenom,
            'tel1'              => $request->tel1,
            'tel2'              => $request->tel2,
            'email'             => $request->email,
            'adr'               => $request->adr,
            'cp'                => $request->cp,
            'mt_affiliation'    => $request->mt_affiliation,
            'categ_candidat_id' => $request->categ_candidat_id,
            'salle_sport_id'    => $request->salle_sport_id,
            'instructeur_id'    => $request->instructeur_id,
            'password'          => $passwordValue,
        ]);

        $data = $response->json();

        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::put('nom',    $request->nom);
            Session::put('prenom', $request->prenom);
            Session::put('mail',   $request->email);
            Session::put('tel',    $request->tel1);
            Session::put('login',  $request->email); // mettre à jour le login aussi
            Session::flash('success', 'Profil mis à jour avec succès.');
        } else {
            Session::flash('error', 'Erreur lors de la mise à jour.');
        }

        return redirect()->route('candidat.profile');
    }
}
