<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProduitController extends Controller
{
    public function index_cat_produit(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'produits/categories');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];
                }
                return view('admin.produit.categorie_produit.categorie_produit_component',
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
    public function add_cat_produit(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'produits/categorie/add', [
            'lib'=>$request->lib,
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
                return redirect()->route('admin.categorie_produit.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function edit_cat_produit($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'produits/categorie/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                }
                return view('admin.produit.categorie_produit.modifier.modifier_component',
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
    public function update_cat_produit($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'produits/categorie/update/'.$id, [
            'lib'=>$request->lib,
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
                return redirect()->route('admin.categorie_produit.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }
    public function delete_cat_produit(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'produits/categorie/delete', [
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
                return redirect()->route('admin.categorie_produit.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }

    public function index_produit(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'produits');

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
                return view('admin.produit.produit_component',
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
    public function add_produit(Request $request){
        $active = false;
        if($request->active == 'on'){
            $active = true;
        }
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
        ])->post(env('API_URL').'produits/add', [
            'photo'=>$photo,
            'desc'=>$request->desc,
            'couleur'=>$request->couleur,
            'dosage'=>$request->dosage,
            'prix_vente_ht'=>$request->prix_vente_ht,
            'prix_vente_net_ht'=>$request->prix_vente_net_ht,
            'prix_vente_ttc'=>$request->prix_vente_ttc,
            'taux_tva'=>$request->taux_tva,
            'max_remise'=>$request->max_remise,
            'active'=>$active,
            'categ_produit_id'=>$request->categ_produit_id,
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
                return redirect()->route('admin.produit.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit_produit($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'produits/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                    $desc_cat = $data['desc_cat'];
                    $list_cat = $data['list_cat'];
                }
                return view('admin.produit.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        'desc_cat' => $desc_cat,
                        'list_cat' => $list_cat,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function update_produit($id,Request $request){
        $active = false;
        if($request->active == 'on'){
            $active = true;
        }
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
        ])->post(env('API_URL').'produits/update/'.$id, [
            'photo'=>$photo,
            'desc'=>$request->desc,
            'couleur'=>$request->couleur,
            'dosage'=>$request->dosage,
            'prix_vente_ht'=>$request->prix_vente_ht,
            'prix_vente_net_ht'=>$request->prix_vente_net_ht,
            'prix_vente_ttc'=>$request->prix_vente_ttc,
            'taux_tva'=>$request->taux_tva,
            'max_remise'=>$request->max_remise,
            'active'=>$active,
            'categ_produit_id'=>$request->categ_produit_id,
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
                return redirect()->route('admin.produit.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }



    }
    public function delete_produit(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'produits/delete', [
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
                return redirect()->route('admin.produit.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
}
