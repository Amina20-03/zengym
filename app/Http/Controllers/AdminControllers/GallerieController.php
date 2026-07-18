<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class GallerieController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'gallerie');

        $data = $response->json();

        if (isset($data['message']) && $data['message'] == 'Unauthenticated.') {
            return view('auth.login');
        }

        $grouped    = $data['status'] ? $data['grouped']    : [];
        $categories = $data['status'] ? $data['categories'] : [];

        return view('admin.gallerie.gallerie_component', compact('grouped', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images'   => 'required|array|min:1',
            'images.*' => 'required|image|max:10240',
            'categ_id' => 'required',
        ]);

        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Accept'        => 'application/json',
        ]);

        // Attacher categ_id
        $http = $http->attach('categ_id', $request->categ_id, '');

        foreach ($request->file('images') as $index => $file) {
            $http = $http->attach(
                'images[]',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            );
            if ($request->titres && isset($request->titres[$index])) {
                $http = $http->attach('titres[]', $request->titres[$index], '');
            }
        }

        $response = $http->post(env('API_URL') . 'gallerie/add');
        $data     = $response->json();

        if ($data['status'] ?? false) {
            return redirect()->route('admin.gallerie.index')
                ->with('success', $data['message'] ?? 'Images ajoutées avec succès.');
        }

        return redirect()->back()->with('error', $data['message'] ?? 'Erreur lors de l\'upload.');
    }

    public function update($id, Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Accept'        => 'application/json',
        ])->post(env('API_URL') . 'gallerie/update/' . $id, [
            'titre'       => $request->titre,
            'description' => $request->description,
            'categ_id'    => $request->categ_id ?: null,
            'ordre'       => $request->ordre,
            'active'      => $request->active,
        ]);

        $data = $response->json();

        if ($data['status'] ?? false) {
            return redirect()->route('admin.gallerie.index')->with('success', 'Image mise à jour.');
        }

        return redirect()->back()->with('error', 'Erreur lors de la mise à jour.');
    }

    public function delete(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Accept'        => 'application/json',
        ])->post(env('API_URL') . 'gallerie/delete', [
            'champ_id' => $request->champ_id,
        ]);

        $data = $response->json();

        if ($data['status'] ?? false) {
            return redirect()->route('admin.gallerie.index')->with('success', 'Image supprimée.');
        }

        return redirect()->back()->with('error', 'Erreur lors de la suppression.');
    }
}
