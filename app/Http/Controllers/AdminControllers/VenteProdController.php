<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VenteProdController extends Controller
{
    public function index_vente_prod(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'vente_prods');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                        $ligne_vente_list = $data['ligne_vente_list'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                    }
                    return view('admin.vente_produit.vente_produit_component',
                        [
                            'liste' => $liste,
                            'ligne_vente_list' => $ligne_vente_list,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
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
                    $ligne_vente_list = $data['ligne_vente_list'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                }
                return view('admin.vente_produit.vente_produit_component',
                    [
                        'liste' => $liste,
                        'ligne_vente_list' => $ligne_vente_list,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
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
        ])->post(env('API_URL').'vente_prods/search', [
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
                        $ligne_vente_list = $data['ligne_vente_list'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                    }

                    return view('admin.vente_produit.vente_produit_component',
                        [
                            'liste' => $liste,
                            'ligne_vente_list' => $ligne_vente_list,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
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
                    $ligne_vente_list = $data['ligne_vente_list'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                }

                return view('admin.vente_produit.vente_produit_component',
                    [
                        'liste' => $liste,
                        'ligne_vente_list' => $ligne_vente_list,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function encaisse_vente($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'vente_prods/encaisse/'.$id);

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
                    return redirect()->route('admin.vente_prod.index');
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
                return redirect()->route('admin.vente_prod.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function create_vente_prod(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'vente_prods/create');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $list_cat_prod = $data['list_cat_prod'];
                    $list_prod = $data['list_prod'];
                    $list_instructeurs = $data['list_instructeurs'];
                }
                return view('admin.vente_produit.ajouter.ajouter_component',
                    [
                        'list_cat_prod' => $list_cat_prod,
                        'list_prod' => $list_prod,
                        'list_instructeurs' => $list_instructeurs,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }
    }
    public function add_vente(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'vente_prods/add', [
            'date'=>$request->date,
            'tot_ht'=>$request->total_net_ht_final,
            'tot_ttc'=>$request->tot_ttc_final,
            'instructeur_id'=>$request->instructeur_id,

            'qte_list' => $request->qte_list,
            'pu_vente_list' => $request->pu_vente_list,
            'pu_net_ht_vente_list' => $request->pu_net_ht_vente_list,
            'remise_list' => $request->remise_list,
            'prod_id_list' => $request->prod_id_list,
            'paiement_status' => $request->paiement_status,
            'paiement_par' => $request->paiement_par,
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
                return redirect()->route('admin.vente_prod.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function delete_vente(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'vente_prods/delete', [
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
                return redirect()->route('admin.vente_prod.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }

    public function delete_ligne_vente(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'vente_prods/ligne_vente/delete', [
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
                return redirect()->route('admin.vente_prod.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function edit_vente($id,Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'vente_prods/'.$id);

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $detail = $data['detail'];
                    $list_cat_prod = $data['list_cat_prod'];
                    $list_prod = $data['list_prod'];
                    $list_instructeurs = $data['list_instructeurs'];
                    $instructeur = $data['instructeur'];
                }
                return view('admin.vente_produit.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        'list_cat_prod' => $list_cat_prod,
                        'list_prod' => $list_prod,
                        'list_instructeurs' => $list_instructeurs,
                        'instructeur' => $instructeur,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
}
