<?php

namespace App\Http\Controllers\AdminControllers\StockVenteControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FournisseursController extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'stock_vente/fournisseurs');

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
                    return view('admin.stock_vente.fournisseur.fournisseur_component',
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
                return view('admin.stock_vente.fournisseur.fournisseur_component',
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
    public function edit($id){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'stock_vente/fournisseurs/'.$id);

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
                    return view('admin.stock_vente.fournisseur.modifier.modifier_component',
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
                return view('admin.stock_vente.fournisseur.modifier.modifier_component',
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
    public function update($id,Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'stock_vente/fournisseurs/update/'.$id, [
            'raison_soc_fourn'=>$request->raison_soc_fourn,
            'contact_fourn'=>$request->contact_fourn,
            'tel1_fourn'=>$request->tel1_fourn,
            'tel2_fourn'=>$request->tel2_fourn,
            'mf_fourn'=>$request->mf_fourn,
            'rc_fourn'=>$request->rc_fourn,
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


                    return redirect()->route('admin.stock_vente.fournisseur.index');
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


                return redirect()->route('admin.stock_vente.fournisseur.index');
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
        ])->post(env('API_URL').'stock_vente/fournisseurs/add', [
            'raison_soc_fourn'=>$request->raison_soc_fourn,
            'contact_fourn'=>$request->contact_fourn,
            'tel1_fourn'=>$request->tel1_fourn,
            'tel2_fourn'=>$request->tel2_fourn,
            'mf_fourn'=>$request->mf_fourn,
            'rc_fourn'=>$request->rc_fourn,
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
                    return redirect()->route('admin.stock_vente.fournisseur.index');
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
                return redirect()->route('admin.stock_vente.fournisseur.index');
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
        ])->post(env('API_URL').'stock_vente/fournisseurs/delete', [
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
                    return redirect()->route('admin.stock_vente.fournisseur.index');
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
                return redirect()->route('admin.stock_vente.fournisseur.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
}
