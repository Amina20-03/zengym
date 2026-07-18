<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ArticleCategorieController extends Controller
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
        ])->get(env('API_URL') . 'article_categories');

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('admin.parametrage.article_categories.article_categories_component', [
            'liste' => $data['liste'] ?? [],
        ]);
    }

    public function add(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'article_categories/add', [
            'desc' => $request->desc,
        ]);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');
        if ($data['status'] ?? false) Session::flash('success', 'Catégorie ajoutée.');

        return redirect()->route('admin.article_categories.index');
    }

    public function edit($id)
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'article_categories/edit/' . $id);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');

        return view('admin.parametrage.article_categories.modifier.modifier_component', [
            'detail' => $data['detail'] ?? [],
        ]);
    }

    public function update($id, Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'article_categories/update/' . $id, [
            'desc' => $request->desc,
        ]);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');
        if ($data['status'] ?? false) Session::flash('success', 'Catégorie mise à jour.');

        return redirect()->route('admin.article_categories.index');
    }

    public function delete(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'article_categories/delete', [
            'champ_id' => $request->champ_id,
        ]);

        $data = $response->json();
        if ($this->isUnauthenticated($data)) return view('auth.login');
        if ($data['status'] ?? false) Session::flash('success', 'Catégorie supprimée.');

        return redirect()->route('admin.article_categories.index');
    }
}
