<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    public function index_type(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evenement/types');

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
                    return view('admin.evenement.types.types_component',
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
                return view('admin.evenement.types.types_component',
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
    public function add_type(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evenement/type/add', [
            'desc'=>$request->desc,
            'evenement_national'=>$request->evenement_national,
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
                    return redirect()->route('admin.evenement.type.index');
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
                return redirect()->route('admin.evenement.type.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function edit_type($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evenement/type/'.$id);

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
                    return view('admin.evenement.types.modifier.modifier_component',
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
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                }
                return view('admin.evenement.types.modifier.modifier_component',
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
    public function update_type($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evenement/type/update/'.$id, [
            'desc'=>$request->desc,
            'evenement_national'=>$request->evenement_national,
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
                    return redirect()->route('admin.evenement.type.index');
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
                return redirect()->route('admin.evenement.type.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function delete_type(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evenement/type/delete', [
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
                    return redirect()->route('admin.evenement.type.index');
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
                return redirect()->route('admin.evenement.type.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function index_evenement(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements');

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
                    return view('admin.evenement.evenement_component',
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
                return view('admin.evenement.evenement_component',
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
    public function delete_evenement(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evenements/delete', [
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
    public function create_evenement(Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/create/'.$request->type_even_id);
//                    dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){


                        $list_instructeurs = $data['list_instructeurs'];
                        $list_type_even = $data['list_type_even'];
                        $list_pays = $data['list_pays'];
                        $detail_type_event = $data['detail_type_event'];
                    }

                    if ($detail_type_event[0]['evenement_national'] == '0'){
                        return view('admin.evenement.ajouter.par_calendrier.ajouter_component',
                            [
                                'liste' => $list_instructeurs,
                                'list_type_even' => $list_type_even,
                                'list_pays' => $list_pays,
                                'detail_type_event' => $detail_type_event,
                                'type_even_id' => $request->type_even_id,
                            ]);
                    }
                    else{
                        return view('admin.evenement.ajouter.ajouter_component',
                            [
                                'liste' => $list_instructeurs,
                                'list_type_even' => $list_type_even,
                                'list_pays' => $list_pays,
                                'detail_type_event' => $detail_type_event,
                                'type_even_id' => $request->type_even_id,
                            ]);
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


                    $list_instructeurs = $data['list_instructeurs'];
                    $list_type_even = $data['list_type_even'];
                    $list_pays = $data['list_pays'];
                    $detail_type_event = $data['detail_type_event'];
                }

                if ($detail_type_event[0]['evenement_national'] == '0'){
                    return view('admin.evenement.ajouter.par_calendrier.ajouter_component',
                        [
                            'liste' => $list_instructeurs,
                            'list_type_even' => $list_type_even,
                            'list_pays' => $list_pays,
                            'detail_type_event' => $detail_type_event,
                            'type_even_id' => $request->type_even_id,
                        ]);
                }
                else{
                    return view('admin.evenement.ajouter.ajouter_component',
                        [
                            'liste' => $list_instructeurs,
                            'list_type_even' => $list_type_even,
                            'list_pays' => $list_pays,
                            'detail_type_event' => $detail_type_event,
                            'type_even_id' => $request->type_even_id,
                        ]);
                }
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function create2_evenement(Request $request){
        $date = $request->date;
        $heure_deb = $request->heure_deb;
        $heure_fin = $request->heure_fin;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/create/'.$request->type_even_id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){


                        $list_instructeurs = $data['list_instructeurs'];
                        $list_type_even = $data['list_type_even'];
                        $list_pays = $data['list_pays'];
                        $detail_type_event = $data['detail_type_event'];
                    }
                    return view('admin.evenement.ajouter.ajouter_component',
                        [
                            'liste' => $list_instructeurs,
                            'list_type_even' => $list_type_even,
                            'list_pays' => $list_pays,
                            'detail_type_event' => $detail_type_event,
                            'type_even_id' => $request->type_even_id,
                            'date_deb' => $date,
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


                    $list_instructeurs = $data['list_instructeurs'];
                    $list_type_even = $data['list_type_even'];
                    $list_pays = $data['list_pays'];
                    $detail_type_event = $data['detail_type_event'];
                }

                return view('admin.evenement.ajouter.ajouter_component',
                    [
                        'liste' => $list_instructeurs,
                        'list_type_even' => $list_type_even,
                        'list_pays' => $list_pays,
                        'detail_type_event' => $detail_type_event,
                        'type_even_id' => $request->type_even_id,
                        'date_deb' => $date,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function create_evenement_old(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/create');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $list_instructeurs = $data['list_instructeurs'];
                        $list_type_even = $data['list_type_even'];
                        $list_pays = $data['list_pays'];
                    }
                    return view('admin.evenement.ajouter.ajouter_component',
                        [
                            'liste' => $list_instructeurs,
                            'list_type_even' => $list_type_even,
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
                    $list_instructeurs = $data['list_instructeurs'];
                    $list_type_even = $data['list_type_even'];
                    $list_pays = $data['list_pays'];
                }
                return view('admin.evenement.ajouter.ajouter_component',
                    [
                        'liste' => $list_instructeurs,
                        'list_type_even' => $list_type_even,
                        'list_pays' => $list_pays,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function add_evenement(Request $request){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evenements/add', [
            'desc'=>$request->desc,
            'type_even_id'=>$request->type_even_id,
            'nbr_place_dispo'=>$request->nbr_place_dispo,
            'date_deb'=>$request->date_deb,
            'date_fin'=>$request->date_fin,
            'heure_deb'=>$request->heure_deb,
            'heure_fin'=>$request->heure_fin,
            'nbr_participant'=>$request->nbr_participant,
            'nbr_place_restant'=>$request->nbr_place_restant,
            'instr_id_list'=>$request->instr_id_list,


            'titre'=>$request->titre,
            'sujet'=>$request->sujet,
            'langue'=>$request->langue,
            'salle'=>$request->salle,
            'info_sur_lieu'=>$request->info_sur_lieu,
            'frais'=>$request->frais,
            'devise'=>$request->devise,
            'contact'=>$request->contact,
            'participant_a_levennement'=>$request->participant_a_levennement,
            'participant_non_inscrit'=>$request->participant_non_inscrit,
            'pays_id'=>$request->pays_id,
            'instructeur_id'=>null,
            'approuver'=>true,

        ]);
        $data = $response->json();
//                    dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Ajout_terminée') );
                    }
                    return redirect()->route('admin.evenement.index');
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
                return redirect()->route('admin.evenement.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function liste_demande_evenement(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/demandes/list');

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

                    return view('admin.evenement.demande.demande_component',
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
                return view('admin.evenement.demande.demande_component',
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
     public function aprouver_dmd_evenement($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/demande/approuver/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.evenement.demande.index');

            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function refuser_dmd_evenement($id){

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/demande/refuser/'.$id);
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
                    return redirect()->route('admin.evenement.demande.index');
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
                return redirect()->route('admin.evenement.demande.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }
    public function detail_demande_evenement($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'evennements/details/'.$id);

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
                        $instructeurlist = $data['instructeurlist'];
                        $liste_inst = $data['liste_inst'];
                    }

                    return view('admin.evenement.demande.details.details_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
                            "instructeur" => $instructeur,
                            "detail_instructeur" => $detail_instructeur,
                            "categ_instructeur" => $categ_instructeur,
                            "instructeurlist" => $instructeurlist,
                            "liste_inst" => $liste_inst,
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
                    $instructeurlist = $data['instructeurlist'];
                    $liste_inst = $data['liste_inst'];
                }
                return view('admin.evenement.demande.details.details_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
                        "instructeur" => $instructeur,
                        "detail_instructeur" => $detail_instructeur,
                        "categ_instructeur" => $categ_instructeur,
                        "instructeurlist" => $instructeurlist,
                        "liste_inst" => $liste_inst,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function detail_evenement($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'evennements/details/'.$id);

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
                        $instructeurlist = $data['instructeurlist'];
                        $liste_inst = $data['liste_inst'];
                    }

                    return view('admin.evenement.details.details_component',
                        [
                            "detail" => $detail,
                            "list_cat" => $list_cat,
                            "detail_cat" => $detail_cat,
                            "detail_langue" => $detail_langue,
                            "instructeur" => $instructeur,
                            "detail_instructeur" => $detail_instructeur,
                            "categ_instructeur" => $categ_instructeur,
                            "instructeurlist" => $instructeurlist,
                            "liste_inst" => $liste_inst,
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
                    $instructeurlist = $data['instructeurlist'];
                    $liste_inst = $data['liste_inst'];
                }
                return view('admin.evenement.details.details_component',
                    [
                        "detail" => $detail,
                        "list_cat" => $list_cat,
                        "detail_cat" => $detail_cat,
                        "detail_langue" => $detail_langue,
                        "instructeur" => $instructeur,
                        "detail_instructeur" => $detail_instructeur,
                        "categ_instructeur" => $categ_instructeur,
                        "instructeurlist" => $instructeurlist,
                        "liste_inst" => $liste_inst,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function detail_evenement_photo($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'evennements/details/photos/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $detail = $data['detail'];
                        $detail_photos = $data['detail_photos'];
                        $detail_videos = $data['detail_videos'];
                    }

                    return view('admin.evenement.details.photos',
                        [
                            "detail" => $detail,
                            "detail_photos" => $detail_photos,
                            "detail_videos" => $detail_videos,
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
                    $detail_photos = $data['detail_photos'];
                    $detail_videos = $data['detail_videos'];
                }

                return view('admin.evenement.details.photos',
                    [
                        "detail" => $detail,
                        "detail_photos" => $detail_photos,
                        "detail_videos" => $detail_videos,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function add_evenement_photo(Request $request,$id){
        if (!$request->hasFile('images')) {
            return redirect()->back()->with('error', 'Aucune image sélectionnée.');
        }

        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Accept'        => 'application/json',
        ]);

        foreach ($request->file('images') as $file) {
            $http = $http->attach(
                'photos[]',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            );
        }

        $response = $http->post(env('API_URL') . 'evennements/details/photos/add/' . $id);
        $data = $response->json();
//                    dd([
//            'status_code' => $response->status(),
//            'headers' => $response->headers(),
//            'body' => $response->body(),
//            'json' => $response->json(),
//        ]);
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        Session::flash('success',  __('content.Ajout_terminée') );
                    }
                    return redirect()->route('admin.evenement.details.photos',$id);
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
                return redirect()->route('admin.evenement.details.photos',$id);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function detail_evenement_video($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get(env('API_URL').'evennements/details/photos/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $detail = $data['detail'];
                        $detail_photos = $data['detail_photos'];
                        $detail_videos = $data['detail_videos'];

                    }

                    return view('admin.evenement.details.videos',
                        [
                            "detail" => $detail,
                            "detail_photos" => $detail_photos,
                            "detail_videos" => $detail_videos,
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
                    $detail_photos = $data['detail_photos'];
                    $detail_videos = $data['detail_videos'];

                }

                return view('admin.evenement.details.videos',
                    [
                        "detail" => $detail,
                        "detail_photos" => $detail_photos,
                        "detail_videos" => $detail_videos,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function add_evenement_video(Request $request,$id){
        $videos = $request->file('videos');
        $paths = [];
        foreach ($videos as $video) {
            $videoName = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
            $video->storeAs("public/evenements/{$id}/videos", $videoName);
            $paths[] = "public/evenements/{$id}/videos/{$videoName}";
        }
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evennements/details/videos/add/'.$id, [
            'video_path'=>$paths,
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
                    return redirect()->route('admin.evenement.details.videos',$id);
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
                return redirect()->route('admin.evenement.details.videos',$id);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function delete_evenement_photo($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/details/photos/delete/'.$id);

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
    public function delete_evenement_video($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'evennements/details/videos/delete/'.$id);

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
    public function affecter_user(Request $request,$id_even){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evenements/affecter_users', [
            'user_id'=>$request->user_id,
            'date_validation'=>date('Y-m-d'),
            'evennement_id'=>$id_even,
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
    public function delete_affect_user(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evenements/affecter_users/delete', [
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
    public function delete_affect_candidat(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evenements/affecter_candidat/delete', [
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
    public function get_candidats_evennement($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL').'evennements/candidats/list/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {

                    if($data['status']){
                        $list_candidats = $data['list_candidats'];
                    }

                    return view('admin.evenement.candidats',
                        [
                            "list_candidats" => $list_candidats,
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
                    $list_candidats = $data['list_candidats'];
                }
                return view('admin.evenement.candidats',
                    [
                        "list_candidats" => $list_candidats,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function change_candidat_payment_status(Request $request){
      
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'evennements/candidats/change_payment_status', [
            'user_id'=>$request->id_user,
            'event_id'=>$request->id_event,
            'status_payment'=>$request->status_payment,
            'methode_paiement'=>'en_espece',
        ]);
        $data = $response->json();
        //                    dd([
        //            'status_code' => $response->status(),
        //            'headers' => $response->headers(),
        //            'body' => $response->body(),
        //            'json' => $response->json(),
        //        ]);
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
