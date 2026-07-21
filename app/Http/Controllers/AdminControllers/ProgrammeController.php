<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Decimal;

class ProgrammeController extends Controller
{
    private function isUnauthenticated($data): bool
    {
        return !$data || ($data['message'] ?? '') === 'Unauthenticated.';
    }

    public function index()
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'programmes');
        // Pas de filtre instructeur_id ici : l'admin voit TOUS les programmes

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('admin.programmes.liste_component', [
            'liste' => $data['liste'] ?? [],
        ]);
    }

    public function create()
    {
        // Récupération de la liste des instructeurs pour le select du formulaire
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'instructeurs');

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('admin.programmes.ajouter_component', [
            'instructeurs' => $data['liste'] ?? [],
        ]);
    }

    public function store(Request $request)
    {
        $client    = new \GuzzleHttp\Client();
        $multipart = [
            ['name' => 'instructeur_id', 'contents' => (string)($request->instructeur_id ?? '')],
            ['name' => 'titre',          'contents' => (string)($request->titre ?? '')],
            ['name' => 'description',    'contents' => (string)($request->description ?? '')],
            ['name' => 'duree_semaines', 'contents' => (string)($request->duree_semaines ?? '')],
            ['name' => 'prix', 'contents' => (string)($request->prix ?? '0')],
            ['name' => 'niveau',         'contents' => (string)($request->niveau ?? '')],
        ];

        if ($request->hasFile('photo')) {
            $f = $request->file('photo');
            $multipart[] = ['name' => 'photo', 'contents' => fopen($f->getRealPath(), 'r'), 'filename' => $f->getClientOriginalName()];
        }

        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $v) {
                $multipart[] = ['name' => 'videos[]', 'contents' => fopen($v->getRealPath(), 'r'), 'filename' => $v->getClientOriginalName()];
            }
        }

        try {
            $guzzle = $client->post(env('API_URL') . 'programmes/add', [
                'headers'   => ['Authorization' => 'Bearer ' . session('TOKEN'), 'Accept' => 'application/json'],
                'multipart' => $multipart,
            ]);
            $data = json_decode($guzzle->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }

        if ($this->isUnauthenticated($data)) return view('auth.login');
        if ($data['status'] ?? false) Session::flash('success', 'Programme créé.');
        else Session::flash('error', $data['message'] ?? 'Erreur.');

        return redirect()->route('admin.programmes.index');
    }
public function index_public()
{
    try {
        $programmes = \App\Models\Programme::select(
            'id', 'titre', 'nom', 'description', 'niveau', 
            'duree_semaines', 'prix', 'photo_url', 'statut'
        )
        ->where('statut', 'actif')
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json([
            'status' => true,
            'programmes' => $programmes
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Erreur serveur',
            'error' => $e->getMessage()
        ], 500);
    }
}
    public function edit($id)
    {
        $responseProgramme = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'programmes/' . $id);

        $data = $responseProgramme->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        // Liste des instructeurs pour permettre de réaffecter le programme si besoin
        $responseInstructeurs = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'instructeurs');

        $dataInstructeurs = $responseInstructeurs->json();

        return view('admin.programmes.modifier_component', [
            'detail'       => $data['detail'] ?? [],
            'videos'       => $data['videos'] ?? [],
            'instructeurs' => $dataInstructeurs['liste'] ?? [],
        ]);
    }

    public function update($id, Request $request)
    {
        $client    = new \GuzzleHttp\Client();
        $multipart = [
            ['name' => 'titre',          'contents' => (string)($request->titre ?? '')],
            ['name' => 'description',    'contents' => (string)($request->description ?? '')],
            ['name' => 'duree_semaines', 'contents' => (string)($request->duree_semaines ?? '')],
            ['name' => 'prix', 'contents' => (int)($request->prix ?? '')],
            ['name' => 'niveau',         'contents' => (string)($request->niveau ?? '')],
            ['name' => 'actif',          'contents' => (string)($request->actif ?? '1')],
        ];

        // Si le formulaire admin permet de changer l'instructeur assigné
        if ($request->filled('instructeur_id')) {
            $multipart[] = ['name' => 'instructeur_id', 'contents' => (string)$request->instructeur_id];
        }

        if ($request->hasFile('photo')) {
            $f = $request->file('photo');
            $multipart[] = ['name' => 'photo', 'contents' => fopen($f->getRealPath(), 'r'), 'filename' => $f->getClientOriginalName()];
        }

        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $v) {
                $multipart[] = ['name' => 'videos[]', 'contents' => fopen($v->getRealPath(), 'r'), 'filename' => $v->getClientOriginalName()];
            }
        }

        try {
            $guzzle = $client->post(env('API_URL') . 'programmes/update/' . $id, [
                'headers'   => ['Authorization' => 'Bearer ' . session('TOKEN'), 'Accept' => 'application/json'],
                'multipart' => $multipart,
            ]);
            $data = json_decode($guzzle->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }

        if ($this->isUnauthenticated($data)) return view('auth.login');
        if ($data['status'] ?? false) Session::flash('success', 'Programme mis à jour.');

        return redirect()->route('admin.programmes.index');
    }

    public function deleteVideo($video_id)
    {
        Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'programmes/video/delete/' . $video_id);

        Session::flash('success', 'Vidéo supprimée.');
        return redirect()->back();
    }

   public function destroy(Request $request)
{
    $id = $request->champ_id;

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . session('TOKEN'),
    ])->get(env('API_URL') . 'programmes/delete/' . $id);

    $data = $response->json();
    if ($data['status'] ?? false) Session::flash('success', 'Programme supprimé.');

    return redirect()->route('admin.programmes.index');
}
}