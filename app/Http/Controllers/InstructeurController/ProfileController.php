<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use App\Models\UserPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index_profile(){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'instructeur/profile/infos');

        $data = $response->json();
        
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $instructeur = $data['instructeur'];
                        $nbr_cours = $data['nbr_cours'];
                        $courslist = $data['courslist'];
                        $nbr_Evennement = $data['nbr_Evennement'];
                        $list_pays = $data['list_pays'];
                        $list_cat = $data['list_cat'];
                        $type_abonnements = $data['type_abonnements'];
                    }
                    return view('instructeur.profile.profile_component',
                        [
                            'instructeur' => $instructeur,
                            'nbr_cours' => $nbr_cours,
                            'courslist' => $courslist,
                            'nbr_Evennement' => $nbr_Evennement,
                            'list_pays' => $list_pays,
                            'list_cat' => $list_cat,
                            'type_abonnements' => $type_abonnements,
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
                    $instructeur = $data['instructeur'];
                    $nbr_cours = $data['nbr_cours'];
                    $courslist = $data['courslist'];
                    $nbr_Evennement = $data['nbr_Evennement'];
                    $list_pays = $data['list_pays'];
                    $list_cat = $data['list_cat'];
                    $type_abonnements = $data['type_abonnements'];
                }
                return view('instructeur.profile.profile_component',
                    [
                        'instructeur' => $instructeur,
                        'nbr_cours' => $nbr_cours,
                        'courslist' => $courslist,
                        'nbr_Evennement' => $nbr_Evennement,
                        'list_pays' => $list_pays,
                        'list_cat' => $list_cat,
                        'type_abonnements' => $type_abonnements,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function edit_info_perso($id,Request $request){
        $photo = null;
        if($request->file('photo') != null){
            if($request->file('photo') == null){
                $photo = null;
            }
            else{
                $path = $request->file('photo')->getRealPath();
                $logo = file_get_contents($path);
                $base64 = base64_encode($logo);
                $photo = $base64;
            }
        }
        else{
            if($request->photo_old){
                $photo = $request->photo_old;
            }
        }



        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur_update/'.$id, [
            'profession'=>$request->profession,
            'commentaire'=>$request->commentaire,
            'sexe'=>$request->sexe,
            'date_naiss'=>$request->date_naiss,
            'photo'=>$photo,
            'cin'=>$request->cin,
            'pays_id'=>$request->pays_id,
            'categ_instructeur_id'=>$request->categ_instructeur_id,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'mail'=>$request->mail,
            'adresse'=>$request->adresse,
            'tel'=>$request->tel,
            'email'=>$request->email,
            'mail_old'=>$request->mail_old,
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
                    return redirect()->route('instructeur.profile');
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }
        else{
            if ($response->successful()) {
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Modification_terminée') );
                    }
                    return redirect()->route('instructeur.profile');
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function update_password($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur_update_password/'.$id, [
            'ancienpassword'=>$request->ancienpassword,
            'password'=>$request->password,
            'conf_password'=>$request->conf_password,

        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __($data['message']) );
                        return redirect()->route('instructeur.profile');
                    }
                    else{
                        Session::flash('error',  __($data['message']) );
                        return redirect()->route('instructeur.profile');
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
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __($data['message']) );
                        return redirect()->route('instructeur.profile');
                    }
                    else{
                        Session::flash('error',  __($data['message']) );
                        return redirect()->route('instructeur.profile');
                    }
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }


    public function index_photo(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'instructeur/profile/photos');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $nbr_photos = $data['nbr_photos'];
                        $list_cat = $data['list_cat'];
                        $liste_photos = $data['liste_photos'];
                        $detail_cat = $data['detail_cat'];
                    }
                    return view('instructeur.profile.photo.photo_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_photos' => $nbr_photos,
                            'liste_photos' => $liste_photos,
                            'detail_cat' => $detail_cat,
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
                    $nbr_photos = $data['nbr_photos'];
                    $list_cat = $data['list_cat'];
                    $liste_photos = $data['liste_photos'];
                    $detail_cat = $data['detail_cat'];
                }
                return view('instructeur.profile.photo.photo_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_photos' => $nbr_photos,
                        'liste_photos' => $liste_photos,
                        'detail_cat' => $detail_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function add_categ(Request $request){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/photos/categorie/add', [
            'lib'=>$request->categ_lib,
            'desc'=>$request->categ_desc,


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
                    return redirect()->route('instructeur.profile.photos');
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
                return redirect()->route('instructeur.profile.photos');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function add_photos(Request $request){
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
                            'categ_id'=>$request->categ_id,

                        ]);
                }
            }
        }



        //dd($data_photos[0]['photo']);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/photos/add', [
            'data_photos'=>$data_photos,
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
                    return redirect()->route('instructeur.profile.photos');
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
                return redirect()->route('instructeur.profile.photos');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function delete_photo(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/photos/delete', [
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
                    return redirect()->route('instructeur.profile.photos');
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
                return redirect()->route('instructeur.profile.photos');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }

    public function search_photo(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/photos/search', [
            'id_categ_searching'=>$request->id_categ_searching,
        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $nbr_photos = $data['nbr_photos'];
                        $list_cat = $data['list_cat'];
                        $liste_photos = $data['liste_photos'];
                        $detail_cat = $data['detail_cat'];
                    }
                    return view('instructeur.profile.photo.photo_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_photos' => $nbr_photos,
                            'liste_photos' => $liste_photos,
                            'detail_cat' => $detail_cat,
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
                    $nbr_photos = $data['nbr_photos'];
                    $list_cat = $data['list_cat'];
                    $liste_photos = $data['liste_photos'];
                    $detail_cat = $data['detail_cat'];
                }
                return view('instructeur.profile.photo.photo_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_photos' => $nbr_photos,
                        'liste_photos' => $liste_photos,
                        'detail_cat' => $detail_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }

    public function index_video(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'instructeur/profile/videos');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $nbr_videos = $data['nbr_videos'];
                        $list_cat = $data['list_cat'];
                        $liste_videos = $data['liste_videos'];
                        $detail_cat = $data['detail_cat'];
                        $detail = $data['detail'];
                    }
                    return view('instructeur.profile.video.video_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_videos' => $nbr_videos,
                            'liste_videos' => $liste_videos,
                            'detail_cat' => $detail_cat,
                            'detail' => $detail,
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
                    $nbr_videos = $data['nbr_videos'];
                    $list_cat = $data['list_cat'];
                    $liste_videos = $data['liste_videos'];
                    $detail_cat = $data['detail_cat'];
                    $detail = $data['detail'];
                }
                return view('instructeur.profile.video.video_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_videos' => $nbr_videos,
                        'liste_videos' => $liste_videos,
                        'detail_cat' => $detail_cat,
                        'detail' => $detail,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function delete_video(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/videos/delete', [
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
                    return redirect()->route('instructeur.profile.videos');
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
                return redirect()->route('instructeur.profile.videos');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function add_categ_video(Request $request){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/photos/categorie/add', [
            'lib'=>$request->categ_lib,
            'desc'=>$request->categ_desc,


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
                    return redirect()->route('instructeur.profile.videos');
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
                return redirect()->route('instructeur.profile.videos');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function add_videos(Request $request){
        $data_videos=[];
        $files = $request->file('video');
        if ($request->hasFile('video')) {
            foreach ($files as $file) {
                if($file != null){
                    $path = $file->store(session('instructeur_id').'/'.session('nom').'-'.session('prenom').'/videos', 'public');
                    array_push($data_videos,
                        [
                            'path'=>$path,
                            'titre'=>$file->getClientOriginalName(),
                            'desc'=>$request->desc,
                            'categ_id'=>$request->categ_id,

                        ]);

                }
            }
        }



        //dd($data_photos[0]['photo']);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/videos/add', [
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
                    return redirect()->route('instructeur.profile.videos');
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
                return redirect()->route('instructeur.profile.videos');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function search_video(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/videos/search', [
            'id_categ_searching'=>$request->id_categ_searching,
        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $nbr_videos = $data['nbr_videos'];
                        $list_cat = $data['list_cat'];
                        $liste_videos = $data['liste_videos'];
                        $detail_cat = $data['detail_cat'];
                    }
                    return view('instructeur.profile.photo.photo_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_videos' => $nbr_videos,
                            'liste_videos' => $liste_videos,
                            'detail_cat' => $detail_cat,
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
                    $nbr_videos = $data['nbr_videos'];
                    $list_cat = $data['list_cat'];
                    $liste_videos = $data['liste_videos'];
                    $detail_cat = $data['detail_cat'];
                }
                return view('instructeur.profile.photo.photo_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_videos' => $nbr_videos,
                        'liste_videos' => $liste_videos,
                        'detail_cat' => $detail_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }

    public function index_playlist(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'instructeur/profile/playlist');

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
                    // Get all files inside playlist folder
                    $files = Storage::files('public/formations/audio/Zengym1');

                    $songs = array_map(function ($file) {
                        return env('APP_URL').'project/storage/app/'.$file;
                    }, $files);

                    $files2 = Storage::files('public/formations/audio/Zengym2');
                    $songs2 = array_map(function ($file2) {
                        return env('APP_URL').'project/storage/app/'.$file2;
                    }, $files2);
                    return view('instructeur.profile.playlist.playlist_component',
                        [

                            'detail' => $detail,
                            'songs' => $songs,
                            'songs2' => $songs2,
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
                $files = Storage::files('public/formations/audio/Zengym1');
                $songs = array_map(function ($file) {
                    return asset(str_replace('public/', 'storage/', $file));
                }, $files);

                $files2 = Storage::files('public/formations/audio/Zengym2');
                $songs2 = array_map(function ($file2) {
                    return env('APP_URL').'project/storage/app/'.$file2;
                }, $files2);
                return view('instructeur.profile.playlist.playlist_component',
                    [

                        'detail' => $detail,
                        'songs' => $songs,
                        'songs2' => $songs2,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }

    public function index_doc(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'instructeur/profile/documents');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $nbr_docs = $data['nbr_docs'];
                        $list_cat = $data['list_cat'];
                        $liste_docs = $data['liste_docs'];
                        $detail_cat = $data['detail_cat'];
                        $detail = $data['detail'];
                    }
                    return view('instructeur.profile.document.document_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_docs' => $nbr_docs,
                            'liste_docs' => $liste_docs,
                            'detail_cat' => $detail_cat,
                            'detail' => $detail,
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
                    $nbr_docs = $data['nbr_docs'];
                    $list_cat = $data['list_cat'];
                    $liste_docs = $data['liste_docs'];
                    $detail_cat = $data['detail_cat'];
                    $detail = $data['detail'];
                }
                return view('instructeur.profile.document.document_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_docs' => $nbr_docs,
                        'liste_docs' => $liste_docs,
                        'detail_cat' => $detail_cat,
                        'detail' => $detail,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function delete_doc(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/documents/delete', [
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
                    return redirect()->route('instructeur.profile.docs');
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
                return redirect()->route('instructeur.profile.docs');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function add_categ_doc(Request $request){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/documents/categorie/add', [
            'lib'=>$request->categ_lib,
            'desc'=>$request->categ_desc,


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
                    return redirect()->route('instructeur.profile.docs');
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
                return redirect()->route('instructeur.profile.docs');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function add_docs(Request $request){
        $data_docs=[];
        $files = $request->file('doc');
        if ($request->hasFile('doc')) {
            foreach ($files as $file) {
                if($file != null){
                    $path = $file->store(session('instructeur_id').'/'.session('nom').'-'.session('prenom').'/docs', 'public');
                    array_push($data_docs,
                        [
                            'path'=>$path,
                            'titre'=>$file->getClientOriginalName(),
                            'desc'=>$request->desc,
                            'categ_id'=>$request->categ_id,

                        ]);

                }
            }
        }



        //dd($data_photos[0]['photo']);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/documents/add', [
            'data_docs'=>$data_docs,
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
                    return redirect()->route('instructeur.profile.docs');
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
                return redirect()->route('instructeur.profile.docs');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function search_doc(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur/profile/documents/search', [
            'id_categ_searching'=>$request->id_categ_searching,
        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $nbr_docs = $data['nbr_docs'];
                        $list_cat = $data['list_cat'];
                        $liste_docs = $data['liste_docs'];
                        $detail_cat = $data['detail_cat'];
                    }
                    return view('instructeur.profile.document.document_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_docs' => $nbr_docs,
                            'liste_docs' => $liste_docs,
                            'detail_cat' => $detail_cat,
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
                    $nbr_docs = $data['nbr_docs'];
                    $list_cat = $data['list_cat'];
                    $liste_docs = $data['liste_docs'];
                    $detail_cat = $data['detail_cat'];
                }
                return view('instructeur.profile.document.document_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_docs' => $nbr_docs,
                        'liste_docs' => $liste_docs,
                        'detail_cat' => $detail_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function getDocument($id, Request $request)
    {

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'instructeur/profile/documents/details/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){

                        $detail_doc = $data['detail_doc'];
                        $info = pathinfo(storage_path() .'/app/public/'. $detail_doc[0]['path']);
                        $ext = $info['extension'];

                        if (($ext == 'pdf') ||($ext == 'PDF') || ($ext == 'jpg')|| ($ext == 'JPG') || ($ext == 'png')|| ($ext == 'PNG')) {

                            return response()->file(storage_path() .'/app/public/'. $detail_doc[0]['path']);

                        } elseif (($ext == 'doc') ||($ext == 'DOC') || ($ext == 'docx')|| ($ext == 'DOCX')) {

                            return response()->file(storage_path() . '/app/public/img/word1.png');

                        } else {

                            return response()->file(storage_path() . '/app/public/img/xlsx.png');

                        }

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
                    $detail_doc = $data['detail_doc'];
                    $info = pathinfo(storage_path() .'/app/public/'. session('instructeur_id') . '/'. session('nom').'-'.session('prenom') .'/docs/' . str_replace(" ","",$detail_doc[0]->titre));
                    $ext = $info['extension'];
                    if (($ext == 'pdf') ||($ext == 'PDF') || ($ext == 'jpg')|| ($ext == 'JPG') || ($ext == 'png')|| ($ext == 'PNG')) {

                        return response()->file(storage_path() . '/app/public/' . session('instructeur_id') . '/'. session('nom').'-'.session('prenom') . '/docs/' . str_replace(" ","",$detail_doc[0]->titre));

                    } elseif (($ext == 'doc') ||($ext == 'DOC') || ($ext == 'docx')|| ($ext == 'DOCX')) {

                        return response()->file(storage_path() . '/app/img/word1.png');

                    } else {

                        return response()->file(storage_path() . '/app/img/xlsx.png');

                    }
                }

            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }

        }




    }
    function convertToMillimes(float $amount): int {
        return (int) ($amount * 1000);
    }
    function generateRandomOrderID($length = 7) {
        // Caractères possibles dans le mot de passe
        $chars = '0123456789';

        // Convertir les octets aléatoires en une chaîne de caractères
        $bytes = random_bytes($length);
        $orderID = '';

        for ($i = 0; $i < $length; $i++) {
            $orderID .= $chars[ord($bytes[$i]) % strlen($chars)];
        }

        return $orderID;
    }
    public function payer_abonnement(Request $request){
        $body = null;
        if($request->methode_paiement == 'en_espece'){
            $body=[
                'code' => '',
                'user_id' => session('user_id'),
                'instructeur_id' => session('instructeur_id'),
                'type_abo_id' => $request->type_abo_id,
                'type_abo_desc' => $request->type_abo_desc,
                'amount' => $request->amount,
                'methode_paiement' => 'En espèces',
                'paiement_status' => false,
                'date_validation' => null,
                'ref' => '',
            ];
            if ($body){
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . session('TOKEN'),
                    'Content-Type' => 'application/json',
                ])->post(env('API_URL').'instructeur/profile/payer_abonnement', $body);

                $data = $response->json();
                if($data){
                    if($data['message']=='Unauthenticated.'){
                        return view('auth.login');
                    }
                    else{
                        if ($response->successful()) {
                            if($data['status']){

                                Session::flash('success', 'Inscription terminée !');
                                return redirect()->back();
                            }
                            else{

                                Session::flash('error', $data['message']);
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
                            Session::flash('success', 'Inscription terminée !');
                            return redirect()->back();
                        }
                        else{
                            Session::flash('error', 'Mot De Passe Ou Adresse sont incorrectes !');
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
        elseif($request->methode_paiement == 'Konnect+'){
            $paiement_status = false;
            $date_validation = null;
            $OrderID =  $this->generateRandomOrderID(7);
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-api-key' => '678a256acd9ba8f1f72cbbbe:GbRSe0ZmIYNtrDrVHf4Guyy18a',
            ])->post('https://api.konnect.network/api/v2/payments/init-payment', [
                'receiverWalletId' => '678a256ccd9ba8f1f72cbbef',
                'token' => 'TND',
                'amount' => $this->convertToMillimes($request->amount),
                'type' => 'immediate',
                'description' => 'Command #'.$OrderID,
                'acceptedPaymentMethods' => ["wallet", "bank_card", "e-DINAR"],
                'lifespan' => 10,
                'firstName' => session('nom'),
                'lastName' => session('prenom'),
                'phoneNumber' => session('tel'),
                'orderId' => $OrderID,
                'webhook'=> 'https://merchant.tech/api/notification_payment',
                'silentWebhook'=> true,
                'successUrl'=> 'https://api.konnect.network/payment-success',
                'failUrl'=> 'https://api.konnect.network/payment-failure',
                'theme'=> 'dark'
            ]);

            $data = $response->json();
            if ($response->successful()) {
                $paymentId = $data['paymentRef']; // Your payment reference

                $response3 = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => '678a256acd9ba8f1f72cbbbe:GbRSe0ZmIYNtrDrVHf4Guyy18a',
                ])->get("https://api.konnect.network/api/v2/payments/{$paymentId}");
                $data3 = $response3->json();
                if ($response->successful()) {
                    if ($data3['payment']['status'] == "completed"){
                        $paiement_status = true;
                        $date_validation= date('Y-m-d');
                    }
                }
                $response2 = Http::withHeaders([
                    'Authorization' => 'Bearer ' . session('TOKEN'),
                    'Content-Type' => 'application/json',
                ])->post(env('API_URL').'instructeur/profile/payer_abonnement',
                    [
                        'code' => $OrderID,
                        'user_id' => session('user_id'),
                        'instructeur_id' => session('instructeur_id'),
                        'type_abo_id' => $request->type_abo_id,
                        'type_abo_desc' => $request->type_abo_desc,
                        'methode_paiement' => $request->methode_paiement,
                        'amount' => $request->amount,
                        'paiement_status' => $paiement_status,
                        'date_validation' => $date_validation,
                        'ref' => $data['paymentRef'],
                    ]
                );

                $data2 = $response2->json();
                //                                    dd([
                //            'status_code' => $response2->status(),
                //            'headers' => $response2->headers(),
                //            'body' => $response2->body(),
                //            'json' => $response2->json(),
                //        ]);
                if($data2){
                    if($data2['message']=='Unauthenticated.'){
                        return view('auth.login');
                    }
                    else{
                        if ($response2->successful()) {
                            if($data2['status']){
                                if($data['payUrl'] != ''){
                                    return redirect()->away($data['payUrl']);
                                }
                                else{
                                    dd($response->body());
                                }
                            }
                            else{

                                Session::flash('error', $data2['message']);
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
                    if ($response2->successful()) {
                        if($data2['status']){
                            if($data['payUrl'] != ''){
                                return redirect()->away($data['payUrl']);
                            }
                            else{
                                dd($response->body());
                            }
                        }
                        else{

                            Session::flash('error', $data2['message']);
                            return redirect()->back();
                        }

                    }
                    else {
                        // Handle unsuccessful response
                        dd($response->body());

                    }
                }

            }
            else {
                dd([
                    'status_code_response' => $response->status(),
                    'headers' => $response->headers(),
                    'body' => $response->body(),
                    'json' => $response->json(),
                ]);


            }



        }






    }

}
