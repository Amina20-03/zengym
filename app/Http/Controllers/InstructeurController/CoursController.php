<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CoursController extends Controller
{
    public function create_demande(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours/create');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){

                        $list_cat = $data['list_cat'];
                        $instructeurlist = $data['list_instructeurs'];
                    }

                    return view('instructeur.cours.demande.ajouter.ajouter_component',
                        [
                            'list_cat' => $list_cat,
                            'liste' => $instructeurlist,
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
                    $list_cat = $data['list_cat'];
                    $instructeurlist = $data['list_instructeurs'];
                }
                return view('instructeur.cours.demande.ajouter.ajouter_component',
                    [
                        'list_cat' => $list_cat,
                        'liste' => $instructeurlist,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function add_cours(Request $request){
        $enligne = false;
        if($request->enligne == 'on'){
            $enligne = true;
        }
        $data_photos=[];
        $files = $request->file('photo');
        if ($request->hasFile('photo')) {
            foreach ($files as $file) {
                if($file == null){
                    $photo = null;
                }
                else{
                    $path = $file->getRealPath();
                    $logo = file_get_contents($path);
                    $base64 = base64_encode($logo);
                    $photo = $base64;
                    array_push($data_photos,
                        [
                            'photo'=>$photo,
                            'titre'=>$request->libelle,
                            'desc'=>$request->desc,
                            'categ_id'=>$request->categ_cours_id,

                        ]);
                }
            }
        }
        $data_videos=[];
        $files2 = $request->file('video');
        if ($request->hasFile('video')) {
            foreach ($files2 as $file) {
                if($file != null){
                    $path = $file->store('Cours/'.$request->categ_cours_id.'/'.$file->getClientOriginalName(), 'public');
                    array_push($data_videos,
                        [
                            'path'=>$path,
                            'titre'=>$file->getClientOriginalName(),
                            'desc'=>$request->desc,
                            'categ_id'=>$request->categ_cours_id,

                        ]);

                }
            }
        }
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'cours/add', [
            'titre'=>$request->titre,
            'desc'=>$request->desc,
            'emplacement'=>$request->emplacement,
            'devise'=>$request->devise,
            'date'=>$request->date,
            'hdeb'=>$request->hdeb,
            'hfin'=>$request->hfin,
            'sujet'=>$request->sujet,
            'frais'=>$request->frais,
            'categ_cours_id'=>$request->categ_cours_id,
            'approuver'=>false,
            'realiser'=>false,

            'instructeur_id'=>$request->instructeur_id ?? session('instructeur_id'),
            'organisateur_id'=>$request->organisateur_id,
            'data_photos'=>$data_photos,
            'data_videos'=>$data_videos,

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
                    return redirect()->route('instructeur.demande_cours.index');
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
                return redirect()->route('instructeur.demande_cours.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function index_liste_demande(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours/demande');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $liste = $data['liste'];
                    }

                    return view('instructeur.cours.demande.demande_component',
                        [
                            'liste' => $liste,
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
                }
                return view('instructeur.cours.demande.demande_component',
                    [
                        'liste' => $liste,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function index_cours(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours2');

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
                    }
                    return view('instructeur.cours.cours_component',
                        [
                            'liste' => $liste,
                            'list_cat' => $list_cat,
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
                }
                return view('instructeur.cours.cours_component',
                    [
                        'liste' => $liste,
                        'list_cat' => $list_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
public function realiser_cours($id, Request $request){
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . session('TOKEN'),
        'Content-Type' => 'application/json',
    ])->post(env('API_URL').'cours/realiser/'.$id, [
        'realiser'=>true,
    ]);

    $data = $response->json();

    if($data){
        if($data['message'] == 'Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success', __('content.Modification_terminée'));
                }
                return redirect()->route('instructeur.cours.index');
            }
            else {
                dd($response->body());
            }
        }
    }
    else{
        if ($response->successful()) {
            if($data['status']){
                Session::flash('success', __('content.Modification_terminée'));
            }
            return redirect()->route('instructeur.cours.index');
        }
        else {
            dd($response->body());
        }
    }
 



    }
    public function delete_cours(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'cours/delete', [
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
                    return redirect()->route('instructeur.cours.index');
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
                return redirect()->route('instructeur.cours.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit_cours($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours/'.$id);

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
                    }
                    return view('instructeur.cours.demande.modifier.modifier_component',
                        [
                            'detail' => $detail,
                            "list_cat" => $list_cat,
                            "cat" => $cat,

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
                }
                return view('instructeur.cours.demande.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        "list_cat" => $list_cat,
                        "cat" => $cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }

        }

    }
    public function update_cours($id,Request $request){
        $enligne = false;
        if($request->enligne == 'on'){
            $enligne = true;
        }
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/update/'.$id, [
            'date'=>$request->date,
            'heure'=>$request->heure,
            'sujet'=>$request->sujet,
            'frais'=>$request->frais,
            'nbr_place_max'=>$request->nbr_place_max,
            'categ_formation_id'=>$request->categ_formation_id,
            'enligne'=>$enligne,
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
                    return redirect()->route('instructeur.demande_formation.index');
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
                return redirect()->route('instructeur.demande_formation.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
}
