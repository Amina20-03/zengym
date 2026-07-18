<?php

namespace App\Http\Controllers\AdminControllers\StockVenteControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class BonSortieController extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'stock_vente/bon_sorties');

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
                        $ligne_bslist = $data['liste_ligne_be'];

                    }
                    return view('admin.stock_vente.bon_sortie.bon_sortie_component',
                        [
                            'liste' => $liste,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'liste_ligne_be' => $ligne_bslist,
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
                    $ligne_bslist = $data['liste_ligne_be'];

                }
                return view('admin.stock_vente.bon_sortie.bon_sortie_component',
                    [
                        'liste' => $liste,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'liste_ligne_be' => $ligne_bslist,
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
        ])->post(env('API_URL').'stock_vente/bon_sorties/search', [
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
                        $bon_sortielist = $data['liste'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $ligne_bslist = $data['liste_ligne_be'];
                    }
                    return view('admin.stock_vente.bon_sortie.bon_sortie_component',
                        [
                            'liste' => $bon_sortielist,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'liste_ligne_be' => $ligne_bslist,
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
                    $bon_sortielist = $data['liste'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $ligne_bslist = $data['liste_ligne_be'];
                }
                return view('admin.stock_vente.bon_sortie.bon_sortie_component',
                    [
                        'liste' => $bon_sortielist,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'liste_ligne_be' => $ligne_bslist,
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

        ])->get(env('API_URL').'stock_vente/bon_sortie/create');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste_cat = $data['liste_cat'];
                        $liste_produit = $data['liste_produit'];

                    }
                    return view('admin.stock_vente.bon_sortie.ajouter.ajouter_component',[
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
                    $liste_cat = $data['liste_cat'];
                    $liste_produit = $data['liste_produit'];

                }
                return view('admin.stock_vente.bon_sortie.ajouter.ajouter_component',[
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
        ])->post(env('API_URL').'stock_vente/bon_sortie_add', [
            'date_bs'=>$request->date_bs,
            'total_ttc_bs'=>$request->total_ttc_bs,
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
                        Session::flash('success',  $data['message']);
                    }
                    else{
                        Session::flash('error',  $data['message']);
                    }

                    return redirect()->route('admin.stock_vente.bon_sortie.index');
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
                    Session::flash('success',  $data['message']);
                }
                else{
                    Session::flash('error',  $data['message']);
                }

                return redirect()->route('admin.stock_vente.bon_sortie.index');
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

        ])->get(env('API_URL').'stock_vente/bon_sortie/'.$id);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $detail = $data['detail'];

                        $liste_cat = $data['liste_cat'];
                        $liste_produit = $data['liste_produit'];
                        $ligne_bslist = $data['liste'];
                    }
                    return view('admin.stock_vente.bon_sortie.modifier.modifier_component',
                        [
                            'detail' => $detail,
                            'liste_cat' => $liste_cat,
                            'liste' => $ligne_bslist,
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

                    $liste_cat = $data['liste_cat'];
                    $liste_produit = $data['liste_produit'];
                    $ligne_bslist = $data['liste'];
                }

                return view('admin.stock_vente.bon_sortie.modifier.modifier_component',
                    [
                        'detail' => $detail,
                        'liste_cat' => $liste_cat,
                        'liste' => $ligne_bslist,
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
        ])->post(env('API_URL').'stock_vente/bon_sortie_update/'.$id, [
            'date_bs'=>$request->date_bs,
            'total_ttc_bs'=>$request->total_ttc_bs,
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

                    return redirect()->route('admin.stock_vente.bon_sortie.index');
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

                return redirect()->route('admin.stock_vente.bon_sortie.index');
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
        ])->post(env('API_URL').'stock_vente/bon_sortie_delete', [
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
                    return redirect()->route('admin.stock_vente.bon_sortie.index');
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
                return redirect()->route('admin.stock_vente.bon_sortie.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
}
