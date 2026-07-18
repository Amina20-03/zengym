<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class InstructeurController extends Controller
{
    public function index_cat_instructeur(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'categorie_instructeurs');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                }
                return view('admin.parametrage.categorie_instructeur.categorie_instructeur_component',
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
    public function add_cat_instructeur(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'categorie_instructeur_add', [
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
                return redirect()->route('admin.categorie_instructeur.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function edit_cat_instructeur($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'categorie_instructeur/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                }
                return view('admin.parametrage.categorie_instructeur.modifier.modifier_component',
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
    public function update_cat_instructeur($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'categorie_instructeur_update/'.$id, [
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
                return redirect()->route('admin.categorie_instructeur.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function delete_cat_instructeur(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'categorie_instructeur_delete', [
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
                return redirect()->route('admin.categorie_instructeur.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function index_instructeur(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'instructeurs');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                    $list_pays = $data['list_pays'];
                    $list_cat = $data['list_cat'];
                }

                return view('admin.utilisateur.instructeur.instructeur_component',
                    [
                        'liste' => $liste,
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
    public function add_instructeur(Request $request){
        $photo = null;
        if($request->file('photo') == null){
            $photo = null;
        }
        else{
            $path = $request->file('photo')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $photo = $base64;
        }
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur_add', [
            'code_instr'=>$request->code_instr,
            'profession'=>$request->profession,
            'commentaire'=>'',
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
            'password'=>$request->password,
        ]);
        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __($data['message']) );
                }
                else{
                    Session::flash('error',  __($data['message']) );
                }

                if($request->verif_nature=="instructeur"){
                    return redirect()->route('admin.instructeur.index');
                }
                elseif($request->verif_nature=="vente_abo"){
                    return redirect()->route('admin.vente_abo.create');
                }
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function edit_instructeur($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'instructeur/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                    $detail_user = $data['detail_user'];
                    $list_pays = $data['list_pays'];
                    $list_cat = $data['list_cat'];
                    $desc_cat = $data['desc_cat'];
                    $desc_pays = $data['desc_pays'];

                }
                return view('admin.utilisateur.instructeur.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        'list_pays' => $list_pays,
                        'list_cat' => $list_cat,
                        "detail_user" => $detail_user,
                        'desc_pays' => $desc_pays,
                        'desc_cat' => $desc_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function update_instructeur($id,Request $request){
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
            'code_instr'=>$request->code_instr,
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

        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __('content.Modification_terminée') );
                }
                return redirect()->route('admin.instructeur.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function update_instructeur_password($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur_update_password/'.$id, [
           // 'ancienpassword'=>$request->ancienpassword,
            'password'=>$request->password,
            'conf_password'=>$request->conf_password,

        ]);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    Session::flash('success',  __($data['message']) );
                    return redirect()->route('admin.instructeur.edit',$id);
                }
                else{
                    Session::flash('error',  __($data['message']) );
                    return redirect()->route('admin.instructeur.edit',$id);
                }
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function update_instructeur_diplome_status($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'update_instructeur_diplome_status/'.$id);

        $data = $response->json();
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
    public function delete_instructeur(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'instructeur_delete', [
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
                return redirect()->route('admin.instructeur.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
}
