<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function index_formation(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations');

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
                    return view('instructeur.formation.formation_component',
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
                return view('instructeur.formation.formation_component',
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
    public function index_liste_demande(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations/demande');

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

                    return view('instructeur.formation.demande.demande_component',
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
                return view('instructeur.formation.demande.demande_component',
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
    public function delete_formation(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/delete', [
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
                    Session::flash('success',  __('content.Suppression_terminée') );
                }
                return redirect()->route('instructeur.demande_formation.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function create_demande(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations/demande/create');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){

                        $list_cat = $data['list_cat'];
                    }

                    return view('instructeur.formation.demande.ajouter.ajouter_component',
                        [
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
                }
                return view('instructeur.formation.demande.ajouter.ajouter_component',
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
    public function create_demande_media_part(Request $request){
        $photo_principale_old = $request->photo_principale_old;
        if($request->file('photo_principale') == null){
            $photo_principale_old = $request->photo_principale_old;
        }
        else{
            $path = $request->file('photo_principale')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $photo_principale_old = $base64;
        }
        $categ_formation_id = $request->categ_formation_id;
        $titre = $request->titre;
        $sujet = $request->sujet;
        $desc = $request->desc;
        $langue = $request->langue;
        $lieu = $request->lieu;
        $date = $request->date;
        $heure = $request->heure;
        $frais = $request->frais;
        $devise = $request->devise;
        $nbr_place_max = $request->nbr_place_max;
        $contact = $request->contact;
        $enligne = $request->enligne;

        return view('instructeur.formation.demande.ajouter.livretscientifique.livretscientifique_component',
            [
                'photo_principale_old' => $photo_principale_old,
                'categ_formation_id' => $categ_formation_id,
                'titre' => $titre,
                'sujet' => $sujet,
                'desc' => $desc,
                'langue' => $langue,
                'lieu' => $lieu,
                'date' => $date,
                'heure' => $heure,
                'frais' => $frais,
                'devise' => $devise,
                'nbr_place_max' => $nbr_place_max,
                'contact' => $contact,
                'enligne' => $enligne,
            ]);

    }
    public function create_demande_prog_de_formation_part(Request $request){
        $photo_principale_old = $request->photo_principale_old;
        if($request->file('photo_principale') == null){
            $photo_principale_old = $request->photo_principale_old;
        }
        else{
            $path = $request->file('photo_principale')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $photo_principale_old = $base64;
        }
        $categ_formation_id = $request->categ_formation_id;
        $titre = $request->titre;
        $sujet = $request->sujet;
        $desc = $request->desc;
        $langue = $request->langue;
        $lieu = $request->lieu;
        $date = $request->date;
        $heure = $request->heure;
        $frais = $request->frais;
        $devise = $request->devise;
        $nbr_place_max = $request->nbr_place_max;
        $contact = $request->contact;
        $enligne = $request->enligne;
        $path = "";
        try {
            if ($request->hasFile('docs')) {
                $path = $request->file('docs')->store('formations/'.$titre.'/categorie/'.$categ_formation_id.'/livretscientifique', 'public');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return view('instructeur.formation.demande.ajouter.prog_de_formation.prog_de_formation_component',
            [
                'photo_principale_old' => $photo_principale_old,
                'categ_formation_id' => $categ_formation_id,
                'titre' => $titre,
                'sujet' => $sujet,
                'desc' => $desc,
                'langue' => $langue,
                'lieu' => $lieu,
                'date' => $date,
                'heure' => $heure,
                'frais' => $frais,
                'devise' => $devise,
                'nbr_place_max' => $nbr_place_max,
                'contact' => $contact,
                'enligne' => $enligne,
                'path_livret_scientifique' => $path
            ]);
    }
    public function create_demande_presentation_power_point_part(Request $request){
        $photo_principale_old = $request->photo_principale_old;
        if($request->file('photo_principale') == null){
            $photo_principale_old = $request->photo_principale_old;
        }
        else{
            $path = $request->file('photo_principale')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $photo_principale_old = $base64;
        }
        $categ_formation_id = $request->categ_formation_id;
        $titre = $request->titre;
        $sujet = $request->sujet;
        $desc = $request->desc;
        $langue = $request->langue;
        $lieu = $request->lieu;
        $date = $request->date;
        $heure = $request->heure;
        $frais = $request->frais;
        $devise = $request->devise;
        $nbr_place_max = $request->nbr_place_max;
        $contact = $request->contact;
        $enligne = $request->enligne;
      
        
        $path = "";
        try {
            if ($request->hasFile('docs')) {
                $path = $request->file('docs')->store('formations/'.$titre.'/categorie/'.$categ_formation_id.'/livretscientifique', 'public');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return view('instructeur.formation.demande.ajouter.presentation_power_point.presentation_power_point_component',
            [
                'photo_principale_old' => $photo_principale_old,
                'categ_formation_id' => $categ_formation_id,
                'titre' => $titre,
                'sujet' => $sujet,
                'desc' => $desc,
                'langue' => $langue,
                'lieu' => $lieu,
                'date' => $date,
                'heure' => $heure,
                'frais' => $frais,
                'devise' => $devise,
                'nbr_place_max' => $nbr_place_max,
                'contact' => $contact,
                'enligne' => $enligne,
                'path_livret_scientifique' => $path
            ]);
    }
    public function create_demande_video_basic_one_part(Request $request){
        $photo_principale_old = $request->photo_principale_old;
        if($request->file('photo_principale') == null){
            $photo_principale_old = $request->photo_principale_old;
        }
        else{
            $path = $request->file('photo_principale')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $photo_principale_old = $base64;
        }
        $categ_formation_id = $request->categ_formation_id;
        $titre = $request->titre;
        $sujet = $request->sujet;
        $desc = $request->desc;
        $langue = $request->langue;
        $lieu = $request->lieu;
        $date = $request->date;
        $heure = $request->heure;
        $frais = $request->frais;
        $devise = $request->devise;
        $nbr_place_max = $request->nbr_place_max;
        $contact = $request->contact;
        $enligne = $request->enligne;
        $path_livret_scientifique = $request->path_livret_scientifique;
        $path = "";
        try {
            if ($request->hasFile('docs')) {
                $path = $request->file('docs')->store('formations/'.$titre.'/categorie/'.$categ_formation_id.'/presentation_power_point', 'public');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return view('instructeur.formation.demande.ajouter.video_basic_one.video_basic_one_component',
            [
                'photo_principale_old' => $photo_principale_old,
                'categ_formation_id' => $categ_formation_id,
                'titre' => $titre,
                'sujet' => $sujet,
                'desc' => $desc,
                'langue' => $langue,
                'lieu' => $lieu,
                'date' => $date,
                'heure' => $heure,
                'frais' => $frais,
                'devise' => $devise,
                'nbr_place_max' => $nbr_place_max,
                'contact' => $contact,
                'enligne' => $enligne,
                'path_presentation_power_point' => $path,
                'path_livret_scientifique' => $path_livret_scientifique
            ]);
    }
    public function add_formation(Request $request){
        $path = "";
        try {
            if ($request->hasFile('docs')) {
                $path = $request->file('docs')->store('formations/'.$request->titre.'/categorie/'.$request->categ_formation_id.'/prog_formation', 'public');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        $enligne = false;
        if($request->enligne == 'on'){
            $enligne = true;
        }
        $photo_principale = $request->photo_principale;
        if($request->file('photo_principale') == null){
            $photo_principale = $request->photo_principale;
        }
        else{
            $path = $request->file('photo_principale')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $photo_principale = $base64;
        }
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/add', [
            'langue'=>$request->langue,
            'titre'=>$request->titre,
            'desc'=>$request->desc,
            'lieu'=>$request->lieu,
            'contact'=>$request->contact,
            'devise'=>$request->devise,
            'date'=>$request->date,
            'heure'=>$request->heure,
            'nbr_participant'=>'0',
            'sujet'=>$request->sujet,
            'frais'=>$request->frais,
            'nbr_place_max'=>$request->nbr_place_max,
            'categ_formation_id'=>$request->categ_formation_id,
            'approuver'=>false,
            'realiser'=>false,
            'instructeur_id'=>session('instructeur_id'),
            'enligne'=>$enligne,
            'photo_principale'=>$photo_principale,
            'path_livret_scientifique' => $request->path_livret_scientifique??"", // Send the array of photos
            'path_presentation_power_point' => $request->path_presentation_power_point??"", // Send the array of photos
            'path_prog_de_formation' => $path??"", // Send the array of photos
            'path_video_basicone' => env('APP_URL').'project/storage/app/public/formations/videobasicone/zen gym basic 1 copyright.mp4', // Send the array of photos
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
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->route('instructeur.demande_formation.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function edit_formation($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formation/'.$id);

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
                    return view('instructeur.formation.demande.modifier.modifier_component',
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
                return view('instructeur.formation.demande.modifier.modifier_component',
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
    public function update_formation($id,Request $request){
        $photo_principale = null;
        if($request->file('photo_principale') != null){
            if($request->file('photo_principale') == null){
                $photo_principale = null;
            }
            else{
                $path = $request->file('photo_principale')->getRealPath();
                $logo = file_get_contents($path);
                $base64 = base64_encode($logo);
                $photo_principale = $base64;
            }
        }
        else{
            if($request->photo_old){
                $photo_principale = $request->photo_old;
            }
        }

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
            'photo_principale'=>$photo_principale,
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
    public function realiser_formation($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/realiser/'.$id, [
            'realiser'=>true,
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
                    return redirect()->route('instructeur.formation.index');
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
                return redirect()->route('instructeur.formation.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function photos_formation($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/photos/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $detail = $data['detail'];
                    }
                    return view('instructeur.formation.photos',
                        [
                            'detail' => $detail[0],
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
                }
                return view('instructeur.formation.photos',
                    [
                        'detail' => $detail[0],
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }

        }

    }
    public function add_photos_formation($id,Request $request){
        $photos = [];

        if ($request->hasFile('gallerie')) {
            foreach ($request->file('gallerie') as $file) {
                $path = $file->getRealPath();
                $imageContent = file_get_contents($path);
                $base64 = base64_encode($imageContent);
                $photos[] = $base64;
            }
        }
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/photos/add/'.$id, [
            'photos'=>$photos,
        ]);
//                                            dd([
//                    'status_code' => $response->status(),
//                    'headers' => $response->headers(),
//                    'body' => $response->body(),
//                    'json' => $response->json(),
//                ]);
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
                    return redirect()->back();
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
                return redirect()->back();
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function delete_photo_formation($id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',

        ])->get(env('API_URL').'formations/photos/delete/'.$id);
//                                            dd([
//                    'status_code' => $response->status(),
//                    'headers' => $response->headers(),
//                    'body' => $response->body(),
//                    'json' => $response->json(),
//                ]);
        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        return redirect()->back();
                    }

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
                    return redirect()->back();
                }

            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }

        }

    }
}
