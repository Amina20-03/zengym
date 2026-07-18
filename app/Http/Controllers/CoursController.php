<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CoursController extends Controller
{
    public function index_enligne_cours(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'cours');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $courslist = $data['liste'];
                        $liste_cat = $data['liste_cat'];
                        $nbr_cours = $data['nbr_cours'];
                        $detail_cat = $data['detail_cat'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $heure_deb = $data['heure_deb'];
                        $heure_fin = $data['heure_fin'];

                    }
                    return view('cours.en_ligne.cours',
                        [
                            'list_cat' => $liste_cat,
                            'liste' => $courslist,
                            'nbr_cours' => $nbr_cours,
                            'detail_cat' => $detail_cat,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'heure_deb' => $heure_deb,
                            'heure_fin' => $heure_fin,
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
                    $courslist = $data['liste'];
                    $liste_cat = $data['liste_cat'];
                    $nbr_cours = $data['nbr_cours'];
                    $detail_cat = $data['detail_cat'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $heure_deb = $data['heure_deb'];
                    $heure_fin = $data['heure_fin'];
                }
                return view('cours.en_ligne.cours',
                    [
                        'list_cat' => $liste_cat,
                        'liste' => $courslist,
                        'nbr_cours' => $nbr_cours,
                        'detail_cat' => $detail_cat,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'heure_deb' => $heure_deb,
                        'heure_fin' => $heure_fin,
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

        ])->get(env('API_URL').'cours');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $courslist = $data['liste'];
                        $liste_cat = $data['liste_cat'];
                        $nbr_cours = $data['nbr_cours'];
                        $detail_cat = $data['detail_cat'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $heure_deb = $data['heure_deb'];
                        $heure_fin = $data['heure_fin'];

                    }
                    return view('cours.cours',
                        [
                            'list_cat' => $liste_cat,
                            'liste' => $courslist,
                            'nbr_cours' => $nbr_cours,
                            'detail_cat' => $detail_cat,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'heure_deb' => $heure_deb,
                            'heure_fin' => $heure_fin,
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
                    $courslist = $data['liste'];
                    $liste_cat = $data['liste_cat'];
                    $nbr_cours = $data['nbr_cours'];
                    $detail_cat = $data['detail_cat'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $heure_deb = $data['heure_deb'];
                    $heure_fin = $data['heure_fin'];
                }
                return view('cours.cours',
                    [
                        'list_cat' => $liste_cat,
                        'liste' => $courslist,
                        'nbr_cours' => $nbr_cours,
                        'detail_cat' => $detail_cat,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'heure_deb' => $heure_deb,
                        'heure_fin' => $heure_fin,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function index_cours_by_categ($id_categ){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'cours_by_categ/'.$id_categ);

        $data = $response->json();


        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $courslist = $data['liste'];
                        $liste_cat = $data['liste_cat'];
                        $nbr_cours = $data['nbr_cours'];
                        $detail_cat = $data['detail_cat'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $heure_deb = $data['heure_deb'];
                        $heure_fin = $data['heure_fin'];
                    }
                    return view('cours.cours',
                        [
                            'list_cat' => $liste_cat,
                            'liste' => $courslist,
                            'nbr_cours' => $nbr_cours,
                            'detail_cat' => $detail_cat,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'heure_deb' => $heure_deb,
                            'heure_fin' => $heure_fin,
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
                    $courslist = $data['liste'];
                    $liste_cat = $data['liste_cat'];
                    $nbr_cours = $data['nbr_cours'];
                    $detail_cat = $data['detail_cat'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $heure_deb = $data['heure_deb'];
                    $heure_fin = $data['heure_fin'];
                }
                return view('cours.cours',
                    [
                        'list_cat' => $liste_cat,
                        'liste' => $courslist,
                        'nbr_cours' => $nbr_cours,
                        'detail_cat' => $detail_cat,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'heure_deb' => $heure_deb,
                        'heure_fin' => $heure_fin,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function search_cours(Request $request){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'cours_by_categ/search', [
            'id_categ'=>$request->id_categ,
            'du_date'=>$request->du_date,
            'heure_deb'=>$request->heure_deb,
            'heure_fin'=>$request->heure_fin,
        ]);
        $data = $response->json();

        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $courslist = $data['liste'];
                        $liste_cat = $data['liste_cat'];
                        $nbr_cours = $data['nbr_cours'];
                        $detail_cat = $data['detail_cat'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $heure_deb = $data['heure_deb'];
                        $heure_fin = $data['heure_fin'];
                    }
                    return view('cours.cours',
                        [
                            'list_cat' => $liste_cat,
                            'liste' => $courslist,
                            'nbr_cours' => $nbr_cours,
                            'detail_cat' => $detail_cat,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'heure_deb' => $heure_deb,
                            'heure_fin' => $heure_fin,
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
                    $courslist = $data['liste'];
                    $liste_cat = $data['liste_cat'];
                    $nbr_cours = $data['nbr_cours'];
                    $detail_cat = $data['detail_cat'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $heure_deb = $data['heure_deb'];
                    $heure_fin = $data['heure_fin'];
                }
                return view('cours.cours',
                    [
                        'list_cat' => $liste_cat,
                        'liste' => $courslist,
                        'nbr_cours' => $nbr_cours,
                        'detail_cat' => $detail_cat,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'heure_deb' => $heure_deb,
                        'heure_fin' => $heure_fin,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function courseData(Request $request)
    {

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'courses/data', [
            'placement'=>$request->placement,
            'instructor_name'=>$request->instructor_name,
            'date'=>$request->date,
        ]);
        $data = $response->json();
        $courses = $data['courses'];
        dd(datatables()->of($courses)->make(true));
        return datatables()->of($courses)->make(true);


    }
}
