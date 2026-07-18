<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CompteController extends Controller
{
    public function index_compte(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'comptes');

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                        $list_instructeurs = $data['list_instructeurs'];
                    }
                    return view('admin.utilisateur.instructeur.compte.compte_component',
                        [
                            'liste' => $liste,
                            'list_instructeurs' => $list_instructeurs,

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
                    $list_instructeurs = $data['list_instructeurs'];
                }
                return view('admin.utilisateur.instructeur.compte.compte_component',
                    [
                        'liste' => $liste,
                        'list_instructeurs' => $list_instructeurs,

                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }




    }
    public function index_operation($id_compte){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),

        ])->get(env('API_URL').'comptes/operations/'.$id_compte);

        $data = $response->json();
        if($data){
            if($data['message']=='Unauthenticated.'){
                return view('auth.login');
            }
            else{
                if ($response->successful()) {
                    if($data['status']){
                        $liste = $data['liste'];
                        $detail_compte = $data['detail_compte'];
                        $du_date = $data['du_date'];
                        $au_date = $data['au_date'];
                        $instructeur = $data['instructeur'];
                        $insctructeur_id = $data['insctructeur_id'];
                    }

                    return view('admin.utilisateur.instructeur.compte.operation.operation_component',
                        [
                            'liste' => $liste,
                            'detail_compte' => $detail_compte,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'instructeur' => $instructeur,
                            'insctructeur_id' => $insctructeur_id,
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
                    $detail_compte = $data['detail_compte'];
                    $du_date = $data['du_date'];
                    $au_date = $data['au_date'];
                    $instructeur = $data['instructeur'];
                    $insctructeur_id = $data['insctructeur_id'];
                }
                return view('admin.utilisateur.instructeur.compte.operation.operation_component',
                    [
                        'liste' => $liste,
                        'detail_compte' => $detail_compte,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'instructeur' => $instructeur,
                        'insctructeur_id' => $insctructeur_id,
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
        ])->post(env('API_URL').'comptes/operations/search', [
            'du_date'=>$request->du_date,
            'au_date'=>$request->au_date,
            'id_compte'=>$request->id_compte,

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
                        $detail_compte = $data['detail_compte'];
                        $instructeur = $data['instructeur'];
                        $insctructeur_id = $data['insctructeur_id'];
                    }

                    return view('admin.utilisateur.instructeur.compte.operation.operation_component',
                        [
                            'liste' => $liste,
                            'du_date' => $du_date,
                            'au_date' => $au_date,
                            'detail_compte' => $detail_compte,
                            'instructeur' => $instructeur,
                            'insctructeur_id' => $insctructeur_id,
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
                    $detail_compte = $data['detail_compte'];
                    $instructeur = $data['instructeur'];
                    $insctructeur_id = $data['insctructeur_id'];
                }

                return view('admin.utilisateur.instructeur.compte.operation.operation_component',
                    [
                        'liste' => $liste,
                        'du_date' => $du_date,
                        'au_date' => $au_date,
                        'detail_compte' => $detail_compte,
                        'instructeur' => $instructeur,
                        'insctructeur_id' => $insctructeur_id,
                    ]);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }

    }
    public function add_operation(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('TOKEN'),
            'Content-Type' => 'application/json',
        ])->post(env('API_URL').'comptes/operations/add', [
            'montant'=>$request->montant,
            'compte_id'=>$request->compte_id,
            'soldecpte'=>$request->soldecpte,
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
                    return redirect()->route('admin.instructeur.compte.operation.index',$request->compte_id);
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
                return redirect()->route('admin.instructeur.compte.operation.index',$request->compte_id);
            }
            else {
                // Handle unsuccessful response
                dd($response->body());

            }
        }


    }
}
