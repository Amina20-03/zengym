<?php

namespace App\Http\Controllers\InstructeurController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VenteAboController extends Controller
{
    public function index_abo(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'vente_abo');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $liste = $data['liste'];

                }
                return view('instructeur.vente_abonnement.abonnement.abonnement_component',
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
    public function delete_abo(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'vente_abo/delete', [
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
                return redirect()->route('instructeur.vente_abo.index');
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
    public function create_vente_abo(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'vente_abo/create');

        $data = $response->json();
        if($data['message']=='Unauthenticated.'){
            return view('auth.login');
        }
        else{
            if ($response->successful()) {
                if($data['status']){
                    $list_type_abo = $data['list_type_abo'];
                    $list_pays = $data['list_pays'];
                    $list_cat = $data['list_cat'];
                }
                return view('instructeur.vente_abonnement.abonnement.ajouter.ajouter_component',
                    [
                        'list_type_abo' => $list_type_abo,
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
    public function add_abo(Request $request){
        $solder=false;
        if($request->paiement == $request->prix_ttc_input){
            $solder=true;
        }
        $date = strtotime($request->date_fin);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'vente_abo/add', [
            'date'=>$request->date,
            'montant_ht'=>$request->prix_ht_input,
            'montant_ttc'=>$request->prix_ttc_input,
            'taux_tva'=>$request->taux_tva_input,
            'paiement'=>$request->paiement,
            'solder'=>$solder,
            'date_deb'=>$request->date_deb,
            'date_fin'=>date('Y-m-d', $date),
            'type_abo_id'=>$request->type_abo_id,
            'instructeur_id'=>session('instructeur_id'),
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
                    return redirect()->route('instructeur.vente_abo.index');
                }
                else {
                    // Handle unsuccessful response
                    dd($response->body());

                }
            }
        }
        else{
            dd($response->body());
        }



    }
}
