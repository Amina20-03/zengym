<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CandidatController extends Controller
{
    public function index_categ_candidat(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidats/categories');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                }
                return view('admin.candidat.categ_candidat.categ_candidat_component',
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
    public function add_categ_candidat(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/categories/add', [
            'titre'=>$request->titre,
            'desc'=>$request->desc,
        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->route('admin.categ_candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function edit_categ_candidat($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidats/categories/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                }
                return view('admin.candidat.categ_candidat.modifier.modifier_component',
                    [
                        'detail' => $detail,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function update_categ_candidat($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/categories/update/'.$id, [
            'titre'=>$request->titre,
            'desc'=>$request->desc,
        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.categ_candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }
    public function delete_categ_candidat(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/categories/delete', [
            'champ_id'=>$request->champ_id,
        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Suppression_terminée') );
                }
                return redirect()->route('admin.categ_candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }

    public function index_salle_sport(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidats/salle_de_sports');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                }
                return view('admin.candidat.salle_de_sport.salle_de_sport_component',
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
    public function add_salle_sport(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/salle_de_sports/add', [
            'nom'=>$request->nom,
            'adresse'=>$request->adresse,
            'tel1'=>$request->tel1,
            'tel2'=>$request->tel2,
            'email'=>$request->email,
        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->route('admin.candidat.salle_de_sports.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit_salle_sport($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidats/salle_de_sports/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                }
                return view('admin.candidat.salle_de_sport.modifier.modifier_component',
                    [
                        'detail' => $detail,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function update_salle_sport($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/salle_de_sports/update/'.$id, [
            'nom'=>$request->nom,
            'adresse'=>$request->adresse,
            'tel1'=>$request->tel1,
            'tel2'=>$request->tel2,
            'email'=>$request->email,
        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.candidat.salle_de_sports.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function delete_salle_sport(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidats/salle_de_sports/delete', [
            'champ_id'=>$request->champ_id,
        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Suppression_terminée') );
                }
                return redirect()->route('admin.candidat.salle_de_sports.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }

    public function index_candidat(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidats');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                    $list_instructeurs = $data['list_instructeurs'];
                    $list_cat = $data['list_cat'];
                    $list_salle_sport = $data['list_salle_sport'];
                }
                return view('admin.candidat.candidat_component',
                    [
                        'liste' => $liste,
                        'list_instructeurs' => $list_instructeurs,
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
            'instructeur_id'=>$request->instructeur_id,
            'password'=>$request->password,
        ]);
        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->route('admin.candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit_candidat($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidats/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                    $list_instructeurs = $data['list_instructeurs'];
                    $instructeur = $data['instructeur'];
                    $list_cat = $data['list_cat'];
                    $cat = $data['cat'];
                    $list_salle_sport = $data['list_salle_sport'];
                    $salle_sport = $data['salle_sport'];
                }
                return view('admin.candidat.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        "list_instructeurs" => $list_instructeurs,
                        "instructeur" => $instructeur,
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
            'instructeur_id'=>$request->instructeur_id,
            'password'=>$request->password,
        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.candidat.index');
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
//                dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Suppression_terminée') );
                }
                return redirect()->route('admin.candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function passage_vers_instructeur_form($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'candidat/passage_vers_instructeur/form/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail_user = $data['detail_user'];
                    $list_pays = $data['list_pays'];
                    $list_cat = $data['list_cat'];


                }
                return view('admin.candidat.passage_vers_instructeur.passage_vers_instructeur_component',
                    [
                        'list_pays' => $list_pays,
                        'list_cat' => $list_cat,
                        "detail_user" => $detail_user,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function passage_vers_instructeur($id_user, Request $request){
      
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'candidat/passage_vers_instructeur/'.$id_user, [
            'profession'=>$request->profession,
            'commentaire'=>$request->commentaire,
            'sexe'=>$request->sexe,
            'date_naiss'=>$request->date_naiss,
            'cin'=>$request->cin,
            'pays_id'=>$request->pays_id,
            'categ_instructeur_id'=>$request->categ_instructeur_id,
        ]);

        $data = $response->json();
//                        dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                   // dd($data['instructeur_id']);
                    $data_videos = $data['liste_formation_video'] ?? [];

                    if (count($data_videos) > 0) {
                        foreach ($data_videos as $file) {
                            $string = $file['path'];
                            $parts = explode("/", $string);

                            // Définir le chemin source
                            $sourcePath = 'public/' . $parts[0] . '/' . $parts[1] . '/' . $parts[2] . '/' . $parts[3] . '/' . $parts[4] . '/instructeur/';

                            // Récupérer les fichiers dans le dossier
                            $files = Storage::allFiles($sourcePath);
//                            dd([
//                                'Chemin' => $sourcePath,
//                                'Existe' => Storage::exists($sourcePath),
//                                'Fichiers' => Storage::allFiles($sourcePath),
//                                'Directories' => Storage::directories('public/' . $parts[0] . '/' . $parts[1] . '/' . $parts[2] . '/' . $parts[3]. '/' . $parts[4]  )
//                            ]);
                            if (count($files) > 0) {
                                // Définir le chemin du dossier de destination
                                $destinationPath = 'public/' . $data['instructeur_id'] . '/' . $data['nom'] . '-' . $data['prenom'] . '/videos/';

                                // Vérifier si le dossier existe, sinon le créer
                                if (!Storage::exists($destinationPath)) {
                                    Storage::makeDirectory($destinationPath);
                                }

                                // Déplacer les fichiers
                                foreach ($files as $file) {

                                    // Construire le nouveau chemin
                                    $newPath = str_replace($sourcePath, $destinationPath, $file);

                                    // Déplacer le fichier
                                    Storage::move($file, $newPath);
                                }
                            }
//                              else {
//                                // Afficher le chemin en cas d'erreur ou de dossier vide
//                                dd($sourcePath, Storage::exists($sourcePath));
//
//                            }
                        }
                    }

                    
                    $data_documents = $data['liste_formation_documents'] ?? [];
                    if (count($data_documents)>0) {
                        foreach ($data_documents as $file) {
                            $string = $file['path'];
                            $parts = explode("/", $string);

                            // Définir le chemin source
                            $sourcePath = 'public/' . $parts[0] . '/' . $parts[1] . '/' . $parts[2] . '/' . $parts[3] . '/' . $parts[4] ;

                            // Récupérer les fichiers dans le dossier
                            $files = Storage::allFiles($sourcePath);
//                            dd([
//                                'Chemin' => $sourcePath,
//                                'Existe' => Storage::exists($sourcePath),
//                                'Fichiers' => Storage::allFiles($sourcePath),
//                                'Directories' => Storage::directories('public/' . $parts[0] . '/' . $parts[1] . '/' . $parts[2] . '/' . $parts[3]. '/' . $parts[4]  )
//                            ]);
                            if (count($files) > 0) {
                                // Définir le chemin du dossier de destination
                                $destinationPath = 'public/' . $data['instructeur_id'] . '/' . $data['nom'] . '-' . $data['prenom'] . '/docs/';

                                // Vérifier si le dossier existe, sinon le créer
                                if (!Storage::exists($destinationPath)) {
                                    Storage::makeDirectory($destinationPath);
                                }

                                // Déplacer les fichiers
                                foreach ($files as $file) {
                                    // Construire le nouveau chemin
                                    $newPath = str_replace($sourcePath, $destinationPath, $file);

                                    // Déplacer le fichier
                                    Storage::move($file, $newPath);
                                }
                            }
//                          else {
//                                // Afficher le chemin en cas d'erreur ou de dossier vide
//                                dd($sourcePath, Storage::exists($sourcePath));
//
//                            }


                        }

                    }
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.candidat.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
}
