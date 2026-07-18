<?php

namespace App\Http\Controllers\CandidatControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProgrammeController extends Controller
{
    public function index()
    {
        $candidat_id = session('candidat_id');

        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'candidat_programmes/' . $candidat_id);

        $data = $response->json();

        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') {
            return view('auth.login');
        }

        return view('candidat.programmes.liste_component', [
            'liste' => $data['liste'] ?? [],
        ]);
    }

    public function show($id)
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'programmes/' . $id);

        $data = $response->json();

        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') {
            return view('auth.login');
        }

        return view('candidat.programmes.detail_component', [
            'detail' => $data['detail'] ?? [],
            'videos' => $data['videos'] ?? [],
        ]);
    }
}
