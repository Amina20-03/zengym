<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CandidatController extends Controller
{
    public function index_candidat(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidats');

        $data = $response->json();

        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                        $list_cat = $data['list_cat'];
                        $list_salle_sport = $data['list_salle_sport'];
                    }
                    return view('instructeur.candidat.candidat_component',
                        [
                            'liste' => $liste,
                            'list_cat' => $list_cat,
                            'list_salle_sport' => $list_salle_sport,
                        ]);
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                    $list_cat = $data['list_cat'];
                    $list_salle_sport = $data['list_salle_sport'];
                }
                return view('instructeur.candidat.candidat_component',
                    [
                        'liste' => $liste,
                        'list_cat' => $list_cat,
                        'list_salle_sport' => $list_salle_sport,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }





    }
    public function add_candidat(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/add', [
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'tel1'=>$request->tel1,
            'tel2'=>$request->tel2,
            'email'=>$request->email,
            'adr'=>$request->adr,
            'cp'=>$request->cp,
            'mt_affiliation'=>$request->mt_affiliation,
            'categ_candidat_id'=>$request->categ_candidat_id,
            'salle_sport_id'=>$request->salle_sport_id,
            'instructeur_id'=>session('instructeur_id'),

        ]);
        $data = $response->json();

        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Ajout_terminée') );
                    }
                    return redirect()->route('instructeur.candidat.index');
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->route('instructeur.candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function show_candidat($id){
        $response = Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'candidats/' . $id);

        $data = $response->json();
        if (!$data || ($data['message'] ?? '') === 'Unauthenticated.') {
            return view('auth.login');
        }

        if (!$response->successful()) {
            return redirect()->back()->with('error', 'Candidat introuvable.');
        }

        return view('instructeur.candidat.fiche.fiche_component', [
            'detail'          => $data['detail'][0]   ?? [],
            'cat'             => $data['cat']          ?? '',
            'salle_sport'     => $data['salle_sport']  ?? '',
            'instructeur'     => $data['instructeur']  ?? '',
        ]);
    }

    public function edit_candidat($id, Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidats/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $detail = $data['detail'];
                        $list_cat = $data['list_cat'];
                        $cat = $data['cat'];
                        $list_salle_sport = $data['list_salle_sport'];
                        $salle_sport = $data['salle_sport'];
                    }
                    return view('instructeur.candidat.modifier.modifier_component',
                        [
                            'detail' => $detail,
                            "list_cat" => $list_cat,
                            "cat" => $cat,
                            "list_salle_sport" => $list_salle_sport,
                            "salle_sport" => $salle_sport,
                        ]);
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }

        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                    $list_cat = $data['list_cat'];
                    $cat = $data['cat'];
                    $list_salle_sport = $data['list_salle_sport'];
                    $salle_sport = $data['salle_sport'];
                }
                return view('instructeur.candidat.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        "list_cat" => $list_cat,
                        "cat" => $cat,
                        "list_salle_sport" => $list_salle_sport,
                        "salle_sport" => $salle_sport,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }

        }

    }
    public function update_candidat($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/update/'.$id, [
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'tel1'=>$request->tel1,
            'tel2'=>$request->tel2,
            'email'=>$request->email,
            'adr'=>$request->adr,
            'cp'=>$request->cp,
            'mt_affiliation'=>$request->mt_affiliation,
            'categ_candidat_id'=>$request->categ_candidat_id,
            'salle_sport_id'=>$request->salle_sport_id,
            'instructeur_id'=>session('instructeur_id'),
        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Modification_terminée') );
                    }
                    return redirect()->route('instructeur.candidat.index');
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('instructeur.candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function delete_candidat(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/delete', [
            'champ_id'=>$request->champ_id,
        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Suppression_terminée') );
                    }
                    return redirect()->route('instructeur.candidat.index');
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Suppression_terminée') );
                }
                return redirect()->route('instructeur.candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
}
