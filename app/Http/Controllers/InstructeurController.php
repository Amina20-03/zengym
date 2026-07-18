<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class InstructeurController extends Controller
{
    public function index_instructeur($id_categ){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL').'instructeurs_by_categ/'.$id_categ);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $list_cat = $data['list_cat'];
                        $detail_cat = $data['detail_cat'];
                        $instructeurlist = $data['liste'];
                        $nbr_instructeurs = $data['nbr_instructeurs'];
                        $list_pays = $data['list_pays'];
                    }
                    return view('instructeurs.instructeurs_component',
                        [
                            'liste' => $instructeurlist,
                            'list_cat' => $list_cat,
                            'nbr_instructeurs' => $nbr_instructeurs,
                            'detail_cat' => $detail_cat,
                            'list_pays' => $list_pays,
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
                    $detail_cat = $data['detail_cat'];
                    $instructeurlist = $data['liste'];
                    $nbr_instructeurs = $data['nbr_instructeurs'];
                    $list_pays = $data['list_pays'];
                }
                return view('instructeurs.instructeurs_component',
                    [
                        'liste' => $instructeurlist,
                        'list_cat' => $list_cat,
                        'nbr_instructeurs' => $nbr_instructeurs,
                        'detail_cat' => $detail_cat,
                        'list_pays' => $list_pays,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function index_profile($id_instr){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL').'instructeur_by_id/profile/'.$id_instr);

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
                    }
                    return view('instructeurs.profile.profile_component',
                        [
                            'instructeur' => $instructeur,
                            'nbr_cours' => $nbr_cours,
                            'courslist' => $courslist,
                            'nbr_Evennement' => $nbr_Evennement,
                            'list_pays' => $list_pays,
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
                    $instructeur = $data['instructeur'];
                    $nbr_cours = $data['nbr_cours'];
                    $courslist = $data['courslist'];
                    $nbr_Evennement = $data['nbr_Evennement'];
                    $list_pays = $data['list_pays'];
                    $list_cat = $data['list_cat'];
                }
                return view('instructeurs.profile.profile_component',
                    [
                        'instructeur' => $instructeur,
                        'nbr_cours' => $nbr_cours,
                        'courslist' => $courslist,
                        'nbr_Evennement' => $nbr_Evennement,
                        'list_pays' => $list_pays,
                        'list_cat' => $list_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function index_photo($id_instr){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'instructeur_by_id/profile/photos/'.$id_instr);

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
                        $instructeur_id = $data['instructeur_id'];
                    }
                    return view('instructeurs.profile.photo.photo_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_photos' => $nbr_photos,
                            'liste_photos' => $liste_photos,
                            'detail_cat' => $detail_cat,
                            'instructeur_id' => $instructeur_id,
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
                    $instructeur_id = $data['instructeur_id'];
                }
                return view('instructeurs.profile.photo.photo_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_photos' => $nbr_photos,
                        'liste_photos' => $liste_photos,
                        'detail_cat' => $detail_cat,
                        'instructeur_id' => $instructeur_id,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function index_video($id_instr){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'instructeur_by_id/profile/videos/'.$id_instr);

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
                        $instructeur_id = $data['instructeur_id'];
                    }
                    return view('instructeurs.profile.video.video_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_videos' => $nbr_videos,
                            'liste_videos' => $liste_videos,
                            'detail_cat' => $detail_cat,
                            'instructeur_id' => $instructeur_id,
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
                    $instructeur_id = $data['instructeur_id'];
                }
                return view('instructeurs.profile.video.video_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_videos' => $nbr_videos,
                        'liste_videos' => $liste_videos,
                        'detail_cat' => $detail_cat,
                        'instructeur_id' => $instructeur_id,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function index_doc($id_instr){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'instructeur_by_id/profile/docs/'.$id_instr);

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
                        $instructeur_id = $data['instructeur_id'];
                    }
                    return view('instructeurs.profile.document.document_component',
                        [
                            'list_cat' => $list_cat,
                            'nbr_docs' => $nbr_docs,
                            'liste_docs' => $liste_docs,
                            'detail_cat' => $detail_cat,
                            'instructeur_id' => $instructeur_id,
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
                    $instructeur_id = $data['instructeur_id'];
                }
                return view('instructeurs.profile.document.document_component',
                    [
                        'list_cat' => $list_cat,
                        'nbr_docs' => $nbr_docs,
                        'liste_docs' => $liste_docs,
                        'detail_cat' => $detail_cat,
                        'instructeur_id' => $instructeur_id,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
}
