<?php

namespace App\Http\Controllers\AdminControllers\StockVenteControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
class BonEntreController extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'stock_vente/Bon_entree');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $ligne_belist = $data['liste_ligne_be'];

                    }
                    return view('admin.stock_vente.bon_entre.bon_entre_component',
                        [
                            'liste' => $liste,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'liste_ligne_be' => $ligne_belist,
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
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $ligne_belist = $data['liste_ligne_be'];

                }
                return view('admin.stock_vente.bon_entre.bon_entre_component',
                    [
                        'liste' => $liste,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'liste_ligne_be' => $ligne_belist,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function search(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'stock_vente/Bon_entree/search', [
            'du_date'=>$request->du_date,
            'au_date'=>$request->au_date,

        ]);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $ligne_belist = $data['liste_ligne_be'];
                    }

                    return view('admin.stock_vente.bon_entre.bon_entre_component',
                        [
                            'liste' => $liste,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'liste_ligne_be' => $ligne_belist,
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
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $ligne_belist = $data['liste_ligne_be'];
                }

                return view('admin.stock_vente.bon_entre.bon_entre_component',
                    [
                        'liste' => $liste,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'liste_ligne_be' => $ligne_belist,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function create(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'stock_vente/Bon_entree/create');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste_fournisseur = $data['liste_fournisseur'];
                        $liste_cat = $data['liste_cat'];
                        $liste_produit = $data['liste_produit'];

                    }
                    return view('admin.stock_vente.bon_entre.ajouter.ajouter_component',[
                        'liste_fournisseur' => $liste_fournisseur,
                        'liste_cat' => $liste_cat,
                        'liste_produit' => $liste_produit,
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
                    $liste_fournisseur = $data['liste_fournisseur'];
                    $liste_cat = $data['liste_cat'];
                    $liste_produit = $data['liste_produit'];

                }
                return view('admin.stock_vente.bon_entre.ajouter.ajouter_component',[
                    'liste_fournisseur' => $liste_fournisseur,
                    'liste_cat' => $liste_cat,
                    'liste_produit' => $liste_produit,
                ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function add(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'stock_vente/Bon_entree/add', [
            'date_be'=>$request->date_be,
            'total_ttc_be'=>$request->total_ttc_be,
            'IDFOURNISSEUR'=>$request->IDFOURNISSEUR,
            'list_prod_selectionnes'=>$request->list_prod_selectionnes,
            'list_qe_selectionnes'=>$request->list_qe_selectionnes,
            'list_pu_selectionnes'=>$request->list_pu_selectionnes,
            'list_total_selectionnes'=>$request->list_total_selectionnes,
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

                    return redirect()->route('admin.stock_vente.bon_entre.index');
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

                return redirect()->route('admin.stock_vente.bon_entre.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function edit($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'stock_vente/Bon_entree/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $detail = $data['detail'];
                        $liste_fournisseur = $data['liste_fournisseur'];
                        $raison_soc_fourn = $data['raison_soc_fourn'];
                        $liste_cat = $data['liste_cat'];
                        $ligne_belist = $data['liste'];
                        $liste_produit = $data['liste_produit'];
                    }

                    return view('admin.stock_vente.bon_entre.modifier.modifier_component',
                        [
                            'detail' => $detail,
                            'liste_fournisseur' => $liste_fournisseur,
                            'raison_soc_fourn' => $raison_soc_fourn,
                            'liste_cat' => $liste_cat,
                            'liste' => $ligne_belist,
                            'liste_produit' => $liste_produit,
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
                    $liste_fournisseur = $data['liste_fournisseur'];
                    $raison_soc_fourn = $data['raison_soc_fourn'];
                    $liste_cat = $data['liste_cat'];
                    $ligne_belist = $data['liste'];
                    $liste_produit = $data['liste_produit'];
                }

                return view('admin.stock_vente.bon_entre.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        'liste_fournisseur' => $liste_fournisseur,
                        'raison_soc_fourn' => $raison_soc_fourn,
                        'liste_cat' => $liste_cat,
                        'liste' => $ligne_belist,
                        'liste_produit' => $liste_produit,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function update(Request $request,$id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'stock_vente/Bon_entree/update/'.$id, [
            'date_be'=>$request->date_be,
            'total_ttc_be'=>$request->total_ttc_be,
            'IDFOURNISSEUR'=>$request->IDFOURNISSEUR,
            'list_prod_selectionnes'=>$request->list_prod_selectionnes,
            'list_qe_selectionnes'=>$request->list_qe_selectionnes,
            'list_pu_selectionnes'=>$request->list_pu_selectionnes,
            'list_total_selectionnes'=>$request->list_total_selectionnes,
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


                    return redirect()->route('admin.stock_vente.bon_entre.index');
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


                return redirect()->route('admin.stock_vente.bon_entre.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function delete(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'stock_vente/Bon_entree/delete', [
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
                    return redirect()->route('admin.stock_vente.bon_entre.index');
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
                return redirect()->route('admin.stock_vente.bon_entre.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
}
