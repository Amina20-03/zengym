<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AboAdherentController extends Controller
{
    public function index_categ_abo(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'abonnements/adherents/categories');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                }
                return view('admin.abonnement_adherent.categ_abo.categ_abo_component',
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
    public function add_categ_abo(Request $request){
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
        ])->post(env('API_URL').'abonnements/adherents/categories/add', [
            'desc'=>$request->desc,
            'photo'=>$photo,
        ]);
//                dd([
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
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->route('admin.abo.adherent.categ_abo.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit_categ_abo($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'abonnements/adherents/categories/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                }
                return view('admin.abonnement_adherent.categ_abo.modifier.modifier_component',
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
    public function update_categ_abo($id,Request $request){
        $photo = null;
        if($request->file('photo') == null){
            $photo = $request->photo_old;
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
        ])->post(env('API_URL').'abonnements/adherents/categories/update/'.$id, [
            'desc'=>$request->desc,
            'photo'=>$photo,
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
                return redirect()->route('admin.abo.adherent.categ_abo.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function delete_categ_abo(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'abonnements/adherents/categories/delete', [
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
                return redirect()->route('admin.abo.adherent.categ_abo.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function index_type_abo(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'abonnements/adherents/types');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                    $list_cat = $data['list_cat'];
                }
                return view('admin.abonnement_adherent.type_abo.type_abo_component',
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
    public function add_type_abo(Request $request){
        $seance_uni = false;
        if($request->seance_essai == 'on')  $seance_uni = true;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'abonnements/adherents/types/add', [
            'des'=>$request->des,
            'periode'=>$request->periode,
            'frais'=>$request->frais,
            'remise'=>$request->remise,
            'frais_ap_remise'=>$request->frais_ap_remise,
            'seance_essai'=>$seance_uni,
            'frais_seance_essai'=>$request->frais_seance_essai,
            'categ_abo_id'=>$request->categ_abo_id,
            'nbr_pers_limit'=>$request->nbr_pers_limit,
        ]);
//                dd([
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
                    Session::flash('success',  __('content.Ajout_terminée') );
                }
                return redirect()->route('admin.abonnements.adherents.type_abo.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function edit_type_abo($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'abonnements/adherents/types/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                    $list_cat = $data['list_cat'];
                    $desc_cat = $data['desc_cat'];
                }
                return view('admin.abonnement_adherent.type_abo.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        'list_cat' => $list_cat,
                        'desc_cat' => $desc_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function update_type_abo($id,Request $request){
        $seance_uni = false;
        if($request->seance_essai == 'on')  $seance_uni = true;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'abonnements/adherents/types/update/'.$id, [
            'des'=>$request->des,
            'periode'=>$request->periode,
            'frais'=>$request->frais,
            'remise'=>$request->remise,
            'frais_ap_remise'=>$request->frais_ap_remise,
            'seance_essai'=>$seance_uni,
            'frais_seance_essai'=>$request->frais_seance_essai,
            'categ_abo_id'=>$request->categ_abo_id,
            'nbr_pers_limit'=>$request->nbr_pers_limit,
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
                return redirect()->route('admin.abonnements.adherents.type_abo.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function delete_type_abo(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'abonnements/adherents/types/delete', [
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
                return redirect()->route('admin.abonnements.adherents.type_abo.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function index_abo(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'abonnement_adherent');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];

                }
                return view('admin.abonnement_adherent.abonnement.abonnement_component',
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
    public function valider_abo_adherent($id_abo){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'abonnement_adherent/valider_abo_adherent/'.$id_abo);

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
    public function delete_abo(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'abonnement_adherent/delete', [
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
                return redirect()->back();
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
}