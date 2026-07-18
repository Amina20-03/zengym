<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CategorieMediaController extends Controller
{
    // -------------------------------------------------------------------------
    // Helper : vérifie si la session est expirée
    // -------------------------------------------------------------------------
    private function isUnauthenticated($data): bool
    {
        return is_null($data) || (isset($data['message']) && $data['message'] == 'Unauthenticated.');
    }

    // =========================================================================
    // PHOTOS
    // =========================================================================

    public function index_cat_photos()
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'categorie_media/photos');

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        $list_cat = $data['list_cat'] ?? [];

        return view('admin.parametrage.categorie_media.photos.categorie_component', [
            'liste' => $list_cat,
        ]);
    }

    public function add_cat_photos(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/photos/add', [
            'desc' => $request->desc,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Ajout_terminée'));
        }

        return redirect()->route('admin.categorie_media.photos.index');
    }

    public function edit_cat_photos($id)
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'categorie_media/photos/edit/' . $id);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        $detail = $data['detail'] ?? [];

        return view('admin.parametrage.categorie_media.photos.modifier.modifier_component', [
            'detail' => $detail,
        ]);
    }

    public function update_cat_photos($id, Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/photos/update/' . $id, [
            'desc' => $request->desc,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Modification_terminée'));
        }

        return redirect()->route('admin.categorie_media.photos.index');
    }

    public function delete_cat_photos(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/photos/delete', [
            'champ_id' => $request->champ_id,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Suppression_terminée'));
        }

        return redirect()->route('admin.categorie_media.photos.index');
    }

    // =========================================================================
    // VIDEOS
    // =========================================================================

    public function index_cat_videos()
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'categorie_media/videos');

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        $list_cat = $data['list_cat'] ?? [];

        return view('admin.parametrage.categorie_media.videos.categorie_component', [
            'liste' => $list_cat,
        ]);
    }

    public function add_cat_videos(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/videos/add', [
            'desc' => $request->desc,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Ajout_terminée'));
        }

        return redirect()->route('admin.categorie_media.videos.index');
    }

    public function edit_cat_videos($id)
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'categorie_media/videos/edit/' . $id);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        $detail = $data['detail'] ?? [];

        return view('admin.parametrage.categorie_media.videos.modifier.modifier_component', [
            'detail' => $detail,
        ]);
    }

    public function update_cat_videos($id, Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/videos/update/' . $id, [
            'desc' => $request->desc,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Modification_terminée'));
        }

        return redirect()->route('admin.categorie_media.videos.index');
    }

    public function delete_cat_videos(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/videos/delete', [
            'champ_id' => $request->champ_id,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Suppression_terminée'));
        }

        return redirect()->route('admin.categorie_media.videos.index');
    }

    // =========================================================================
    // DOCUMENTS
    // =========================================================================

    public function index_cat_documents()
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'categorie_media/documents');

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        $list_cat = $data['list_cat'] ?? [];

        return view('admin.parametrage.categorie_media.documents.categorie_component', [
            'liste' => $list_cat,
        ]);
    }

    public function add_cat_documents(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/documents/add', [
            'desc' => $request->desc,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Ajout_terminée'));
        }

        return redirect()->route('admin.categorie_media.documents.index');
    }

    public function edit_cat_documents($id)
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'categorie_media/documents/edit/' . $id);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        $detail = $data['detail'] ?? [];

        return view('admin.parametrage.categorie_media.documents.modifier.modifier_component', [
            'detail' => $detail,
        ]);
    }

    public function update_cat_documents($id, Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/documents/update/' . $id, [
            'desc' => $request->desc,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Modification_terminée'));
        }

        return redirect()->route('admin.categorie_media.documents.index');
    }

    public function delete_cat_documents(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type'  => 'application/json',
        ])->post(env('API_URL') . 'categorie_media/documents/delete', [
            'champ_id' => $request->champ_id,
        ]);

        $data = $response->json();

        if ($this->isUnauthenticated($data)) {
            return view('auth.login');
        }

        if ($data['status'] ?? false) {
            Session::flash('success', __('content.Suppression_terminée'));
        }

        return redirect()->route('admin.categorie_media.documents.index');
    }
}
