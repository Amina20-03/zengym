<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    private function isUnauthenticated($data): bool
    {
        return is_null($data) || (isset($data['message']) && $data['message'] == 'Unauthenticated.');
    }

    public function index()
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'articles');

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('admin.articles.articles_component', [
            'grouped'    => $data['grouped']    ?? [],
            'categories' => $data['categories'] ?? [],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre'    => 'required|string|max:255',
            'categ_id' => 'required',
            'photo'    => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('photo')) {
            // Envoi multipart avec image
            $file = $request->file('photo');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('TOKEN'),
                'Accept'        => 'application/json',
            ])->attach('photo', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
              ->post(env('API_URL') . 'articles/add', [
                'titre'    => $request->titre,
                'contenu'  => $request->contenu ?? '',
                'categ_id' => $request->categ_id ?? '',
                'ordre'    => $request->ordre ?? 0,
            ]);
        } else {
            // Envoi JSON sans image
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('TOKEN'),
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ])->post(env('API_URL') . 'articles/add', [
                'titre'    => $request->titre,
                'contenu'  => $request->contenu ?? '',
                'categ_id' => $request->categ_id ?? '',
                'ordre'    => $request->ordre ?? 0,
            ]);
        }

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');
        if ($data['status'] ?? false) Session::flash('success', 'Article ajouté.');
        else Session::flash('error', $data['message'] ?? 'Erreur.');

        return redirect()->route('admin.articles.index');
    }

    public function edit($id)
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'articles/edit/' . $id);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        // Récupérer aussi les catégories pour le select
        $cats = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'article_categories')->json();

        return view('admin.articles.modifier.modifier_component', [
            'detail'     => $data['detail']      ?? [],
            'categories' => $cats['liste']        ?? [],
        ]);
    }

    public function update($id, Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('TOKEN'),
                'Accept'        => 'application/json',
            ])->attach('photo', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
              ->post(env('API_URL') . 'articles/update/' . $id, [
                'titre'    => $request->titre   ?? '',
                'contenu'  => $request->contenu ?? '',
                'categ_id' => $request->categ_id ?? '',
                'ordre'    => $request->ordre   ?? 0,
                'active'   => $request->active  ?? 1,
            ]);
        } else {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('TOKEN'),
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ])->post(env('API_URL') . 'articles/update/' . $id, [
                'titre'    => $request->titre   ?? '',
                'contenu'  => $request->contenu ?? '',
                'categ_id' => $request->categ_id ?? '',
                'ordre'    => $request->ordre   ?? 0,
                'active'   => $request->active  ?? 1,
            ]);
        }

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');
        if ($data['status'] ?? false) Session::flash('success', 'Article mis à jour.');

        return redirect()->route('admin.articles.index');
    }

    public function delete(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'articles/delete', [
            'champ_id' => $request->champ_id,
        ]);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');
        if ($data['status'] ?? false) Session::flash('success', 'Article supprimé.');

        return redirect()->route('admin.articles.index');
    }
}
