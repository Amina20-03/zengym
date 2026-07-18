<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CoursController extends Controller
{
    public function index_categ_cours(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours/categories');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                }
                return view('admin.cours.categ_cours.categ_cours_component',
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
    public function add_categ_cours(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'cours/categories/add', [
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
                return redirect()->route('admin.categ_cours.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit_categ_cours($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours/categories/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                }
                return view('admin.cours.categ_cours.modifier.modifier_component',
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
    public function update_categ_cours($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'cours/categories/update/'.$id, [
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
                return redirect()->route('admin.categ_cours.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }
    public function delete_categ_cours(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'cours/categories/delete', [
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
                return redirect()->route('admin.categ_cours.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }
    public function liste_demande_cours(){
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

                    return view('admin.cours.demande.demande_component',
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
                return view('admin.cours.demande.demande_component',
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
    public function detail_demande_cours($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL').'cours/details/'.$id);

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
                        $detail_cat = $data['detail_cat'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $candidatlist = $data['candidatlist'];
                    }

                    return view('admin.cours.demande.details.details_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "instructeur" => $instructeur,
                            "detail_instructeur" => $detail_instructeur,
                            "categ_instructeur" => $categ_instructeur,
                            "candidatlist" => $candidatlist,
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
                    $detail_cat = $data['detail_cat'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $candidatlist = $data['candidatlist'];
                }
                return view('admin.cours.demande.details.details_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "instructeur" => $instructeur,
                        "detail_instructeur" => $detail_instructeur,
                        "categ_instructeur" => $categ_instructeur,
                        "candidatlist" => $candidatlist,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function refuser_dmd_cours($id){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours/demande/refuser/'.$id);
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
                    return redirect()->route('admin.demande_cours.details',$id);
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
                return redirect()->route('admin.demande_cours.details',$id);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }
    public function aprouver_dmd_cours($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours/demande/approuver/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.demande_cours.details',$id);

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
                    return view('admin.cours.cours_component',
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
                return view('admin.cours.cours_component',
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
    public function detail_cours($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'cours/details/'.$id);

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
                        $detail_cat = $data['detail_cat'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $candidatlist = $data['candidatlist'];
                        $liste_can = $data['liste_can'];
                    }

                    return view('admin.cours.details.details_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "instructeur" => $instructeur,
                            "detail_instructeur" => $detail_instructeur,
                            "categ_instructeur" => $categ_instructeur,
                            "candidatlist" => $candidatlist,
                            "liste_can" => $liste_can,
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
                    $detail_cat = $data['detail_cat'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $candidatlist = $data['candidatlist'];
                    $liste_can = $data['liste_can'];

                }
                return view('admin.cours.details.details_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "instructeur" => $instructeur,
                        "detail_instructeur" => $detail_instructeur,
                        "categ_instructeur" => $categ_instructeur,
                        "candidatlist" => $candidatlist,
                        "liste_can" => $liste_can,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function affecter_candidat(Request $request,$id_cours){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'cours/affecter_candidats', [
            'candidat_id'=>$request->candidat_id,
            'date_validation'=>date('Y-m-d'),
            'cours_id'=>$id_cours,
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
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->back();
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function delete_affect_candidat(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'cours/affecter_candidats/delete', [
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
                    Session::flash('success',  __('content.Suppression_terminée') );
                }
                return redirect()->back();
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
            'instructeur_id'=>null,
            'instr_id_list'=>$request->instr_id_list,


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
                    return redirect()->route('admin.cours.index');
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
                return redirect()->route('admin.cours.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
}
