<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FormationController extends Controller
{
    public function index_cat_formation(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations/categories');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                }
                return view('admin.formation.categorie_formation.categorie_formation_component',
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
    public function add_cat_formation(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/categories/add', [
            'lib'=>$request->lib,
            'duree'=>$request->duree,
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
                return redirect()->route('admin.categorie_formation.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit_cat_formation($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations/categories/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                }
                return view('admin.formation.categorie_formation.modifier.modifier_component',
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
    public function update_cat_formation($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/categories/update/'.$id, [
            'lib'=>$request->lib,
            'duree'=>$request->duree,
            'desc'=>$request->desc,
        ]);
//        dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.categorie_formation.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function delete_cat_formation(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/categories/delete', [
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
                return redirect()->route('admin.categorie_formation.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function liste_demande_formation(){
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

                    return view('admin.formation.demande.demande_component',
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
                return view('admin.formation.demande.demande_component',
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
    public function detail_demande_formation($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/'.$id);

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
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $candidatlist = $data['candidatlist'];
                    }

                    return view('admin.formation.demande.details.details_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
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
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $candidatlist = $data['candidatlist'];
                }
                return view('admin.formation.demande.details.details_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
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
    public function detail_formation($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/'.$id);

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
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $candidatlist = $data['candidatlist'];
                        $liste_can = $data['liste_can'];
                    }
                    return view('admin.formation.details.details_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
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
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $candidatlist = $data['candidatlist'];
                    $liste_can = $data['liste_can'];

                }
                return view('admin.formation.details.details_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
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
    public function detail_demande_formation_livret_scientifique($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/'.$id);

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
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $candidatlist = $data['candidatlist'];
                        $liste_can = $data['liste_can'];
                    }

                    return view('admin.formation.demande.details.livretscientifique.livretscientifique_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
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
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $candidatlist = $data['candidatlist'];
                    $liste_can = $data['liste_can'];

                }
                return view('admin.formation.demande.details.livretscientifique.livretscientifique_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
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
    public function detail_demande_formation_prog_de_formation($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/'.$id);

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
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $candidatlist = $data['candidatlist'];
                        $liste_can = $data['liste_can'];
                    }

                    return view('admin.formation.demande.details.prog_de_formation.prog_de_formation_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
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
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $candidatlist = $data['candidatlist'];
                    $liste_can = $data['liste_can'];

                }
                return view('admin.formation.demande.details.prog_de_formation.prog_de_formation_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
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
    public function detail_demande_formation_presentation_power_point($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/'.$id);

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
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $candidatlist = $data['candidatlist'];
                        $liste_can = $data['liste_can'];
                    }

                    return view('admin.formation.demande.details.presentation_power_point.presentation_power_point_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
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
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $candidatlist = $data['candidatlist'];
                    $liste_can = $data['liste_can'];

                }
                return view('admin.formation.demande.details.prog_de_formation.prog_de_formation_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
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
    public function detail_demande_formation_video_basic_one($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'formations/details/'.$id);

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
                        $detail_langue = $data['detail_langue'];
                        $instructeur = $data['instructeur'];
                        $detail_instructeur = $data['detail_instructeur'];
                        $categ_instructeur = $data['categ_instructeur'];
                        $candidatlist = $data['candidatlist'];
                        $liste_can = $data['liste_can'];
                    }

                    return view('admin.formation.demande.details.video_basic_one.video_basic_one_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
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
                    $detail_langue = $data['detail_langue'];
                    $instructeur = $data['instructeur'];
                    $detail_instructeur = $data['detail_instructeur'];
                    $categ_instructeur = $data['categ_instructeur'];
                    $candidatlist = $data['candidatlist'];
                    $liste_can = $data['liste_can'];

                }
                return view('admin.formation.demande.details.video_basic_one.video_basic_one_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
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
    public function affecter_candidat(Request $request,$id_form){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/affecter_candidats', [
            'candidat_id'=>$request->candidat_id,
            'date_validation'=>date('Y-m-d'),
            'formation_id'=>$id_form,
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
    public function aprouver_dmd_formation($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations/demande/approuver/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.demande_formation.details',$id);

            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function refuser_dmd_formation($id){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations/demande/refuser/'.$id);
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
                    return redirect()->route('admin.demande_formation.details',$id);
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
                return redirect()->route('admin.demande_formation.details',$id);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }
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
                    return view('admin.formation.formation_component',
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
                return view('admin.formation.formation_component',
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
    public function delete_affect_candidat(Request $request,$form_id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'formations/affecter_candidats/delete', [
            'champ_id'=>$request->champ_id,
            'form_id'=>$form_id,
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
    public function transferer_candidat_vers_instructeur($id_user,$id_formation){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations/affecter_candidats/transferer_candidat_vers_instructeur/'.$id_user.'/'.$id_formation);

        $data = $response->json();
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
    public function encaisse_formation($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'formations/encaisse/'.$id);

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
}
