<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
        ])->get(env('API_URL') . 'programmes', [
            'instructeur_id' => session('instructeur_id'),
        ]);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('instructeur.programmes.liste_component', [
            'liste' => $data['liste'] ?? [],
        ]);
    }
/*
    public function create()
    {
        return view('instructeur.programmes.ajouter_component');
    }

    public function store(Request $request)
    {
        $client    = new \GuzzleHttp\Client();
        $multipart = [
            ['name' => 'instructeur_id', 'contents' => (string)(session('instructeur_id') ?? '')],
            ['name' => 'titre',          'contents' => (string)($request->titre ?? '')],
            ['name' => 'description',    'contents' => (string)($request->description ?? '')],
            ['name' => 'duree_semaines', 'contents' => (string)($request->duree_semaines ?? '')],
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

        return redirect()->route('instructeur.programmes.index');
    }

    public function edit($id)
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'programmes/' . $id);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('instructeur.programmes.modifier_component', [
            'detail' => $data['detail'] ?? [],
            'videos' => $data['videos'] ?? [],
        ]);
    }

    public function update($id, Request $request)
    {
        $client    = new \GuzzleHttp\Client();
        $multipart = [
            ['name' => 'titre',          'contents' => (string)($request->titre ?? '')],
            ['name' => 'description',    'contents' => (string)($request->description ?? '')],
            ['name' => 'duree_semaines', 'contents' => (string)($request->duree_semaines ?? '')],
            ['name' => 'niveau',         'contents' => (string)($request->niveau ?? '')],
            ['name' => 'actif',          'contents' => (string)($request->actif ?? '1')],
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

        return redirect()->route('instructeur.programmes.index');
    }

    public function deleteVideo($video_id)
    {
        Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'programmes/video/delete/' . $video_id);

        Session::flash('success', 'Vidéo supprimée.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'programmes/delete/' . $id);

        $data = $response->json();
        if ($data['status'] ?? false) Session::flash('success', 'Programme supprimé.');

        return redirect()->route('instructeur.programmes.index');
    }
}
*/
public function show($id)
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'programmes/' . $id);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('instructeur.programmes.details_component', [
            'detail' => $data['detail'] ?? [],
            'videos' => $data['videos'] ?? [],
        ]);
    }
}